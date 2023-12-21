<?php
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class WebService {
    const WEBSERVICE_SERVER = 'https://auth.duzzona.site/connect/token';
    protected $userName = '';
    protected $userPassword = '';
    public static function get_token(){
        try {
            $content = "grant_type=client_credentials";
            $authorization = base64_encode(env('WEBSERVICE_ID').":".env('WEBSERVICE_SECRET'));
            $header = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('WEBSERVICE_URL'),
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $content
            ));
            $response = curl_exec($curl);
            $json = json_decode($response);

            if(isset($json->access_token)){
                return $json->access_token;
            }
        } catch (\Exception $ex){
            return null;
        }
        return false;
    }
    public static function user_token($username,$password){

        $response = Http::withToken('token')->post('http://api.duzzona.site/login', [
            'username' => $username,
            'password' => $password,
        ]);
        $responseData = json_decode($response->body(), true);
        if($responseData && isset($responseData['token'])){
            $token = $responseData['token'];

        } else {
            $token = '';
        }
        return $token;
    }
    public static function profileOrders($token){

        $response = Http::withToken($token)->get('http://api.duzzona.site/orders');
        $responseData = json_decode($response->body(), true);
        if($responseData && isset($responseData['data'])){
            $token = $responseData['data'];

        } else {
            $token = '';
        }
        return $token;
    }
    public static function addAddress($token){

        $response = Http::withToken($token)->get('http://api.duzzona.site/orders');
        $responseData = json_decode($response->body(), true);
        if($responseData && isset($responseData['data'])){
            $token = $responseData['data'];

        } else {
            $token = '';
        }
        return $token;
    }
    public static function addresEdit($body){
        $token = session('userToken');
        $body['userId']=session('userInfo')['data']['id'];

        $response = Http::withToken($token)->put('https://api.duzzona.site/address', $body);
        $responseData = json_decode($response->body(), true);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'API güncelleme başarısız.'], $response->status());
        }

    }
    public static function admin_token(){

        $response = Http::withToken('token')->post('https://api.duzzona.site/login', [
            'username' =>'222dddcdaa8264e6d96baadd43f324fbd83@hotmail.com',
            'password' =>  'Passw0rd123.??!!!__',
        ]);
        $responseData = json_decode($response->body(), true);
        if($responseData && isset($responseData['token'])){
            $token = $responseData['token'];

        } else {
            $token = '';

        }
        return $token;
    }
    public static function register($body){
        $token = self::admin_token();
        $response = Http::withToken($token)->post('https://api.duzzona.site/register-uye', $body);

        $responseData = json_decode($response->body(), true);
        return $responseData;
    }
    public static function register_bayi($body){
        $token = self::admin_token();
        $response = Http::withToken($token)->post('https://api.duzzona.site/register-uye', $body);

        $responseData = json_decode($response->body(), true);
        return $responseData;
    }
    public static function update_user($body){
        $token = session('userToken');
        $body['user']['id']=session('userInfo')['data']['id'];
        $response = Http::withToken($token)->put('https://api.duzzona.site/user', $body['user']);
        $responseData = json_decode($response->body(), true);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'API güncelleme başarısız.'], $response->status());
        }

    }
    public static function deneme(){
        $body = [
            "productId" => 12957,
            "customerId" => 3,
            "title" => "deneme", // Replace "YourTitleHere" with the actual title value
            "review" => "deneme Yorum",
            "rating" => 5
        ];

        $token = session('userToken');
        $response = Http::withToken($token)->post('https://api.duzzona.site/reviews', $body);
        $responseData = json_decode($response->body(), true);
        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'API güncelleme başarısız.'], $response->status());
        }

    }
    public static function addresAdd($body){
        $token = session('userToken');
        $body['userId']=session('userInfo')['data']['id'];
        $response = Http::withToken($token)->post('https://api.duzzona.site/address', $body);
        $responseData = json_decode($response->body(), true);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'API güncelleme başarısız.'], $response->status());
        }

    }
    public static function user_data($token){

        $url = 'http://api.duzzona.site/user';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($url);

        if ($response->successful()) {
            $responseData = $response->json();

            return $responseData;
        } else {
            $statusCode = $response->status();
            $errorResponse = $response->json();
            dd([
                'Authorization' => 'Bearer ' . $token,
            ], $errorResponse);

            return $errorResponse;
        }


    }
    public static function auth_logout(){

    }
    public static function accessories(){
        return self::request('products?cat=1,2,3,6,5,12,9,10,8,7,4,11,48,55,63,57,44,45,47,46,13,21,16,20,19,23,24,30,31,27,32,28,25,29,26,34,41,40,36,38,37,39,35,33,43&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function car_accessories(){
        return self::request('products?cat=2,3,6,5,12,9,10,8,7,4,11&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function home_life(){
        return self::request('products?cat=78,83,85,87,80,88,84,81,86,79&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function chargers(){
        return self::request('products?cat=103,105,107,110,104,108,109,111,106&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function cables_converters(){
        return self::request('products??cat=89,95,92,102,101,90,96,98,100,94,97,91,99,93&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function audio_systems(){
        return self::request('products?cat=112,113,115,119,117,122,118,114,121,116,120&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function wireless_chargers(){
        return self::request('products?cat=106&sort=newly&orderby=desc&offset=12' ,[]);
    }
    public static function personal_products(){
        return self::request('products?cat=84&sort=newly&orderby=desc&offset=12' ,[]);
    }

    public static function filterables($request){

        $filter = ['offset'=>50];
        if($category_id = $request->input('category')){
            $filter['cat'] = $category_id;
        }
        if($section = $request->input('section')){
            $filter['section'] = $section;
        }
        if($brand = $request->input('brand')){
            $filter['brand'] = $brand;
        }

        $response = self::request('products', $filter);
        if($response && isset($response['data']) && isset($response['data']['filterables'])){
            return $response['data']['filterables'];
        } else{
            return ['brands'=>[], 'colors'=>[]];
        }

    }
    public static function brands($source=null){
        if($source=='live'){
            return self::request('brands', []);
        }
        return self::static('brands/list', []);
    }
    public static function colors(){
        return self::static('options/colors', []);
    }
    public static function categories($categoryId=0){
        $rows = self::wecart('categories/list', []);
        if($categoryId && $rows && isset($rows['data']) && isset($rows['data']['items'])){
            if(isset($rows['data']['items'][$categoryId])){
                return $rows['data']['items'][$categoryId];
            }
            return [];
        } else {
            return $rows;
        }
    }
    public static function category($id){
        return self::request('categories/'.$id, []);

        $token = session('userToken');
        $response = Http::withToken($token)->get('https://api.duzzona.site/categories/'.$id);

        $responseData = json_decode($response->body(), true);
        return $responseData;

    }

    public static function countries(){
        return self::static('address/countries', []);
    }
    public static function cities($countryId=0){
        return self::static('address/cities', []);
    }
    public static function district($cityId){
        return self::static('address/district/'.$cityId, []);
    }
    public static function create_order($order){
        return self::request('orders', $order, 'POST', true);
    }
    public static function create_order_history($orderHistory){
        $response = self::request('orders/history', $orderHistory, 'POST', true);
        return $response ;
    }
    public static function admin_order($orderId){
        return self::request('orders/'.$orderId, [], 'GET', true);
    }
    public static function orders($filters){
        return self::request('orders', $filters);
    }
    public static function order($orderId){
        return self::request('orders/'.$orderId);
    }
    public static function products($filters){
        return self::request('products', $filters);
    }
    public static function product($productId, $params=[]){
        return self::request('products/'.$productId, $params);
    }
    public static function product_variant($variantId){
        return self::request('variants/'.$variantId);
    }
    public static function home_main_menu($source=null){
        return self::wecart('home/main-menu');
        if($source=='live'){
        }
        return self::static('home/main-menu');
    }
    public static function home_main_slider($source=null){
        if($source=='live'){
            return self::wecart('home/main-slider');
        }
        return self::static('home/main-slider');
    }
    public static function home_section_category($number){
        return self::request('home/section-category'.$number.'.json');
    }
    public static function new_product($categoryId){
        return self::request('products?offset=18&page=1&section=new_arrivals');
    }
    public static function best_sold($categoryId){
        return self::request('products?offset=18&page=1&section=most_ordered');
    }
    public static function on_sale(){
        return self::request('products?offset=18&page=1&section=on_sale');
    }
    public static function restocked(){
        return self::request('products?offset=18&page=1&section=restocked');
    }
    public static function category_product(){
        return self::request('random-products?size=3&categoryId=2');
    }
    public static function random_category_products($size=4){
        return self::request('random-category-products', ['size'=>$size]);
    }
    public static function nearly_out_of_stock(){
        return self::request('nearly-out-of-stock', ['size'=>18]);
    }
    public static function home_favorite_brands(){
        return self::request('home/favorite-brands.json');
    }
    public static function config_general(){
        return self::static('config/general');
    }

    private static function request($endpoint, $data=[], $method='GET', $is_admin=false){
        $result = [];
        try {
            if($is_admin===true){
                $Authorization = self::admin_token();
            } else {
                $Authorization = session()->get('token');
            }
            $client = new Client();
            $url = env('WEBSERVICE_HOST').$endpoint;
            $options['headers'] = [
                'Authorization' => 'Bearer ' . $Authorization,
                'Accept' => 'application/json',
            ];

            if($data &&  $method=='GET'){

                $http_query = http_build_query($data);

                $url = ltrim($url, '/').'?'.$http_query;

            } elseif($data &&  $method=='POST'){

                $options[GuzzleHttp\RequestOptions::JSON]=$data;
            }
            $response = $client->request($method, $url, $options);

            $result = json_decode($response->getBody(), true);

            //print_r(json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));die();
        } catch (\Exception $ex){
            $failedId = addFailedLog('webservice', $ex->getMessage(),  ['endpoint'=>$endpoint, 'data'=>$data, 'method'=>$method, 'is_admin'=>$is_admin]  );
            request()->session()->flash('flash-error', [$ex->getMessage(), 'Tekrar deneyiniz.']);
            echo "<script>window.location.href='".route('page', ['page'=>'webservice-error', 'failedId'=>$failedId])."'</script>";

        }
        return $result;
    }

    private static function static($endpoint){
        $json_path = public_path().'/jsons/'.$endpoint.'.json';
        if(is_file($json_path)){
            $json = file_get_contents($json_path);
            return json_decode($json, 1);
        } else {
            return [];
        }
    }
    private static function wecart($job){
        $result = [
            'status'=>0,
            'data'=>[],
        ];
        if($job=='home/main-slider'){
            $rows = self::wecart_main_slider();
            $result['status'] = 1;
        } elseif ($job=='home/main-menu' ){
            $rows = self::wecart_main_menu();
            $result['status'] = 1;
        } elseif( $job=='categories/list' ){
            $rows = self::wecart_categories();
            $result['status'] = 1;
        } else {
            $rows = [];
        }
        $result['data']['items'] = $rows;
        return $result;
    }
    private static function wecart_categories(){
        $sql = "SELECT  *  FROM category where active=1 order by idTop asc,orderNumber asc ";
        $query = DB::connection('wecart')->select($sql);
        $rows = [];
        foreach ($query as $item) {
            $info['categoryId'] = $item->webservice_id;
            $info['parentId'] = $item->idTop;
            $info['code'] = $item->id;
            $info['slug'] = Permalink($item->categoryName)."-".$item->id;
            $info['name'] = (urldecode($item->categoryName));
            $info['image'] = $item->logo;
            $info['description'] = null;
            $info['seoTitle'] = html_entity_decode(urldecode($item->seoTitle));
            $info['seoDescription'] = html_entity_decode(urldecode($item->seoDescription)) ;
            $rows[$item->id] = [
                'info' =>$info,
                'childs' => self::get_category_childs($item, $query, $info),
            ];
            $child_ids = self::get_category_chil_ids($rows[$item->id]);
            $rows[$item->id]['child_ids']= implode(',', $child_ids);
        }
        foreach($rows as $rowkey=>$row){
            if(isset($rows[$row['info']['parentId']])){
                $rows[$rowkey]['main'] = $rows[$row['info']['parentId']]['info'];
            }

        }
        return $rows;
    }
    private static function get_category_chil_ids($row){
        $childs = [$row['info']['categoryId']];
        foreach($row['childs'] as $item) {
            $item_childs = self::get_category_chil_ids($item);
            $childs = array_merge($childs, $item_childs);
        }
        return $childs;
    }
    private static function get_category_childs($parent, $list, $main){
        $result = [];
        foreach($list as $item){
            if($item->idTop == $parent->id){
                $info['categoryId'] = $item->webservice_id;
                $info['code'] = $item->id;
                $info['slug'] = Permalink($item->categoryName)."-".$item->id;
                $info['name'] = (urldecode($item->categoryName));
                $info['image'] = $item->logo;
                $info['description'] = null;
                $info['seoTitle'] = html_entity_decode(urldecode($item->seoTitle));
                $info['seoDescription'] = html_entity_decode(urldecode($item->seoDescription)) ;
                $childs = self::get_category_childs($item, $list, $info);
                $result[$item->id] = [
                    'info' =>$info,
                    'main' =>$main,
                    'childs' => $childs,
                ];
            }
        }
        return $result;
    }
    private static function wecart_main_menu(){
        $sql = "SELECT  *  FROM category where active=1 order by idTop asc,orderNumber asc ";
        $query = DB::connection('wecart')->select($sql);
        $tree = [];
        foreach ($query as $row) {
            //$row->childs = [];
            $tree[$row->id]['info'] = $row;
            $tree[$row->idTop]['childs'][$row->id] = $row;
        }
        $rows = [];
        foreach($tree[0] as $tr)
        {
            foreach($tr as $row){

                $item['categoryId'] = $row->webservice_id;
                $item['code'] = $row->id;
                $item['slug'] = Permalink($row->categoryName)."-".$row->id;
                $item['name'] = (urldecode($row->categoryName));
                $item['image'] = $row->logo;
                $item['description'] = null;
                $item['seoTitle'] = html_entity_decode(urldecode($row->seoTitle));
                $item['seoDescription'] = html_entity_decode(urldecode($row->seoDescription)) ;
                $item['childs'] = [];
                if(isset($tree[$row->id])){
                    foreach($tree[$row->id]['childs'] as $child){
                        $citem['categoryId'] = $child->webservice_id;
                        $citem['code'] = $child->id;
                        $citem['slug'] = Permalink($child->categoryName)."-".$child->id;
                        $citem['name'] = (urldecode($child->categoryName));
                        $citem['image'] = $child->logo;
                        $citem['description'] = null;
                        $citem['seoTitle'] = html_entity_decode(urldecode($child->seoTitle));
                        $citem['seoDescription'] = html_entity_decode(urldecode($child->seoDescription)) ;
                        $citem['childs'] = [];
                        $item['childs'][$child->id] = $citem;
                        if(isset($tree[$child->id])){
                            if(isset($tree[$child->id]['childs'])){

                                foreach($tree[$child->id]['childs'] as $schild){

                                    $sitem['categoryId'] = $schild->webservice_id;
                                    $sitem['code'] = $schild->id;
                                    $sitem['slug'] = Permalink($schild->categoryName)."-".$schild->id;
                                    $sitem['name'] = (urldecode($schild->categoryName));
                                    $sitem['image'] = $schild->logo;
                                    $sitem['description'] = null;
                                    $sitem['seoTitle'] = html_entity_decode(urldecode($schild->seoTitle));
                                    $sitem['seoDescription'] = html_entity_decode(urldecode($schild->seoDescription)) ;
                                    $sitem['childs'] = [];
                                    $item['childs'][$child->id]['childs'][$schild->id] = $sitem;
                                }
                            }
                            /**/
                        }
                    }
                }
                $rows[$row->id] = $item;
            }
        }
        return $rows;
    }
    private static function wecart_main_slider(){
        return self::wecart_slider(61, [1100,390], [326,227]);
    }
    public static function wecart_tall_banner(){
        $slider['status'] = 1;
        $slider['data']['items'] = self::wecart_slider(63, [1110,400], [1110,400]);

        return $slider;
    }
    public static function home_brands(){
        $slider['status'] = 1;
        $slider['data']['items'] = self::wecart_slider(67,[350,91], [350,91]);

        return $slider;
    }

    public static function wecart_three_banner(){
        $slider['status'] = 1;
        $slider['data']['items'] = self::wecart_slider(65, [1110,400], [284,125]);
        return $slider;
    }
    public static function wecart_three_banner2(){
        $slider['status'] = 1;
        $slider['data']['items'] = self::wecart_slider(66, [1110,400], [1110,400]);
        return $slider;
    }
    public static function wecart_product_slider(){
        $slider['status'] = 1;
        $slider['data']['items'] = self::wecart_slider(62, [232,147], [464,294]);
        return $slider;
    }
    private static function wecart_slider($id, $d, $m){
        $query = DB::connection('wecart')->select("SELECT * FROM `slider_pics` WHERE `idSlider`=$id ORDER BY `id` DESC");
        $rows = [];
        foreach($query as $row){
            $product = [];
            if((int)$row->title){
                $response = self::request('products/'.(int)$row->title);
                if($response && isset($response['data'])){
                    $product = $response['data'];
                }
            }
            $rows[]=[
                "desktopImage" => getProductImageUrl($row->picture, $d[0], $d[1]),
                "mobileImage" => getProductImageUrl($row->picture, $m[0], $m[1]),
                "slug" => $row->url,
                "title" => $row->title,
                "thumb" => getProductImageUrl($row->smallPicture, 65, 48),
                "bgColor" => $row->bgColor,
                "product" => $product,
                "orderNumber" => $row->orderNumber,
            ];
        }
        return $rows;

    }
}
