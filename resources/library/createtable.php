<?php
//require_once("../config.php");

$sql = "create table players (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	win INT(30) NOT NULL,
	loss INT(30) NOT NULL,
	rank INT(30) NOT NULL,
	updated_date TIMESTAMP
)";

mysql_query($sql);

$sql = "create table games (
	game_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	match_id INT(6),
	player1 VARCHAR(30) NOT NULL,
	player2 VARCHAR(30) NOT NULL,
	created_date TIMESTAMP
)";

mysql_query($sql);

$sql = "create table scores (
	game_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	p1_score INT(6) NOT NULL,
	p2_score INT(6) NOT NULL,
	created_date TIMESTAMP
)";

mysql_query($sql);

$sql = "create table rank (
	game_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	player_id INT(6) NOT NULL,
	rank INT(6) NOT NULL,
	created_date TIMESTAMP
)";

mysql_query($sql);

$sql = "create table matches (
	match_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	winner INT(6) NOT NULL,
	loser INT(6) NOT NULL,
	outcome VARCHAR(30) NOT NULL,
	created_date TIMESTAMP
)";

$lastTable = mysql_query($sql);

if (! $lastTable ) {
	echo "Tables didn't make it!";
} else {
	echo "Tables Created!";
}

mysql_close($con); 
	
?>