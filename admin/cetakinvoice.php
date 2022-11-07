<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body style="padding: 0 20;">
<div>
    <?php 
        include 'db/database.php';
        $i = 0;
        
        $sql = "SELECT * FROM db_pembayaran where id_transaksi = '".$_GET['id']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($data = $result->fetch_assoc()) {
            
        // $select = "SELECT * FROM db_pembayaran";
        // if($id)
          

        
      ?>
       <section class="content">
        <div class="row">
            <div>
                <div class="span12">
                    <table class="table">
                        <tbody>
                            <tr>
                            <td><h1><strong><img src="../img/logo1.png" width="100" height="50"></strong></h1></td>
                            <td colspan="2"></td>
                            </tr>
                            <tr>
                            <td><h2><strong>INVOICE</strong>&nbsp;</h2></td>
                            </tr>
                            <tr>
                            <td><h2><strong>Kode Transaksi</strong>:&nbsp;<?php echo $data['id_transaksi']; ?> </h2></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>FIB COLLECTION</strong><br>
                Perumahan Pondok Kelapa<br>
                Jl. Kelapa Kopyor 12<br>
                Jakarta Timur<br>
                Phone: (0823) 38938580<br>
                Email: fib_collection@gmail.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Pelanggan
              <address>
                <strong><?php echo $data['email']; ?></strong><br>
                Bukti Transfer :<br>
                <?php echo "<img src='../images/".$data['gambar']."' width='250px' height='250px'/>"; ?>
              </address>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Kode Pembayaran</th>
                  <th>Tgl Transaksi</th>
                  <th>Kode Transaksi</th>
                  <th>Member</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $data['id_pembayaran']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data['tgl_bayar'])); ?></td>
                        <td><?php echo $data['id_transaksi']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Total Biaya</b></td>
                        <td><b><?php echo "Rp ".$data['nominal_pembayaran']; ?></b></td>
                    </tr>
                    
                </tbody>
            </table>
          </div>
      </section>
      <?php
    }
           } else {
          echo "0 results";
        }
        ?>
    </div>
  </body>
   <script>
      window.print()
  </script>