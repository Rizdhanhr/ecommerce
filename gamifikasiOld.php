<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {

     // generate angka acak 1-9
     var angka = Math.floor((Math.random() * 3) + 1);

     // tambah awalan agar sesuai dengan id box, misal: box3
     var box_ajaib = "box"+angka;

     // siapkan variabel counter
     var jumlah_klik = 0;
     var ketemu = "belum";

    //  $("div").click(function() {

    //    // hitung jumlah klik
    //    jumlah_klik++;
    //    $("#hitung").html("Jumlah Klik = "+jumlah_klik);

    //    // ubah warna background box
    //    if ($(this).attr("name")==box_ajaib) {
    //      $(this).css("background-color","green");
    //      ketemu = "sudah";
    //    }
    //    else {
    //      $(this).css("background-color","red");
    //    }

    //    // cek hasil game
    //    if ((ketemu=="sudah") && (jumlah_klik <= 3)) {
    //      $("#hasil").html("You Win!");
    //    }
    //    if ((ketemu=="belum") && (jumlah_klik >= 3)) {
    //      $("#hasil").html("Game Over... coba lagi gan!");
    //    }

    //  });

   });
   </script>
   <style>


    @import url('http://getbootstrap.com/dist/css/bootstrap.css');
    html, body, .container-table {
        height: 100%;
    }
    .container-table {
        display: table;
    }
    .vertical-center-row {
        display: table-cell;
        vertical-align: middle;
    }

    .box1,.box2,.box3 {
       width: 70px;
       height: 70px;
       padding: 0 10px;
       float: left;
       margin: 5px;
       cursor: pointer;
     }
    </style>
</head>
<body  style="background-image: url('img/box/bg-box.jpeg');">
    <div class="row">
        <div class="text-center mt-6 name"> <img src="img/box/tulisan.png"  width= "50%" height= "50%"></img></div>
         </div>
        <div class=" mb-4">
            <div class="d-flex align-items-center justify-content-center" style="height: 40px">
                <div class="p-5 bd-highlight col-example"><a href="insertgamifikasi.php"><img src="img/box/boxtutup.png"  width= "150px" height= "150px"></img></a></div>
                <div class="p-5 bd-highlight col-example"><a href="insertgamifikasi.php"><img src="img/box/boxtutup.png"  width= "150px" height= "150px" ></img></a></div>
                <div class="p-5 bd-highlight col-example"><a href="insertgamifikasi.php"><img src="img/box/boxtutup.png"  width= "150px" height= "150px" ></img></a></div>
                <div class="p-5 bd-highlight col-example"><a href="insertgamifikasi.php"><img src="img/box/boxtutup.png"  width= "150px" height= "150px" ></img></a></div>
            </div>

        </div>
     <div>

</html>
