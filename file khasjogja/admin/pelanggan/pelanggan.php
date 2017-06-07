<h2>Data Pelanggan</h2>
<hr>
<?php 

// 2. obyek pelanggan menjalankan fungsi tampil_pelanggan();
$datapel=$pelanggan->tampil_pelanggan();
 ?>


<table class="table" id="tabelku">
	
<thead>
	<tr>
		<th>nomor</th>
		<th>nama</th>
		<th>email</th>
		<th>password</th>
		<th>telepon</th>
		<th>alamat</th>
		<th>aksi</th>
	</tr>
</thead>
<tbody>
<?php foreach ($datapel as $key => $value): ?>
	<tr>
		<td><?php echo $key+=1 ?></td>
		<td><?php echo $value["nama_pelanggan"]; ?></td>
		<td><?php echo $value["email_pelanggan"]; ?></td>
		<td><?php echo $value["password_pelanggan"]; ?></td>
		<td><?php echo $value["telepon_pelanggan"]; ?></td>
		<td><?php echo $value["alamat_pelanggan"]; ?></td>
		<td>
			<a href="index.php?halaman=ubahpelanggan&id=<?php echo $value["id_pelanggan"]; ?>"  class="btn btn-warning">Ubah</a>
			<a href="index.php?halaman=pelanggan&hapus=<?php echo $value["id_pelanggan"]; ?>" class="btn btn-danger">Hapus</a>
		</td>
	</tr>
<?php endforeach ?>	
</tbody>
</table>

<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">tambah data</a>


<?php 

// skrip hapus
// jika (pada url) ada parameter hapus, maka
//  obyek pelanggan menjalankan fungsi hapus_pelanggan(id pelanggan dari url)
if(isset($_GET['hapus']))
{
	$pelanggan->hapus_pelanggan($_GET['hapus']);
	echo "<script>alert('Data telah dihapus');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}

 ?>