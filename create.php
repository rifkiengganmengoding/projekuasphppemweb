<?php
include "header.php";
include "koneksi.php";

header("Content-Type: application/json");
include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$nama = $koneksi->real_escape_string($data->nama);
$harga = floatval($data->harga);
$deskripsi = $koneksi->real_escape_string($data->deskripsi);

$sql = "INSERT INTO produk (nama, harga, deskripsi) VALUES ('$nama','$harga','$deskripsi')";

if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Produk berhasil ditambahkan"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>
