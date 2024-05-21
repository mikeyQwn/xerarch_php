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

function fetch_users($startswith) {
	global $dbconn, $FETCH_USERS;
	$result = pg_query_params($dbconn, $FETCH_USERS, array($startswith . "%"))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return $arr;
}
 
function delete_users($users) {
	global $dbconn, $DELETE_USERS;
	$pgarray_to_delete = '{'. implode(', ', $users) . '}';
	$result = pg_query_params($dbconn, $DELETE_USERS, array($pgarray_to_delete))
		or die(pg_last_error());
	return $result;
}

function regiser_user($user) {
	global $dbconn, $CREATE_USER;
	$full_name = $user["full_name"];
	$login = $user["login"];
	$password = $user["password"];
	$salt = $user["salt"];
	$role_id = $user["role_id"];
	$result = pg_query_params($dbconn, $CREATE_USER, array($full_name, $login, $password, $salt, $role_id))
		or die(pg_last_error());
	return $result;
}

function fetch_courses($client_id) {
	global $dbconn, $FETCH_COURSES;
	$result = pg_query_params($dbconn, $FETCH_COURSES, array($client_id))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return $arr;
}

function fetch_courses_professor($client_id) {
	global $dbconn, $FETCH_COURSES_PROFESSOR;
	$result = pg_query_params($dbconn, $FETCH_COURSES_PROFESSOR, array($client_id))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return $arr;
}
?>
