<?php

include 'koneksi.php';

    session_start();
    if(empty($_SESSION['user'])) {
      header("location: login.php?status=gagal");
    }else{
      $user = $_SESSION['user'];
    }

//jika tombol simpan di klik
//print_r($_POST);exit
if(isset($_POST['bsimpan']))
{
//pengujian apakah data akan diedit atau disimpan baru  
    $vid2 = $_GET['id'];
    $lokasifoto='produk/';
    $namafoto = "";
    if(isset($_FILES['tfoto']['name']) && $_FILES['tfoto']['name'] ) {
      $namafoto=$user['id'].date("YmdHis").$_FILES['tfoto']['name'];

        $cekshell = explode('.', $_FILES["file"]["name"]);
        if (!in_array(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION), $alow_type_file)) {  
            echo "Type file tidak di izinkan";
            exit;
        }
      move_uploaded_file($_FILES['tfoto']['tmp_name'],$lokasifoto.$namafoto);
    }
    //jika edit
    if(isset($_GET['id']) && $_GET['id'] > 0)
    {
     //data akan diedit
     $edit= mysqli_query($koneksi, "UPDATE produk set
                `foto` ='".FormSet($namafoto)."',
                `nama_produk`='".FormSet($_POST['nama_produk'])."',
                `harga_produk`='".FormSet($_POST['harga_produk'])."',
                `kategori`='".FormSet($_POST['kategori'])."',
                `deskripsi`='".FormSet($_POST['deskripsi'])."'
                 WHERE id='".(int)$vid2."' AND id_user='".(int)$user['id']."'
                
     ");

     if($edit) //jika edit sukses
     {
     echo "<script>
     alert('Edit data sukses!');
     document.location='produk.php?id=$vid2';
     </script>";
     }
     else
     {
     echo "<script>
     alert('Edit data GAGAL!!');
     document.location='produk.php?id=$vid2';
     </script>";
     
     }
            
    }
    else{
    
    $simpan = mysqli_query($koneksi, "INSERT 
    INTO produk (`foto`,`nama_produk`,`harga_produk`,`kategori`,`deskripsi`,`id_user`)
    VALUES ('".FormSet($namafoto)."',
           '".FormSet($_POST['nama_produk'])."',
           '".FormSet($_POST['harga_produk'])."',
           '".FormSet($_POST['kategori'])."',
           '".FormSet($_POST['deskripsi'])."',
           '".(int)$user['id']."'
           )");
    }
    if($simpan)//Jika simpan suksess
    {
    echo "<script>
    alert('Simpan data suksess!');
    document.location='home.php';
    </script>";
    }
    else
    {
    echo "<script>
    alert('Simpan data GAGAL!!');
    document.location='posting.php';
    </script>";
    }       

    if(isset($_GET['hal']))
    {
    //pengujian jika edit Data
    
            if ($_GET['hal'] == "hapus")
            {
                //Persiapan hapus data
                $hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id = '".(int)$_GET['id']."'  AND id_user='".(int)$user['id']."' ");
                if($hapus){
                    echo "<script>
                        alert('Hapus Data Suksess!!');
                        document.location='registrasi.php';
                    </script>";
                }
            }
        }
        
}
    $vid = 0;
    if (isset($_GET['id'])){
        $vid = $_GET['id'];
    }

    //tampilkan data yang akan diedit
    $tampil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '".(int)$vid."' ");
    $data = mysqli_fetch_array($tampil); 
    if($data)
    {
                  //Jika data ditemukan, maka data ditampung ke dalam variabel
                  $vfoto = $data['foto'];
                  $vnamaproduk = $data['nama_produk'];
                  $vhargaproduk = $data['harga_produk'];
                  $vkategori = $data['kategori'];
                  $vdeskripsi = $data['deskripsi'];     
              
    }
    
?>
<!doctype html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <title>Posting Produk</title>
        <link rel="stylesheet" type="text/css" href="">
    </head>
    <style>
        body { height: 100%; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
        .container{
            width : 360px;
            background-color : white;
            box-shadow:0  3px   20px ;
            padding: 20px ;
            margin-top:20px;
        }
       
    </style>
    <body>
        <!-- awal card form -->
        <div class="container">
        <div class="d-flex justify-content-start">
            <a href="home.php"><i class="bi bi-arrow-left mt-3"></i></a>
            </div>
        <h2 class="text-center mt-3 mb-3">Postingan</h2>
            <form action="posting.php?id=<?php echo $vid; ?>" method="post" enctype="multipart/form-data">
        <div class="text-center"><img width="100%" src="<?php if(is_file("produk/".$vfoto)) { echo "produk/".$vfoto; } else { ?> <?php } ?>" alt=""></div>
        <div class="form-floating mb-3">
            <input type="file" name="tfoto">
            <input type="hidden" name="fotosaatini" value="<?php echo $vfoto; ?>">
            <label for="floatingInput"></label>
        </div>
        <div class="form-floating mt-3">
            <input type="text" name="nama_produk" value="<?=@$vnamaproduk?>" class="form-control" id="floatingInput">
            <label for="floatingInput">Nama Produk</label>
    </div>
    <div class="form-floating mt-3">
            <input type="text" name="harga_produk" value="<?=@$vhargaproduk?>" class="form-control" class="form-control ">
            <label for="floatingInput">Harga</label>
        </div>
        <div class="form-floating mt-3">
    <select name="kategori" value="<?=@$vkategori?>"  class="form-select" id="floatingSelect" aria-label="Floating label select example">
        <option <?php if(isset($vkategori) && $vkategori== "") {echo"selected";} ?> value=""></option>
        <option <?php if(isset($vkategori) && $vkategori== "Makanan") {echo"selected";} ?> value="Makanan">Makanan</option>
        <option <?php if(isset($vkategori) && $vkategori== "Fashion") {echo"selected";} ?> value="Fashion">Fashion</option>
        <option <?php if(isset($vkategori) && $vkategori== "Jasa") {echo"selected";} ?> value="Jasa">Jasa</option>
        <option <?php if(isset($vkategori) && $vkategori== "Elektronik") {echo"selected";} ?> value="Elektronik">Elektronik</option>
    </select>
    <label for="floatingSelect">Kategori Produk</label>
    </div>
    <h5 class="mt-3 mb-3">Deskripsi Item</h5>
                <div class="form-floating mb-3">
                    <textarea name="deskripsi" class="form-control" required><?=@$vdeskripsi?></textarea>
                    <label for="floatingTextarea">Keterangan</label>
                </div>
                <div class="d-flex justify-content-around">
                <div class="text-center mt-5 mb-5">   
                    <button name="bsimpan" type ="submit" class="btn btn-primary" role="button">Posting</button>
                </div>
            </div>
        
        </div>
    </div>

    </form>
        </div>
        </div>

        <!-- akhir card form -->
    </body>
</html>