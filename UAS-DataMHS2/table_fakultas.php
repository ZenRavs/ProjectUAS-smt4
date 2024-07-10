<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {

    $query = "SELECT * FROM fakultas";
    $result = pg_query($dbconn, $query);
    $data_fakultas = pg_fetch_all($result);
?>
    <div class="container flex border rounded mt-3 bg-white p-3">
        <h1>Data Fakultas</h1>
        <form action="" method="POST" class="d-flex justify-content-end mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
                Inserta
            </button>
        </form>

        <!-- Insert Modal -->
        <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Insert New Fakultas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="fungsi_fakultas.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kode" class="form-label">kode Fakultas</label>
                                <input type="text" class="form-control" id="kode_faku" name="kode_faku" required>
                            </div>
                            <div class="mb-3">
                                <label for="kode_jurusan" class="form-label">nama Fakultas</label>
                                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Kode Fakultas</th>
                    <th scope="col">Nama Fakultas</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if ($data_fakultas) {
                    foreach ($data_fakultas as $faku) {
                ?>
                        <tr>
                            <td class="text-center"><?php echo $i ?></td>
                            <td><?php echo $faku['id_faku'] ?></td>
                            <td><?php echo $faku['kode'] ?></td>
                            <td><?php echo $faku['fakultas'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <div class="row g-2">
                                        <div class="col md-0">
                                        </div>
                                        <div class="col md-0">
                                            <form action="" method="get">
                                                <input type="hidden" name="delete_id" value="<?php echo $faku['id_faku']; ?>">
                                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
} else {
    header("location: index.php");
}
?>
