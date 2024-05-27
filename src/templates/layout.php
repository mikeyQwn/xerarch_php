<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/render_template.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
?>

<!doctype html>
<html>
  <head>
    <title><?php echo $title ?></title>
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico" />
  </head>
  <body>
    <header>
      <nav>
        <a href="/">
            <img src="/static/logo.svg" />
        </a>
        <?php
          global $ANCHOR_TEMPLATE;
        foreach ($navigation as &$nav_button) {
            echo render_template($ANCHOR_TEMPLATE, $nav_button); 
        };
        ?>
      </nav>
    </header>
    <main>
    <?php echo $contents ?>
    </main>
  </body>
</html>

