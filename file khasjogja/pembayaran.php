<?php if (!isset($_SESSION['pelanggan'])): ?>
	<script>alert('Anda Harus Login');</script>
	<script>location='index.php';</script>
<?php endif ?>
<br><br><br><br>

<!-- ngecek, udah pernah nginput pembayaran untuk id_pembelian ini belum, kalau sudah ya gk bisa -->
<?php $datapembayaran = $pembelian->ambil_pembayaran($_GET['id']); ?>

<?php if (isset($datapembayaran)): ?>
<div class="minimal-tinggi">
	<div class="pembayaran">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<table class="table">
					<tr>
						<td>Tanggal: </td>
						<th><?php echo $datapembayaran['tanggal_pembayaran']; ?></th>
					</tr>
					<tr>
						<td>Jumlah: </td>
						<th><?php echo $datapembayaran['jumlah_pembayaran']; ?></th>
					</tr>
					<tr>
						<td>Keterangan: </td>
						<th><?php echo $datapembayaran['keterangan_pembayaran']; ?></th>
					</tr>
				</table>
			</div>
			<div class="col-md-7">
			<img src="admin/assets/foto_pembayaran/<?php echo $datapembayaran['bukti_pembayaran']; ?>" class="img-responsive">
			<br>
				
		</div>
			</div>
			
	</div>
</div>
</div> 
<?php else: ?>
	

<div class="pembayaran">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 
			// jika ada tombol kirim, maka obyek embelian menjalankan fungsi simpan_pembayaran(data dari formulir)
				if(isset($_POST['kirim']))
				{
					$pembelian->simpan_pembayaran($_POST['id_pembelian'],$_POST['tanggal'],$_FILES['bukti'],$_POST['jumlah'],$_POST['keterangan']);
					echo "<div class='alert alert-success'>terimakasih telah konfirmasi</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
				}
				?>
				<h2>Konfirmasi Pembayaran</h2>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>No Pembelian</label>
						<input type="text" class="form-control" name="id_pembelian" value="<?php echo $_GET['id']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Tanggal Pembayaran</label>
						<input required type="date" class="form-control" name="tanggal">
					</div>
					<div class="form-group">
						<label>Bukti Pembayaran</label>
						<input required type="file" name="bukti" class="form-control">
					</div>
					<div class="form-group">
						<label>Jumlah Pembayaran</label>
						<input required type="number" name="jumlah" class="form-control">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>
					<button class="btn btn-primary" name="kirim">Kirim</button>
				</form>
				<br>
			</div>
			<div class="col-md-4">
			<br>
				<div class="alert alert-info">
					<p>Silakan isi form disamping dengan benar, tanggal dan jumlah pembayaran serta bukti pembayaran. <br><br>
					<b>Admin khasJogja</b>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif ?>