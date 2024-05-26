<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';

$user_info = auth_middleware(array(1));

$courses = fetch_courses($user_info['id']) or die("Не удалось получить информацию о курсах");
?>

<!doctype html>
<html>
    <head>
      <title>Home</title>
    </head>
    <header>
      <nav>
	<a href="/">Домой</a>
	<a href="/professor/courses.php">Ваши курсы</a>
	<a href="/api/logout.php">Выйти</a>
      </nav>
    </header>
  <body>
    <?php 
foreach ($courses as $id => $course_info) {
  printf('<a href="/course.php?id=%s">%s</a><br>', $course_info['id'], $course_info['name']);
  printf('<p>%s</p>', $course_info['description']);
    }
    ?>
  </body>
</html>

