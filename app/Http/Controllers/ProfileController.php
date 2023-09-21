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
        return view('profile.address', $data);
    }
    public function orders(){
        $data['page'] ='Profil Sayfası';

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
}
