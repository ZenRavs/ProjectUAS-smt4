<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    if (isset($_POST['id_faku'])) {
        $id_faku = ['id_faku' => $_POST['id_faku']];
        
        // Memanggil Query
        $result = pg_delete($dbconn, 'fakultas', $id_faku);
        if ($result) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Could not delete record."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "ID not provided."]);
    }
    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
