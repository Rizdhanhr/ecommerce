<?php
include 'db/database.php';

$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$flash = mysqli_real_escape_string($conn, $_REQUEST['flash']);
$diskon = mysqli_real_escape_string($conn, $_REQUEST['diskon']);



    $sql = "update db_barang set flash = '$flash', diskon = '$diskon' where id_barang = '".$id."'";
    $result = $conn->query($sql);
//echo $sql;
   echo "<script type='text/javascript'>alert('Thanks You, update flash sale berhasil');location.replace('barang.php');</script>";

// Close connection
mysqli_close($conn);
?>