<?php
include "config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Dari JSON
if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data || !isset($data["id"])) {
        http_response_code(400);
        echo json_encode(["error" => "ID tidak ditemukan"]);
        exit;
    }

    $id = intval($data["id"]);
    $sql = "DELETE FROM ulasan WHERE id = $id";

    if ($koneksi->query($sql)) {
        echo json_encode(["status" => "Data berhasil dihapus"]);
    } else {
        echo json_encode(["error" => $koneksi->error]);
    }
    exit;
}

// Dari GET (link dari backend admin)
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM ulasan WHERE id = $id";

    if ($koneksi->query($sql)) {
        header("Location: index.php?status=deleted");
        exit;
    } else {
        echo "Gagal hapus data: " . $koneksi->error;
    }
} else {
    echo "ID tidak ditemukan (form)";
}
?>
