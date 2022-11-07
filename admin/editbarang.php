<?php include ('_partial/top.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Barang</h1>
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

    <?php 
  

        
        $sql = "SELECT * FROM db_barang where id_barang = '".$_GET['id']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($data = $result->fetch_assoc()) {
            
        // $select = "SELECT * FROM db_pembayaran";
        // if($id)
          

        
      ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="editbarangproses.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kategori">Kode Barang</label>
                      <input type="text" class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $data['id_barang']; ?>"readonly>
                    </div>
                    <div class="form-group">
                      <label for="kategori">Nama Barang</label>
                      <input type="text" class="form-control" id="namabarang" name="namabarang" value="<?php echo $data['nama_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="kategori">Harga Barang</label>
                      <input type="text" class="form-control" id="hargabarang" name="hargabarang" value="<?php echo $data['harga_barang']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['deskripsi']; ?>">
                    </div>
                    <div class="form-group">
                    <img src="images/produk/<?php echo $data['images']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                    </div>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="gambar" name="gambar">
                          <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                      <label for="gambar" style="color: red">*Size < 1MB, format (jpeg), Abaikan Jika Tidak Ingin Merubah Gambar</label>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                  </div>
                  <!-- /.card-body -->
                </form>
              </div>
              <!-- /.card-body -->
              <?php    }
        }
                                ?>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
    

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