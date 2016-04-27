<?php
ob_start();
require_once(LIBRARY_PATH . "/functions.php");

$p1 = $_POST["p1"];
$p2 = $_POST["p2"];

$p1score = $_POST["p1-score"];
$p2score = $_POST["p2-score"];

$p1Total = 0;
$p2Total = 0;

$sql = "select match_id from matches order by match_id desc limit 1";
$row = mysql_query($sql);
$row1 = mysql_fetch_array($row);
$matchId = $row1["match_id"];

if ($matchId < 1) {
	$matchId = 1;
}

for($i = 0; $i < count($p1score); $i++) {

	$sql = "insert into games (player1, player2, match_id ) values ('$p1', '$p2', '$matchId')";
	mysql_query($sql);

	$sql = "insert into scores (p1_score, p2_score) values ('$p1score[$i]', '$p2score[$i]')";
	mysql_query($sql);
	
	if ( $p1score[$i] > $p2score[$i] ) {
		
		$p1Total = $p1Total + 1;

	} else {

		$p2Total = $p2Total + 1;
	}
	
}

//if (count($p1score) > 1 ) {

	if ($p1Total > $p2Total) {

		$rating = ratePlayers($p2, $p1);

		$rating1 = $rating['a'];
		$rating2 = $rating['b'];

		$sql = "insert into rank (rank, player_id) values ('$rating1', '$p2')";
		mysql_query($sql);

		$sql = "insert into rank (rank, player_id) values ('$rating2', '$p1')";
		mysql_query($sql);

		$sql = "update players set rank = '$rating1' where id = '$p2'";
		mysql_query($sql);

		$sql ="update players set rank = '$rating2' where id = '$p1'"; 
		mysql_query($sql);

		logGames($p1, $p2);

		updateMatches($p1, $p2, $p1Total, $p2Total);


	} else {

		$rating = ratePlayers($p1, $p2);

		$rating1 = $rating['a'];
		$rating2 = $rating['b'];

		$sql = "insert into rank (rank, player_id) values ('$rating1', '$p1')";
		mysql_query($sql);

		$sql = "insert into rank (rank, player_id) values ('$rating2', '$p2')";
		mysql_query($sql);


		$sql = "update players set rank = '$rating1' where id = '$p1'";
		mysql_query($sql);
		$sql = "update players set rank = '$rating2' 'where id = '$p2'";
		mysql_query($sql); 

		logGames($p2, $p1);

		updateMatches($p2, $p1, $p2Total, $p1Total);

	}

//} 

function logGames($winner, $loser ) {
	
	//Get wins of winning player
	$sql = "select win from players where id = '$winner'";
	$wins = mysql_query($sql);
	
	$result = mysql_fetch_array($wins);
	$winsUpdate = $result['win'] + 1;

	//update winner's wins
	$sql = "update players set win = '$winsUpdate' where id = '$winner'";
	mysql_query($sql);

	//get losses of losing player
	$sql = "select loss from players where id = '$loser'";
	$losses = mysql_query($sql);
	
	$result = mysql_fetch_array($losses);
	$lossUpdate = $result['loss'] + 1;

	//update loser's losses
	$sql = "update players set loss = '$lossUpdate' where id = '$loser'";
	mysql_query($sql);

}

function updateMatches($winner, $loser, $wscore, $lscore) {
	$finalScore = $wscore . " - " . $lscore;
	$sql = "insert into matches (winner, loser, outcome) values ('$winner', '$loser', '$finalScore')";
	mysql_query($sql);
}

mysql_close($con);

?> 