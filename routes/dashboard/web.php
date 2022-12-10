<?php
// <!-- // @mido_shriks -->

use App\Http\Controllers\Dashboard\AnswersController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DeveloperController;
use App\Http\Controllers\Dashboard\HelpersController;
use App\Http\Controllers\Dashboard\LanguagesController;
use App\Http\Controllers\Dashboard\LevelsController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\PagesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\ProfilesController;
use App\Http\Controllers\Dashboard\QuestionsController;
use App\Http\Controllers\Dashboard\SendMailslController;
use App\Http\Controllers\Dashboard\SettingslController;
use App\Http\Controllers\Dashboard\TypesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Mail\SendMailAds;
use App\Mail\SendMailAuth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// function IPtoLocation($ip)
// {
//     $ipData = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
//     return !empty($ipData) && $ipData['status'] == 'success' ? $ipData : false;
// }

// welcome page Starat Login dashboard
Route::get('/', function () {
    // dd(IPtoLocation($_SERVER['REMOTE_ADDR']));
    return view('auth.login');
});

// Route::get('/run', function () {
//     $run = Artisan::call('schedule:run');
//     dd($run);
//     return 'run backub';
// });

// Route::get('/send', function () {
//     $name = 'mido';
//     $title = 'mido';
//     $body = 'body oooooooooooooooo';
//     Mail::to('midoshriks36@gmail.com') //samirasaeed660@gmail.com // mom.enlsyd@gmail.com
//     // ->send(new SendMailAuth($name));
//     ->send(new SendMailAds($name,$title,$body));
//     return "send ";
// });


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
            Route::resource('/languages', 'LanguagesController')->except(['create', 'store', 'show']);
            // developers
            Route::resource('/developers', 'DeveloperController');

            // Users
            Route::resource('/users', 'UsersController');
            Route::put('/user/active/{id}', 'UsersController@updatestatus')->name('user.active');
            // show blade wite role users
            Route::get('/user/admin', 'UsersController@admin')->name('users.admin');
            Route::get('/user/gaming', 'UsersController@gaming')->name('users.gaming');
            Route::get('/user/export', 'UsersController@export')->name('users.export');

            // Profile
            Route::get('/profile/show/{id}', 'ProfilesController@index')->name('profiles.show');


            // Levels
            Route::resource('/levels', 'LevelsController');

            // Products
            Route::resource('/products', 'ProductsController');

            // Helpers
            Route::resource('/helpers', 'HelpersController');
            Route::put('/helpers/active/{id}', 'HelpersController@updatestatus')->name('helper.active');

            // Questions
            Route::resource('/questions', 'QuestionsController');
            Route::post('questions/imoprt', 'QuestionsController@import')->name('questions.import');
            Route::get('/qouestions/export/', 'QuestionsController@export')->name('questions.export');
            Route::get('/qouestions/export/demo/', 'QuestionsController@export_demo')->name('questions.export.demo');
            Route::delete('/qouestions/delets/', 'QuestionsController@delets')->name('questions.delets');

            // Orders
            Route::resource('/orders', 'OrdersController');
            Route::put('/order/active/{id}', 'OrdersController@active_order')->name('order.active');

            // Settings
            Route::resource('/settings', 'SettingslController');

            // Send Mails All Users
            Route::resource('send/mail', 'SendMailslController');

            // Pages
            Route::resource('pages', 'PagesController');
            Route::put('/page/active/{id}', 'PagesController@stauts')->name('page.active');

            // Types
            Route::resource('/types', 'TypesController');



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
