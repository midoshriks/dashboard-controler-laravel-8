<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassPortController;
use App\Http\Controllers\Api\LevelsApiController;
use App\Http\Controllers\Api\HelpersApiController;
use App\Http\Controllers\Api\OrdersApiController;
use App\Http\Controllers\Api\ProductsApiController;
use App\Http\Controllers\Api\WalletsApiController;

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

Route::post('/login', [PassPortController::class, 'login']);
Route::post('/register', [PassPortController::class, 'register']);

Route::middleware('auth:api')->group(function () {
});

Route::group(['prefix' => 'dashboard'], function () {
    // Levels
    Route::get('/levels', [LevelsApiController::class, 'index']);
    Route::post('/create/level', [LevelsApiController::class, 'store']);
    Route::get('/level/{id}', [LevelsApiController::class, 'show']);
    Route::put('/update/level/{id}', [LevelsApiController::class, 'update']);
    Route::delete('/delete/level/{id}', [LevelsApiController::class, 'destroy']);
    /// insert level user
    Route::post('insert/level/user', [LevelsApiController::class, 'insertlevel']);

    // Prodect coin & helpers
    Route::get('/products/coins', [ProductsApiController::class, 'index']);
    Route::get('/products/coin/{id}', [ProductsApiController::class, 'show']);

    Route::get('products/helpers', [HelpersApiController::class, 'index']);
    Route::get('products/helper/{id}', [HelpersApiController::class, 'show']);

    // Orders
    Route::post('create/order',[OrdersApiController::class, 'store'] );
    Route::get('user/orders/{id}',[OrdersApiController::class, 'show'] );

    // Wallets
    Route::post('used/user/wallet', [WalletsApiController::class, 'store']);
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/test', function () {
//     $user = User::all([
//         'first_name'
//     ]);
//     return response()->json($user,200);
// });
