<?php 

include 'config.php';
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$tanggal_masuk=$_POST['tanggal_masuk'];

mysql_query("insert into tb_anggota values('$nis','$nama','$tempat_lahir','$tanggal_lahir','$tanggal_masuk')")or die(mysql_error());
header("location:anggota.php");

?>