<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller{
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
        $data['cat_ids']          =  $data['selected_category'];
        if($data['selected_category']){
            $currentCategory = \WebService::categories($data['category_code']);
            if($currentCategory && $currentCategory['child_ids']){
                $data['cat_ids']          =  $currentCategory['child_ids'];
            }
        }

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
    public function autoComplate(Request $request){
        $filters= [];
        $text = $request->input('text', '');
        if($text){
            $filters['text']=$text;
        }
        $products = \WebService::products($filters);
        $response = [
            'query'=> "Unit",
            'html'=>''
        ];
        if(isset($products['data']) && isset($products['data']['items'])){
            $response['html'] .= '<ul class="ajax-search">';
            foreach($products['data']['items'] as $item){
                $response['html'] .= $this->autoComplateLine($item, $text);
            }
            $response['html'] .= '</ul>';
        }
        return($response);
    }
    public function autoComplateLine($item, $text){
        $item['name'] = str_replace([$text, ucfirst($text), strtoupper($text), strtolower($text)], ['<strong>'.$text.'</strong>','<strong>'.ucfirst($text).'</strong>','<strong>'.strtoupper($text).'</strong>','<strong>'. strtolower($text).'</strong>'], $item['name']);
        if($item['featuredImage']){
            $image = '<img src="'.getProductImageUrl($item['featuredImage'], 30, 30).'">' ;
        } else {
            $image = '';
        }

        return '<li style="clear: both"><a href="'.getProductUrl($item).'">'.$image.$item['name'].'</a></li>';
    }
}
