<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassPortController;
use App\Http\Controllers\Api\LevelsApiController;
use App\Http\Controllers\Api\HelpersApiController;
use App\Http\Controllers\Api\OrdersApiController;
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

Route::middleware('auth:api')->group(function () {

    // user logout
    Route::post('/logout', [PassPortController::class, 'logout']);
    Route::group(['prefix' => 'dashboard'], function () {
        // User  insert level
        Route::group(['prefix' => 'user'], function () {
            Route::post('level', [UsersApiController::class, 'insertlevel']); // insert level to user
            Route::put('{id}', [UsersApiController::class, 'update']); // update user
        });

        // Levels
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelsApiController::class, 'index']); // get all levels
            Route::get('{id}', [LevelsApiController::class, 'show']); // get just a level
        });

        // Prodect coin & helpers
        Route::get('coin', [ProductsApiController::class, 'index']); // get coins
        Route::get('helper', [HelpersApiController::class, 'index']); // get helpers

        // Orders
        Route::group(['prefix' => 'order'], function () {
            Route::get('{id}', [OrdersApiController::class, 'show']); // get jas an order
            Route::post('/', [OrdersApiController::class, 'store']); // create a new order
        });

        // Wallets
        Route::post('wallet', [WalletLogApiController::class, 'store']); // create a new walletLog
    });
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
