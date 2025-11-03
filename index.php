<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kecamatan di Kabupaten Sleman</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
            background-color: #fafafa;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            font-size: 14px;
            text-align: center;
        }
        .judul {
            background-color: yellow;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
        }
        .header {
            background-color: #d9d9d9;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .tombol {
            display: inline-block;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
        }
        .tombol:hover {
            background-color: #45a049;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>

<?php
// === Koneksi ke Database ===
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "kecamatan_sleman";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("<p style='text-align:center; color:red;'>Koneksi gagal: " . $conn->connect_error . "</p>");
}

// === Query Data dari Tabel kecamatan ===
$sql = "SELECT * FROM kecamatan";
$result = $conn->query($sql);
?>

<div class="container">
    <a href="input/index.html" class="tombol">+ Tambah Data Kecamatan</a>
</div>

<?php
if ($result && $result->num_rows > 0) {
    echo "<table>
            <tr>
                <td colspan='5' class='judul'>Data Kecamatan di Kabupaten Sleman</td>
            </tr>
            <tr class='header'>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas (km²)</th>
                <th>Jumlah Penduduk</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['Kecamatan']) . "</td>
                <td>" . htmlspecialchars($row['Longitude']) . "</td>
                <td>" . htmlspecialchars($row['Latitude']) . "</td>
                <td>" . number_format($row['Luas'], 2, ',', '.') . "</td>
                <td>" . number_format($row['Jumlah_Penduduk'], 0, ',', '.') . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align:center;'>Tidak ada data ditemukan.</p>";
}

$conn->close();
?>

</body>
</html>
