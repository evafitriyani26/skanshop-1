<?php

session_start();
//untuk penghubung dengan file koneksi
    include 'koneksi.php';

    if(isset($_POST['input'])){
        $email = $_POST['email'];
        $password= $_POST['password'];

        //ambil data dari database tabel login dengan username dan password yang sesuai
        $data = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND password = '$password' ");

        if(mysqli_num_rows($data)){
            // simpan data user
            $user = mysqli_fetch_array($data);
            $_SESSION['user'] = $user;
            // alihkan halaman
            header("location:home.php");
        }
        else{
            header("location:index.php?status=gagal");
        }
            

    }


?>
    
    