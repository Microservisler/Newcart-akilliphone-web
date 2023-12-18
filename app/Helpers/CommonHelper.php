<?php

use Illuminate\Support\Facades\DB;

function getProductImageUrlById($variyantId, $w=50, $h=50){
    $variyant = WebService::product_variant($variyantId);
    if(isset($variyant['data'])){
        return getProductImageUrl($variyant['data']['featuredImage'], $w, $h);
    }
    return '';
}
function getProductImageUrl($url, $w=false, $h=false, $cdnx=false){

    $url = trim($url,'/');
    $parts = explode('/',$url);
    $port = isset($parts[0])?$parts[0]:'8004';
    $ports['up']='8000';
    $ports['up2']='8001';
    $ports['up3']='8002';
    $ports['upwater']='8003';
    $ports['img']='8004';
    unset($parts[0]);
    foreach($parts as $key=>$part){
        $parts[$key] = urlencode($part);
    }
    if($cdnx){
        $sub = 'https://cdn-x.akilliphone.com/';
    } else{
        $sub = env('CDN_URL');
    }
    if(empty($w)) $w=160;
    if(empty($h)) $h=160;
    if($w && $h && isset($ports[$port]))
    {
        $result = $sub.$ports[$port].'/'.$w.'x'.$h.'/'.(implode('/',$parts));
    } else {
        $result = $sub.urlencode($url);
    }
    return $result;

}
function theProductUrl($item){

}
function getProductSlug($item, $echo=false){
    return route('product_detail.index', ['slug'=>$item['slug']]);
}
function getProductUrl($item, $echo=false){
    return route('product_detail.index', ['slug'=>$item['slug']]).'?id='.$item['productId'];
}
function getCategoryUrl($category){
    $url = url('reyonlar').'/'.$category['slug'].'?category='.$category['categoryId'];
    return $url;
}
function getUrlBySlug($slug){
    $url = rtrim(env('CDN_URL'), '/').'/'.ltrim($slug, '/');
    return $url;
}
function Permalink($str, $options = array()) {
    //$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $str=html_entity_decode(htmlspecialchars_decode($str),ENT_COMPAT,"UTF-8");

    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true,
    );
    // Merge options
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',

        // Latin symbols
        '©' => '(c)',

        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',

        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',

        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',

        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    // Make custom replacements
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    //echo "repl:".$str;
    // Transliterate characters to ASCII
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    // Replace non-alphanumeric characters with our delimiter
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    // Remove duplicate delimiters
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    // Truncate slug to max. characters
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    // Remove delimiter from ends
    $str = trim($str, $options['delimiter']);
    //echo $str;
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function Basket(){
    return \Akilliphone\BasketService::getBasket();
}
function isUserLogged(){
    if($userToken=session()->get('userToken')){
        if(!empty($userToken)){
            return true;
        }
    }
    return false;
}
function userInfo($key=null){
    if( $userInfo=session()->get('userInfo') ){
        if(empty($key)){
            return $userInfo['data'];
        } else {
            if(isset($userInfo['data'][$key])){
                return $userInfo['data'][$key];
            }
        }
    }
    return [];
}
function HumanDate($date = NULL, $format = 'd.m.Y') {
    if ($date === NULL) $date = date('Y-m-d');
    return date($format, strtotime($date));
}
function _ReturnSucces($message, $html, $redirect=''){
    $data['status'] = 1;
    $data['message'] = $message;
    $data['html'] = $html;
    $data['redirect'] = $redirect;
    return _ReturnResponse($data);
}
function _ReturnError($message, $html, $errors=[]){
    $data['status'] = 0;
    $data['message'] = $message;
    $data['html'] = $html;
    $data['errors'] = implode('<br>', $errors);
    return _ReturnResponse($data);
}
function _ReturnResponse($data){
    $data['status'] = isset($data['status'])?$data['status']:1;
    $data['date'] = date('Y-m-d H:i:s');
    $data['ver'] = env('VER','1.0.0');
    $data['message'] = isset($data['message'])?$data['message']:'';
    $data['html'] = isset($data['html'])?$data['html']:'';
    $data['errors'] = isset($data['errors'])?$data['errors']:'';
    $data['redirect'] = isset($data['redirect'])?$data['redirect']:'';
    return $data;
}

function _getHashToken($key){
    return md5($key.'akilliphone');
}
function _verifyHashToken($key, $hash_token){
    return $hash_token == md5($key.'akilliphone');
}
function addPaymentLog($payment_type, $response, $order, $basket ){
    try {
        //$order_id = isset($response['data']) && isset($response['data']['orderId'])?$order['data']['orderId']:0;
        $response = json_encode($response, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $order = json_encode($order, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $basket = json_encode($basket, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        DB::table('payment_logs')->insert([
            'order_id'=>0,
            'payment_type'=>$payment_type,
            'response'=>$response,
            'order_data'=>$order,
            'basket'=>$basket
        ]);
    } catch (\Exception $exception){

    }
}
?>
