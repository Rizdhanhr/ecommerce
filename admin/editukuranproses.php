<?php
include 'db/database.php';

$id = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$nama_ukuran = mysqli_real_escape_string($conn, $_REQUEST['ukuran']);

$sql = "update db_ukuran set id_ukuran = '$id', nama_ukuran = '$nama_ukuran' where id_ukuran = '".$id."'";

$result =  $conn->query($sql);

echo "<script type='text/javascript'>alert('Thanks You, update ukuran berhasil');location.replace('ukuran.php');</script>";

// Close connection
mysqli_close($conn);

?>