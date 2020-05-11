<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Anggota</h3>
<a class="btn" href="anggota.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$nis=mysql_real_escape_string($_GET['nis']);
$det=mysql_query("select * from tb_anggota where nis='$nis'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_anggota.php" method="post">
		<table class="table">
			<tr>
				<td>NIS</td>
				<td><input type="text" class="form-control" name="nis" value="<?php echo $d['nis'] ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Anggota</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input type="text" class="form-control" name="tempat_lahir" value="<?php echo $d['tempat_lahir'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Masuk</td>
				<td><input type="text" class="form-control" name="tanggal_masuk" value="<?php echo $d['tanggal_masuk'] ?>" readonly></td>
			</tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>