<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    try {
        // Mengambil data dari form
        $faku = $_POST['kode'];
        $fakultas = $_POST['fakultas'];

        //perintah sql
        $table = 'fakultas';
        $data = [
            'kode' => $faku,
            'fakultas' => $fakultas,
        ];

        $result = pg_insert($dbconn, $table, $data);

        if ($result) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Could not insert record."]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
