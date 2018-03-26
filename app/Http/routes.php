<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/test', function () {
    $analyser = new Sentiment\Analysis\SentimentAnalysis(DB::connection()->getPdo());
    $score = $analyser->classify('Your enemies won\'t help you and won\'t trust you');
    print_r($score);
	return '';
});

Route::get('/tweet/{keyword}', function ($keyword) {
    $data = [];
    $analyser = new Sentiment\Analysis\SentimentAnalysis(DB::connection()->getPdo());

    $tweets = Twitter::getSearch([
        'q' => $keyword . ' movie+exclude:retweets', // required
        'result_type' => 'mixed',
        'count' => 5,
        'lang' => 'en',
        'tweet_mode' => 'extended'
    ]);

    foreach($tweets->statuses as $tweet) {
        array_push($data, [
            'tweet' => $tweet->full_text,
            'score' => $analyser->classify($tweet->full_text),
            'date' => $tweet->created_at,
            'user' => [
                'name' => $tweet->user->name,
                'profile_image' => $tweet->user->profile_image_url_https
            ]
        ]);
    }
    return response()->json($data);
});

Route::get('/content/now_playing', function() {
    $token  = new \Tmdb\ApiToken(function_exists('env') ? env('TMDB_API_KEY', '') : '');
    $client = new \Tmdb\Client($token);

    $configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
    $config = $configRepository->load();
    
    $imageHelper = new \Tmdb\Helper\ImageHelper($config);

    $nowPlaying = $client->getMoviesApi()->getNowPlaying();
    $movies = [];
    foreach($nowPlaying['results'] as $movie) {
        array_push($movies, [
            'poster' => $imageHelper->getUrl($movie['poster_path']),
            'backdrop' => $imageHelper->getUrl($movie['backdrop_path']),
            'id' => $movie['id'],
            'title' => $movie['title'],
            'popularity' => $movie['popularity'],
            'release_date' => $movie['release_date']
        ]);
    }
    return response()->json($movies);
});

Route::get('/content/popular', function() {
    $token  = new \Tmdb\ApiToken(function_exists('env') ? env('TMDB_API_KEY', '') : '');
    $client = new \Tmdb\Client($token);

    $configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
    $config = $configRepository->load();
    
    $imageHelper = new \Tmdb\Helper\ImageHelper($config);

    $popluar = $client->getMoviesApi()->getPopular();
    $movies = [];
    foreach($popluar['results'] as $movie) {
        array_push($movies, [
            'poster' => $imageHelper->getUrl($movie['poster_path']),
            'backdrop' => $imageHelper->getUrl($movie['backdrop_path']),
            'id' => $movie['id'],
            'title' => $movie['title'],
            'popularity' => $movie['popularity'],
            'release_date' => $movie['release_date']
        ]);
    }
    return response()->json($movies);
});

Route::get('/content/review/{movieId}', function($movieId) {
    $token  = new \Tmdb\ApiToken(function_exists('env') ? env('TMDB_API_KEY', '') : '');
    $client = new \Tmdb\Client($token);

    $configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
    $config = $configRepository->load();
    $imageHelper = new \Tmdb\Helper\ImageHelper($config);

    $repository  = new \Tmdb\Repository\MovieRepository($client);
    $movie = $repository->load($movieId);

    $cast = [];
    foreach($movie->getCredits()->getCast() as $person) {
        array_push($cast, $person->getName());
    }

    $genres = [];
    foreach($movie->getGenres() as $genre) {
        array_push($genres, $genre->getName());
    }

    $analyser = new Sentiment\Analysis\SentimentAnalysis(DB::connection()->getPdo());
    $reviews = [];
    foreach($movie->getReviews() as $review) {
        array_push($reviews, [
            'review' => $review->getContent(),
            'score' => $analyser->classify($review->getContent())
        ]);
    }

    return view('detail', ['movie' => [
        'poster' => $imageHelper->getUrl(
            $movie->getImages()->filterPosters()->filterBestVotedImage()),
        'backdrop' => $imageHelper->getUrl(
            $movie->getImages()->filterBackdrops()->filterBestVotedImage()),
        'genreList' => $genres,
        'castList' => $cast,
        'homepage' => $movie->getHomepage(),
        'overview' => $movie->getOverview(),
        'popularity' => $movie->getPopularity(),
        'release_date' => $movie->getReleaseDate()->format('Y-m-d'),
        'status' => $movie->getStatus(),
        'tagline' => $movie->getTagline(),
        'title' => $movie->getOriginalTitle(),
        'voteAverage' => $movie->getVoteAverage(),
        'voteCount' => $movie->getVoteCount(),
        'runtime' => $movie->getRuntime(),
        'reviews' => $reviews
    ]]);
});

Route::post('/search/{keyword}', function($keyword) {
    $token  = new \Tmdb\ApiToken(function_exists('env') ? env('TMDB_API_KEY', '') : '');
    $client = new \Tmdb\Client($token);
    $query = new \Tmdb\Model\Search\SearchQuery\MovieSearchQuery();
    $query->page(1);
    $repository = new \Tmdb\Repository\SearchRepository($client);

    $configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
    $config = $configRepository->load();
    $imageHelper = new \Tmdb\Helper\ImageHelper($config);

    $movies = [];
    foreach($repository->searchMovie($keyword, $query)->toArray() as $movie) {
        array_push($movies, [
            'poster' => $imageHelper->getUrl($movie->getPosterPath()),
            'backdrop' => $imageHelper->getUrl($movie->getBackdropPath()),
            'id' => $movie->getId(),
            'title' => $movie->getOriginalTitle(),
            'popularity' => $movie->getPopularity(),
            'releaseDate' => $movie->getReleaseDate()->format('Y-m-d H:i:s'),
            'voteAverage' => $movie->getVoteAverage(),
            'voteCount' => $movie->getVoteCount()
        ]);
    }

    return response()->json($movies);
});

Route::get('/', function() {
    return view('home');
});