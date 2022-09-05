<?php 
include 'class.php';
$id_supplier=$_GET['id_supplier'];
$supplier->hapus_supplier($id_supplier);
echo "<script>alert('Berhasil Menghapus'); location='tampilsupplier.php'</script>";
?>