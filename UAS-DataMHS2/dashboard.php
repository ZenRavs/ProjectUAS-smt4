<?php
include 'supabaseConnect.php';
session_start();
if (isset($_SESSION['user'])) {
    echo '<br> <br> Menampilkan DASHBOARD!';
} else {
    $_SESSION['login_error'] = 1;
    header('location: index.php');
}
