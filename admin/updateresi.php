<?php
include 'db/database.php';

$kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$id_pengiriman = mysqli_real_escape_string($conn, $_REQUEST['id_pengiriman']);
$nama = mysqli_real_escape_string($conn, $_REQUEST['nama']);


    $typelayout = 0;

    $sql = "update db_pengiriman set kurir = '$nama',no_resi = '$kode' where id_pengiriman = '".$id_pengiriman."'";
    $result = $conn->query($sql);
    echo $sql;
    echo "<script type='text/javascript'>alert('Thanks You, update nomer resi dan kurir berhasil');location.replace('pengiriman.php');</script>";

// Close connection
mysqli_close($conn);
?>