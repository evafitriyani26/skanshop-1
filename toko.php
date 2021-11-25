<?php

include 'koneksi.php';

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = array();
}

if (isset($_GET['id']) && $_GET['id']) {
    $idproduct = $_GET['id'];
}
$vid= $user['id'];
          $lokasifoto='image/';
          $namafoto = "";
          if(isset($_FILES['tfoto']['name'])) {
          $namafoto=$user['id'].date("YmdHis").$_FILES['tfoto']['name'];
          move_uploaded_file($_FILES['tfoto']['tmp_name'],$lokasifoto.$namafoto);
          }

$sql = " SELECT *,
(select wa from user where id=id_user) as 'wa',
(select fb from user where id=id_user) as 'fb',
(select ig from user where id=id_user) as 'ig',
(select nama from user where id=id_user) as 'nama_user' FROM produk ";
$result = $koneksi->query($sql);
$produk = $result->fetch_assoc();

$tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$user[id]' ");
        $data = mysqli_fetch_array($tampil);
          if($data)
          {
             //Jika data ditemukan, maka data ditampung ke dalam variabel
            $vfoto = $data['foto'];
            $vnama = $data['nama'];
            $valamat = $data['alamat'];
            $vemail = $data['email'];           
            $vwa = $data['wa'];
            $vfb = $data['fb'];
            $vig = $data['ig'];
                
          }


$sql =" SELECT * FROM produk WHERE id_user='$produk[id_user]' order by id desc LIMIT 0,18 ";
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
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Halaman Produk</title>
    <div id="head" class="container"><a id="arrow" href="home.php" class="btn btn" role="button"><i class="bi bi-arrow-left"></i><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></a></div>
  </head>
  <body>
      <div class="container">
      <form method= "post" enctype="multipart/form-data">
          <div class="text-center"><img width="75%" src="<?php if(is_file("image/".$vfoto)) { echo "image/".$vfoto; } else { ?>image/user 1.png<?php } ?>" class="rounded-circle" alt=""></div>
          <div class="text-center mt-3 mb-3">
          <label for="floatingInput"></label>
          </div>
          <div class="form-floating mb-3">
            <li class="list-group-item "><b><?php echo $user['nama']; ?></b></li>
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