<?php

include '../tema_menu/header_Admin.php';

$id_customer = (string)$_GET['id_customer'];

// Pastikan id_customer tidak kosong
if (!empty($id_customer) && delete_customer($id_customer) > 0) {
    echo "<script>
        alert('Data User Berhasil Dihapus');
        document.location.href = 'lihat_customer.php';
    </script>";
} else {
    echo "<script>
        alert('Data User Gagal Dihapus');
        document.location.href = 'lihat_customer.php';
    </script>";
}
