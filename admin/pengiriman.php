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
            <h1>Pengiriman Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Pengiriman Barang</li>
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
              <h3 class="card-title">List Pengiriman</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>id_transaksi</th>
                  <th>Alamat</th>
                  <th>No Resi</th>
                  <th>Kurir</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          $i = 0;
                          $sql = "SELECT dp.*,du.nama FROM db_pengiriman dp join db_user du on dp.email = du.email";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["email"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_transaksi"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["alamat"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["no_resi"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["kurir"];
                                echo "  </td>";
                                echo "  <td>";?>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
                                Update Resi
                              </button>

                              <?php  echo "  </td>";
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


    <?php
                          $i = 0;
                          $sql = "SELECT * FROM db_pengiriman";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                              echo    $i=$i+1;
                              ?>
                              <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Resi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form role="form" action="updateresi.php" method="post">
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <label>Nomer Resi</label>
                                            <input type="text" class="form-control" id="kode" name="kode" placeholder="isi nomor resi...">
                                            <input type="hidden" class="form-control" id="id_pengiriman" name="id_pengiriman" value="<?php echo $row['id_pengiriman']?>">
                                          </div>
                                          <div class="form-group">
                                            <label>Nama Kurir</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="isi nama kurir...">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                  </div>

                                </div>
                              </div>
                            </div>
                                <!-- echo    $row["kurir"];
                                echo "  </td>";
                                echo "  <td>";?>
                             -->
                              <?php  echo "  </td>";
                                echo "</tr>";
                            }
                          } else {
                            echo "0 results";
                          }
                      ?>

  </div>

  <!-- /.content-wrapper -->
<?php include('_partial/foot.php'); ?>
