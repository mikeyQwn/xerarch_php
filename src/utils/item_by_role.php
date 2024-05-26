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
?>
