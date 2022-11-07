<?php include ('_partial/top.php'); ?>
  <script type="text/javascript">

    function del(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert ("Delete Berhasil");
         window.location.replace("kategori.php");
        }
      };
      xhttp.open("post", "delkategori.php?q="+strdel, true);
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
            <h1>Form Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title">Kategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="insertkategori.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kategori">Kode Kategori</label>
                      <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan kode kategori fashion...">
                    </div>
                    <div class="form-group">
                      <label for="kategori">Kategori</label>
                      <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan kategori fashion...">
                    </div>
                    <div class="form-group">
                      <label for="gambar">Upload Gambar</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="gambar" name="gambar">
                          <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                      <label for="gambar" style="color: red">*Size < 1MB, format (jpeg & png)</label>
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
              <h3 class="card-title">List Kategori</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Kategori</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          $i = 0;
                          $sql = "SELECT * FROM db_kategori";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_kategori"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_kategori"];
                                echo "  </td>";
                                echo " <td><img src='images/".$row['gambar']."' width='100px' height='100px'/></td>";
                                echo "  <td>";
                                echo '<a class="btn btn-primary btn-round" href="editkategori.php?id='.$row["id_kategori"].'")">Edit</a>';
                                echo "&nbsp;";
                                echo    '<button class="btn btn-danger btn-round" value="'.$row["id_kategori"].'" onclick="del(this.value)">Delete</button>';
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