<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Akilliphone\MailService;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, string $page){
        $data['main_menu'] =  \WebService::home_main_menu();
        if(\View::exists('page.'.$page)){

            $data['config_general']   =  \WebService::config_general();
            return view('page.'.$page, $data);

        }
        return view('page.404', $data);
    }
    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $to = 'akilliphone1@gmail.com'; // Gönderilen e-postaların gideceği sabit e-posta adresi

        Mail::send([], [], function ($message) use ($data, $to) {
            $message->to($to)
                ->subject('İletişim Formu Mesajı')
                ->setBody(
                    "Ad Soyad: {$data['name']}<br>" .
                    "E-posta: {$data['email']}<br>" .
                    "Mesaj: {$data['message']}",
                    'text/html'
                );
        });

        return redirect('/')->with('success', 'Mesajınız gönderildi!');
    }
    public function login()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.login',$data);
    }
    public function old_account()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.old-account',$data);
    }
    public function old_account_post(Request $request)
    {
        $data['main_menu'] =  \WebService::home_main_menu();


            $email= $request->input('username');

        $karakterler = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}[]|;:,.<>?';
        $password = '';
        $karakterSayisi = strlen($karakterler);

        for ($i = 0; $i < 12; $i++) {
            $rastgeleIndex = rand(0, $karakterSayisi - 1);
            $password .= $karakterler[$rastgeleIndex];
        }

           $mail= MailService::resetPassword($email,$password);


           return redirect()->route('old.account');


//        if($body){
//         session()->flash('flash-success', ['Yeni Şifre Mailinize Gönderildi', 'Yönlendiriliyorsunuz.']);
//
//        }else{
//         session()->flash('flash-error', ['Yeni Şifre Mailinize Gönderilemedi', 'Tekrar deneyiniz.']);
//
//            return back()->withInput();
//        }


    }
    public function bayi_login()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.bayi-login',$data);
    }
    public function forgot()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.forgot',$data);
    }
    public function signUp()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.sign-up',$data);
    }
    public function bayi_register()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.bayi-sign-up',$data);
    }
    public function register(Request $request)
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        $nowDateString = \Carbon\Carbon::now()->format('Y-m-d');
        $body=[
      "firstName" => $request->input('firstName'),
      "lastName" => $request->input('lastName'),
      "password" => $request->input('password'),
      "password2" => $request->input('password2'),
      "email" => $request->input('email'),
      "username" => $request->input('email'),
      "phoneNumber" => $request->input('phoneNumber'),
      "birthDate" => $nowDateString,
      "tcKimlik" => $request->input('tcKimlik'),
      "telefon"=>$request->input('phoneNumber'),
      "hasDropshippingPermission"=>"1",
      "code"=>"1"
];
        if($body['password']){
          if ($body['password']!=$body['password2']){

              $request->session()->flash('flash-error', ['Şifreleri Aynı girdiğinizden Emin olun', 'Tekrar deneyiniz.']);

              return back()->withInput();
          }


        }




        $register=\WebService::register($body);


        if($register){
            $request->session()->flash('flash-success', ['Üye olma işlemi başarılı', 'Yönlendiriliyorsunuz.']);
            return redirect()->route('login');
        }else{
            $request->session()->flash('flash-error', ['Üye olma işlemi başarısız', 'Tekrar deneyiniz.']);

            return back()->withInput();
        }

    }

    public function auth(Request $request){
        $email = $request->input('username');
        $password = $request->input('password');
        $userToken=\WebService::user_token($email,$password);
        if($userToken){
            session()->put('userToken', $userToken);
            session()->put('userInfo', \WebService::user_data($userToken));
            $request->session()->regenerate();
            $request->session()->flash('flash-success', ['Giriş Başarılı.',' ']);

            return redirect()->route('index');
        }
        else{
            $request->session()->flash('flash-error', ['Giriş Başarısız.',' ']);
            return redirect()->route('login');
        }
    }

    public function iletisim(Request $request)
    {
        $iletisim =  $request->input('iletisim', []);
        $email = isset($iletisim['email'])?$iletisim['email']:'';
        if($email){
            $name = isset($iletisim['name'])?$iletisim['name']:'';
            $message = isset($iletisim['message'])?$iletisim['message']:'';
            $body = 'akilliphone.com sitesinden yeni bir iletişim isteği alındı.<hr>Gönderen: '.$name.'<br>Epost: '.$email.'<br>Konu: '.$message;
            MailService::yazGonder(env('CONTACT_EMAIL', 'info@mailinator.com'), 'Yeni İletiş İsteği', $body);
            $report = 'İletişim isteğinizi aldık. Sizinle en kısa sürede iletişim kuracağız.';
            return _ReturnSucces($report,'','');
        } else{
            $report = 'İletişim isteğiniz kaydedilemedi. Daha sonra tekrar deneyiniz.';
        }
        return _ReturnError($report,'',[$report]);
    }
//    public function update(Request $request)
//    {
//        $userToken=session('userToken');
//        $user=session('userInfo');
//        $userId=$user['data']['id'];
//        $body=[
//            "id"=>$user['data']['id'],
//            "firstName" => $request->input('firstName'),
//            "lastName" => $request->input('lastName'),
//            "password" => $request->input('password'),
//            "email" => $request->input('email'),
//            "username" => $request->input('username'),
//            "phoneNumber" => $request->input('phoneNumber'),
//            "birthDate" => $request->input('birthDate'),
//            "tcKimlik" => $request->input('tcKimlik'),
//            "telefon"=>$request->input('phoneNumber'),
//            "hasDropshippingPermission"=>"1",
//
//        ];
//        $register=\WebService::update_user($body,$userToken);
//        return back()->withInput();
//
//    }
    public function logout(Request $request)
    {

        \Akilliphone\BasketService::clear();
        $request->session()->flush();
        $request->session()->flash('flash-success', ['Çıkış Yapıldı.','Yönlendiriliyorsunuz.']);
        return redirect()->route('login');

    }
/*
 public function profile(string $page)
 {
     if(!$page){
         $page="order";
     }
     $data['page'] =$page;

     $data['main_menu'] =  \WebService::home_main_menu();
     return view('profile.index',$data);
 }
 public function profileOrderDetail()
 {
     return view('profile.order.order-detail');
 }
 public function profileCoupons()
 {
     return view('profile.coupons.coupons');
 }
 public function profileFavorites()
 {
     return view('profile.favorites.favorites');
 }
 public function profileComments()
 {
     return view('profile.comments.comments');
 }
 public function profileInformation()
 {
     return view('profile.information.information');
 }
 public function profilePayment()
 {
     return view('profile.payment.payment');
 }
*/
}
