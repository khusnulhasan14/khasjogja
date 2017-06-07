<h2>Ubah Pelanggan</h2>
<hr>

<?php 

// ubah data 2x kerja, a. mengambil data yg mau diubah, b. baru mengubah data


// a. mengambil satu obyek yang mau diubah berdasarkan id pada url
// obyek pelanggan menjalankan fungsi ambil_pelanggan(id_pelanggan)
$datapel = $pelanggan->ambil_pelanggan($_GET['id']);
 ?>

 <form method="post">
 	<div class="form-group">		
 		<label>Nama</label>
 		<input type="text" name="nama" value="<?php echo $datapel['nama_pelanggan']; ?>" class="form-control">
 	</div>

 	<div class="form-group">
	 	<label>Email</label>
 		<input type="email" name="email" value="<?php echo $datapel['email_pelanggan']; ?>" class="form-control">
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

 <?php 
// jika ada tommbol update,

 // maka obyek pelanggan menjalankan fungsi ubah_pelanggan(data dari form berdasarkan id pada url)
 if(isset($_POST['update']))
 {
 	$pelanggan->ubah_pelanggan($_POST['nama'],$_POST['email'],$_POST['password'],$_POST['telp'],$_POST['alamat'],$_GET['id']);
 	echo "<script>alert('Data telah diubah');</script>";
 	echo "<script>location='index.php?halaman=pelanggan'</script>";
 }


  ?>