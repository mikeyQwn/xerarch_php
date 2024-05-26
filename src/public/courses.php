<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$user_info = auth_middleware([1, 2]);

$courses = fetch_courses($user_info['id']) or die("Не удалось получить информацию о курсах");

$contents = render_template($COURSES_TEMPLATE, ['courses' => $courses]);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Мои курсы',
  'navigation' => get_navbar($user_info["role_id"]),
  'contents' => $contents,
  ]
);
?>

