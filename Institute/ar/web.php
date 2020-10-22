<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(app()->getLocale());
});


Route::group(
    [
    'prefix' => '{المكان؟}', 
    'where' => ['المكان' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'
   ], function(){
    
    //Site 

    Route::get('/', 'Site\IndexController@index')->name('index');

    Route::get('/institute', 'Site\InstituteController@index')->name('institute');

    Route::get('/join-team', 'Site\JoinTeamController@index')->name('join-team');
    // Route::get('/join-team', ['Site\JoinTeamController', 'index'])->name('join-team');


    Route::get('/formations', 'Site\FormationsController@index')->name('formations');

    Route::get('/think-tank', 'Site\ThinkTankController@index')->name('think-tank');

    Route::get('/privacy-policy', 'Site\PagesController@privacyPolicy')->name('privacy-policy');

    Route::get('/use-terms', 'Site\PagesController@useTerms')->name('use-terms');
   
    Route::get('/blog', 'Site\PagesController@useTerms')->name('use-terms');


    //Blog
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'BlogController@index')->name('blog');
        Route::get('/{slug}', 'BlogController@single')->name('blog-single');
        Route::get('/{id}', 'BlogController@category')->name('blog-category');
    });

    //Contact-us

    Route::get('/contact-us', 'Site\ContactController@index')->name('contact-us');

    //Auth
    Auth::routes();
    Route::get('/logout', 'Dashboard\HomeController@index')->name('home');
    Route::get('/home', 'Dashboard\HomeController@index')->name('home');
    //Dashboard

    Route::get('/home', 'Dashboard\HomeController@index')->name('home');
    Route::get('/profile', 'Dashboard\ProfileController@index')->name('profile');

});