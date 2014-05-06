<?php

namespace Sentiment\Analysis;

class SentimentAnalysis {
	
	private $classifier;
	
	public function __construct() {
		$this->classifier = new \Sentiment\Analysis\Tools\BayesClassifier();
	}
	
	public function classify ($string) {
		
		$scores = $this->classifier->classify($string);
		// double negation solution
		if($this->classifier->textCleaner->getNegationCount() % 2 == 0) {
			$temp = $scores['pos'];
			$scores['pos'] = $scores['neg'];
			$scores['neg'] = $temp;
		}
		return $scores;
		
	}
	
}