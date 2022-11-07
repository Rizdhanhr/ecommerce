<?php include ('_partial/top.php'); ?>
  <script type="text/javascript">

    function del(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert ("Delete Berhasil");
         window.location.replace("promo.php");
        }
      };
      xhttp.open("post", "delpromo.php?q="+strdel, true);
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
            <h1>Form Promo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Promo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Promo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="insertpromo.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="promo">Kode promo</label>
                      <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan kode promo fashion...">
                    </div>
                    <div class="form-group">
                      <label for="promo">promo</label>
                      <input type="text" class="form-control" id="promo" name="promo" placeholder="Masukan promo fashion...">
                    </div>
                    <div class="form-group">
                      <label for="promo">Diskon</label>
                      <input type="number" class="form-control" id="diskon" name="diskon" min=0>
                    </div>
                    <div class="form-group">
                      <label for="promo">Potongan</label>
                      <input type="number" class="form-control" id="potongan" name="potongan" min=0>
                    </div>
                    <div class="form-group">
                      <label for="promo">Min Beli</label>
                      <input type="number" class="form-control" id="min" name="min" min=0>
                    </div>
                    <div class="form-group">
                      <label for="promo">Min Harga</label>
                      <input type="number" class="form-control" id="minharga" name="minharga" min=0>
                    </div>
                    <div class="form-group">
                      <label for="promo">Timer</label>
                      <input type="time" class="form-control" id="time" name="time" >
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List promo</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode promo</th>
                  <th>promo</th>
                  <th>Diskon</th>
                  <th>Potongan</th>
                  <th>Min Beli</th>
                  <th>Min Harga</th>
                  <th>Timer</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          $i = 0;
                          $sql = "SELECT * FROM db_promo";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_promo"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_promo"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["diskon"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["potongan"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["min_beli"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["min_jumlah_harga"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["timer"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    '<button class="btn btn-danger btn-round" value="'.$row["id_promo"].'" onclick="del(this.value)">Delete</button>';
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