<?php 
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$user_info = auth_middleware(array(3));
$contents = render_template($DELETE_USERS_TEMPLATE, []);

echo render_template($LAYOUT_TEMPLATE, [
	'title' => 'Удаление пользователей',
	'navigation' => get_navbar($user_info['role_id']),
	'contents' => $contents,
	]
);

