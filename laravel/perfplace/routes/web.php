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

Route::get('/results','PagesController@getPropertyResults');

Route::get('/profile','PagesController@getUserProfile');

Route::get('/userProperties','PropertyController@showUserProperties');

Route::get('/editProperty','PagesController@getEditProperty');

Route::get('/map','PagesController@getMap');

Route::get('properties/ShowFiltered','PagesController@indexFiltered');

Route::get('properties/all','PropertyController@showAll');


Route::resource('properties','PropertyController');

Route::post ('contactUser','UserController@contactUser');

Route::get('auth/register','Auth\RegisterController@showRegistrationForm');

Route::post('auth/register','auth\RegisterController@register');

Route::post('auth/login','auth\LoginController@login');

Route::get('auth/logout','auth\LoginController@logout');

//Route::post('properties/{id}/send', 'ContactUser@send');



