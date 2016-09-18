<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }

    public static function pokemon_list() {
      View::make('Suunnitelmat/pokemon_list.html');
    }

    public static function pokemon_show() {
      View::make('Suunnitelmat/pokemon_show.html');
    }

    public static function login() {
      View::make('Suunnitelmat/login.html');
    }

    public static function update_monster() {
      View::make('Suunnitelmat/update_monster.html');
    }
  }
