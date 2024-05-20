<?php
include_once "utils/login.php";
include_once "database/database.php";
include_once "utils/hash_password.php";

$login_info = login("mikeyadmin", "admin");
if ($login_info["ok"]) {
	echo $login_info["full_name"];
} else {
	echo "Else";
}


// echo get_password_and_salt("mikeyadmin")

// function print_hash_salt($password) {
// 	$hashed = hash_password($password);
// 	$hash = $hashed['hash'];
// 	$salt = $hashed['salt'];
// 	echo $hash;
// 	echo "\n";
// 	echo $salt;
// 	echo "\n";
// };
//
// $arr = array("admin", "notadmin", "student");
// foreach ($arr as &$value) {
// 	print_hash_salt($value);
// }

?>
