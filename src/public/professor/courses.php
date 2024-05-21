<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(1))) {
	header("Location: ../error.html");
	exit();
}

$user_info = get_user_info($_COOKIE[$AUTH_COOKIE]) or die("Не удалось получить информацию о пользователе");
$courses = fetch_courses_professor($user_info['id']) or die("Не удалось получить информацию о курсах");
?>

<!doctype html>
<html>
    <head>
      <title>Home</title>
    </head>
    <header>
      <nav>
	<a href="/">Домой</a>
	<a href="/api/logout.php">Выйти</a>
	<a href="/professor/courses.php">Ваши курсы</a>
      </nav>
    </header>
  <body>
    <?php 
foreach ($courses as $id => $course_info) {
  printf('<a href="/professor/course.php?name=%s">%s</a><br>', $course_info['name'], $course_info['name']);
  printf('<p>%s</p>', $course_info['description']);
    }
    ?>
  </body>
</html>

