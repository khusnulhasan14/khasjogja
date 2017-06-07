<br><br><br><br>
<div class="minimal-tinggi">
	<div class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="number" name="telepon" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>
					</div>
					<button class="btn btn-primary" name="daftar">Daftar</button>
				</form>
			</div>
			<div class="col-md-4">
				<div class="alert alert-info">
					<p>Silakan isi form di samping untuk melakukan pendaftaran setelah itu klik daftar, Jika terjadi kendala silakan hubungi admin</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<br>
<?php 
if(isset($_POST['daftar']))
{
	$cek_username = $pelanggan->cek_pelanggan($_POST['email']);
	if($cek_username > 0){
		echo "<script>alert('Email Sudah Terdaftar, Silakan ke Menu Login untuk Login');</script>";
	}else{


	$pelanggan->simpan_pelanggan($_POST["nama"],$_POST["email"],$_POST["password"],$_POST["telepon"],$_POST["alamat"]);

	echo "<script>alert('data telah disimpan');</script>";
	echo "<script>location='index.php?halaman=login';</script>";
	}
	
}
?>