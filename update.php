<?php
include "header.php";
include "koneksi.php";

$id = intval($_GET['id']);
$data = json_decode(file_get_contents("php://input"));

if (!$data) {
    http_response_code(400);
    echo json_encode(["error" => "Data JSON tidak ditemukan"]);
    exit();
}

$nama = $koneksi->real_escape_string($data->nama ?? '');
$harga = floatval($data->harga ?? 0);
$deskripsi = $koneksi->real_escape_string($data->deskripsi ?? '');

$sql = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";

if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Produk berhasil diupdate"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>
