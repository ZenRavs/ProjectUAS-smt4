<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    $query = "SELECT * FROM mahasiswa";
    $result = pg_query($dbconn, $query);
    $data_mhs = pg_fetch_all($result);
?>
    <div class="container border rounded">
        <form action="insert_mhs.php" method="POST" class="d-flex justify-content-end mt-2">
            <input class="btn btn-sm btn-primary" type="submit" value="Insert">
        </form>
        <table class="table table-hover mt-1">
            <thead>
                <tr>
<<<<<<< HEAD
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
                                    <form action="edit_form.php" method="GET">
                                        <input type="hidden" name="id_mhs" value="<?php echo $mhs['id_mhs'] ?>">
                                        <input type="hidden" name="username" value="<?php echo $mhs['username'] ?>">
                                        <input type="hidden" name="password" value="<?php echo $mhs['password'] ?>">
                                        <input type="hidden" name="nim" value="<?php echo $mhs['nim'] ?>">
                                        <input type="hidden" name="nama" value="<?php echo $mhs['nama'] ?>">
                                        <input type="hidden" name="alamat" value="<?php echo $mhs['alamat'] ?>">
                                        <input type="hidden" name="telp" value="<?php echo $mhs['telp'] ?>">
                                        <input type="hidden" name="email" value="<?php echo $mhs['email'] ?>">
                                        <input type="hidden" name="tanggal_lahir" value="<?php echo $mhs['tanggal_lahir'] ?>">
                                        <input class="btn btn-sm btn-primary" type="submit" value="Edita">
                                    </form>
                                </div>
                                <div class="col md-0">
                                    <form action="insert_mhs.php" method="POST">
                                        <input class="btn btn-sm btn-primary" type="submit" value="Insert">
                                        <div class="col md-0">
                                            <form action="delete_mhs.php" method="get">
                                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                            </form>
                                        </div>
=======
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Faklutas</th>
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
                                        <form action="edit_mhs.php" method="POST">
                                            <input type="hidden" name="id_mhs" value="<?php echo $mhs['id_mhs'] ?>">
                                            <input type="hidden" name="nim" value="<?php echo $mhs['nim'] ?>">
                                            <input type="hidden" name="nama" value="<?php echo $mhs['nama'] ?>">
                                            <input type="hidden" name="username" value="<?php echo $mhs['kode_fakultas'] ?>">
                                            <input type="hidden" name="password" value="<?php echo $mhs['kode_jurusan'] ?>">
                                            <input type="hidden" name="alamat" value="<?php echo $mhs['alamat'] ?>">
                                            <input type="hidden" name="telp" value="<?php echo $mhs['telp'] ?>">
                                            <input type="hidden" name="email" value="<?php echo $mhs['email'] ?>">
                                            <input type="hidden" name="tanggal_lahir" value="<?php echo $mhs['tanggal_lahir'] ?>">
                                            <input class="btn btn-sm btn-primary" type="submit" value="Edit">
                                        </form>
                                    </div>
                                    <div class="col md-0">
                                        <form action="delete_mhs.php" method="get">
                                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                        </form>
                                    </div>
>>>>>>> 529bc80b30d4c5ba1eb38717aef409b2ccd602c1
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin = "anonymous"
    </script>
<?php
} else {
}
