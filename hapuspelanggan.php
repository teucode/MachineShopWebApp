<?php 
include 'class.php';
$id_pelanggan=$_GET['id_pelanggan'];
$pelanggan->hapus_pelanggan($id_pelanggan);
echo "<script>alert('Berhasil Menghapus'); location='tampilpelanggan.php'</script>";
?>