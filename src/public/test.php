<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/item_by_role.php';

$user_info = auth_middleware(array(1, 2));
$test_id = $_GET["id"];
if (!isset($test_id)) {
  die("Не указан идентификатор теста");
}
$test = fetch_test($test_id) or die("Не удалось получить тест");

$contents = render_template($TEST_TEMPLATE,
  $test
);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Меню теста',
  'navigation' => get_navbar($user_info['role_id']),
  'contents' => $contents,
  ]
);
?>
