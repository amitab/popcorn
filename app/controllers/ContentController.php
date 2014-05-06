<?php

class ContentController extends BaseController {

    public function getNowPlaying() {
    	
    	$movieRepository = App::make('MovieRepository');
    	$imageHelper = App::make('ImageHelper');
    	
    	$response = $movieRepository->getNowPlaying();
    	$response = $response->toArray();
    	$movies = array();
    	
    	foreach($response as $movie) {
    		$posterImage = $movie->getPosterPath();
    		$backdropImage = $movie->getBackdropPath();
    		
    		$movieItem['poster'] = $imageHelper->getUrl($posterImage);
    		$movieItem['backdrop'] = $imageHelper->getUrl($backdropImage);
    		$movieItem['id'] = $movie->getId();
    		$movieItem['title'] = $movie->getTitle();
    		$movieItem['popularity'] = $movie->getPopularity();
    		$movieItem['releaseDate'] = $movie->getReleaseDate();
    		
    		$movies[] = $movieItem;
    		
    	}
    	
    	//print_r($movies);
    	
    	return Response::json($movies);
    	
    }
    
    
    public function getPopular() {
    	$movieRepository = App::make('MovieRepository');
    	$imageHelper = App::make('ImageHelper');
    	
    	$response = $movieRepository->getPopular();
    	$response = $response->toArray();
    	$movies = array();
    	
    	foreach($response as $movie) {
    		$posterImage = $movie->getPosterPath();
    		$backdropImage = $movie->getBackdropPath();
    		
    		$movieItem['poster'] = $imageHelper->getUrl($posterImage);
    		$movieItem['backdrop'] = $imageHelper->getUrl($backdropImage);
    		$movieItem['id'] = $movie->getId();
    		$movieItem['title'] = $movie->getTitle();
    		$movieItem['popularity'] = $movie->getPopularity();
    		$movieItem['releaseDate'] = $movie->getReleaseDate();
    		
    		$movies[] = $movieItem;
    		
    	}
    	
    	//print_r($movies);
    	
    	return Response::json($movies);	
    }
    
    public function getMovie($movieId) {
    	$movieRepository = App::make('MovieRepository');
    	$imageHelper = App::make('ImageHelper');
    	
    	return '';
    }

}


