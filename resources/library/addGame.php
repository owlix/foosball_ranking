<?php
//ini_set('display_errors', true);
require_once("../config.php");
require_once(LIBRARY_PATH . "/functions.php");

$p1 = $_POST["p1"];
$p2 = $_POST["p2"];

$p1score = $_POST["p1-score"];
$p2score = $_POST["p2-score"];

for($i=0; $i<count($p1score); $i++) {

	$sql = "insert into games (player1, player2 ) values ('$p1', '$p2')";
	mysql_query($sql);

  	$sql = "insert into scores (p1_score, p2_score) values ('$p1score[$i]', '$p2score[$i]')";
	mysql_query($sql);

	$outcome = calcWin($p1score[$i], $p2score[$i]);

	if ($outcome === 1) {

		updateGames($p1, $p2);

		$rating = ratePlayers($p2, $p1);
		
		$rating1 = $rating['a'];
		$rating2 = $rating['b'];
	
		mysql_query("update players set rank = '$rating1' where id = '$p2'");
		mysql_query("update players set rank = '$rating2' where id = '$p1'"); 
		
		mysql_query("insert into rank (rank, player_id) values ('$rating1', '$p2')");
		mysql_query("insert into rank (rank, player_id) values ('$rating2', '$p1')");
	

	} elseif ($outcome === 2) {

		updateGames($p2, $p1);

		$rating = ratePlayers($p1, $p2);
		
		$rating1 = $rating['a'];
		$rating2 = $rating['b'];
		
		mysql_query("update players set rank = '$rating1' where id = '$p1'");
		mysql_query("update players set rank = '$rating2' 'where id = '$p2'"); 
		
		mysql_query("insert into rank (rank, player_id) values ('$rating1', '$p1')");
		mysql_query("insert into rank (rank, player_id) values ('$rating2', '$p2')");

		
	}
}

mysql_close($con); 
// echo $_SERVER['REQUEST_URI'];
// echo $_SERVER['SERVER_NAME'];

header('Location: ../../index.php'); 

?> 
