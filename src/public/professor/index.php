<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(1))) {
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
      <a href="/api/logout.php">Выйти</a>
      <a href="/professor/courses.php">Ваши курсы</a>
    </nav>
  </header>
  <body>
    <h1>Вы - профессор</h1>
  </body>
</html>

