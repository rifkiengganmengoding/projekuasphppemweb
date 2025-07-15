<?php
include "config.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$result = $koneksi->query("SELECT * FROM ulasan ORDER BY id DESC");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
