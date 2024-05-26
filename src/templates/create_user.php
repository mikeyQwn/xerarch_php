<div class="center column">
<h1>Регистрация пользователя</h1>
<form action="/api/create_user.php" method="POST">
  <label for="full_name">Полное имя:</label><br />
  <input type="text" id="full_name" name="full_name" required /><br /><br />
  <label for="login">Логин:</label><br />
  <input type="text" id="login" name="login" required /><br /><br />
  <label for="password">Пароль:</label><br />
  <input
    type="password"
    id="password"
    name="password"
    required
  /><br /><br />
  <label for="role_id">Роль:</label><br />
  <select name="role_id" required>
<datalist id="role_ids">
  <option value="1">Преподаватель</option>
  <option value="2">Студент</option>
  <option value="3">Модератор</option>
  </datalist>
  </select>
  <br/ >
  <br/ >
  <button type="submit">Создать пользователя</button>
  </form>
</div>
