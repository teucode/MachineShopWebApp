<?php 
include 'class.php';
$id_pegawai=$_GET['id_pegawai'];
$pegawai->hapus_pegawai($id_pegawai);
echo "<script>alert('Berhasil Menghapus'); location='tampilpegawai.php'</script>";
?>