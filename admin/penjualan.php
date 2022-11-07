<?php include('_partial/top.php'); ?>
 <script type="text/javascript">
   // get();
    function add(){
      //alert(strdel);
      var e = document.getElementById("kode_barang");
      var strBarang = e.options[e.selectedIndex].value;
      var qty = document.getElementById("qty").value;

      var inv = document.getElementById("inv").value;

      //alert(strBarang+"-"+qty+"-"+inv);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          get(inv);
          if(this.responseText == "stockKosong"){
            alert("Maaf Stock Anda tidak mencukupi dan pembelian tidak boleh melebihi stock yang ada");
          
          }else{
             document.getElementById("total").innerHTML = this.responseText;
          }
        }
      };
      xhttp.open("post", "insertpenjualan.php?kode="+strBarang+"&qty="+qty+"&inv="+inv, true);
      xhttp.send();
    };

    function proses(){
      //alert(strdel);
      var e = document.getElementById("customer");
      var strCus = e.options[e.selectedIndex].value;
      var kasir = document.getElementById("kasir").value;
      var total = document.getElementById("totalBayar").value;
      var note = document.getElementById("note").value;
      var inv = document.getElementById("inv").value;
      

      //alert(total);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          location.replace('invoice.php?invoice='+inv);
        }
      };
      xhttp.open("post", "insertpenjualanfix.php?pelanggan="+strCus+"&kasir="+kasir+"&total="+total+"&note="+note+"&inv="+inv, true);
      xhttp.send();
    };


    function kembalian(){
     
      var bayar = document.getElementById("bayar").value;

      var total = document.getElementById("total").textContent || document.getElementById("total").innerText;

      var kembalian = bayar - total;

      document.getElementById("kembalian").value = kembalian;

       alert(bayar+"-"+total+"-"+kembalian);

    };

    function deldtpenjualan(inv,kode){
      //alert(kode+"-"+inv);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          get(inv);
          document.getElementById("total").innerHTML = this.responseText;
        }
      };
      xhttp.open("post", "delpenjualan.php?inv="+inv+"&kode="+kode, true);
      xhttp.send();
    };

    function get(str){
     // var invoice = document.getElementById("inv").value;
      
      var xhttp = new XMLHttpRequest();
      //xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          document.getElementById("datapenjualan").innerHTML = this.responseText;
         //alert ("Delete Berhasil");
         //window.location.replace("supplier.php");
        }
      };
      //xhttp.open("get", "getpenjualan.php?invoice="+invoice, true);
      xhttp.open("post", "getpenjualan.php?invoice="+str, true);
      xhttp.send();
    };

  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Penjualan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Penjualan</li>
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
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              
              <div class="info-box-content">
                    <table>
                      
                      <tr>
                        <td>
                          <label>Kasir</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <input type="text" class="form-control" value="<?php echo $_SESSION["user"] ?>" disabled/>
                          <input type="hidden" class="form-control" id="kasir" name="kasir" value="<?php echo $_SESSION["userss"] ?>"/>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Customer</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <?php
                            $i = 0;
                            $sql = "SELECT * FROM pelanggan";
                            $result = $conn->query($sql);
                             echo "<select class='form-control select2' name='customer' id='customer'>";
                             echo "<option value='0'>Umum</option>";
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {

                              echo "<option value='" . $row['kode_pelanggan'] . "'>" . $row['nama_pelanggan'] . "</option>";
                              }
                            } else {
                              echo "0 results";
                            }
                            echo "</select>";
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                        </td>
                      </tr>

                    </table>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <table>
                      <tr>
                        <td>
                            <label>Barcode</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                           <div class="form-group">
                               <?php
                                  $i = 0;
                                  $sql = "SELECT * FROM barang";
                                  $result = $conn->query($sql);
                                   echo "<select class='form-control select2' name='kode_barang' id='kode_barang'>";
                                  if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                    echo "<option value='" . $row['kode_barang'] . "'>" . $row['nama_barang']."</option>";
                                    }
                                  } else {
                                    echo "0 results";
                                  }
                                  echo "</select>";
                                ?>
                            </select>
                          </div>
                          
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Qty</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                         
                          <input type="number" class="form-control" id="qty" name="qty" value="1"/>
                        </td>
                      </tr>
                      <tr>
                        <td>
                           <input type="button" class="btn btn-primary" onclick="add()" id="btnadd" name="btnadd" value = "Add" />
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                         
                        </td>
                      </tr>

                    </table>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <table >
                      <tr>
                        <td>
                            <label>Invoice,</label>
                        </td>
                        <td>
                          <?php
                            $invoice = "SZP".date("Ymdhs"); 
                            echo '<input type="hidden" class="form-control" id="inv" name="inv" value="'.$invoice.'" />';
                            echo "<label>".$invoice."</label>";
                            echo '<script type="text/javascript">',
                                 'get("'.$invoice.'");',
                                 '</script>'
                            ;
                          ?>
                          
                        </td>
                        <td>
                          
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <h1 id="total">0</h1>
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                         
                        </td>
                      </tr>

                    </table>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Keranjang Belanja</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="datapenjualan">
                  
            
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!--<div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              
              <div class="info-box-content">
                    <table>
                      <tr>
                        <td>
                            <label>Sub Total</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <input type="date" class="form-control" id="datesales" name="datesales" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Kasir</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <input type="text" class="form-control" value="chandra" disabled/>
                          <input type="hidden" class="form-control" id="kasir" name="kasir" value="chandra"/>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Customer</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <?php
                            /*$i = 0;
                            $sql = "SELECT * FROM pelanggan";
                            $result = $conn->query($sql);
                             echo "<select class='form-control select2' name='suplier' id='suplier'>";
                             echo "<option value='0'>Umum</option>";
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {

                              echo "<option value='" . $row['kode_pelanggan'] . "'>" . $row['nama_pelanggan'] . "</option>";
                              }
                            } else {
                              echo "0 results";
                            }
                            echo "</select>";*/
                          ?>
                        </td>
                      </tr>

                    </table>
              </div>
            </div>
          </div>-->
          <!-- /.col -->
          <!--<div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-2">
              <div class="info-box-content">
                <table>
                      <tr>
                        <td>
                          <label>Bayar</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <input type="number" class="form-control" id="bayar" name="bayar" onchange="kembalian()" >
                        </td>
                      </tr>-->
                      <!--<tr>
                        <td>
                          <label>Kembalian</label>
                        </td>
                        <td>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>
                          <input type="number" class="form-control" id="kembalian" name="kembalian" disabled/>
                        </td>
                      </tr>-->
          <!--          </table>
              </div>
            </div>
          </div>-->
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <table >
                      <tr>
                        <td>
                          <label>Note </label>
                        </td>
                        <td>
                          
                        </td>
                        <td>
                          <textarea rows="4" cols="35" id="note" name="note">
                          </textarea>
                        </td>
                        <td>
                        </td>
                      </tr>
                    </table>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div >
              <div class="info-box-content">
                <table >
                      <tr>
                        <td>
                          <button type="button" class="btn btn-warning" id='btncancel'>Cancel</button>
                        </td>
                        <td>
                        </td>
                        <td>
                          <button type="button" class="btn btn-success" id='btsbayar' onclick='proses()'>Proses Pembayaran</button>
                        </td>
                        <td>
                        </td>
                      </tr>
                    </table>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('_partial/foot.php'); ?>