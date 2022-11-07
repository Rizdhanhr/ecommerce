<?php
include 'admin/db/database.php';

$idtransaksi = mysqli_real_escape_string($conn, $_REQUEST['idtransaksi']);
$kodevoucher = mysqli_real_escape_string($conn, $_REQUEST['getvoucher']);
$poin = mysqli_real_escape_string($conn, $_REQUEST['poin']);


  $sql = "update db_transaksi set status = 1, kode_voucher = '$kodevoucher',tgl_trans = now() where id_transaksi = '$idtransaksi'";
  if(mysqli_query($conn, $sql)){

    $sqlvoucher = "delete from db_voucher_user where claim_voucher = '".$kodevoucher."'";
    // echo $sqlvoucher;
     //$sql = "select * from event where id_event = 2";
    $result = $conn->query($sqlvoucher);
    echo "<script type='text/javascript'>alert('Thanks You, transaksi selesai, silahkan anda mengupload bukti bayar di menu upload');location.replace('invoice.php?idtransaksi=".$_REQUEST['idtransaksi']."');</script>";

  } else{
      echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');location.replace('index.php');</script>";
  }





?>