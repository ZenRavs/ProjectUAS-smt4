<?php
include("dbconnect.php");

$id = $_GET['urut'];
$jenis = $_GET['jenis'];
$page = isset($_GET['page']) ? $_GET['page'] : 'default'; // Set a default value if 'page' is not set

if ($jenis == 'users') {
    $result = $k->query("SELECT * FROM users WHERE id = ".$id);
    if ($result) {
        $data = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }
    ?>
    <form action="editaction.php?urut=<?php echo $id; ?>&jenis=users&page=<?php echo $page; ?>" method="POST">
        <label for="username">Username : </label>
        <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required><br>

        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <label for="paswd">Password:</label>
        <input type="password" id="paswd" name="paswd" placeholder=""><br><br>

        <button type="submit">Update</button>
    </form>
    <?php
} elseif ($jenis == 'mahasiswa') {
    $result = $k->query("SELECT * FROM mahasiswa WHERE id = ".$id);
    if ($result) {
        $data = $result->fetch_assoc();
    } else {
        echo "Mahasiswa not found!";
        exit;
    }
    ?>
    <form action="editaction.php?urut=<?php echo $id; ?>&jenis=mahasiswa&page=<?php echo $page; ?>" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $data['nim']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>" required><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
    <?php
}
?>
