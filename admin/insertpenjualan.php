<?php
include 'db/database.php';

$kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
$inv = mysqli_real_escape_string($conn, $_REQUEST['inv']);

$sql = "SELECT stock from barang where kode_barang = '$kode'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
	 	if ($row["stock"] >= $qty){
		  $sql = "SELECT count(*) as counts, sum(qty) from dtpenjualan where kode_barang = '$kode' and invoice='$inv'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				 while($row = $result->fetch_assoc()) {

					  $lastqty = $row["qty"];
					  
					  if($row["counts"]>0){
					  	$sql = "SELECT harga_jual from barang where kode_barang = '$kode'";
						  $result = $conn->query($sql);
						  if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	$newqty = $qty+$lastqty;
						        $harga =   mysqli_real_escape_string($conn,$row["harga_jual"]);
						        $total =   mysqli_real_escape_string($conn,($row["harga_jual"]*$newqty));

						        $sql = "update dtpenjualan set qty = '$newqty', total = '$total' where kode_barang = '$kode' and invoice='$inv'";
								if(mysqli_query($conn, $sql)){
								   
								      //echo "<script type='text/javascript'>location.replace('pelanggan.php');</script>";
									//echo "Berhasil";
									$sql = "SELECT sum(total) as total from dtpenjualan where invoice = '$inv'";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									   		echo number_format($row["total"]);
										}
									  } else {
									        echo "0 results";
									  }
									   
								} else{
								    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('penjualan.php');</script>";
								}
						    }
						  } else {
						        echo "0 results";
						  }
						}else{
							$sql = "SELECT harga_jual from barang where kode_barang = '$kode'";
							  $result = $conn->query($sql);
							  if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        $harga2 =   mysqli_real_escape_string($conn,$row["harga_jual"]);
							        $total2 =   mysqli_real_escape_string($conn,($row["harga_jual"]*$qty));

							        $sql = "INSERT INTO `dtpenjualan` (`invoice`, `kode_barang`,`harga`,`qty`, `total`) VALUES ('$inv','$kode','$harga2','$qty','$total2')";
									if(mysqli_query($conn, $sql)){
									   
									      //echo "<script type='text/javascript'>location.replace('pelanggan.php');</script>";
										//echo "Berhasil";
										$sql = "SELECT sum(total) as total from dtpenjualan where invoice = '$inv'";
										  $result = $conn->query($sql);
										  if ($result->num_rows > 0) {
										    // output data of each row
										    while($row = $result->fetch_assoc()) {
										   		echo number_format($row["total"]);
											}
										  } else {
										        echo "Select total gagal";
										  }
										   
									} else{
									    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('penjualan.php');</script>";
									}
							    }
							  } else {
							        echo "select harga gagal";
							  }
						}
				}
				  
			} else {
			    echo "Select Count QTY Gagal";
			}
		}else{
			echo "stockKosong";
		}
	 }
	  
} else {
    echo "Select Count QTY Gagal";
}
?>