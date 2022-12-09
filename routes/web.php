<?php

use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Route;

use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AnimalTypeController;
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

Route::Group(['middleware' => 'guest'], function () {
    Route::get('login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('admin-login', [AdminController::class, 'login'])->name('admin-login');
});
// 'middleware'=>'auth'

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...


        Route::Group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
            Route::get('/', [AdminController::class, 'home'])->name('admin');
            Route::get('show-add-admin-form', [AdminController::class, 'addAdminForm'])->name('admin.show-add-admin-form');
            Route::post('add-admin', [AdminController::class, 'addAdmin'])->name('admin.add-admin');
            Route::get('index', [AdminController::class, 'index'])->name('index');
            Route::post('verify-email', [AdminController::class, 'verifyEmail'])->name('admin.verify-email');
            Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');


            ################ brands ########################


            Route::group(['prefix' => 'brands'], function () {
                Route::get('/', [BrandsController::class, 'index'])->name('brands.index');
                Route::get('create', [BrandsController::class, 'create'])->name('brands.create');
                Route::post('store', [BrandsController::class, 'store'])->name('brands.store');
                Route::get('edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
                Route::post('update/{id}', [BrandsController::class, 'update'])->name('brands.update');
                Route::post('delete/{id}', [BrandsController::class, 'destroy'])->name('brands.delete');
            });
            ###############brand ended ######################


            ############### categories ######################
            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
                Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
                Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
                Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
                Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
                Route::post('delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
            });

            ###############categories ended ###################

            ############### categories ######################
            Route::group(['prefix' => 'animals'], function () {
                Route::get('/', [AnimalController::class, 'index'])->name('animals.index');
                Route::get('create', [AnimalController::class, 'create'])->name('animals.create');
                Route::post('store', [AnimalController::class, 'store'])->name('animals.store');
                Route::get('edit/{id}', [AnimalController::class, 'edit'])->name('animals.edit');
                Route::post('update/{id}', [AnimalController::class, 'update'])->name('animals.update');
                Route::post('delete/{id}', [AnimalController::class, 'destroy'])->name('animals.delete');
            });
        });
            ###############categories ended ###################
            ############### categories ######################
            Route::group(['prefix' => 'animalTypes'], function () {
                Route::get('/', [AnimalTypeController::class, 'index'])->name('animalTypes.index');
                Route::get('create', [AnimalTypeController::class, 'create'])->name('animalTypes.create');
                Route::post('store', [AnimalTypeController::class, 'store'])->name('animalTypes.store');
                Route::get('edit/{id}', [AnimalTypeController::class, 'edit'])->name('animalTypes.edit');
                Route::post('update/{id}', [AnimalTypeController::class, 'update'])->name('animalTypes.update');
                Route::post('delete/{id}', [AnimalTypeController::class, 'destroy'])->name('animalTypes.delete');
            });

            ###############categories ended ###################
    });
