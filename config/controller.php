<?php 

// fungsi menampilkan data
function select($query)
{
    // panggil koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


//fungsi menambahkan data barang
function create_barang($post)
{
    global $koneksi;

    $kode = $post['kodebarang'];
    $nama = $post['namabarang'];
    $harga = $post['hargabarang'];

    //query tambah data
    $query = "INSERT INTO barang VALUES(null,'$kode', '$nama', '$harga')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}

//fungsi mengubah data barang
function update_barang($post){
    global $koneksi;

    $id_barang = $post['id'];
    $kode = $post['kodebarang'];
    $nama = $post['namabarang'];
    $harga = $post['hargabarang'];

    //query ubah data
    $query = "UPDATE barang SET kode = '$kode', nama = '$nama', harga = '$harga' WHERE id = $id_barang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}

//fungsi menghapus data barang
function delete_barang($id_barang){
    global $koneksi;

    //query hapus data
    $query = "DELETE FROM barang WHERE id = $id_barang";
     
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 

}

//fungsi menambahkan data user
function create_user($post)
{
    global $koneksi;

    $username = strip_tags($post['username']);
    $nama_lengkap = strip_tags($post['nama_lengkap']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    //$password = password_hash($password, PASSWORD_DEFAULT);
    //query tambah data
    $query = "INSERT INTO tuser VALUES(null,'$username', '$nama_lengkap', '$password', '$level')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}

//fungsi mengubah data user
function update_user($post)
{
    global $koneksi;

    $id_user = strip_tags($post['id']);
    $username = strip_tags($post['username']);
    $nama_lengkap = strip_tags($post['nama_lengkap']);
    $password = strip_tags($post['password']);
    $level =  strip_tags($post['level']);

    //$password = password_hash($password, PASSWORD_DEFAULT);
 
    //query tambah data
   $query = "UPDATE tuser SET username = '$username', nama_lengkap = '$nama_lengkap', password = '$password', level = '$level' WHERE id = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}


//fungsi menghapus data user
function delete_user($id_user){
    global $koneksi;

    //query hapus data
    $query = "DELETE FROM tuser WHERE id = $id_user";
     
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 

}

//fungsi menambahkan data pesanan
function create_pesanan($post)
{
    //memanggil function tgl
    include('function_tgl.php');

    global $koneksi;

    $id_pesanan = strip_tags($post['id']);
    $nama = strip_tags($post['nama']);
    $tanggal = strip_tags($post['tanggal']);
    $tgl_permintaan = strip_tags($post['tgl_permintaan']);

    //mengkonversi ke database
    // $tanggal1 = Inputtgl($tanggal);
    // $tanggal2 = Inputtgl($tgl_permintaan);

    //query tambah data
    $query = "INSERT INTO pesanan VALUES('$id', '$nama', '$tanggal', '$tgl_permintaan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}

//fungsi menghapus data pesanan
function delete_pesanan($id_pesanan){
    global $koneksi;

    //query hapus data
    $query = "DELETE FROM pesanan WHERE id = $id_pesanan";
     
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 

}

//fungsi menambahkan data pesanan
function create_detailpesanan($post)
{
    //memanggil function tgl

    global $koneksi;

     $id_detailpesanan = $post['id'];
    $id_barang = $post['id_barang'];
     $id_pesanan = $post['id_pesanan'];
    $jumlah = $post['jumlah'];

    //mengkonversi ke database
    // $tanggal1 = Inputtgl($tanggal);
    // $tanggal2 = Inputtgl($tgl_permintaan);

    //query tambah data
    $query = "INSERT INTO detail_pesanan VALUES('$id', '$id_barang', '$id_pesanan', '$jumlah')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}

function update_detailpesanan($post){
    global $koneksi;

    $id_detailpesanan = $post['id'];
    $id_barang = $post['id_barang'];
     $id_pesanan = $post['id_pesanan'];
    $jumlah = $post['jumlah'];

    //query ubah data
    $query = "UPDATE detail_pesanan SET id = '$id_barang', id_barang = '$id_pesanan', harga = '$jumlah' WHERE id = $id_detailpesanan";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}


?>
