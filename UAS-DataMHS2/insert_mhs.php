<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    // Debug: Cek apakah data POST diterima
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    // Mengambil data dari form
    $nim = $_POST['nim_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $fakultas_mhs = $_POST['kode_faku'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat_mhs'];
    $telp_mhs = $_POST['telp_mhs'];
    $email_mhs = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // // Debug: Cek apakah semua variabel sudah di-set
    // var_dump($nim, $nama_mhs, $fakultas_mhs, $jurusan_mhs, $alamat_mhs, $telp_mhs, $email_mhs, $tanggal_lahir);

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

    // Debug: Cek apakah data sudah siap untuk dimasukkan
    // print_r($data);

    // Menyimpan data ke dalam database
    $result = pg_insert($dbconn, $table, $data);

    // Debug: Cek hasil insert
    if ($result) {
        // echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan: " . pg_last_error($dbconn);
    }
} else {
    echo "Invalid request.";
}
?>
