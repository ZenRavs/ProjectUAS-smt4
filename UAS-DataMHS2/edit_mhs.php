<?php
include 'supabaseConnect.php';
session_start();
$id_mhs = $_POST['id_mhs'];
$username_mhs = $_POST['username_mhs'];
$password_mhs = $_POST['password_mhs'];
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama_mhs'];
$alamat_mhs = $_POST['alamat_mhs'];
$telp_mhs = $_POST['telp_mhs'];
$email_mhs = $_POST['email.mhs'];
$tanggal_lahir = $_POST['tanggal_lahir'];
?>
<pre>
<?php
print_r($_POST);
?>
</pre>