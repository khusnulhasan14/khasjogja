<!-- ngecek, udah pernah nginput pembayaran untuk id_pembelian ini belum, kalau sudah ya gk bisa -->
<?php $datapembayaran = $pembelian->ambil_pembayaran($_GET['idp']); ?>

<?php if (isset($datapembayaran)): ?>
<div class="pembayaran">
	
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
				<a href="index.php?halaman=lunaspembelian&id=<?php echo $_GET['idp']; ?>" class="btn btn-primary" onclick="return confirm('apakah anda yakin?');">Nyatakan Lunas</a>
			</div>
			<div class="col-md-7">
				<img src="../admin/assets/foto_pembayaran/<?php echo $datapembayaran['bukti_pembayaran']; ?>" class="img-responsive">
		</div>
			</div>
			
	
</div> <?php else: ?>
	

<div class="pembayaran">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 
			// jika ada tombol kirim, maka obyek embelian menjalankan fungsi simpan_pembayaran(data dari formulir)
				if(isset($_POST['kirim']))
				{
					$pembelian->simpan_pembayaran($_POST['id_pembelian'],$_POST['tanggal'],$_FILES['bukti'],$_POST['jumlah'],$_POST['keterangan']);
					echo "<div class='alert alert-danger'>pembelian ini sudah dikonfirmasi</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
				}
				?>
				<h2>Pelanggan Belum Melakukan Pembayaran</h2>
				
			</div>
		</div>
	</div>
</div>
<?php endif ?>