<?php
    //koneksi Database
    $server= "localhost";
    $user= "root";
    $pass= "";
    $database= "skanshop";

    $koneksi= mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));


//jika tombol simpan di klik
//print_r($_POST);exit
if(isset($_POST['bsimpan']))
{
    //pengujian apakah data akan diedit atau disimpan baru
  
       
            
                $simpan = mysqli_query($koneksi, "INSERT INTO user (`email`)
                                          VALUES ('$_POST[temail]')
                                         ");

                            
                    if($simpan)//Jika simpan suksess
                    {
                        //alihkan halaman
                        if($simpan) //jika edit sukses
                        {
                          header("location:Ganti-Pass.php");
                        exit;
                        } else {
                         echo "gagal";
                        exit;
    
                    }
                   
        } 
      }
      
        if(isset($_GET['id']))
        {
            //Pengujian jika data edit
            if($_GET['id'] == "")
            {
                $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$_GET[id]' ");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                //Jika data ditemukan, maka data ditampung ke dalam variabel
                $vemail = $data['email'];
                }
              }
            }



?>
<!doctype html>
<html lang="en">
  <head>
    <style>
      body {height: 100vmax; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="regestrasi.css">
    <title>reset pass</title>
  </head>
  <body>
      <p><h2 class="text-center">Reset Untuk Lupa Password</h2></p>
      <div class="container">
  <h6 class="text-ligh">Lupa password anda?Masukkan Email anda disini untuk melalui proses reset password</h6>
  <form method="post">
  <div class="form-group">
  <label>Alamat Email</label>
  <input type="text" name="temail" value="<?=@$vemail?>" class="form-control">
    </div>
  <div class="form-group">
      <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
      <div class="text-center">
      <Button id="login" name="bsimpan" type="submit" class="btn btn-primary mt-3" role="button">Simpan</Button>
          </div>
  </form>
       
   </div>
   <div type="anda jika belum punya akun?" class="text-center mt-5"></div>
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