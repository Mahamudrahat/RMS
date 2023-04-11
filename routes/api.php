<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ApiRecipeController;
use App\Http\Controllers\UserListController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/register', 'App\Http\Controllers\API\UserController@registerUser');
Route::post('/login', 'App\Http\Controllers\API\UserController@loginUser');


/*Route::middleware('auth:api')->post('/recipeitem', function (Request $request) {
    return $request->user();
});*/



//Route::post('/recipeitem','App\\Http\\Controllers\\ApiRecipeController@update');
//Route::post('/userlist','App\\Http\\Controllers\\UserListController@createuserlist');
/*Route::middleware('auth:api')->prefix('v1')->group(function(){
    get('/user', function (Request $request) {
    return $request->user();
});
});
*/
//Route::get('/userdetail','App\\Http\\Controllers\\ApiRecipeController@list')->middleware('auth:api');

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
 });*/

//Route::controller(UserController::class)->group(function(){
  //  Route::post('/login','loginUser');
//});
//Route::post('/register', 'App\Http\Controllers\API\UserController@registerUser');


//Route::controller(UserController::class)->group(function(){
  //  Route::get('login','getuserDetail');
   // Route::get('logout','userLogout');
//})->middleware('auth:api');
/*Route::middleware('auth:api')->group( function () {
  Route::post('update', 'ApiRecipeController');
});*/

Route::group(['middleware' => ['web','auth:api']], function(){
            Route::get('userdetails/{id1}/{id2}','App\Http\Controllers\ApiRecipeController@list');
});
Route::group(['middleware' => ['web','auth:api']], function(){
    Route::post('/iteminsert','App\Http\Controllers\ApiRecipeController@update');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getUpazillaList','App\Http\Controllers\LocationController@getUpazillaList');
Route::get('getDistrictList','App\Http\Controllers\LocationController@getDistrictList');
Route::get('getDivisionList','App\Http\Controllers\LocationController@getDivision');
Route::get('getUpazillaMapid','App\Http\Controllers\LocationController@getUpazillaMapid');
Route::get('getIDMapUpazillaDistrictDivision','App\Http\Controllers\LocationController@getIDMapUpazillaDistrictDivision');
