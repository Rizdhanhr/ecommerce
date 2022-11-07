<?php
include 'db/database.php';

    $id = $_GET['q'];

    $typelayout = 0;

    $sql = "delete from db_kategori where id_kategori = '".$id."'";
     //$sql = "select * from event where id_event = 2";
    $result = $conn->query($sql);

// Close connection
mysqli_close($conn);
?>