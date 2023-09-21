<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class LocalController extends Controller
{
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
        if($function=='main-slider'){
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
