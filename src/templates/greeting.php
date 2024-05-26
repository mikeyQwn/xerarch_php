<h1>
  <?php
    $hour = date('G');
    $greeting = "";
    if ($hour < 12) {
      $greeting = 'Доброе утро';
    } else if ($hour < 18) {
      $greeting = 'Добрый день';
    } else {
      $greeting = 'Добрый вечер';
    }

    echo $greeting . ", " . $full_name;
    echo "<br />";
    ?>
</h1>

<h3>
<?php
echo "Вы вошли как " . get_role_name($role_id);
?>
</h3>
