<?php
session_start();
if (isset($_SESSION['user'])) {
?>
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="text-primary">Tambah Data Jurusan</h2>
                    </div>
                    <div class="card-body">
                        <form id="insertJurusanForm" action="insert_jurusan.php" method="post">
                            <div class="form-group">
                                <label for="kode_jurusan">Kode Jurusan</label>
                                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
                            </div>
                            <div class="col-md-2">
                                <label for="kode_faku">Fakultas</label>
                                <select class="form-control" id="kode_faku" name="kode_faku" required>
                                    <?php
                                    include 'supabaseConnect.php';
                                    $query = "SELECT * FROM fakultas";
                                    $result = pg_query($dbconn, $query);
                                    $data_faku = pg_fetch_all($result);
                                    if ($data_faku) {
                                        foreach ($data_faku as $data) {
                                            echo "<option value='{$data['kode']}'>{$data['kode']}~{$data['fakultas']}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No fakultas found</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col mt-4">
                                <button type="button" class="btn btn-danger mr-3 cancel-btn">Cancel</button>
                                <button type="submit" class="btn btn-primary mr-3 insert-btn">Save</button>
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
                $('.content-inner').load('table_jurusan.php');
            });
        });
    </script>
<?php
} else {
    echo "Anda tidak memiliki akses.";
}
?>