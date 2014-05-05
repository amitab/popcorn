<?php

namespace Sentiment\Analysis\Tools;

class TextCleaner {
	
	private $wordDatabase;
	
	public function __construct () {
		$this->wordDatabase = require_once('DataStore/WordDatabase.php');
	}
	
	private function filter ($word) {
		return (!in_array($word, $this->wordDatabase['stop_words']));
	}
	
	public function filterArray ($array_of_words) {
		return array_values(array_unique(array_filter($array_of_words, array($this, 'filter'))));
	}
	
	public function negation ($array_of_words) {
		for($i = 0; $i < count($array_of_words); $i++) {
			if(in_array($array_of_words[$i], $this->wordDatabase['negation_words'])) {
				if(isset($array_of_words[$i-1])) {
					$array_of_words[$i-1] = '!' . $array_of_words[$i-1];
				}
				if(isset($array_of_words[$i+1])) {
					$array_of_words[$i+1] = '!' . $array_of_words[$i+1];
				}
			}
		}

		return $array_of_words;
	}
	
	public function clean ($array_of_words) {
		$word_bag = array();
		
		for($i = 0; $i < count($array_of_words); $i++) {
			$word = $array_of_words[$i];
			if(in_array($array_of_words[$i], $this->wordDatabase['negation_words'])) {
				if(isset($array_of_words[$i-1])) {
					$word_bag[$array_of_words[$i-1]] = $array_of_words[$i-1];
				}
				
				if(isset($array_of_words[$i+1])) {
					$word_bag[$array_of_words[$i+1]] = $array_of_words[$i+1];
				}
			} 
			$word_bag[$word] = $word;
		}
		
		return array_filter($word_bag, array($this, 'filter'));
	}

}