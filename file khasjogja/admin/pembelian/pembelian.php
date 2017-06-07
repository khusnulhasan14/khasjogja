<h2>pelanggan</h2>
<hr>

<?php $beli = $pembelian->tampil_pembelian(); ?>


<table class="table" id="tabelku">
	<thead>
		<tr>
			<th>NO</th>
			<th>Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($beli as $key => $value): ?>
		
		<tr>
			<td><?php echo $key+=1 ?></td>
			<td><?php echo $value['nama_pelanggan']; ?></td>
			<td><?php echo $value['tanggal_pembelian']; ?></td>
			<td><?php echo $value['status_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detailpembelian&idp=<?php echo $value['id_pembelian']; ?>" class="btn btn-info">Detail</a>
				<a href="index.php?halaman=pembayaran&idp=<?php echo $value['id_pembelian']; ?>" class="btn btn-success">Konfirmasi</a>
				
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>


</table>