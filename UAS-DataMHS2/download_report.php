<?php
// Set headers to download the file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_mahasiswa.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the column headings
fputcsv($output, array('NIM', 'Nama', 'Username', 'Password', 'Email', 'No.Telp', 'Alamat'));

// Example data - replace this with your actual data query
$rows = [
    ['123456', 'John Doe', 'johndoe', 'password123', 'john@example.com', '123456789', '123 Main St'],
    // Add more rows as needed
];

// Output the rows
foreach ($rows as $row) {
    fputcsv($output, $row);
}

// Close the file pointer
fclose($output);
?>
