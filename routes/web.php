<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::Group(['middleware'=>'guest'],function(){
Route::get('login', [AdminController::class,'loginForm'])->name('login');
Route::post('admin-login', [AdminController::class,'login'])->name('admin-login');
});
// 'middleware'=>'auth'

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...


Route::Group(['prefix'=>'admin','middleware'=>'auth'],function(){
    // Route::get('/', function () {return view('admin.dashboard'); })->name('admin');
    Route::get('/',[AdminController::class,'home'])->name('admin');
    Route::get('show-add-admin-form',[AdminController::class,'addAdminForm'])->name('admin.show-add-admin-form');
    Route::post('add-admin',[AdminController::class,'addAdmin'])->name('admin.add-admin');
    Route::get('index',[AdminController::class,'index'])->name('index');
    Route::post('verify-email',[AdminController::class,'verifyEmail'])->name('admin.verify-email');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
    ################ brands ########################
    Route::group(['prefix'=>'brands'],function(){
        Route::get('/',[BrandsController::class,'index'])->name('brands');
        Route::get('create',[BrandsController::class,'create'])->name('brands.create');
        Route::post('store',[BrandsController::class,'store'])->name('brands.store');
        Route::get('edit/{id}',[BrandsController::class,'edit'])->name('brands.edit');
        Route::post('update/{id}',[BrandsController::class,'update'])->name('brands.update');
        Route::post('delete/{id}',[BrandsController::class,'destroy'])->name('brands.delete');

    });
});
});
