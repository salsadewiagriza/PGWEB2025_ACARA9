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
        #informasi {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Form Edit Data Kecamatan</h2>
    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kecamatan_sleman";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<p style='color:red; text-align:center;'>Koneksi gagal: " . $conn->connect_error . "</p>");
    }

    // Ambil ID dari parameter URL
    $id = $_GET['id'];
    $sql = "SELECT * FROM kecamatan WHERE ID = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<form action='update.php' method='post' onsubmit='return validateForm()'>";
        while ($row = $result->fetch_assoc()) {
            echo "<input type='hidden' name='id' value='" . $row['ID'] . "'>";
            echo "<label for='kec'>Kecamatan:</label>";
            echo "<input type='text' id='kec' name='kecamatan' value='" . htmlspecialchars($row['Kecamatan']) . "' required>";

            echo "<label for='long'>Longitude:</label>";
            echo "<input type='text' id='long' name='longitude' value='" . htmlspecialchars($row['Longitude']) . "' required>";

            echo "<label for='lat'>Latitude:</label>";
            echo "<input type='text' id='lat' name='latitude' value='" . htmlspecialchars($row['Latitude']) . "' required>";

            echo "<label for='luas'>Luas (km²):</label>";
            echo "<input type='number' step='0.01' id='luas' name='luas' value='" . htmlspecialchars($row['Luas']) . "' required>";

            echo "<label for='jml_pddk'>Jumlah Penduduk:</label>";
            echo "<input type='number' id='jml_pddk' name='jumlah_penduduk' value='" . htmlspecialchars($row['Jumlah_Penduduk']) . "' required><br><br>";
        }
        echo "<input type='submit' value='Simpan Perubahan'>";
        echo "</form>";
    } else {
        echo "<p style='text-align:center;'>Data tidak ditemukan.</p>";
    }

    $conn->close();
    ?>

    <p id="informasi"></p>

    <script>
        function validateForm() {
            let luas = document.getElementById("luas").value;
            if (isNaN(luas) || luas < 0) {
                document.getElementById("informasi").innerHTML =
                    "Data luas harus berupa angka dan tidak boleh negatif!";
                return false; // hentikan submit
            }
            return true;
        }
    </script>
</body>
</html>
