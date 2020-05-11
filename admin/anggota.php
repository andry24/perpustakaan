<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Anggota</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Anggota</button>
<br/>
<br/>

<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_anggota");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_anggota.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_anggota.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Nama Anggota di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">NIS</th>
		<th class="col-md-2">Nama Anggota</th>
		<th class="col-md-2">Tempat Lahir</th>
		<th class="col-md-2">Tanggal Lahir</th>
		<th class="col-md-2">Tanggal Masuk</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tb_anggota where nis like '$cari' or nama like '$cari'");
	}else{
		$brg=mysql_query("select * from tb_anggota limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nis'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['tempat_lahir'] ?></td>
			<td><?php echo $b['tanggal_lahir'] ?></td>
			<td><?php echo $b['tanggal_masuk'] ?></td>
			<td>
				<a href="detail_anggota.php?nis=<?php echo $b['nis']; ?>" class="btn btn-info">Detail</a></td>
				<td><a href="edit_anggota.php?nis=<?php echo $b['nis']; ?>" class="btn btn-warning">Edit</a></td>
				<td><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_anggota.php?nis=<?php echo $b['nis']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Anggota Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tambah_anggota.php" method="post">
					<div class="form-group">
						<label>NIS</label>
						<input name="nis" type="text" class="form-control" placeholder="Nis..">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama ..">
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat lahir ..">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input name="tanggal_lahir" type="text" class="form-control" placeholder="Tanggal lahir .." id="tgl">
					</div>
					<div class="form-group">
						<label>Tanggal Masuk</label>
						<input name="tanggal_masuk" type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>" placeholder="Tanggal masuk .." readonly>
					</div>																

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'dd/mm/yy'});

        });
    </script>
<?php 
include 'footer.php';

?>