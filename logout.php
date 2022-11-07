<?php
    session_start();
    ob_start();

    session_destroy();
    echo "<script type='text/javascript'>alert('Thanks U ');location.replace('index.php');</script>";

?>