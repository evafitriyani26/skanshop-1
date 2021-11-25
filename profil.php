<?php
 include("koneksi.php");


 session_start();
 if(empty($_SESSION['user'])){
   header("location: index.php?status=gagal");
 }else{
   $user = $_SESSION['user'];
 }
 //jika tombol simpan di klik
//print_r($_POST);exit
if(isset($_POST['bsimpan']))
{
    //pengujian apakah data akan diedit atau disimpan baru
          $vid= $user['id'];
          $lokasifoto='image/';
          $namafoto = "";
          if(isset($_FILES['tfoto']['name'])) {
          $namafoto=$user['id'].date("YmdHis").$_FILES['tfoto']['name'];
          move_uploaded_file($_FILES['tfoto']['tmp_name'],$lokasifoto.$namafoto);
          }
            //Data akan di edit
                //data akan disimpan baru
                $edit = mysqli_query($koneksi, "UPDATE user set
                `foto`='".FormSet($namafoto)."',
                `nama`='".FormSet($_POST['tnama'])."',
                `jenis_kelamin`='".FormSet($_POST['tjenis_kelamin'])."',
                `tanggal_lahir`='".FormSet($_POST['ttanggal_lahir'])."',
                `alamat`='".FormSet($_POST['talamat'])."',
                `email`='".FormSet($_POST['temail'])."',
                `wa`= '".FormSet($_POST['twa'])."',
                `fb`='".FormSet($_POST['tfb'])."',
                `ig`='".FormSet($_POST['tig'])."'
                WHERE id='".(int)$vid."'
                ");
                
                if($edit) //jika edit sukses
                    {
                      header("location:profil.php");
                    exit;
                    }
                    else 
                    {
                    echo "Gagal";
                    exit;
                    }
        
                   

}
      //Tampilkan data yang diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '".(int)$user['id']."' ");
        $data = mysqli_fetch_array($tampil);
          if($data)
          {
             //Jika data ditemukan, maka data ditampung ke dalam variabel
            $vfoto = $data['foto'];
            $vnama = $data['nama'];
            $vjenis_kelamin = $data['jenis_kelamin'];
            $vtanggallahir = $data['tanggal_lahir'];
            $valamat = $data['alamat'];
            $vemail = $data['email'];
            $vnama = $data['nama'];
            $vwa = $data['wa'];
            $vfb = $data['fb'];
            $vig = $data['ig'];
                
          }


?>
<!doctype html>
<html lang="en">
  <head>
    <style>
      body {height: 100%; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
      
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profil</title>
    <style>
        .container{
            width: 360px;


        }
    </style>
  </head>
  <body>
    <div class="container">
          <div class="d-flex justify-content-start">
            <a href="home.php"><i class="bi bi-arrow-left mt-3"></i></a>
          </div>
      <form method= "post" enctype="multipart/form-data">
          <div class="text-center"><img width="100%" src="<?php if(is_file("image/".$vfoto)) { echo "image/".$vfoto; } else { ?>image/user 1.png<?php } ?>" alt=""></div>
          <div class="text-center mt-3 mb-3">
          <input type="file" name="tfoto">
          <label for="floatingInput"></label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama anda disini" required>
            <label for="floatingInput">Nama</label>
          </div>
          <div class="form-floating mb-3">
            <select name="tjenis_kelamin" class="form-select" id="floatingSelect" aria-label="Floating label select example">
              <option <?php if(isset($vjenis_kelamin) && $vjenis_kelamin == "") { echo "selected"; } ?> value="">Pilih</option>
              <option <?php if(isset($vjenis_kelamin) && $vjenis_kelamin == "Laki-Laki") { echo "selected"; } ?> value="Laki-Laki">Laki-Laki</option>
              <option <?php if(isset($vjenis_kelamin) && $vjenis_kelamin == "Perempuan") { echo "selected"; } ?> value="Perempuan">Perempuan</option>
            </select>
            <label for="floatingSelect">Jenis Kelamin</label>
          </div>
          <div class="form-floating mb-3">
            <input name="ttanggal_lahir" class="datepicker form-control" value="<?=@$vtanggallahir?>">
            <label for="floatingInput">Tangal Lahir</label>
          </div>
          <div class="form-floating mb-3">
            <textarea name="talamat" class="form-control" placeholder="Input Nama anda disini" required><?=@$valamat?></textarea>
            <label for="floatingTextarea">Alamat</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="temail" value="<?=@$vemail?>" class="form-control" placeholder="Input Email anda disini" required>        
            <label for="floatingInput">Email</label>
          </div>
          <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Whatsapp</span>
            <input type="phone" name="twa" value="<?=@$vwa?>" class="form-control">
          </div>
          <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Facebook</span>
            <input type="url" name="tfb" value="<?=@$vfb?>" class="form-control">
          </div>
          <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">Instagram</span>
            <input type="url" name="tig" value="<?=@$vig?>" class="form-control">
          </div>
          <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
          <div>
            <a id="login" class="btn btn-primary mt-3 mb-5" href="Gantipass.php" role="button">Ganti Password</a>
            <Button name="bsimpan" type="submit" class="btn btn-primary mt-3 mb-5" role="button">Simpan</Button>
          </div>
      </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>