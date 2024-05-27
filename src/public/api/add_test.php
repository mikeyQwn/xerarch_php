<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$user_info = auth_middleware(array(1));
$contents = file_get_contents($_FILES["upload"]["tmp_name"]);
$contents_decoded = json_decode($contents, true);
$questions = [];
foreach ($contents_decoded as $question) {
	$is_format_incorrect = !isset($question['question']) or !isset($question['type']) or !isset($question['answer']);
	$is_format_incorrect = $is_format_incorrect or ($question['type'] === 'choice' and !isset($question['choices']));
	$is_format_incorrect = $is_format_incorrect or ($question['type'] !== 'choice' and $question['type'] !== 'answer');
	if ($is_format_incorrect) {
		die("Некорректный формат вопроса");
	}
	$question_type_id = ($question['type'] === 'answer') ? 1 : 2;
	$choices = ($question['type'] === 'choice') ? 
	'{'. implode(', ', $question['choices']) . '}' : null;
	$answer = $question['answer'];
	$q = $question['question'];
	array_push($questions, array(
		"question" => $q,
		"question_type_id" => $question_type_id,
		"choices" => $choices,
		"answer" => $answer,
	));
}

$test = array(
	"course_id" => $_POST["course_id"],
	"name" => $_POST["name"],
	"questions" => $questions,
);
add_test($test) or die("Не удалось добавить тест");

echo "Тест загружен!";
?>
