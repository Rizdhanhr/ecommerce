<?php 
// koneksi database
include 'db/database.php';
 
$id = mysqli_real_escape_string($conn, $_REQUEST['kode']);
$kategori = mysqli_real_escape_string($conn, $_REQUEST['kategori']);
$gambar = mysqli_real_escape_string($conn, $_FILES['gambar']['name']);
// Ambil Data yang Dikirim dari Form

if($gambar != ""){
  $ekstensi_diperbolehkan = array('jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
    move_uploaded_file($file_tmp, 'images/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
        
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
     $sql  = "UPDATE db_kategori SET id_kategori = '$id', nama_kategori = '$kategori', gambar = '$nama_gambar_baru' WHERE id_kategori = '$id'";
      $result = mysqli_query($conn, $sql);
      // periska query apakah ada error
      if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($conn).
               " - ".mysqli_error($conn));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='kategori.php';</script>";
      }
} else {     
 //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='editkategori.php?id=$id';</script>";
}
} else {
  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
  $sql  = "UPDATE db_kategori SET id_kategori = '$id', nama_kategori = '$kategori' WHERE id_kategori = '$id'";
  $result = mysqli_query($conn, $sql);
  // periska query apakah ada error
  if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                         " - ".mysqli_error($conn));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil diubah.');window.location='kategori.php';</script>";
  }
}

// $nama_file = $_FILES['gambar']['name'];
// $ukuran_file = $_FILES['gambar']['size'];
// $tipe_file = $_FILES['gambar']['type'];
// $tmp_file = $_FILES['gambar']['tmp_name'];
// $change_name = $kategori.'.jpeg';
// $sql = "UPDATE db_kategori SET id_kategori='$id',nama_kategori='$kategori',gambar='$change_name' WHERE id_kategori = '$id'";
// $path = "images/".$change_name;
// if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
//   // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
//   if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
//     // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
//     // Proses upload
    
// 	if(mysqli_query($conn, $sql)){
// 	    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
// 	      echo "<script type='text/javascript'>location.replace('kategori.php');</script>";
// 	    }else{
// 	      // Jika gambar gagal diupload, Lakukan :
// 	      echo "<script type='text/javascript'>alert('Maaf, Gambar gagal untuk diupdate.');location.replace('kategori.php');</script>";
// 	    }


// 	} else{
//     // echo $sql;
// 	    echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba mengupdate data ke database.');location.replace('editkategori.php?id=$id');</script>";
// 	}

//   }else{
//     // Jika ukuran file lebih dari 1MB, lakukan :
//     echo "<script type='text/javascript'>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB');location.replace('editkategori.php?id=$id');</script>";

//   }
// }else{
//   // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
//   echo "<script type='text/javascript'>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');location.replace('editkategori.php?id=$id');</script>";
// }
 
?>