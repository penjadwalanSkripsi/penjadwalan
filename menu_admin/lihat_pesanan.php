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
   $data_pesanan = select("SELECT * FROM pesanan ");
   
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
                    <div class="container-fluid">
                        <h1 class="mt-4">Lihat Data Pesanan</h1>
                        <br>
                        
                        <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Jumlah Barang :</div>
                                </div>
                                    </div>
                            </div>

                               <!-- Button to Open the Modal 
                                    <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                                        Tambah Pesanan Baru
                                    </button> -->
                         
                      

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Pesanan
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" table-striped mt-3 id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Id Pesanan</th>
                                                <th>Nama Pemesan</th>
                                                <th>Tanggal Pesanan</th>
                                                <th>Tanggal Permintaan</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                      
                                            <?php foreach ($data_pesanan as $pesanan) : ?>
                                            <tr>
                                                <td><?= $pesanan['id']; ?></td>
                                                <td><?= $pesanan['nama']; ?></td>
                                                <td><?= date('d-m-Y', strtotime($pesanan['tanggal'])); ?></td>
                                                 <td><?= date('d-m-Y', strtotime($pesanan['tgl_permintaan'])); ?></td>
                                                 <td></td>
                            

                                                <td width="15%" class="text-center">
                                                <a href="lihat_detailpesanan.php?idp=<?= $pesanan['id']; ?>" class="btn btn-primary">Tampilkan</a>
                                                <a href="hapus_pesanan.php?id=<?= $pesanan['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Data User : <?= $tuser['nama_lengkap']; ?>  Akan Dihapus ?');"><i class="fas fa-trash"></i></a>
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

    <!-- 
     the modal
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        modal header
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pesanan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        modal body
        <div class="modal-body">
           <input type="text" name="nama_pemesan" class="form-control mt-2" placeholder="nama pemesan" >
            <input type="text" name="tanggal" class="form-control mt-2" placeholder="tanggal" >
             <input type="text" name="tanggal_permintaan" class="form-control mt-2" placeholder="tanggal permintaan" >
        </div>
        
        modal footer
        <div class="modal-footer">
         <button type="button" class="btn btn-success" name="tambah_pesanan">Tambah</button>                                   
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
-->


        
      </div>
    </div>
  </div>
</html>
