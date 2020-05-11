<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Peminjaman</h3>
<a class="btn" href="peminjaman.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$no=mysql_real_escape_string($_GET['no']);

$det=mysql_query("select * from tb_peminjaman where no='$no'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<form action="update_peminjaman.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="no" value="<?php echo $d['no'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="nama" list="anggota" value="<?php echo $d['nama'] ?>" class="form-control">
					<datalist id="anggota">
								<?php 
								$brg=mysql_query("select * from tb_anggota");
								while($b=mysql_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama']; ?></option>
									<?php 
								}
								?>
					</datalist>
				</td>
			</tr>	
			<tr>
				<td>Judul Buku</td>
				<td>
					<input type="text" name="judul_buku" list="buku" value="<?php echo $d['judul_buku'] ?>" class="form-control">
					<datalist id="buku">								
								<?php 
								$brg=mysql_query("select * from tb_buku");
								while($b=mysql_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['judul_buku']; ?>"><?php echo $b['judul_buku']; ?></option>
									<?php 
								}
								?>
					</datalist>
				</td>
			</tr>	

			<tr>
				<td>Tanggal Pinjam</td>
				<td><input type="text" class="form-control" name="tanggal_pinjam" value="<?php echo $d['tanggal_pinjam']; ?>" id="tgl"></td>
			</tr>
			</tr>
		</table>
			<input type="submit" class="btn btn-info" value="Simpan">
		</form>
	<?php 
}
?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'dd/mm/yy'});

        });
    </script>
<?php 
include 'footer.php';

?>