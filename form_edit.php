<?php
include "config.php";

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

// Cek kalau ID gak ada
if (!$id) {
  echo "ID tidak ditemukan.";
  exit;
}

// Ambil data dari database
$data = $koneksi->query("SELECT * FROM ulasan WHERE id = $id")->fetch_assoc();
if (!$data) {
  echo "Data tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Ulasan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Edit Ulasan</h1>

  <form method="post" action="update.php">
    <!-- Kirim ID lewat POST (wajib biar update.php bisa baca $_POST['id']) -->
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

    <label>Komentar:</label><br>
    <textarea name="komentar" required><?= $data['komentar'] ?></textarea><br><br>

    <label>Rating:</label><br>
    <select name="rating" required>
      <?php for ($i = 5; $i >= 1; $i--): ?>
        <option value="<?= $i ?>" <?= $data['rating'] == $i ? 'selected' : '' ?>><?= $i ?></option>
      <?php endfor; ?>
    </select><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>
