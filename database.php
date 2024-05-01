<?php

$host = "localhost";
$dbname = "u137072678_flashlogin_db";
$username = "u137072678_newuser";
$password = "@SEproject001";

$mysqli = new mysqli($host, $username, $password, $dbname);


if ($mysqli->connect_errno){
    die("Connection error: " . $mysqli->connect_error);
}      

return $mysqli;