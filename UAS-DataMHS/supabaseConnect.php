<?php

// Replace with your Supabase project URL
$supabaseUrl = 'https://ppvsrugrszzrajvwwqzw.supabase.co';

// Replace with your Supabase Anon Key
$supabaseAnonKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBwdnNydWdyc3p6cmFqdnd3cXp3Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjA0NDQ1NzUsImV4cCI6MjAzNjAyMDU3NX0.XUK2-_4F5V28MIaxjkzgZPJrjeeS4CRFNLz0A4kZQJw';

// Use Guzzle for HTTP requests
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

// Construct the request URL for a specific table (replace 'todos' with your table name)
$url = $supabaseUrl . '/rest/v1/todos';

$headers = [
    'Authorization' => "Bearer $supabaseAnonKey",
    'Content-Type' => 'application/json',
];

try {
    // Send a GET request to retrieve all todos (adjust method and body for other actions)
    $response = $client->get($url, [
        'headers' => $headers,
    ]);

    // Check for successful response
    if ($response->getStatusCode() === 200) {
        $data = json_decode($response->getBody(), true);
        echo "Retrieved todos successfully: \n";
        print_r($data);
    } else {
        echo "Error: " . $response->getStatusCode() . " - " . $response->getReasonPhrase();
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
