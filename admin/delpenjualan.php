<?php
include 'db/database.php';

    $kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
	$inv = mysqli_real_escape_string($conn, $_REQUEST['inv']);

    $typelayout = 0;

    $sql = "delete from dtpenjualan where kode_barang = '$kode' and invoice='$inv'";
     //$sql = "select * from event where id_event = 2";
    $result = $conn->query($sql);
    
// Close connection
mysqli_close($conn);
?>