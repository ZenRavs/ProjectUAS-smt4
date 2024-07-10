<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    $query = "SELECT * FROM mahasiswa";
    $result = pg_query($dbconn, $query);
    $data_mhs = pg_fetch_all($result);
?>
    <div class="container flex border rounded mt-3 bg-white p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Data Mahasiswa</h1>
            <button id="addNew" class="btn btn-primary">Insert</button>
        </div>
        <div id="formContainer"></div>
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data_mhs as $mhs) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $mhs['id_mhs'] ?></td>
                        <td><?php echo $mhs['nim'] ?></td>
                        <td><?php echo $mhs['nama'] ?></td>
                        <td><?php echo $mhs['kode_fakultas'] ?></td>
                        <td><?php echo $mhs['kode_jurusan'] ?></td>
                        <td><?php echo $mhs['alamat'] ?></td>
                        <td><?php echo $mhs['telp'] ?></td>
                        <td><?php echo $mhs['email'] ?></td>
                        <td><?php echo $mhs['tanggal_lahir'] ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <div class="row g-2">
                                    <div class="col md-0">
                                        <button class="btn btn-sm btn-primary edit-btn" data-id="<?php echo $mhs['id_mhs'] ?>">Edit</button>
                                    </div>
                                    <div class="col md-0">
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id_mhs" value="<?php echo $mhs['id_mhs'] ?>">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addNew').on('click', function() {
                $.ajax({
                    url: 'insert_form.php',
                    type: 'GET',
                    success: function(response) {
                        $('#formContainer').html(response);
                        $('#addNew').hide(); // Hide the "Insert" button
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat form.');
                    }
                });
            });

            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'edit_form.php',
                    type: 'POST',
                    data: { id_mhs: id },
                    success: function(response) {
                        $('#formContainer').html(response);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat form.');
                    }
                });
            });

            $(document).on('submit', '#insertForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'insert_mhs.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        location.reload(); // Refresh the table
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghubungi server.');
                    }
                });
            });

            $(document).on('submit', '#editForm', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'update_mhs.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        location.reload(); // Refresh the table
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
    header("location: index.php");
}
?>