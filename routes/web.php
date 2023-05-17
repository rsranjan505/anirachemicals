<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\ResetPasswordRequestController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Vendor\VendorController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DearlershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

//pages
Route::get('/', [HomeController::class, 'index'])->name('/home');
Route::get('/about', [AboutController::class, 'index'])->name('/about');
Route::get('/product', [ProductsController::class, 'index'])->name('/product');
Route::get('/details/{name?}', [ProductDetailsController::class, 'index'])->name('/details/{name?}');
Route::get('/dealership', [DearlershipController::class, 'index'])->name('/dealership');
Route::get('/client', [ClientController::class, 'index'])->name('/client');
Route::get('/gallery', [GalleryController::class, 'index'])->name('/gallery');
Route::get('/career', [CareerController::class, 'index'])->name('/career');
Route::get('/contact', [ContactController::class, 'index'])->name('/contact');

Route::POST('/enquiry', [DearlershipController::class, 'enquiryForm'])->name('enquiry');
Route::POST('/contact/mail', [ContactController::class, 'contactEmail'])->name('contact/mail');

Route::get('/downloadfile', [ProductsController::class, 'downloadbrowser'])->name('downloadfile');

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

//admin section
// Auth::routes();

Route::post('/register', [AuthController::class, 'createUser'])->name('register');
Route::get('/login', [AuthController::class, 'loginview'])->name('user-login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

Route::get('/request-password', [ResetPasswordRequestController::class, 'reqForgotPasswordView'])->name("request-password-view");
Route::post('/request-password', [ResetPasswordRequestController::class, 'reqForgotPassword'])->name("request-password");
Route::get('/reset-password/{token}', [ResetPasswordRequestController::class, 'resetPasswordView'])->name("reset-password-view");
Route::post('/reset-password', [ResetPasswordRequestController::class, 'updateForgotPassword'])->name("reset-password");
Route::get('/{token}/get-email-token', [ResetPasswordRequestController::class, 'getEmailFromToken'])->name("get-email-token");
Route::post('/logout', [AuthController::class, 'logout'])->name("logout");



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/city/{stateId}', [CityController::class, 'getCity'])->name('city-list');

Route::get('/download-image/{id}', [Controller::class, 'downloadImage'])->name('download-image');


Route::prefix('admin/')->middleware('auth','web')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //vendors
    Route::get('vendor', [VendorController::class, 'index'])->name('vendor');
    Route::post('vendor', [VendorController::class, 'store'])->name('vendor-save');
    Route::get('vendor-list', [VendorController::class, 'vendorList'])->name('vendor-list');
    Route::get('vendor-update/{id?}', [VendorController::class, 'edit'])->name('vendor-edit-view');
    Route::post('vendor-update', [VendorController::class, 'update'])->name('vendor-update');
    Route::get('vendor/change-status/{id}', [VendorController::class, 'changeStatus'])->name('vendor-status-change');
    Route::get('vendor/export', [VendorController::class, 'exportVendor'])->name('vendor-export');


    //users
    Route::get('user', [UserController::class, 'index'])->name('add-user-view');
    Route::post('user', [UserController::class, 'createUser'])->name('user-save');
    Route::get('user-list', [UserController::class, 'userList'])->name('user-list');
    Route::get('user-update/{id?}', [UserController::class, 'edit'])->name('user-edit-view');
    Route::post('user-update', [UserController::class, 'update'])->name('user-update');
    Route::get('user/change-status/{id}', [UserController::class, 'changeStatus'])->name('user-status-change');
    Route::get('user/setting', [UserController::class, 'settingView'])->name('setting-view');
    Route::post('user/change-password', [UserController::class, 'changePassword'])->name('change-password');



    //Products
    Route::get('product', [ProductController::class, 'productList'])->name('product-list');
    Route::get('product-add', [ProductController::class, 'index'])->name('product-add-view');
    Route::post('product-add', [ProductController::class, 'createProduct'])->name('product-save');
    Route::get('product-update/{id?}', [ProductController::class, 'edit'])->name('product-edit-view');
    Route::post('product-update', [ProductController::class, 'update'])->name('product-update');
    Route::get('product/change-status/{id}', [ProductController::class, 'changeStatus'])->name('product-status-change');

    Route::get('product/export', [ProductController::class, 'exportProduct'])->name('product-export');

     //orders
    Route::get('order/', [OrderController::class, 'orderList'])->name('order-list');
    Route::get('order-add', [OrderController::class, 'index'])->name('order-add-view');
    Route::post('order-add', [OrderController::class, 'createOrder'])->name('order-save');
    Route::get('order-update/{id?}', [OrderController::class, 'edit'])->name('order-edit-view');
    Route::post('order-update', [OrderController::class, 'update'])->name('order-update');
    Route::get('order/change-status/{id}', [OrderController::class, 'changeStatus'])->name('order-status-change');

    Route::get('order/vendor/{id}', [OrderController::class, 'getVendorId'])->name('order-vendor-show');
    Route::get('order/export', [OrderController::class, 'exportOrder'])->name('order-export');

    Route::get('order-items/{id}', [OrderController::class, 'ajaxOrderItemShow'])->name('order.items-show');
    Route::post('order-delivered', [OrderController::class, 'orderdelivered'])->name('order.delivered');

     //Visit
     Route::get('visit', [VisitController::class, 'visitList'])->name('visit');
     Route::get('visit-add', [VisitController::class, 'index'])->name('visit-add');
     Route::post('visit-add', [VisitController::class, 'createVisit'])->name('visit-save');
     Route::get('visit-update/{id?}', [VisitController::class, 'edit'])->name('visit-edit-view');
     Route::post('visit-update', [VisitController::class, 'update'])->name('visit-update');
     Route::get('visit-status-change/{id?}', [VisitController::class, 'statusChange'])->name('visit-status-change');
     Route::get('visit/export', [VisitController::class, 'exportVisit'])->name('visit-export');



      //Location District
    Route::prefix('cities')->group(function(){
        Route::get('/', [CityController::class, 'cityList'])->name('cities-list');
        Route::get('add', [CityController::class, 'index'])->name('cities-add');
        Route::post('add', [CityController::class, 'createVisit'])->name('cities-save');
        Route::get('update/{id?}', [CityController::class, 'edit'])->name('cities-edit-view');
        Route::post('update', [CityController::class, 'update'])->name('cities-update');
        Route::get('status-change/{id?}', [CityController::class, 'statusChange'])->name('cities-status-change');
    });



});
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
