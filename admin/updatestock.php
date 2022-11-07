<?php
include 'db/database.php';

$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$stock = mysqli_real_escape_string($conn, $_REQUEST['stock']);
$namabarang = mysqli_real_escape_string($conn, $_REQUEST['namabarang']);
$hargabarang = mysqli_real_escape_string($conn, $_REQUEST['hargabarang']);
$deskripsi = mysqli_real_escape_string($conn, $_REQUEST['deskripsi']);



    $sql = "update db_barang set id_barang = '$id', nama_barang = '$namabarang', harga_barang = '$hargabarang', deskripsi = '$deskripsi', stok_barang = '$stock' where id_barang = '".$id."'";
    $result = $conn->query($sql);
//echo $sql;
   echo "<script type='text/javascript'>alert('Thanks You, update stock berhasil');location.replace('barang.php');</script>";

// Close connection
mysqli_close($conn);
?>