<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
?>

    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="text-primary">Tambah Data Mahasiswa</h2>
                    </div>
                    <div class="card-body">
                        <form action="insert_mhs.php" id="insertForm" method="post">
                            <div class="form-group">
                                <div class="row flex">
                                    <div class="col-md-2">
                                        <label for="kode_faku">Fakultas</label>
                                        <input type="text" class="form-control" id="kode_faku" name="kode_faku" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="kode_jurusan">Jurusan</label>
                                        <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="nim_mhs">NIM</label>
                                        <input type="text" class="form-control" id="nim_mhs" name="nim_mhs" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_mhs">Nama</label>
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_mhs">Alamat</label>
                                <textarea class="form-control" id="alamat_mhs" name="alamat_mhs" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="telp_mhs">Telepon</label>
                                <input type="text" class="form-control" id="telp_mhs" name="telp_mhs" required>
                            </div>
                            <div class="form-group">
                                <label for="email_mhs">Email</label>
                                <input type="email" class="form-control" id="email_mhs" name="email_mhs" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="col mt-4">
                                <button type="button" class="btn btn-danger mr-3 cancel-btn">Cancel</button>
                                <button type="submit" id="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.cancel-btn').on('click', function() {
                $('.content-inner').load('table_mhs.php');
            });

            $('#insertForm').on('#submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'insert_mhs.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response)
                        $('.content-inner').load('table_mhs.php');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghubungi server.');
                    }
                });
            });
        });
    </script>

<?php
} else {
    echo "Anda tidak memiliki akses.";
}
?>