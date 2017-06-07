<h2>Berita</h2>
<hr>
<?php 

// 2. obyek pelanggan menjalankan fungsi tampil_berita();
$databerita=$berita->tampil_berita();
 ?>


<table class="table" id="tabelku">
	
<thead>
	<tr>
		<th>nomor</th>
		<th>judul</th>
		<th>tanggal</th>
		<th>isi</th>
		<th>gambar</th>
		<th>penulis</th>
		<th>aksi</th>
	</tr>
</thead>
<tbody>
<?php foreach ($databerita as $key => $value): ?>
	<tr>
		<td><?php echo $key+=1 ?></td>
		<td><?php echo $value["judul_berita"]; ?></td>
		<td><?php echo $value["tanggal_berita"]; ?></td>
		<td><?php echo $value["isi_berita"]; ?></td>
		<td><?php echo $value["gambar_berita"]; ?></td>
		<td><?php echo $value["penulis_berita"]; ?></td>
		<td>
			<a href="index.php?halaman=ubahberita&id=<?php echo $value["id_berita"]; ?>"  class="btn btn-warning">Ubah</a>
			<a href="index.php?halaman=berita&hapus=<?php echo $value["id_berita"]; ?>" class="btn btn-danger">Hapus</a>
		</td>
	</tr>
<?php endforeach ?>	
</tbody>
</table>

<a href="index.php?halaman=tambahberita" class="btn btn-primary">tambah data</a>


<?php 
if(isset($_GET['hapus']))
{
	$berita->hapus_berita($_GET['hapus']);
	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=berita';</script>";
}

 ?>