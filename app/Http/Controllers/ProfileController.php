<?php
namespace App\Http\Controllers;
use App\Models\Home;
use FastRoute\Route;
use Illuminate\Http\Request;
class ProfileController extends Controller{
    public function index(){
        $data['page'] ='Profil Sayfası';

        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.orders', $data);
    }
    public function address(){
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        $data['addresses']=session('userInfo')['data']['addresses'];
        return view('profile.address', $data);
    }
    public function addressEdit($addresId){

        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        $data['addresses']=session('userInfo')['data']['addresses'];
        foreach (session('userInfo')['data']['addresses'] as $editadres){

            if ($editadres['addressId']==$addresId){

                $data['addresses']=$editadres;
            }

        }
        return view('profile.addressEdit', $data);
    }
    public function addressEditUpdate(Request $request){
        $bodyContent = request()->input();
        $bodyContent=$bodyContent['address'];
        $data['page'] ='Profil Sayfası';

        $data['main_menu'] =  \WebService::addresEdit($bodyContent);
        $data['addresses']=session('userInfo')['data']['addresses'];

        return view('profile.address', $data);
    }
    public function addressform(){
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.addressForm', $data);
    }
    public function orders(){

        $data['page'] ='Profil Sayfası';
        $deneme= \WebService::deneme();
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.orders', $data);
    }
    public function comments(){
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.comments', $data);
    }
    public function payments(){
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.payments', $data);
    }
    public function coupons(){
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.coupons', $data);
    }
    public function favorites(){

        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.favorites', $data);
    }
    public function informations(){
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('profile.informations', $data);
    }
    public function informationsUpdate(Request $request){
        $bodyContent = request()->input();
        unset($bodyContent['_token']);
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        $data['update'] =  \WebService::update_user($bodyContent);

        return view('profile.informations', $data);
    }
    public function addressformUpdate(Request $request){
    $bodyContent = request()->input();
    $bodyContent=$bodyContent['address'];
    $bodyContent['districtId']=1;
    $bodyContent['isDefault']=true;
    $bodyContent['isInvoiceUse']=true;
    $bodyContent['invoiceType']=0;
    $bodyContent['isEInvoice']=true;
    unset($bodyContent['_token']);
    $data['page'] ='Profil Sayfası';
    $data['main_menu'] =  \WebService::home_main_menu();
    $data['update'] =  \WebService::addresAdd($bodyContent);
    return view('profile.informations', $data);
}

    public function profileOrders(Request $request){
        $deneme= \WebService::deneme();
        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        $token = session("userToken");
        if($token){
            $response=\WebService::profileOrders($token);
            if(isset($response['items'])){
                $data['orders']=$response['items'];
            } else {
                $data['orders']=[];
            }
            return view('profile.orders', $data);
        }
        else{
            return redirect()->route('profile.index');
        }
    }
    public function orderdetail( string $orderId){

        $data['page'] ='Profil Sayfası';
        $data['main_menu'] =  \WebService::home_main_menu();
        $token = session("userToken");
        $foundOrderId=[];
        if($token){
            $response=\WebService::profileOrders($token);

            foreach ($response['items'] as $item) {
                if ($item['orderNo'] === $orderId) {
                    $foundOrderId = $item;
                    break; // İlgili orderNo bulunduğunda döngüyü sonlandırın
                }
            }
            $data['orders']=$foundOrderId;
            return view('profile.orderDetail', $data);
        }
        else{
            return redirect()->route('profile.index');
        }
    }

}
