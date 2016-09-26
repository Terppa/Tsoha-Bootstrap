<?php

class PokemonController extends BaseController { 
	public static function index() { 
		$pokemons = Pokemons::all();

		View::make('Pokemons/index.html', array('pokemons' => $pokemons));
	}

	public static function create() { 
		return View::make('Pokemons/new.html');
	}

	public static function store() { 
		$params = $_POST;
		if ($params['ev'] == 'T') {
			$params['ev'] = True;
		}
		else { 
			$params['ev'] = False;
		}
		$pokemon = new Pokemons(array(
			'name' => $params['name'],
			'ev' => $params['ev']
			));
		$stats = new Stats(array(
			'cp' => $params['cp'],
			'hp' => $params['hp'],
			'weight' => $params['weight'],
			'height' => $params['height'],
			'candy' => $params['candy']
			));
		$pokemon->save();
		$stats->save();
		$joins = new Joins(array('pok_id' => $pokemon->id, 's_id' => $stats->id));
		$joins->save();
		Redirect::to('/Pokemons/' . $pokemon->id, array('message' => 'Pokemon lisätty tietokantaan!'));
	}

	public static function show($id) { 
		$pokemon = Pokemons::find($id);
		//$joins = Joins::getJoins($id);
		$stats = Stats::getStats($id);

		View::make('Pokemons/:id.html', array('pokemon' => $pokemon, 'stats' => $stats));
	}
} 