<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagaryController;
use App\Http\Middleware\adminAuth;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaxController;
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
    return view('welcome');
});
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name("admin.auth");
Route::group(['middleware'=>'admin_auth'],function(){

  //catagary
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/catagary',[CatagaryController::class,'index']);
    Route::get('admin/catagary/manag_catagary',[CatagaryController::class,'manag_catagary']);
    Route::get('admin/catagary/manag_catagary/{id}',[CatagaryController::class,'manag_catagary']);
    Route::post('admin/catagary/manag_catagary_procces',[CatagaryController::class,'manag_catagary_process'])->name('catagary.manag_catagary_procces');
    Route::get('admin/catagary/delete/{id}',[CatagaryController::class,'delete']);
    Route::get('admin/catagary/status/{status}/{id}',[CatagaryController::class,'status']);
 
  //coupon
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manag_coupon',[CouponController::class,'manag_coupon']);
    Route::get('admin/coupon/manag_coupon/{id}',[CouponController::class,'manag_coupon']);
    Route::post('admin/coupon/manag_coupon_procces',[CouponController::class,'manag_coupon_process'])->name('coupon.manag_coupon_procces');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);
   
 //size
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manag_size',[SizeController::class,'manag_size']);
    Route::get('admin/size/manag_size/{id}',[SizeController::class,'manag_size']);
    Route::post('admin/size/manag_size_procces',[SizeController::class,'manag_size_process'])->name('size.manag_size_procces');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);   

 //color
    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manag_color',[ColorController::class,'manag_color']);
    Route::get('admin/color/manag_color/{id}',[ColorController::class,'manag_color']);
    Route::post('admin/color/manag_color_procces',[ColorController::class,'manag_color_process'])->name('color.manag_color_procces');
    Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);  

//brand
    Route::get('admin/brand',[BrandController::class,'index']);
    Route::get('admin/brand/manag_brand',[BrandController::class,'manag_brand']);
    Route::get('admin/brand/manag_brand/{id}',[BrandController::class,'manag_brand']);
    Route::post('admin/brand/manag_brand_procces',[BrandController::class,'manag_brand_process'])->name('brand.manag_brand_procces');
    Route::get('admin/brand/delete/{id}',[BrandController::class,'delete']);
    Route::get('admin/brand/status/{status}/{id}',[BrandController::class,'status']);  

//tax
    Route::get('admin/tax',[TaxController::class,'index']);
    Route::get('admin/tax/manag_tax',[TaxController::class,'manag_tax']);
    Route::get('admin/tax/manag_tax/{id}',[TaxController::class,'manag_tax']);
    Route::post('admin/tax/manag_tax_procces',[TaxController::class,'manag_tax_process'])->name('tax.manag_tax_procces');
    Route::get('admin/tax/delete/{id}',[TaxController::class,'delete']);
    Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);  

//products
    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manag_product',[ProductController::class,'manag_product']);
    Route::get('admin/product/manag_product/{id}',[ProductController::class,'manag_product']);
    Route::post('admin/product/manag_product_procces',[ProductController::class,'manag_product_process'])->name('product.manag_product_procces');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
    Route::get('admin/product/product_attr_delete/{pid}/{id}',[ProductController::class,'product_attr_delete']);  
    Route::get('admin/product/product_image_delete/{pid}/{id}',[ProductController::class,'product_image_delete']);   

    Route::get('admin/logout',function(){
      session()->forget("ADMIN_LOG");
      session()->forget('ADMIN_ID');
      session()->flash("error","Logout successfully");
      return redirect('admin');
    });
   
});
