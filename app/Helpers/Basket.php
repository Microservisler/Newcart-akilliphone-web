<?php
namespace Akilliphone;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class Basket{
    protected $basketId;
    protected $sessionId;
    protected $userId;
    protected $shippingAddress;
    protected $invoiceAddress;
    protected $orderType;
    protected $basketItems;
    protected $basketSubtotals;
    protected $total;
    protected $errors;
    protected $flashs;
    function getBasketId(){

    }
    function setSessionId(){

    }
    function getSessionId(){

    }
    function setOrderType(){

    }
    function getOrderType(){

    }
    function addProduct($id, $quantity){

    }
    function deleteProduct($id, $quantity){

    }
    function addShippingMethod($method){

    }
    function deleteShippingMethod($method){

    }
    function loadShippingAddress($addressId){

    }
    function getShippingAddress(){

    }
    function setShippingAddress(){

    }
    function loadInvoiceAddress($addressId){

    }
    function getInvoiceAddress(){

    }
    function setInvoiceAddress(){

    }

}
