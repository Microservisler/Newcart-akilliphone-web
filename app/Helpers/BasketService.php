<?php
namespace Akilliphone;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class BasketService{
    protected $basketId;
    protected $sessionId;
    public $userId;
    public $shippingAddress;
    public $billingAddress;
    public $orderType;
    public $basketItems=[];
    public $basketProductCount;
    public $basketItemCount;
    public $customer;
    public $basketSubtotals;
    public $total;
    public $alerts=[];
    protected $flashes=[];
    protected $created_dt;
    public $mini;
    public $table;
    public $freeShippingLimit;
    public $shippingBrand;
    public $shippingBrands;
    public $lastVieweds = [];
    const lastShippingHour=17;
    function __construct() {
        $this->basketSubtotals = [
            'products'=>[],
            'shipping'=>[]
        ];
        $this->created_dt = date('Y-m-d H:i:s');
        $this->freeShippingLimit = 200;
        $this->shippingBrands = [
            'aras'=>[
                'code'=>'aras',
                'title'=>'Aras Kargo',
                'icon'=> url('assets/images/aras.svg'),
                'price'=>50,
                'checked'=>'checked',
            ]
        ];
    }
    static function clear(){
        $basket = new  BasketService();
        session()->put('basket', $basket);
    }
    static function addProduct($variyant, $quantity, $fixQuantity=false){

        $quantity = (int)$quantity;
        $basket = self::getBasket();
        if($quantity===0){
            unset($basket->basketItems[$variyant['variantId']]);
        }elseif(empty($quantity)){
            $basket->flashes[] = 'Ürün adedi enaz 1 olmalıdır';
        } elseif($quantity>10){
            $basket->flashes[] = 'İstenen adetde ürün sağlanamamıyor ';
        } else {
            if(isset($basket->basketItems[$variyant['variantId']])){
                if($fixQuantity){
                    $basket->basketItems[$variyant['variantId']]['quantity'] = $quantity;
                } else {
                    $basket->basketItems[$variyant['variantId']]['quantity'] += $quantity;
                }
                $basket->basketItems[$variyant['variantId']]['total'] = $variyant['price'] * $basket->basketItems[$variyant['variantId']]['quantity'];
            } else {
                $basket->basketItems[$variyant['variantId']] = [
                    'productId' => $variyant['productId'],
                    'variantId' => $variyant['variantId'],
                    'optionId' => $variyant['variantOptions']? $variyant['variantOptions'][0]['variantOptionId']:0,
                    'code' => $variyant['code'],
                    'url' => getProductUrl($variyant['product']),
                    'featuredImage' => getProductImageUrl($variyant['featuredImage'], 100,100),
                    'name' => $variyant['name'],
                    'price' => $variyant['price'],
                    'quantity' => $quantity,
                    'total' => $variyant['price'] * $quantity,
                    'discount'=>0,
                    'productName' => $variyant['product']['name'],
                    'productCode' => $variyant['product']['code'],
                    'itemType' => 'product',
                    'alert' => [],
                ];
            }
        }
        self::setBasket($basket);
    }
    static function removeProduct($idVariyant){
        $basket = self::getBasket();
        unset($basket->basketItems[$idVariyant]);
        self::setBasket($basket);
    }
    static function setShipping($brand){
        $basket = self::getBasket();
        $basket->shippingBrand = "";
        if(isset($basket->shippingBrands[$brand] )){
            $basket->shippingBrand =  $brand;
            $basket->basketSubtotals['shipping'] = [
                'code'=>'shipping',
                'title'=>$basket->shippingBrands[$brand]['title'],
                'total'=>$basket->shippingBrands[$brand]['price'],
            ];
            $basket->shippingBrands[$brand]['checked'] = 'checked';
        }
        self::setBasket($basket);
    }
    static function getBasket(){
        $basket = session()->get('basket');
        if(empty($basket)){
            $basket = new  BasketService();
            session()->put('basket', $basket);
        }
        return $basket;
    }
    static function setBasket($basket){
        if(empty($basket)){
            $basket = new  BasketService();
        }
        $basket = self::calculateBasket($basket);
        session()->put('basket', $basket);
        return $basket;
    }
    static function calculateBasket($basket){
        $sub_total = 0;
        $item_count = 0;
        $total = 0;
        if($basket->basketItems){
            foreach($basket->basketItems as $basketItem){
                $sub_total += $basketItem['total'];
                $item_count += $basketItem['quantity'];
            }
            $basket->basketSubtotals['products'] = [
                'code'=>'products',
                'title'=>'Ürünler Toplamı (KDV Dahil)',
                'total'=> $sub_total,
            ];
        } else{
            $basket->basketSubtotals['products'] = [
                'code'=>'products',
                'title'=>'Ürünler Toplamı (KDV Dahil)',
                'total'=> 0,
            ];
            unset($basket->basketSubtotals['shipping']);
        }
        if( $sub_total<$basket->freeShippingLimit ){
            $basket->alerts['freeShippingLimit'] = [
                'class'=>'text-danger',
                'message'=>'Bedava Kargo İçin siparişinizi '.$basket->freeShippingLimit.' TL ye Tamamlayınız',
            ];
        } else {
            $basket->alerts['freeShippingLimit']  = [
                'class'=>'text-success',
                'message'=>'Kargo Bedava',
            ];
            unset($basket->basketSubtotals['shipping']);
        }
        if($basket->basketSubtotals){
            foreach($basket->basketSubtotals  as $basketSubtotal){
                if(isset($basketSubtotal['total'])){
                    $total += $basketSubtotal['total'];
                }
            }
        }
        foreach($basket->basketItems as $itekkey=>$basketItem){
            if($sub_total>=$basket->freeShippingLimit){
                $basketItem['alert'] = [
                    'class'=>'text-success',
                    'message'=>'Kargo Bedava',
                ];
            } else{
                $basketItem['alert'] = [];
            }
            $basket->basketItems[$itekkey] = $basketItem;
        }
        $basket->total = $total;
        $basket->basketItemCount = $item_count;
        $basket->productItemCount = count($basket->basketItems);
        $basket->mini = '<img width="26" height="25" src="'.url('assets/images/shopping-icon.svg').'" alt="">
<span class="counter">'.$basket->basketItemCount.'</span>';
        $basket->table = view('basket.table', ['basket'=>$basket ])->render();
        $basket->totals = view('basket.totals', ['basket'=>$basket ])->render();
        return $basket;
    }
    static function getBasketTable(){
        $data['basket'] = self::getBasket();
        return view('basket.table', $data)->render();
    }
    static function toArray(){
        return json_decode( json_encode(self::getBasket(), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT),1);
    }
    static function getItemCount(){
        $basket = self::getBasket();
        return $basket->basketItemCount;
    }
    static function getProductCount(){
        $basket = self::getBasket();
        return $basket->basketItemCount;
    }
    static function getShippingDayAlert(){
        if(date('w')==0){
            return "Pazartesi Günü Kargoda";
        } elseif(date('w')==7){
            if(date('H')< self::lastShippingHour){
                return "Bugün Kargoda";
            } else {
                return "Pazartesi Günü Kargoda";
            }
        } else{
            if(date('H')<self::lastShippingHour){
                return "Bugün Kargoda";
            } else {
                return "Yarın Kargoda";
            }
        }
    }
    static function setCustomer($customer){
        $customer = is_array($customer)?$customer:[];
        $basket = self::getBasket();
        $basket->customer = [
            'customerId' => isset($customer['customerId'])?$customer['customerId']:null,
            'code' => isset($customer['code'])?$customer['code']:null,
            'firstName' => isset($customer['firstName'])?$customer['firstName']:null,
            'lastName' => isset($customer['lastName'])?$customer['lastName']:null,
            'tcKimlik' => isset($customer['tcKimlik'])?$customer['tcKimlik']:null,
            'phone' => isset($customer['phone'])?$customer['phone']:null,
            'email' => isset($customer['email'])?$customer['email']:null,
        ];

        if($customerId=userInfo('id')){
            $basket->userId = $customerId;
            $basket->customer['customerId'] = $customerId;
            if(empty($basket->customer['firstName'])) $basket->customer['firstName'] = userInfo('firstName');
            if(empty($basket->customer['lastName'])) $basket->customer['lastName'] = userInfo('lastName');
            if(empty($basket->customer['tcKimlik'])) $basket->customer['tcKimlik'] = userInfo('tcKimlik');
            if(empty($basket->customer['phone'])) $basket->customer['phone'] = userInfo('telefon');
            if(empty($basket->customer['email'])) $basket->customer['email'] = userInfo('email');
        }
        self::setBasket($basket);
    }
    static function setShipingAddres($addresss){
        $addresss = is_array($addresss)?$addresss:[];
        $basket = self::getBasket();
        $basket->shippingAddress = [
            'customerId' => $basket->customer['customerId'],
            'countryId' => isset($addresss['countryId'])?$addresss['countryId']:null,
            'cityId' => isset($addresss['cityId'])?$addresss['cityId']:null,
            'districtId' => isset($addresss['districtId'])?$addresss['districtId']:null,
            'firstName' => isset($addresss['firstName'])?$addresss['firstName']:null,
            'lastName' => isset($addresss['lastName'])?$addresss['lastName']:null,
            'name' => isset($addresss['name'])?$addresss['name']:null,
            'description' => isset($addresss['description'])?$addresss['description']:null,
            'addressLine1' => isset($addresss['addressLine1'])?$addresss['addressLine1']:"",
            'addressLine2' => isset($addresss['addressLine2'])?$addresss['addressLine2']:"",
            'country' => isset($addresss['country'])?$addresss['country']:"",
            'city' => isset($addresss['city'])?$addresss['city']:"",
            'district' => isset($addresss['district'])?$addresss['district']:"",
            'zipCode' => isset($addresss['zipCode'])?$addresss['zipCode']:null,
            'latitude' => isset($addresss['latitude'])?$addresss['latitude']:null,
            'longitude' => isset($addresss['longitude'])?$addresss['longitude']:null,
            'placeId' => isset($addresss['placeId'])?$addresss['placeId']:null,
            'phone' => $basket->customer['phone'],
        ];
        self::setBasket($basket);
    }
    static function setBillingAddres($addresss, $invoiceType='bireysel'){
        $addresss = is_array($addresss)?$addresss:[];
        $basket = self::getBasket();
        $basket->billingAddress = [
            'customerId' => $basket->customer['customerId'],
            'countryId' => isset($addresss['countryId'])?$addresss['countryId']:null,
            'cityId' => isset($addresss['cityId'])?$addresss['cityId']:null,
            'districtId' => isset($addresss['districtId'])?$addresss['districtId']:null,
            'firstName' => isset($addresss['firstName'])?$addresss['firstName']:null,
            'lastName' => isset($addresss['lastName'])?$addresss['lastName']:null,
            'name' => isset($addresss['name'])?$addresss['name']:null,
            'description' => isset($addresss['description'])?$addresss['description']:null,
            'addressLine1' => isset($addresss['addressLine1'])?$addresss['addressLine1']:"",
            'addressLine2' => isset($addresss['addressLine2'])?$addresss['addressLine2']:"",
            'country' => isset($addresss['country'])?$addresss['country']:"",
            'city' => isset($addresss['city'])?$addresss['city']:"",
            'district' => isset($addresss['district'])?$addresss['district']:"",
            'zipCode' => isset($addresss['zipCode'])?$addresss['zipCode']:null,
            'latitude' => isset($addresss['latitude'])?$addresss['latitude']:null,
            'longitude' => isset($addresss['longitude'])?$addresss['longitude']:null,
            'placeId' => isset($addresss['placeId'])?$addresss['placeId']:null,
            'phone' => isset($addresss['phone'])?$addresss['phone']:$basket->customer['phone'],
            'company' => isset($addresss['company'])?$addresss['company']:null,
            'taxOffice' => isset($addresss['taxOffice'])?$addresss['taxOffice']:null,
            'taxNumber' => isset($addresss['taxNumber'])?$addresss['taxNumber']:null,
            'invoiceType' => $invoiceType,
        ];
        self::setBasket($basket);
    }

    static function setLastViewed($product){
        $basket = self::getBasket();
        if($product){
            if(count($basket->lastVieweds)>8){
                array_shift($basket->lastVieweds);
            }
            $basket->lastVieweds[$product['productId']] = $product;
        }
        self::setBasket($basket);
    }
    static function getLastVieweds(){
        $basket = self::getBasket();
        return $basket->lastVieweds;
    }
    static function getCountryName($countryId){
        if($countryId==2){
            return 'Türkiye';
        } elseif($countryId==4){
            return 'Kuzey Kıbrıs';
        }
        return 'Belirtilmemiş';
    }
    static function getCityName($cityId){
        if($cityId==2){
            return 'Türkiye';
        } elseif($cityId==4){
            return 'Kuzey Kıbrıs';
        }
        return 'Belirtilmemiş';
    }
    static function getDistrictName($districtId){
        if($districtId==2){
            return 'Türkiye';
        } elseif($districtId==4){
            return 'Kuzey Kıbrıs';
        }
        return 'Belirtilmemiş';
    }
}