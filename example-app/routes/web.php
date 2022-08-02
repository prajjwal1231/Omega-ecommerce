<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\LoginuserController;
use App\Http\Controllers\PriceFilterController;
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

// Route::get('/', function () {
//     echo "Welcome to laravel project";
// });

Auth::routes(['verify'=>true]);
Route::get('/home',[FrontendController::class,'index']);

//admin
Route::get('admin/dashboard',[DashboardController::class,'index']);

//admin/category controller
Route::get('admin/category',[CategoryController::class,'index']);
Route::post('admin/category/store',[CategoryController::class,'store']);
Route::get('admin/category',[CategoryController::class,'display']);
Route::get('admin/category/view/{id}',[Categorycontroller::class,'view']);
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('admin/category/update',[CategoryController::class,'update']);
Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);

//admin/banner controller
Route::get('admin/banner',[BannerController::class,'index']);
Route::post('admin/banner/store',[BannerController::class,'store']);
Route::get('admin/banner',[BannerController::class,'display']);
Route::get('admin/banner/view/{id}',[BannerController::class,'view']);
Route::get('admin/banner/edit/{id}',[BannerController::class,'edit']);
Route::post('admin/banner/update',[BannerController::class,'update']);
Route::get('admin/banner/delete/{id}',[BannerController::class,'delete']);

//admin/product controller

Route::post('admin/product/store',[ProductController::class,'store']);
Route::get('admin/product',[ProductController::class,'display']);
Route::get('admin/product/view/{id}',[ProductController::class,'view']);
Route::get('admin/product/edit/{id}',[ProductController::class,'edit']);
Route::post('admin/product/update',[ProductController::class,'update']);
Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);

//admin/product/add_image controller
Route::get('admin/product/add_image/{id}',[ProductController::class,'add_image']);
Route::post('admin/product/image_update',[ProductController::class,'image_update']);
Route::get('admin/product/add_image/delete/{id}',[ProductController::class,'add_image_delete']);

//ordercontroller
Route::get('admin/orders',[OrderController::class,'view_orders']);
Route::get('admin/orders/view_order_details/{id}',[OrderController::class,'order_details']);

//frontend controller
Route::get('/',[FrontendController::class,'index']);
Route::get('/product_detail/{id}',[FrontendController::class,'product_detail']);
Route::get('/cart',[FrontendController::class,'cart']);
Route::get('/cart_delete/{id}',[FrontendController::class,'cart_delete']);
Route::post('/addtocart',[FrontendController::class,'add_to_cart']);
//->middleware('verified');
Route::get('/checkout',[FrontendController::class,'checkout']);
Route::get('/place_order',[FrontendController::class,'place_order']);
Route::get('/category/{id}',[FrontendController::class,'product_category']);
Route::get('/thanks',[FrontendController::class,'thanks']);
//search
Route::get('/product_search',[FrontendController::class,'product_search']);
//productfilter
Route::any('/product-shop', [PriceFilterController::class, 'productshop'])->name('product.shop');

//login controller
Route::get('/user_login',[LoginuserController::class,'login_user']);
Route::post('/sign_up',[LoginuserController::class,'sign_up']);
Route::post('/login_submit',[LoginuserController::class,'login_submit']);
Route::get('/user_logout',[LoginuserController::class,'user_logout']);
Route::get('/user_account',[LoginuserController::class,'user_account']);
Route::get('/user_profile',[LoginuserController::class,'user_profile']);
Route::get('/user_address',[LoginuserController::class,'user_address']);
Route::get('/user_passwordchange',[LoginuserController::class,'user_passwordchange']);
Route::post('/password_updated',[LoginuserController::class,'password_updated']);
Route::get('/user_orders',[LoginuserController::class,'user_orders']);
Route::get('/add_user_address',[LoginuserController::class,'add_user_address']);
//invoice
Route::get('/invoice/{id}',[LoginuserController::class,'invoice']);

//paytm callback
Route::post('/paytm-callback', [FrontendController::class,'paytmCallback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
