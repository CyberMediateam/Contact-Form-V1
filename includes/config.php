<?php 
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "kontaktus");

$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);



if($db->connect_errno > 0) {
	die("Mysqli Error: " . $db->error);
} else {
	$db->connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
}




?>

