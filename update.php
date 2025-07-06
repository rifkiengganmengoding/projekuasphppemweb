<?php
include "header.php";
include "koneksi.php";


header("Content-Type: application/json");
include "koneksi.php";

$id = intval($_GET['id']);
$data = json_decode(file_get_contents("php://input"));

$nama = $koneksi->real_escape_string($data->nama);
$harga = floatval($data->harga);
$deskripsi = $koneksi->real_escape_string($data->deskripsi);

$sql = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";

if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Produk berhasil diupdate"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>
