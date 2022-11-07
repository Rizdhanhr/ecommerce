<?php
include 'db/database.php';

    $id = $_GET['q'];

    $typelayout = 0;

    $sql = "update db_pembayaran set status_bayar = -1 where id_pembayaran = '".$id."'";
    $result = $conn->query($sql);

// Close connection
mysqli_close($conn);
?>