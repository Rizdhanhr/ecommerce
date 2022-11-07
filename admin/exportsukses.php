<!DOCTYPE html>
<html>
<head>
	<title>Export Laporan Penjualan</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_penjualan.xls");
	?>

	<center>
		<h1>Export Laporan Penjualan</h1>
	</center>

    <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pembayaran</th>
                  <th>Kode Transaksi</th>
                  <th>Member</th>
                  <th>Tgl Transaksi</th>
                  <th>Total</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                include 'db/database.php';
                          $i = 0;
                          $sql = "SELECT * FROM db_pembayaran where status_bayar > 1";
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
                                echo "</tr>";
                            }
                          } else {
                            echo "0 results";
                          }
                      ?>

                </tbody>
              </table>
</body>
</html>