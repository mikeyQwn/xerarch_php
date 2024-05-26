<?php
$AUTH_COOKIE = "Auth";
$ROOT = $_SERVER["DOCUMENT_ROOT"] . "/../";

//navigation
$GENERAL_NAVIGATION = [
	["href" => "/", "text" => "Домой"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

$PROFESSOR_NAVIGATION = [
	["href" => "/", "text" => "Домой"],
	["href" => "/professor/courses.php", "text" => "Ваши курсы"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

$STUDENT_NAVIGATION = [
	["href" => "/", "text" => "Домой"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

$MODERATOR_NAVIGATION = [
	["href" => "/", "text" => "Домой"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

//templates 
$TEMPLATE_DIR = $ROOT . "templates/";
$LAYOUT_TEMPLATE = $TEMPLATE_DIR . "layout.php";
$ANCHOR_TEMPLATE = $TEMPLATE_DIR . "anchor.php";
$LOGIN_TEMPLATE = $TEMPLATE_DIR . "login.php";
$COURSE_TEMPLATE = $TEMPLATE_DIR . "course.php";
?>
