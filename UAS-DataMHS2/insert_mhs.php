<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    include 'supabaseConnect.php';
    // Mengambil data dari form
    $nim = $_POST['nim_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $fakultas_mhs = $_POST['kode_faku'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat_mhs'];
    $telp_mhs = $_POST['telp_mhs'];
    $email_mhs = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Menyiapkan pernyataan SQL untuk menambah data
    $table = 'mahasiswa';
    $data = [
        'nim' => $nim,
        'nama' => $nama_mhs,
        'kode_fakultas' => $fakultas_mhs,
        'kode_jurusan' => $jurusan_mhs,
        'alamat' => $alamat_mhs,
        'telp' => $telp_mhs,
        'email' => $email_mhs,
        'tanggal_lahir' => $tanggal_lahir
    ];
    $result = pg_insert($dbconn, $table, $data);
?>
    <script>
        $(document).ready(function() {
            $('.content-inner').load('table_mhs.php');
        });
    </script>
<?php
} else {
    echo "Invalid request.";
}
