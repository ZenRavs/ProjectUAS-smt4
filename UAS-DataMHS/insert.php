<?php
include("supabaseConnet.php");

$jenis = $_GET['jenis-data'];
$page = $_GET['page'];
$insert = false;

if ($jenis == 'jurusan') {
    
    $kode = $_POST['kode'];
    $jurusan = $_POST['jurusan'];

    $insert = $k->query("INSERT INTO jurusan (kode, jurusan) VALUES ('".$kode."', '".$jurusan."')");
} elseif ($jenis == 'jurusan') {
    $kode = $_POST['kode'];
    $jurusan = $_POST['jurusan'];

    $insert = $k->query("INSERT INTO users (username, nama, email, paswd, active) VALUES ('".$user."', '".$nama."', '".$email."', '".$paswd."', 1)");
}

if ($insert) {
    header("Location: index.php?page=".$page);
} else {
    echo "Insert data gagal";
}
?>
