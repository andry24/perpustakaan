<?php 

include 'config.php';
$no=$_POST['no'];
$nama=$_POST['nama'];
$judul_buku1=$_POST['judul_buku1'];
$judul_buku2=$_POST['judul_buku2'];
$judul_buku3=$_POST['judul_buku3'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];

if($judul_buku1 != ""){
mysql_query("insert into tb_peminjaman(kode_peminjaman,nama,judul_buku,tanggal_pinjam) values('$no','$nama','$judul_buku1','$tanggal_pinjam')")or die(mysql_error());
}
if($judul_buku2 != ""){
mysql_query("insert into tb_peminjaman(kode_peminjaman,nama,judul_buku,tanggal_pinjam) values('$no','$nama','$judul_buku2','$tanggal_pinjam')")or die(mysql_error());	
}
if($judul_buku3 != ""){
mysql_query("insert into tb_peminjaman(kode_peminjaman,nama,judul_buku,tanggal_pinjam) values('$no','$nama','$judul_buku3','$tanggal_pinjam')")or die(mysql_error());
}
header("location:peminjaman.php");	

?>