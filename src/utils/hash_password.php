<?php
function hash_password($password) {
	$salt = bin2hex(random_bytes(16));
	$full_password = $password . $salt;
	$hash = password_hash($full_password, PASSWORD_DEFAULT);
	return [
		'hash' => $hash,
		'salt' => $salt
	];
}

function verify_password($password, $salt, $hash) {
	$full_password = $password . $salt;
	return password_verify($full_password, $hash);
}
?>
