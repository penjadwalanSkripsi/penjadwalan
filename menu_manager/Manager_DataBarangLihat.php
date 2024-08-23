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
    <?php include '../tema_menu/header_Manager.php';
    include '../tema_menu/sidebar_Manager.php';
    $data_barang = select("SELECT * FROM barang");?> 
    
                           
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lihat Data Barang</h1>
                        
                       <!--  <a href="Manager_DataBarangTambah.php" class="btn btn-primary mb-1 ">Tambah Data</a> -->
                        <br>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Barang
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" table-striped mt-3 id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $id = 1; ?>
                                            <?php foreach ($data_barang as $barang) :  ?>
                                            <tr>

                                                <td><?php echo $id++; ?></td>
                                                <td><?php echo $barang['kode']; ?></td>
                                                <td><?php echo $barang['nama']; ?></td>
                                                <td>Rp. <?php echo number_format($barang['harga'],0,',','.'); ?></td>
                                                
                                                <td width="15%" class="text-center">
                                                <a href="Manager_DataBarangUbah.php?id=<?= $barang['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                <a href="Manager_DataBarangHapus.php?id=<?= $barang['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus ?');"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach?>

                                            
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
