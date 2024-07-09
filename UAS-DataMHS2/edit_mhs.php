<?php
include 'supabaseConnect.php';
session_start();
$id_mhs = $_POST['id_mhs'];
$username_mhs = $_POST['id_mhs'];
$password_mhs = $_POST['id_mhs'];
$nim = $_POST['id_mhs'];
$nama_mhs = $_POST['id_mhs'];
$alamat_mhs = $_POST['id_mhs'];
$telp_mhs = $_POST['id_mhs'];
$email_mhs = $_POST['id_mhs'];
$tanggal_lahir = $_POST['id_mhs'];
?>
<pre>
<?php
print_r($_POST);
?>
</pre>