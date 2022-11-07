<?php
include 'db/database.php';

$kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
$inv = mysqli_real_escape_string($conn, $_REQUEST['inv']);

$sql = "INSERT INTO `dtpembelian` (`invoicepo`, `kode_barang`,`stock`) VALUES ('$inv','$kode','$qty')";
if(mysqli_query($conn, $sql)){
	echo "Berhasil";   
} else{
    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('penjualan.php');</script>";
}
		    
?>