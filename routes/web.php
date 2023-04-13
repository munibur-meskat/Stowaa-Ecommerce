<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\InventoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\RolePermissionController;
use App\Http\Controllers\Backend\ShippingConditionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserMetaController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;
use App\Models\UserProfile;

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

//Front-End route
    Route::controller(FrontendController::class)->name('frontend.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/user/login-signup', 'userlogin')->name('userlogin');
    });

    Route::controller(ShopController::class)->name('frontend.shop.')->group(function () {
    Route::get('/shop', 'allProducts')->name('allproduct');
    Route::get('/shop/{slug}', 'singleProduct')->name('single');

    Route::post('/product/size', 'singleProductSize')->name('single.size');
    Route::post('/product/single/options', 'singleProductOptions')->name('single.options');

    });

    Route::controller(CartController::class)->middleware(['auth', 'verified'])->name('frontend.cart.')->group(function () {

        Route::get('cart', 'index')->name('index');
        Route::post('cart/store', 'store')->name('store');
        Route::delete('cart/destroy/{cart}', 'destroy')->name('destroy');
        Route::post('cart/update', 'update')->name('update');

        Route::post('cart/coupon/apply', 'couponApply')->name('coupon.apply');
        Route::post('cart/apply/shipping', 'shippingApply')->name('shipping.apply');

        Route::get('checkout', 'checkoutOrder')->name('checkout.order');
    });

//Back-End route
//Auth route

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Auth::routes([
        'verify' => true
    ]);
    
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [BackendController::class, 'index'])->name('home');

    //Category all routes

    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {

    Route::get('/', 'index')->middleware(['role_or_permission:super-admin|admin|can see category'])->name('index');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{category}', 'edit')->name('edit');
    Route::put('/update/{category}', 'update')->name('update');
    Route::delete('/delete/{category}', 'destroy')->name('delete')->middleware('role_or_permission:super-admin|admin');
    Route::get('/restore/{id}', 'restore')->name('restore')->middleware('role_or_permission:super-admin|admin');
    Route::get('/permanent/delete/{id}', 'permanentDestroy')->name('permanent.destroy')->middleware('role_or_permission:super-admin|admin');
    });

    //Colour all routes

    Route::controller(ColorController::class)->prefix('color')->name('color.')->group(function () {

    Route::get('/', 'index')->middleware(['role_or_permission:super-admin|admin|can see colour'])->name('index');
    Route::post('/store', 'store')->name('store');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    //Size all routes

    Route::controller(SizeController::class)->prefix('size')->name('size.')->group(function () {
    Route::get('/', 'index')->middleware(['role_or_permission:super-admin|admin|can see size'])->name('index');
    Route::post('/store', 'store')->name('store');
    });

    //Product routes

    Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
        
    Route::get('/', 'index')->middleware(['role_or_permission:super-admin|admin'])->name('index');
    
    Route::get('/show/{product}', 'show')->middleware(['role_or_permission:super-admin|admin'])->name('show');

    Route::get('/create', 'create')->middleware(['role_or_permission:super-admin|admin'])->name('create');
    Route::post('/create', 'store')->name('store');

    Route::get('/edit/{product}', 'edit')->middleware(['role_or_permission:super-admin|admin'])->name('edit');
    Route::put('/update/{product}', 'update')->middleware(['role_or_permission:super-admin|admin'])->name('update');

    Route::delete('/destroy/{id}', 'destroy')->middleware(['role_or_permission:super-admin|admin'])->name('destroy');
    });

    //Inventory routes

    Route::controller(InventoryController::class)->prefix('product')->name('inventory.')->group(function () {

    Route::get('/inventory/{id}', 'index')->middleware(['role_or_permission:super-admin|admin'])->name('index');
    Route::post('/inventory', 'store')->middleware(['role_or_permission:super-admin|admin'])->name('store');
    
    Route::post('/inventory/size', 'selectSize')->middleware(['role_or_permission:super-admin|admin'])->name('select.size');
    });
    
    // role & permission route
    //super-admin route

    Route::controller(RolePermissionController::class)->prefix('role')->name('role.')->group(function () {

    Route::get('/', 'roleIndex')->middleware(['role_or_permission:super-admin|role show'])->name('index');

    Route::get('/create', 'roleCreate')->middleware(['role_or_permission:super-admin|role create'])->name('create');
    Route::post('/insert', 'roleInsert')->middleware(['role_or_permission:super-admin|role create'])->name('insert');

    Route::get('/edit/{id}', 'roleEdit')->middleware(['role_or_permission:super-admin|role edit'])->name('edit');
    Route::post('/edit/{id}', 'roleUpdate')->middleware(['role_or_permission:super-admin|role edit'])->name('update');

    //permission route

    Route::post('/permission', 'permissionInsert')->name('permission.insert');
    });
   
    //user-profile route

    Route::controller(UserMetaController::class)->prefix('user-profile')->name('user-profile.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('store/','store')->name('store');
    Route::get('/edit','edit')->name('edit');
    Route::put('/update','update')->name('update');
    Route::delete('/delete/{id}','destroy')->name('delete');
    });

    //user route

    Route::controller(UserController::class)->prefix('users')->name('user.')->group(function(){
    Route::get('/', 'index')->name('index')->middleware(['role_or_permission:super-admin|admin|editor|user show']);
    Route::get('/create', 'create')->name('create')->middleware(['role_or_permission:super-admin|admin|editor|user create']);
    Route::post('/store', 'store')->name('store')->middleware(['role_or_permission:super-admin|admin']);
    Route::get('/edit/{user}', 'edit')->name('edit');
    Route::put('/update/{user}', 'update')->name('update');
    Route::delete('/delete/{id}','destroy')->name('delete');

});

    Route::controller(CouponController::class)->prefix('coupon')->name('coupon.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/edit/{coupon}', 'edit')->name('edit');
    Route::put('/update/{coupon}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::get('/restore/{id}', 'restore')->name('restore');
    Route::delete('/permanent/delete/{id}', 'permanentDestroy')->name('permanent.destroy');
    });

    Route::controller(ShippingConditionController::class)->prefix('shipping/condition')->name('shipping.condition.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/edit/{shippingcondition}', 'edit')->name('edit');
    Route::put('/update/{shippingcondition}', 'update')->name('update');

    // Route::delete('/delete/{id}', 'destroy')->name('destroy');
    // Route::get('/restore/{id}', 'restore')->name('restore');
    // Route::delete('/permanent/delete/{id}', 'permanentDestroy')->name('permanent.destroy');
    });

});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


//Product table

// id
// user_id
// price
// sale_price
// image
// title 
// shot_description
// description 
// addtional info 
// price 
// sale price 
// discount (fixed or %)


// // many to many relation
// // category_product table

// id 
// category_id
// product_id

// //Product gallery
// id 
// product_id
// image 


// // Inventory table

// id 
// product_id
// colour_id
// size_id
// quantity
// additional_price

