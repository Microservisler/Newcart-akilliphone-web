<?php
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class PaymentService{
    const WEBSERVICE_SERVER = 'https://api.akilliphone.com/';
    static function finansAccount(){
        return [
            'MerchantPass' 		=> '46915477',
            'MerchantID'		=> '107800000008693',
            'UserCode'		    => 'akilliphone_api',
            'UserPass' 		    => 'x5jdi'
        ];
    }
    static function finansBankStart($basket, $cc){

        $finansBankCartData = self::finansBankCartData($basket, $cc);
        $url = 'https://vpos.qnbfinansbank.com/Gateway/Default.aspx';
        self::finansBankPostData($url, $finansBankCartData, []);

    }
    static function finansBankHash($data){
        $finansAccount = self::finansAccount();
        $hashstr = $data['MbrId']  . $data['OrderId']  . $data['PurchAmount']  . $data['OkUrl'] . $data['FailUrl'] . $data['TxnType'] . $data['InstallmentCount']  . $data['Rnd']  . $finansAccount['MerchantPass'];
        return base64_encode(pack('H*',sha1($hashstr)));
    }
    static function finansBankValidate($request, $basket){
        $validate['status'] = false;
        $validate['errors'] = [];
        if(isset($request['ErrMsg'])){
            $validate['errors'][] = $request['ErrMsg'];
        }
        if(isset($request['status']) && $request['status']==false){
            $validate['errors'] = array_merge($validate['errors'],  $request['errors']);
        }
        return $validate;
    }
    static function finansBankCartData($basket, $cc){

        $finansAccount = self::finansAccount();
        $CardHolderName = isset($cc['name'])?$cc['name']:'';
        $Pan = isset($cc['cardnumber'])?$cc['cardnumber']:'';
        $Expires = isset($cc['expirationdate'])?$cc['expirationdate']:'';
        $Cvv2 = isset($cc['securitycode'])?$cc['securitycode']:'';
        $basket->total = 0.50;
        $data['MbrId'] 		        = 5;
        $data['MerchantID'] 		= $finansAccount['MerchantID'];
        $data['UserCode'] 		    = $finansAccount['UserCode'];
        $data['UserPass'] 		    = $finansAccount['UserPass'];
        $data['SecureType'] 		= '3DPay';
        $data['TxnType'] 		    = 'Auth';
        $data['InstallmentCount']   = '0';
        $data['Currency'] 		    = '949';
        $data['OkUrl'] 		        =  route('payment.success');
        $data['FailUrl'] 		    = route('payment.fail');
        $data['OrderId'] 		    = '1234';
        $data['OrgOrderId'] 		= '';
        $data['PurchAmount'] 		= ''.round($basket->total, 2).'';
        $data['Lang'] 		        = 'TR';
        $data['CardHolderName']     = $CardHolderName;
        $data['Rnd'] 		        = microtime();
        $data['Hash'] 		    = self::finansBankHash($data);
        //
        $data['Pan'] 		= str_replace('-','', $Pan);
        $data['Cvv2'] 		=$Cvv2;
        $data['Expiry'] 	= str_replace('/','', $Expires);
        return $data;
    }
    static function finansBankPostData($url, array $data, array $headers = []){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, true); // remove body
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        //print_r($data);
        /*if( '' != request()->ip() ){
            echo "url: $url<br>";
            echo "data: <textarea>".print_r($data, 1)."</textarea><br>";
            echo "httpCode: $httpCode<br>";
            echo "result: <textarea>$response</textarea><br>";
            echo "Curl info: ";
            print_r(curl_getinfo($ch));
        }*/
        echo $response;
        die();
    }
}
