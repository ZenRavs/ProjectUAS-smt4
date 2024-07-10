<?php
include 'supabaseConnect.php';
include 'delete_fungsi.php';
session_start();
$id_mhs = ['id_mhs' => $_POST['id_mhs']];
print_r($_POST);
if (isset($_SESSION['user'])) {
    if (isset($_POST['id_mhs'])) {
        // Memanggil Query
        $result = pg_delete($dbconn, 'mahasiswa', $id_mhs);
        if ($result) {
            // Kembali ke Halaman setelah hapus
            header("Location: dashboard.php");
        } else {
            echo "Error: Could not delete record.";
        }
    } else {
        echo "Error deleting record: " . pg_last_error($dbconn);
    }
    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo "Invalid request.";
}
