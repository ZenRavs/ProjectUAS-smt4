<?php
include 'supabaseConnect.php';
include 'delete_fungsi.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil ID mahasiswa dari form
    $id_mhs = $_POST['id_mhs'];

    // Memanggil fungsi delete_mahasiswa
    if (delete($dbconn, $id_mhs)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . pg_last_error($dbconn);
    }

    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo "Invalid request.";
}
?>
