<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/login.php";
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(3))) {
	header("Location: ../error.html");
	exit();
}

$users = fetch_users($_POST["login"]);

if (count($users) == 0) {
	echo "No matching users found";
	exit();
}

echo "<form action='/api/delete_users.php' method='POST'>";
echo "<table>";
echo "<tr><th>Username</th><th>Full name</th><th>Delete</th></tr>";
foreach ($users as &$user) {
	echo "<tr>";
	echo "<td>" . $user["login"] . "</td>";
	echo "<td>" . $user["full_name"] . "</td>";
	echo "<td><input type='checkbox' name='" . $user["login"] . "'>Delete</button></td>";
	echo "</tr>";
}
echo "</table>";
echo "<button type='submit'>Удалить пользователей</input>";
echo "</form>";
?>
