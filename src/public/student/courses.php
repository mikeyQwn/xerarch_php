<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/login.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(2))) {
      header("Location: ../error.html");
      exit();
}
?>
