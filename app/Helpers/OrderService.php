<?php
namespace Akilliphone;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class OrderService{
    public static function newOrder(){
        $order = new Order();
        return $order;
    }
    public static function currentOrder(){
        $order = new Order();
        $basket = \Akilliphone\BasketService::getBasket();
        $order->setBasket($basket);
        $order->setCustomer($basket->customer);
        $order->setBasketItems($basket->basketItems);
        $order->setBasketSubtotals($basket->basketSubtotals);
        $order->setShippingAddress($basket->shippingAddress);
        $order->setBillingAddress($basket->billingAddress);
        $order->orderStatusId = 27;
        $order->paymentTypeId = 5;
        $order->paymentStatusId = 3;
        return $order;

    }
}
class Order{
    public $customerId;
    public $paymentTypeId;
    public $orderStatusId;
    public $paymentStatusId;
    public $marketplaceId;
    public $orderNo;
    public $orderTotal;
    public $shippingCompany;
    public $shippingTrackingNumber;
    public $shippingTrackingUrl;
    public $marketplaceOrderId;
    public $marketplaceOrderCode;
    public $customer;
    public $shippingAddress;
    public $billingAddress;
    public $orderProducts;
    public $totals;
    public function __construct(){
        $this->customer = new  Customer();
        $this->billingAddress = [];
        $this->shippingAddress = [];
        $this->orderProducts = [];
        $this->totals = [];
    }
    public function setBasket($basket){
        if($basket){
            $this->customerId = $basket->userId;
            $this->paymentTypeId = null;
            $this->orderStatusId = null;
            $this->paymentStatusId = null;
            $this->marketplaceId = null;
            $this->orderNo = null;
            $this->orderTotal = $basket->total;
            $this->shippingCompany = 'Aras';//$basket->shippingBrand;
            $this->shippingTrackingNumber = "";
            $this->shippingTrackingUrl = "";
            $this->marketplaceOrderId = "";
            $this->marketplaceOrderCode = "";
        }
    }
    public function setBasketItems($basketItems){
        if($basketItems){
            foreach ($basketItems as $basketItem){
                $orderProduct = new OrderProduct();
                //$orderProduct->orderId = null;
                $orderProduct->productId = $basketItem['productId'];
                $orderProduct->variantId = $basketItem['variantId'];
                $orderProduct->optionId = $basketItem['optionId'];
                $orderProduct->quantity = $basketItem['quantity'];
                $orderProduct->total = $basketItem['total'];
                $this->orderProducts[] = $orderProduct;
            }
        }
    }
    public function setBasketSubtotals($BasketSubtotals){
        if($BasketSubtotals){
            foreach ($BasketSubtotals as $basketSubtotal){
                $oderTotal = new OderTotal();
                //$oderTotal->orderId = null;
                $oderTotal->code = $basketSubtotal['code'];
                $oderTotal->name = $basketSubtotal['title'];
                $oderTotal->value = $basketSubtotal['total'];
                $this->totals[] = $oderTotal;
            }
        }
    }
    public function setShippingAddress($address){
        $this->shippingAddress = $address;
    }
    public function setBillingAddress($address){
        $this->billingAddress = $address;
    }
    public function setCustomer($customer){
        $this->customer = $customer;
    }
}
class Customer{
    //public $orderId;
    public $customerId ;
    public $code;
    public $firstName;
    public $lastName;
    public $tcKimlik;
    public $phone;
    public $email;
}

class OrderProduct{
    //public $orderId;
    public $productId;
    public $variantId;
    public $optionId;
    public $quantity;
    public $total;
}
class OderTotal{
    //public $orderId;
    public $code;
    public $name;
    public $value;
}
