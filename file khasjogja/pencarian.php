<?php 
// tampil produk
// obyek pelanggan menjalankan fungsi tampil_produk()
$pro=$produk->cari_produk($_POST['katakunci']);
?>
<!-- <pre><?php print_r($pro) ?></pre> -->
<br>
<div class="produk">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="row">

					<?php foreach ($pro as $key => $value): ?>


						<div class="kolom-jadi-5">
							<!-- <div class="thumbnail">
								<img src="assets/foto_produk/<?php echo $value['foto_produk']; ?>" class="produkku">
								<div class="caption" >
									<h3><?php echo $value['nama_produk']; ?></h3>
									<span>Rp. <?php echo number_format($value['harga_produk']); ?></span><br>
									<a href="index.php?halaman=detailproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
									<a href="index.php?halaman=detailproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-info">Detail</a>
								</div>
							</div> -->
							<div class="produkku">
								<a href="index.php?halaman=detailproduk&id=<?php echo $value['id_produk']; ?>"><img src="assets/foto_produk/<?php echo $value['foto_produk']; ?>" class="gambar_produk"></a>
								<div class="tulisan">
									<a href="index.php?halaman=detailproduk&id=<?php echo $value['id_produk']; ?>"><?php echo $value['nama_produk']; ?></a><br><br>
									<div class="merah">
										<span><a href="index.php?halaman=detailproduk&id=<?php echo $value['id_produk']; ?>">Rp. <?php echo number_format($value['harga_produk']); ?></a></span>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="panel panel-primary">
					<div class="panel-heading">Kategori</div>
					<ul class="list-group">
						<?php $kate=$kategori->tampil_kategori(); ?>
						<?php foreach ($kate as $key => $value): ?>
							
							<li class="list-group-item"><a href="index.php?halaman=kategori&id=<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></a>
							</li>	
						<?php endforeach ?>	
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>