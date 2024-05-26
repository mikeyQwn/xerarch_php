<div class="center column">
<h1>Удалить пользователей</h1>
<form action="/api/fetch_deletion_users.php" method="POST" target="deletion_users">
  <label for="login">Логин:</label><br />
  <input type="text" id="login" name="login"/><br /><br />
  <button type="submit">Найти пользователя</button>
</form>
<br/>
<iframe name="deletion_users" onload="show()"></iframe>
<script>
function show() {
  if (document.querySelector("iframe").contentDocument.body.innerHTML === "") {
    document.querySelector("iframe").style.display = "none";
    return;
  }
  document.querySelector("iframe").style.display = "block";
}
</script>
</div>
