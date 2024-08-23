<?php 

        include '../tema_menu/header_Admin.php'; 

//menerima id barang yang dipilih pengguna
$id_user = (int)$_GET['id'];

if (delete_user($id_user) > 0) {
    echo "<script>
        alert('Data User Berhasil Dihapus');
        document.location.href = 'lihat_user.php';
    </script>";
}else {
     echo "<script>
        alert('Data User Gagal Dihapus');
        document.location.href = 'lihat_user.php';
    </script>";
}

?>