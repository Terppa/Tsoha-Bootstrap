<?php

class Stats extends BaseModel { 

	public $id, $cp, $hp, $weight, $height, $candy, $stardust, $c_to_ev, $c_to_imp, $added;

	public function __construct($attributes) {	parent::__construct($attributes); 
	}

	public static function getStats($id) { 
		$query = DB::connection()->prepare('SELECT * FROM Stats WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row) { 
			$stats = new Stats(array(
				'id' => $row['id'],
				'cp' => $row['cp'],
				'hp' => $row['hp'],
				'weight' => $row['weight'],
				'height' => $row['height'],
				'candy' => $row['candy'],
				'stardust' => $row['stardust'],
				//'c_to_ev' => $row['c_to_ev'],
				//'c_to_imp' => $row['c_to_imp'],
				'added' => $row['added']
				));
			return $stats;
		}
		return null;
	}

	public function save() { 
		$query = DB::connection()->prepare('INSERT INTO Stats (cp, hp, weight, height, candy) VALUES (:cp, :hp, :weight, :height, :candy) RETURNING id');
		$query->execute(array('cp' => $this->cp, 'hp' => $this->hp, 'weight' => $this->weight, 'height' => $this->height, 'candy' => $this->candy));
		$row = $query->fetch();
		$this->id = $row['id'];
	}
}