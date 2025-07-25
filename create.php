<?php
include "config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Default value
$nama = $komentar = "";
$rating = 0;

// Deteksi jika JSON (dari fetch/postman)
if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
    $input = json_decode(file_get_contents("php://input"), true);
    
    if (!$input || !isset($input['nama'], $input['komentar'], $input['rating'])) {
        http_response_code(400);
        echo json_encode(["error" => "Data JSON tidak lengkap"]);
        exit;
    }

    $nama     = $koneksi->real_escape_string($input['nama']);
    $komentar = $koneksi->real_escape_string($input['komentar']);
    $rating   = intval($input['rating']);

    $sql = "INSERT INTO ulasan (nama, komentar, rating) VALUES ('$nama', '$komentar', $rating)";
    if ($koneksi->query($sql)) {
        echo json_encode(["status" => "Ulasan berhasil ditambahkan"]);
    } else {
        echo json_encode(["error" => $koneksi->error]);
    }
    exit;
}

// Kalau dari form biasa HTML ($_POST)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nama'], $_POST['komentar'], $_POST['rating'])) {
    $nama     = $koneksi->real_escape_string($_POST['nama']);
    $komentar = $koneksi->real_escape_string($_POST['komentar']);
    $rating   = intval($_POST['rating']);

    $sql = "INSERT INTO ulasan (nama, komentar, rating) VALUES ('$nama', '$komentar', $rating)";
    if ($koneksi->query($sql)) {
        header("Location: index.php?status=success");
        exit;
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap (form)";
}
?>
