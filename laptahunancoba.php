<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pendapatan Tahunan</title>
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atma Auto</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap1.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <!-- CHART JS-->
	<link href="assets/js/Chart.min" rel="stylesheet" />
	<link href="assets/js/Chart.css" rel="stylesheet" />
</head>
</head>

<body>
<div id="page-wrapper" >
    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        
                        <br><br>
                        <div class="col-md-12">
                            <div class="panel panel-default" >
                                <div class="border_print" id="printArea">
                                    <div class="panel-body" style="border: 1px solid">
                                        <img src="assets/img/kop.png" class="user-image2 img-responsive "/>
                                        <hr style="border-top: 3px solid ">		
                                        <h3 align="center"><b>LAPORAN PENDAPATAN TAHUNAN</b></h3>
                                        <br>
                                        <?php
                                        
                                        
                                            //include 'koneksi.php';
                                            $current_date = date('Y-m-d H:i:s');
                                            $myDate = new DateTime($current_date);
                                            $formattedDate1 = $myDate->format('d M Y');
                                            
                                            
                                            function TanggalIndo($date){
                                                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                
                                                $tahun = substr($date, 0, 4);
                                                $bulan = substr($date, 5, 2);
                                                $tgl   = substr($date, 8, 2);
                                                
                                                $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
                                                return($result);
                                            }
                                            $formattedDate = TanggalIndo($current_date);
                                        ?>
                                                
                                                
                                                <div class="col-md-12">
                                                    <div class="panel panel-default" >
                                                            <div class="panel-body">
                                                                <br><br>
                                                                <div class="table-responsive">
                                                                <table class="table table-striped table-bordered ">
                                                                    <th>No</th>
                                                                    <th>Tahun</th>
                                                                    <th>Cabang</th>
                                                                    <th>Total</th>
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
                                                                            $num++;
                                                                            $tot=$tot+$data['Total'];
                                                                        }
                                                                    ?>
                                                                        <tr><td align="right" colspan="3">Total</td><td><b><?php echo $tot ?></b></td></tr>
                                                            <?php	} ?>
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            
                                            <span class="pull-right">
                                                <label>dicetak tanggal <?php echo $formattedDate ?></label>
                                            </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <table>
                                    <tr style="padding:10px">
                                        <td style="padding:10px">
                                            <a class="btn btn-success" onclick="printContent('printArea')">Print</a>
                                        </td>
                                        
                                    </tr>
                                </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
	<!-- CHART JS SCRIPTS -->
	<script src="assets/js/Chart.js"></script>
	<script src="assets/js/Chart.min.js"></script>
	<!-- CHART JS SCRIPTS -->
	<script src="assets/js/Chart.js"></script>
	<script src="assets/js/Chart.min.js"></script>
	
	<script>
		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>

    <script>
	
	
	var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
	var ctx = document.getElementById('myChart').getContext('2d');
    <canvas id="bar-chart" width="800" height="450"></canvas>
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
			<?php
			$show=mysqli_query($conn,"SELECT distinct year(tanggal) as Tahun
									from transaksi
									order by year(tanggal) asc;");
			while ($p = mysqli_fetch_array($show) or die( mysqli_error($conn))) { echo $p['Tahun'].",";}?>
			
			],
			datasets: [
				<?php
					$show=mysqli_query($conn,"SELECT c.nama_cabang Cabang, 
											sum(grand_total) Total 
											from transaksi
											join cabang c using(id_cabang)
											WHERE status_pembayaran = 'lunas'") or die( mysqli_error($conn));
						$data3 = array("Blue", "Red", "Green", "Yellow");
						$i=0;
						while ($p = mysqli_fetch_array($show) or die( mysqli_error($conn))) 
						{ 
					
					?>
							{
								
								label: '<?php echo $p['Cabang'];?>',
								backgroundColor : '<?php echo $data3[$i] ?>',
												
								data: [
								
									'<?php echo $p['Total'];?>'
								]
							
								
							},
				<?php   	$i++;
				
						} ?>
			]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	</script>

	<br>
	<button>
        <a href="index.php">Menu</a>
	</button>
    </body>
</html>
<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
