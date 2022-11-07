<?php
include 'db/database.php';

$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$pass = mysqli_real_escape_string($conn, md5($_REQUEST['pass']));
$konfirmpass = mysqli_real_escape_string($conn, $_REQUEST['konfirmpass']);
$level = mysqli_real_escape_string($conn, $_REQUEST['level']);

if($_REQUEST['pass'] == $_REQUEST['konfirmpass']){
	$sql = "INSERT INTO `users`(`username`, `password`, `level`) VALUES ('$username','$pass','$level')";
	if(mysqli_query($conn, $sql)){
	   
	      echo "<script type='text/javascript'>location.replace('users.php');</script>";
		  
	} else{
		echo $sql;
	    //echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('users.php');</script>";
	}
}else{
	echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan sepertinya password dan konfirm password tidak sama');location.replace('users.php');</script>";
}
    




?>