<h2>data produk</h2>
<hr> 

<?php $datapro = $produk->tampil_produk(); ?>



<table class="table" id="tabelku">
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Deskripsi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($datapro as $key => $value): ?>
		
		<tr>
			<td><?php echo $key+=1 ?></td>
			<td><?php echo $value['nama_produk']; ?></td>
			<td><?php echo $value['harga_produk']; ?></td>
			<td><?php echo $value['berat_produk']; ?></td>
			<td><?php echo $value['deskripsi_produk']; ?></td>
			<td>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-warning">Ubah</a>
				<a href="index.php?halaman=produk&hapus=<?php echo $value['id_produk']; ?>" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>


</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah</a>

<?php 
if(isset($_GET['hapus']))
{
	$produk->hapus_produk($_GET['hapus']);
	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}

 ?>