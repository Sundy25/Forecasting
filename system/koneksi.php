<?php
$root="localhost";
$username="root";
$pass="";
$db="dbdsg";
$link=mysql_connect($root,$username,$pass);
mysql_select_db($db) or die("Koneksi mati, tidak bisa mengkoneksikan ke database karena " .mysql_error());

?>
