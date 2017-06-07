<?php 
// 1. ambil datanya dulu
// obyek produk menjalankan fungsi ambil_produk(id pada url)
$detail = $produk->ambil_produk($_GET['id']);
$kate=$kategori->tampil_kategori();

?>

<h2>Ubah Produk</h2>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori">
			<option>Pilih Kategori</option>
			<?php foreach ($kate as $key => $value): ?>
			<option value="<?php echo $value['id_kategori']; ?>" <?php if($detail['id_kategori']==$value['id_kategori']){echo "selected";} ?>><?php echo $value['nama_kategori']; ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_produk'] ?>">
	</div>

	<div class="form-group">
		<label>Berat</label>
		<input type="text" name="berat" class="form-control" value="<?php echo $detail['berat_produk'] ?>">
	</div>

	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga" class="form-control" value="<?php echo $detail['harga_produk'] ?>">
	</div>

	<div class="form-group">
		<img src="../assets/foto_produk/<?php echo $detail['foto_produk']; ?>" width="200">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi"><?php echo $detail["deskripsi_produk"]; ?></textarea>
	</div>

	<button class="btn btn-primary" name="save">Simpan</button>

</form>


<?php 
// mengubah produk
if(isset($_POST['save']))
 {
 	// obyek produk menjlankan fungsi produk
 	$produk->ubah_produk($_POST['id_kategori'],$_POST['nama'],$_POST['berat'],$_POST['harga'],$_FILES['foto'],$_POST['deskripsi'],$_GET['id']);
 	echo "<script>alert('data telah diubah');</script>";
 	echo "<script>location='index.php?halaman=produk';</script>";
 }

 ?>
