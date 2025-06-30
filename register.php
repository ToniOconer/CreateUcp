
<?php
include 'koneksi.php';

$nama = trim($_POST['nama']);
$discordid = trim($_POST['discordid']);
$toxicWords = json_decode(file_get_contents('toxic.json'), true);

function isToxic($name, $words) {
    foreach ($words as $word) {
        if (stripos($name, $word) !== false) return true;
    }
    return false;
}

if (strlen($nama) > 20) {
    die("Nama terlalu panjang (maksimal 20 karakter).");
}

if (isToxic($nama, $toxicWords)) {
    die("Nama mengandung kata-kata terlarang.");
}

$stmt = $conn->prepare("SELECT * FROM ucp WHERE ucp_name = ?");
$stmt->bind_param("s", $nama);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    die("Nama sudah digunakan.");
}

$pin_code = rand(1000, 9999);
$stmt = $conn->prepare("INSERT INTO ucp (ucp_name, discordid, pin_code) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $nama, $discordid, $pin_code);
$stmt->execute();

echo "<h2>Pendaftaran Berhasil!</h2>";
echo "<p>Nama: $nama<br>Discord ID: $discordid<br>PIN: $pin_code</p>";
?>
