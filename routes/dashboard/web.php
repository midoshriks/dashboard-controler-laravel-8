<?php
// <!-- // @mido_shriks -->

use App\Http\Controllers\Dashboard\AnswersController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DeveloperController;
use App\Http\Controllers\Dashboard\HelpersController;
use App\Http\Controllers\Dashboard\LanguagesController;
use App\Http\Controllers\Dashboard\LevelsController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\QuestionsController;
use App\Http\Controllers\Dashboard\UsersController;
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
            // languages
            Route::resource('/languages', 'LanguagesController')->except(['create','store','show']);
            // developers
            Route::resource('/developers', 'DeveloperController');

            // Users
            Route::resource('/users', 'UsersController');
            Route::put('/user/active/{id}', 'UsersController@updatestatus')->name('user.active');

            // Levels
            Route::resource('/levels', 'LevelsController');

            // Products
            Route::resource('/products','ProductsController');

            // Helpers
            Route::resource('/helpers', 'HelpersController');
            Route::put('/helpers/active/{id}', 'HelpersController@updatestatus')->name('helper.active');

            // Questions
            Route::resource('/questions', 'QuestionsController');
            Route::post('questions/imoprt', 'QuestionsController@import')->name('questions.import');
            Route::get('qouestions/export/', 'QuestionsController@export')->name('questions.export');

            // Route::get('/tables', function() {
            //     return view('test_table');
            // });

            // Answers
            // Route::resource('/answers', 'AnswersController');
            // Route::get('/export','AnswersController@export')->name('export');
            // Route::post('/import','AnswersController@import')->name('import');
        });
    }
);

