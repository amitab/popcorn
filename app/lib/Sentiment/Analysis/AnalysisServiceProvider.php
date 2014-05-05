<?php 

namespace Sentiment\Analysis;

use Illuminate\Support\ServiceProvider;

class AnalysisServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app['Analyser'] = function() {
            return new SentimentAnalysis;
        };
    }

}