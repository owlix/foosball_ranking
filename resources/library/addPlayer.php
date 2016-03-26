<?php

$name = $_POST["name"];

$sql = "insert into players (name, win, loss, rank) values ('$name' , 0, 0, 1000)";

mysql_query($sql);

mysql_close($con); 

?>