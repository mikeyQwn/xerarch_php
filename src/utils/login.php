<?php
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
?>
