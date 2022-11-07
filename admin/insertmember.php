<?php
include 'db/database.php';

$namamember = mysqli_real_escape_string($conn, $_REQUEST['namamember']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$alamat = mysqli_real_escape_string($conn, $_REQUEST['alamat']);
$platno = mysqli_real_escape_string($conn, $_REQUEST['platno']);


    $sql = "INSERT INTO pelanggan (nama_pelanggan,	alamat,	plat_no,	telepon,	email) VALUES ('$namamember','$alamat','$platno','$phone','$email')";
	if(mysqli_query($conn, $sql)){
	   
	      echo "<script type='text/javascript'>location.replace('pelanggan.php');</script>";
		
	} else{
	    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('pelanggan.php');</script>";
	}




?>