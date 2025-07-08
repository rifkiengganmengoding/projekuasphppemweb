<?php
include "header.php";
include "koneksi.php";

$sql = "SELECT * FROM ulasan ORDER BY tanggal DESC";
$result = $koneksi->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
