<?php
include "config.php";

$nama     = $_POST['nama'];
$komentar = $_POST['komentar'];
$rating   = $_POST['rating'];

$koneksi->query("INSERT INTO ulasan (nama, komentar, rating) VALUES ('$nama', '$komentar', $rating)");

header("Location: index.php");
