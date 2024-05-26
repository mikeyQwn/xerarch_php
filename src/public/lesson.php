<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';

global $LAYOUT_TEMPLATE, $LESSON_TEMPLATE;

$user_info = auth_middleware(array(1, 2));
$lesson = fetch_lesson($_GET["id"], $user_info['id']);

$contents = render_template($LESSON_TEMPLATE, [
  'name' => $lesson['name'],
  'content' => $lesson['full_text'],
]);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Лекция ' . $lesson['name'],
  'navigation' => get_navbar($user_info['role_id']),
  'contents' => $contents,
  ]
);
?>
