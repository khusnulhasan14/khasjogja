<?php if (!isset($_SESSION['pelanggan'])): ?>
	<script>alert('Anda Harus Login');</script>
	<script>location='index.php';</script>
<?php endif ?>

<?php 
// mengambil dataorang yg login
$idp = $_SESSION['pelanggan']['id_pelanggan'];
$datapel = $pelanggan->ambil_pelanggan($idp);
?>
<!-- <pre><?php print_r($datapel) ?></pre> -->
<br><br><br><br>
<div class="minimal-tinggi">
	<section class="pelanggan">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Profil</div>
					<br>
					<img src="gambar/user.png" class="img-responsive" style="margin-left: 50px; ">
					<br>
					<ul class="list-group">
						<li class="list-group-item"><?php echo $datapel['nama_pelanggan']; ?></li>
						<li class="list-group-item"><?php echo $datapel['email_pelanggan']; ?></li>
						<li class="list-group-item"><?php echo $datapel['telepon_pelanggan']; ?></li>
					</ul>
					<div class="panel-footer">
						<a href="index.php?halaman=ubahpelanggan" class="btn btn-block btn-info">Ubah Profil</a>
					</div>
				</div>
			</div>	
			<div class="col-md-8">
				<table class="table table-bordered" id="tabelku">
					<thead>
						<tr class="info">
							<th>No</th>
							<th>Tanggal</th>
							<th>Total</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<!-- mengambil id_pealanggan yg sedang login -->
					<?php $idpl = $_SESSION['pelanggan']['id_pelanggan']; ?>
					<!-- menampilkan riwayat belanja pelanggan login -->
					<?php $riwayat = $pembelian->tampil_pembelian_pelanggan($idpl); ?>
					<?php foreach ($riwayat as $key => $value): ?>
						<tr>
							<td> <?php echo $key+=1; ?></td>
							<td> <?php echo $value['tanggal_pembelian']; ?> </td>
							<td> <?php echo $value['total_bayar']; ?> </td>
							<td> <?php echo $value['status_pembelian']; ?> </td>
							<td>
								<a href="index.php?halaman=nota&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info">Nota</a>
								<a href="index.php?halaman=pembayaran&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success">Konfirmasi</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</section>
</div>