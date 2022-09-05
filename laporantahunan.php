<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pendapatan Tahunan</title>
</head>

<body>
	<header>
		<h3>Laporan Pendapatan Tahunan</h3>
	</header>
	
	<table border="2">Tahun : 2019
	<thead>
		<tr>
			<th>No</th>
			<th>Tahun</th>
			<th>Cabang</th>
			<th>Jumlah Pendapatan</th>
		</tr>
	</thead>
	<tbody>
    
		
		<?php
		$show=mysqli_query($conn,"SELECT year(tanggal) Tahun, 
        c.nama_cabang Cabang, 
        sum(grand_total) Total 
        from transaksi
        join cabang c using(id_cabang)
        WHERE status_pembayaran = 'lunas'
        group by c.nama_cabang
        order by nama_cabang,year(tanggal) asc") or die( mysqli_error($conn));
            if(mysqli_num_rows($show)==0)
            {
            echo '<tr><td colspan="5">No Data Available in Table</td></tr>';
            }
            else
            {
            $num=1;
            $tot=0;
            while($data = mysqli_fetch_array($show))
            {
            ?>		<tr>
                    <td><?php echo $num ?></td>
                    <td ><?php echo $data['Tahun'] ?></td>
                    <td><?php echo $data['Cabang'] ?></td>
                    <td><?php echo $data['Total'] ?></td>
            </tr>
            <?php
            }
            ?><?php	} ?>
	</tbody>
	</table>
    <table  border="1" width="16.9%" >
    <th>Total:</th>
    <?php 
        $total=0;
        $query = mysqli_query($conn,"SELECT SUM(grand_total) AS total  FROM transaksi ");
       
            while($data = mysqli_fetch_array($query)){
                
                echo "<th>".$data['total']."</th>";
            }
        ?><br>
    </table><br>
	 <button  onClick="print_d()">Print Document</button>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
        <script type="text/javascript">
	    var myChart; 
        $(document).ready(function() {
            myChart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'column'
                },   
                title: {
                    text: 'Grafik Pendapatan Tahunan '
                },
                xAxis: {
                    categories: ['Cabang']
                },
                yAxis: {
                    title: {
                    text: 'Pendapatan'
                    }
                },
                    series:             
                    [
            <?php 
        	
            $sql   = "SELECT year(tanggal) Tahun, id_cabang,
            c.nama_cabang Cabang, 
            sum(grand_total) Total 
            from transaksi
            join cabang c using(id_cabang)
            WHERE status_pembayaran = 'lunas'
            group by c.nama_cabang
            order by nama_cabang,year(tanggal) asc";
            $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
            while( $siswa = mysqli_fetch_array( $query ) ){
                $cab=$siswa['Cabang']; 
                $id=$siswa['id_cabang'];
                 $sql_harga   = "SELECT sum(grand_total) Total FROM transaksi WHERE id_cabang='$id'";        
                 $query_harga = mysqli_query( $conn,$sql_harga ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_harga ) ){
                    $tot = $siswa['Total'];   
                           
                  }
                }             
                  ?>
                  {
                      name: '<?php echo $cab; ?>',
                      data: [<?php echo $tot; ?>]
                  }
                  
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
<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
