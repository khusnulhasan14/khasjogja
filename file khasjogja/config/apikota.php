<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=&province=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: e9bef8d491138318cb79cb5dcc3e7b49"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  // convert json response ke array
  $arraykota = json_decode($response, TRUE);
  // ambil data yg result aja dan simpan di session data kota
  $_SESSION['datakota'] = $arraykota['rajaongkir']['results'];
 
  // echo "<pre>";
  // print_r($_SESSION["datakota"]);
  // echo "</pre>";
}
?>