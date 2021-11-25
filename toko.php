<?php

include("koneksi.php");

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = array();
}

if (isset($_GET['id']) && $_GET['id']) {
    $idproduct = $_GET['id'];
} else {
    echo "ID produk belum dipilih";
    exit;
}

$sql = " SELECT *,
(select wa from user where id=id_user) as 'wa',
(select fb from user where id=id_user) as 'fb',
(select ig from user where id=id_user) as 'ig',
(select nama from user where id=id_user) as 'nama_user' FROM produk WHERE id='" . (int) $idproduct . "' ";
$result = $koneksi->query($sql);
$produk = $result->fetch_assoc();




$sql =" SELECT * FROM produk WHERE id_user='".(int)$produk['id_user']."' order by id desc LIMIT 0,18 ";
$result = $koneksi->query($sql);
$produks = array();
 if($koneksi->query($sql)) { 
   while($row = $result->fetch_assoc()) {
     $produks[] = $row;
   }
 } else {
   echo "Query error";
   exit;
 }

?>

<!doctype html>
<html lang="en">
  <head>
    <style>
      body {width: 100%; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}

    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/produk.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Halaman Produk</title>
    <div id="head" class="container"><a id="arrow" href="home.php" class="btn btn" role="button"><i class="bi bi-arrow-left"></i><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></a></div>
  </head>
  <body>
    <div class="container">
     
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
    <h4 class="text-start mt-2"><?php echo $produk['nama_user']; ?></h4>
            </div>
          </div>
          <div id="produk" class="container">
    <h6 class="text-ligh mt-4" >Produk </h6>
  <div class="card-body">
      <div class="row">

      <?php foreach($produks as $produk) { ?>
        <div class="col-4 text-center">
          <a href="produk.php?id=<?php echo $produk['id']; ?>"><img src="<?php echo "produk/".$produk['foto']; ?>" width="100">
          <p style="font-size: 15px;"><?php echo $produk['nama_produk']; ?></p></a>
        </div>
        <?Php } ?>
      </div>
   </div>
   </div>
    </div>
    </div>
    <div id="kandang" class="container">
      <div id="tombol-bawah" class="d-flex justify-content-around">
      <a target="_blank" class="btn btn-outline-width" href="https://wa.me/<?php echo $produk['wa']; ?>"><i class="bi bi-whatsapp"></i></a>
      <a target="_blank" class="btn btn-outline-width" href="<?php echo $produk['fb']; ?>"><i class="bi bi-facebook"></i></a>
      <a target="_blank" class="btn btn-outline-width" href="<?php echo $produk['ig']; ?>"><i class="bi bi-instagram"></i></a>
      </div>
      </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>