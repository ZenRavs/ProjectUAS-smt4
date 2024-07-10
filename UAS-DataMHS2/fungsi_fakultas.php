<?php
include 'supabaseConnect.php';
session_start();

try {
if (isset($_SESSION['user'])) {
    // Mengambil data dari form
    $faku = $_POST['kode'];
    $fakultas = $_POST['fakultas'];
    print_r ($_POST);

    //perintah sql
    $table = 'fakultas';
    $data = [
        'kode' => $faku,
        'fakultas' => $fakultas,
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
} catch (Exception $e) {
    
}