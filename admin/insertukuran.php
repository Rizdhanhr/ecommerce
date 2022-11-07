<?php
include 'db/database.php';

$kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$ukuran = mysqli_real_escape_string($conn, $_REQUEST['ukuran']);

// Attempt insert query execution
$sql = "INSERT INTO db_ukuran (id_ukuran,nama_ukuran) VALUES ('$kode','$ukuran')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";

	echo "<script type='text/javascript'>location.replace('ukuran.php');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


// Close connection
mysqli_close($conn);
?>