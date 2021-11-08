<?php

 //koneksi Database
 $server= "localhost";
 $userDB= "root";
 $pass= "";
 $database= "skanshop";

 $koneksi= mysqli_connect($server, $userDB, $pass, $database)or die(mysqli_error($koneksi));
session_start();
if(empty($_SESSION['user'])) {
  header("location: index.php?status=gagal");
}else{
  $user = $_SESSION['user'];
}

if(isset($_GET['id']) && $_GET['id']) {
  $idproduct = $_GET['id'];
} else {
  echo "ID produk belum dipilih";
  exit;
}
 
$sql =" SELECT * FROM produk WHERE id='$idproduct' ";
$result = $koneksi->query($sql);
$produk =  $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">
  <head>
    <style>
      body {width: 200vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
      
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="produk.css">
    <title>Halaman Produk</title>
    <div id="head" class="container"><a id="arrow" href="home-page.html" class="btn btn" role="button"><i class="bi bi-arrow-left"></i><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></a></div>
  </head>
  <body>
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
        <div class="col-12 text-center">
          <img src="<?php echo "produk/".$produk['foto']; ?>" width="100">
          <p style="font-size: 15px;"><?php echo $produk['nama_produk']; ?></p>
          <p style="font-size: 15px;">
        </div>
      
          </div>
        </div>
    </div>
    <div class="card text-center " style="width: 22">
      <ul class="list-group list-group-flush">
        <li class="list-group-item ">NAMA PRODUK</p><?php echo $produk['nama_produk']; ?></li>
            </ul>
            </div>
        <div class="card text-center mt-3" style="width: 22">
      <ul class="list-group list-group-flush">
        <li class="list-group-item" >HARGA PRODUK</p><?php echo $produk['harga_produk']; ?></li>
      </ul>
    </div>
    </div>
    <div id="produk" class="container">
    <h6 class="text-ligh mt-4" >Pilihan Toko</h6>
  <div class="card-body">
    <div class="row">
      <div class="col-4 text-center">
        <a href="produk1.html"><img src="eat.png" width="80" height="80">
        <p style="font-size: 8px;">Makanan</p></a>
      </div>
      <div class="col-4 text-center">
        <a href="produk1.html"><img src="hotdog 2.png"width="80" height="80">
        <p style="font-size: 8px;">Makanan</p></a>
      </div>
       <div class="col-4 text-center">
        <a href="produk1.html"><img src="makanan2.png" width="80" height="80">
        <p style="font-size: 8px;">Makanan</p></a>
      </div>
        </div>
   </div>
   </div>
    <div id="satu" class="container"><div class="text-start">
      <p class="fw-bold">
        Deskripsi Item
        </p>
        <p class="lead">
        <?php echo $produk['deskripsi']; ?>
          </p>
        
            </div>
          </div>
    </div>
    </div>
    <div id="kandang" class="container">
      <div id="tombol-bawah" class="d-flex justify-content-around">
      <button class="btn btn-outline-width" type="submit"><i class="bi bi-whatsapp"><?php echo $user['wa']; ?></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
      <button class="btn btn-outline-width" type="submit"><i class="bi bi-facebook"></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
      <button class="btn btn-outline-width" type="submit"><i class="bi bi-instagram"></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
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