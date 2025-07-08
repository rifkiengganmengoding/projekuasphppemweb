<?php
include "header.php";
include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));
if (!$data) {
    http_response_code(400);
    echo json_encode(["error" => "Data JSON tidak ditemukan"]);
    exit();
}

$nama = $koneksi->real_escape_string($data->nama ?? '');
$komentar = $koneksi->real_escape_string($data->komentar ?? '');
$rating = intval($data->rating ?? 0);

$sql = "INSERT INTO ulasan (nama, komentar, rating) VALUES ('$nama', '$komentar', $rating)";
if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Ulasan berhasil ditambahkan"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>

