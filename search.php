<?php

include("koneksi.php");


session_start();
$user = array();
if(isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
} 
if(isset($_GET['nama_produk']) && $_GET['nama_produk'] ) {
    $nama_produk = FormSet($_GET['nama_produk']);

} else {
    $nama_produk="";
}
 $sql =" SELECT * FROM produk WHERE nama_produk LIKE '%$nama_produk%' ";
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
      body {height: 100vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
      
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>home</title>
  </head>
  <body>
  <div class="container">
          <div class="d-flex justify-content-start">
            <a href="home.php"><i class="bi bi-arrow-left mt-3"></i></a>
          </div>
  
  <!-- As a heading -->
    <div class="container">
        <form class="d-flex" method="get">
        <h5><input class="form-control me-5" name="nama_produk" type="search" placeholder="Search" aria-label="Search"></h5>
        <button class="btn btn-outline-width" type="submit"> <i class="bi bi-search"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button></h6>
      </form>
    </div>
  <!-- As a heading -->
  <div class="container">
    <h6 class="text-ligh">Hasil Pencarian</h6>
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
      <div id="kandang" class="container">
      <div id="tombol-bawah" class="d-flex justify-content-around">
      <a href="home.php" class="btn btn" role="button"> <i class="bi bi-house-door-fill"></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></a>
      <a href="posting.php" class="btn btn" role="button"> <i class="bi bi-cart4"></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
      <a href="profil.php" class="btn btn" role="button"><i class="bi bi-person-circle"></i><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
      </div>
      </div>
    </div>
  
  </div>
  </body>
</html>
