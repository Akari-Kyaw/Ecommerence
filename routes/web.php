<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('welcome');
});
//products
Route::get('/ecommerce',[ProductController::class,'newProduct'])->name('index');
Route::get('/ecommerce/search',[ProductController::class,'searchProduct'])->name('search');
Route::post('/ecommerce/search',[ProductController::class,'searchProduct'])->name('search');
Route::get('/ecommerce/product',[ProductController::class,'showProduct'])->name('product');
Route::get('/ecommerce/cartlist',[ProductController::class,'cartList'])->name('cartList');
Route::post('/ecommerce/cartlist/{id}',[ProductController::class,'addToCart'])->name('cart');
Route::get('/ecommerce/cartlistIn/{id}/{qty}',[ProductController::class,'increase'])->name('increase');
Route::get('/ecommerce/cartlist/{id}/{qty}',[ProductController::class,'decrease'])->name('decrease');
Route::get('/ecommerce/cartlist/{id}',[ProductController::class,'remove'])->name('remove');
Route::get('/ecommerce/detail{id}',[ProductController::class,'detailProduct'])->name('detail');
Route::post('/ecommerce/checkout/{total}',[ProductController::class,'checkOut'])->name('checkOut');
Route::post('/ecommerce/currentOrder/',[ProductController::class,'currentOrder'])->name('currentPost');
Route::get('/ecommerce/currentorder',[ProductController::class,'getOrder'])->name('currentOrder');
Route::get('/ecommerce/order',[ProductController::class,'orderHistory'])->name('order');

 
//user
Route::get('/ecommerce/register',[UserController::class,'register'])->name('register');
Route::post('/ecommerce/registerPost',[UserController::class,'registerPost'])->name('registerPost');
Route::get('/ecommerce/login',[UserController::class,'login'])->name('login');
Route::post('/ecommerce/loginPost',[UserController::class,'loginPost'])->name('loginPost');
Route::get('/ecommerce/contactus',[UserController::class,'contactMessage'])->name('contactus');
Route::post('/ecommerce/contactus',[UserController::class,'saveMessage'])->name('user.message');
// Route::get('/ecommerce/order',[UserController::class,'orderList'])->name('order');
// Route::get('/ecommerce/currentorder',[UserController::class,'orderCurrent'])->name('currentorder');
Route::get('/ecommerce/logout',[UserController::class,'logout'])->name('user.logout');

//admin
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::post('/admin',[AdminController::class,'indexPost'])->name('indexPost');

//adminpannel
Route::middleware([Admin::class])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/order',[AdminController::class,'order'])->name('adminorder');
    Route::get('/admin/product',[AdminController::class,'showProduct'])->name('adminproduct');
    Route::get('/admin/newproduct',[AdminController::class,'addProduct'])->name('add');
    Route::get('/admin/searchproduct',[AdminController::class,'searchProduct'])->name('adminsearch');
    Route::get('/admin/customer',[AdminController::class,'customer'])->name('customer');
    Route::get('/admin/customer/{user_id}',[AdminController::class,'userDelete'])->name('delete');
    Route::get('/admin/sale',[AdminController::class,'sale'])->name('sale');
    Route::get('/admin/message',[AdminController::class,'message'])->name('message');
    Route::get('/admin/message/{msg_id}',[AdminController::class,'messageDelete'])->name('message.Delete');
    Route::post('/admin/Account',[AdminController::class,'createAccount'])->name('create');
    Route::get('/admin/account',[AdminController::class,'account'])->name('account');
    Route::get('/admin/profile',[AdminController::class,'profile'])->name('profile');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin/delete/{detailId}',[AdminController::class,'delete'])->name('delete');
    Route::get('/admin/edit/{pid}/{detailId}',[AdminController::class,'edit'])->name('edit');
    Route::post('/admin/product/{pid}/{detailId}',[AdminController::class,'update'])->name('update');
    Route::post('/admin/upload',[AdminController::class,'upload'])->name('upload');
    Route::post('/admin/add',[AdminController::class,'saveProduct'])->name('saveProduct');
    Route::get('/admin/order/{order_id}',[AdminController::class,'changeStatus'])->name('status');
    Route::get('/admin/addDetail',[AdminController::class,'newColor'])->name('newColor');
    Route::post('/admin/addDetail',[AdminController::class,'saveDetail'])->name('saveDetail');








});






