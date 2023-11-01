<?php

namespace App\Http\Controllers;

use Akilliphone\BasketService;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug)
    {
        $data['main_menu'] =  \WebService::home_main_menu();

        $productId = $request->get("id",false);
        if($productId){
            $response = \WebService::product($productId);
            if (!empty( $response['data'])) {
                $data['product'] = $response['data'];
                $data['breadcrumb'] = '';

                $currentCategory = \WebService::category($data['product']['productCategories'][0]['categoryId']);

                if($currentCategory && $currentCategory['data']['breadcrumb']){
                    $data['breadcrumb']= $currentCategory['data']['breadcrumb'];
                } else {
                    $data['breadcrumb'] = '<div class="breadcrumb"><nav><ul><li><a href="/"><img src="https://ethem.akilliphone.com/assets/images/home-icon.svg"></a></li><li><a href="'.route('listing.page').'">Tüm Ürünler</a></li><li><a href="'.getCategoryUrl($currentCategory['data']).'">'.$currentCategory['data']['name'].'</a></li></ul></nav></div>';
                }
                BasketService::setLastViewed($data['product']);
            }
            if (empty($data['product']['variants'])) {

                return view('page.404', $data);
            }
            else{
                $data['variantId'] = $data['product']['variants'][0]['variantId'];
            }

        }
        return view('product_detail.index',$data);
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
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetail $productDetail)
    {
        //
    }
}
