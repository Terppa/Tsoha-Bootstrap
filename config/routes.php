<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/pokemons', function() {
  	HelloWorldController::pokemon_list();
  });
  $routes->get('/pokemons/1', function() {
  	HelloWorldController::pokemon_show();
  });
  $routes->get('/login', function() {
  	HelloWorldController::login();
  });
  $routes->get('/pokemons/2', function() {
  	HelloWorldController::update_monster();
  });
