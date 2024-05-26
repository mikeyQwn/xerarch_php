<?php

function render_template()
{
    extract(func_get_arg(1));
    ob_start();
    if (file_exists(func_get_arg(0))) {
        require func_get_arg(0);
    } else {
        echo 'Template not found!';
    }
    return ob_get_clean();
}
?>
