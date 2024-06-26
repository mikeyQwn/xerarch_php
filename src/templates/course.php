<?php 
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

global $SHOW_TEMPLATE;
echo render_template($SHOW_TEMPLATE, []);
?>


<div class="flex column gap">
<h1>Меню курса</h1>
<hr/>
<h3>Лекции</h3>
<?php 
global $ANCHOR_TEMPLATE;
echo "<ul>";
foreach ($lessons as $lesson) { 
    echo "<li>";
    echo render_template($ANCHOR_TEMPLATE, [
      'href' => "/lesson.php?id=" . $lesson['id'],
      'text' => $lesson['name'],
    ]);
    echo "</li>";
}
echo "</ul>";
if ($can_add) {
    global $FILE_UPLOAD_TEMPLATE;
    echo "<br/><strong>Загрузить лекцию</strong>";
    echo render_template($FILE_UPLOAD_TEMPLATE, [
      'label' => 'Название лекции',
      'action' => '/api/add_lesson.php',
      'target' => 'lesson',
      'course_id' => $course_id,
      'accept' => 'text/plain'
    ]);
  echo "<iframe id='add_lesson' name='lesson' onload='show(\"add_lesson\")'></iframe>";
}

?>

<?php if (isset($tests) and count($tests) != 0) { ?>
<hr/>
<h3>Тесты</h3>
<?php 
  foreach ($tests as $test) { 
    echo render_template($ANCHOR_TEMPLATE, [
      'href' => "/test.php?id=" . $test['id'],
      'text' => $test['name'],
    ]);
    echo "<br>";
  }
  ?>
  <?php } ?>

<?php
if ($can_add) {
  global $FILE_UPLOAD_TEMPLATE;
  echo "<br/><strong>Загрузить тест</strong>";
  echo render_template($FILE_UPLOAD_TEMPLATE, [
    'label' => 'Название теста',
    'action' => '/api/add_test.php',
    'target' => 'test',
    'course_id' => $course_id,
    'accept' => 'application/json',
]);
echo "<iframe id='add_test' name='test' onload='show(\"add_test\")'></iframe>";
  }

  if ($can_add) {
  global $ADD_ACCESS_TEMPLATE;

  echo "<hr/><br/><strong>Предоставить доступ к курсу</strong>";
  echo render_template($ADD_ACCESS_TEMPLATE, ['course_id' => $course_id]);
}
?>
</div>
