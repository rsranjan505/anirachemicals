<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
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


});
// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
