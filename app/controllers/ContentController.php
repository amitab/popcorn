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
    		$movieItem['voteCount'] = $movie->getVoteCount();  		
    		$movieItem['voteAverage'] = $movie->getVoteAverage();
    		
    		$movies[] = $movieItem;
    		
    	}
    	
    	//print_r($response);
    	
    	return Response::json($movies);	
    }
    
    public function getMovie($movieId) {
    	$movieRepository = App::make('MovieRepository');
    	$imageHelper = App::make('ImageHelper');
    	
    	$movie = $movieRepository->load(87421);
    	$backdropImage = $movie->getBackdropPath();
    	$posterImage = $movie->getPosterPath();
    	
    	$genres = $movie->getGenres();
    	$genreList = array();
    	foreach($genres as $genre) {
    		$genreList[] = $genre->getName();
    	}
    	$genreList = implode(', ', $genreList);
    	
    	$review = array(
    		'backdropImage' => $imageHelper->getUrl($backdropImage),
    		'posterImage' => $imageHelper->getUrl($posterImage),
    		'genreList' => $genreList,
    		'homepage' => $movie->getHomepage(),
    		'overview' => $movie->getOverview(),
    		'popularity' => $movie->getPopularity(),
    		'releaseDate' => $movie->getReleaseDate(),
    		'status' => $movie->getStatus(),
    		'tagline' => $movie->getTagline(),
    		'title' => $movie->getTitle(),
    		'voteAverage' => $movie->getVoteAverage(),
    		'voteCount' => $movie->getVoteCount()
    	);
    	    	
    	return Response::json($review);	
    }

}


