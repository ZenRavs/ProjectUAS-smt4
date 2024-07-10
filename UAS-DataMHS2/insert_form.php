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
        <form id="insertForm" method="post">
            <div class="form-group">
                <label for="kode_faku">Fakultas</label>
                <input type="text" class="form-control" id="kode_faku" name="kode_faku" required>
            </div>
            <div class="form-group">
                <label for="kode_jurusan">Jurusan:</label>
                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" required>
            </div>
            <div class="form-group">
                <label for="nim_mhs">NIM:</label>
                <input type="text" class="form-control" id="nim_mhs" name="nim_mhs" required>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#insertForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'insert_mhs.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        window.location.href = 'table_mhs.php'; // Redirect to table_mhs.php
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghubungi server.');
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
