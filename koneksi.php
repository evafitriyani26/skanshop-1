<?php

  //koneksi Database
 $server= "localhost";
 $userDB= "root";
 $pass= "";
 $database= "skanshop";

 $koneksi= mysqli_connect($server, $userDB, $pass, $database)or die(mysqli_error($koneksi));

?>