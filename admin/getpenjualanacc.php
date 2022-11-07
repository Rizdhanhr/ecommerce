<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pembayaran</th>
                  <th>Kode Transaksi</th>
                  <th>Member</th>
                  <th>Tgl Transaksi</th>
                  <th>Total</th>
                 <th>Bukti Bayar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include 'db/database.php';
                          $i = 0;
                          $sql = "SELECT * FROM db_pembayaran where status_bayar > 0 and date(tgl_transfer) BETWEEN '".$_GET['start']."' and '".$_GET['end']."'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "  <td>";
                                echo    $i=$i+1;
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_pembayaran"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["id_transaksi"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["email"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    $row["tgl_bayar"];
                                echo "  </td>";
                                echo "  <td>";
                                echo    number_format($row["nominal_pembayaran"],0);
                                echo "  </td>";

                                echo "  <td>";
                                echo "<img src='../images/".$row['gambar']."' width='100px' height='100px'/>";
                                echo "  </td>";
                                
                                if($row["status_bayar"] > 1){
                                  echo "  <td>";
                                  echo "Transaksi di setujui";
                                  echo "  </td>";
                                  echo "  <td>";
                                  echo "<form>";
                                  echo '<a class="btn btn-primary" href="cetakinvoice.php?id='.$row["id_transaksi"].'")" target="_blank">Cetak</a>';
                                  echo "  <br>";
                                  echo '<a class="btn btn-warning btn-round" target="_blank" href="detailtransaksi.php?id='.$row["id_transaksi"].'")">Detail</a>';
                                  echo "</form>";
                                  echo "  </td>";
                                  
                                  
                                }else if($row["status_bayar"] < 1){
                                  echo "  <td>";
                                    echo "Transaksi di reject";
                                    echo " </td>";
                                }else{
                                  echo "  <td>";
                                  echo    '<a class="btn btn-warning btn-round" target="_blank" href="detailtransaksi.php?id='.$row["id_transaksi"].'")">Detail</a>';?>

                                  <button class="btn btn-success btn-round" onclick="accept('<?php echo $row["id_pembayaran"] ?>')">Accept</button>
                                  <button class="btn btn-danger btn-round" onclick="reject('<?php echo $row["id_pembayaran"] ?>')">Reject</button>

                            <?php
                                }
                                echo "  </td>";
                                echo "</tr>";
                            }
                          } else {
                            echo "0 results";
                          }
                      ?>

                </tbody>
              </table>