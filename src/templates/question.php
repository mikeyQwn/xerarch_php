<?php
printf("Вопрос: %s", $question['question']);
if ($question['question_type_id'] == 1) {
  printf("<br/><input name='quid-%d' type='text' placeholder='Введите ответ'></input>", $question['id']);
}
else if ($question['question_type_id'] == 2) {
  $choices = $question['choices'];
  foreach(json_decode($choices, true) as &$choice) {
    printf('<label>');
    printf("<br/><input name='quid-%d' type='radio' value='%s'></input>", $question['id'], $choice);
    printf('%s</label>', $choice);
  }
}
?>
