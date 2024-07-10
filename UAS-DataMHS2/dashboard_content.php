<?php
include 'supabaseConnect.php';

$query = "SELECT * FROM mahasiswa";
$result = pg_query($dbconn, $query);
$data_mhs = pg_fetch_all($result);
?>
<div class="container mt-3 bg-white rounded p-3">
  <h1>DASHBOARD</h1>
  <div class=" d-flex justify-content-end mt-2">
    <a href="download_report.php" class="btn btn-primary btn-download">Download Laporan</a>
  </div>
  <table class="table table-hover table-striped mt-3">
    <thead>
      <tr>
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
        </tr>
      <?php
        $i++;
      }
      ?>
    </tbody>
  </table>
</div>