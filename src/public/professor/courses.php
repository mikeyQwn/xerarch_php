<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$user_info = auth_middleware(array(1));

$courses = fetch_courses($user_info['id']) or die("Не удалось получить информацию о курсах");


global $LAYOUT_TEMPLATE, $PROFESSOR_COURSES_TEMPLATE, $GENERAL_NAVIGATION;

$contents = render_template($PROFESSOR_COURSES_TEMPLATE, $courses);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Логин',
  'navigation' => $GENERAL_NAVIGATION,
  'contents' => $contents,
  ]
);
?>

