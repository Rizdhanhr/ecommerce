<?php
include 'db/database.php';

$kasir = mysqli_real_escape_string($conn, $_REQUEST['kasir']);
$inv = mysqli_real_escape_string($conn, $_REQUEST['inv']);

    $sql = "INSERT INTO `pembelian` (`invoicepo`, `created_at`,`kode_user`) VALUES ('$inv',now(),'$kasir')";
    echo $sql;
	if(mysqli_query($conn, $sql)){

		   
	} else{
	    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');</script>";
	}
 $sql = "select dt.kode_barang, dt.stock from dtpembelian dt join pembelian p on dt.invoicepo = p.invoicepo where dt.invoicepo = '$inv'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0) {
		  //  // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	  $kodeBarang = mysqli_real_escape_string($conn, $row["kode_barang"]);
		    	  $pembelianstock = $row["stock"];
		    	  //echo $kodeBarang;
		    	  $sql2 = "SELECT stock from barang where kode_barang = '$kodeBarang'";
		    	  //echo $sql2;
				  $result2 = $conn->query($sql2);
				  if ($result2->num_rows > 0) {
				    // output data of each row
				    while($row2 = $result2->fetch_assoc()) {
				    	$lastqty = $row2["stock"];
				    	$newqty = mysqli_real_escape_string($conn, ($lastqty+$pembelianstock));
				        
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