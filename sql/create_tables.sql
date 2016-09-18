-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Player (
	id SERIAL PRIMARY KEY,
	name varchar(60) NOT NULL,
	password varchar(40) NOT NULL,
	team varchar(20) 
	);

CREATE TABLE Pokemon (
	id SERIAL PRIMARY KEY,
	name varchar(120) NOT NULL,
	evolvable boolean
	);

CREATE TABLE Stats (
	id SERIAL PRIMARY KEY,
	cp decimal,
	hp decimal,
	weight decimal,
	height decimal,
	candy varchar(40),
	stardust integer,
	candy_to_evolve integer,
	candy_to_improve integer,
	added timestamp
	);

CREATE TABLE JoinTable (
	player_id integer REFERENCES Player(id),
	pokemon_id integer REFERENCES Pokemon(id),
	stats_id integer REFERENCES Stats(id) 
	);

CREATE TABLE Place (
	stats_id integer REFERENCES Stats(id),
	place varchar(120),
	day date,
	aika time
	);