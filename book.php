<?php


define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'fi');

function db_config() {
	mysql_connect(HOST, USER, PASSWORD) or die(mysql_error());
	mysql_select_db(DATABASE) or die(mysql_error());
}


function book() {
	$name = filter_input(INPUT_POST, "name");
	$phone = filter_input(INPUT_POST, "phone");
	$loc 	= filter_input(INPUT_POST, "event");

	if($name == NULL || $name == FALSE || $phone == NULL || $phone == FALSE || $loc == NULL || $loc == FALSE) {
		return FALSE;
	}

	$sql = "INSERT INTO bookings (name, venue, type, phone) VALUES('$name', '$loc', '', '$phone');";
	db_config();
	$res = mysql_query($sql);

	return mysql_insert_id();
}

$res = book();
header("Content-Type: application/json");
if($res > 0) {
	echo json_encode(array(
		"code" => 0
		));
} else {
	echo json_encode(array(
		"code" => -1
		));
}