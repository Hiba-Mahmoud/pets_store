<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('login', [AdminController::class,'loginForm'])->name('login');
Route::post('admin-login', [AdminController::class,'login'])->name('admin-login');

// 'middleware'=>'auth'

Route::Group([],function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('show-add-admin-form',[AdminController::class,'addAdminForm'])->name('show-add-admin-form');
    Route::post('add-admin',[AdminController::class,'addAdmin'])->name('add-admin');

});
