<?php
    //koneksi Database
    $server= "localhost";
    $user= "root";
    $pass= "";
    $database= "skanshop";

    $koneksi= mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
$eror= false;
ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","465");
//jika tombol simpan di klik
//print_r($_POST);exit
if(isset($_POST['bsimpan']))
{
    //Cek apakah email ada di database/tidak
    $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$_POST[temail]' ");
        $data = mysqli_fetch_array($tampil);
          if($data)
          {
            $to      = 'dwipoetra115@gmail.com';
            $subject = 'Reset password';
            $message = 'Gunakan Link berikut untuk reset password';
            $headers = 'From: evafitriyani0026@gmail.com' . "\r\n" .
                       'Reply-To: evafitriyani0026@gmail.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);    
      //Kalau ada maka kirim link ke email
          }else{
            $eror=true;
           
          }
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
    <link rel="stylesheet" type="text/css" href="">
    <title>reset pass</title>
    <style>
      .container{
        width : 360px;
      }
    </style>
  </head>
  <body>
      <p><h2 class="text-center">Reset Untuk Lupa Password</h2></p>
      <div class="container">
  <h6 class="text-center">Lupa password anda? <br> Masukkan Email anda disini untuk melalui proses reset password.</h6>
  <form method="post" action="">
   <?php if(isset($eror) && $eror==true){ ?>
    <div class="alert alert-danger" >
      Email tidak ditemukan!!
    </div>
   <?php } ?>
  
  
  <div class="form-group mt-5">
  <h6>Alamat Email</h6>
  <input type="email" name="temail" class="form-control">
    </div>
  <div class="form-group">
      <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
      <div class="text-center">
      <Button id="login" name="bsimpan" type="submit" class="btn btn-primary mt-3" role="button">Submit</Button>
          </div>
  </form>
       
   </div>
   <div type="anda jika belum punya akun?" class="text-center mt-3"></div>
   <div class="text-center">
   <a href="index.php">Back to Login</a>
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