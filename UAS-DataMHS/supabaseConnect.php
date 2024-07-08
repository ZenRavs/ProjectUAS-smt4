<?php
//user=postgres.ppvsrugrszzrajvwwqzw password=[YOUR-PASSWORD] host=aws-0-ap-southeast-1.pooler.supabase.com port=6543 dbname=postgres
$host = 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = '6543'; // Default PostgreSQL port
$dbname = 'ProjectUAS';
$user = 'postgres.ppvsrugrszzrajvwwqzw';
$password = 'ProjectUASsmt4';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "Connected to Supabase database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    phpinfo();
}
