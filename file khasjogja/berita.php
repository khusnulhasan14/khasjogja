<br><br><br>
<?php 

$ber = $berita->tampil_berita();
?>
<!-- <pre><?php print_r($ber) ?></pre> -->

<div class="berita">
	<div class="container">
		<div class="row">
				<div class="col-md-9">
					<ul class="media">
					<?php foreach ($ber as $key => $value): ?>
						<li class="media-list">
							<div class="media-left">
								<a href="">
									<img src="assets/foto_berita/<?php echo $value['gambar_berita']; ?>" class="media-object" width="200">
								</a>
							</div>
							<div class="media-body">
								<h2><?php echo $value['judul_berita']; ?></h2>
								<span><?php echo $value['tanggal_berita']; ?></span>
								<p><?php echo $value['isi_berita']; ?></p>
								<b>Penulis: <?php echo $value['penulis_berita']; ?></b>
							</div>
					<?php endforeach ?>
					<br><br>
						</li>
					</ul>		
				</div>
			<div class="col-md-3">Sesuatu</div>
		</div>
	</div>
</div>