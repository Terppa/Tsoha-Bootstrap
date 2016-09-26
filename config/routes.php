<?php

  $routes->get('/', function() {
    PokemonController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

    $routes->get('/Pokemons', function() { 
    PokemonController::index();
  });

  $routes->post('/Pokemons', function() { 
    PokemonController::store();
  });

  $routes->get('/Pokemons/new', function() { 
    PokemonController::create();
  });
  
  $routes->get('/pokemons', function() {
  	HelloWorldController::pokemon_list();
  });
  $routes->get('/Pokemons/:id', function($id) {
  	PokemonController::show($id);
  });
  $routes->get('/login', function() {
  	HelloWorldController::login();
  });
  $routes->get('/pokemons/2', function() {
  	HelloWorldController::update_monster();
  });