<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/login.php";
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(3))) {
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
      <a href="/moderator/delete_user.php">Удалить пользователя</a>
      <a href="/moderator/register_user.php">Зарегистрировать пользователя</a>
      <a href="/api/logout.php">Выйти</a>
    </nav>
  </header>
  <body>
    <h1>Удалить пользователей</h1>
    <form action="/api/fetch_deletion_users.php" method="POST" target="deletion_users">
      <label for="login">Логин:</label><br />
      <input type="text" id="login" name="login"/><br /><br />
      <button type="submit">Найти пользователя</button>
    </form>
    <iframe name="deletion_users"></iframe>
  </body>
</html>

