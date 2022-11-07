<?php
include 'admin/db/database.php';

    $id = $_GET['id'];
    //echo $id.'dadad';
    $typelayout = 0;


    $conn -> autocommit(FALSE);
            $sql = "SELECT * FROM db_detail_trans where id_det_trans = '".$id."'";
          //  echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    $id_transaksi =  mysqli_real_escape_string($conn, $row["id_transaksi"]);

                    $sql2 = "SELECT * FROM db_transaksi where id_transaksi = '$id_transaksi'";

//echo $sql2;
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                            $subtotal = mysqli_real_escape_string($conn, ($row2["total"] - $row["sub_total"]));
                            $sql = "update db_transaksi set total = $subtotal where id_transaksi = '$id_transaksi'";

                            if(mysqli_query($conn, $sql)){
                                $sql = "delete from db_detail_trans where id_det_trans = '".$id."'";
                                //$sql = "select * from event where id_event = 2";
                               $result = $conn->query($sql);

                               $conn -> commit();


                                echo "<script type='text/javascript'>location.replace('shop-cart.php');</script>";

                            } else{
                                $conn -> rollback();

                                echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data detail_transaksi ke database,cek semua inputan anda sudah benar.');location.replace('shop-cart.php');</script>";
                            }

                        }
                    }
                }
            }


// Close connection
mysqli_close($conn);
?>