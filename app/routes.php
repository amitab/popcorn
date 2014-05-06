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
	$token  = new \Tmdb\ApiToken('d918f6e1124aa29073c2b6530bc35315');
	$client = new \Tmdb\Client($token);
	$client->setCaching(true, '/tmp/php-tmdb-api');
	
	$repository = new \Tmdb\Repository\MovieRepository($client);
	$movie      = $repository->load(87421);

	echo $movie->getTitle();
	
	$users = DB::collection('classified')->sum('pos_score');
	var_dump($users);
	
	return '';
	
	$word = 'hello';
	$word_info = DB::collection('classified')->where('word', $word)->first();
	
	print_r($word_info);
	
	$sentimentAnalyser = App::make('Analyser');
	print_r($sentimentAnalyser->classify('I love this movie!')); 
	print_r($sentimentAnalyser->classify('He likes the movie but I did not.'));
	print_r($sentimentAnalyser->classify('I didn\'t like the movie one bit.'));
	print_r($sentimentAnalyser->classify('The actress in this movie is bad.'));
	return '';
	
	return Twitter::getUserTimeline(array('screen_name' => 'thujohn', 'count' => 20, 'format' => 'json'));
	return Twitter::getSearch(
		array(
			'q' => 'gravity movie', // required
			'result_type' => 'recent',
			'count' => 5,
			'format' => 'json' // required
		)
	);
	
});*/

Route::get('/tweet/{keyword}', 'TweetController@getTweets');
Route::get('/content/now_playing', 'ContentController@getNowPlaying');
Route::get('/content/popular', 'ContentController@getPopular');
Route::get('/content/review/{movieId}', 'ContentController@getMovie');

Route::get('/', 'HomeController@showHomePage');
Route::get('/review', 'HomeController@showReviewPage');

