<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $id_mhs = $_POST['id_mhs'];
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama'];
    $fakultas_mhs = $_POST['username'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat'];
    $telp_mhs = $_POST['telp'];
    $email_mhs = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Menyiapkan pernyataan SQL untuk mengupdate data
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

    // Mengeksekusi pernyataan SQL
    if (pg_update($dbconn, $query)) {
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
