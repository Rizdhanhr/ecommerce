<?php
session_start();
    ob_start();
include 'admin/db/database.php';

$permitted_charss = '123';
$flag = substr(str_shuffle($permitted_charss), 0, 1);


$email = mysqli_real_escape_string($conn,  $_SESSION["userss"]);

$sql = "SELECT * FROM db_voucher ORDER BY RAND() LIMIT 1; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        $kode_voucher = mysqli_real_escape_string($conn,  $row['kode_voucher']);
        $nama_voucher =  $row['nama_voucher'];
    }
}else{
    echo "0 results";
}


if ($flag == 1){

			 $sql = "SELECT poin FROM db_user where email ='$email'";
			    $result = $conn->query($sql);
			    if ($result->num_rows > 0) {
			        // output data of each row
			        while($row = $result->fetch_assoc()) { 

			        	$poin =  $row['poin']+500 ;
						$sql = "update db_user set poin = $poin where email ='$email'";

					    if(mysqli_query($conn, $sql)){
					        $conn -> commit();


					         echo "<script type='text/javascript'>alert('Selamat, anda mendapatkan 500 Poin');location.replace('index.php');</script>";

					    } else{
					        $conn -> rollback();

					        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
					    }

			         }
			    }else{
			        echo "0 results";
			    }
			 

}else if ($flag == 2){
		$sql = "INSERT INTO db_voucher_user (email,	kode_voucher) VALUES ('$email','$kode_voucher')";
echo $sql;
		if(mysqli_query($conn, $sql)){
			 echo "<script type='text/javascript'>alert('Selamat, anda mendapatkan voucher ".$nama_voucher."');location.replace('index.php');</script>";
		
		} else{
		    $conn -> rollback();

		     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
		}

}else if ($flag == 3){
 	echo "<script type='text/javascript'>alert('Maaf, anda kurang beruntung');location.replace('index.php');</script>";

}



    

?>