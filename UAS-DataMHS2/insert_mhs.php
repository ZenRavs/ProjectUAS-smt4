<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nim = $_POST['nim_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $fakultas_mhs = $_POST['kode_faku'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat_mhs'];
    $telp_mhs = $_POST['telp_mhs'];
    $email_mhs = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Menyiapkan pernyataan SQL untuk menambah data
    $query = "INSERT INTO mahasiswa (nim, nama,kode_fakultas, kode_jurusan, alamat, telp, email, tanggal_lahir) 
              VALUES ('$nim', '$nama_mhs', '$fakultas_mhs', '$jurusan_mhs', '$alamat_mhs', '$telp_mhs', '$email_mhs', '$tanggal_lahir')";

    $result = pg_update($dbconn, $table, $data, $condition);
    // Mengeksekusi pernyataan SQL
    if ($result) {
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
?>
