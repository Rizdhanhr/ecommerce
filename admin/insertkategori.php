<?php
include 'db/database.php';

$kode = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$kategori = mysqli_real_escape_string($conn, $_REQUEST['kategori']);


// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$change_name = $kategori.'.jpeg';
// Set path folder tempat menyimpan gambarnya
$path = "images/".$change_name;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
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

  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo "<script type='text/javascript'>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB');location.replace('kategori.php');</script>";

  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "<script type='text/javascript'>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');location.replace('kategori.php');</script>";
}


?>