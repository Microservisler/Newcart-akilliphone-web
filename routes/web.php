<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WebServiceController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BasketController;
use App\Http\Middleware\CheckUserToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/giris-yap', [PageController::class, 'login'])->name('login');
Route::get('/bayi-giris', [PageController::class, 'bayi_login'])->name('bayi.login');
Route::get('/bayi-uye-ol', [PageController::class, 'bayi_register'])->name('bayi.register');
Route::get('/register', [PageController::class, 'signUp'])->name('signUp');
Route::post('/register', [PageController::class, 'register'])->name('register');
Route::get('/reyonlar', [ListingController::class, 'index'])->name('listing.page');
Route::get('/reyonlar/{slug}', [ListingController::class, 'index'])->name('listing.reyonlar');
Route::get('/incele/{slug}', [ProductDetailController::class, 'index'])->name('product_detail.index');
Route::get('/sayfa/i/{page}', [PageController::class, 'index'])->name('page');
Route::get('/dropshipping', [HomeController::class, 'index'])->name('dropshipping');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/payment/step/{step}', [PaymentController::class, 'step'])->name('payment.step.get');
Route::post('/payment/step/{step}', [PaymentController::class, 'checkStep'])->name('payment.step.post');
Route::post('/payment/success', [PaymentController::class, 'validateSuccess'])->name('payment.success');
Route::post('/payment/fail', [PaymentController::class, 'validateFail'])->name('payment.fail');
Route::get('/payment/fail', [PaymentController::class, 'validateFail'])->name('payment.fail');
Route::post('/payment/iyzico-callback', [PaymentController::class, 'iyzicoCallback'])->name('payment.iyzico-callback');
Route::get('/thankyou/{orderId}/{orderNo}', [PaymentController::class, 'thankYou'])->name('thankyou');
Route::get('/local/brands/{function}', [LocalController::class, 'brands'])->name('local.brands.set');
Route::get('/local/home/{function}', [LocalController::class, 'home'])->name('local.home.set');
Route::post('/login', [PageController::class, 'auth'])->name('auth');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [PageController::class, 'forgot'])->name('forgot');

Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::get('/basket/mini', [BasketController::class, 'mini'])->name('basket.mini');
Route::get('/basket/add/{variyantId}/{quantity}', [BasketController::class, 'addProduct'])->name('basket.addProduct');
Route::get('/basket/set/{variyantId}/{quantity}', [BasketController::class, 'setProduct'])->name('basket.setProduct');
Route::get('/basket/remove/{variyantId}', [BasketController::class, 'removeProduct'])->name('basket.removeProduct');


Route::group(['prefix'=>'profile','as'=>'profile.', 'middleware' => [CheckUserToken::class]], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/address', [ProfileController::class, 'address'])->name('address');
    Route::get('/addressform', [ProfileController::class, 'addressform'])->name('addressform');
    Route::get('/addressedit/{addressId}', [ProfileController::class, 'addressEdit'])->name('addressEdit');
    Route::post('/addressedit/{addressId}', [ProfileController::class, 'addressEditUpdate'])->name('addressEdit');
    Route::post('/addressform', [ProfileController::class, 'addressformUpdate'])->name('addressform');
    Route::get('/orders', [ProfileController::class, 'profileOrders'])->name('orders');
    Route::get('/comments', [ProfileController::class, 'comments'])->name('comments');
    Route::get('/payments', [ProfileController::class, 'payments'])->name('payments');
    Route::get('/informations', [ProfileController::class, 'informations'])->name('informations');
    Route::post('/informations', [ProfileController::class, 'informationsUpdate'])->name('informations');
    Route::get('/coupons', [ProfileController::class, 'coupons'])->name('coupons');
    Route::get('/favorites', [ProfileController::class, 'favorites'])->name('favorites');
    Route::get('/orderdetail/{orderId}/', [ProfileController::class, 'orderdetail'])->name('orderdetail');

});
