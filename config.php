<?php
$conn = mysqli_connect( "localhost", "root", "", "company_profile");
if(!$conn) {
http_response_code(500);
echo json_encode( [ "status" => "error", "message" => "Koneksi gagal"]);
exit;
}
?>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_uas";

$koneksi = new mysqli($host, $user, $pass, $db);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
