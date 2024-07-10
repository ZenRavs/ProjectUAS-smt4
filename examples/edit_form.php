<?php
include '../UAS-DataMHS2/supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    // Mengambil data mahasiswa berdasarkan ID
    $id_mhs = 1;
    $query_mhs = "SELECT * FROM mahasiswa WHERE id_mhs = $id_mhs";
    $result_mhs = pg_query($dbconn, $query_mhs);
    $mhs = pg_fetch_assoc($result_mhs);

    // Mengambil data fakultas
    $query_faku = "SELECT * FROM fakultas";
    $result_faku = pg_query($dbconn, $query_faku);
    $faku = pg_fetch_all($result_faku);

    $query_jurusan = "SELECT * FROM jurusan";
    $result_jurusan = pg_query($dbconn, $query_jurusan);
    $jurusan = pg_fetch_all($result_jurusan);
?>

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
                                        <div class="form-group">
                                            <label for="combo-box">Fakultas</label>
                                            <select class="form-control" id="combo-box" name="combo-box">
                                                <?php foreach ($faku as $option) { ?>
                                                    <option value="<?php echo $option['kode']; ?>"><?php echo $option['fakultas']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="combo-box">Jurusan</label>
                                            <select class="form-control" id="combo-box" name="combo-box">
                                                <?php foreach ($jurusan as $option) { ?>
                                                    <option value="<?php echo $option['kode']; ?>"><?php echo $option['jurusan']; ?></option> <?php } ?>
                                            </select>
                                        </div>
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
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.cancel-btn').on('click', function() {
                $('.content-inner').load('table_mhs.php');
            });
        });
    </script>
<?php
} else {
    echo "Anda tidak memiliki akses.";
}
?>