<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Kecamatan</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
            background-color: #f8f9fa;
        }
        form {
            width: 400px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Form Edit Data Kecamatan</h2>

    <?php
    // === Koneksi ke database ===
    $conn = new mysqli("localhost", "root", "", "kecamatan_sleman");
    if ($conn->connect_error) {
        die("<p style='color:red; text-align:center;'>Koneksi gagal: " . $conn->connect_error . "</p>");
    }

    // === Ambil ID dari URL ===
    if (!isset($_GET['id'])) {
        die("<p style='text-align:center;color:red;'>ID tidak ditemukan.</p>");
    }
    $id = $_GET['id'];

    // === Ambil data dari database ===
    $sql = "SELECT * FROM kecamatan WHERE ID = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
            
            <label>Kecamatan:</label>
            <input type="text" name="kecamatan" value="<?php echo $row['Kecamatan']; ?>" required>

            <label>Longitude:</label>
            <input type="text" name="longitude" value="<?php echo $row['Longitude']; ?>" required>

            <label>Latitude:</label>
            <input type="text" name="latitude" value="<?php echo $row['Latitude']; ?>" required>

            <label>Luas (km²):</label>
            <input type="number" step="0.01" name="luas" value="<?php echo $row['Luas']; ?>" required>

            <label>Jumlah Penduduk:</label>
            <input type="number" name="jumlah_penduduk" value="<?php echo $row['Jumlah_Penduduk']; ?>" required>

            <input type="submit" value="Simpan Perubahan">
        </form>
    <?php
    } else {
        echo "<p style='text-align:center;color:red;'>Data tidak ditemukan.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
