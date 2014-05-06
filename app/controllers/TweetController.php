<?php

class TweetController extends BaseController {

    public function getTweets($keyword) {
    	
    	$tweets = Twitter::getSearch(
			array(
				'q' => $keyword, // required
				'result_type' => 'popular',
				'count' => 15,
				'format' => 'json' // required
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


