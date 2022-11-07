<?php
include 'db/database.php';

$merk = mysqli_real_escape_string($conn, $_REQUEST['merk']);
 
// Attempt insert query execution
$sql = "INSERT INTO merk (nama_merk) VALUES ('$merk')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
	
	echo "<script type='text/javascript'>location.replace('merkbarang.php');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

 
// Close connection
mysqli_close($conn);
?>