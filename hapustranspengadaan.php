<?php 
include 'class.php';
$id_trans=$_GET['id_transaksi_pengadaan'];
$transpengadaan->hapus_transpengadaan($id_trans);
echo "<script>alert('Berhasil Menghapus'); location='tampiltranspengadaan.php'</script>";
?>