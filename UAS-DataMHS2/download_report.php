<?php
include 'supabaseConnect.php';

// Set headers to download the file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_mahasiswa.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('No.', 'ID', 'Username', 'Password', 'NIM', 'Nama', 'Alamat', 'No. Telp', 'Email', 'Tanggal Lahir'));

// Query to fetch data
$query = "SELECT * FROM mahasiswa";
$result = pg_query($dbconn, $query);

if ($result) {
    $i = 1;
    // Output the rows
    while ($row = pg_fetch_assoc($result)) {
        fputcsv($output, array($i, $row['id_mhs'], $row['username'], $row['password'], $row['nim'], $row['nama'], $row['alamat'], $row['telp'], $row['email'], $row['tanggal_lahir']));
        $i++;
    }
}

// Close the file pointer
fclose($output);
?>
