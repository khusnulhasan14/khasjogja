<h2>data kategori</h2>
<hr>

<?php 

$datapel=$kategori->tampil_kategori();
?>
	
<table class="table table-striped " >
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>keterangan</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datapel as $key => $value):?>
			<tr>
				<td><?php echo $key+=1 ?></td>
				<td><?php echo $value["nama_kategori"]; ?></td>
				<td><?php echo $value["deskripsi_kategori"]; ?></td>
				<td>
					<a href="index.php?halaman=ubahkategori&id=<?php echo $value['id_kategori']; ?>" class='btn btn-warning'>Ubah</a> 

					<a href="index.php?halaman=kategori&hapus=<?php echo $value['id_kategori']; ?>" class='btn btn-danger'>Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>	
	</tbody>
</table>

<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Data</a>

<?php 

// skrip hapus
// jika (pada url) ada parameter hapus, maka
//  obyek kategori menjalankan fungsi hapus_kategori(id kategori dari url)
if(isset($_GET['hapus']))
{
	$kategori->hapus_kategori($_GET['hapus']);
	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
}

 ?>