<?php
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CuadrosController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;   


Route::resource('category',CategoryController::class)
            ->only(['index','show', 'update','store','destroy']);   

/**/Route::resource('cuadros',CuadrosController::class)
            ->only(['index','show', 'update','store','destroy']);   

/*Route::resource('register',AuthController::class)
            ->only(['register','login', 'userProfile','logout','allUser']);   
*/


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::get('user-profile',[AuthController::class,'userProfile']);
   
    Route::post('logout',[AuthController::class,'logout']);
});
