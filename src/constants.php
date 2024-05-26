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
	["href" => "/courses.php", "text" => "Ваши курсы"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

$STUDENT_NAVIGATION = [
	["href" => "/", "text" => "Домой"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

$MODERATOR_NAVIGATION = [
	["href" => "/", "text" => "Домой"],
    ["href" => "/moderator/delete_user.php", "text" => "Удалить пользователей"],
    ["href" => "/moderator/register_user.php", "text" => "Зарегистрировать пользователя"],
	["href" => "/api/logout.php", "text" => "Выйти"],
];

//templates 
$TEMPLATE_DIR = $ROOT . "templates/";
$LAYOUT_TEMPLATE = $TEMPLATE_DIR . "layout.php";
$ANCHOR_TEMPLATE = $TEMPLATE_DIR . "anchor.php";
$LOGIN_TEMPLATE = $TEMPLATE_DIR . "login.php";
$COURSE_TEMPLATE = $TEMPLATE_DIR . "course.php";
$LESSON_TEMPLATE = $TEMPLATE_DIR . "lesson.php";
$UNAUTH_TEMPLATE = $TEMPLATE_DIR . "unauth.php";
$NOTFOUND_TEMPLATE = $TEMPLATE_DIR . "notfound.php";
$COURSES_TEMPLATE = $TEMPLATE_DIR . "courses.php";
$GREETING_TEMPLATE = $TEMPLATE_DIR . "greeting.php";
$FILE_UPLOAD_TEMPLATE = $TEMPLATE_DIR . "upload_file.php";
$CREATE_USER_TEMPLATE = $TEMPLATE_DIR . "create_user.php";
$DELETE_USERS_TEMPLATE = $TEMPLATE_DIR . "delete_users.php";
$SHOW_TEMPLATE = $TEMPLATE_DIR . "show.php";
?>
