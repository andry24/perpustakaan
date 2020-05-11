<?php 
include 'config.php';
$no=$_POST['no'];
$nama=$_POST['nama'];
$judul_buku=$_POST['judul_buku'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];

mysql_query("update tb_peminjaman set nama='$nama', judul_buku='$judul_buku', tanggal_pinjam='$tanggal_pinjam', where no='$no'");
header("location:peminjaman.php");

?>