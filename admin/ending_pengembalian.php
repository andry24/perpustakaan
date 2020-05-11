<?php 

include 'config.php';
$nama=$_POST['nama'];
$judul_buku=$_POST['judul_buku'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];
$kode_peminjaman = $_POST['kode_peminjaman'];
$no=$_POST['no'];
mysql_query("insert into tb_pengembalian(kode_pengembalian,nama,judul_buku, tanggal_pinjam, tanggal_kembali) values('$kode_peminjaman','$nama','$judul_buku','$tanggal_pinjam','$tanggal_kembali')")or die(mysql_error());
mysql_query("delete from tb_peminjaman where no='$no'");
header("location:peminjaman.php");

?>