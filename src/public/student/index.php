<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(2))) {
	header("Location: ../error.html");
	exit();
}
?>

<!doctype html>
<html>
  <head>
    <title>Home</title>
  </head>
  <header>
    <nav>
      <a href="/">Домой</a>
      <a href="/student/courses.php">Курсы</a>
      <a href="/api/logout.php">Выйти</a>
    </nav>
  </header>
  <body>
    <h1>Вы - студент</h1>
  </body>
</html>

