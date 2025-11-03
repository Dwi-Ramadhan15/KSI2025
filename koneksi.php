<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akademik";

$koneksi = new mysqli($servername, $username, $root, $dbname);

if ($koneksi->connect_error) {
	die("Koneksi Gagal!:". $koneksi->connect_error);
}
?>
