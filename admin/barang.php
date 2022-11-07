<?php include ('_partial/top.php'); ?>
  <script type="text/javascript">

    function del(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert ("Delete Berhasil");
         window.location.replace("barang.php");
        }
      };
      xhttp.open("post", "delbarang.php?q="+strdel, true);
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
            <h1>Form Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                <h3 class="card-title">Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="insertbarang.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="row">
                      <div class="form-group  col-md-5">
                        <label for="kodebarang">Kode Barang</label>
                        <input type="text" class="form-control" id="kodebarang" name="kodebarang" placeholder="Masukan kode barang...">
                      </div>
                    </div>
                    <div class="row">
                       <div class="form-group   col-md-7">
                        <label for="namabarang">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Masukan Nama barang">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="kategori">Kategori</label>
                        <?php
                            $i = 0;
                            $sql = "SELECT * FROM db_kategori";
                            $result = $conn->query($sql);
                             echo "<select class='form-control select2' name='kategori' id='kategori'>";
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {

                              echo "<option value='" . $row['id_kategori'] . "'>" . $row['nama_kategori'] . "</option>";
                              }
                            } else {
                              echo "0 results";
                            }
                            echo "</select>";
                        ?>

                      </div>
                      <div class="form-group  col-md-3">
                        <label for="kategori">Ukuran</label>
                        <?php
                            $i = 0;
                            $sql = "SELECT * FROM db_ukuran";
                            $result = $conn->query($sql);
                             echo "<select class='form-control select2' name='ukuran' id='ukuran'>";
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {

                              echo "<option value='" . $row['id_ukuran'] . "'>" . $row['nama_ukuran'] . "</option>";
                              }
                            } else {
                              echo "0 results";
                            }
                            echo "</select>";
                        ?>
                      </div>
                      <div class="form-group  col-md-3">
                        <label for="kategori">Promo</label>
                        <?php
                            $i = 0;
                            $sql = "SELECT * FROM db_promo";
                            $result = $conn->query($sql);
                             echo "<select class='form-control select2' name='promo' id='promo'>";
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {

                              echo "<option value='" . $row['id_promo'] . "'>" . $row['nama_promo'] . "</option>";
                              }
                            } else {
                              echo "0 results";
                            }
                            echo "</select>";
                        ?>
                      </div>
                    <div class="row">
                      <div class="form-group   col-md-6">
                        <label for="hargabeli">Harga Produk</label>
                        <input type="number" class="form-control" id="hargabeli" name="hargabeli" value="0" >
                      </div>
                      <div class="form-group   col-md-6">
                        <label for="stock">Stock Persediaan</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="0" >
                      </div>

                     </div>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan Produk</label>
                      <textarea id="keterangan" name="keterangan" rows="7" cols="50" class="form-control">

                      </textarea>
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
              <h3 class="card-title">List Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Harga Jual</th>
                  <th>Stock</th>
                  <th>Promo</th>
                  <th>Gambar</th>
                  <th>Flash Sale</th>
                  <th>Diskon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                          $i = 0;
                          $sql = "select db.id_barang,db.nama_barang,db.harga_barang,db.stok_barang,db.deskripsi,db.images,
                          dka.nama_kategori,dp.nama_promo,du.nama_ukuran,db.diskon,db.flash from db_barang db
                          left join db_kategori dka on db.id_kategori = dka.id_kategori
                          left join db_promo dp on dp.id_promo = db.id_promo
                          left join db_ukuran du on du.id_ukuran = db.id_ukuran";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";

                                echo "  <td>";
                                echo    $row["id_barang"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_barang"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_kategori"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_ukuran"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["harga_barang"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["stok_barang"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["nama_promo"];
                                echo "  </td>";
                                echo " <td><img src='images/produk/".$row['images']."' width='100px' height='100px'/></td>";
                                
                                echo "  <td>";
                                echo    $row["flash"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["diskon"];
                                echo "  </td>";
                                echo "  <td>";?>
                                <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal<?php echo $row["id_barang"] ?>">
                                  Edit
                                </button>
              
                                <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#exampleModalsale<?php echo $row["id_barang"] ?>">
                                  Sale
                                </button>
                                 <button class="btn btn-danger btn-round" onclick="del('<?php echo $row["id_barang"] ?>')">Delete</button>
                            <?php
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
  <!-- Modal -->
  <?php
                          $i = 0;
                          $sql = "select db.id_barang,db.nama_barang,db.harga_barang,db.stok_barang,db.deskripsi,db.images,dka.nama_kategori,dp.nama_promo,du.nama_ukuran from db_barang db
                          left join db_kategori dka on db.id_kategori = dka.id_kategori
                          left join db_promo dp on dp.id_promo = db.id_promo
                          left join db_ukuran du on du.id_ukuran = db.id_ukuran";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {?>
                               
                               <div class="modal fade" id="exampleModal<?php echo $row["id_barang"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Update Barang <?php echo $row["nama_barang"] ?></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="updatestock.php" method="post" enctype="multipart/form-data">
                    
                                          <div class="form-group   col-md-10">
                                            <label for="namabarang">Nama Barang</label>
                                            <input type="hidden" id="id" name="id" value="<?php echo $row["id_barang"] ?>" >
                                            <input type="text" class="form-control" id="namabarang" name="namabarang" value="<?php echo $row["nama_barang"] ?>">
                            </br>
                            <label for="hargabarang">Harga barang</label>
                                            <input type="number" class="form-control" id="hargabarang" name="hargabarang" value="<?php echo $row["harga_barang"] ?>">
                            </br>
                            <label for="hargabarang">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $row["stok_barang"] ?>">
                                            </br>
                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" rows="4" cols="50" name="deskripsi"><?php echo $row["deskripsi"] ?></textarea>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Update Barang</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>


                      <?php }
                          } else {
                            echo "0 results";
                          }
                      ?>


<?php
                          $i = 0;
                          $sql = "select db.id_barang,db.nama_barang,db.harga_barang,db.stok_barang,db.flash,db.diskon,db.deskripsi,db.images,dka.nama_kategori,dp.nama_promo,du.nama_ukuran from db_barang db
                          left join db_kategori dka on db.id_kategori = dka.id_kategori
                          left join db_promo dp on dp.id_promo = db.id_promo
                          left join db_ukuran du on du.id_ukuran = db.id_ukuran";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {?>
                               
                               <div class="modal fade" id="exampleModalsale<?php echo $row["id_barang"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Update Flash Sale <?php echo $row["nama_barang"] ?></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="updateflash.php" method="post" enctype="multipart/form-data">
                    
                                          <div class="form-group   col-md-6">
                                            <label for="stock">Masa Berlaku Flash Sale</label>
                                            <input type="hidden" id="id" name="id" value="<?php echo $row["id_barang"] ?>" >
                                            <input type="number" class="form-control" id="diskon" name="diskon" value="<?php echo $row["diskon"] ?>" >
                                            <input type="date" class="form-control" id="flash" name="flash" value="<?php echo $row["flash"] ?>" >
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">update flash Sale</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>


                      <?php }
                          } else {
                            echo "0 results";
                          }
                      ?>

  
  <!-- /.content-wrapper -->
<?php include('_partial/foot.php'); ?>