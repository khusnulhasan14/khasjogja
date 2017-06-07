<h2>Ubah Pengaturan</h2>
<hr>

<?php 

// ubah data 2x kerja, a. mengambil data yg mau diubah, b. baru mengubah data


// a. mengambil satu obyek yang mau diubah berdasarkan id pada url
// obyek pelanggan menjalankan fungsi ambil_pelanggan(id_pelanggan)
$datapengaturan = $pengaturan->ambil_pengaturan($_GET['id']);
 ?>

 <form method="post">
 	<div class="form-group">		
 		<label>Nama</label>
 		<input type="text" name="nama" value="<?php echo $datapengaturan['kolom_pengaturan']; ?>" class="form-control">
 	</div>

 	<div class="form-group">
	 	<label>Isi</label>
 		<textarea name="isi" class="form-control" id="editorku"><?php echo $datapengaturan['isi_pengaturan']; ?></textarea>
 	
 	</div>

 	<button name="update" type="submit" class="btn btn-primary">Ubah</button>
 </form>

 <?php 
// jika ada tommbol update,

 if(isset($_POST['update']))
 {
 	$pengaturan->ubah_pengaturan($_POST['nama'],$_POST['isi'],$_GET['id']);
 	echo "<script>alert('Data telah diubah');</script>";
 	echo "<script>location='index.php?halaman=pengaturan'</script>";
 }


  ?>
