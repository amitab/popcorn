<?php

class TweetController extends BaseController {

    public function getTweets($keyword) {
    	
    	/*$keyword = Input::get('movie_name'); */
    	$keyword = $keyword . '+exclude:retweets';
    	
    	$tweets = Twitter::getSearch(
			array(
				'q' => $keyword, // required
				'result_type' => 'popular',
				'count' => 5,
				'format' => 'json', // required
				'lang' => 'en'
			)
		);
    	
    	$response = json_decode($tweets);
    	$response = $response->statuses;
    	$analyser = App::make('Analyser');
    	
    	foreach($response as $tweet) {
    		$score = $analyser->classify($tweet->text);
    		$tweet->score = $score;
    	}
    	
    	return Response::json($response);
    	
    }

}


