<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Anggota</h3>
<a class="btn" href="anggota.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$nis=mysql_real_escape_string($_GET['nis']);


$det=mysql_query("select * from tb_anggota where nis='$nis'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>NIS</td>
			<td><?php echo $d['nis'] ?></td>
		</tr>
		<tr>
			<td>Nama Anggota</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><?php echo $d['tempat_lahir'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><?php echo $d['tanggal_lahir'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Masuk</td>
			<td><?php echo $d['tanggal_masuk'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>