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
    $data_cs = select("SELECT * FROM customer "); ?>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Lihat Data Customer</h1>


                <br>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Customer
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" table-striped mt-3 id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Customer</th>
                                        <th>Nama Customer</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>email</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_cs as $cs) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $cs['id_customer']; ?></td>
                                            <td><?= $cs['nama']; ?></td>
                                            <td><?= $cs['alamat']; ?></td>
                                            <td><?= $cs['no_hp']; ?></td>
                                            <td><?= $cs['email']; ?></td>
                                            <td><?= $cs['tgl_daftar']; ?></td>

                                            <td width="15%" class="text-center">
                                                <a href="ubah_customer.php?id_customer=<?= $cs['id_customer']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                <a href="hapus_customer.php?id_customer=<?= $cs['id_customer']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data Customer : <?= $cs['nama']; ?>  Akan Dihapus ?');"><i class="fas fa-trash"></i></a>
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

</body>

</html>