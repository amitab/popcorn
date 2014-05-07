<?php

class TweetController extends BaseController {

    public function getTweets() {
    	
    	$keyword = Input::get('keyword'); 
    	$keyword = $keyword . ' movie+exclude:retweets';
    	
    	$tweets = Twitter::getSearch(
			array(
				'q' => $keyword, // required
				'result_type' => 'mixed',
				'count' => 5,
				'format' => 'json', // required
				'lang' => 'en',
				'src' => 'typd'
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


