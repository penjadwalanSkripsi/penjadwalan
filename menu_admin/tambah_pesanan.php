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

    <?php include '../tema_menu/header_Admin.php';
    include '../tema_menu/sidebar_Admin.php';

    $result = select("SELECT COUNT(*) AS total FROM pesanan");
    $total_pesanan = $result[0]['total'] + 1;

    $new_id_pesanan = 'PSN' . str_pad($total_pesanan, 3, '0', STR_PAD_LEFT);
    $customers = select("SELECT id_customer, nama FROM customer");
    $product = select("SELECT id, nama FROM barang");


    if (isset($_POST['tambah_pesanan'])) {
        if (create_pesanan($_POST) > 0) {
            echo "<script>
                        alert('Data Pesanan Berhasil Ditambahkan');
                        document.location.href = 'lihat_pesanan.php';
                </script>";
        } else {
            echo "<script>
                        alert('Data Pesanan Gagal Ditambahkan');
                        document.location.href = 'lihat_pesanan.php';
                </script>";
        }
    }

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container mt-5">
                <h1>Tambah Pesanan</h1>
                <hr>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="id">ID Pesanan:</label>
                        <input type="text" value="<?= $new_id_pesanan; ?>" id="id_pesanan" name="id_pesanan" class="form-control" readonly />
                    </div>

                    <div class="form-group">
                        <label for="id_customer">Nama Customer</label>
                        <select id="id_customer" name="id_customer" class="form-control" required>
                            <option value="">-- Pilih Customer --</option>
                            <?php foreach ($customers as $customer): ?>
                                <option value="<?= $customer['id_customer']; ?>">
                                    <?= $customer['id_customer']; ?> - <?= $customer['nama']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">

                        <div class="form-group">
                            <label for="tgl_pesanan">Tanggal Pemesanan:</label>
                            <div class="input-group date" id="id_4">
                                <input type="date" value="" id="tgl_pesanan" name="tgl_pesanan" class="form-control" required />

                            </div>
                        </div>

                        <button type="submit" name="tambah_pesanan" class="btn btn-primary btn-sm col-xs-2 margin-left" style="float: right;"><i class="fas fa-plus-square"></i> Tambahkan</button>

                </form>

            </div>

        </main>

        <!-- Footer -->
        <?php include '../tema_menu/footer.php' ?>
    </div>
    </div>

</body>

</html>