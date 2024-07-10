<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    // Mengambil data dari form
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $kode_faku = $_POST['kode_faku'];

    // Menyiapkan pernyataan SQL untuk menambah data
    $table = 'jurusan';
    $data = [
        'kode' => $kode_jurusan,
        'jurusan' => $nama_jurusan,
        'kode_faku' => $kode_faku
    ];

    // Menyimpan data ke dalam database
    $result = pg_insert($dbconn, $table, $data);

    // Debug: Cek hasil insert
    if ($result) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan: " . pg_last_error($dbconn);
    }
} else {
    echo "Invalid request.";
}
?>
<script>
    $(document).ready(function() {
        $('.content-inner').load('table_jurusan.php');
    });
</script>