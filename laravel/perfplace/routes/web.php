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

Route::get('/property','PagesController@getSingleProperty');

Route::get('/user','PagesController@getUserProfile');

Route::get('/register','PagesController@getUserRegister');

Route::get('/results','PagesController@getPropertyResults');

Route::get('/profile','PagesController@getUserProfile');

Route::get('/userProperties','PagesController@getUserProperties');

Route::get('/editProperty','PagesController@getEditProperty');

Route::get('/map','PagesController@getMap');

Route::get('properties/ShowFiltered','PagesController@indexFiltered');

Route::get('properties/all','PropertyController@showAll');

//Route::get('properties/{id}','PropertyController@show');

//Route::get('properties/create','PropertyController@store');

Route::resource('properties','PropertyController');

Route::post ('contactUser','UserController@contactUser');

//Route::post('properties/{id}/send', 'ContactUser@send');



