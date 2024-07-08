<?php
//user=postgres.ppvsrugrszzrajvwwqzw password=[YOUR-PASSWORD] host=aws-0-ap-southeast-1.pooler.supabase.com port=6543 dbname=postgres
$host = 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = '6543'; // Default PostgreSQL port
$dbname = 'postgres';
$user = 'postgres.ppvsrugrszzrajvwwqzw';
$password = 'ProjectUASsmt4';
$sslmode = 'require';

try {
    $connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=$sslmode";
    $dbconn = pg_connect($connection_string);
    if (!$dbconn) {
        echo "Connection failed: " . pg_last_error();
        exit;
    } else {
        echo "Connected to Supabase database successfully!<br />";
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
    phpinfo();
}
