<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\TransactionController;

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


Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::get('banners', [BannerController::class,'index']);

Route::get('providers', [ProviderController::class, 'index']);



 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('transactions', TransactionController::class);

    Route::post('/logout', [UserController::class, 'logout']);
    
    Route::resource('providers', ProviderController::class)->except('index');

    Route::resource('banks', BankController::class);
});




