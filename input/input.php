<?php
// Ambil data dari form
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kecamatan_sleman";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk insert data ke tabel kecamatan
$sql = "INSERT INTO kecamatan (Kecamatan, Longitude, Latitude, Luas, Jumlah_Penduduk)
        VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

// Eksekusi query dan cek hasil
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan.";
    header("Location: ../index.php"); // arahkan kembali ke halaman utama
    exit;
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
