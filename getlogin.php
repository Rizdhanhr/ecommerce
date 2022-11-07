<?php
    session_start();
    ob_start();

    include 'admin/db/database.php';
    $username = mysqli_real_escape_string($conn, $_REQUEST['userName']);
    $pass = mysqli_real_escape_string($conn, md5($_REQUEST['password']));

    $sql = "SELECT count(*) as login FROM db_user where email = '$username' and password = '$pass'";
    //echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          //echo $row["login"];
          if ($row["login"] > 0){
                $_SESSION["userss"] = $_REQUEST['userName'];
                echo "<script type='text/javascript'>alert('Ok, Selamat Berbelanja');location.replace('index.php');</script>";
          }else{
            echo "<script type='text/javascript'>alert('Maaf, Username atau Password yang anda masukan salah');location.replace('login.php');</script>";
          }
      }
    } else {
      echo "0 results"+$sql;
    }
?>