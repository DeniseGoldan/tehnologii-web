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

Route::get('/','PagesController@getIndex');

Route::get('/add','PagesController@getAddNewProperty');

Route::get('/property','PagesController@getSingleProperty');

Route::get('/user','PagesController@getUserProfile');

Route::get('/register','PagesController@getUserRegister');

Route::get('/results','PagesController@getPropertyResults');

Route::get('/profile','PagesController@getUserProfile');

Route::get('/userProperties','PagesController@getUserProperties');



