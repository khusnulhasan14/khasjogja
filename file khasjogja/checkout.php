<br><br><br><br>
<div class="container">
<?php if (!isset($_SESSION['pelanggan'])): ?>
	<div class="alert alert-info">Untuk melakukan check out, anda harus login</div>
	<meta charset="utf-8" http-equiv="refresh" content="2; url=index.php?halaman=login">
<?php endif ?>
</div>

<?php 
// jika ada disubmit kota, maka id_kota/city_id di simpan dalam variabel id_kota
// alternative lain pakai ternary, bukan hanya if else
// $id_kota = isset($_POST['kota']) ? $_POST['kota'] : "";
if(isset($_POST['kota']))
{
	$id_kota = $_POST['kota'];
}
else
{
	$id_kota = "";
}


// jika ada disubmit ekspedisi maka di simpan dalam variabel ekspedisi
if(isset($_POST['ekspedisi']))
{
	$ekspedisi = $_POST['ekspedisi'];
}
else
{
	$ekspedisi = "";
}

// jika paket dipilih, maka simpan dalam variabel keypaket
if(isset($_POST['paket']))
{
	$keypaket = $_POST['paket'];
}
else
{
	$keypaket = "";
}

 ?>

<div class="checkout">
	<div class="container">
		<h1>Checkout</h1>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr class="info">
					<th>No</th>
					<th>Nama Produk</th>
					<th>Berat (gr.)</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody> 
			<?php $totalberat=0; ?>
			<?php $totalbelanja=0; ?>
			<?php $keran=$keranjang->tampil_keranjang(); ?>
			<?php foreach ($keran as $key => $value): ?>
			<?php 
			// menghitung sub berat(berat 1 produk x jumlah yg dibeli)
			$subberat = $value['berat_produk'] * $value['jumlah'];
			// menghitung total berat (didapat dari subberat bertambah tiap perulangan)
			$totalberat+=$subberat;
			// menghitung total belanja
			$totalbelanja+=$value['subtotal'];
			?>	
				<tr>
					<td><?php echo $key+=1; ?></td>
					<td><?php echo $value['nama_produk']; ?></td>
					<td><?php echo $value['berat_produk']; ?></td>
					<td><?php echo $value['jumlah']; ?></td>
					<td><?php echo number_format($value['harga_produk']); ?></td>
					<td><?php echo number_format($value['subtotal']); ?></td>
				</tr>
			<?php endforeach ?>
			<?php 
			include 'config/apiongkir.php';
			include 'config/apikota.php';
			?>

			<tr>
				<th colspan="5">Total Belanja</th>
				<th>Rp. <?php echo number_format($totalbelanja); ?></th>
			</tr>
			<tr>
				<th colspan="5">Total Ongkos Kirim</th>
				<th>Rp. <?php echo number_format($ongkir_pembelian); ?></th>
			</tr>
			<tr>
				<th colspan="5">Total Bayar</th>
				<?php $totalbayar=$totalbelanja+$ongkir_pembelian; ?>
				<th>Rp. <?php echo number_format($totalbayar); ?></th>
			</tr>
			</tbody>
		</table>




		<h2>Alamat Pengiriman</h2>
		<form method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Kota</label>
						<select class="form-control" name="kota" onchange="submit()" required>
							<option value="">Pilih kota</option>
							<?php foreach ($_SESSION['datakota'] as $key => $value): ?>
							<option  value="<?php echo $value['city_id'] ?>" <?php if($id_kota==$value['city_id']){echo "selected";} ?>>
								<?php echo $value['type']; ?>
								<?php echo $value['city_name']; ?>
								<?php echo $value['province']; ?>	
								<?php echo $value['postal_code']; ?>	
							</option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Ekspedisi</label>
						<select class="form-control" name="ekspedisi" onchange="submit()" required="">
							<option value="">Pilih Ekspedisi</option>
							<option value="pos"  <?php if($ekspedisi=="pos"){echo "selected";} ?>  >POS Indonesia</option>
							<option value="tiki"  <?php if($ekspedisi=="tiki"){echo "selected";} ?>  >TIKI</option>
							<option value="jne"  <?php if($ekspedisi=="jne"){echo "selected";} ?>  >Jalur Nugraha Eka (JNE)</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Paket</label>
						<select class="form-control" name="paket" onchange="submit()" required="">
							<option value="">Pilih Paket</option>
							<?php foreach ($datapaket as $key => $value): ?>
							<?php $waktu = $value['cost']['0']['etd']; ?>
							<option value="<?php echo $key; ?>"  <?php if($key==$keypaket){echo "selected";} ?> ><?php echo $value['service']; ?> - <?php echo $waktu; ?> Hari</option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Alamat Lengkap (Wajib) dan Ukuran (jika ada)</label>
				<textarea required class="form-control" name="alamat_penerima" placeholder="Tulis alamat lengkap rumah anda beserta keterangan ukuran"></textarea>
			</div>
			<button class="btn btn-primary" name="selesai">Selesai</button>
		</form>
<br>
	</div>
</div>

<?php 
// jika ada tombol selesai, maka obyek pembelian menjalankan fungsi simpan_pembelian(dr form dan api,dll)
if(isset($_POST['selesai']))
{
	// mendapatkan id_pelanggan yg login dari session 
	$idp = $_SESSION['pelanggan']['id_pelanggan'];


	// adegan menyimpan pembelian
	$idpembelian = $pembelian->simpan_pembelian($idp,$totalbelanja,$ongkir_pembelian,$totalbayar,$_POST['alamat_penerima'],$ekspedisi_pembelian,$alamat_pembelian);
	echo "<script>alert('terimakasih telah berbelanja');</script>";
	echo "<script>location='index.php?halaman=nota&id=$idpembelian';</script>";
}	

?>