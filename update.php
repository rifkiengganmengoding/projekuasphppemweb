<?php
include "config.php";

$id       = $_GET['id'];
$nama     = $_POST['nama'];
$komentar = $_POST['komentar'];
$rating   = $_POST['rating'];

$koneksi->query("UPDATE ulasan SET nama='$nama', komentar='$komentar', rating=$rating WHERE id=$id");

header("Location: index.php");
