<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';

$user_info = auth_middleware(array(1));
?>

<!doctype html>
<html>
  <head>
    <title>Home</title>
  </head>
  <header>
    <nav>
      <a href="/">Домой</a>
      <a href="/courses.php">Ваши курсы</a>
      <a href="/api/logout.php">Выйти</a>
    </nav>
  </header>
  <body>
    <h1>Вы - профессор</h1>
  </body>
</html>

