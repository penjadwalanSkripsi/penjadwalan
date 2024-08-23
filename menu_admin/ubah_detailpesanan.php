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

    $id_detailpesanan = (int)$_GET['id'];

    $detailpesanan = select("SELECT * FROM detail_pesanan WHERE id = $id_detailpesanan")[0];

      if (isset($_POST['tambah'])) {
            if (update_detailpesanan($_POST) > 0) {
                echo "<script>
                        alert('Data Detail Pesanan Berhasil Diubah');
                        document.location.href = 'lihat_detailpesanan.php';
                </script>";
            }else {
              echo "<script>
                        alert('Data Detail Pesanan Gagal Diubah');
                        document.location.href = 'lihat_detailpesanan.php';
                </script>";  
            }

        }      
    
    ?> 
   



            <div id="layoutSidenav_content">
            <main>
            <div class="container mt-5">
            <h1>Ubah Detail Pesanan</h1>
            <hr>

            <form action="" method="post">
            <input type="hidden" name="id" value="<?= $detailpesanan['id']; ?>">
            <div class="mb-3">
            <label for="iddetail" class="form-label">Id</label>
            <input type="text" class="form-control" id="iddetail" name="iddetail" placeholder="iddetail" value=<?= $detailpesanan['id']; ?> readonly="readonly" >
            </div>

            <div class="mb-3">
            <label for="id_barang" class="form-label">Id Barang</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="id_barang" value=<?= $detailpesanan['id_barang']; ?> required>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Id Pesanan</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="masukan password baru" required>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Jumlah</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="masukan password baru" required>
            </div>

            <a href="lihat_user.php" type="submit" name="batal" class="btn btn-danger btn-sm col-xs-2 margin-left" style="float: right;">Batal</a>
            <button type="submit" name="tambah" class="btn btn-primary btn-sm col-xs-2 margin-left" style="float: right;"><i class="fas fa-edit"></i> Ubah</button>

            </form>

            </div>       

            </main>

                
                <!-- Footer -->
               <?php include '../tema_menu/footer.php'?>
            </div>
        </div>
        
    </body>
</html>
