<?php

$pid = $_POST["id"];

$sql = "select rank from rank where player_id=$pid order by game_id desc LIMIT 10";

$result = mysql_query($sql);

$rows = array();

while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}

echo json_encode($rows);

?>