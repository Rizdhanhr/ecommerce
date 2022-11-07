<?php
    session_start();
    ob_start();

    include 'db/database.php';
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $pass = mysqli_real_escape_string($conn, ($_REQUEST['pass']));

    $sql = "SELECT count(*) as login FROM db_admin where email = '$username' and password = '$pass'";
   // echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          //echo $row["login"];
          if ($row["login"] > 0){
                $_SESSION["userss"] = $_REQUEST['username'];
                echo "<script type='text/javascript'>alert('Ok, Selamat Bekerja');location.replace('dashboard.php');</script>";
          }else{
            echo "<script type='text/javascript'>alert('Maaf, Username atau Password yang anda masukan salah');location.replace('index.php');</script>";
          }
      }
    } else {
      echo "0 results"+$sql;
    }
?>