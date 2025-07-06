<?php
include "header.php";
include "koneksi.php";

header("Content-Type: application/json");
include "koneksi.php";

$sql = "SELECT * FROM produk";
$result = $koneksi->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
