<?php
include 'supabaseConnect.php';

// Mengambil data dari form
$id_mhs = $_POST['id_mhs'];
$username_mhs = $_POST['username_mhs'];
$password_mhs = $_POST['password_mhs'];
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama_mhs'];
$alamat_mhs = $_POST['alamat_mhs'];
$telp_mhs = $_POST['telp_mhs'];
$email_mhs = $_POST['email_mhs'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Menyiapkan pernyataan SQL untuk mengupdate data
$sql = "UPDATE mahasiswa SET 
    username_mhs='$username_mhs', 
    password_mhs='$password_mhs', 
    nim='$nim', 
    nama_mhs='$nama_mhs', 
    alamat_mhs='$alamat_mhs', 
    telp_mhs='$telp_mhs', 
    email_mhs='$email_mhs', 
    tanggal_lahir='$tanggal_lahir' 
    WHERE id_mhs=$id_mhs";

// Mengeksekusi pernyataan SQL
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>