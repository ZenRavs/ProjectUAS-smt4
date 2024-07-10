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
        <div class="d-flex justify-content-end mt-2">
            <button id="insertFakultas" class="btn btn-primary">
                Insert
            </button>
        </div>

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No.</th>
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
                            <td><?php echo $faku['kode'] ?></td>
                            <td><?php echo $faku['fakultas'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-danger delete-fakultas" data-id="<?php echo $faku['id_faku']; ?>">Delete</button>
                            </td>
                        </tr>
                <?php
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No data found</td></tr>";
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