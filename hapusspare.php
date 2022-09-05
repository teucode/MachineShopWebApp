<?php 
include 'class.php';
$id_spare=$_GET['kode_spareparts'];
$spareparts->hapus_spareparts($id_spare);
echo "<script>alert('Berhasil Menghapus'); location='tampilspare.php'</script>";
?>