<h2>Tambah Pelanggan</h2>
<hr>

<form method="post">
	<div class="form-group">	
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>

	<div class="form-group">
	<label>Email</label>
	<input type="email" name="email" class="form-control">
	</div>

	<div class="form-group">
		
	<label>Password</label>
	<input type="password" name="pass" class="form-control">
	</div>

	<div class="form-group">
		
	<label>Telepon</label>
	<input type="text" name="telp" class="form-control">
	</div>

	<div class="form-group">
		
	<label>Alamat</label>
	<textarea name="alamat" class="form-control"></textarea>
	</div>

	<button type="submit" name="save" class="btn btn-primary">Simpan</button>
</form>

<?php 
// setiap kotak dalam formulir waji dikasih nama
// mengakses inputan manusia diformulir pakai $_POST["namakotak"]
// jika ada tombol save

if(isset($_POST["save"]))
{


//maka obyek pelanggan menjalankan fungsi simpan_pelanggan(data dari formulir)
	$pelanggan->simpan_pelanggan($_POST["nama"],$_POST["email"],$_POST["pass"],$_POST["telp"],$_POST["alamat"]);

// tampilkan pesan dilayar
echo "<script>alert('data telah disimpan');</script>";

// redirect ke tampil pelanggan

echo "<script>location='index.php?halaman=pelanggan';</script>";
}


 ?>