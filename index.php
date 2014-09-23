<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php include 'system/koneksi.php'; ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>SPK Project</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Project SPK">
	<meta name="author" content="F , R &amp; C">
	<link href="assets/css/net.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-1.8.3.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/jquery.flot.js"></script>
	
</head>
<body class="container">
	<div id="header">
		<h2>E'Fos<br/>
		<i><h5><i class="icon-globe"></i>  Ecomathematics Forecasting System </h5></i>
		</h2>
	</div>
	<div id="container">
		<div class="demo-container">	
			<div id="placeholder" class="demo-placeholder"></div>
		</div>
		<script src="assets/js/spk.js"></script>	
		<div id="data-nilai"></div>
	</div>	
	<div class="col-lg-12">
		<div class="foot">
			Copyright &copy; 2013 Folarium Tchnomedia
		</div>
	</div>

	<div id="dialog-data" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel"></h3>
	</div>
	<div class="modal-body"></div>
	<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-data" class="btn btn-success">Simpan</button>
	</div>
</div>
</body>
</html>