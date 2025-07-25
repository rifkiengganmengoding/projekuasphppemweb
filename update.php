<?php
include "config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
    // Request dari JSON (React / Postman)
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data || !isset($data["id"], $data["nama"], $data["komentar"], $data["rating"])) {
        http_response_code(400);
        echo json_encode(["error" => "Data JSON tidak lengkap"]);
        exit;
    }

    $id       = intval($data["id"]);
    $nama     = $koneksi->real_escape_string($data["nama"]);
    $komentar = $koneksi->real_escape_string($data["komentar"]);
    $rating   = intval($data["rating"]);

    $sql = "UPDATE ulasan SET nama='$nama', komentar='$komentar', rating=$rating WHERE id=$id";

    if ($koneksi->query($sql)) {
        echo json_encode(["status" => "Ulasan berhasil diupdate"]);
    } else {
        echo json_encode(["error" => $koneksi->error]);
    }
    exit;
}

// Kalau dari form HTML (form_edit.php)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'], $_POST['nama'], $_POST['komentar'], $_POST['rating'])) {
    $id       = intval($_POST['id']);
    $nama     = $koneksi->real_escape_string($_POST['nama']);
    $komentar = $koneksi->real_escape_string($_POST['komentar']);
    $rating   = intval($_POST['rating']);

    $sql = "UPDATE ulasan SET nama='$nama', komentar='$komentar', rating=$rating WHERE id=$id";

    if ($koneksi->query($sql)) {
        header("Location: index.php?status=updated");
        exit;
    } else {
        echo "Gagal update data: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap (form)";
}
?>
