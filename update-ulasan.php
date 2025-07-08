<?php
include "header.php";
include "koneksi.php";

$id = intval($_GET['id'] ?? 0);
$data = json_decode(file_get_contents("php://input"));
if (!$data) {
    http_response_code(400);
    echo json_encode(["error" => "Data JSON tidak ditemukan"]);
    exit();
}

$nama = $koneksi->real_escape_string($data->nama ?? '');
$komentar = $koneksi->real_escape_string($data->komentar ?? '');
$rating = intval($data->rating ?? 0);

$sql = "UPDATE ulasan SET nama='$nama', komentar='$komentar', rating=$rating WHERE id=$id";
if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Ulasan berhasil diupdate"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>
