<?php include 'db/database.php'; ?>
<table id="example2" class="table table-bordered ">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Stock Tambah</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                              $invoice = mysqli_real_escape_string($conn, $_REQUEST['invoice']);
                              $i = 0;
                              $totalpembayaran=0;
                              $sql = "SELECT p.invoicepo,b.kode_barang,b.nama_barang , p.stock FROM barang b JOIN dtpembelian p ON b.kode_barang = p.kode_barang where p.invoicepo = '$invoice'";
                              //echo $sql;
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $totalpembayaran =$totalpembayaran+$row["total"];
                                    echo "<tr>";
                                    echo "  <td>";
                                    echo    $i=$i+1;
                                    echo "  </td>";
                                    echo "  <td>";
                                    echo    $row["kode_barang"];
                                    echo "  </td>";
                                    echo "  <td>";
                                    echo    $row["nama_barang"];
                                    echo "  </td>";
                                    echo "  <td>";
                                    echo    $row["stock"];
                                    echo "  </td>";
                                    echo "  <td>";
                                    echo    '<button class="btn btn-danger btn-round" onclick="deldtpembelian(\''.$row["invoice"].'\',\''.$row["kode_barang"].'\')">Delete</button>';
                                    echo "  </td>";
                                    echo "</tr>";
                                }
                              } else {
                                    echo "0 results";
                              }
                          ?>
                    
                    </tbody>
                  </table>