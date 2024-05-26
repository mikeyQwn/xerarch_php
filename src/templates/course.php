<?php 
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
?>

<h1>Меню курса</h1>
<hr/>
<h3>Лекции</h3>
<?php 
  global $ANCHOR_TEMPLATE;
  foreach ($lessons as $lesson) { 
    echo render_template($ANCHOR_TEMPLATE, [
      'href' => "/lesson.php?id=" . $lesson['id'],
      'text' => $lesson['name'],
    ]);
    echo "<br>";
  }
  if ($can_add) {
    global $FILE_UPLOAD_TEMPLATE;
    echo "<br/><strong>Загрузить лекцию</strong>";
    echo render_template($FILE_UPLOAD_TEMPLATE, [
      'label' => 'Название лекции',
      'action' => '/api/add_lesson.php',
      'target' => 'lesson',
      'course_id' => $course_id,
    ]);
    echo "<iframe name='lesson'></iframe>";
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
