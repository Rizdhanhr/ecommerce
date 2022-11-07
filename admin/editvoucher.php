<?php include ('_partial/top.php'); ?>
  <script type="text/javascript">

    function del(strdel){
      //alert(strdel);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         alert ("Delete Berhasil");
         window.location.replace("Voucher.php");
        }
      };
      xhttp.open("post", "delVoucher.php?q="+strdel, true);
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
            <h1>Form Voucher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Voucher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
  

        
  $sql = "SELECT * FROM db_voucher where kode_voucher = '".$_GET['id']."'";
  // echo $sql;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($data = $result->fetch_assoc()) {
      
  // $select = "SELECT * FROM db_pembayaran";
  // if($id)
    

  
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Voucher</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="editvoucherproses.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
    
                      <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo $data['kode_voucher']; ?>" placeholder="Masukan kode Voucher fashion..." readonly>
                    </div>
                    <div class="form-group">
                      <label for="voucher">Voucher</label>
                      <input type="text" class="form-control" id="voucher" name="voucher" value="<?php echo $data['nama_voucher']; ?>" placeholder="Masukan Voucher fashion...">
                    </div>

                    <div class="form-group">
                      <label for="voucher">Tgl Start</label>
                      <input type="date" class="form-control" value="<?php echo $data['tgl_start']; ?>" id="start" name="start" >
                    </div>

                    <div class="form-group">
                      <label for="voucher">Tgl End</label>
                      <input type="date" class="form-control" id="end" value="<?php echo $data['tgl_end']; ?>" name="end" >
                    </div>
                    <div class="form-group">
                      <label for="voucher">Poin</label>
                      <input type="text" class="form-control" id="poin" value="<?php echo $data['poin']; ?>" name="poin" >
                    </div>
                    
                    <div class="form-group">
                      <label for="tipe">Tipe</label>
                      <select class="form-control"  name="tipe" id="tipe">
                      <?php 
                      if ($data['tipe']=='diskon'){ ?>
                        <option value="diskon" selected>Diskon</option>
                        <option value="freeongkir">Free Ongkir</option>
                      <?php   } else { ?>
                        <option value="diskon">Diskon</option>
                        <option value="freeongkir" selected>Free Ongkir</option>
                        <?php
                         }
                      ?>
                      
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="nominal">Nominal</label>
                      <input type="text" class="form-control" id="nominal" value="<?php echo $data['nominal']; ?>" name="nominal" placeholder="Masukkan Nominal">
                    </div>
                    <div class="form-group">
                      <label for="masaaktif">Masa Aktif</label>
                      <input type="number" class="form-control" id="masa_aktif" value="<?php echo $data['masa_aktif']; ?>" name="masa_aktif" placeholder="Masukkan Masa Aktif">
                    </div>
                    <div class="form-group">
                      <label for="tipe">Status Member</label>
                      <select class="form-control" name="status_member" value="<?php echo $data['status_member']; ?>" id="status_member">
                      <?php 
                      if ($data['status_member']=='all'){ ?>
                        <option value="all" selected>All</option>
                        <option value="epic">Epic</option>
                        <option value="legend">Legend</option>
                        <option value="mythic">Mythic</option>
                      <?php   } else if($data['status_member']=='epic') { ?>
                        <option value="all">All</option>
                        <option value="epic" selected>Epic</option>
                        <option value="legend">Legend</option>
                        <option value="mythic">Mythic</option>
                        <?php
                      ?>
                        <?php   } else if($data['status_member']=='legend') { ?>
                        <option value="all">All</option>
                        <option value="epic">Epic</option>
                        <option value="legend" selected>Legend</option>
                        <option value="mythic">Mythic</option>
                        <?php
                      ?>
                        <?php   } else if($data['status_member']=='mythic') { ?>
                        <option value="all">All</option>
                        <option value="epic">Epic</option>
                        <option value="legend">Legend</option>
                        <option value="mythic" selected>Mythic</option>
                        <?php
                         }
                      ?>
                      
                    </select>
  </div>
                    <!-- <div class="form-group">
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
                  /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
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