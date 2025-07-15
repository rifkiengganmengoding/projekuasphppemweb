<?php
include "config.php";
$data = $koneksi->query("SELECT * FROM ulasan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Ulasan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Data Ulasan</h1>
  <a href="form_create.php">+ Tambah Ulasan</a>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Komentar</th>
      <th>Rating</th>
      <th>Aksi</th>
    </tr>
    <?php while($b = mysqli_fetch_assoc($data)): ?>
    <tr>
      <td><?= $b['id'] ?></td>
      <td><?= htmlspecialchars($b['nama']) ?></td>
      <td><?= htmlspecialchars($b['komentar']) ?></td>
      <td><?= $b['rating'] ?></td>
      <td>
        <a href="form_edit.php?id=<?= $b['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus ulasan ini?')">Hapus</a> |
        <a href="detail.php?id=<?= $b['id'] ?>">Detail</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
