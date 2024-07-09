<?php
include 'supabaseConnect.php';

$id_mhs = $_POST['id_mhs'];
$username_mhs = $_POST['username'];
$password_mhs = $_POST['password'];
$nim = $_POST['nim'];
$nama_mhs = $_POST['nama'];
$alamat_mhs = $_POST['alamat'];
$telp_mhs = $_POST['telp'];
$email_mhs = $_POST['email'];
$tanggal_lahir = $_POST['tanggal_lahir'];

$sql = "UPDATE mahasiswa SET 
    username='$username_mhs', 
    password='$password_mhs', 
    nim='$nim', 
    nama='$nama_mhs', 
    alamat='$alamat_mhs', 
    telp='$telp_mhs', 
    email='$email_mhs', 
    tanggal_lahir='$tanggal_lahir' 
    WHERE id_mhs=$id_mhs";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<pre>
<?php
print_r($_POST);
?>
</pre>