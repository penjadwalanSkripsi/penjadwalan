<?php

include '../tema_menu/header_Admin.php';

//menerima id barang yang dipilih pengguna
$id_pesanan = (string)$_GET['id_pesanan'];

if (!empty($id_pesanan) && delete_pesanan($id_pesanan) > 0) {
    echo "<script>
        alert('Data User Berhasil Dihapus');
        document.location.href = 'lihat_pesanan.php';
    </script>";
} else {
    echo "<script>
        alert('Data User Gagal Dihapus');
        document.location.href = 'lihat_pesanan.php';
    </script>";
}
