<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';

$auth_cookie = $_COOKIE["Auth"];
if (isset($auth_cookie)) {
  $user_info = get_user_info($auth_cookie);
  $role_id = $user_info["role_id"];
  if (isset($role_id)) {
	if ($role_id == 1) {
		header("Location: ../professor/index.php");
		exit();
	}
	if ($role_id == 2) {
		header("Location: ../student/index.php");
		exit();
	}
	if ($role_id == 3) {
		header("Location: ../moderator/index.php");
		exit();
	}
  }
}



header("Location: login.php");
exit();
?>
