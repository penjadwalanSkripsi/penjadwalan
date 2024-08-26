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
function update_barang($post)
{
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
function delete_barang($id_barang)
{
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
function delete_user($id_user)
{
    global $koneksi;

    //query hapus data
    $query = "DELETE FROM tuser WHERE id = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//create customer
function create_customer($post)
{
    global $koneksi;

    $id_customer = strip_tags($post['id_customer']);
    $nama = strip_tags($post['nama']);
    $alamat = strip_tags($post['alamat']);
    $no_hp = strip_tags($post['no_hp']);
    $email = strip_tags($post['email']);
    $tgl_daftar = strip_tags($post['tgl_daftar']);

    //query tambah data
    $query = "INSERT INTO customer VALUES('$id_customer', '$nama', '$alamat', '$no_hp', '$email', '$tgl_daftar')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


//update customer
function update_customer($post)
{
    global $koneksi;

    // Mengambil data dari form dan meloloskan karakter khusus
    $id_customer = mysqli_real_escape_string($koneksi, strip_tags($post['id_customer']));
    $nama = mysqli_real_escape_string($koneksi, strip_tags($post['nama']));
    $alamat = mysqli_real_escape_string($koneksi, strip_tags($post['alamat']));
    $no_hp = mysqli_real_escape_string($koneksi, strip_tags($post['no_hp']));
    $email = mysqli_real_escape_string($koneksi, strip_tags($post['email']));
    $tgl_daftar = mysqli_real_escape_string($koneksi, strip_tags($post['tgl_daftar']));

    // Memastikan ID customer menggunakan tanda petik jika merupakan tipe string
    $query = "UPDATE customer SET 
                nama = '$nama', 
                alamat = '$alamat', 
                no_hp = '$no_hp', 
                email = '$email', 
                tgl_daftar = '$tgl_daftar' 
              WHERE id_customer = '$id_customer'";

    mysqli_query($koneksi, $query);

    // Pengecekan error untuk debugging
    if (mysqli_error($koneksi)) {
        echo "Error: " . mysqli_error($koneksi); // Debugging, hapus atau matikan dalam produksi
        return 0;
    }

    return mysqli_affected_rows($koneksi);
}


//delete customer
function delete_customer($id_customer)
{
    global $koneksi;

    // Escape id_customer untuk mencegah SQL Injection
    $id_customer = mysqli_real_escape_string($koneksi, $id_customer);

    // query hapus data dengan tanda petik tunggal untuk string
    $query = "DELETE FROM customer WHERE id_customer = '$id_customer'";

    mysqli_query($koneksi, $query);

    // Tambahkan pengecekan error untuk debugging
    if (mysqli_error($koneksi)) {
        echo "Error: " . mysqli_error($koneksi); // Untuk debugging, hapus atau matikan dalam produksi
        return 0;
    }

    return mysqli_affected_rows($koneksi);
}
//fungsi menambahkan data pesanan
function create_pesanan($post)
{
    //memanggil function tgl
    include('function_tgl.php');

    global $koneksi;

    $id_pesanan = strip_tags($post['id_pesanan']);
    $tgl_pesanan = strip_tags($post['tgl_pesanan']);
    $id_customer = strip_tags($post['id_customer']);

    $query = "INSERT INTO pesanan VALUES('$id_pesanan', '$tgl_pesanan', '$id_customer')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi menghapus data pesanan
function delete_pesanan($id_pesanan)
{
    global $koneksi;

    $id_pesanan = mysqli_real_escape_string($koneksi, $id_pesanan);

    // query hapus data dengan tanda petik tunggal untuk string
    $query = "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'";

    mysqli_query($koneksi, $query);

    // Tambahkan pengecekan error untuk debugging
    if (mysqli_error($koneksi)) {
        echo "Error: " . mysqli_error($koneksi); // Untuk debugging, hapus atau matikan dalam produksi
        return 0;
    }

    return mysqli_affected_rows($koneksi);
}

function create_detailpesanan($post)
{

    global $koneksi;

    $id_detail_pesanan = $post['id_detail_pesanan'];
    $id_pesanan = $post['id_pesanan'];
    $id_barang = $post['id_barang'];
    $qty = $post['qty'];
    $tgl_permintaan = $post['tgl_permintaan'];


    //query tambah data
    $query = "INSERT INTO detail_pesanan VALUES('$id_detail_pesanan', '$id_pesanan', '$id_barang', '$qty', '$tgl_permintaan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_detailpesanan($post)
{
    global $koneksi;

    // Mengambil data dari form dan meloloskan karakter khusus
    $id_detail_pesanan = mysqli_real_escape_string($koneksi, strip_tags($post['id_detail_pesanan']));
    $id_pesanan = mysqli_real_escape_string($koneksi, strip_tags($post['id_pesanan']));
    $id_barang = mysqli_real_escape_string($koneksi, strip_tags($post['id_barang']));
    $qty = mysqli_real_escape_string($koneksi, strip_tags($post['qty']));
    $tgl_permintaan = mysqli_real_escape_string($koneksi, strip_tags($post['tgl_permintaan']));
    // Memastikan ID customer menggunakan tanda petik jika merupakan tipe string
    $query = "UPDATE detail_pesanan SET 
                id_pesanan = '$id_pesanan', 
                id_barang = '$id_barang', 
                qty = '$qty', 
                tgl_permintaan = '$tgl_permintaan' 
              WHERE id_detail_pesanan = '$id_detail_pesanan'";
    mysqli_query($koneksi, $query);

    // Pengecekan error untuk debugging
    if (mysqli_error($koneksi)) {
        echo "Error: " . mysqli_error($koneksi); // Debugging, hapus atau matikan dalam produksi
        return 0;
    }

    return mysqli_affected_rows($koneksi);
}

function delete_detailpesanan($id_detail_pesanan)
{
    global $koneksi;

    $id_detail_pesanan = mysqli_real_escape_string($koneksi, $id_detail_pesanan);

    // query hapus data dengan tanda petik tunggal untuk string
    $query = "DELETE FROM detail_pesanan WHERE id_detail_pesanan = '$id_detail_pesanan'";

    mysqli_query($koneksi, $query);

    // Tambahkan pengecekan error untuk debugging
    if (mysqli_error($koneksi)) {
        echo "Error: " . mysqli_error($koneksi); // Untuk debugging, hapus atau matikan dalam produksi
        return 0;
    }

    return mysqli_affected_rows($koneksi);
}

function generateIdDetailPesanan()
{
    global $koneksi;

    // Query untuk mendapatkan ID terakhir
    $query = "SELECT id_detail_pesanan FROM detail_pesanan ORDER BY id_detail_pesanan DESC LIMIT 1";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    // Jika belum ada data sama sekali
    if ($row) {
        $lastId = $row['id_detail_pesanan'];
        // Ambil angka dari ID terakhir
        $number = intval(substr($lastId, 7));
        $newId = 'DTLPSN' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $newId = 'DTLPSN001';
    }

    return $newId;
}
