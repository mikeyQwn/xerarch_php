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
      <a href="/professor/courses.php">Ваши курсы</a>
      <a href="/api/logout.php">Выйти</a>
    </nav>
  </header>
  <body>
    <h1>Меню курса</h1>
    <?php print_r(fetch_lessons($_GET["id"], $user_info["id"])) ?>
  </body>
</html>

