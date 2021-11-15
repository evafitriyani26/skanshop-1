<?php
 $koneksi= mysqli_connect('localhost', 'root', '', 'skanshop');
 if(!$koneksi){
     echo "koneksi Gagal";
 }
?>

<?php

$tampil = mysqli_query($koneksi, "SELECT * FROM produk WHERE ");
$data = mysqli_fetch_array($tampil);
  if($data)
  {
?>