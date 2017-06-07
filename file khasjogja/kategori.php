<br><br><br><br>
<?php 

// membuat pagination
// menentukan batas
$batas = 20;
// menentukan posisi
// jika ada parameter page di url, maka posisi didapat dari page-1 * batas
if(isset($_GET['page']))
{
	$posisi = ($_GET['page']-1) * $batas;
}
// selain itu(tidak ada parameter page di url) maka posisi dianggap 0 dan page dianggap 1
else
{
	$posisi = 0;
	$_GET['page'] = 1;
}


// menampilkan produk berdasarkan kategori tertentu yg id kategorinya ada di url
$pro=$produk->tampil_produk_kategori($_GET['id'],$posisi,$batas);

?>

<div class="minimal-tinggi">
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

		<?php 
				// banyak page didapat dari banyak data dibagi batas dan dibulatkan
				// misal total ada 12 data dan batasnya 6, maka banyak page adalah 2 (12/6)
				// 1. menghitung total data
		$totaldata = count($produk->tampil_produk_kategori($_GET['id']));
		$banyakpage = ceil($totaldata/$batas);
		$get = $_GET['id'];
				// echo $banyakpage;
		?>
		<nav>
			<ul class="pagination">
				<?php  
				for($i=1; $i<=$banyakpage; $i++)
				{
							// jika $i sama dengan page maka warna beda
					if($i==$_GET['page'])
					{
						$aktif = "active";
					}
					else
					{
						$aktif = "";
					}

					echo "<li class='$aktif'><a href='index.php?halaman=kategori&id=$get&page=$i'>$i</a></li>";
				}
				?>
			</ul>
		</nav>
	</div>
</div>
</div>