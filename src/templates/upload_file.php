<form action="<?php echo $action ?>" target="<?php echo $target ?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
  <label for="name">
    <?php echo $label ?>
  </label>
  <br/>
  <input type="text" name="name" id="name" required />
  <br/>
  <input type="file" accept="text/plain" id="upload" name="upload" />
  <br/>
  <button>Загрузить файл</button>
</form>
