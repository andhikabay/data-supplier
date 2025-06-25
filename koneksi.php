<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_supplier";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Gagal connect bro: " . mysqli_connect_error());
}
?>
