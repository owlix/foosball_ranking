<?php

function calcWin($s1, $s2){
	if ($s1 > $s2) {
		return 1;
	} elseif ($s1 < $s2){
		return 2;
	}

}

function getPlayers() {
	$sql = "select id, name, win, loss, rank from players order by rank desc";

	$result = mysql_query($sql);  
	$count = 0;
	if($result === FALSE) { 
  	  
  		echo mysql_error(); // TODO: better error handling

	} else {

		while ($row = mysql_fetch_array($result)) { 
			$winpercent = 
			$count = $count + 1;
			echo "<tr><td>"
			. $count
			. "</td><td><a href=user.php?id="
			. $row["id"] 
			.'>'
			. $row["name"] 
			. "</a></td><td>" 
			. $row["win"] 
			. "</td><td>" 
			. $row["loss"] 
			. "</td><td class=mobile-hide>"
			. ($row["win"] + $row["loss"]) 
			. "</td><td>" 
			. winPercentage( $row["win"], $row["loss"] )
			. "</td><td>" 
			. $row["rank"] 
			. "</td></tr>";
		}  
	}
}

function winPercentage($win, $loss) {
	
	if ($win > 0 || $loss > 0) {
		
		$percent = round(($win / ($win + $loss)),3);
		if ($percent < 1) {

			return '.' . $percent * 1000;//number_format( $percent, 3, '.', '');

		} else {
			return '1.000';
		}

	}else {
		return 0;
	}
}

function populateDropDown() {
	$result = mysql_query("select id, name from players");  
	while ($row = mysql_fetch_array($result)) {  
		echo "<option value=" . $row["id"] . ">". $row["name"] . "</option>";
	}  
}

function ratePlayers($p1, $p2){
	require_once(LIBRARY_PATH . "/rating.php");
	
	$player1 = mysql_query("select rank from players where id = $p1"); 
	$player2 = mysql_query("select rank from players where id = $p2");
	$row1 = mysql_fetch_array($player1);
	$row2 = mysql_fetch_array($player2);
	$p1_rank = $row1["rank"];
	$p2_rank = $row2["rank"];

// player A elo = 1000
// player B elo = 2000
// player A lost
// player B win

	$rating = new Rating($p1_rank, $p2_rank, 0, 1);

// player A elo = 1000
// player B elo = 2000
// player A draw
// player B draw

//$rating = new Rating(1000, 2000, .5, .5);

	$results = $rating->getNewRatings();
	
	return $results;
	
}

function updateGames($p1, $p2){

	$p1_games = mysql_query("select win from players where id = '$p1'"); 
	$p2_games = mysql_query("select loss from players where id = '$p2'");
	
	$row1 = mysql_fetch_array($p1_games);
	$row2 = mysql_fetch_array($p2_games);
	
	$win = $row1["win"];
	$loss = $row2["loss"];

	$win = $win + 1;
	$loss = $loss + 1;

	mysql_query("update players set win = '$win' where id = '$p1'");
	mysql_query("update players set loss = '$loss' where id = '$p2'");
}

function convertDate($dt){

	$newDate = date("m/d/Y", strtotime($dt));

	return $newDate;
}

function outcome($a,$b) {
	if ($a > $b) {
		return '<span class="win">W</span>';
	} else {
		return '<span class="loss">L</span>';
	}
}

?>