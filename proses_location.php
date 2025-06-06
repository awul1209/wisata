<?php
include 'koneksi.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Menampilkan semua error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Query untuk mengambil data lokasi wisata
$sql = "SELECT * FROM wisata";
$result = mysqli_query($koneksi, $sql);

// Array untuk menampung data wisata
$wisata = [];

if ($result->num_rows > 0) {
    // Ambil setiap baris dan masukkan ke dalam array
    while($row = $result->fetch_assoc()) {
        // Decode latlng yang berformat JSON
        $latlng = json_decode($row["latlng"]);

        // Pastikan latlng valid dan berupa array dengan 2 elemen
        if (is_array($latlng) && count($latlng) == 2) {
            $wisata[] = [
                "id" => $row["id"],
                "kategori" => $row["kategori"],
                "name" => $row["nama_wisata"],
                "operasional" => $row["operasional"],
                "lat" => $latlng[0], // Lat
                "lon" => $latlng[1]  // Lon
            ];
        } else {
            // Jika latlng tidak valid, tampilkan error atau log
            error_log("Invalid latlng for wisata: " . $row["nama_wisata"]);
        }
    }
} else {
    // Jika tidak ada data ditemukan
    echo json_encode(["error" => "No data found"]);
    exit;
}

// Encode array wisata menjadi JSON dan kirim ke frontend
echo json_encode($wisata);

// Tutup koneksi database
mysqli_close($koneksi);
?>
