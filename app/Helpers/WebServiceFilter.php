<?php
use Illuminate\Http\Request;
class WebServiceFilter{
    /*
    public $text = '';
    public $brands = [];
    public $categories = [];
    public $colors = [];
    public $prices = ['min'=>0, 'max'=>0];
    public $offset = 0;
    public $limit = 24;
    const DELIMITER = ',';
    public function __construct(Request $request)
    {
        $this->fetchBrands($request);
        $this->fetchCategories($request);
        $this->fetchColors($request);
        $this->fetchPrices($request);
        $this->fetchText($request);
        $this->fetchLimit($request);
        $this->fetchOffset($request);
    }
    private function fetchBrands(Request $request){
        if($get_query = $request->get('brand', '')){
            $this->brands = explode(self::DELIMITER, $get_query);
        }
    }
    public function setBrand($brand){
        if(!in_array($brand, $this->brands)){
            $this->brands[] = $brand;
        }
    }
    private function fetchCategories(Request $request){

        if( $get_query = $request->get('cat', '')){
            $this->categories = explode(self::DELIMITER, $get_query);
        }

    }
    public function setCategoy($category){
        if(!in_array($category, $this->categories)){
            $this->categories[] = $category;
        }
    }
    private function fetchColors(Request $request){
        if($get_query = $request->get('color', '')){
            $this->colors = explode(self::DELIMITER, $get_query);
        }
    }
    public function setColor($color){
        if(!in_array($color, $this->colors)){
            $this->colors[] = $color;
        }
    }
    private function fetchPrices(Request $request){
        if($get_query = $request->get('min_price', 0)){
            $this->prices['min'] = $get_query;
        }
        if($get_query = $request->get('max_price', 0)){
            $this->prices['max'] = $get_query;
        }
    }
    public function setPrice($pos, $price){
        if($pos=='min'){
            $this->prices[$pos] = $price;
        } elseif($pos=='max'){
            $this->prices[$pos] = $price;
        }
    }
    private function fetchText(Request $request){
        if($get_query = $request->get('text', '')){
            $this->text = $get_query;
        }
    }
    public function setText($text){
        $this->text = $text;
    }
    private function fetchOffset(Request $request){
        $get_query = $request->get('offset', 0);
        $this->offset = $get_query;
    }
    public function setOffset($offset){
        $this->offset = $offset;
    }
    private function fetchLimit(Request $request){
        $limit = $request->get('limit', 24);
        $limits = [4, 8, 12, 16, 24, 48];
        if(in_array($limit, $limits)){
            $this->limit = $limit;
        } else {
            $this->limit = 24;
        }
    }
    public function setLimit($limit){
        $limits = [4, 8, 12, 16, 24, 48];
        if(in_array($limit, $limits)){
            $this->limit = $limit;
        } else {
            $this->limit = 24;
        }
    }
    public function getWebserviceJson(){
        $data = [
            'text'=>$this->text,
            'brand'=>$this->brands,
            'cat'=>$this->categories,
            'color'=>$this->colors,
            'price'=>$this->prices,
            'offset'=>(int)$this->offset,
            'limit'=>(int)$this->limit,
        ];
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    */
}
