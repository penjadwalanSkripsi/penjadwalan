<?php 

        include '../tema_menu/header_Manager.php';
        include '../tema_menu/sidebar_Manager.php'; 

//menerima id barang yang dipilih pengguna
$id_barang = (int)$_GET['id'];

if (delete_barang($id_barang) > 0) {
    echo "<script>
        alert('Data Barang Berhasil Dihapus');
        document.location.href = 'Manager_DataBarangLihat.php';
    </script>";
}else {
     echo "<script>
        alert('Data Barang Gagal Dihapus');
        document.location.href = 'Manager_DataBarangLihat.php';
    </script>";
}

?>