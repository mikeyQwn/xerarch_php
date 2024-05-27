<h1>Тест</h1>
<form action="/api/check_test.php" method="POST" target="check-test">
<input type="hidden" name="test_id" value="<?php echo $id; ?>" />
<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

global $QUESTION_TEMPLATE;
foreach ($questions as $id => $question) {
  echo render_template($QUESTION_TEMPLATE, ['id' => $id, 'question' => $question]);
  echo "<br/><br/>";
  }
?>

<button type="submit">Проверить тест</button>
</form>

<iframe name="check-test" onload="show()"></iframe>
<script>
function show() {
  if (document.querySelector("iframe").contentDocument.body.innerHTML === "") {
    document.querySelector("iframe").style.display = "none";
    return;
  }
  document.querySelector("iframe").style.display = "block";
}
</script>
