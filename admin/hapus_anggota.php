<?php 
include 'config.php';
$nis=$_GET['nis'];
mysql_query("delete from tb_anggota where nis='$nis'");
header("location:anggota.php");

?>