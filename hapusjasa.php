<?php 
include 'class.php';
$id_jasa=$_GET['id_jasa'];
$jasaservice->hapus_jasa($id_jasa);
echo "<script>alert('Berhasil Menghapus'); location='tampiljasa.php'</script>";
?>