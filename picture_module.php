<?php
    $directory = 'img';
    $files = scandir($directory);
    foreach ($files as $name) {
        if ($name == '.' || $name == '..') {
            continue;
        } ?>
        <a <?php echo 'href="img/'.$name.'"'; ?> onclick="window.open(this.href);
 return false">
            <img <?php echo ' src="img/'.$name.'" width="450" height="450" '; ?>>
        </a>
    <?php } ?>