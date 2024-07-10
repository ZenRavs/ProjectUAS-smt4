<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    if (isset($_POST['id_mhs'])) {
        $id_mhs = $_POST['id_mhs'];

        // Memanggil Query
        $query = "DELETE FROM mahasiswa WHERE id_mhs = $1";
        $result = pg_delete($dbconn, 'mahasiswa', $condition);

        if ($result) {
            // Kembali ke Halaman setelah hapus
            header("Location: dashboard.php");

        } else {
            echo "Error: Could not delete record.";
        }
    } else {
        echo "Error: Missing student ID.";
    }
} else {
    header("Location: index.php");
}
?>
