<?php
include 'admin/db/database.php';

$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$fullname = mysqli_real_escape_string($conn, $_REQUEST['fullname']);
$password = mysqli_real_escape_string($conn, md5($_REQUEST['password']));
$confpassword = mysqli_real_escape_string($conn, $_REQUEST['confpassword']);
$alamat = mysqli_real_escape_string($conn, $_REQUEST['alamat']);
$telpon = mysqli_real_escape_string($conn, $_REQUEST['telpon']);

//echo $fullname;

if($_REQUEST['confpassword'] == $_REQUEST['password']){

    $sql = "SELECT count(*) as login FROM db_user where email = '$email'";
    //echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          //echo $row["login"];
          if ($row["login"] > 0){
                echo "<script type='text/javascript'>alert('Maaf, email sudah terdaftar');location.replace('register.php');</script>";
          }else{
            $sql = "INSERT INTO db_user (email,	password,	nama,	alamat,	no_hp,status) VALUES ('$email','$password','$fullname','$alamat','$telpon',1)";
            if(mysqli_query($conn, $sql)){

                echo "<script type='text/javascript'>location.replace('index.php');</script>";

            } else{
                echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('register.php');</script>";
            }
          }
      }
    } else {
      echo "0 results"+$sql;
    }


}else{
    echo "<script type='text/javascript'>alert('Maaf, Password dan Konfirmasi Password tidak sama.');location.replace('register.php');</script>";
}





?>