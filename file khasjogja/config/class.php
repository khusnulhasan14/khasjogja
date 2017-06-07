<?php 
session_start(); 
	//crud dengan php metode oop 

// php adalah bahsa pemrograman
// mysql adalah bahasa database
// php dan mysql adalah kedua hal berbeda
// agar php dapat meng CRUD di mysql php harus membangun script koneksi
// skri penghubung dari php ke mysql agar bisa CRUD

//mysql memberi syarat yg mau kone ke mysql, 4 syarat
// host,user,password,namadatabase



//membuat objek mysqli dengan 4 syarat tadi
// sebagai scirpt penghubung php ke mysql

$mysqli=new mysqli("localhost","root","","tugas_imk");


//php CRUD data 
class pelanggan
{
	
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	// 1. membuat fungsi tampil pelanggan dari database
	function tampil_pelanggan()
	{
		// 1. mengambil data pelanggan dari tabel pelanggan
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan");
		// 2. memcah data ke array agarbisa digunakan id perulangan
		while($pecah=$ambil->fetch_assoc())
		{
			// 3. menyimpan data setiap perulangan ke array yang besar (tas)
			$data[]=$pecah;
		}
		// 4. mengembalikan nilai krn datanya mau dipakai ditempat lain
		return $data;
	}
	function simpan_pelanggan($nama,$email,$password,$telp,$alamat)	
	{
			// query menyimpan data pelanggan ke tampil pelanggan
			$this->koneksi->query("INSERT INTO pelanggan(nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES('$nama','$email','$password','$telp','$alamat')");
	}
	function hapus_pelanggan($id)
	{
		// query menghapus data pelanggan yang id_pelanggan nya adalah si $id
		$this->koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id'");
	}
	function ambil_pelanggan($id)
	{
		// query ambil 1 data pelanggan tergantung id
		$ambil=$this->koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
		// memecah ke array
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	} 



	function cek_pelanggan($email)
	{
		// query ambil 1 data pelanggan tergantung id
		$ambil=$this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
		// memecah ke array
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}


	function ubah_pelanggan($nama,$email,$password,$telp,$alamat,$id)
	{
		// ubah data berdasarkan id_pelanggan = $id
		$this->koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama',email_pelanggan='$email'
			,password_pelanggan='$password',telepon_pelanggan='$telp',alamat_pelanggan='$alamat' WHERE id_pelanggan='$id'");
	}
	function login_pelanggan($email,$password)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
		$yangcocok = $ambil->num_rows;
		if($yangcocok > 0)
		{
			$pecah = $ambil->fetch_assoc();
			$_SESSION['pelanggan'] = $pecah;
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}	

} 
class kategori
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	
		function tampil_kategori()
		{
			$ambil = $this->koneksi->query("SELECT * FROM kategori");

			while($pecah=$ambil->fetch_assoc())
			{
				$data[]=$pecah;
			}

			return $data;
		}

		function hapus_kategori($id)
		{
			$this->koneksi->query("DELETE FROM kategori WHERE id_kategori='$id'");
		}
		function simpan_kategori($nama,$keterangan)
		{
			$this->koneksi->query("INSERT INTO kategori(nama_kategori,deskripsi_kategori) VALUES ('$nama','$keterangan')");
		}
		function ambil_kategori($id)
		{

		$ambil=$this->koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id'");
		
		$pecah=$ambil->fetch_assoc();
		return $pecah;
		}
		function ubah_kategori($nama,$keterangan,$id)
		{
			$this->koneksi->query("UPDATE kategori SET nama_kategori='$nama',deskripsi_kategori='$keterangan' WHERE id_kategori='$id'");
		}

		
}
class pengaturan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_pengaturan()
	{
		// 1. mengambil data pelanggan dari tabel pelanggan
		$ambil = $this->koneksi->query("SELECT * FROM pengaturan");
		// 2. memcah data ke array agarbisa digunakan id perulangan
		while($pecah=$ambil->fetch_assoc())
		{
			// 3. menyimpan data setiap perulangan ke array yang besar (tas)
			$data[]=$pecah;
		}
		// 4. mengembalikan nilai krn datanya mau dipakai ditempat lain
		return $data;
	}
	function hapus_pengaturan($id)
	{
		$this->koneksi->query("DELETE FROM pengaturan WHERE id_pengaturan='$id'");
	}
	function simpan_pengaturan($nama,$isi)	
	{
			// query menyimpan data pengaturan ke tampil pengaturan
			$this->koneksi->query("INSERT INTO pengaturan(kolom_pengaturan,isi_pengaturan) VALUES('$nama','$isi')");
	}
	function ambil_pengaturan($id)
	{

		$ambil=$this->koneksi->query("SELECT * FROM pengaturan WHERE id_pengaturan='$id'");
		
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function ubah_pengaturan($nama,$isi,$id)
	{
		$this->koneksi->query("UPDATE pengaturan SET kolom_pengaturan='$nama',isi_pengaturan='$isi' WHERE id_pengaturan='$id'");
	}
	function isi_pengaturan($namakolom)
	{
		// mengambil data pengaturan berdasarkan kolom pengaturan
		$ambil = $this->koneksi->query("SELECT * FROM pengaturan WHERE kolom_pengaturan='$namakolom'");
		$pecah = $ambil->fetch_assoc();
		return $pecah['isi_pengaturan'];
	}
}
class berita
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function tampil_berita()
	{
		
		$ambil = $this->koneksi->query("SELECT * FROM berita");
		
		while($pecah=$ambil->fetch_assoc())
		{
		
			$data[]=$pecah;
		}
		
		return $data;
	}
	function hapus_berita($id)
	{
		$this->koneksi->query("DELETE FROM berita WHERE id_berita='$id'");
	}
	function ambil_berita($id)
	{

		$ambil=$this->koneksi->query("SELECT * FROM berita WHERE id_berita='$id'");
		
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function simpan_berita($nama,$tanggal,$isi,$foto,$penulis)	
	{
		// 1. mengambil nama file nya utk disimpan di tabel
		$namafoto=$foto['name'];

		// 2. mengambil lokasi filenya, utk di upload ke assets/foto_berita
		$lokasifoto=$foto['tmp_name'];

		// 3. mengupload dr lokasi ke assets/foto_berita/namafoto.jpg
		move_uploaded_file($lokasifoto, "../assets/foto_berita/$namafoto");

		// 4. disimpan di tabel produk pada db
		$this->koneksi->query("INSERT INTO berita (judul_berita,tanggal_berita,isi_berita,gambar_berita,penulis_berita) VALUES('$nama','$tanggal','$isi','$namafoto','$penulis')");
	}
	function ubah_berita($nama,$tanggal,$isi,$foto,$penulis,$id)
	{
		// 1. mengambil namafile
		$namafoto=$foto['name'];

		// 2. mengambil lokasi file
		$lokasifoto=$foto['tmp_name'];
		
		// 3. jika tidak kosong lokasifile(foto diganti)
		if(!empty($lokasifoto))
		{
			// a. mengupload foto yg baru
			move_uploaded_file($lokasifoto, "../assets/foto_berita/$namafoto");

			// b. query ubah data termasuk foto
			$this->koneksi->query("UPDATE berita SET judul_berita='$nama',tanggal_berita='$tanggal',isi_berita='$isi',gambar_berita='$namafoto',penulis_berita='$penulis' WHERE id_berita='$id'");
		}
		else
		{
			// b. query ubah data tidak termasuk foto
			$this->koneksi->query("UPDATE berita SET judul_berita='$nama',tanggal_berita='$tanggal',isi_berita='$isi',gambar_berita='$namafoto',penulis_berita='$penulis' WHERE id_berita='$id'");
		}
	}
	
}
class pembelian
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;

	}
	function tampil_pembelian()
	{
		// select from * tabelA join tabelB
		//  ON tabelA.kolomygsama = tabelB.kolomygsama
		$ambil=$this->koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan order by pembelian.tanggal_pembelian desc");
		while($pecah=$ambil->fetch_assoc())
		{
			$data[]=$pecah;
		}
		return $data;
	}
	function ambil_pembelian($idp)
	{
		$ambil=$this->koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$idp'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function ambil_pembelian_detail($idp)
	{
		$ambil=$this->koneksi->query("SELECT * FROM pembelian_detail WHERE id_pembelian='$idp'");
		while($pecah=$ambil->fetch_assoc())
		{
			$data[]=$pecah;
		}
		return $data;
	}
	function tampil_pembelian_pelanggan($idpl) 
	{
		$data = array();
		// mengambil data pembelian si pelanggan yg login
		$ambil = $this->koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pelanggan='$idpl' order by pembelian.tanggal_pembelian desc");
		while($pecah = $ambil->fetch_assoc())
		{
			$data[]=$pecah;
		}
		return $data;
	}
	function simpan_pembayaran($idpem,$tanggal,$bukti,$jumlah,$keterangan)
	{
		// memasukkan data ke tabel pembayaran
		// mengambil namafile
		$namafile=$bukti['name'];
		// mengambil lokasi file
		$lokasifile=$bukti['tmp_name'];
		// mengupload
		move_uploaded_file($lokasifile, "admin/assets/foto_pembayaran/$namafile");
		// menyimpan data di database
		$this->koneksi->query("INSERT INTO pembayaran (id_pembelian,tanggal_pembayaran,bukti_pembayaran,jumlah_pembayaran,keterangan_pembayaran) VALUES ('$idpem','$tanggal','$namafile','$jumlah','$keterangan')");

		// mengubah status_pembelian menjadi sudah konfirmasi yg id_pembelian itu($idpem)
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='sudah konfirmasi' WHERE id_pembelian='$idpem'");
	}
	function simpan_pembelian($idp,$totalbelanja,$ongkir,$totalbayar,$alamat_penerima,$ekspedisi,$alamat_pembelian)
	{
		$tgl = date("Y-m-d H:i:s"); // mendapatkan tanggal saat ini / tanggal pembelian
		// 1. menyimpan ke tabel pembelian
		$this->koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian,ongkir_pembelian,total_bayar,alamat_penerima,ekspedisi_pembelian,alamat_pembelian,status_pembelian) VALUES ('$idp','$tgl','$totalbelanja','$ongkir','$totalbayar','$alamat_penerima','$ekspedisi','$alamat_pembelian','pending')");

		$idpt = $this->koneksi->insert_id; // 2. mendapatkan id pembelian terakhir
		
		// 3. menyimpan data pembelian_detail dari keranjang
		$keranjang = new keranjang($this->koneksi); // a. instance keranjang disini
		$belanjaan = $keranjang->tampil_keranjang(); // b. jalankan fungsi tampil_keranjang
		// diperulangkan sebanyak belanjaan/produk di keranjang belanjaan
		foreach ($belanjaan as $key => $value) 
		{
			// ini diperulangkan per produk
			$this->koneksi->query("INSERT INTO pembelian_detail(id_pembelian,id_produk,nama_beli,harga_beli,berat_beli,jumlah_beli,subtotal_beli) VALUES ('$idpt','$value[id_produk]','$value[nama_produk]','$value[harga_produk]','$value[berat_produk]','$value[jumlah]','$value[subtotal]')");
		}
		unset($_SESSION['keranjang']); // kosongkan keranjang belanja krn sudah disimpan
		return $idpt; // me return id_pembelian terakhir
	}
	function ambil_pembayaran($id)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
	function lunas_pembelian($idp)
	{
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='lunas' WHERE id_pembelian='$idp'");
	}

}
class produk
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;

	}
	function tampil_produk($posisi=0,$batas=99999999)
	{
		// select from * tabelA join tabelB
		//  ON tabelA.kolomygsama = tabelB.kolomygsama
		$ambil=$this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY produk.id_produk DESC LIMIT $posisi,$batas");
		while($pecah=$ambil->fetch_assoc())
		{
			$data[]=$pecah;
		}
		return $data;
	}
	function simpan_produk($id_kategori,$nama,$berat,$harga,$foto,$deskripsi)
	{
		// 1. mengambil nama file nya utk disimpan di tabel
		$namafoto=$foto['name'];

		// 2. mengambil lokasi filenya, utk di upload ke assets/foto_produk
		$lokasifoto=$foto['tmp_name'];

		// 3. mengupload dr lokasi ke assets/foto_produk/namafoto.jpg
		move_uploaded_file($lokasifoto, "../assets/foto_produk/$namafoto");

		// 4. disimpan di tabel produk pada db
		$this->koneksi->query("INSERT INTO produk (id_kategori,nama_produk,harga_produk,berat_produk,deskripsi_produk,foto_produk) VALUES('$id_kategori','$nama','$berat','$harga','$deskripsi','$namafoto')");
	}
	function ambil_produk($idp)
	{
		$ambil = $this->koneksi->query("SELECT * FROM produk WHERE id_produk ='$idp'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function ubah_produk($idk,$nama,$berat,$harga,$foto,$deskripsi,$idp)
	{
		// 1. mengambil namafile
		$namafoto=$foto['name'];

		// 2. mengambil lokasi file
		$lokasifoto=$foto['tmp_name'];
		
		// 3. jika tidak kosong lokasifile(foto diganti)
		if(!empty($lokasifoto))
		{
			// a. mengupload foto yg baru
			move_uploaded_file($lokasifoto, "../assets/foto_produk/$namafoto");

			// b. query ubah data termasuk foto
			$this->koneksi->query("UPDATE produk SET id_kategori='$idk',nama_produk='$nama',berat_produk='$berat',harga_produk='$harga',foto_produk='$namafoto',deskripsi_produk='$deskripsi' WHERE id_produk='$idp'");
		}
		else
		{
			// b. query ubah data tidak termasuk foto
			$this->koneksi->query("UPDATE produk SET id_kategori='$idk',nama_produk='$nama',berat_produk='$berat',harga_produk='$harga',deskripsi_produk='$deskripsi' WHERE id_produk='$idp'");
		}
	}
	function hapus_produk($idp)
	{
		$this->koneksi->query("DELETE FROM produk WHERE id_produk='$idp'");
	}
	function tampil_produk_kategori($idk,$posisi=0,$batas=99999)
	{
		$data=array();
		// menampilkan produk yg id_kategori nya adalah itu/$idk
		$ambil=$this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE kategori.id_kategori='$idk' ORDER BY produk.id_produk DESC LIMIT $posisi,$batas");
		while($pecah=$ambil->fetch_assoc())
		{
			$data[]=$pecah;
		}
		return $data;
	}
	function cari_produk($katakunci)
	{
		$data=array();
		// menampilkan produk yg id_kategori nya adalah itu/$idk
		$ambil=$this->koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$katakunci%' OR deskripsi_produk LIKE '%$katakunci%'");
		while($pecah=$ambil->fetch_assoc())
		{
			$data[]=$pecah;
		}
		return $data;	
	}

}
class admin
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function login_admin($email,$password)
	{
		// mencocokkan data apa ada di tabel admin dngan email dan password itu
		$ambil=$this->koneksi->query("SELECT * FROM admin WHERE email_admin='$email' AND password_admin='$password'");
		
		// menghitung data yg cocok
		$yangcocok=$ambil->num_rows;

		// jika yg cocok lebih besar dari 0 (akun ada, akun benar)maka login beanr
		if($yangcocok>0)
		{
			// a. memecah akun
			$pecah=$ambil->fetch_assoc();
			
			// b. mendaftarkan/menyimpan ke session
			$_SESSION['admin']=$pecah;

			return "benar";
		}
		else
		{
			return "salah";
		}
	}
}
class keranjang
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function tambah_produk($idp,$jumlah)
	{
		$_SESSION['keranjang'][$idp]= $jumlah;
	}
	function tampil_keranjang()
	{	
		$data=array();
		// $_SESSION['keranjang'][id_produk] = jumlah
		foreach ($_SESSION['keranjang'] as $idp => $jumlah) 
		{
			// mengambil 1 data produk berdasarkan idp
			$ambil=$this->koneksi->query("SELECT * FROM produk WHERE id_produk='$idp'");
			$pecah=$ambil->fetch_assoc();
			// memasukkan jumlah ke barisan array data produk
			$pecah['jumlah'] =$jumlah;
			// memasukkan subtotal ke barisan array data produk
			// subtotal didapat dari harga produk dikali jumlah
			$pecah['subtotal']=$pecah['harga_produk'] * $pecah['jumlah'];

			// simpan dalam 1 aray besar
			$data[]=$pecah;
		}
		return $data;
	}
	function hapus_keranjang($id)
	{
		// membuang data dari session yang id_produk nya itu 
		unset($_SESSION['keranjang'][$id]);
	}
}

$keranjang = new keranjang($mysqli);
$produk = new produk($mysqli);
$admin = new admin($mysqli);
$pembelian = new pembelian($mysqli);
$berita = new berita($mysqli);
$pelanggan = new pelanggan($mysqli);
$kategori = new kategori($mysqli);
$pengaturan = new pengaturan($mysqli);
?>