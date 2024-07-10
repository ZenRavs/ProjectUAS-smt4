<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    $fakultas_mhs = $_POST['kode_faku'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    print_r ($_POST);

    $table = 'fakultas';
    $data = [
        'kode_faku' => $fakultas_mhs,
        'kode_jurusan' => $jurusan_mhs,
    ];
    $result = pg_insert($dbconn, $table, $data);
} else {
    echo "Invalid request.";
}