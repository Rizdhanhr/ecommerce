<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FIB Colection | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>-->

            <?php
                include 'db/database.php';
                $invoice = mysqli_real_escape_string($conn, $_REQUEST['invoice']);
                 $i = 0;
                $sql = "SELECT * FROM penjualan WHERE invoice = '$invoice'";
                $result = $conn->query($sql);
                $totalBayar = 0;
                $invoice = 0;
                $date = '';
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      $totalBayar = number_format($row["total_bayar"]);
                      $invoice = $row["invoice"];
                      $date = $row["create_date"];
                      $pelanggan = mysqli_real_escape_string($conn, $row["id_pelanggan"]);
                      echo '<div class="invoice p-3 mb-3">';
                      echo '    <div class="row">';
                      echo '      <div class="col-12">';
                      echo '        <h4>';
                      echo '          <i ><img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                       style="opacity: .8" width="50" height="50"></i> FIB Colection
                                <small class="float-right">Date: '.$row["create_date"].'</small>';
                      echo '        </h4>';
                      echo '      </div>';
                      echo '    </div>';
                      echo '    <div class="row invoice-info">';
                      echo '      <div class="col-sm-4 invoice-col">';
                      echo '        From';
                      echo '        <address>';
                      echo '          <strong>FIB Colection, Inc.</strong><br>';
                      echo '          Central Distributor Performance Parts,<br> Racing Parts & Modification.<br>';
                     echo '           Green Lake City Ruko CBD Blok L No: 7<br>';
                      echo '          Cipondoh-Tangerang 11750<br>';
                      echo '          Phone: 081 3820 77777<br>';
                      echo '          Website: www.speedzperformance.id';
                      echo '        </address>';
                      echo '      </div>';

                      echo '     <div class="col-sm-4 invoice-col">';
                      echo '        To';
                      echo '        <address>';

                      if($row["id_pelanggan"] > 0){
                           $sql = "SELECT * from pelanggan where kode_pelanggan = '$pelanggan'";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo '          <strong>'.$row["nama_pelanggan"].'</strong><br>';
                                        echo            $row["alamat"].'<br>';
                                        echo '          San Francisco, CA 94107<br>';
                                        echo '          Phone: '.$row["telepon"];

                                     }
                                  } else {
                                        echo "0 results";
                                  }

                      }else{

                          echo '          <strong>UMUM</strong><br>';
                          echo '          Phone: -<br>';
                          echo '          Email: -';
                      }
                      echo '        </address>';
                      echo '      </div>';
                      echo '      <div class="col-sm-4 invoice-col">';
                      echo '        <b>Invoice - "'.$invoice.'"</b><br>';
                      echo '        <br>';
                      echo '        <b>Payment Due:</b> '.$date.'<br>';
                      echo '      </div>';
                      echo '    </div>';
                      echo '    <div class="row">';
                      echo '      <div class="col-12 table-responsive">';
                      echo '        <table class="table table-striped">';
                      echo '          <thead>';
                      echo '          <tr>';
                      echo '            <th>No</th>';
                      echo '            <th>Kode Barang</th>';
                      echo '            <th>Nama Barang</th>';
                      echo '            <th>Harga</th>';
                      echo '            <th>QTY</th>';
                      echo '            <th>Total</th>';
                      echo '          </tr>';
                      echo '          </thead>';
                      echo '          <tbody>';
                                 $sql = "SELECT p.invoice,b.kode_barang,b.nama_barang,p.harga,p.qty,p.total FROM barang b JOIN dtpenjualan p ON b.kode_barang = p.kode_barang where p.invoice = '$invoice'";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '  <td>';
                                        echo    $i=$i+1;
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo    $row["kode_barang"];
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo    $row["nama_barang"];
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo   number_format( $row["harga"]);
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo    $row["qty"];
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo    number_format($row["total"]);
                                        echo '  </td>';
                                        echo '</tr>';
                                     }
                                  } else {
                                        echo "0 results";
                                  }
                      echo '          </tbody>';
                      echo '        </table>';
                      echo '      </div>';
                      echo '    </div>';
                      echo '    <div class="row">';
                      echo '      <div class="col-6">';
                      echo '        <p class="lead">Payment Methods:</p>';
                      echo '        <img src="dist/img/credit/visa.png" alt="Visa">';
                     echo '         <img src="dist/img/credit/mastercard.png" alt="Mastercard">';

                      echo '        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">';
                      echo '          Terima Kasih, telah berbelanja di tempat kami.</br>';
                      echo '          Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan kecuali ada perjanjian';
                      echo '        </p>';
                      echo '      </div>';
                      echo '      <div class="col-6">';

                      echo '        <div class="table-responsive">';
                      echo '          <table class="table">';
                      echo '            <tr>';
                      echo '              <th>Total:</th>';
                      echo '              <td>'.$totalBayar.'</td>';
                      echo '            </tr>';
                      echo '          </table>';
                      echo '        </div>';
                      echo '      </div>';
                      echo '    </div>';

                      echo '    <div class="row no-print">';
                      echo '      <div class="col-12">';
                      echo '        <a href="invoice-print.php" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>';
                      echo '        </div>';
                      echo '    </div>';
                      echo '  </div>';
                  }
                } else {
                  echo "0 results";
              }
            ?>


          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
  window.addEventListener("load", window.print());
</script>
</body>
</html>
