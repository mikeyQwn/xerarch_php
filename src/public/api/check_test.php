<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";

$user_info = auth_middleware(array(1, 2));
$test = fetch_test($_POST['test_id']) or die("Не удалось получить тест");
$test = $test['questions'];
$i = 1;
foreach ($test as $key => $value) {
	$quid ="quid-" . $value['id'];
	if ($_POST[$quid]) {
		if ($_POST[$quid] == $value['answer']) {
			printf("Вопрос %d: Ответ верный<br/>", $i);
		} else {
			printf("Вопрос %d: Ответ неверный<br/>", $i);
		}
	}
	$i += 1;
}
?>
