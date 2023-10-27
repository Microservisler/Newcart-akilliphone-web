<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function signUp()
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        return view('login.sign-up',$data);
    }
    public function register(Request $request)
    {
        $data['main_menu'] =  \WebService::home_main_menu();
        $dateString = $request->input('birthDate'); // Tarih dizgesi
        $carbonDate = \Carbon\Carbon::createFromFormat('d/m/Y', $dateString)->startOfDay();
        $utcDate = $carbonDate->toDateString();
        $body=[
      "firstName" => $request->input('firstName'),
      "lastName" => $request->input('lastName'),
      "password" => $request->input('password'),
      "email" => $request->input('email'),
      "username" => $request->input('username'),
      "phoneNumber" => $request->input('phoneNumber'),
      "birthDate" => $utcDate,
      "tcKimlik" => $request->input('tcKimlik'),
      "telefon"=>$request->input('phoneNumber'),
      "hasDropshippingPermission"=>"1",
      "code"=>"1"

];
        $register=\WebService::register($body);
        if($register){
            return redirect()->route('login');
        }else{
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
            return redirect()->route('index');
        }
        else{
            return redirect()->route('profile.index');
        }
    }


    public function update(Request $request)
    {
        $userToken=session('userToken');
        $user=session('userInfo');
        $userId=$user['data']['id'];
        $body=[
            "id"=>$user['data']['id'],
            "firstName" => $request->input('firstName'),
            "lastName" => $request->input('lastName'),
            "password" => $request->input('password'),
            "email" => $request->input('email'),
            "username" => $request->input('username'),
            "phoneNumber" => $request->input('phoneNumber'),
            "birthDate" => $request->input('birthDate'),
            "tcKimlik" => $request->input('tcKimlik'),
            "telefon"=>$request->input('phoneNumber'),
            "hasDropshippingPermission"=>"1",

        ];
        $register=\WebService::update_user($body,$userToken);
        return back()->withInput();

    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('profile.index');


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
