<h2>Tambah Berita</h2>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">	
		<label>Judul</label>
		<input type="text" name="nama" class="form-control">
	</div>

	<div class="form-group">	
		<label>Tanggal</label>
		<input type="date" name="tanggal" class="form-control">
	</div>

	<div class="form-group">
		<label>Isi</label>
		<input type="text" name="isi" class="form-control">
	</div>

	<div class="form-group">	
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	
	<div class="form-group">	
		<label>penulis</label>
		<input type="text" name="penulis" class="form-control">
	</div>

	<button type="submit" name="save" class="btn btn-primary">Simpan</button>
</form>

<?php 
// setiap kotak dalam formulir waji dikasih nama
// mengakses inputan manusia diformulir pakai $_POST["namakotak"]
// jika ada tombol save

if(isset($_POST["save"]))
{


//maka obyek berita menjalankan fungsi simpan_berita(data dari formulir)
	$berita->simpan_berita($_POST["nama"],$_POST["tanggal"],$_POST["isi"],$_FILES["foto"],$_POST["penulis"]);

// tampilkan pesan dilayar
echo "<script>alert('data telah disimpan');</script>";

// redirect ke tampil berita

echo "<script>location='index.php?halaman=berita';</script>";
}


 ?>