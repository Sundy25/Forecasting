<?php
require 'system/koneksi.php';

$kode = $_POST['id'];

$asal = mysql_query("SELECT * FROM forcasting WHERE row = $kode");
$data = mysql_fetch_array($asal);
$bulan = $data['bulan'];
$nilai = $data['c'];
?>
<form class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="bulan">Bulan</label>
		<div class="controls">
			<input type="text" id="bulan" class="input-medium" name="bulan" value="<?php echo $bulan ?>" readonly>
			<input type="hidden" name="id" value="<?php echo $kode ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nilai">Nilai</label>
		<div class="controls">
			<input type="text" id="nilai" class="input-medium" name="nilai" value="<?php echo $nilai ?>">
		</div>
	</div>
</form>
