<?php
include "header.php";
include "koneksi.php";


header("Content-Type: application/json");
include "koneksi.php";

$id = intval($_GET['id']);

$sql = "DELETE FROM produk WHERE id=$id";

if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Produk berhasil dihapus"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>
