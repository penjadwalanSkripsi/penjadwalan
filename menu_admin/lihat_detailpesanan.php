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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>


</head>

<body class="sb-nav-fixed">

    <!-- Header dan Sidebar -->
    <?php include '../tema_menu/header_Admin.php';
    include '../tema_menu/sidebar_Admin.php';


    $id_pesanan = isset($_GET['idp']) ? $_GET['idp'] : '';
    $data_detailpesanan = select("
    SELECT 
        detail_pesanan.id_detail_pesanan,
        detail_pesanan.id_pesanan,
        detail_pesanan.id_barang,
        barang.nama AS nama_barang,
        barang.harga,
        pesanan.tgl_pesanan,
        detail_pesanan.qty,
        detail_pesanan.tgl_permintaan
    FROM detail_pesanan
    JOIN pesanan ON detail_pesanan.id_pesanan = pesanan.id_pesanan
    JOIN barang ON detail_pesanan.id_barang = barang.id
    WHERE detail_pesanan.id_pesanan = '$id_pesanan'
    ");


    $products = select("SELECT id, nama FROM barang");




    if (isset($_POST['tambah_detailpesanan'])) {
        if (create_detailpesanan($_POST) > 0) {
            echo "<script>
                        alert('Data Pesanan Berhasil Ditambahkan');
                        document.location.href = 'lihat_detailpesanan.php?idp=$id_pesanan';
                </script>";
        } else {
            echo "<script>
                        alert('Data Pesanan Gagal Ditambahkan');
                        document.location.href = 'lihat_detailpesanan.php?idp=$id_pesanan';
                </script>";
        }
    }
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Data Detail Pesanan</h1>
                <br>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Jumlah Barang :</div>
                        </div>
                    </div>
                </div>
                <!-- tambahkan button tambah detail pemesanan -->
                <div class="row">
                    <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#exampleModal">
                        Tambah Pesanan Baru
                </div>





                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Detail Pesanan
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" table-striped mt-3 id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Id Detail Pesanan</th>
                                        <th>Id Pesanan</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($data_detailpesanan as $detailpesanan) : ?>
                                        <tr>
                                            <td><?= $detailpesanan['id_detail_pesanan']; ?></td>
                                            <td><?= $detailpesanan['id_pesanan']; ?></td>
                                            <td><?= $detailpesanan['nama_barang']; ?></td>
                                            <td><?= $detailpesanan['qty']; ?></td>
                                            <td><?= $detailpesanan['harga']; ?></td>
                                            <td><?= $detailpesanan['tgl_pesanan']; ?></td>
                                            <td><?= $detailpesanan['tgl_permintaan']; ?></td>
                                            <td><?= $detailpesanan['qty'] * $detailpesanan['harga']; ?></td>


                                            <td width="15%" class="text-center">
                                                <a href="ubah_detailpesanan.php" class="btn btn-primary">Ubah</a>
                                                <a href="hapus_detail_pesanan.php?id_detail_pesanan=<?= $detailpesanan['id_detail_pesanan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data User : <?= $tuser['nama_lengkap']; ?>  Akan Dihapus ?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?php include '../tema_menu/footer.php' ?>
    </div>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Detail Pemesanan</h3>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_detail_pesanan">ID Detail Pesanan:</label>
                            <input type="text" value="<?= generateIdDetailPesanan(); ?>" id="id_detail_pesanan" name="id_detail_pesanan" class="form-control" readonly />
                        </div>

                        <!-- Menggunakan ID Pesanan yang sedang dipilih -->
                        <div class="form-group">
                            <label for="id_pesanan">ID Pesanan</label>
                            <input type="text" value="<?= $id_pesanan; ?>" id="id_pesanan" name="id_pesanan" class="form-control" readonly />
                        </div>

                        <div class="form-group">
                            <label for="id_barang">Nama barang</label>
                            <select id="id_barang" name="id_barang" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product['id']; ?>">
                                        <?= $product['id']; ?> - <?= $product['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="qty">Jumlah</label>
                            <div class="input-group date" id="id_4">
                                <input type="number" value="" id="qty" name="qty" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_permintaan">Tanggal Permintaan:</label>
                            <div class="input-group date" id="id_4">
                                <input type="date" value="" id="tgl_permintaan" name="tgl_permintaan" class="form-control" required />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambah_detailpesanan" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>



</div>
</div>
</div>

</html>