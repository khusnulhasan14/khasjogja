<br><br><br><br>
<div class="minimal-tinggi">
	<div class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php 
			// jika ada tombol login
			if(isset($_POST['login']))
			{
				// maka obyek pelanggan menjalankna fungsi login_pelanggan(akun dari form)
				$hasil = $pelanggan->login_pelanggan($_POST['email'],$_POST['password']);

				
				// jika hasil sama dengan sukses, maka larikan ke halaman pelanggan
				if($hasil=="sukses")
				{
					echo "<div class='alert alert-info'>Login Sukses</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
				}
				// selain itu (hasil tidak sama dengan sukses), maka larikan ke halaman login
				else
				{
					echo "<div class='alert alert-danger'>Login Gagal</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=login'>";
				}
			}


			 ?>
				<form method="post">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button class="btn btn-primary" name="login">Login</button>
					<br><br><br><br><br><br><br><br><br><br>
				</form>
			</div>
			<div class="col-md-4">
				<div class="alert alert-info">
					<p>Silakan login menggunakan alamat email dan password yang sudah anda daftarkan sebelumnya. <br><br>
					<b>KhasJogja</b>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>