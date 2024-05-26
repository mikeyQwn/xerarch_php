<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
?>

<!doctype html>
<html>
  <head>
    <title><?php echo $title ?></title>
  </head>
  <header>
    <nav>
      <?php
        global $ANCHOR_TEMPLATE;
      foreach ($navigation as &$nav_button) {
          echo render_template($ANCHOR_TEMPLATE, $nav_button); 
      };
      ?>
    </nav>
  </header>
  <body>
    <?php echo $contents ?>
  </body>
</html>

