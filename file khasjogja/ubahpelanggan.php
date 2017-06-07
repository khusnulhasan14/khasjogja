<br><br><br>
<div class="container"><h2>Ubah Pelanggan</h2></div>
<hr>

<?php 

// ubah data 2x kerja, a. mengambil data yg mau diubah, b. baru mengubah data


// a. mengambil satu obyek yang mau diubah berdasarkan id pada url
// obyek pelanggan menjalankan fungsi ambil_pelanggan(id_pelanggan)
$idp = $_SESSION['pelanggan']['id_pelanggan'];
$datapel = $pelanggan->ambil_pelanggan($idp);
?>

<div class="minimal-tinggi">
	<div class="pelanggan">
	<div class="container">
		<form method="post">
			<div class="form-group">		
				<label>Nama</label>
				<input type="text" name="nama" value="<?php echo $datapel['nama_pelanggan']; ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $datapel['email_pelanggan']; ?>" class="form-control" readonly>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" value="<?php echo $datapel['password_pelanggan']; ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>Telepon</label>
				<input type="text" name="telp" value="<?php echo $datapel['telepon_pelanggan']; ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control"><?php echo $datapel['alamat_pelanggan']; ?></textarea>
			</div>
			<button name="update" type="submit" class="btn btn-primary">Ubah</button>
		</form>
	</div>
</div>
</div>

<?php 
// jika ada tommbol update,

 // maka obyek pelanggan menjalankan fungsi ubah_pelanggan(data dari form berdasarkan id pada url)
if(isset($_POST['update']))
{
	$pelanggan->ubah_pelanggan($_POST['nama'],$_POST['email'],$_POST['password'],$_POST['telp'],$_POST['alamat'],$idp);
	echo "<script>alert('Data telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan'</script>";
}


?>