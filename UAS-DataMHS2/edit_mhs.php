<?php
include 'supabaseConnect.php';

// Mengambil data dari form
$id_mhs = $_POST['id_mhs'];
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama'];
$username_mhs = $_POST['kode_fakultas'];
$password_mhs = $_POST['kode_jurusan'];
$alamat_mhs = $_POST['alamat'];
$telp_mhs = $_POST['telp'];
$email_mhs = $_POST['email'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Menyiapkan pernyataan SQL untuk mengupdate data
$sql = "UPDATE mahasiswa SET 
    username='$username_mhs', 
    password='$password_mhs', 
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
    echo "Error updating record: ";
}
