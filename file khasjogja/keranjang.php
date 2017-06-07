<!-- <pre><?php print_r($_SESSION) ?></pre> -->
 
<?php $keran=$keranjang->tampil_keranjang(); ?>
<!-- <pre><?php print_r($keran) ?></pre> -->
<br><br><br><br>
<div class="minimal-tinggi">
	<div class="keranjang">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="info">
					<th>No</th>
					<th>Nama Produk</th>
					<th>Berat (gr.)</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($keran as $key => $value): ?>
				
				<tr>
					<td><?php echo $key+=1; ?></td>
					<td><?php echo $value['nama_produk']; ?></td>
					<td><?php echo $value['berat_produk']; ?></td>
					<td><?php echo $value['jumlah']; ?></td>
					<td><?php echo $value['harga_produk']; ?></td>
					<td><?php echo $value['subtotal']; ?></td>
					<td>
						<a href="index.php?halaman=hapus_keranjang&id=<?php echo $value["id_produk"]; ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<a href="index.php?halaman=produk" class="btn btn-primary">Lanjutkan Belanja</a>
		<a href="index.php?halaman=checkout" class="btn btn-info">Checkout</a>
		<br>
		<br>
		<br><br><br><br><br><br><br>
	</div>
</div>

</div>
<?php 

// skrip hapus
// jika (pada url) ada parameter hapus, maka
//  obyek pelanggan menjalankan fungsi hapus_pelanggan(id pelanggan dari url)

if(isset($_GET['hapus']))
{
	$keranjang->hapus_keranjang($_GET['hapus']);
	echo "<script>location='index.php?halaman=keranjang';</script>";
}
?>