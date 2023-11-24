<?php
class KargoService
{
    public static function getSetting($firma){
        $setting['aras'] = [
            'username'=>'akilliphone',
            'userpass'=>'sibel1234'
        ];
    }
    public static function kayitAc($order, $firma=false){
        $result = [
            'status'=>0,
            'message'=>'',
            'data'=>[]
        ];
        if(empty($firma)) $firma = $order['shippingCompany'];
        if($firma ){
            if($firma=='aras'){
                $result = self::kayitAcAras();
            } else {
                $result['message'] = $firma.' için method bulunamadı';
            }
        } else{
            $result['message'] = 'sipariş için kargo firması bulunamadı';
        }
        return $result;
    }
}
