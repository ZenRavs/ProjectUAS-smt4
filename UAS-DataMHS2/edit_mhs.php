<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $id_mhs = $_POST['id_mhs'];
<<<<<<< HEAD
    $nim = $_POST['nim_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $fakultas_mhs = $_POST['kode_faku'];
=======
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama'];
    $fakultas_mhs = $_POST['username'];
>>>>>>> 0c6ee6e7e7c588b27fb9aee9d4e316bd6b809fb1
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat_mhs'];
    $telp_mhs = $_POST['telp_mhs'];
    $email_mhs = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Menyiapkan pernyataan SQL untuk mengupdate data
<<<<<<< HEAD
    $table = 'mahasiswa';
    $data = [
        'nim' => $nim,
        'nama' => $nama_mhs,
        'kode_fakultas' => $fakultas_mhs,
        'kode_jurusan' => $jurusan_mhs,
        'alamat' => $alamat_mhs,
        'telp' => $telp_mhs,
        'email' => $email_mhs,
        'tanggal_lahir' => $tanggal_lahir
    ];
    $condition = ['id_mhs' => $id_mhs];
=======
    $update = "UPDATE mahasiswa SET 
        nim='$nim', 
        nama='$nama_mhs', 
        username='$fakultas_mhs', 
        kode_jurusan='$jurusan_mhs', 
        alamat='$alamat_mhs', 
        telp='$telp_mhs', 
        email='$email_mhs', 
        tanggal_lahir='$tanggal_lahir' 
        WHERE id_mhs=$id_mhs";
>>>>>>> 0c6ee6e7e7c588b27fb9aee9d4e316bd6b809fb1

    $result = pg_update($dbconn, $table, $data, $condition);
    // Mengeksekusi pernyataan SQL
<<<<<<< HEAD
    if ($result) {
=======
    if (pg_update($dbconn, $query)) {
>>>>>>> 0c6ee6e7e7c588b27fb9aee9d4e316bd6b809fb1
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . pg_last_error($dbconn);
    }
    header('location: dashboard.php');
    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo "Invalid request.";
}
