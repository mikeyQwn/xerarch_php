<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

setcookie($AUTH_COOKIE, "", -1, "/");
header("Location: ../login.php");
exit();
?>
