<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';

function login($login, $password) {
	$user_info = get_password_and_salt($login);
	$hash = $user_info["password"];
	$salt = $user_info["salt"];
	$ok = verify_password($password, $salt, $hash);
	if (!$ok) {
		return [
		'ok' => $ok,
		];
	}
	$id = $user_info["id"];
	$cookie = get_new_cookie($id);
	return [
		'ok' => $ok,
		'full_name' => $user_info['full_name'],
		'cookie' => $cookie,
		'role_id' => $user_info['role_id'],
	];
}

function verify_access($auth_cookie, $role_ids) {
	$user_info = get_user_info($auth_cookie);
	$role_id = $user_info["role_id"];
	if (!isset($role_id)) {
		return false;
	}
	foreach ($role_ids as &$role_id_candidate) {
		if ($role_id_candidate == $role_id) {
			return true;
		}
	}
	return false;
}
?>
