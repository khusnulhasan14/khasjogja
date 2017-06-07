<h2>Tambah Produk</h2>
<hr>

<?php 
$kate=$kategori->tampil_kategori();
 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori">
			<option>Pilih Kategori</option>
			<?php foreach ($kate as $key => $value): ?>
			<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control">
	</div>

	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga" class="form-control">
	</div>

	<div class="form-group">
		<label>Berat</label>
		<input type="text" name="berat" class="form-control">
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi"></textarea>
	</div>

	<button class="btn btn-primary" name="save">Simpan</button>

</form>

<?php 
// jika ada tombol save
// mk obyek produk menjalankan fungsi simpan produk(data dari formulir termasuk id_kategori)
if(isset($_POST['save']))
{
	$produk->simpan_produk($_POST['id_kategori'],$_POST['nama'],$_POST['harga'],$_POST['berat'],$_FILES['foto'],$_POST['deskripsi']);
	echo "<script>alert('data telah disimpan');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}

?>