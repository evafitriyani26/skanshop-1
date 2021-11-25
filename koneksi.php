<?php

 //koneksi Database
 $server= "localhost";
 $userDB= "root";
 $pass= "";
 $database= "skanshop";

 $koneksi= mysqli_connect($server, $userDB, $pass, $database)or die(mysqli_error($koneksi));
 $alow_type_file = array("jpg","jpeg","png","JPG","JPEG","PNG");
function FormSet($nilai)
{
  $nilai = str_replace("\'","'",$nilai);
  $nilai = trim($nilai);
  $nilai = str_replace("'", "\'",$nilai);
  $filnilai = strtolower($nilai); 
  if(preg_match('/<script/',$filnilai,$result) 
  || preg_match('/http-equiv/',$filnilai,$result)
  || preg_match('/src=x/',$filnilai,$result)
  || preg_match('/onerror=prompt/',$filnilai,$result))  { 
        $nilai = str_replace("http-equiv=", "",$filnilai);
        $nilai = str_replace('onerror="javascript', "",$nilai);
        $nilai = str_replace(':alert(', "",$nilai);
        $nilai = str_replace('onload=alert(', "",$nilai);
        $nilai = str_replace("<script", "",$nilai);
        $nilai = str_replace("</script>", "",$nilai);
        $nilai = str_replace("src=x", "",$nilai);
        $nilai = str_replace("onerror=prompt", "",$nilai);
  }
  
  return $nilai;
}

?>