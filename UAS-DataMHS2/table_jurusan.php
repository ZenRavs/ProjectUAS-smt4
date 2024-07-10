<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    $query = "SELECT * FROM jurusan";
    $result = pg_query($dbconn, $query);
    $data_prodi = pg_fetch_all($result);
?>
    <div class="container flex border rounded mt-3 bg-white p-3">
        <h1>Data Jurusan</h1>
        <form action="" method="POST" class="d-flex justify-content-end mt-2">
            <input class="btn btn-primary insertJurusan" type="button" value="Insert">
        </form>

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data_prodi as $prodi) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $prodi['id_jurusan'] ?></td>
                        <td><?php echo $prodi['kode'] ?></td>
                        <td><?php echo $prodi['jurusan'] ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <div class="row g-2">
                                    <div class="col md-0">
                                    </div>
                                    <div class="col md-0">
                                        <form action="" method="get">
                                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            </tbody>
        <?php
                    $i++;
                }
        ?>
        </table>
    </div>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin = "anonymous"
    </script>

<?php
} else {
    header("location: index.php");
}
