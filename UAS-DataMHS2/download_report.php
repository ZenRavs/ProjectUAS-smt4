<?php
include 'supabaseConnect.php';

// Set headers to download the file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_mahasiswa.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('NIM', 'Nama', 'Username', 'Password', 'Email', 'No.Telp', 'Alamat'));

// Query data mahasiswa from the database
$query = "SELECT nim, nama, username, password, email, telp, alamat FROM mahasiswa";
$result = pg_query($dbconn, $query);

// Output the rows
while ($row = pg_fetch_assoc($result)) {
    fputcsv($output, $row);
}

// Close the file pointer
fclose($output);
?>
