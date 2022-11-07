<?php
include 'admin/db/database.php';

$id = mysqli_real_escape_string($conn, $_REQUEST['email']);

$nama = mysqli_real_escape_string($conn, $_REQUEST['nama']);

$no_hp = mysqli_real_escape_string($conn, $_REQUEST['no_hp']);

$alamat = mysqli_real_escape_string($conn, $_REQUEST['alamat']);


$sql = "update db_user set email = '$id', nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' where email = '".$id."'";

$result =  $conn->query($sql);

echo "<script type='text/javascript'>alert('Profil Berhasil Dirubah');location.replace('profile.php');</script>";

// Close connection
mysqli_close($conn);

?>