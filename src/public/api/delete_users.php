<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/login.php";
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(3))) {
	header("Location: ../error.html");
	exit();
}

$to_delete = array();
foreach ($_POST as $deletion_candidate => $is_on) {
	if ($is_on != "on") {
		continue;
	}
	array_push($to_delete, $deletion_candidate);
}

delete_users($to_delete) or die("Не удалось удалить пользователей");

echo "Пользователи удалены!";
?>
