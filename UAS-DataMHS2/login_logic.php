<?php
include 'supabaseConnect.php';

$username = $_POST['username'];
$password = $_POST['passwd'];

$query = "SELECT * FROM admin WHERE username='$username'";
$result = pg_query($dbconn, $query);
$user = pg_fetch_assoc($result);
print_r($user);
echo ('<br>');
if (pg_num_rows($result) == 1) {
    $hashpasswd = $user['password'];
    echo 'Pass from db: [', $hashpasswd, ']<br>', 'Pass from post: [', $password, ']';
    echo '<pre>', 'RS: ', print_r($user), '</pre>';
    if (hash_equals($password, $hashpasswd)) {
        session_start();
        $query = "UPDATE web_users SET active = 1 WHERE userid='" . $user['userid'] . "'";
        pg_query($dbconn, $query);
        $_SESSION['user'] = [
            'userid' => $user['userid'],
            'username' => $user['username'],
            'name' => $user['name'],
            'password' => $user['passwd'],
        ];
        echo "Login success! ";
        echo '<pre>', 'Session: ', print_r($_SESSION), '</pre>';
        echo '<a href="dashboard.php">Continue..</a>';
    } else {
        echo "Login Failed! ";
        echo '<a href="index.php">Continue..</a>';
    }
} else {
    echo "Kesalahan Username or password tidak sesuai";
    echo '<a href="index.php">Continue..</a>';
}
