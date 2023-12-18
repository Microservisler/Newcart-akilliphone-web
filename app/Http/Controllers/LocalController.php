<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index(Request $request, string $function){
    }
    public function brands(Request $request, string $function){
        if($function=='set'){
            $response = \WebService::brands('live');
            if($response && isset($response['status']) && $response['status']=='1'){
                file_put_contents(public_path('jsons/brands/list.json'), json_encode($response, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            }
            return $response;
        }
    }
    public function home(Request $request, string $function){
        if($function=='index') {
            return '
        <a href="'.route('local.home.set', 'main-slider').'">Ana Menu</a><br>
        <a href="'.route('local.home.set', 'main-slider').'">Ana Slider</a><br>
        <a href="'.route('local.brands.set', 'set').'">MArkalar</a><br>
        ';
        }elseif($function=='main-slider'){
            $response = \WebService::home_main_slider('live');
            if($response && isset($response['status']) && $response['status']=='1'){
                file_put_contents(public_path('jsons/home/main-slider.json'), json_encode($response, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            }
            return $response;
        } elseif($function=='main-menu'){
            $response = \WebService::home_main_menu('live');
            if($response && isset($response['status']) && $response['status']=='1'){
                $response['local'] = date('Y-m-d H:i:s');
                file_put_contents(public_path('jsons/home/main-menu.json'), json_encode($response, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            }
            return $response;
        }
    }

}
