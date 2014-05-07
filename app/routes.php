<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{	
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/default.js') }}
	
});*/

Route::get('/test', function() {
	$analyser = App::make('Analyser');
	//print_r($analyser->classify('Life is not about how hard you can hit, but how much you can get hit and still keep moving forward.'));
	print_r($analyser->classify('Life is not about how hard you can hit, but how much you can get hit &amp; still keep moving forward. -Rocky Balboa'));
	print_r($analyser->classify('I don\'t give a shit.'));
	return '';
});

Route::post('/tweet/{keyword}', 'TweetController@getTweets');
Route::post('/content/now_playing', 'ContentController@getNowPlaying');
Route::post('/content/popular', 'ContentController@getPopular');
Route::get('/content/review/{movieId}', 'ContentController@getMovie');

Route::get('/', 'HomeController@showHomePage');
Route::get('/review', 'HomeController@showReviewPage');

