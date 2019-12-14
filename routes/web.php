<?php

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


Route::group(['middleware' => 'auth'],function (){

    // home page
    Route::get('/home', 'VuforiaController@index')->name('home');

    // targets table
    Route::get('/indexGet','VuforiaController@indexGet')->name('index_form');

    // targets create new
    Route::get('/addGet','VuforiaController@addGet')->name('add_form');
    Route::post('/addTarget','VuforiaController@addTarget');

    // targets delete
    Route::get('/deleteTarget/{target}','VuforiaController@deleteTarget')->name('delete_form');
    Route::get('/delete/all/form','VuforiaController@deleteAllTargets')->name('delete_all_form');

    // user logout
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    // users crud system
    Route::resource('users','AdminController')->except(['show','destroy']);
    Route::get('users/{id}/destroy','AdminController@destroy')->name('users.destroy');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

