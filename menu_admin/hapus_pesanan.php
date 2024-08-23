<?php 

        include '../tema_menu/header_Admin.php'; 

//menerima id barang yang dipilih pengguna
$id_pesanan = (int)$_GET['id'];

if (delete_pesanan($id_pesanan) > 0) {
    echo "<script>
        alert('Data Pesanan Berhasil Dihapus');
        document.location.href = 'lihat_pesanan.php';
    </script>";
}else {
     echo "<script>
        alert('Data Pesanan Gagal Dihapus');
        document.location.href = 'lihat_pesanan.php';
    </script>";
}

?>