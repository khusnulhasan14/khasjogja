<!-- bootstrap hanyalah css dan javascript yang sudah jadi
yang tinggal kita pakai di html kita, dptnya di getbootstrap.com
di folder css/bootstrap.css
javascript itu sesuatu yang bisa menggerakkan html di browser
-->
<?php include 'config/class.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>KhasJogja - Oleh Oleh Khas Jogja</title>
<!-- 	<meta content="<?php echo $pengaturan->isi_pengaturan("seo_deskripsi"); ?>" name="description"/>
	<meta content="<?php echo $pengaturan->isi_pengaturan("seo_keyword"); ?>" name="keywords" />  -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700|Bree+Serif|Ubuntu|Titillium+Web|Abel" rel="stylesheet"> 
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/font-awesome.css">
	<link href="admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/sendiri.css">
</head>
<body
<!-- getboostrap.com menu components bagian navbar sub default-navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top navbarku">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="judul"><a href="index.php">Khas<span class="logo">Jogja</span></div></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?halaman=kategori&id=3">Makanan</a></li>
						<li><a href="index.php?halaman=kategori&id=4">Miniatur</a></li>
						<li><a href="index.php?halaman=kategori&id=5">Sendal</a></li>
						<li><a href="index.php?halaman=kategori&id=6">Batik</a></li>
						<li><a href="index.php?halaman=kategori&id=7">Aksesoris Pakaian</a></li>
						<li><a href="index.php?halaman=kategori&id=8">Pakaian</a></li>
					</ul>
				</li>

				<li><a href="index.php?halaman=produk">Semua Produk</a></li>

			</ul>
			<form class="navbar-left" method="post" action="index.php?halaman=pencarian">
				<div class="form-group">
					<input type="text" class="cari" placeholder="Search" name="katakunci">
					<a href="index.php?halaman=pencarian"><span class="glyphicon glyphicon-search tombol-cari" aria-hidden="true"></span></a>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<!-- jika belum login, tdk ada session pelanggan -->
				<?php if (!isset($_SESSION['pelanggan'])): ?>	
					<li><a href="index.php?halaman=login">Login</a></li>
					<li><a href="index.php?halaman=daftar">Daftar</a></li>
				<?php endif ?>

				<!-- jika sudah belanja, ada session keranjang -->
				<?php if (isset($_SESSION['keranjang'])): ?>	
					<li><a href="index.php?halaman=keranjang">Keranjang</a></li>
					<li><a href="index.php?halaman=checkout">Check Out</a></li>
				<?php endif ?>

				<!-- <li><a href="index.php?halaman=berita">Berita</a></li> -->

				<!-- jika sudah login ada session pelanggan -->
				<?php if (isset($_SESSION['pelanggan'])): ?>
					<li><a href="index.php?halaman=pelanggan">Pelanggan</a></li>
					<li><a href="index.php?halaman=logout">Logout</a></li>
				<?php endif ?>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


<?php 
	// jika ada parameter halaman
if(isset($_GET['halaman']))
{
	if($_GET['halaman']=="produk")
	{
		include 'produk.php';
	}
	elseif ($_GET['halaman']=="detailproduk") 
	{
		include 'detailproduk.php';
	}
	elseif ($_GET['halaman']=="keranjang")
	{
		include 'keranjang.php';
	}
	elseif ($_GET['halaman']=="checkout") 
	{
		include 'checkout.php';
	}
	elseif ($_GET['halaman']=="login")
	{
		include 'login.php';
	}
	elseif ($_GET['halaman']=="daftar")
	{
		include 'daftar.php';
	}
	elseif ($_GET['halaman']=="berita")
	{
		include 'berita.php';
	}
	elseif ($_GET['halaman']=="pelanggan") 
	{
		include 'pelanggan.php';
	}
	elseif ($_GET['halaman']=="kategori")
	{
		include 'kategori.php';
	}
	elseif ($_GET['halaman']=="beli")
	{
		include 'beli.php';
	}
	elseif ($_GET['halaman']=="nota") 
	{
		include 'nota.php';
	}
	elseif ($_GET['halaman']=="pembayaran") 
	{
		include 'pembayaran.php';
	}
	elseif ($_GET['halaman']=="pencarian") 
	{
		include 'pencarian.php';
	}
	elseif ($_GET['halaman']=="ubahpelanggan") 
	{
		include 'ubahpelanggan.php';
	}
	elseif ($_GET['halaman']=="hapus_keranjang") 
	{

		echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		$keranjang->hapus_keranjang($_GET['id']);
		echo "<div class='alert alert-danger'>Data telah dihapus dari keranjang</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=keranjang'>";
	}
	elseif ($_GET['halaman']=="logout")
	{
		echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		session_destroy();
		echo "<div class='alert alert-danger'>Anda telah logout</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php'>";

	}

}

	// selain itu(gk ada parameter halaman)
else
{
	include 'home.php';
}
?>


<!-- footer -->
<footer>
	<div class="container">
		<p>KhasJogja &copy; 2017 | KhusnulHasan & Team</p>
	</div>
</footer>
<!-- akhir footer -->

<!-- getboostrap.com menu getting-starter bagian basic-template -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="admin/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function () {
		$('#tabelku').dataTable();
	});
</script>
</body>
</html>



