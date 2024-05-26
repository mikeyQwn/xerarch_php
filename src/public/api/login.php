<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/../database/database.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/login.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

global $UNAUTH_TEMPLATE, $LAYOUT_TEMPLATE, $GENERAL_NAVIGATION;

$login_info = login($_POST["login"], $_POST["password"]);
if (!$login_info["ok"]) {
	header("HTTP/1.1 401 Unauthorized");
	$contents = render_template($UNAUTH_TEMPLATE, []);
	echo render_template($LAYOUT_TEMPLATE, [
		'title' => "Вы не авторизованы",
		'navigation' => $GENERAL_NAVIGATION,
		'contents' => $contents,
	]);
	exit();
}

if ($login_info["ok"]) {
	$cookie = $login_info["cookie"];
	setcookie($AUTH_COOKIE, $cookie, time() + 3600, "/");
	header("Location: /");
	exit();
} 

header("HTTP/1.1 401 Unauthorized");
$contents = render_template($UNAUTH_TEMPLATE, []);
echo render_template($LAYOUT_TEMPLATE, [
	'title' => "Вы не авторизованы",
	'navigation' => $GENERAL_NAVIGATION,
	'contents' => $contents,
]);
exit();
?>
