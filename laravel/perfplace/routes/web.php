<?php
use App\Services\EventBuilder;
use App\Twitt;
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
	
	$object = new EventBuilder();
	$object->buildEventFromTweet('593d6420d476442ee0302fa7');
});

Route::get('cityMapInfo','EventController@getEvents');

Route::get('/dummyTrump', function()
{
	$json = Twitter::getSearch(['q' => "#PerfectPlaceFinder", 'format' => 'json', 'count' => 5]);
	$result = json_decode($json, true);
	//echo $json;

	for ($index = 0; $index <= 4; $index++) {
	    	// echo $result['search_metadata']['query'];
		echo $result['statuses'][$index]['text'];
		echo sprintf('%f', $result['statuses'][$index]['id']);
		echo "\n";	
	}

	// MAX ID
	echo sprintf('%f', $result['search_metadata']['max_id']); // 873569725925732352
});

Route::get('/dummy', function()
{
	$json = Twitter::getSearch(['q' => "#PerfectPlaceFinder", 'format' => 'json', 'since_id' => 873579287445737472 ]);
	//$result = json_decode($json, true);
	echo $json;

	// 	echo $result['statuses'][$index]['text'];	
	//echo $result['statuses'][$index]['text'];
	// }
	// MAX ID
	// MAX ID
	//echo sprintf('%f', $result['search_metadata']['max_id']); // 873569725925732352
	//873579287445737472
});


