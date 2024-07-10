<?php
include 'supabaseConnect.php';

function delete_mahasiswa($dbconn, $id_mhs) {
    // Menyiapkan pernyataan SQL untuk menghapus data
    $query = "DELETE FROM mahasiswa WHERE id_mhs = $1";
    $result = pg_query_params($dbconn, $query, array($id_mhs));

    if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        // Mengambil ID mahasiswa dari form
        $id_mhs = $_POST['id_mhs'];
    
        // Memanggil fungsi delete_mahasiswa
        if (delete_mahasiswa($dbconn, $id_mhs)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . pg_last_error($dbconn);
        }
    
        // Menutup koneksi
        pg_close($dbconn);
    } else {
        echo "Invalid request.";
    }

    header('location: dashboard.php');
}
?>
