<?php
use App\Services\MarkGeneratorService;
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

Route::get('/results','PagesController@getPropertyResults');

Route::get('/profile','PagesController@getUserProfile');

Route::get('/myProperties','PropertyController@showUserProperties');

Route::get('/editProperty','PagesController@getEditProperty');

Route::get('/map','PagesController@getMap');

Route::get('properties/showFiltered','PagesController@indexFiltered');

Route::get('properties/all','PropertyController@showAll');

Route::get('properties/filtered','PropertyController@getFiltered');

Route::get('properties/listView','PropertyController@showFiltered');

Route::resource('properties','PropertyController');

Route::put('/profile/editNames','UserController@editNames'); 

Route::put('/profile/editContactInformation','UserController@editContactInformation');

Route::put('/profile/changePassword','UserController@changePassword');

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

Route::get('callGeo',function(){
	
	$object = new MarkGeneratorService();

	return $object->lookup('Nicolina Iasi');
});

Route::get('/dummyTrump', function()
{
	$json = Twitter::getSearch(['q' => "#PerfectPlaceFinder", 'format' => 'json', 'count' => 100]);
	$result = json_decode($json, true);
	echo $json;
});


