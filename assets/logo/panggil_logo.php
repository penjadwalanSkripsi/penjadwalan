<?php
// Memuat gambar
$gambarAsli = imagecreatefromjpeg("logo/logo.png");

// Mengubah ukuran gambar
$gambarSkala = imagescale($gambarAsli, 200, 100); // Ukuran baru: 200x100px

// Menampilkan gambar
header('Content-Type: image/png');
imagejpeg($gambarSkala);

// Membuang gambar dari memori
imagedestroy($gambarAsli);
imagedestroy($gambarSkala);
?>