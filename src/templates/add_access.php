<form action="/api/add_access.php" method="POST" target="acceess_status">
  <input type="hidden" name="course_id" value='<?php echo $course_id; ?>' />
  <label>Введите имя пользователя</label>
  <input type="text" name="login" placeholder="Имя пользователя" required></input>
  <button type="submit">Дать доступ</button>
</form>
<iframe name="acceess_status" id="acceess_status" onload="show('acceess_status')"></iframe>
