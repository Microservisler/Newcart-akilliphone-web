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
        //$order = \Akilliphone\OrderService::currentOrder();
        return $this->step($request, "2");
    }
    public function validateSuccess(Request $request){
        $data = $request->all();
        $error = null;
        if($data){
            $hash = \PaymentService::finansBankHash($data);
            if(isset($data['Hash']) ){
                 if($hash ==$data['Hash']){
                     if($data['3DStatus']==1 ){
                         $basket =  BasketService::calculateBasket(BasketService::getBasket());
                         if($basket){
                             if($basket->total == $data['PurchAmount']){
                                 $order = OrderService::currentOrder();
                                 $order->marketplaceId = 4; //akilliphone
                                 $order->paymentTypeId = 5; // havale
                                 $response = \WebService::orderPost($order);
                                 if($response && $response['data'] && $response['data']['orderId']){
                                     BasketService::clear();
                                     return redirect()->route('thankyou', ['orderId'=> $response['data']['orderId'], 'orderNo'=>$response['data']['orderNo'] ]);
                                 } else{
                                     $error = 'sipariş alındı fakat işlenirken bir hata oluştu. Bu kodu kullanarak yarım isteyiniz. Kodunuz: '.$data['Tds2dsTransId'];
                                 }
                             } else {
                                 $error = 'sipariş ile ödeme tutarı uyumsuz';
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
        dd($error, $hash, $data);
    }
    public function validateFail(){
        $basket =  BasketService::calculateBasket(BasketService::getBasket());
        $validate = \PaymentService::finansBankValidate(request()->all(), $basket);
        return $this->step(request(), 3, $validate );
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
            $billingAddress = $request->input('billingAddress', []);
            if(empty($billingAddress)){
                $billingAddress = $shippingAddress;
            }

            BasketService::setShipping($request->input('shippingBrand', false));
            BasketService::setCustomer($customer);
            BasketService::setShipingAddres($shippingAddress);
            BasketService::setBillingAddres($billingAddress, $request->input('invoiceType', 'bireysel'));

        }
        $data['basket']   =  BasketService::calculateBasket(BasketService::getBasket());

        $data['cc'] = [
            'name'=>'Ahmet Bayrak',
            'cardnumber'=>'4183421766142573',
            'expirationdate'=>'12/26',
            'securitycode'=>'726',
        ];
        $data['cc'] = [
            'name'=>'Ahmet Bayrak',
            'cardnumber'=>'4938410198818239',
            'expirationdate'=>'04/30',
            'securitycode'=>'811',
        ];
        $data['cc'] = [
            'name'=>'Ahmet Bayrak',
            'cardnumber'=>'4938410155072507',
            'expirationdate'=>'04/30',
            'securitycode'=>'126',
        ];
        return view('payment.step-3', $data);
    }
    private function step_4(Request $request, $data){
        $data['status']=0;
        if($paymetType = $request->input('paymentType', false)){
            if(BasketService::getItemCount()){
                $basket =  BasketService::calculateBasket(BasketService::getBasket());
                $order = OrderService::currentOrder();
                $order->marketplaceId='4'; //akilliphone
                if($paymetType=='banktransfer'){

                    $order->paymentTypeId = 5; // havale
                    $response = \WebService::create_order($order);
                    if($response && $response['data'] && $response['data']['orderId']){
                        /**
                            if($order_response){
                                $data['order'] = $order_response['data'];
                            }
                            $data['status'] = 1;
                            $data['basket']  = $basket;
                        **/
                        BasketService::clear();
                        return redirect()->route('thankyou', ['orderId'=> $response['data']['orderId'], 'orderNo'=>$response['data']['orderNo'] ]);
                    } else{
                        //siapariş oluşturulamadı
                    }
                } elseif($paymetType=='finansbank'){
                    $order->paymentTypeId = 3; // havale
                    $cc = $request->input('cc', []);
                    \PaymentService::finansBankStart($basket, $cc);
                    return false;
                } else{
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

    public function thankYou(Request $request, $orderId, $orderNo){
        $data['main_menu'] =  \WebService::home_main_menu();
        $data['config_general']   =  \WebService::config_general();

        $order_response = \WebService::admin_order($orderId);
        $data['error'] = 'Sipariş Bulanamadı';
        if($order_response && $order_response['data']){
            $data['order']  = $order_response['data'];
            if($data['order']['orderNo']==$orderNo){
                MailService::newOrder($data['order']);
                $data['error'] = false;
            }
        } else {
            $data['order'] = [];
        }
        return view('payment.thankyou', $data);

    }
}
