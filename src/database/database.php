<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/queries.php';

$dbconn = pg_connect("dbname=xerarch password=changeme host=localhost user=postgres");

function get_password_and_salt($login) {
	global $dbconn, $GET_PASSWORD_AND_SALT;
	$result = pg_query_params($dbconn, $GET_PASSWORD_AND_SALT, array($login))
		or die(pg_last_error());
	$arr = pg_fetch_array($result, 0, PGSQL_ASSOC);
	return $arr;
}

function get_new_cookie($client_id) {
	global $dbconn, $INSERT_COOKIE;
	$result = pg_query_params($dbconn, $INSERT_COOKIE, array($client_id))
		or die(pg_last_error());
	$arr = pg_fetch_array($result, 0, PGSQL_ASSOC);
	return $arr["cookie"];
}

function get_user_info($cookie) {
	global $dbconn, $GET_USER_INFO;
	$result = pg_query_params($dbconn, $GET_USER_INFO, array($cookie))
		or die(pg_last_error());
	$arr = pg_fetch_array($result, 0, PGSQL_ASSOC);
	return $arr;
}
?>
