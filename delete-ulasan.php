<?php
include "header.php";
include "koneksi.php";

$id = intval($_GET['id'] ?? 0);
$sql = "DELETE FROM ulasan WHERE id=$id";
if ($koneksi->query($sql)) {
    echo json_encode(["status" => "Ulasan berhasil dihapus"]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}
?>
