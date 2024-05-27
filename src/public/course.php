<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';

$user_info = auth_middleware(array(1, 2));
$course_id = $_GET["id"];
if (!isset($course_id)) {
  die("Не указан идентификатор курса");
}

$contents = render_template($COURSE_TEMPLATE, [
  'lessons' => fetch_lessons($course_id, $user_info['id']),
  'tests' => fetch_tests($course_id, $user_info['id']),
  'can_add' => can_add_lesson($user_info['role_id']),
  'course_id' => $course_id,
]);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Меню курса',
  'navigation' => get_navbar($user_info['role_id']),
  'contents' => $contents,
  ]
);
?>
