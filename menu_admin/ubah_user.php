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

    $id_user = (int)$_GET['id'];

    $tuser = select("SELECT * FROM tuser WHERE id = $id_user")[0];

      if (isset($_POST['tambah'])) {
            if (update_user($_POST) > 0) {
                echo "<script>
                        alert('Data User Berhasil Diubah');
                        document.location.href = 'lihat_user.php';
                </script>";
            }else {
              echo "<script>
                        alert('Data Barang Gagal Diubah');
                        document.location.href = 'lihat_user.php';
                </script>";  
            }

        }      
    
    ?> 
   



            <div id="layoutSidenav_content">
            <main>
            <div class="container mt-5">
            <h1>Ubah User</h1>
            <hr>

            <form action="" method="post">
            <input type="hidden" name="id" value="<?= $tuser['id']; ?>">
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value=<?= $tuser['username']; ?> readonly="readonly" >
            </div>

            <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="nama lengkap" value=<?= $tuser['nama_lengkap']; ?> required>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="masukan password baru" required>
            </div>

            <div class="mb-3">
            <label for="level" class="form-label">Level</label >
            <select name="level" id="level" class="form-control" required>
                <?php $level = $tuser['level']; ?>
                <option value="Admin" <?= $level == 'Admin' ? 'selected' : null ?> >Admin</option>
                <option value="Manager" <?= $level == 'Manager' ? 'selected' : null ?> >Manager Produksi</option>
                <option value="Direktur" <?= $level == 'Direktur' ? 'selected' : null ?> >Direktur</option>
            </select>
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
