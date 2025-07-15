<?php
include "config.php";
$id = $_GET['id'];

$koneksi->query("DELETE FROM ulasan WHERE id=$id");

header("Location: index.php");
