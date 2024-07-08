<?php
include 'supabaseConnect.php';
try {
    $result = pg_query($dbconn, "SELECT * FROM mahasiswa");

    if (!$result) {
        echo "Query failed: " . pg_last_error();
        exit;
    }
    //print_r($result);
    while ($row = pg_fetch_assoc($result)) {
        echo $row['username'] . " - " . $row['password'] . " - " . $row['nama'] . "<br />";
    }
    pg_free_result($result);
    pg_close($dbconn);
} catch (Exception $e) {
    echo "Fetch Unsucesfull " . $e;
}
