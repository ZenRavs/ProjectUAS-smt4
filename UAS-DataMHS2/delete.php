<?php
include 'supabaseConnect.php';
include 'delete_fungsi.php';
session_start();
<<<<<<< HEAD

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil ID mahasiswa dari form
    $id_mhs = $_POST['id_mhs'];

    // Memanggil fungsi delete_mahasiswa
    if (delete($dbconn, $id_mhs)) {
        echo "Record deleted successfully";
=======
$id_mhs = $_POST['id_mhs'];
print_r($_POST);
if (isset($_SESSION['user'])) {
    if (isset($_POST['id_mhs'])) {
        // Memanggil Query
        $result = pg_delete($dbconn, 'mahasiswa', $id_mhs);
        if ($result) {
            // Kembali ke Halaman setelah hapus
            //header("Location: dashboard.php");
        } else {
            echo "Error: Could not delete record.";
        }
>>>>>>> c00d476ba304ab275e5ed347cbafbfbd639d9aeb
    } else {
        echo "Error deleting record: " . pg_last_error($dbconn);
    }

    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo "Invalid request.";
}
