<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web GIS Kabupaten Sleman</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    /* ===== Header (judul Web GIS & Kabupaten Sleman) ===== */
    .header {
      background-color: #b6f7b6; /* hijau muda */
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .header h1 {
      margin: 0;
      font-size: 32px;
      color: #000;
    }

    .header h2 {
      margin: 5px 0 0;
      color: #444;
      font-weight: normal;
    }

    /* Tombol tambah data di tengah */
    .tombol-tambah {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #3cb371;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    /* Layout tabel dan peta */
    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 20px;
      flex-wrap: wrap;
    }

    table {
      border-collapse: collapse;
      width: 600px;
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #ffff00;
      font-weight: bold;
    }

    /* Tombol aksi sejajar */
    .aksi {
      display: flex;
      justify-content: center;
      gap: 5px;
    }

    .hapus {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 4px;
      cursor: pointer;
    }

    .edit {
      background-color: #3498db;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 4px;
      cursor: pointer;
    }

    #map {
      width: 600px;
      height: 400px;
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <!-- ===== Header hijau muda ===== -->
  <div class="header">
    <h1>Web GIS</h1>
    <h2>Kabupaten Sleman</h2>
  </div>

  <!-- Tombol tambah data -->
  <button class="tombol-tambah">+ Tambah Data Kecamatan</button>

  <div class="container">
    <!-- ===== Tabel Data ===== -->
    <table>
      <thead>
        <tr>
          <th>Kecamatan</th>
          <th>Longitude</th>
          <th>Latitude</th>
          <th>Luas (km²)</th>
          <th>Jumlah Penduduk</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Moyudan</td>
          <td>110.2478</td>
          <td>-7.7774</td>
          <td>27,62</td>
          <td>31.497</td>
          <td class="aksi">
            <button class="hapus">Hapus</button>
            <button class="edit">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Minggir</td>
          <td>110.2484</td>
          <td>-7.7318</td>
          <td>27,27</td>
          <td>29.886</td>
          <td class="aksi">
            <button class="hapus">Hapus</button>
            <button class="edit">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Seyegan</td>
          <td>110.3003</td>
          <td>-7.7265</td>
          <td>26,63</td>
          <td>47.129</td>
          <td class="aksi">
            <button class="hapus">Hapus</button>
            <button class="edit">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Godean</td>
          <td>110.2957</td>
          <td>-7.7681</td>
          <td>26,84</td>
          <td>72.028</td>
          <td class="aksi">
            <button class="hapus">Hapus</button>
            <button class="edit">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Gamping</td>
          <td>110.3202</td>
          <td>-7.7903</td>
          <td>29,25</td>
          <td>108.675</td>
          <td class="aksi">
            <button class="hapus">Hapus</button>
            <button class="edit">Edit</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- ===== Peta Leaflet ===== -->
    <div id="map"></div>
  </div>

  <script>
    // Inisialisasi peta
    var map = L.map('map').setView([-7.75, 110.30], 11);

    // Layer dasar
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Data marker kecamatan
    var kecamatan = [
      { nama: "Moyudan", lat: -7.7774, lon: 110.2478 },
      { nama: "Minggir", lat: -7.7318, lon: 110.2484 },
      { nama: "Seyegan", lat: -7.7265, lon: 110.3003 },
      { nama: "Godean", lat: -7.7681, lon: 110.2957 },
      { nama: "Gamping", lat: -7.7903, lon: 110.3202 }
    ];

    kecamatan.forEach(function(k) {
      L.marker([k.lat, k.lon]).addTo(map)
        .bindPopup("<b>" + k.nama + "</b>");
    });
  </script>
</body>
</html>
