<?php
include 'supabaseConnect.php';
//session_start();
if (isset($_SESSION['user'])) {
    $query = "SELECT * FROM mahasiswa";
    $result = pg_query($dbconn, $query);
    $data_mhs = pg_fetch_all($result);
?>
    <div class="container mt-2">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
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
                    <td>Edit | Delete</td>
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
