<?php
include "header.php";
include "koneksi.php";

$id = intval($_GET['id'] ?? 0);

$sql = "SELECT * FROM ulasan WHERE id=$id";
$result = $koneksi->query($sql);
if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Ulasan tidak ditemukan"]);
}
?>
