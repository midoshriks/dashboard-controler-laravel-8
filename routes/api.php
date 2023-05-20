<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassPortController;
use App\Http\Controllers\Api\LevelsApiController;
use App\Http\Controllers\Api\HelpersApiController;
use App\Http\Controllers\Api\OrdersApiController;
use App\Http\Controllers\Api\PagesApiController;
use App\Http\Controllers\Api\ProductsApiController;
use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\Api\WalletLogApiController;

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

Route::post('/register', [PassPortController::class, 'register']);
Route::post('/login', [PassPortController::class, 'login']);

// @change here
Route::post('/otp', [PassPortController::class, 'otp']);
Route::post('/resetOtpData', [PassPortController::class, 'resetOtpData']);
// @endChange


Route::middleware('auth:api')->group(function () {
    // });

    // user logout
    Route::post('/logout', [PassPortController::class, 'logout']);

    // User  insert level
    Route::group(['prefix' => 'user'], function () {
        Route::post('level', [UsersApiController::class, 'insertlevel']); // insert level to user
        Route::put('/', [UsersApiController::class, 'update']); // update user
        Route::get('/bucksValues', [UsersApiController::class, 'bucksValues']); // get user buck value
    });
    Route::apiResource('user', UsersApiController::class);

    // Levels
    Route::apiResource('level', LevelsApiController::class);

    // Prodect coin & helpers
    Route::apiResource('coin', ProductsApiController::class); // get coins
    Route::apiResource('helper', HelpersApiController::class); // get helpers

    // Orders
    Route::apiResource('order', OrdersApiController::class); // order

    // Wallets
    Route::group(['prefix' => 'wallet'], function () {
        Route::get('{id}', [WalletLogApiController::class, 'show']); // get jas an wallet
    });

    Route::resource('walletLog', WalletLogApiController::class); // create a new walletLog
    Route::resource('pages', PagesApiController::class); // view pages in app
});


// Route::group(['prefix' => 'dashboard'], function () {
//     // User  insert level
//     Route::post('/level/user', [UsersApiController::class, 'insertlevel']);
//     Route::post('/update/user/{id}', [UsersApiController::class, 'update']);


//     // Levels
//     Route::get('/levels', [LevelsApiController::class, 'index']);
//     Route::post('/create/level', [LevelsApiController::class, 'store']);
//     Route::get('/level/{id}', [LevelsApiController::class, 'show']);
//     Route::put('/update/level/{id}', [LevelsApiController::class, 'update']);
//     Route::delete('/delete/level/{id}', [LevelsApiController::class, 'destroy']);

//     // Prodect coin & helpers
//     Route::get('/products/coins', [ProductsApiController::class, 'index']);
//     Route::get('/products/coin/{id}', [ProductsApiController::class, 'show']);

//     Route::get('products/helpers', [HelpersApiController::class, 'index']);
//     Route::get('products/helper/{id}', [HelpersApiController::class, 'show']);

//     // Orders
//     Route::post('create/order',[OrdersApiController::class, 'store'] );
//     Route::get('user/orders/{id}',[OrdersApiController::class, 'show'] );

//     // Wallets
//     Route::post('used/user/wallet', [WalletsApiController::class, 'store']);
// });
