<?php
include 'supabaseConnect.php';

// Mengambil data dari form
$id_mhs = $_POST['id_mhs'];
<<<<<<< HEAD
$username_mhs = $_POST['username_mhs'];
$password_mhs = $_POST['password_mhs'];
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama_mhs'];
$alamat_mhs = $_POST['alamat_mhs'];
$telp_mhs = $_POST['telp_mhs'];
$email_mhs = $_POST['email_mhs'];
=======
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama'];
$username_mhs = $_POST['kode_fakultas'];
$password_mhs = $_POST['kode_jurusan'];
$alamat_mhs = $_POST['alamat'];
$telp_mhs = $_POST['telp'];
$email_mhs = $_POST['email'];
>>>>>>> 529bc80b30d4c5ba1eb38717aef409b2ccd602c1
$tanggal_lahir = $_POST['tanggal_lahir'];

// Menyiapkan pernyataan SQL untuk memasukkan data
$sql = "INSERT INTO mahasiswa (id_mhs, username_mhs, password_mhs, nim, nama_mhs, alamat_mhs, telp_mhs, email_mhs, tanggal_lahir) 
        VALUES ('$id_mhs', '$username_mhs', '$password_mhs', '$nim', '$nama_mhs', '$alamat_mhs', '$telp_mhs', '$email_mhs', '$tanggal_lahir')";

// Mengeksekusi pernyataan SQL
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
<<<<<<< HEAD

// Menutup koneksi
$conn->close();
?>
=======
>>>>>>> 529bc80b30d4c5ba1eb38717aef409b2ccd602c1
