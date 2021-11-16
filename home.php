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

 $sql =" SELECT * FROM produk order by id desc LIMIT 0,18 ";
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
      body {height: 200vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
      
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>home</title>
  </head>
  <body>
    <div class="container">
        <h2 class="text-center">SkanShop</h2>
        <p class="text-end"><a href="logout.php">Logout</a></p>
        <p>Selamat Datang, <b><?php echo $user['nama']; ?></b></p>
  </div>
  
  <!-- As a heading -->
    <div class="container">
        <form class="d-flex" action="search.php" method="get">
        <h5><input name="nama_produk" class="form-control me-5" type="search" placeholder="Search" aria-label="Search"></h5>
        <a href="search.php" class="btn btn-outline-width" type="submit"> <i class="bi bi-search"> </i></a></h6>
      </form>
    </div>
    <div class="container">
  <div class="card m-2">
    <h6 class="text-center">Kategori</h6>
    <div class="card-body">
      <div class="row">
        <div class="col-6 text-center">
          <a href="kategori.php?kategori=Makanan"><img src="hamburger.png" width="56" height="51">
          <p style="font-size: 10px;">Makanan</p></a>
        </div>
        <div class="col-6 text-center">
          <a href="kategori.php?kategori=Fashion"><img src="search (1).png"width="56" height="51">
          <p style="font-size: 10px;">Fashion</p></a>
        </div>
        <div class="col-6 text-center">
          <a href="kategori.php?kategori=Elektronik"><img src="electronics.png"width="56" height="51">
          <p style="font-size: 10px;">Elektronik</p></a>
        </div>
        <div class="col-6 text-center">
          <a href="kategori.php?kategori=Jasa"><img src="customer-support.png"width="56" height="51">
          <p style="font-size: 10px;">Jasa</p></a>
        </div>
      </div>
    </div>
  </div></div>
  <!-- As a heading -->
  <div class="container">
    <h6 class="text-ligh">List Produk</h6>
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