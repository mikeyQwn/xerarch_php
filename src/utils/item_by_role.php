<?php 
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$NAVBAR_TO_ROLE = [
	1 => $PROFESSOR_NAVIGATION,
	2 => $STUDENT_NAVIGATION,
	3 => $MODERATOR_NAVIGATION,
];
function get_navbar($role_id) {
	global $NAVBAR_TO_ROLE, $GENERAL_NAVIGATION;
	if (!isset($NAVBAR_TO_ROLE[$role_id])) {
		return $GENERAL_NAVIGATION;
	};
	return $NAVBAR_TO_ROLE[$role_id];
}

$ID_TO_ROLE_NAME = [
	1 => 'преподаватель',
	2 => 'ученик',
	3 => 'модератор',
];
function get_role_name($role_id) {
	global $ID_TO_ROLE_NAME;
	if (!isset($ID_TO_ROLE_NAME[$role_id])) {
		return '[Не определено]';
	};
	return $ID_TO_ROLE_NAME[$role_id];
}

function can_add_lesson($user_id) {
	return $user_id == 1;
}
?>
