<?php

namespace Sentiment\Analysis;

class SentimentAnalysis {
	
	private $classifier;
	
	public function __construct() {
		$this->classifier = new \Sentiment\Analysis\Tools\BayesClassifier();
	}
	
	public function classify ($string) {
		
		$scores = $this->classifier->classify($string);
		return $scores;
		
	}
	
}