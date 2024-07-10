<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $id_mhs = $_POST['id_mhs'];
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama'];
    $fakultas_mhs = $_POST['kode_fakultas'];
    $jurusan_mhs = $_POST['kode_jurusan'];
    $alamat_mhs = $_POST['alamat'];
    $telp_mhs = $_POST['telp'];
    $email_mhs = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    
    <td><?php echo $mhs['id_mhs'] ?></td>
                        <td><?php echo $mhs['nim'] ?></td>
                        <td><?php echo $mhs['nama'] ?></td>
                        <td><?php echo $mhs['kode_fakultas'] ?></td>
                        <td><?php echo $mhs['kode_jurusan'] ?></td>
                        <td><?php echo $mhs['alamat'] ?></td>
                        <td><?php echo $mhs['telp'] ?></td>
                        <td><?php echo $mhs['email'] ?></td>
                        <td><?php echo $mhs['tanggal_lahir'] ?></td>


    // Menyiapkan pernyataan SQL untuk mengupdate data
    $query = "UPDATE mahasiswa SET 
        nim='$nim', 
        nama='$nama_mhs', 
        kode_fakultas='$fakultas_mhs', 
        kode_jurusan='$jurusan_mhs', 
        alamat='$alamat_mhs', 
        telp='$telp_mhs', 
        email='$email_mhs', 
        tanggal_lahir='$tanggal_lahir' 
        WHERE id_mhs=$id_mhs";

    // Mengeksekusi pernyataan SQL
    if (pg_query($dbconn, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . pg_last_error($dbconn);
    }

    // Menutup koneksi
    pg_close($dbconn);
} else {
    echo "Invalid request.";
}
?>
