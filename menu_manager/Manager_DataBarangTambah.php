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

        if (isset($_POST['tambah'])) {
            if (create_barang($_POST) > 0) {
                echo "<script>
                        alert('Data Barang Berhasil Ditambahkan');
                        document.location.href = 'Manager_DataBarangLihat.php';
                </script>";
            }else {
              echo "<script>
                        alert('Data Barang Gagal Ditambahkan');
                        document.location.href = 'Manager_DataBarangLihat.php';
                </script>";  
            }

        }
    
    ?> 

            <div id="layoutSidenav_content">
            <main>
            <div class="container mt-5">
            <h1>Tambah Barang</h1>
            <hr>

            <form action="" method="post">
            <div class="mb-3">
            <label for="kodebarang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kodebarang" name="kodebarang" placeholder="kode barang" required>
            </div>

            <div class="mb-3">
            <label for="namabarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="nama barang" required>
            </div>

            <div class="mb-3">
            <label for="hargabarang" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="hargabarang" name="hargabarang" placeholder="harga barang" required>
            </div>

            <button href="" type="submit" name="tambah" class="btn btn-primary btn-sm col-xs-2 margin-left" style="float: right;">Tambah</button>

            </form>

            </div>       

            </main>
                
                <!-- Footer -->
                <?php include '../tema_menu/footer.php' ?> 
            </div>
        </div>
       
    </body>
</html>
