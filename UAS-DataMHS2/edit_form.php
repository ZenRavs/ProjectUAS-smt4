<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    $id_mhs = $_POST['id_mhs'];
    $query = "SELECT * FROM mahasiswa WHERE id_mhs = $id_mhs";
    $result = pg_query($dbconn, $query);
    $mhs = pg_fetch_assoc($result);
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Mahasiswa</title>
        <link href="https://maxcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-3 mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow">
                        <div class="card-header">
                            <h2 class="text-primary"> <?php echo $mhs['nama'] ?></h2>
                        </div>
                        <div class="card-body">
                            <form id="editForm" method="post">
                                <input type="hidden" name="id_mhs" value="<?php echo $id_mhs ?>">
                                <div class="form-group">
                                    <div class="row flex">
                                        <div class="col-md-2">
                                            <label for="username">Faklutas</label>
                                            <input type="text" class="form-control" id="kode_faku" name="kode_faku" value="<?php echo $mhs['kode_fakultas']; ?>" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="password_mhs">Jurusan</label>
                                            <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" value="<?php echo $mhs['kode_jurusan']; ?>" required>
                                        </div>
                                        <div class="col-md">
                                            <label for="nim">NIM</label>
                                            <input type="text" class="form-control" id="nim_mhs" name="nim_mhs" value="<?php echo $mhs['nim']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mhs">Nama</label>
                                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?php echo $mhs['nama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mhs">Alamat</label>
                                    <textarea class="form-control" id="alamat_mhs" name="alamat_mhs" required><?php echo $mhs['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="telp_mhs">Telepon</label>
                                    <input type="text" class="form-control" id="telp_mhs" name="telp_mhs" value="<?php echo $mhs['telp']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_mhs">Email</label>
                                    <input type="email" class="form-control" id="email_mhs" name="email_mhs" value="<?php echo $mhs['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $mhs['tanggal_lahir']; ?>" required>
                                </div>
                                <div class="col mt-4">
                                    <button type="button" class="btn btn-danger mr-3">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
<?php
} else {
    echo "Anda tidak memiliki akses.";
}
?>
