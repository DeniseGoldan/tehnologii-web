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

Route::get('/myProperties','PropertyController@showUserProperties');

Route::get('/editProperty','PagesController@getEditProperty');

Route::get('/map','PagesController@getMap');

Route::get('properties/showFiltered','PagesController@indexFiltered');

Route::get('properties/all','PropertyController@showAll');

Route::resource('properties','PropertyController');

//Route::post ('contactUser','UserController@contactUser');

//Authentication routes
Route::get('auth/register','Auth\RegisterController@showRegistrationForm');
Route::post('auth/register',['as' => 'auth.register', 'uses' => 'auth\RegisterController@register']);
Route::post('auth/login','auth\LoginController@login');
Route::get('auth/logout','auth\LoginController@logout');

//Forgot password routes
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm');
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset',['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);

//Route::post('properties/{id}/send', 'ContactUser@send');



