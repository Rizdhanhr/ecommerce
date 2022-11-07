<?php
include 'db/database.php';

$total = mysqli_real_escape_string($conn, $_REQUEST['total']);
$kasir = mysqli_real_escape_string($conn, $_REQUEST['kasir']);
$note = mysqli_real_escape_string($conn, $_REQUEST['note']);
$cus = mysqli_real_escape_string($conn, $_REQUEST['pelanggan']);
$inv = mysqli_real_escape_string($conn, $_REQUEST['inv']);

    $sql = "INSERT INTO `penjualan` (`invoice`, `id_pelanggan`,`kode_user`,`total_bayar`, `create_date`, note) VALUES ('$inv','$cus','$kasir','$total',now(),'$note')";
    echo $sql;
	if(mysqli_query($conn, $sql)){

		   
	} else{
	    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');</script>";
	}
 $sql = "select dt.kode_barang, dt.qty from dtpenjualan dt join penjualan p on dt.invoice = p.invoice where dt.invoice = '$inv'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0) {
		  //  // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	  $kodeBarang = mysqli_real_escape_string($conn, $row["kode_barang"]);
		    	  $penjualanqty = $row["qty"];
		    	  //echo $kodeBarang;
		    	  $sql2 = "SELECT stock from barang where kode_barang = '$kodeBarang'";
		    	  //echo $sql2;
				  $result2 = $conn->query($sql2);
				  if ($result2->num_rows > 0) {
				    // output data of each row
				    while($row2 = $result2->fetch_assoc()) {
				    	$lastqty = $row2["stock"];
				    	$newqty = mysqli_real_escape_string($conn, ($lastqty-$penjualanqty));
				        
				        $sql = "update barang set stock = '$newqty' where kode_barang = '$kodeBarang'";
				        //echo $sql;
						if(mysqli_query($conn, $sql)){
						   
						    echo "<script type='text/javascript'>alert('Penjualan Berhasil')</script>";
							   
						} else{
						    echo "<script type='text/javascript'>alert('Maaf, Update Data tidak berhasil');</script>";
						}
				    }


				  } else {
				        echo "select ";
				  }

		    }
		  } else {
		    echo "0 results";
		  }

				
?>