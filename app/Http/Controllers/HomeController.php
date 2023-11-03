<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['main_slider']        =  \WebService::home_main_slider();
        $data['main_menu']          =  \WebService::home_main_menu();
        $data['product_slider']     =  \WebService::wecart_product_slider();
        $data['tall_banner']        =  \WebService::wecart_tall_banner();

        $data['section_4category']  =  [];//\WebService::random_category_products(4);
        $data['section_carousel2']  =  [];//\WebService::nearly_out_of_stock();
        $data['brands']             =  \WebService::brands("live");
        $data['category_product']   =  [];//\WebService::category_product();
        $data['categories']         =  [];//\WebService::categories();
        $data['new_product']        =  [];//\WebService::new_product(13);

        $data['best_sold']          =  [];//\WebService::best_sold(2);
        $data['on_sale']            =  [];//\WebService::on_sale();
        $data['restocked']          =  [];//\WebService::restocked();


        $data['accessories']        =        [];//\WebService::accessories();
        $data['car_accessories']    =        [];//\WebService::car_accessories();
        $data['home_life']    =        [];//\WebService::home_life();
        $data['chargers']    =        [];//\WebService::chargers();
        $data['cables_converters']    =        [];//\WebService::cables_converters();
        $data['audio_systems']    =        [];//\WebService::audio_systems();
        $data['wireless_chargers']    =        [];//\WebService::wireless_chargers();
        $data['personal_products']    =        [];//\WebService::personal_products();

        //$data['section_grid1']     =  \WebService::home_test();
        //$data['section_grid2']     =  \WebService::home_test();
        //$data['section_grid3']     =  \WebService::home_test();
        return view('home.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
