<?php
    session_start();
    ob_start();

    session_destroy();
    echo "<script type='text/javascript'>alert('Terimakasih Selamat Istirahat');location.replace('index.php');</script>";

?>