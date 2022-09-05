<?php 
include 'class.php';
$id_kendaraan=$_GET['id_kendaraan'];
$kendaraan->hapus_kendaraan($id_kendaraan);
echo "<script>alert('Berhasil Menghapus'); location='tampilkendaraan.php'</script>";
?>