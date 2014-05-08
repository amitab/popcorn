<?php

namespace Sentiment\Analysis\Tools;
use Illuminate\Support\Facades\DB as DB;

class BayesClassifier {
	
	private $labels;
	private $score;
	private $collection;
	
	public $tokenizer;
	public $textCleaner;
	
	public function __construct () {
		//$this->collection = '1399382435_classified';
		$this->collection = '1399442846_classified';
		$this->tokenizer = new \Sentiment\Analysis\Tools\Tokenizer();
		$this->textCleaner = new \Sentiment\Analysis\Tools\TextCleaner();
		
		$this->labels = array (
			array (
				'label' => 'pos',
				'sentence_count' => DB::collection($this->collection)->sum('pos_score')
			),
			array (
				'label' => 'neg',
				'sentence_count' => DB::collection($this->collection)->sum('neg_score')
			),
		);
	}
	
	private function findOccuranceCount($query_data) {
		$occurance_count = 0;
		foreach($this->labels as $label) {
			$occurance_count += $query_data[$label['label'] . '_score'];
		}
		return $occurance_count;
	}
	
	private function findInverseData ($class, $query_data) {
		$inverse_data['sentence_count'] = 0;
		$inverse_data['score'] = 0;
		
		foreach($this->labels as $label) {
			if ($label['label'] != $class) {
				$inverse_data['sentence_count'] += $label['sentence_count'];
				$inverse_data['score'] += $query_data[$label['label'] . '_score'];
			}
		}
		
		return $inverse_data;
	}
	
	public function findSentiment ($tokens) {
		foreach($this->labels as $label) {
			$log_sum = 0;

			foreach($tokens as $token) {
				$token = stemword($token, 'english', 'UTF_8');
				$data = DB::collection($this->collection)->where('word', $token)->first();

				$occurance_count = $this->findOccuranceCount($data);
				if($occurance_count == 0) {
					continue;
				} else {
					
					$word_probability = $data[$label['label'] . '_score']/$label['sentence_count'];
					$inverse_data = $this->findInverseData($label['label'], $data);
					$word_inverse_probability = $inverse_data['score']/$inverse_data['sentence_count'];

					$wordicity = $word_probability/($word_probability + $word_inverse_probability);
					$wordicity = ( (1 * 0.5) + ($occurance_count * $wordicity) ) / ( 1 + $occurance_count );
					
					if($wordicity == 0) $wordicity = 0.001;
					else if ($wordicity == 1) $wordicity = 0.999;
					echo $token . ' : '. $wordicity . '</br>';
					$log_sum += (log( 1 - $wordicity ) - log( $wordicity ));
					
				}

			}
			
			$this->score[$label['label']] = 1 / ( 1 + exp ( $log_sum ) );
		}
	}
	
	public function classify ($string) {
		
		$emoticons = $this->tokenizer->getEmoticons($string);
		$bag_of_words = $this->tokenizer->tokenize($string);
		
		$bag_of_words = $this->textCleaner->clean($bag_of_words);
		$this->findSentiment(array_merge($bag_of_words, $emoticons));
		
		return $this->score;		
	}
	
}