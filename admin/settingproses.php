<?php 
 
include 'db/database.php';
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$start = mysqli_real_escape_string($conn, $_REQUEST['start']);
$end = mysqli_real_escape_string($conn, $_REQUEST['end']);

$sql = "update setting set name = '$name', start = '$start', end = '$end' where id = '".$id."'";
$result = $conn->query($sql);
// echo $sql;
echo "<script type='text/javascript'>alert('Thanks You, update challenge berhasil');location.replace('setting.php');</script>";

// Close connection
mysqli_close($conn);
 

 
?>