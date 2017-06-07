<?php 
$detail=$produk->ambil_produk($_GET['id']);

?>
<!-- <pre><?php print_r($detail) ?></pre> -->
<br><br><br><br>
<div class="minimal-tinggi">
	<div class="produk">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<div class="thumbnail">
							<img src="assets/foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive">
						</div>
					</div>
					<div class="col-md-6">
						<table class="table">
							<h2>DETAIL PRODUK</h2>
							<tr>
								<td><b>Nama:</b> <?php echo $detail['nama_produk']; ?></td>
							</tr>
							<tr>
								<td><b>Berat:</b> <?php echo $detail['berat_produk']; ?> Gram</td>
							</tr>
							<tr>
								<td><b>Harga:</b> <?php echo number_format($detail['harga_produk']); ?></td>
							</tr>
							<tr>
								<td><b>Deskripsi:</b><p> <?php echo $detail['deskripsi_produk']; ?></p></td>
							</tr>
						</table>
							

						<form method="post" action="index.php?halaman=beli">
							<div class="input-group">
								<div class="input-group-btn">
									<b class="btn">Jumlah</b>
								</div>
								<input type="number" class="form-control" name="jumlah" min="1" value="1">
								<input type="hidden" name="id_produk" value="<?php echo $detail['id_produk']; ?>">
								<div class="input-group-btn">
									<button class="btn btn-primary" name="beli">Beli</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3">
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
</div>
</div>

 <?php   
  if(isset($_POST['beli']))   
  {   
   if(empty($_POST['ukuran']))  
   {  
   echo "Anda belum memilih!";  
   }  
   else echo "Pilihan anda: ".$_POST['ukuran'];  
  }   
  ?>  
 