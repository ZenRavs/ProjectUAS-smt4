<?php
include 'supabaseConnect.php';
//session_start();
if (isset($_SESSION['user'])) {
    $query = "SELECT * FROM mahasiswa";
    $result = pg_query($dbconn, $query);
    $data_mhs = pg_fetch_all($result);
?>
    <div class="container mt-2">
        <table class="table table-hover table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Email</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($data_mhs as $mhs) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $mhs['id_mhs'] ?></td>
                    <td><?php echo $mhs['username'] ?></td>
                    <td><?php echo $mhs['password'] ?></td>
                    <td><?php echo $mhs['nim'] ?></td>
                    <td><?php echo $mhs['nama'] ?></td>
                    <td><?php echo $mhs['alamat'] ?></td>
                    <td><?php echo $mhs['telp'] ?></td>
                    <td><?php echo $mhs['email'] ?></td>
                    <td><?php echo $mhs['tanggal_lahir'] ?></td>
                    <td class="text-center">
                        <div class="row g-1">
                            <div class="col">
                                <form action="edit_mhs.php" method="POST">
                                    <input type="hidden" name="id_mhs" value="<?php echo $mhs['id_mhs'] ?>">
                                    <input type="hidden" name="username" value="<?php echo $mhs['username'] ?>">
                                    <input type="hidden" name="password" value="<?php echo $mhs['password'] ?>">
                                    <input type="hidden" name="nim" value="<?php echo $mhs['nim'] ?>">
                                    <input type="hidden" name="nama" value="<?php echo $mhs['nama'] ?>">
                                    <input type="hidden" name="alamat" value="<?php echo $mhs['alamat'] ?>">
                                    <input type="hidden" name="telp" value="<?php echo $mhs['telp'] ?>">
                                    <input type="hidden" name="email" value="<?php echo $mhs['email'] ?>">
                                    <input type="hidden" name="tanggal_lahir" value="<?php echo $mhs['tanggal_lahir'] ?>">
                                    <input class=" btn btn-sm btn-primary" type="submit" value="Edit">
                                </form>
                            </div>
                            <div class="col">
                                <form action="delete_mhs.php" method="get">
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>
    </div>
<?php
} else {
}
