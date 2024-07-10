<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    //ambil
    $kode_mhs = $_POST['kode'];
    $fakultas_mhs = $_POST['fakultas'];
    // print_r ($_POST);

    //perintah sql
    $table = 'fakultas';
    $data = [
        'kode' => $kode_mhs,
        'fakultas' => $fakultas_mhs,
    ];
    $result = pg_insert($dbconn, $table, $data);
?>
    <script>
        $(document).ready(function() {
            $('.content-inner').load('table_fakultas.php');
        });
    </script>
<?php
} else {
    echo "Invalid request.";
}