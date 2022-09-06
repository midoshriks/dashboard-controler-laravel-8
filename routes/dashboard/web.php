<!-- // @mido_shriks -->
<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


    // welcome page Starat Login dahboard
    Route::get('/', function (){
        return view('auth.login');
    });

Route::group(
    [
        'prefix' => 'LaravelLocalization'::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
            Auth::routes();

            // Dahsbboard
            Route::get('/index', 'DashboardController@index')->name('index');
        });
    }
);
