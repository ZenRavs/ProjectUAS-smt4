<?php
session_start();
if (isset($_POST['id_mhs'])) {
    include 'supabaseConnect.php';
    $id_mhs = $_POST['id_mhs'];
    $kode_faku = $_POST['kode_faku'];
    $kode_jurusan = $_POST['kode_jurusan'];
    $nim = $_POST['nim_mhs'];
    $nama = $_POST['nama_mhs'];
    $alamat = $_POST['alamat_mhs'];
    $telp = $_POST['telp_mhs'];
    $email = $_POST['email_mhs'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $query = "UPDATE mahasiswa SET kode_fakultas = '$kode_faku', kode_jurusan = '$kode_jurusan', nim = '$nim', nama = '$nama', alamat = '$alamat', telp = '$telp', email = '$email', tanggal_lahir = '$tanggal_lahir' WHERE id_mhs = $id_mhs";
    $result = pg_query($dbconn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'Invalid request.';
}
