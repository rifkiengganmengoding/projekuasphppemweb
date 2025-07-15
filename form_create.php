<!DOCTYPE html>
<html>
<head>
  <title>Tambah Ulasan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Tambah Ulasan</h1>
  <form method="post" action="create.php">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Komentar:</label><br>
    <textarea name="komentar" required></textarea><br><br>

    <label>Rating:</label><br>
    <select name="rating">
      <option>5</option><option>4</option><option>3</option><option>2</option><option>1</option>
    </select><br><br>

    <button type="submit">Simpan</button>
  </form>
</body>
</html>
