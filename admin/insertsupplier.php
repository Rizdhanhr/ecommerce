<?php
include 'db/database.php';

$namasupplier = mysqli_real_escape_string($conn, $_REQUEST['namasupplier']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$alamat = mysqli_real_escape_string($conn, $_REQUEST['alamat']);
$negara = mysqli_real_escape_string($conn, $_REQUEST['negara']);


    $sql = "INSERT INTO suplier (nama_suplier,	alamat,	negara,	telpon,	email) VALUES ('$namasupplier','$alamat','$negara','$phone','$email')";
	if(mysqli_query($conn, $sql)){
	   
	      echo "<script type='text/javascript'>location.replace('supplier.php');</script>";
		
	} else{
	    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('supplier.php');</script>";
	}




?>