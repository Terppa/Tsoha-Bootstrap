<?php

class Joins extends BaseModel { 

	public $pok_id, $s_id, $pla_id;

	public function __construct($attributes) {	parent::__construct($attributes); 
	}

	public static function getJoins($pokemon) { 
		//$query = DB::connection()->prepare('SELECT * FROM JoinTable WHERE pokemon_id = :pokemon LIMIT 1');
		//$query->execute(array('pokemon_id' => $pokemon));
		//$row = $query->fetch();
		if($row) { 
			$pok = new Joins(array(
				'pok_id' => $row['pok_id'],
				's_id' => $row['s_id'],
				'pla_id' => $row['pla_id']
				));
		}
		return $pok;
	}

	public function save() { 
		$query = DB::connection()->prepare('INSERT INTO JoinTable (pokemon_id, stats_id) VALUES (:pok_id, :s_id)');
		$query->execute(array('pok_id' => $this->pok_id, 's_id' => $this->s_id));
		$row = $query->fetch();
	}
}