<?php

// Panggil koneksi
include 'koneksi.php';

session_start();
	if(empty($_SESSION['user'])){
		header("location:home.php");
	}
  $user = $_SESSION['user'][0];
  $iduser = $user;
//enkripsi inputan password lama
$password_lama = md5(@$_POST['pass_lama']);
$email = @$_POST['email'];

if(@$_POST['pass_lama']){
      //uji jika password lama sesuai
      $sql = "SELECT * FROM user WHERE id = '$iduser' and password = '$_POST[pass_lama]' ";
      $tampil = mysqli_query($koneksi, $sql);
      $data = mysqli_fetch_array($tampil);
      
//Jika data ditemukan, maka password sesuai
  //Uji jika password baru dan konfirmasi sama
  $password_baru = $_POST['pass_baru'];
  $konfirmasi = $_POST['konfirmasi'];

  if($_POST['pass_lama'] != $data['password']) {
    echo "<script>
    alert('Maaf, Password lama tidak sesuai.!');
    document.location='gantipass.php'
    </script>";
    exit;
  }

  if($password_baru == $konfirmasi){
    //Proses ganti password
    //enkripsi password baru
    $pass_ok = $konfirmasi;
    $sql2 = "UPDATE user set password = '".$pass_ok."', cpassword='".$pass_ok."' 
    WHERE id = '$data[id]' ";
    $ubah = mysqli_query($koneksi, $sql2);
    if($ubah){
      echo "<script>
      alert('Password anda berhasil diubah, silahkan log out untuk menguji password baru anda.!');
      document.location='profil.php'
      </script>";
    } 
  } else{
      echo "<script>
          alert('Maaf, Password baru & konfirmasi password yang anda inputkan tidak sama.!');
          document.location='gantipass.php'
          </script>";

  }


}


?>
<!doctype html>
<html>
  <head>
    <style>
        body { height: 150vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>skanshop</title>
    <link rel="stylesheet" type="text/css" href="">
  </head>
    <style>
      .container{
        width: 360px;
        background-color: transparent;
        padding: 50px;
      }
      #satu{
        width: 360px;
        background-color: transparent;
        padding: 0%;
      }
    </style>
  <body>
    <div id="satu" class="container">
      <p><H2 class="text-center">Pilih Kata Sandi Baru</H2></p>
      <hr>
      <h6 class="text-center">Kata sandi yang kuat adalah gabungan huruf dan tanda baca.
                          <br> Panjang kata sandi setidaknya 6 karakter.</h6>
    </div>
          <!-- awal card form -->
    
    <div class="container">
      <form method="post" action="">
        <input type="hidden" name="email" value="<?=$_SESSION['email']?>">           
        <h6>Password Lama</h6>
        <input type="password" name="pass_lama" value="" class="form-control" required>
        <h6 class="mt-3">Password Baru</h6>
        <input type="password" name="pass_baru" value="" class="form-control" required>
        <h6 class="mt-3">Confirm Password Baru</h6>
        <input type="password" name="konfirmasi" value="" class="form-control" required>

 <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
                  
 <div class="text-end mt-5">
          <a href="profil.php" type="submit" class="btn btn-primary" name="bsimpan">Lanjutkan</a>
          <a href="profil.php" type="reset" class="btn btn-primary" name="bsimpan">Batal</a>
        </div>
      </form>
    </div>
  </body>
</html>