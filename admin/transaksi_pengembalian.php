<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Pengembalian</h3>
<a class="btn" href="Peminjaman.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$no=mysql_real_escape_string($_GET['no']);

$det=mysql_query("select * from tb_peminjaman where no='$no'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<form action="ending_pengembalian.php" method="post">
		<table class="table">
			<tr>
				<td>Kode Peminjaman</td>
				<td><input type="text" name="kode_peminjaman" value="<?php echo $d['kode_peminjaman'] ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<select class="form-control" name="nama">
						<?php 
						$brg=mysql_query("select * from tb_anggota");
						while($b=mysql_fetch_array($brg)){
							?>	
							<option <?php if($d['nama']==$b['nama']){echo "selected"; } ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>	
			<tr>
				<td>Judul Buku</td>
				<td>
					<select class="form-control" name="judul_buku">
						<?php 
						$brg=mysql_query("select * from tb_buku");
						while($b=mysql_fetch_array($brg)){
							?>	
							<option <?php if($d['judul_buku']==$b['judul_buku']){echo "selected"; } ?> value="<?php echo $b['judul_buku']; ?>"><?php echo $b['judul_buku'] ?></option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>	

			<tr>
				<td>Tanggal Pinjam</td>
				<td><input type="text" class="form-control" name="tanggal_pinjam" value="<?php echo $d['tanggal_pinjam'] ?>" readonly></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input type="text" class="form-control" name="tanggal_kembali" value="<?php echo date('Y-m-d') ?>" readonly></td>
			</tr>
		</table>
		<input type="hidden" name="no" value="<?php echo $d['no'] ?>">
		<input type="submit" class="btn btn-info" value="Simpan">
		</form>
	<?php 
}
?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php 
include 'footer.php';

?>