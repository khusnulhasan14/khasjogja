
	<h2>Tambah kategori</h2>
	<form method="post">
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control">
		</div>
		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" name="keterangan" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-primary">Simpan</button>	
	</form>

<?php 
	if(isset($_POST['save']))
	{

		$kategori->simpan_kategori($_POST['nama'],$_POST['keterangan']);

		echo "<script>alert('data telah disimpan');</script>";
		echo "<script>location='index.php?halaman=kategori';</script>";

	}
 ?>