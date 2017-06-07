<?php 

// ubah data 2x kerja, a. mengambil data yg mau diubah, b. baru mengubah data


// a. mengambil satu obyek yang mau diubah berdasarkan id pada url
// obyek pelanggan menjalankan fungsi ambil_pelanggan(id_pelanggan)
$datakategori = $kategori->ambil_kategori($_GET['id']);
 ?>

		<h1>Ubah Kategori</h1>

		<form method="post">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" value="<?php echo $datakategori['nama_kategori']; ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea name="keterangan" class="form-control"><?php echo $datakategori['deskripsi_kategori']; ?></textarea>
			</div>
			<button name="update" class="btn btn-primary" value="simpan">Simpan</button>
		</form>
		
	</div>

 <?php 

 if(isset($_POST['update']))
 {
 	$kategori->ubah_kategori($_POST['nama'],$_POST['keterangan'],$_GET['id']);
 	echo "<script>alert('Data telah diubah');</script>";
 	echo "<script>location='index.php?halaman=kategori'</script>";
 }


  ?>