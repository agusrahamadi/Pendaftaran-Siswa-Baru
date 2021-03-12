<?php
session_start();
require_once '../lib/koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$qlogin =
"
   SELECT
    *
   FROM
    tb_login
   WHERE
    username = '$username'
    AND
    password = '$password'
";
$rlogin = mysqli_query($mysqli, $qlogin);
$jumlahbaris = mysqli_num_rows($rlogin);
if ($jumlahbaris > 0 ){
    $dlogin = mysqli_fetch_assoc($rlogin);
    $_SESSION['userid'] = $dlogin ['userid'];
    $_SESSION['username'] = $dlogin ['username'];
    $_SESSION['islevel'] = $dlogin ['islevel'];
    header('location:adminmainapp.php?unit=beranda');
}
 else {
     
        echo "<script> alert('Username atau Password Anda Salah Silakan Coba Lagi');
              document.location='login.php';
              </script>";
    
}

