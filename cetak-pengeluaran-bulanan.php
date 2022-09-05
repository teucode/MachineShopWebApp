<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<img src="logoawal.png">
	<title>Laporan Pengeluaran Bulanan</title>
</head>

<body>
	<header>
		<h3>Laporan Pengeluaran Bulanan</h3>
	</header>
	
	<table border="2">Tahun : 2019
	<thead>
		<tr>
			<th>No</th>
			<th>Bulan</th>
			<th>Jumlah Pengeluaran</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		$i=1;
		$sql = "SELECT harga_satuan, MONTH(tanggal_pengadaan) AS bulan FROM transaksi_pengadaan ORDER BY tanggal_pengadaan ASC" or die(mysqli_error());
		$query = mysqli_query($conn, $sql);
		
		while($siswa = mysqli_fetch_array($query)){
			echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$siswa['bulan']."</td>";
            echo "<td>Rp.".$siswa['harga_satuan']."</td>";
        
			echo "</td>";
			$i++;
			echo "</tr>";
		}		
		?>
		<p>Total : <?php echo mysqli_num_rows($query) or die(mysqli_error()) ?></p>
	</tbody>
	</table>
    <table  border="1" width="16.9%" >
    <th>Total:</th>
    <?php 
        $total=0;
        $query = mysqli_query($conn,"SELECT SUM(harga_satuan) AS total  FROM transaksi_pengadaan ");
       
            while($siswa = mysqli_fetch_array($query)){
                
                echo "<th>".$siswa['total']."</th>";
            }
        ?>
    </table>
	<button  onClick="print_d()">Print Document</button>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
        <script type="text/javascript">
	    var chart1; 
        $(document).ready(function() {
            chart1 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'column'
                },   
                title: {
                    text: 'Grafik Pengeluaran Bulanan '
                },
                xAxis: {
                    categories: ['Bulan']
                },
                yAxis: {
                    title: {
                    text: 'Harga'
                    }
                },
                    series:             
                    [
            <?php 
        	
            $sql   = "SELECT *  FROM transaksi_pengadaan ORDER BY tanggal ASC";
            $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
            while( $siswa = mysqli_fetch_array( $query ) ){
            	$TANGGAL_KELUAR=$siswa['tanggal']; 
 
                 $sql_harga   = "SELECT harga_satuan FROM transaksi_pengadaan WHERE tanggal='$TANGGAL_KELUAR'";        
                 $query_harga = mysqli_query( $conn,$sql_harga ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_harga ) ){
                    $HARGA_BARANG_KELUAR = $siswa['harga_satuan'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $TANGGAL_KELUAR; ?>',
                      data: [<?php echo $HARGA_BARANG_KELUAR; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
    </script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
        

	<br>
	<button>
        <a href="index.php">Menu</a>
	</button>
    </body>
</html>

