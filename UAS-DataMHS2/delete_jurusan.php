<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && isset($_POST['kode_jurusan'])) {
    // Mengambil kode jurusan dari parameter POST
    $kode_jurusan = $_POST['kode_jurusan'];

    // Menyiapkan pernyataan SQL untuk menghapus data
    $query = "DELETE FROM jurusan WHERE kode = $1";
    $result = pg_query_params($dbconn, $query, array($kode_jurusan));

    // Cek hasil delete
    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan: " . pg_last_error($dbconn);
    }
} else {
    echo "Invalid request.";
}
?>
