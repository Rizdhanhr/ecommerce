<?php
session_start();
    ob_start();
include 'admin/db/database.php';

$id_transaksi = mysqli_real_escape_string($conn, $_REQUEST['id_transaksi']);
$email = mysqli_real_escape_string($conn, $_SESSION["userss"]);
$permitted_charss = '0123456789abcdefghijklmnopqrstuvwxyz';
                // Output: 54esmdr0qf
$id_trans =  mysqli_real_escape_string($conn, substr(str_shuffle($permitted_charss), 0, 5));

$nominal = '';

 $sql = "SELECT * FROM db_transaksi 
        where id_transaksi ='$id_transaksi' and status = 1";
$result = $conn->query($sql);
$total=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

         $nominal = $row['total'] ;
    }
}else{
    echo "0 results";
}

echo $sql;
$nominal = mysqli_real_escape_string($conn, $nominal);

// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$change_name = $id_transaksi.'.jpeg';
// Set path folder tempat menyimpan gambarnya
$path = "images/".$change_name;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    $sql = "INSERT INTO db_pembayaran (id_pembayaran,nominal_pembayaran,jenis_pembayaran,nama_bank,email,status_bayar,tgl_bayar,id_transaksi,tgl_transfer,gambar) VALUES ('$id_trans','$nominal','Transfer','BCA','$email','1',now(),'$id_transaksi',now(),'$change_name')";
  	if(mysqli_query($conn, $sql)){
  	    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak


          $sql = "update db_transaksi set status = 2 where id_transaksi = '$id_transaksi'";
            if(mysqli_query($conn, $sql)){

              echo "<script type='text/javascript'>alert('Thanks You, file upload anda berhasil di upload');location.replace('transaksi.php');</script>";

            } else{
              // echo "<script type='text/javascript'>alert('".$sql."');location.replace('transaksi.php');</script>"; 
              echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database,cek semua inputan anda sudah benar.');</script>";
            }

  	    }else{
  	      // Jika gambar gagal diupload, Lakukan :
  	      echo "<script type='text/javascript'>alert('Maaf, Gambar gagal untuk diupload.');</script>";
  	    }


  	} else{
      // echo $sql; 
  	     echo "<script type='text/javascript'>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');</script>";
  	}

    }else{
      // Jika ukuran file lebih dari 1MB, lakukan :
      echo "<script type='text/javascript'>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB');</script>";

    }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "<script type='text/javascript'>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.');</script>";
}


?>