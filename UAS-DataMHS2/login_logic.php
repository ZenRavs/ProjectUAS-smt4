<?php
include 'supabaseConnect.php';
$username = $_POST['username'];
$password = $_POST['passwd'];
$query = "SELECT * FROM admin WHERE username='$username'";
$result = pg_query($dbconn, $query);
$user = pg_fetch_assoc($result);
echo ('<br>');
session_start();
if (pg_num_rows($result) == 1) {
    $hashpasswd = $user['password'];
    echo 'Pass from db: [', $hashpasswd, ']<br>', 'Pass from post: [', $password, ']';
    echo '<pre>', 'RS: ', print_r($user), '</pre>';
    if (hash_equals($password, $hashpasswd)) {
        //$query = "UPDATE web_users SET active = 1 WHERE userid='" . $user['userid'] . "'";
        pg_query($dbconn, $query);
        $_SESSION['user'] = [
            'admin' => $user['admin_name'],
            'username' => $user['username'],
        ];
        unset($_SESSION['login_error']);
        echo "Login success! ";
        echo '<pre>', 'Session: ', print_r($_SESSION), '</pre>';
        echo '<a href="dashboard.php">Continue..</a>';
    } else {
        $_SESSION['login_error'] = 1;
        header('location: index.php');
    }
} else {
    $_SESSION['login_error'] = 1;
    header('location: index.php');
}
