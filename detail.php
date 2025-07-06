<?php
include "header.php";
include "koneksi.php";


header("Content-Type: application/json");
include "koneksi.php";

$id = intval($_GET['id']);

$sql = "SELECT * FROM produk WHERE id=$id";
$result = $koneksi->query($sql);

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Produk tidak ditemukan"]);
}
?>
