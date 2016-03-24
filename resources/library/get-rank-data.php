<?php
//ini_set('display_errors', true);
require_once("../config.php");
//require_once(LIBRARY_PATH . "/functions.php");

$pid = $_POST["id"];

$sql = "select rank from rank where player_id=$pid order by game_id desc LIMIT 10";

$result = mysql_query($sql);

$rows = array();

while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}

print json_encode($rows);

// while ($row = mysql_fetch_array($result)) {
// 	echo json_encode($row);
// }

?>