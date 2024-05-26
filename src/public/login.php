<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

global $LAYOUT_TEMPLATE, $LOGIN_TEMPLATE, $GENERAL_NAVIGATION;

$contents = render_template($LOGIN_TEMPLATE, []);

echo render_template($LAYOUT_TEMPLATE, [
  'title' => 'Логин',
  'navigation' => $GENERAL_NAVIGATION,
  'contents' => $contents,
  ]
);
?>
