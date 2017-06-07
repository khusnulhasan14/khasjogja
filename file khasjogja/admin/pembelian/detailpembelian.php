<?php 
// mengambil 1 data pembelian untuk 1 nota
$detail=$pembelian->ambil_pembelian($_GET['idp']);
// mengambil banyak data pembelian_detail karena 1 pembelian banyak produk
$produkbeli = $pembelian->ambil_pembelian_detail($_GET['idp']);

 ?>



<div class="row">
	<div class="col-md-6">
		<img src="../gambar/amikom.png" width="100" height="100">
	</div>
	<div class="col-md-6">
		<h4>KEPADA:</h4>
		<STRONG><?php echo $detail['nama_pelanggan']; ?></STRONG><br>
		Telepon: <b><?php echo $detail['telepon_pelanggan']; ?><br></b>
		Email: <b><?php echo $detail['email_pelanggan']; ?><br></b>
		Alamat: <b><?php echo $detail['alamat_pelanggan']; ?></b>
		<hr>
	</div>
</div>
<br>
 <table class="table">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 	<?php $totalbelanja=0; ?>
 	<?php foreach ($produkbeli as $key => $value): ?>
 		<?php $totalbelanja+=$value['subtotal_beli']; ?>
 		<tr>
 			<td><?php echo $key+=1 ?></td>
 			<td><?php echo $value['nama_beli']; ?></td>
 			<td><?php echo $value['harga_beli']; ?></td>
 			<td><?php echo $value['berat_beli']; ?></td>
 			<td><?php echo $value['jumlah_beli']; ?></td>
 			<td><?php echo $value['subtotal_beli']; ?></td>
 		</tr>
 	<?php endforeach ?>
 	</tbody>
 </table>

 <div class="row">
 	<div class="col-md-6">
 		<div class="alert alert-info">
 			<b>Ekspedisi:</b> <br><?php echo $detail['ekspedisi_pembelian']; ?><br><br>
 			<b>Alamat Kota/Kab: </b><br><?php echo $detail['alamat_pembelian']; ?><br>
 			<b>Alamat Lengkap dan Ket. Ukuran:</b><br> <?php echo $detail['alamat_penerima']; ?>
 		</div>
 	</div>
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<th>Total Belanja</th>
 				<td>Rp. <?php echo $totalbelanja ?></td>
 			</tr>
 			<tr>
 				<th>Total Ongkir</th>
 				<td>Rp. <?php echo $detail['ongkir_pembelian']; ?></td>
 			</tr>
 			<tr>
 				<th>Total Bayar</th>
 				<td>Rp. <?php echo $detail['total_bayar']; ?></td>
 			</tr>
 		</table>
 	</div>
 </div>

 <a class="btn btn-success hidden-print" onclick="print()">Cetak</a>