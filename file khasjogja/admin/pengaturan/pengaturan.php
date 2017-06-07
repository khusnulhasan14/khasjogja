<h2>pengaturan</h2>
<hr>
<?php 

// 2. obyek berita menjalankan fungsi tampil_pelanggan();
$datapengaturan=$pengaturan->tampil_pengaturan();
 ?>


<table class="table">
	
<thead>
	<tr>
		<th>nomor</th>
		<th>nama</th>
		<th>isi</th>
		<th>aksi</th>
	</tr>
</thead>
<tbody>
<?php foreach ($datapengaturan as $key => $value): ?>
	<tr>
		<td><?php echo $key+=1 ?></td>
		<td><?php echo $value["kolom_pengaturan"]; ?></td>
		<td><?php echo $value["isi_pengaturan"]; ?></td>
		<td>
			<a href="index.php?halaman=ubahpengaturan&id=<?php echo $value["id_pengaturan"]; ?>"  class="btn btn-warning">Ubah</a>
			<a href="index.php?halaman=pengaturan&hapus=<?php echo $value["id_pengaturan"]; ?>" class="btn btn-danger">Hapus</a>
		</td>
	</tr>
<?php endforeach ?>	
</tbody>
</table>

<a href="index.php?halaman=tambahpengaturan" class="btn btn-primary">tambah data</a>


<?php 

// skrip hapus
// jika (pada url) ada parameter hapus, maka
//  obyek pelanggan menjalankan fungsi hapus_pelanggan(id pelanggan dari url)
if(isset($_GET['hapus']))
{
	$pengaturan->hapus_pengaturan($_GET['hapus']);
	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=pengaturan';</script>";
}

 ?>

 