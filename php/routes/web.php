<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SystemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('website.landing');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/investment', function () {
    return view('investment');
});

Route::get('/financial-literacy', function () {
    return view('financial-literacy');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/savingincentives', function () {
    return view('savingincentives');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/manage', function(){
    return view('dashboard.pages.index');
    });

    Route::get('/notifications', function(){
    return view('dashboard.pages.notifications.notifications');
    });

    Route::get('/mark_as_read/{id}', [SystemController::class, 'mark_notification_as_read']);


    Route::get('/my-savings-account', [SystemController::class, 'show_my_savings_account']);
    Route::get('/account-financial-tips', [SystemController::class, 'show_financial_tips']);
    Route::get('/account-articles', [SystemController::class, 'show_articles']);
    Route::get('/account-transactions', [SystemController::class, 'show_transactions']);
    Route::get('/account-goals', [SystemController::class, 'show_goals']);
    Route::get('/account-achievements', [SystemController::class, 'show_archievements']);
    Route::get('/account-rewards', [SystemController::class, 'show_rewards']);
    Route::get('/account-goal-savings-calculator', [SystemController::class, 'show_savings_calculators']);


    Route::get('/account-add-goal', [SystemController::class, 'show_add_goal']);
    Route::post('/add-goal', [SystemController::class, 'add_goal']);

    Route::get('/account-add-transaction/{id}', [SystemController::class, 'show_add_transaction']);
    Route::post('/add-transaction', [SystemController::class, 'add_transaction']);


    Route::get('/account-add-financial-tip', [SystemController::class, 'show_add_financial_tip']);
    Route::post('/add-financial-tip', [SystemController::class, 'add_financial_tip']);

     Route::get('/account-add-article', [SystemController::class, 'show_add_article']);
    Route::post('/add-article', [SystemController::class, 'add_article']);



    Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
    });
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
