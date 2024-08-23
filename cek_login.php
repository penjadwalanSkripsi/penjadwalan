<?php

//panggil koneksi database
include "config/koneksi.php";

$pass = $_POST['password'];
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level user
        if ($level == "Admin") {
            header('location:menu_admin/beranda.php');
        } elseif ($level == "Manager") {
            header('location:menu_manager/beranda.php');
        } elseif ($level == "Direktur") {
            header('location:menu_direktur/beranda.php');
        }
    } else {
        echo "<script>alert('Login Gagal, username / password salah!');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Login Gagal, username / password salah!');document.location='index.php'</script>";
}
