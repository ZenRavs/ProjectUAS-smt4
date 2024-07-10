<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h2>Tambah Data Mahasiswa</h2>
        <form action="insert_mahasiswa.php" method="post">
            <div class="form-group">
                <label for="username_mhs">Username:</label>
                <input type="text" class="form-control" id="username_mhs" name="username_mhs" required>
            </div>
            <div class="form-group">
                <label for="password_mhs">Password:</label>
                <input type="password" class="form-control" id="password_mhs" name="password_mhs" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama_mhs">Nama:</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required>
            </div>
            <div class="form-group">
                <label for="alamat_mhs">Alamat:</label>
                <textarea class="form-control" id="alamat_mhs" name="alamat_mhs" required></textarea>
            </div>
            <div class="form-group">
                <label for="telp_mhs">Telepon:</label>
                <input type="text" class="form-control" id="telp_mhs" name="telp_mhs" required>
            </div>
            <div class="form-group">
                <label for="email_mhs">Email:</label>
                <input type="email" class="form-control" id="email_mhs" name="email_mhs" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambah</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
