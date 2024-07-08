<?php
include 'supabaseConnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $url = 'https://ppvsrugrszzrajvwwqzw.supabase.co/auth/v1/token?grant_type=password';
    $data = [
        'email' => $email,
        'password' => $passwd,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\nAuthorization: Bearer your-anon-key\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        // Handle error
        echo "Login failed!";
    } else {
        $response = json_decode($result, true);
        if (isset($response['access_token'])) {
            // Login successful
            session_start();
            $_SESSION['access_token'] = $response['access_token'];
            echo "Login successful!";
            // Redirect to another page
            header('Location: index.php');
        } else {
            // Login failed
            echo "Login failed!";
        }
    }
}
