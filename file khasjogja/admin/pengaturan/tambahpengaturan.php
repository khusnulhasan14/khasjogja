<h2>Tambah Pengaturan</h2>
<hr>

<form method="post">
	<div class="form-group">	
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	
	<div class="form-group">
<!-- 	<label>Isi</label>
	<input type="text" name="isi" class="form-control"> -->
	<textarea name="isi" class="form-control" id="editorku">Isi</textarea>
	</div>

	<button type="submit" name="save" class="btn btn-primary">Simpan</button>
</form>

<?php 
// setiap kotak dalam formulir waji dikasih nama
// mengakses inputan manusia diformulir pakai $_POST["namakotak"]
// jika ada tombol save

if(isset($_POST["save"]))
{


//maka obyek pelanggan menjalankan fungsi simpan_pengaturan(data dari formulir)
	$pengaturan->simpan_pengaturan($_POST["nama"],$_POST["isi"]);

// tampilkan pesan dilayar
echo "<script>alert('data telah disimpan');</script>";

// redirect ke tampil pelanggan

echo "<script>location='index.php?halaman=pengaturan';</script>";
}


 ?>