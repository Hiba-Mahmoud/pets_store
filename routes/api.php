<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GeneralController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::Group(['prefix' => 'clients'], function () {

    Route::get('/categories', [GeneralController::class, 'categories']);
    Route::get('/brands', [GeneralController::class, 'brands']);
    Route::get('/animals', [GeneralController::class, 'animals']);



});




// category=> products(food, supplies, toyes ,medical)
// amimal_type=> cats(cats_typs)
// animal =>(animal name)
// animal =>(animal name)
// products =>(name , description ,price , brand _id, category_id,animal_id,amount,image)
// cart =>(client_id,product_id)
// favourit =>(client_id,product_id)
// comments =>(clientNmae , email ,comment,product_id)
// $coupons = Coupon::query()
//             ->when(\request()->keyword != null, function ($query) {
//                 $query->search(\request()->keyword);
//             })
//             ->when(\request()->status != null, function ($query) {
//                 $query->whereStatus(\request()->status);
//             })
//             ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
//             ->paginate(\request()->limit_by ?? 10);
