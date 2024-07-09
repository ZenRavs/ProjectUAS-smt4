<?php
include 'supabaseConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form action="dashboard.php" method="post">
            <input type="hidden" name="id_mhs" value="<?php echo $row['id_mhs']; ?>">
            <div class="form-group">
                <label for="username_mhs">Username :</label>
                <input type="text" class="form-control" id="username_mhs" name="username_mhs" value="<?php echo $row['username_mhs']; ?>">
            </div>
            <div class="form-group">
                <label for="password_mhs">Password:</label>
                <input type="password" class="form-control" id="password_mhs" name="password_mhs" value="<?php echo $row['password_mhs']; ?>">
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>">
            </div>
            <div class="form-group">
                <label for="nama_mhs">Nama:</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?php echo $row['nama_mhs']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat_mhs">Alamat:</label>
                <textarea class="form-control" id="alamat_mhs" name="alamat_mhs"><?php echo $row['alamat_mhs']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="telp_mhs">Telepon:</label>
                <input type="text" class="form-control" id="telp_mhs" name="telp_mhs" value="<?php echo $row['telp_mhs']; ?>">
            </div>
            <div class="form-group">
                <label for="email_mhs">Email:</label>
                <input type="email" class="form-control" id="email_mhs" name="email_mhs" value="<?php echo $row['email_mhs']; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>