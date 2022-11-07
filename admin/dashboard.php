
<?php include('_partial/top.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Barang</span>
                <span class="info-box-number">
                <?php
                          $i = 0;
                          $sql = "select count(id_barang) as jumlah from db_barang";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                 echo $row["jumlah"];
                           }
                          } else {
                            echo "0 results";
                          }
                      ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tansaksi</span>
                <span class="info-box-number"><?php
                          $i = 0;
                          $sql = "select count(id_pembayaran) as jumlah from db_pembayaran";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                 echo $row["jumlah"];
                           }
                          } else {
                            echo "0 results";
                          }
                      ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pengiriman</span>
                <span class="info-box-number"><?php
                          $i = 0;
                          $sql = "select count(id_pengiriman) as jumlah from db_pengiriman";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                 echo $row["jumlah"];
                           }
                          } else {
                            echo "0 results";
                          }
                      ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Members</span>
                <span class="info-box-number"><?php
                          $i = 0;
                          $sql = "select count(email) as jumlah from db_user";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                 echo $row["jumlah"];
                           }
                          } else {
                            echo "0 results";
                          }
                      ?></span>

              </div>
              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="col-md-6">
            <!-- LINE CHART -->
            <!-- <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div> -->
              
              <!-- /.card-body -->
            </div>
            <!-- <script>
                        
                        //- LINE CHART -
                        //--------------
                        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                        var lineChartOptions = $.extend(true, {}, areaChartOptions)
                        var lineChartData = $.extend(true, {}, areaChartData)
                        lineChartData.datasets[0].fill = false;
                        lineChartData.datasets[1].fill = false;
                        lineChartOptions.datasetFill = false
        
                        var lineChart = new Chart(lineChartCanvas, {
                          type: 'line',
                          data: lineChartData,
                          options: lineChartOptions
                        })
        
                         
                      </script> -->
            <!-- /.card -->
      
               
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('_partial/foot.php'); ?>