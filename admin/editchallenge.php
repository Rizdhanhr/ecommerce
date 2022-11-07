<?php include ('_partial/top.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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

    <?php 
  

        
        $sql = "SELECT * FROM setting where id = '".$_GET['id']."'";
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
                <h3 class="card-title">Edit Challenge</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="settingproses.php" method="post" >
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>" readonly>
                      
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="start">Mulai</label>
                      <input type="date" class="form-control" id="start" name="start" value="<?php echo $data['start']; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="End">Berakhir</label>
                      <input type="date" class="form-control" id="end" name="end" value="<?php echo $data['start']; ?>" >
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