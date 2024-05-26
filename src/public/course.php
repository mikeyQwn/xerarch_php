<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';

global $LAYOUT_TEMPLATE, $COURSE_TEMPLATE, $PROFESSOR_NAVIGATION;

$user_info = auth_middleware(array(1, 2));

$contents = render_template($COURSE_TEMPLATE, [
  'lessons' => fetch_lessons($_GET["id"], $user_info['id']),
  'tests' => fetch_tests($_GET["id"], $user_info['id']),
]);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Меню курса',
  'navigation' => get_navbar($user_info['role_id']),
  'contents' => $contents,
  ]
);
?>
