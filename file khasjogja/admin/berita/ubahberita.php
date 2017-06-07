<h2>Ubah Berita</h2>
<hr>

<?php $databerita = $berita->ambil_berita($_GET['id']); ?>


<form method="post" enctype="multipart/form-data">
	<div class="form-group">	
		<label>Judul</label>
		<input type="text" name="nama" value="<?php echo $databerita['judul_berita']; ?>" class="form-control">
	</div>

	<div class="form-group">	
		<label>Tanggal</label>
		<input type="date" name="tanggal" value="<?php echo $databerita['tanggal_berita']; ?>" class="form-control">
	</div>

	<div class="form-group">

		<label>Isi</label>
		<textarea class="form-control" name="isi" value="<?php echo $databerita['isi_berita']; ?>" ></textarea>
	</div>

	<div class="form-group">
		<img src="../assets/foto_berita/<?php echo $databerita['gambar_berita']; ?>" width="200">
	</div>

	<div class="form-group">	
		<label>Foto</label>
		<input type="file" name="foto" value="<?php echo $databerita['gambar_berita']; ?>" class="form-control">
	</div>
	
	<div class="form-group">	
		<label>penulis</label>
		<input type="text" name="penulis" value="<?php echo $databerita['penulis_berita']; ?>" class="form-control">
	</div>

	<button type="submit" name="update" class="btn btn-primary">Ubah</button>
</form>

<?php 
// jika ada tommbol update,

 if(isset($_POST['update']))
 {
 	$berita->ubah_berita($_POST['nama'],$_POST['tanggal'],$_POST['isi'],$_FILES['foto'],$_POST['penulis'],$_GET['id']);
 	echo "<script>alert('Data telah diubah');</script>";
 	echo "<script>location='index.php?halaman=berita'</script>";
 }

	?>
	