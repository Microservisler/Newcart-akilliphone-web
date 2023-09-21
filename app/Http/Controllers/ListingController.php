<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, String $slug='')
    {
        $data['selected_category']        =  $request->input('category', false);
        $data['selected_brand']        =  $request->input('brand', false);

        $parts = explode('-', $slug);
        $data['category_code'] = (int)end($parts);
        $data['main_menu']          =  \WebService::home_main_menu();
        $data['filterable']          =  \WebService::filterables($data['selected_category']);
        //$data['brands']          =  \WebService::brands();
        $data['colors']          =  \WebService::colors();
        $data['categories']          =  \WebService::categories();
        $data['main_menu']          =  \WebService::home_main_menu();
        $data['three_banner']        =  \WebService::wecart_three_banner();

        return view('listing.index',$data);
    }
    public function category(Request $request)
    {
        //
    }
    public function brand(Request $request)
    {
        //
    }
    private function getFilteredProduct(Request $request)
    {
        $filter = new \WebServiceFilter($request);
        return($filter->getWebserviceJson());
    }

}
