<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '217.182.207.90');
define('DB_USERNAME', 'user2');
define('DB_PASSWORD', 'Lyceepassword29');
define('DB_NAME', 'DBuser2');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>