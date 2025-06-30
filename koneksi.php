
<?php
$host = "159.65.7.144";
$user = "u51_MHnAX6uJAz";
$pass = "pIG8BR!zf=yz28.eZTtol+Zw";
$db = "s51_Vallmorra";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
