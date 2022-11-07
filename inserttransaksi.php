<?php
include 'admin/db/database.php';

$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
$id_barang = mysqli_real_escape_string($conn, $_REQUEST['id_barang']);

//echo $id_barang;
    $conn -> autocommit(FALSE);

    $sql = "SELECT * FROM db_transaksi where email = '$email' and status = 0";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        $sql2 = "SELECT * FROM db_barang where id_barang = '$id_barang'";
        //echo $sql;
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {

                $permitted_charss = '0123456789abcdefghijklmnopqrstuvwxyz';
                // Output: 54esmdr0qf
                $id_trans =  mysqli_real_escape_string($conn, substr(str_shuffle($permitted_charss), 0, 5));

                $id_transaksi =  mysqli_real_escape_string($conn, $row["id_transaksi"]);
                $nama_barang =  mysqli_real_escape_string($conn, $row2["nama_barang"]);

                if(!empty($row2['flash'])){
                    if($row2['flash'] >= date("Y-m-d H:i:s")){
                        $harga_barang =  mysqli_real_escape_string($conn, ($row2["harga_barang"]-($row2['harga_barang']*$row2['diskon']/100)));
                        $subtotal = mysqli_real_escape_string($conn, ($qty*($row2["harga_barang"]-($row2['harga_barang']*$row2['diskon']/100))));
                    }else{
                        $harga_barang =  mysqli_real_escape_string($conn, $row2["harga_barang"]);
                        $subtotal = mysqli_real_escape_string($conn, ($qty*$row2["harga_barang"]));
                    }
                }else{
                    $harga_barang =  mysqli_real_escape_string($conn, $row2["harga_barang"]);
                    $subtotal = mysqli_real_escape_string($conn, ($qty*$row2["harga_barang"]));
                }
               
                
               

                $sql = "INSERT INTO db_detail_trans (id_det_trans,	id_transaksi,	id_barang,	nama_barang,	jumlah , diskon, harga, sub_total) VALUES ('$id_trans','$id_transaksi','$id_barang','$nama_barang','$qty',0,'$harga_barang','$subtotal')";

                if(mysqli_query($conn, $sql)){

                    $total = mysqli_real_escape_string($conn, ($row["total"] + $subtotal));
                    $sql = "update db_transaksi set total = $total where id_transaksi = '$id_transaksi'";

                    if(mysqli_query($conn, $sql)){
                        $conn -> commit();


                        echo "<script type='text/javascript'>location.replace('shop.php');</script>";

                    } else{
                        $conn -> rollback();

                        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('shop.php');</script>";
                    }

                } else{
                    $conn -> rollback();

                     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('shop.php');</script>";
                }

            }
        }

      }
    } else {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $id_tran =  mysqli_real_escape_string($conn, substr(str_shuffle($permitted_chars), 0, 5));
      //echo "0 results"+$sql;
        $sql = "INSERT INTO db_transaksi (id_transaksi,	email,	tgl_trans,	total,	kode_voucher , status) VALUES ('$id_tran','$email',now(),0,null,0)";
        echo $sql;
        if(mysqli_query($conn, $sql)){

            $sql = "SELECT * FROM db_barang where id_barang = '$id_barang'";
            echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    $permitted_charss = '0123456789abcdefghijklmnopqrstuvwxyz';
                    // Output: 54esmdr0qf
                    $id_trans =  mysqli_real_escape_string($conn, substr(str_shuffle($permitted_charss), 0, 5));
                    $nama_barang =  mysqli_real_escape_string($conn, $row["nama_barang"]);
                    $harga_barang =  mysqli_real_escape_string($conn, $row["harga_barang"]);
                    $subtotal = mysqli_real_escape_string($conn, ($qty*$row["harga_barang"]));

                    $sql = "INSERT INTO db_detail_trans (id_det_trans,	id_transaksi,	id_barang,	nama_barang,	jumlah , diskon, harga, sub_total) VALUES ('$id_trans','$id_tran','$id_barang','$nama_barang','$qty',0,'$harga_barang','$subtotal')";

                    echo $sql;
                    if(mysqli_query($conn, $sql)){

                        $sql = "update db_transaksi set total = $subtotal where id_transaksi = '$id_tran'";

                        if(mysqli_query($conn, $sql)){
                            $conn -> commit();


                            echo "<script type='text/javascript'>location.replace('shop.php');</script>";

                        } else{
                            $conn -> rollback();

                            echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('shop.php');</script>";
                        }

                    } else{
                        $conn -> rollback();

                         echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('shop.php');</script>";
                    }

                }
            }

        } else{
            $conn -> rollback();
             echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('shop.php');</script>";
        }
    }



?>