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
            if (create_user($_POST) > 0) {
                echo "<script>
                        alert('Data User Berhasil Ditambahkan');
                        document.location.href = 'lihat_user.php';
                </script>";
            }else {
              echo "<script>
                        alert('Data Barang Gagal Ditambahkan');
                        document.location.href = 'lihat_user.php';
                </script>";  
            }

        }      
    
    ?> 
   



            <div id="layoutSidenav_content">
            <main>
            <div class="container mt-5">
            <h1>Tambah User</h1>
            <hr>

            <form action="" method="post">
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
            </div>

            <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="nama lengkap" required>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>

            <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select name="level" id="level" class="form-control" required>
                <option value="">Pilih Jabatan</option>
                <option value="1">Admin</option>
                <option value="2">Manager Produksi</option>
                <option value="3">Direktur</option>
            </select>
        </div>

            <button type="submit" name="tambah" class="btn btn-primary btn-sm col-xs-2 margin-left" style="float: right;"><i class="fas fa-plus-square"></i> Tambahkan</button>

            </form>

            </div>       

            </main>
                
                <!-- Footer -->
               <?php include '../tema_menu/footer.php'?>
            </div>
        </div>
        
    </body>
</html>
