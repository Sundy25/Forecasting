<?php
include 'system/koneksi.php';

	$row	= $_POST['id'];
	$bulan	= $_POST['bulan'];
	$nilai	= $_POST['nilai'];
	
	$data = mysql_query("UPDATE forcasting SET c = '$nilai' WHERE row = $row");

?>
