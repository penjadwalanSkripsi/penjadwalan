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

      if (isset($_POST['tambah_pesanan'])) {
            if (create_pesanan($_POST) > 0) {
                echo "<script>
                        alert('Data Pesanan Berhasil Ditambahkan');
                        document.location.href = 'lihat_pesanan.php';
                </script>";
            }else {
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
            <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama pemesan" required>
            </div>


             <div class="form-group">
                        <label for="tanggal">Tanggal Pesanan:</label>
                        <div class="input-group date" id="id_4">
                            <input type="date" value="" id="tanggal" name="tanggal" class="form-control" required/>
                            
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="tgl_permintaan">Tanggal Permintaan:</label>
                        <div class="input-group date" id="id_4">
                            <input type="date" value="" id="tgl_permintaan" name="tgl_permintaan" class="form-control" required/>
                            
                        </div>
                    </div>

            <button type="submit" name="tambah_pesanan" class="btn btn-primary btn-sm col-xs-2 margin-left" style="float: right;"><i class="fas fa-plus-square"></i> Tambahkan</button>

            </form>

            </div>       

            </main>
                
                <!-- Footer -->
               <?php include '../tema_menu/footer.php'?>
            </div>
        </div>
        
    </body>

</html>
