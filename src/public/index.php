<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$auth_cookie = $_COOKIE[$AUTH_COOKIE];
if (!isset($auth_cookie)) {
      header("Location: login.php");
      exit();
}

$user_info = get_user_info($auth_cookie);
if (!$user_info) {
      header("Location: login.php");
      exit();
}
$contents = render_template($GREETING_TEMPLATE, $user_info);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Логин',
  'navigation' => get_navbar($user_info['role_id']),
  'contents' => $contents,
  ]
);
?>
