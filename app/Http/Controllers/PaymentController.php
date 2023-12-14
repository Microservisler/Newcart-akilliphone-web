<?php

namespace App\Http\Controllers;

use Akilliphone\BasketService;
use Akilliphone\MailService;
use Akilliphone\OrderService;
use App\Models\Home;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        return $this->step($request, "2");
    }
    public function iyzicoCallback(Request $request){
        $data = $request->all();
        $token =$request->input('token');
        $payment = \PaymentService::checkIyzicoPayment($token);
        if($payment->getPaymentStatus()=='FAILURE'){
            $request->session()->flash('flash-error', [$payment->getErrorMessage(),'']);
            return redirect(route('payment.step.get', '3'));
        }elseif($payment->getPaymentStatus()=='SUCCESS'){
           $result = $this->complateOrderWithPaymentTypeId(3, $token, 11);
           if(is_a($result, 'Illuminate\Http\RedirectResponse')){
               return $result;
           }
        }elseif($payment->getPaymentStatus()=='INIT_BANK_TRANSFER'){
           $result = $this->complateOrderWithPaymentTypeId(5, $token);
           if(is_a($result, 'Illuminate\Http\RedirectResponse')){
               return $result;
           }
        }
        $request->session()->flash('flash-error', ['Bilinmeyen Hata','']);
        return redirect(route('payment.step.get', '3'));
    }
    public function validateSuccess(Request $request){
        $data = $request->all();
        //file_put_contents('ccsuccess.json', json_encode($data));
        //$data = json_decode( file_get_contents('ccsuccess.json'), 1);
        //$ErrMsg = isset($data['ErrMsg'])?$data['ErrMsg']:'Bilinmeyen Hata';

        $error = null;
        if($data){
            $hash = \PaymentService::finansBankHash($data);
            if(isset($data['Hash']) ){
                 if($hash ==$data['Hash']){
                     if($data['3DStatus']==1 ){
                         $basket =  BasketService::calculateBasket(BasketService::getBasket());
                         if($basket){
                             $order = OrderService::currentOrder();
                             $order->marketplaceId = 4; //akilliphone
                             $order->paymentTypeId = 3; // havale
                             $order->orderStatusId = 26; // havale
                             $order->paymentStatusId = 3; // havale
                             if($basket->total == $data['PurchAmount']){
                                 $order->orderStatusId = 11; // havale
                             } else {
                                 $error = 'sipariş ile ödeme tutarı uyumsuz';
                             }
                             $response = \WebService::create_order($order);
                             if($response && $response['data'] && $response['data']['orderId']){
                                 BasketService::clear();
                                 if($error) $request->session()->flash('flash-error',['Hata Oluştu:', $error]);
                                 return redirect()->route('thankyou', ['orderId'=> $response['data']['orderId'], 'orderNo'=>$response['data']['orderNo'] ]);
                             } else{
                                 $error = 'sipariş alındı fakat işlenirken bir hata oluştu. Bu kodu kullanarak yarım isteyiniz. Kodunuz: '.$data['Tds2dsTransId'];
                             }
                         } else {
                             $error = 'basket bilgisi kaybolmuş';
                         }
                     } else {
                         $error = '3d doğrulama başarısız';
                     }
                 } else {
                     $error = 'doğrulanamayan işlem';
                 }
            } else{
                $error = 'geçersiz işlem';
            }
        } else {
            $error = 'hatalı işlem';
        }
        $request->session()->flash('flash-error',['Hata Oluştu:', $error]);
        return redirect(route('payment.step.get', '3'));
    }
    public function validateFail(Request $request){
        $data = $request->all();
        //file_put_contents('sdfail.json', json_encode($data));
        //$data = json_decode( file_get_contents('sdfail.json'), 1);
        //$ErrMsg = isset($data['ErrMsg'])?$data['ErrMsg']:'Bilinmeyen Hata';
        $basket =  BasketService::calculateBasket(BasketService::getBasket());
        $validate = \PaymentService::finansBankValidate($data, $basket);
        if($validate['errors']){
            $request->session()->flash('flash-error', $validate['errors']);
        }
        return redirect(route('payment.step.get', '3'));
    }
    function checkStep(Request $request, String $step="1"){
        return $this->step($request, $step );
    }
    public function step(Request $request, String $step="1", $validate=[]){
        $data['main_menu'] =  \WebService::home_main_menu();
        $data['config_general']   =  \WebService::config_general();
        $data['validate']   =  $validate;
        $basket   =  BasketService::calculateBasket(BasketService::getBasket());
        if(empty($basket->customer)) BasketService::setCustomer([]);
        if(empty($basket->shippingAddress)) BasketService::setShipingAddres([]);
        if(empty($basket->billingAddress)) BasketService::setBillingAddres([], 'bireysel');

        $data['basket']   =  BasketService::calculateBasket(BasketService::getBasket());
        $data['countries'] = \WebService::countries();
        $data['cities'] = \WebService::cities();
        $data['userInfo']   =   session()->get('userInfo');

        if(empty($data['basket']->basketItemCount)){
            $step="1";
        }
        if($step =='1'){
            return $this->step_1($request, $data);
        } elseif($step =='2'){
            return $this->step_2($request, $data);
        } elseif($step =='3'){
            return $this->step_3($request, $data);
        } elseif($step =='4'){
            return $this->step_4($request, $data);
        } elseif($step =='5'){
            return $this->step_5($request, $data);
        }
        return view('payment.step-1', $data);
    }
    private function step_1(Request $request, $data){
        return view('payment.step-1', $data);
    }
    private function step_2(Request $request, $data){
        $data['basket']   =  BasketService::calculateBasket(BasketService::getBasket());

        return view('payment.step-2', $data);
    }
    private function step_3(Request $request, $data){
        if ($request->isMethod('post')) {
            $customer = $request->input('customer', []);
            $shippingAddress = $request->input('shippingAddress', []);
            if($shippingAddress && empty($shippingAddress['firstName'])){
                $shippingAddress['firstName'] = $customer['firstName'];
                $shippingAddress['lastName'] = $customer['lastName'];
                $shippingAddress['phone'] = $customer['phone'];
            }
            if($request->input('use_payment_adress', false)){
                $billingAddress = $request->input('billingAddress', []);
            } else{
                $billingAddress = $shippingAddress;
            }


            BasketService::setShipping($request->input('shippingBrand', false));
            BasketService::setCustomer($customer);
            BasketService::setShipingAddres($shippingAddress);
            BasketService::setBillingAddres($billingAddress, $request->input('invoiceType', 'bireysel'));
        }
        $data['basket']   =  BasketService::calculateBasket(BasketService::getBasket());
        $iyzicoResponse = \PaymentService::iyzicoPayment($data['basket']);

        if($paymentPageUrl = $iyzicoResponse->getPaymentPageUrl()){
            $data['iyzico_url'] = $paymentPageUrl;
        } else{
            $data['iyzico_url'] = '';
        }
        $data['iyzico_form'] = '';
        if($checkoutFormContent = $iyzicoResponse->getPaymentPageUrl()){
            $data['iyzico_link'] = $checkoutFormContent;
        } else{
            $data['iyzico_link'] = '';
        }
        $data['cc'] = [
            'name'=>'',
            'cardnumber'=>'',
            'expirationdate'=>'',
            'securitycode'=>'',
        ];
        return view('payment.step-3', $data);
    }
    private function step_4(Request $request, $data){
        $data['status']=0;
        if($paymetType = $request->input('paymentType', false)){
            if(BasketService::getItemCount()){
                $basket = BasketService::calculateBasket(BasketService::getBasket());
                if($paymetType=='banktransfer'){
                    return $this->complateOrderWithPaymentTypeId(5);
                } elseif($paymetType=='finansbank'){
                    //$order->paymentTypeId = 3; // kredikartı
                    $cc = $request->input('cc', []);
                    \PaymentService::finansBankStart($basket, $cc);
                    return false;
                } else {
                    //paymentType geçersiz
                }
            } else{
                //sepet boş
            }
        } else{
            //payment type yok
        }
        //dd($paymetType, $data);
        return view('payment.step-4', $data);
    }
    private function complateOrderWithPaymentTypeId($paymentTypeId, $orderToken='', $paymentStatusId=false){

        $order = OrderService::currentOrder();
        $order->marketplaceId='4'; //akilliphone
        $order->marketplaceOrderCode= $orderToken; //iyzico ödeme tokenı
        $order->paymentTypeId = $paymentTypeId; // 4-havale
        if($paymentStatusId){
            $order->paymentStatusId = $paymentStatusId; // 11 ödendi
        }
        $response = \WebService::create_order($order);

        if($response && $response['data'] && $response['data']['orderId']){
            BasketService::clear();
            return redirect()->route('thankyou', ['orderId'=> $response['data']['orderId'], 'orderNo'=>$response['data']['orderNo'] ]);
        } else {
            //siapariş oluşturulamadı
        }

    }
    public function thankYou(Request $request, $orderId, $orderNo){
        $data['main_menu'] =  \WebService::home_main_menu();
        $data['config_general']   =  \WebService::config_general();

        $order_response = \WebService::admin_order($orderId);
        $data['error'] = 'Sipariş Bulanamadı';
        if($order_response && $order_response['data']){

            $data['order']  = $order_response['data'];
            if($data['order']['orderNo']==$orderNo){
                if($data['order']['marketplaceOrderCode']){
                    $payment = \PaymentService::checkIyzicoPayment($data['order']['marketplaceOrderCode']);
                    $data['extra'] = json_decode($payment->getRawResult(), 1);
                } else {
                    $data['extra'] = [];
                }
                MailService::newOrder($data);
                $data['error'] = false;
            }
        } else {
            $data['order'] = [];
        }
        return view('payment.thankyou', $data);

    }
}
