<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\location\CityController as LocationCityController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\Product\PackingSizeController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\ResetPasswordRequestController;
use App\Http\Controllers\Admin\Setting\DepartmentController;
use App\Http\Controllers\Admin\Setting\DesignationController;
use App\Http\Controllers\Admin\Setting\TeamController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Vendor\VendorController;
use App\Http\Controllers\Admin\Visit\VisitController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DearlershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductPriceLogController;
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

Route::get('/dashboard-demo', [DashboardController::class,'index_demo'])->name('dashboard-analytics');

//pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/product', [ProductsController::class, 'index'])->name('product');
Route::get('/details/{name?}', [ProductDetailsController::class, 'index'])->name('product.details');
Route::get('/dealership', [DearlershipController::class, 'index'])->name('dealership');
Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

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

Route::get('/download-image/{id}', [Controller::class, 'downloadImage'])->name('download-image');


Route::prefix('admin/')->middleware('auth','web')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Departments
    Route::resource('departments', DepartmentController::class);
    Route::get('departments/change-status/{id}', [DepartmentController::class, 'changeStatus'])->name('departments-status-change');
    Route::resource('designation', DesignationController::class);
    Route::get('designation/change-status/{id}', [DesignationController::class, 'changeStatus'])->name('designation-status-change');
    Route::resource('team', TeamController::class);
    Route::get('team/change-status/{id}', [TeamController::class, 'changeStatus'])->name('team-status-change');

    Route::resource('roles', RoleController::class);

    Route::resource('location/city', LocationCityController::class);
    Route::get('city/{state_id}', [LocationCityController::class, 'getCity'])->name('city.state');
    //vendors
    Route::resource('vendor', VendorController::class);
    Route::get('vendor/change-status/{id}', [VendorController::class, 'changeStatus'])->name('vendor.status.change');
    Route::post('vendor/export', [VendorController::class, 'exportVendor'])->name('vendor.export');
    Route::get('vendor/details/{id}', [VendorController::class, 'findById'])->name('vendor.details');

    //users
    Route::get('user', [UserController::class, 'index'])->name('admin-user-add');
    Route::post('user', [UserController::class, 'createUser'])->name('admin-user-save');
    Route::get('user-list', [UserController::class, 'userList'])->name('admin-user-list');
    Route::get('user-view/{id?}', [UserController::class, 'show'])->name('admin-user-show');
    Route::get('user-update/{id?}', [UserController::class, 'edit'])->name('admin-user-edit');
    Route::post('user-update', [UserController::class, 'update'])->name('admin-user-update');
    Route::get('user/change-status/{id}', [UserController::class, 'changeStatus'])->name('admin-user-status-change');
    Route::get('user/setting', [UserController::class, 'settingView'])->name('setting-view');
    Route::post('user/change-password', [UserController::class, 'changePassword'])->name('admin-user-change-password');
    Route::get('user-delete/{id}', [UserController::class, 'deleteUser'])->name('admin-user-delete');
    Route::get('user-profile', [UserController::class, 'profile'])->name('user-profile');
    Route::post('team-assigned', [UserController::class, 'assigendTeam'])->name('team.assigned');

    //Products
    Route::resource('product', ProductController::class);
    Route::get('product/change-status/{id}', [ProductController::class, 'changeStatus'])->name('product-status-change');
    Route::post('product/image/delete', [ProductController::class, 'deleteImge'])->name('product-image-delete');

    Route::get('product/export', [ProductController::class, 'exportProduct'])->name('product-export');

    Route::resource('packing', PackingSizeController::class);
    Route::get('packing/change-status/{id}', [PackingSizeController::class, 'changeStatus'])->name('packing-status-change');
    Route::resource('pricelog', ProductPriceLogController::class);

    //orders

    Route::resource('order', OrderController::class);
    Route::get('products-packing-size/{product_id}', [OrderController::class, 'getpackingsize'])->name('product.packing');
    // Route::get('order/', [OrderController::class, 'orderList'])->name('order-list');
    // Route::get('order-add', [OrderController::class, 'index'])->name('order-add-view');
    // Route::post('order-add', [OrderController::class, 'createOrder'])->name('order-save');
    // Route::get('order-update/{id?}', [OrderController::class, 'edit'])->name('order-edit-view');
    // Route::post('order-update', [OrderController::class, 'update'])->name('order-update');
    Route::get('order/change-status/{id}', [OrderController::class, 'changeStatus'])->name('order-status-change');

    Route::get('order/vendor/{id}', [OrderController::class, 'getVendorId'])->name('order-vendor-show');
    Route::get('order/export', [OrderController::class, 'exportOrder'])->name('order-export');

    Route::get('order-items/{id}', [OrderController::class, 'ajaxOrderItemShow'])->name('order.items-show');
    Route::post('order-delivered', [OrderController::class, 'orderdelivered'])->name('order.delivered');
    Route::get('order/change-status/{id}', [OrderController::class, 'cancelOrder'])->name('visit.change.status');
     //Visit
    Route::resource('visit', VisitController::class);
    Route::post('visit-status-update', [VisitController::class, 'statusUpdate'])->name('visit.status.update');
    Route::post('visit/export', [VisitController::class, 'exportVisit'])->name('visit.export');

    //enquiry
    Route::resource('enquiry', EnquiryController::class);
    Route::post('enquiry/export', [EnquiryController::class, 'exportEnquiry'])->name('enquiry.export');

    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');

});
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
