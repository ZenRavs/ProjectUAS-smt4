<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    // Mengambil data mahasiswa berdasarkan ID
    $id_mhs = $_POST['id_mhs'];
    $query_mhs = "SELECT * FROM mahasiswa WHERE id_mhs = $id_mhs";
    $result_mhs = pg_query($dbconn, $query_mhs);

    if (!$result_mhs) {
        echo "Error fetching mahasiswa data: " . pg_last_error($dbconn);
        exit;
    }

    $mhs = pg_fetch_assoc($result_mhs);

    // Mengambil data fakultas
    $query_faku = "SELECT * FROM fakultas";
    $result_faku = pg_query($dbconn, $query_faku);

    if (!$result_faku) {
        echo "Error fetching fakultas data: " . pg_last_error($dbconn);
        exit;
    }

    $faku = pg_fetch_all($result_faku);

    // Mengambil data jurusan
    $query_jurusan = "SELECT * FROM jurusan";
    $result_jurusan = pg_query($dbconn, $query_jurusan);

    if (!$result_jurusan) {
        echo "Error fetching jurusan data: " . pg_last_error($dbconn);
        exit;
    }

    $jurusan = pg_fetch_all($result_jurusan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="text-primary"><?php echo $mhs['nama'] ?></h2>
                    </div>
                    <div class="card-body">
                        <form id="editForm" method="post">
                            <input type="hidden" name="id_mhs" value="<?php echo $id_mhs ?>">
                            <div class="form-group">
                                <div class="row flex">
                                    <div class="col-md-2">
                                        <label for="kode_faku">Fakultas</label>
                                        <select class="form-control" id="kode_faku" name="kode_faku" required>
                                            <?php
                                            if ($faku) {
                                                foreach ($faku as $f) {
                                                    $selected = ($mhs['kode_fakultas'] == $f['kode']) ? 'selected' : '';
                                                    echo "<option value='{$f['kode']}' $selected>{$f['kode']}~{$f['fakultas']}</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No fakultas found</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="kode_jurusan">Jurusan</label>
                                        <select class="form-control" id="kode_jurusan" name="kode_jurusan" required>
                                            <?php
                                            if ($jurusan) {
                                                foreach ($jurusan as $j) {
                                                    $selected = ($mhs['kode_jurusan'] == $j['kode']) ? 'selected' : '';
                                                    echo "<option value='{$j['kode']}' $selected>{$j['kode']}~{$j['jurusan']}</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No jurusan found</option>";
                                            }
                                            ?>
                                        </select>
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
                                <button type="button" class="btn btn-danger mr-3 cancel-btn">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.cancel-btn').on('click', function() {
                $.ajax({
                    url: 'table_mhs.php',
                    type: 'GET',
                    success: function(response) {
                        $('.container').html(response);
                    },
                    error: function() {
                        alert('Gagal memuat halaman.');
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
} else {
    echo "Anda tidak memiliki akses.";
}
?>
