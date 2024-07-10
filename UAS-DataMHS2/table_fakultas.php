<?php
include 'supabaseConnect.php';
session_start();

if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])) {
        // Capture the form data
        $kode = $_POST['kode'];
        $fakultas = $_POST['fakultas'];

        // Insert the new record into the database
        $insert_query = "INSERT INTO fakultas (kode, fakultas) VALUES ($1, $2)";
        $result = pg_query_params($dbconn, $insert_query, array($kode, $fakultas));

        if ($result) {
            echo "<script>alert('Record inserted successfully');</script>";
        } else {
            echo "<script>alert('Error inserting record');</script>";
        }
    }

    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $delete_query = "DELETE FROM fakultas WHERE id_faku = $1";
        $result = pg_query_params($dbconn, $delete_query, array($delete_id));
        
        if ($result) {
            echo "<script>alert('Record deleted successfully');</script>";
        } else {
            echo "<script>alert('Error deleting record');</script>";
        }
    }

    $query = "SELECT * FROM fakultas";
    $result = pg_query($dbconn, $query);
    $data_fakultas = pg_fetch_all($result);
?>
    <div class="container flex border rounded mt-3 bg-white p-3">
        <h1>Data Fakultas</h1>
        <form action="" method="POST" class="d-flex justify-content-end mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
                Insert
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
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Fakultas</label>
                                <input type="text" class="form-control" id="kode" name="kode" required>
                            </div>
                            <div class="mb-3">
                                <label for="fakultas" class="form-label">Nama Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="insert" class="btn btn-primary">Save</button>
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
