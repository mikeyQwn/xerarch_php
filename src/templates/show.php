<script>
function show(id) {
  const query = `#${id}`;
  const item = document.querySelector(query);
  if (item.contentDocument.body.innerHTML === "") {
    item.style.display = "none";
    return;
  }
  item.style.display = "block";
}
</script>
