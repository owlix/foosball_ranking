<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pongrank";

$con = mysql_connect($servername, $username, $password) or  
    die("Could not connect: " . mysql_error());  
mysql_select_db($dbname);  


defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
 
/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
//ini_set('display_errors', 1);

 ?>