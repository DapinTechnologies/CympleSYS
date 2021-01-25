<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageLinkController;
use App\Http\Controllers\MobileTokenController;
use App\Http\Controllers\ProductsUploadController; 
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
//register and log in the user and provide a token.
Route::post("register",[MobileTokenController::class, 'uregister']);

//Register the business account using this api.
Route::post("bizregister",[MobileTokenController::class, 'bregister']);
//login and generate a token.
Route::post("login",[MobileTokenController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/imageurl',[ImageLinkController::class, 'uploadImage']);
        //upload items and services. NB move these routes to sanctum authorized.
Route::post("upload",[ ProductsUploadController::class, 'uploadItem']);
Route::post("removeItem/{id}",[ProductsUploadController::class, 'removeItem']);
Route::post('update',[ProductsUploadController::class, 'updateItem']);
Route::get('list/{id?}',[ProductsUploadController::class, 'listItems']);
//group authorized routes.
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('search/{name?}',[ProductsUploadController::class, 'search']);
    Route::post('logout',[MobileTokenController::class, 'logout']);

    
    
    // Route::get('search/{name?}',[ProductsUploadController::class, 'search']);
    //update using the put method.
    
});