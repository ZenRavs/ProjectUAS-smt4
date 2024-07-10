<?php
include 'supabaseConnect.php';
session_start();

if (isset($_POST['id_faku'])) {
    $kode_faku = $_POST['id_faku'];
    $kode_jurusan = $_POST['fakultas'];
    print_r ($_POST);

    $query = "UPDATE fakultas SET kode_jurusan = '$kode_jurusan' WHERE kode_faku = $kode_faku";
    $result = pg_query($dbconn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'Ada kesalahan.';
}
?>
