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
        if($_GET['hal'] == "edit")
        {
            //Data akan di edit
                //data akan disimpan baru
                $edit = mysqli_query($koneksi, "UPDATE user set
                `password`= '".$_POST['tpassword']."',
                `cpassword`='".$_POST['tcpassword']."'
                WHERE id='".$_GET['id']."'
                ");
                
                if($edit) //jika edit sukses
                    {
                    echo "<script>
                            alert('edit data sukses!');
                            document.location='index.php';
                    </script>";
                    } else {
                    echo "<script>
                        alert('edit data GAGAL!!');
                        document.location='index.php';
                </script>";

                }
        } else {
            $simpan = mysqli_query($koneksi, "INSERT INTO user (`password`,`cpassword`)
                                          VALUES ('$_POST[tpassword]',
                                                  '$_POST[tcpassword]')
                                         ");

                                         
                    if($simpan)//Jika simpan suksess
                    {
                        echo "<script>
                                alert('Simpan data suksess!');
                                document.location='index.php';
                            </script>";
                    }
                    else
                    {
                        echo "<script>
                                alert('Simpan data GAGAL!!');
                                document.location='registrasi.php';
                            </script>";
                    }
                }       

}

    //Pengujian jika tombol edit / hapus diklik
    if(isset($_GET['hal']))
    {
        //Pengujian jika data edit
        if($_GET['hal'] == "edit")
        {
            //Tampilkan data yang diedit
            $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //Jika data ditemukan, maka data ditampung ke dalam variabel
                $vpassword = $data['password'];
                $vcpassword = $data['cpassword'];
            }
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
      <form id="input-ganti_pass" method="post" action="">           
        <h6>Password Lama</h6>
        <input type="password" name="tpassword" value="" class="form-control" required>
        <h6 class="mt-3">Confirm Password Baru</h6>
        <input type="password" name="tpassword" value="" class="form-control" required>

 <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
                  
        <div class="text-end mt-5">
          <a href="" id="Login" type="login" class="btn btn-primary" name="bsimpan">Lanjutkan</a>
          <a href="index.php" id="id" type="login" class="btn btn-primary" name="bsimpan">Batal</a>
        </div>
      </form>
    </div>
  </body>
</html>