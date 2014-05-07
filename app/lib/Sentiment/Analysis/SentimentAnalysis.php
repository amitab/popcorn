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
		
		$negationCount = $this->classifier->textCleaner->getNegationCount();
		if($negationCount % 2 == 0 && $negationCount != 0) {
			$temp = $scores['pos'];
			$scores['pos'] = $scores['neg'];
			$scores['neg'] = $temp;
		}
		return $scores;
		
	}
	
}