A simple movie review and twitter feed sentiment analysis with Laravel 5 and a php implementation of the Naive Bayes Classification algorithm.

# Get this running:

1. Run `composer install`.
2. Look at [`php-bayes`](https://github.com/amitab/php-bayes).
3. The `php-bayes` library expects a MySQL database (with the dataset loaded into a table called `words`. The schema definition of this table is given in `app.php` the `php-bayes` library) to predict the sentiment.
4. The `twitter` library needs it's API keys.
5. The `tmdb` library needs it's API key.
6. Update the Laravel `.env` file in the root directory with the following properties
```
DB_CONNECTION=mysql
DB_HOST=YOUR_HOST
DB_PORT=YOUR_PORT
DB_DATABASE=YOUR_DATABASE
DB_USERNAME=YOUR_USER
DB_PASSWORD=YOUR_PASSWORD

TWITTER_CONSUMER_KEY=YOUR_CONSUMER_KEY
TWITTER_CONSUMER_SECRET=YOUR_CONSUMER_SECRET
TWITTER_ACCESS_TOKEN=YOUR_ACCESS_TOKEN
TWITTER_ACCESS_TOKEN_SECRET=YOUR_TOKEN_SECRET
TMDB_API_KEY=YOUR_TMDB_API_KEY
```
7. Run `php artisan serve` and you should be good to go.