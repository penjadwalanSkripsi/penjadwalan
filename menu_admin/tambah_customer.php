<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Penjadwalan Produksi</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Header dan Sidebar -->
    <?php include '../tema_menu/header_Admin.php';
    include '../tema_menu/sidebar_Admin.php';

    if (isset($_POST['tambah'])) {
        if (create_customer($_POST) > 0) {
            echo "<script>
                        alert('Data User Berhasil Ditambahkan');
                        document.location.href = 'lihat_customer.php';
                </script>";
        } else {
            echo "<script>
                        alert('Data Barang Gagal Ditambahkan');
                        document.location.href = 'lihat_customer.php';
                </script>";
        }
    }

    ?>




    <div id="layoutSidenav_content">
        <main>
            <div class="container mt-5">
                <h1>Tambah Customer</h1>
                <hr>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="id_customer" class="form-label">id_customer</label>
                        <input type="text" class="form-control" id="id_customer" name="id_customer" placeholder="id_customer" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                    </div>

                    <!-- tanggal daftar -->
                    <div class="mb-3">
                        <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
                        <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" required>
                    </div>


                    <button type="submit" name="tambah" class="btn btn-primary btn-sm col-xs-2 margin-left" style="float: right;"><i class="fas fa-plus-square"></i> Tambahkan</button>

                </form>

            </div>

        </main>

        <!-- Footer -->
        <?php include '../tema_menu/footer.php' ?>
    </div>
    </div>

</body>

</html>