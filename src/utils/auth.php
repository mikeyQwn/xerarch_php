<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

function auth_middleware($role_ids) {
	$user_info = auth($role_ids);

	if (!$user_info["ok"]) {
		global $LAYOUT_TEMPLATE, $UNAUTH_TEMPLATE, $GENERAL_NAVIGATION;
		$contents = render_template($UNAUTH_TEMPLATE, []);
		echo render_template($LAYOUT_TEMPLATE, [
			'title' => "Вы не авторизованы",
			'navigation' => $GENERAL_NAVIGATION,
			'contents' => $contents,
		]);
		exit();
	}
	return $user_info;
}

function auth($role_ids) {
	global $AUTH_COOKIE;
	$user_info = get_user_info($_COOKIE[$AUTH_COOKIE]) or array();
	$user_info["ok"] = false;
	$role_id = $user_info["role_id"];
	if (!isset($role_id)) {
		return $user_info;
	}
	foreach ($role_ids as &$role_id_candidate) {
		if ($role_id_candidate == $role_id) {
			$user_info["ok"] = true;
			return $user_info;
		}
	}
	return $user_info;
}

?>
