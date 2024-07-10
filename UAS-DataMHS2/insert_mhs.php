<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari formS
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $fakultas_mhs = $_POST['username'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat_mhs'];
    $telp_mhs = $_POST['telp_mhs'];
    $email_mhs = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Menyiapkan pernyataan SQL untuk menambah data
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
    $result = pg_insert($dbconn, $table, $data);

    // Mengecek hasil eksekusi
    if ($result) {
        echo "Record added successfully";
    } else {
        echo "Error adding record: " . pg_last_error($dbconn);
    }
    header('location: dashboard.php');
    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo "Invalid request.";
}
