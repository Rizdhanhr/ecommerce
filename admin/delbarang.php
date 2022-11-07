<?php
include 'db/database.php';

    $id = $_GET['q'];

    $typelayout = 0;

    $sql = "delete from db_barang where id_barang = '".$id."'";
    $result = $conn->query($sql);

// Close connection
mysqli_close($conn);
?>