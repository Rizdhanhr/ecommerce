<?php
include 'db/database.php';

$kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$kategori = mysqli_real_escape_string($conn, $_REQUEST['kategori']);


    $sql = "INSERT INTO db_kategori (id_kategori,nama_kategori,gambar) VALUES ('$kode','$kategori','$change_name')";
    if(mysqli_query($conn, $sql)){
        if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
          echo "<script type='text/javascript'>location.replace('kategori.php');</script>";
        }else{
          // Jika gambar gagal diupload, Lakukan :
          echo "<script type='text/javascript'>alert('Maaf, Gambar gagal untuk diupload.');location.replace('kategori.php');</script>";
        }


    } else{
        echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');location.replace('kategori.php');</script>";
    }

?>