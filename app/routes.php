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
	//$analyser = App::make('Analyser');
	//print_r($analyser->classify('Life is not about how hard you can hit, but how much you can get hit and still keep moving forward.'));
	//print_r($analyser->classify('More time jumps confuse ppl'));
	//print_r($analyser->classify('I don\'t give a shit.'));
	$string = "Hello This Is An Example Of A Sentence Which Has Odd Capitalization Which You May Want Fixing. tHere Are Problems With This Method, Which I Will disclose Shortly? If You Know How To Improve THis Code Please Let Me Know! Hello Mr. John Doe.";
	$string = ucfirst(strtolower($string));
	$string = preg_replace_callback('/([.!?])\s*(\w)/', function ($matches) {
		return strtoupper($matches[1] . ' ' . $matches[2]);
	}, ucfirst(strtolower($string)));
	$string = ucwords($string);
	$array = preg_split('/(?<!Mr|Ms|Mrs|Prof|Dr|Gen|Rep|Sen|St|Sr|Jr|Ph.D|Ph)[\.;](?=(\s*[A-Z]))|(?<=[?!])/u', $string, null, PREG_SPLIT_NO_EMPTY);
	print_r($array);
	return '';
});

Route::post('/tweet', 'TweetController@getTweets');
Route::post('/content/now_playing', 'ContentController@getNowPlaying');
Route::post('/content/popular', 'ContentController@getPopular');

Route::get('/content/review/{movieId}', 'ContentController@getMovie');
Route::get('/', 'HomeController@showHomePage');
Route::post('/search', 'ContentController@searchMovie');