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
	$result = pg_query_params($dbconn, $CREATE_USER, array($full_name, $login, $password, $salt, $role_id));
	return $result;
}

function fetch_courses($client_id) {
	global $dbconn, $FETCH_COURSES;
	$result = pg_query_params($dbconn, $FETCH_COURSES, array($client_id))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return $arr;
}

function fetch_lessons($course_id, $client_id) {
	global $dbconn, $FETCH_LESSONS;
	$result = pg_query_params($dbconn, $FETCH_LESSONS, array($course_id, $client_id))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return $arr;
}

function fetch_tests($course_id, $client_id) {
	global $dbconn, $FETCH_TESTS;
	$result = pg_query_params($dbconn, $FETCH_TESTS, array($course_id, $client_id))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return $arr;
}

function fetch_lesson($lesson_id, $client_id) {
	global $dbconn, $FETCH_LESSON;
	$result = pg_query_params($dbconn, $FETCH_LESSON, array($lesson_id, $client_id))
		or die(pg_last_error());
	$arr = pg_fetch_array($result, 0, PGSQL_ASSOC);
	return $arr;
}

function add_lesson($lesson) {
	global $dbconn, $ADD_LESSON;
	$course_id = $lesson["course_id"];
	$name = $lesson["name"];
	$full_text = $lesson["full_text"];
	$result = pg_query_params($dbconn, $ADD_LESSON, array($course_id, $name, $full_text))
		or die(pg_last_error());
	return $result;
}

function create_test($test) {
	global $dbconn, $CREATE_TEST;
	$course_id = $test["course_id"];
	$name = $test["name"];
	$result = pg_query_params($dbconn, $CREATE_TEST, array($course_id, $name))
		or die(pg_last_error());
	$arr = pg_fetch_array($result, 0, PGSQL_ASSOC);
	return $arr["id"];
}

function create_test_question($test_id, $question) {
	global $dbconn, $CREATE_TEST_QUESTION;
	$question_text = $question["question"];
	$question_type_id = $question["question_type_id"];
	$choices = $question["choices"];
	$answer = $question["answer"];
	$result = pg_query_params($dbconn, $CREATE_TEST_QUESTION, array($test_id, $question_text, $question_type_id, $choices, $answer))
		or die(pg_last_error());
	return $result;
}

function add_test($test) {
	$questions = $test["questions"];
	$test_id = create_test($test);
	foreach ($questions as $question) {
		create_test_question($test_id, $question);
	}
	return true;
}

function fetch_test($test_id) {
	global $dbconn, $FETCH_TEST;
	$result = pg_query_params($dbconn, $FETCH_TEST, array($test_id))
		or die(pg_last_error());
	$arr = pg_fetch_all($result, PGSQL_ASSOC);
	return ['questions' => $arr, 'id' => $test_id];
}

function add_access($course_id, $login) {
	global $dbconn, $ADD_ACCESS;
	$result = pg_query_params($dbconn, $ADD_ACCESS, array($course_id, $login))
		or die(pg_last_error());
	return $result;
}
?>
