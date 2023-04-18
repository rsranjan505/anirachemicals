<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Vendor\VendorController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DearlershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductsController;
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

Route::get('/register', [AuthController::class, 'registerview'])->name('user-register');
Route::get('/login', [AuthController::class, 'loginview'])->name('user-login');

Route::post('/auth/register', [AuthController::class, 'createUser'])->name('register');
Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/city/{stateId}', [CityController::class, 'getCity'])->name('city-list');

Route::prefix('admin/')->middleware('auth','web')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //vendors
    Route::get('vendor', [VendorController::class, 'index'])->name('vendor');
    Route::post('vendor', [VendorController::class, 'store'])->name('vendor-save');
    Route::get('vendor/list', [VendorController::class, 'vendorList'])->name('vendor-list');
    Route::get('vendor/update/{id?}', [VendorController::class, 'edit'])->name('vendor-edit-view');
    Route::post('vendor/update', [VendorController::class, 'update'])->name('vendor-update');
    Route::get('vendor/change-status/{id}', [VendorController::class, 'changeStatus'])->name('vendor-status-change');



    //users
    Route::get('user', [UserController::class, 'index'])->name('add-user-view');
    Route::post('user', [UserController::class, 'createUser'])->name('user-save');
    Route::get('user/list', [UserController::class, 'userList'])->name('user-list');
    Route::get('user/update/{id?}', [UserController::class, 'edit'])->name('user-edit-view');
    Route::post('user/update', [UserController::class, 'update'])->name('user-update');
    Route::get('user/change-status/{id}', [UserController::class, 'changeStatus'])->name('user-status-change');
    Route::get('user/setting', [UserController::class, 'settingView'])->name('setting-view');
    Route::post('user/change-password', [UserController::class, 'changePassword'])->name('change-password');


    //Products
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'productList'])->name('product-list');
        Route::get('/add', [ProductController::class, 'index'])->name('product-add-view');
        Route::post('/save', [ProductController::class, 'createProduct'])->name('product-save');

        Route::get('/edit/{id?}', [ProductController::class, 'edit'])->name('product-edit-view');
        Route::post('/update', [ProductController::class, 'update'])->name('product-update');
        Route::get('/change-status/{id}', [ProductController::class, 'changeStatus'])->name('product-status-change');

    });

     //Products
     Route::prefix('order')->group(function(){
        Route::get('/', [OrderController::class, 'orderList'])->name('order-list');
        Route::get('/add', [OrderController::class, 'index'])->name('order-add-view');
        Route::post('/save', [OrderController::class, 'createOrder'])->name('order-save');

        Route::get('/edit/{id?}', [OrderController::class, 'edit'])->name('order-edit-view');
        Route::post('/update', [OrderController::class, 'update'])->name('order-update');
        Route::get('/change-status/{id}', [OrderController::class, 'changeStatus'])->name('order-status-change');

    });



});
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
