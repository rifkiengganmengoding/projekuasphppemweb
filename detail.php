<?php
include "config.php";
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM ulasan WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Detail Ulasan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Detail Ulasan</h1>
  <p><strong>ID:</strong> <?= $data['id'] ?></p>
  <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama']) ?></p>
  <p><strong>Komentar:</strong><br><?= nl2br(htmlspecialchars($data['komentar'])) ?></p>
  <p><strong>Rating:</strong> <?= $data['rating'] ?> / 5</p>

  <br>
  <a href="index.php">← Kembali</a>
</body>
</html>
