<?php
session_start();
ob_start();
include 'admin/db/database.php';

$nilairating = mysqli_real_escape_string($conn, $_REQUEST['nilairating']);
$komen = mysqli_real_escape_string($conn, $_REQUEST['komen']);
$id_barang = mysqli_real_escape_string($conn, $_REQUEST['id_barang']);
$id_transaksi = mysqli_real_escape_string($conn, $_REQUEST['id_transaksi']);
$email = mysqli_real_escape_string($conn, $_SESSION["userss"]);
//echo $fullname;


    $sql = "INSERT INTO db_komen (email,	id_barang,id_transaksi,	komen,	created_at) VALUES ('$email','$id_barang','$id_transaksi','$komen',now())";
    // echo $sql;
    if(mysqli_query($conn, $sql)){

        $sql = "INSERT INTO db_rating (email,	id_barang,id_transaksi,	rating,	created_at) VALUES ('$email','$id_barang','$id_transaksi','$nilairating',now())";
        if(mysqli_query($conn, $sql)){

            $sqltransaksi = "SELECT * FROM db_transaksi where id_transaksi = '$id_transaksi'";
            $resulttransaksi = $conn->query($sqltransaksi);
            if ($resulttransaksi->num_rows > 0) {
                // output data of each row
                while($rowtransaksi = $resulttransaksi->fetch_assoc()) { 
                    $poin_tambah = $rowtransaksi['total']/1000;

                    $sqluser = "SELECT * FROM db_user where email = '$email'";
                    $resultuser = $conn->query($sqluser);
                    if ($resultuser->num_rows > 0) {
                        // output data of each row
                        while($rowuser = $resultuser->fetch_assoc()) { 
                            $poin_tambah = ($poin_tambah+$rowuser['poin']);

                            if($poin_tambah >= 0 && $poin_tambah <= 250 ){
                                $tipe = mysqli_real_escape_string($conn, 'epic');
                            }else if($poin_tambah >= 251 && $poin_tambah <= 700 ){
                                $tipe = mysqli_real_escape_string($conn, 'legend');
                            }else if($poin_tambah >= 701 ){
                                $tipe = mysqli_real_escape_string($conn, 'mythic');
                            }
                            
                            $sql = "update db_user set poin = ".$poin_tambah." where email ='$email'";

                            if(mysqli_query($conn, $sql)){
                                $conn -> commit();
    
    
                                echo "<script type='text/javascript'>location.replace('detailtransaksi.php?id_transaksi=". $_REQUEST['id_transaksi']."');</script>";
                            } else{
                                $conn -> rollback();
    
                                echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
                            }
    


                        }
                    }else{
                        $conn -> rollback();

					        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
					    
                    }
                }
            }else{
                $conn -> rollback();

					        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
					    
            }

            

            
          
        } else{
            $conn -> rollback();
            echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data rating ke database,cek semua inputan anda sudah benar.');location.replace('pembayaran.php');</script>";
        }

    } else{
        $conn -> rollback();
        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data komen ke database,cek semua inputan anda sudah benar.');location.replace('pembayaran.php');</script>";
    }










?>