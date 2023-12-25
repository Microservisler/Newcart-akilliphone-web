<?php

namespace App\Http\Controllers;

use Akilliphone\BasketService;
use App\Models\Home;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['main_menu'] = \WebService::home_main_menu();
        $data['config_general'] = \WebService::config_general();
        $data['basket'] = BasketService::getBasket();

        $data['brands']             =  \WebService::brands("live");

        return view('basket.index', $data);
    }
    public function mini(Request $request)
    {
        return BasketService::calculateBasket(BasketService::getBasket())->toArray();
    }

    public function addProduct(Request $request, string $variyantId, string $quantity){
        $variant = \WebService::product_variant($variyantId);
        if($variant){
            BasketService::addProduct($variant['data'], $quantity);
        }
        return BasketService::toArray();
    }
    public function setProduct(Request $request, string $variyantId, string $quantity){
        $variant = \WebService::product_variant($variyantId);
        if($variant){
            BasketService::addProduct($variant['data'], $quantity, true);
        }
        return BasketService::toArray();
    }
    public function removeProduct(Request $request, string $variyantId){
        BasketService::removeProduct($variyantId);
    }
}
