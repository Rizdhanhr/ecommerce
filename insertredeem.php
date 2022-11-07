<?php
session_start();
    ob_start();
include 'admin/db/database.php';

$email = mysqli_real_escape_string($conn,  $_SESSION["userss"]);
$kodevoucher = mysqli_real_escape_string($conn,  $_GET["kodevoucher"]);
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

$claim_voucher =  mysqli_real_escape_string($conn,  substr(str_shuffle($permitted_chars), 0, 10));
 
$lanjut = 0;
$sql = "SELECT * FROM db_voucher where kode_voucher = '$kodevoucher' ORDER BY RAND() LIMIT 1; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        $kode_voucher = mysqli_real_escape_string($conn,  $row['kode_voucher']);
        $nama_voucher =  $row['nama_voucher'];
        $poin_redeem =  $row['poin'];
    }
}else{
    echo "0 results";
}

$sql = "select count(dvu.email) as total,du.email, du.tipe_member from db_voucher_user dvu
join db_user du on du.email = dvu.email
where du.email = '$email' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        if($row['tipe_member'] == "epic" ){
			if($row['total'] <= 2){
				$lanjut = 1;
			}
		}else if($row['tipe_member'] == "legend"){
			if($row['total'] <= 4){
				$lanjut = 1;
			}
		}else if($row['tipe_member'] == "mythic"){
			if($row['total'] <= 6){
				$lanjut = 1;
			}
		}
    }
}
	if($lanjut == 1){
		$sql = "INSERT INTO db_voucher_user (email,	kode_voucher,claim_voucher) VALUES ('$email','$kode_voucher','$claim_voucher')";

		if(mysqli_query($conn, $sql)){

			 $sql = "SELECT poin FROM db_user where email ='$email'";
			    $result = $conn->query($sql);
			    if ($result->num_rows > 0) {
			        // output data of each row
			        while($row = $result->fetch_assoc()) { 

			        	$poin =  $row['poin']-$poin_redeem ;
						if($poin >= 0 && $poin <= 250 ){
							$tipe = mysqli_real_escape_string($conn, 'epic');
						}else if($poin >= 251 && $poin <= 700 ){
							$tipe = mysqli_real_escape_string($conn, 'legend');
						}else if($poin >= 701 ){
							$tipe = mysqli_real_escape_string($conn, 'mythic');
						}
						
						$sql = "update db_user set poin = $poin where email ='$email'";

					    if(mysqli_query($conn, $sql)){
					        $conn -> commit();


					        echo "<script type='text/javascript'>alert('Selamat, anda mendapatkan voucher ".$nama_voucher."');location.replace('index.php');</script>";

					    } else{
					        $conn -> rollback();

					        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba select data poin.');location.replace('index.php');</script>";
					    }

			         }
			    }else{
			        echo "0 results";
			    }
			
		
		} else{
		    $conn -> rollback();

		     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
		}

	}else{
		echo "<script type='text/javascript'>alert('Maaf,  penyimpanan voucher anda sudah maksimal, tingkatkan badges anda untuk menyimpan lebih banyak voucher');location.replace('redeem.php');</script>";
	}

?>