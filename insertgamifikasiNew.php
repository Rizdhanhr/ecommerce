<?php
session_start();
    ob_start();
include 'admin/db/database.php';

		
		$poinNew = mysqli_real_escape_string($conn,  $_GET["poin"]);
		$email = mysqli_real_escape_string($conn,  $_SESSION["userss"]);

			 $sql = "SELECT poin FROM db_user where email ='$email'";
			    $result = $conn->query($sql);
			    if ($result->num_rows > 0) {
			        // output data of each row
			        while($row = $result->fetch_assoc()) { 

			        	$poin =  $row['poin']+$poinNew ;
						$sql = "update db_user set poin = $poin where email ='$email'";

					    if(mysqli_query($conn, $sql)){
					        $conn -> commit();


					         echo "<script type='text/javascript'>alert('Selamat, anda mendapatkan ".$poinNew." Poin');location.replace('index.php');</script>";

					    } else{
					        $conn -> rollback();

					        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
					    }

			         }
			    }else{
			        echo "0 results";
			    }
			 



    

?>