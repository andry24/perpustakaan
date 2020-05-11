<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Peminjaman</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry</button>
<form action="cari_peminjaman.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Data Pinjam.." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<br/>
<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_peminjaman");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<table class="table">
	<tr>
		<th>No</th>
		<th>Kode Peminjaman</th>
		<th>Nama</th>
		<th>Judul Buku</th>
		<th>Tanggal Pinjam</th>			
		<th>Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tb_peminjaman where kode_peminjaman like '$cari' or nama like '$cari' or judul_buku like '$cari'");
	}else{
		$brg=mysql_query("select * from tb_peminjaman limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['kode_peminjaman'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['judul_buku'] ?></td>
			<td><?php echo $b['tanggal_pinjam']?></td>		
			<td>		
				<!-- <a href="edit_peminjaman.php?no=<?php echo $b['no']; ?>" class="btn btn-warning">Edit</a> -->
				<a href="transaksi_pengembalian.php?no=<?php echo $b['no']; ?>" class="btn btn-info">KEMBALIKAN</a>
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
				<h4 class="modal-title">Tambah Peminjaman
				</div>
				<div class="modal-body">				
					<form action="tambah_peminjaman.php" method="post">	
						<div class="form-group">
							<?php
							$brg=mysql_query("select max(kode_peminjaman) from tb_peminjaman");
							$datakode = mysql_fetch_array($brg);
							  // jika $datakode
							  if ($datakode) {
							   $nilaikode = substr($datakode[0], 1);
							   // menjadikan $nilaikode ( int )
							   $kode = (int) $nilaikode;
							   // setiap $kode di tambah 1
							   $kode = $kode + 1;
							   $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
							  } else {
							   $kode_otomatis = "P0001";
							  }
							?>
							<label>No</label>								
							<input type="text" name="no" class="form-control" value="<?php echo $kode_otomatis ?>" readonly/>
						</div>		
						<div class="form-group">
							<label>Nama</label>								
							<input type="text" list="anggota" name="nama" class="form-control" />
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

						</div>		
						<div class="form-group">
							<label>Judul Buku</label>
							<input type="text" list="buku" class="form-control" name="judul_buku1"/>
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
						</div>
						<div class="form-group">
							<input type="text" list="buku" class="form-control" name="judul_buku2"/>
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
						</div>
						<div class="form-group">
							<input type="text" list="buku" class="form-control" name="judul_buku3"/>
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
						</div>										
						<div class="form-group">
							<label>Tanggal Pinjam</label>
							<input name="tanggal_pinjam" type="text" class="form-control" placeholder="Tanggal Pinjam" autocomplete="off" value="<?php echo date('d/m/Y'); ?>" readonly>
						</div>																
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'dd/mm/yy'});							
		});
	</script>
	<?php include 'footer.php'; ?>