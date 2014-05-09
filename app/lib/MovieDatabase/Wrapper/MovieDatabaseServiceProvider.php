<?php 

namespace MovieDatabase\Wrapper;

use Illuminate\Support\ServiceProvider;

class MovieDatabaseServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        
        $app['MovieRepository'] = function() {
			$token  = new \Tmdb\ApiToken('d918f6e1124aa29073c2b6530bc35315');
			$client = new \Tmdb\Client($token);
			$client->setCaching(true, '/tmp/php-tmdb-api');
            return new \Tmdb\Repository\MovieRepository($client);
        };
        
        $app['ConfigRepository'] = function() {
			$token  = new \Tmdb\ApiToken('d918f6e1124aa29073c2b6530bc35315');
			$client = new \Tmdb\Client($token);
			$client->setCaching(true, '/tmp/php-tmdb-api');
            return new \Tmdb\Repository\ConfigurationRepository($client);
        };
        
        $app['ImageHelper'] = function() {
			$token  = new \Tmdb\ApiToken('d918f6e1124aa29073c2b6530bc35315');
			$client = new \Tmdb\Client($token);
			$client->setCaching(true, '/tmp/php-tmdb-api');
            
            $configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
            $config = $configRepository->load();
            
            return new \Tmdb\Helper\ImageHelper($config);
        };
        
        $app['MovieSearchQuery'] = function() {
        	return new \Tmdb\Model\Search\SearchQuery\MovieSearchQuery;
        };
        
        $app['MovieSearchRepository'] = function() {
        	$token  = new \Tmdb\ApiToken('d918f6e1124aa29073c2b6530bc35315');
			$client = new \Tmdb\Client($token);
			$client->setCaching(true, '/tmp/php-tmdb-api');
        	
        	return new \Tmdb\Repository\SearchRepository($client);
        	
        };
        
    }

}