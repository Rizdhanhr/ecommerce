<?php 
 
include 'db/database.php';
$id = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$nama_voucher = mysqli_real_escape_string($conn, $_REQUEST['voucher']);
$tgl_start = mysqli_real_escape_string($conn, $_REQUEST['start']);
$tgl_end = mysqli_real_escape_string($conn, $_REQUEST['end']);
$tipe = mysqli_real_escape_string($conn, $_REQUEST['tipe']);
$nominal = mysqli_real_escape_string($conn, $_REQUEST['nominal']);
$status_member = mysqli_real_escape_string($conn, $_REQUEST['status_member']);
$poin = mysqli_real_escape_string($conn, $_REQUEST['poin']);
$masa_aktif = mysqli_real_escape_string($conn, $_REQUEST['masa_aktif']);

$sql = "update db_voucher set nama_voucher = '$nama_voucher', tgl_start = '$tgl_start', tgl_end = '$tgl_end', tipe = '$tipe', nominal = '$nominal', status_member = '$status_member', masa_aktif = $masa_aktif, poin = $poin where kode_voucher = '".$id."'";
// echo $sql;
$result = $conn->query($sql);
// echo $sql;
echo "<script type='text/javascript'>alert('Thanks You, update voucher berhasil');location.replace('voucher.php');</script>";

// Close connection
mysqli_close($conn);
 

 
?>