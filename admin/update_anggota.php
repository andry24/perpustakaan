<?php 
include 'config.php';
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$tanggal_masuk=$_POST['tanggal_masuk'];

mysql_query("update tb_anggota set nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', tanggal_masuk='$tanggal_masuk' where nis='$nis'");
header("location:anggota.php");

?>