<?php include ('_partial/top.php'); ?>
  <script type="text/javascript">

    function del(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert ("Delete Berhasil");
         window.location.replace("supplier.php");
        }
      };
      xhttp.open("post", "delsupplier.php?q="+strdel, true);
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
            <h1>Transaksi Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Transaksi Member</li>
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
            <div class="card-header">
              <h3 class="card-title">List Detail Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Transaksi</th>
                  <th>Barang</th>
                  <th>Qty</th>
                  <th>Potongan Poin</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          $i = 0;
                          $sql = "SELECT * FROM db_detail_trans where id_transaksi = '".$_GET['id']."'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_transaksi"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_barang"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["jumlah"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["diskon"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["harga"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["sub_total"];
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