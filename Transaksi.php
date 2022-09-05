<h1>TRANSAKSI</h1>
<?php 
include 'class.php';
$datatransaksi = $transaksi->tampil_transaksi(); ?>

<pre><?php print_r($datatransaksi); ?></pre>