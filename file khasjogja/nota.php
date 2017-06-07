<?php if (!isset($_SESSION['pelanggan'])): ?>
	<script>alert('Anda Harus Login');</script>
	<script>location='index.php';</script>
<?php endif ?>

<br><br><br><br>
<div class="nota">
	<div class="container">
		<?php 
// mengambil 1 data pembelian untuk 1 nota
$detail=$pembelian->ambil_pembelian($_GET['id']);
// mengambil banyak data pembelian_detail karena 1 pembelian banyak produk
$produkbeli = $pembelian->ambil_pembelian_detail($_GET['id']);


 ?>

 <!-- jika id pelanggan yg login tidak sama dengan id_pelanggan yg beli, maka dilarikan ke halaman pelanggan -->
 <?php if ($_SESSION['pelanggan']['id_pelanggan']!==$detail['id_pelanggan']): ?>
 	<script>location='index.php?halaman=pelanggan';</script>
 	
 <?php endif ?>



<div class="row">
	<div class="col-md-6">
		<div class="judul"><a href="index.php">Khas<span class="logo">Jogja</span></div></a>
	</div>
	<div class="col-md-6">
		<h4>KEPADA:</h4>
		<STRONG><?php echo $detail['nama_pelanggan']; ?></STRONG><br>
		Telepon: <b><?php echo $detail['telepon_pelanggan']; ?><br></b>
		Email: <b><?php echo $detail['email_pelanggan']; ?><br></b>
		Alamat: <b><?php echo $detail['alamat_pelanggan']; ?></b><br>
<!-- 		Alamat Penerima: <b><?php echo $detail['alamat_pembelian']; ?>,</b>
		<b><?php echo $detail['alamat_penerima']; ?></b> -->
		<hr>
	</div>
</div>

 <table class="table table-striped table-bordered table-hover">
 	<thead>
 		<tr class="info">
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>

 	<?php foreach ($produkbeli as $key => $value): ?>
 		<tr>
 			<td><?php echo $key+=1 ?></td>
 			<td><?php echo $value['nama_beli']; ?></td>
 			<td>Rp. <?php echo number_format($value['harga_beli']); ?></td>
 			<td><?php echo $value['berat_beli']; ?></td>
 			<td><?php echo $value['jumlah_beli']; ?></td>
 			<td>Rp.<?php echo number_format($value['subtotal_beli']); ?></td>
 		</tr>
 	<?php endforeach ?>
 	</tbody>
 </table> 

 <div class="row">
 	<div class="col-md-6">
 		<div class="alert alert-info">
 			<strong>Ekspedisi:<?php echo $detail['ekspedisi_pembelian']; ?></strong>
 			<p><b>Alamat Kota/Kab:</b> <?php echo $detail['alamat_pembelian']; ?></p>
 			<p><b>Alamat Lengkap (wajib) dan Ket. Ukuran (jika ada):</b> <?php echo $detail['alamat_penerima']; ?></p>
 		</div>
 		<div class="alert alert-success">
 		<label>Silakan Transfer Ke Salah Satu Rekening KhasJogja:</label>
 			<?php echo $pengaturan->isi_pengaturan("no_rek"); ?>
 		</div>
 	</div>
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<th>Total Belanja</th>
 				<td>Rp. <?php echo number_format($detail['total_pembelian']) ?></td>
 			</tr>
 			<tr>
 				<th>Total Ongkir</th>
 				<td>Rp. <?php echo number_format($detail['ongkir_pembelian']); ?></td>
 			</tr>
 			<tr>
 				<th>Total Bayar</th>
 				<td>Rp. <?php echo number_format($detail['total_bayar']); ?></td>
 			</tr>
 		</table>
 	</div>
 </div>

 <a class="btn btn-success hidden-print" onclick="print()">Cetak</a>
 <a href="index.php?halaman=pelanggan" class="btn btn-primary">Konfirmasi Pembayaran</a>
	</div>
</div>
<br>