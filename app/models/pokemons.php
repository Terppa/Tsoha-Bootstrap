<?php

class Pokemons extends BaseModel { 

	public $id, $name, $evolvable;

	public function __construct($attributes) {	parent::__construct($attributes); 
	}

	public static function all() { 
		$query = DB::connection()->prepare('SELECT * FROM Pokemon');
		$query->execute();
		$rows = $query->fetchAll();
		$pokemons = array();

		foreach ($rows as $row) {
		   $pokemons[] = new Pokemons(array(
		   	'id' => $row['id'],
		   	'name' => $row['name'],
		   	'evolvable' => $row['evolvable']
		   	));
		}
		return $pokemons;
	}

	public static function find($id) { 
		$query = DB::connection()->prepare('SELECT * FROM Pokemon WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row) { 
			$pokemon = new Pokemons(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'evolvable' => $row['evolvable']
				));
			return $pokemon;
		}
		return null;
	}

	public function save() { 
		$query = DB::connection()->prepare('INSERT INTO Pokemon (name, evolvable) VALUES (:name, :ev) RETURNING id');
		$query->execute(array('name' => $this->name, 'ev' => $this->evolvable));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	public function getId($pokemon) { 
		return $pokemon->id;
	}
}