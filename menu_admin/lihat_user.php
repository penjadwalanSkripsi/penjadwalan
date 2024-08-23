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
    $data_user = select("SELECT * FROM tuser ");?> 
    
                           
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lihat Data User</h1>
                        
                      
                        <br>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data User
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" table-striped mt-3 id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>Nama Lengkap</th>
                                                <th>Password</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $id =1; ?>
                                            <?php foreach ($data_user as $tuser) : ?>
                                            <tr>
                                                <td><?= $id++; ?></td>
                                                <td><?= $tuser['username']; ?></td>
                                                <td><?= $tuser['nama_lengkap']; ?></td>
                                                <td>Password Ter-enkripsi</td>

                                                <td width="15%" class="text-center">
                                                <a href="ubah_user.php?id=<?= $tuser['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                <a href="hapus_user.php?id=<?= $tuser['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data User : <?= $tuser['nama_lengkap']; ?>  Akan Dihapus ?');"><i class="fas fa-trash"></i></a>
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
