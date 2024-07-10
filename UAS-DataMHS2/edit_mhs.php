<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $id_mhs = $_POST['id_mhs'];
    $nim = $_POST['nim_mhs'];
    $fakultas_mhs = $_POST['kode_faku'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $nama_mhs = $_POST['nama_mhs'];
    $alamat_mhs = $_POST['alamat_mhs'];
    $telp_mhs = $_POST['telp_mhs'];
    $email_mhs = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Menyiapkan pernyataan SQL untuk mengupdate data
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
