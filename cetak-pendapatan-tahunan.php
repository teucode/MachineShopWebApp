<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
<img src="logoawal.png">
	<title>Laporan Pendapatan Tahunan</title>
</head>

<body>
	<header>
		<h3>Laporan Pendapatan Tahunan</h3>
	</header>
	<li><a href="cetak-pendapatan-bulanan.php">Laporan Pendapatan Bulanan</a></li>
    <li><a href="cetak-pendapatan-tahunan.php">Laporan Pendapatan Tahunan</a></li>
	<table border="2">
	<thead>
		<tr>
			<th>No</th>
			<th>Tahun</th>
            <th>Cabang</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
        $i=1;
        $total_nilai=0;
		$sql = "SELECT cabang.nama_cabang, YEAR(tanggal) AS tahun , grand_total
        FROM transaksi
        INNER JOIN cabang ON transaksi.id_cabang=cabang.id_cabang group by tahun
        ORDER BY tanggal ASC";
        $query = mysqli_query($conn, $sql);
		while($siswa = mysqli_fetch_array($query)){
            $ab= $siswa['grand_total'];
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$siswa['tahun']."</td>";
            echo "<td>".$siswa['nama_cabang']."</td>";
            echo "<td>Rp.".$siswa['grand_total']."</td>";
            //  echo "<td>Rp.$ab</td>";
        
			echo "</td>";
			$i++;
            echo "</tr>";
            $total_nilai += $ab;
        }
        	
        $siswa = mysqli_query($conn,"SELECT SUM(grand_total) AS jumlah_a)  FROM transaksi");
        echo "<tr><td>TOTAL</td><td>$siswa[jumlah_a]</td><td><td>Rp.$total_nilai</td></td></tr>";
        echo "</table>";
	
		?>
		<p>Total : <?php echo mysqli_num_rows($query) ?></p>

	
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
                    text: 'Grafik Pendapatan Tahunan '
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
        	
            $sql   = "SELECT *  FROM transaksi ORDER BY tanggal ASC";
            $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
            while( $siswa = mysqli_fetch_array( $query ) ){
            	$TANGGAL_TRANSAKSI=$siswa['tanggal']; 
 
                 $sql_harga   = "SELECT grand_total FROM transaksi WHERE tanggal='$TANGGAL_TRANSAKSI'";        
                 $query_harga = mysqli_query( $conn,$sql_harga ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_harga ) ){
                    $TOTAL_BAYAR = $siswa['TOTAL_BAYAR'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $TANGGAL_TRANSAKSI; ?>',
                      data: [<?php echo $TOTAL_BAYAR; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
    </script>
	</head>
	<body>
		<div id='container'></div>		
	</body> -->
        

	<br>
	<button>
        <a href="index.php">Menu</a>
	</button>
    </body>
</html>

