<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<img src="logoawal.png ">
	<title>Laporan Sisa Stok </title>
</head>

<body>
	<header>
		<h3>Laporan Sisa Stok</h3>
	</header>
    <button>
        <a href="index.php">Menu</a>
	</button>
    <br>
    <?php
		if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			echo "<b>Hasil pencarian : ".$cari."</b>";
		}
		?>
		<table border="1">	
			<tr>
				    <th>No</th>
                    <th>NAMA BARANG</th>
                    <th>Stok BARANG</th>
                    
            </tr>
	<h3>Cari Sisa Sparepart</h3>
		<form action="cetak-laporan-sisa-stok.php" method="get">
			<label>Cari :</label>
			<input type="text" name="cari">
			<input type="submit" value="Cari">
		</form>
        <?php 
        if(isset($_GET['cari'])){
				$cari = $_GET['cari'];
				$query = mysqli_query($conn, "SELECT nama_spareparts, jumlah_stok FROM spareparts where nama_spareparts  Like '%".$cari."%'");			
			}else{
				$query = mysqli_query ($conn, "SELECT nama_spareparts, jumlah_stok FROM spareparts");	
			}
			$no = 1;
			while($siswa = mysqli_fetch_array($query)){
			?>
				
			<tr>
				
				<td><?php echo $no++; ?></td>
                
                <td><?php echo $siswa['nama_spareparts']; ?></td>
                <td><?php echo $siswa['jumlah_stok']; ?></td>
                </tr>
			
			<?php } ?>    

	<table border="2">
	<thead>
		<tr>
			<th>No</th>
			<th>Bulan</th>
			<th>Sisa Stok</th>
		</tr>
	</thead>
	<tbody>
		
		<br>
		<?php
		$i=1;
		$sql = "SELECT MONTH(tanggal_pengadaan) AS bulan, jumlah_barang 
		FROM transaksi_pengadaan  
		group BY  bulan" or die(mysqli_error());
		$query = mysqli_query($conn, $sql) or die(mysqli_error());
		
		while($siswa = mysqli_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$siswa['bulan']."</td>";
			echo "<td>".$siswa['jumlah_barang']."</td>";
		
			echo "</td>";
			$i++;
			echo "</tr>";
		}		
		?>
    	
    	
        </tbody>
        </table>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
            <script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
            <script type="text/javascript">
            var chart1; 
            $(document).ready(function() {
                chart1 = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'bar'
                    },   
                    title: {
                        text: 'Grafik Sisa Stok Tahunan '
                    },
                    xAxis: {
                        categories: ['Bulan']
                    },
                    yAxis: {
                        title: {
                        text: 'Sisa Stok'
                        }
                    },
                        series:             
                        [
                <?php 
                
                $sql   = "SELECT *  FROM transaksi_pengadaan ORDER BY tanggal_pengadaan ASC";
                $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
                while( $siswa = mysqli_fetch_array( $query ) ){
                    $TANGGAL_TRANSAKSI=$siswa['tanggal_pengadaan']; 
    
                    $sql_stok   = "SELECT jumlah_barang FROM transaksi_pengadaan WHERE tanggal_pengadaan='$TANGGAL_TRANSAKSI'";        
                    $query_stok = mysqli_query( $conn,$sql_stok ) or die(mysqli_error());
                    while( $data = mysqli_fetch_array( $query_stok ) ){
                        $JUMLAH_STOK = $siswa['jumlah_stok'];                 
                    }             
                    ?>
                    {
                        name: '<?php echo $TANGGAL_TRANSAKSI; ?>',
                        data: [<?php echo $JUMLAH_STOK; ?>]
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


	<button  onClick="print_d()">Print Document</button>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
	<!-- <p>Total: <?php echo mysqli_num_rows($query) ?></p> -->

    </body>
    <button>
        <a href="index.php">Menu</a>
	</button>
</html>
