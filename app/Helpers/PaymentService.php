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
    static function iyzicoOptions(){

        $options = new \Iyzipay\Options();

        $options->setApiKey('V62v1fnWq0F8IXmqkImIRjwIgCVuqAuf');
        $options->setSecretKey('xdHG8rRlSL28mmckdamzeLDh9FZPgRau');
        $options->setBaseUrl('https://api.iyzipay.com');

        $options->setApiKey('sandbox-afXhZPW0MQlE4dCUUlHcEopnMBgXnAZI');
        $options->setSecretKey('sandbox-wbwpzKIiplZxI3hh5ALI4FJyAcZKL6kq');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');
        return $options;
    }
    static function IyzicoPayment(){

        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId("B67832");
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("https://www.merchant.com/callback");
        $request->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905065989387");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");

        $request->setBuyer($buyer);
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;

        $secondBasketItem = new \Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");

        $basketItems[1] = $secondBasketItem;
        $thirdBasketItem = new \Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);
        $payment = \Iyzipay\Model\CheckoutFormInitialize::create($request, self::iyzicoOptions());
        print_r($payment);die();
    }
}

