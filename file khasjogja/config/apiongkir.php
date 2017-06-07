<?php
error_reporting(0);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=501&destination=$id_kota&weight=$totalberat&courier=$ekspedisi",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: e9bef8d491138318cb79cb5dcc3e7b49"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 
else 
{
  // echo $response; data masih json
  // harus di convert ke array dan simpan ke session paket
  $_SESSION['ongkir'] = json_decode($response, TRUE);

  // mendapatkan daftar paket tersedia dari ongkir yg dipilih(tiki,pos,jne)
  $datapaket = $_SESSION['ongkir']['rajaongkir']['results']['0']['costs'];
  
  // mendapatkan alamat tujuan dari api
  $alamat = $_SESSION['ongkir']['rajaongkir']['destination_details'];
  // outputnya tipe namakota provinsi kodepos
  // outputnya kota bekasi jawabarat 17121
  $alamat_pembelian = $alamat['type']." ".$alamat['city_name']." ".$alamat['province']." ".$alamat['postal_code'];

  // mendapatkan nama ekspedisi beserta paket pengiriman yg dipilih
  $eks = $_SESSION['ongkir']['rajaongkir']['results']['0']['name'];
  $pak = $_SESSION['ongkir']['rajaongkir']['results']['0']['costs'][$keypaket]['service'];
  $waktu = $_SESSION['ongkir']['rajaongkir']['results']['0']['costs'][$keypaket]['cost']['0']['etd'];
  // outputnya pt pos indonesia surat kilat khusus 5 hari
  $ekspedisi_pembelian =  $eks." ".$pak." ".$waktu." Hari";

  // mendapatkan biaya berdasarkan paket/keypaket yg dipilih
  // outputnya 10000
  $ongkir_pembelian = $_SESSION['ongkir']['rajaongkir']['results']['0']['costs'][$keypaket]['cost']['0']['value'];

  // ingat kalau bingung tinggal print_r($_SESSION['ongkir']), lalu di pre
  // echo "<pre>";
  // print_r($_SESSION['ongkir']);
  // echo "</pre>";
}

?>