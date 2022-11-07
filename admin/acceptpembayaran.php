<?php
include 'db/database.php';

    $id = $_GET['q'];

    $typelayout = 0;

    $sql = "update db_pembayaran set status_bayar = 2 where id_pembayaran = '".$id."'";
    $result = $conn->query($sql);
    $permitted_charss = '0123456789abcdefghijklmnopqrstuvwxyz';
    // Output: 54esmdr0qf
    $id_trans =  mysqli_real_escape_string($conn, substr(str_shuffle($permitted_charss), 0, 5));


    $alamat = '';
    $email = '';
    $id_transaksi = '';
    $sql = "SELECT * FROM db_pembayaran
        where id_pembayaran ='$id'";
        // echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $id_transaksi = mysqli_real_escape_string($conn, $row['id_transaksi']);
            $sql = "SELECT * FROM db_user
                where email ='".$row['email']."'";
                // echo $sql;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $alamat = mysqli_real_escape_string($conn, $row['alamat']);
                    $email = mysqli_real_escape_string($conn, $row['email']);

                }
            }else{
                echo "0 results";
            }
        }
    }else{
        echo "0 results";
    }


    $sql = "INSERT INTO db_pengiriman (id_pengiriman, email, id_transaksi, alamat) VALUES ('$id_trans','$email','$id_transaksi','$alamat')";
  	if(mysqli_query($conn, $sql)){
  	          
                $sqltransaksi = "SELECT count(id_transaksi) as jumlah FROM db_transaksi where email = '$email'";
                $resulttransaksi = $conn->query($sqltransaksi);
                if ($resulttransaksi->num_rows > 0) {
                    // output data of each row
                    while($rowtransaksi = $resulttransaksi->fetch_assoc()) { 
                        $poin_tambah = $rowtransaksi['jumlah'];
            
                        
                        if($poin_tambah >= 0 && $poin_tambah <= 10 ){
                            $tipe = mysqli_real_escape_string($conn, 'epic');
                            $sql = "update db_user set tipe_member = '$tipe' where email ='$email'";
            
                            if(mysqli_query($conn, $sql)){
                                $conn -> commit();
                            } else{
                                $conn -> rollback();
                
                                echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
                            }
                        }else if($poin_tambah >= 11 && $poin_tambah <= 30 ){
                            $tipe = mysqli_real_escape_string($conn, 'legend');
                            $sql = "update db_user set tipe_member = '$tipe' where email ='$email'";
            
                            if(mysqli_query($conn, $sql)){
                                $conn -> commit();
                            } else{
                                $conn -> rollback();
                
                                echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
                            }
                        }else if($poin_tambah >= 31 ){
                            $tipe = mysqli_real_escape_string($conn, 'mythic');
                            $sql = "update db_user set tipe_member = '$tipe' where email ='$email'";
            
                            if(mysqli_query($conn, $sql)){
                                $conn -> commit();
                          
                            } else{
                                $conn -> rollback();
                
                                echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
                            }
                        }
                        
                        
                        // echo "<script type='text/javascript'>alert('Peninputan pengiriman berhasil');location.replace('transaksi.php');</script>";
        
                    }
                }else{
                    $conn -> rollback();
                    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
                            
                }
    } else{

        // echo $sql;
  	    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');location.replace('transaksi.php');</script>";
  	}

      $sqluser = "SELECT id_barang FROM db_pembayaran p
      join db_detail_trans dbt on p.id_transaksi = dbt.id_transaksi
      where p.id_pembayaran = '$id'";
      echo $sqluser;
              $resultuser = $conn->query($sqluser);
              if ($resultuser->num_rows > 0) {
                  // output data of each row
                  while($rowuser = $resultuser->fetch_assoc()) { 
                     
                     $idbarang = mysqli_real_escape_string($conn, $rowuser['id_barang']);

                     $sqlbarang = "SELECT * FROM db_barang where id_barang = '$idbarang'";
                     echo $sqlbarang;
                                $resultbarang = $conn->query($sqlbarang);
                                if ($resultbarang->num_rows > 0) {
                                    // output data of each row
                                    while($rowbarang = $resultbarang->fetch_assoc()) { 
                                        
                                        $stock = mysqli_real_escape_string($conn, ($rowbarang['stok_barang'] - 1));
                                        
                                        $sql = "update db_barang set stok_barang = '$stock'";
                                        echo $sql;
                                        if(mysqli_query($conn, $sql)){
                                            $conn -> commit();

                                            } else{
                                            $conn -> rollback();
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
    

// Close connection
mysqli_close($conn);
?>