<?php
// Ambil ID dari parameter URL
$id = $_GET['id'];

// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "kecamatan_sleman";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk menghapus data berdasarkan ID
$sql = "DELETE FROM kecamatan WHERE ID = $id";

if ($conn->query($sql) === TRUE) {
    echo "Data dengan ID = $id berhasil dihapus.";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();

// Setelah penghapusan, kembali ke halaman utama
header("Location: index.php");
exit();
?>
