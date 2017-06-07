<br><br><br>
<div class="minimal-tinggi">
	<?php 
// jika kosong id_produk atau kosong jumlah, maka dilarikan ke index
	if(empty($_POST['id_produk']) OR empty($_POST['jumlah']))
	{
		echo "<script>location='index.php';</script>";
	}
// disini ada id_produk dan jumlahdari formulir, masukkan ke keranjang belanja
// obyek keranjang menjalankan fungsi tambah_produk
	$keranjang->tambah_produk($_POST['id_produk'],$_POST['jumlah']);
	?>

	<div class="alert alert-info">Produk sudah dimasukkan ke keranjang belanja</div>
	<meta http-equiv="refresh" content="1;url=index.php?halaman=keranjang">
</div>