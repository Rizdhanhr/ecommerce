<?php include ('_partial/top.php'); ?>
  <script type="text/javascript">

    function accept(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
         alert ("Transaksi Diterima");
        
        //  window.location.replace("transaksi.php");
        }
      };
      xhttp.open("post", "acceptpembayaran.php?q="+strdel, true);
      xhttp.send();
    };

    function reject(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert ("Transaksi Ditolak");
        //  window.location.replace("transaksi.php");
        }
      };
      xhttp.open("post", "rejectpembayaran.php?q="+strdel, true);
      xhttp.send();
    };

    function search(){
      //alert(strdel);
      var start = document.getElementById("start").value;  
      var end =document.getElementById("end").value;  
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("isi").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("post", "getpenjualanacc.php?start="+start+"&end="+end, true);
      xhttp.send();
    };
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi Member Sukses</h1>
          </div>
          <div class="col-sm-6">
            
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Transaksi Member  Sukses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-body">
                <form role="form" action="insertsupplier.php" method="post">
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                      <a class="btn btn-primary" target="_blank" href="exportsukses.php">EXPORT KE EXCEL</a>
  </div>
                      <div class="form-group">
                        <label>Start</label>
                        <input type="date" class="form-control" id="start" name="start" placeholder="isi phone supplier ...">
                      </div>
                      <div class="form-group">
                      <label>From</label>
                        <input type="date" class="form-control" id="end" name="end" placeholder="isi email supplier ...">
  </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                     
                    </div>
                  </div>
                  <div class="row">
                  <button type="button" class="btn btn-primary" onclick="search()">Search</button>
                </div>
                </form>
              </div>
            <div class="card-header">
              
              <!-- <a class="btn btn-primary" target="_blank" href="exportpenjualan.php">EXPORT KE EXCEL</a> -->
            </div>
            <!-- /.card-header -->
           
            <div class="card-body" id="isi">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pembayaran</th>
                  <th>Kode Transaksi</th>
                  <th>Member</th>
                  <th>Tgl Transaksi</th>
                  <th>Total</th>
                 <th>Bukti Bayar</th>
                 <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          $i = 0;
                          $sql = "SELECT * FROM db_pembayaran where status_bayar > 1";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_pembayaran"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_transaksi"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["email"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["tgl_bayar"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    number_format($row["nominal_pembayaran"],0);
                                echo "  </td>";

                                echo "  <td>";
                                echo "<img src='../images/".$row['gambar']."' width='100px' height='100px'/>";
                                echo "  </td>";
                                
                                if($row["status_bayar"] > 1){
                                  echo "  <td>";
                                  echo "Transaksi di setujui";
                                  echo "  </td>";
                                  
                                  
                                  
                                }else if($row["status_bayar"] < 1){
                                  echo "  <td>";
                                    echo "Transaksi di reject";
                                    echo " </td>";
                                }else{
                                  echo "  <td>";
                                  echo    '<a class="btn btn-warning btn-round" target="_blank" href="detailtransaksi.php?id='.$row["id_transaksi"].'")">Detail</a>';?>

                                  <button class="btn btn-success btn-round" onclick="accept('<?php echo $row["id_pembayaran"] ?>')">Accept</button>
                                  <button class="btn btn-danger btn-round" onclick="reject('<?php echo $row["id_pembayaran"] ?>')">Reject</button>

                            <?php
                                }
                                echo "  </td>";
                                echo "</tr>";
                            }
                          } else {
                            echo "0 results";
                          }
                      ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  </div>
  <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Insert Data </h4>
                    </div>
                    <div class="modal-body" id="isi" name="isi">

                    </div>
                   </div>
                </div>
              </div>
            </div>
  <!-- /.content-wrapper -->
<?php include('_partial/foot.php'); ?>