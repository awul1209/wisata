<?php
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM travel WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $titles = $row['nama_travel'];
        $kontak = $row['kontak'];
        $alamat = $row['alamat'];
        $gambar = $row['gambar'];
        $area_layanan = $row['area_layanan'];
        $deskripsi_travel = $row['deskripsi_travel'];
        $title = "Detail dan Lokasi : " . $titles;

        // Pastikan latlng adalah format array atau decode jika berupa JSON string
        // $latlngArr = json_decode($latlng);  // Mengkonversi string JSON menjadi array
        ?>
<div class="row col-11" id="detail-travel">
   <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0">
                    <img src="./assets/images/travel/<?= htmlspecialchars($gambar) ?>" class="img-fluid rounded shadow-sm" alt="Foto <?= htmlspecialchars($titles) ?>">
                </div>

                <div class="col-md-7">
                    <h1 class="display-5 fw-bold"><?= htmlspecialchars($titles) ?></h1>
                    
                    <p class="fs-5 text-muted"><?= $deskripsi_travel ?></p>
                    
                    <hr class="my-4">

                    <p class="fs-6">
                        <i class="fas fa-phone-alt me-2"></i> <strong>Kontak:</strong> <?= htmlspecialchars($kontak) ?>
                    </p>
                    <p class="fs-6">
                        <i class="fas fa-map-marker-alt me-2"></i> <strong>Alamat:</strong> <?= $alamat ?>
                    </p>

                    <div class="mt-4">
                        <h5><i class="fas fa-route me-2"></i>Area Layanan:</h5>
                        <?php
                            // Pecah string area_layanan menjadi array
                            $area_array = explode(',', $area_layanan);
                            foreach ($area_array as $area) :
                        ?>
                            <span class="badge bg-secondary me-1 mb-1 p-2"><?= htmlspecialchars(trim($area)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="kotak-peta">
        <h6 class="h6 text-center">Peta</h6>

        <!-- Container untuk Map -->
        <div class="text-center" id="map-canvas" style="height: 400px;"></div>

        <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>

        <script>
            // Pastikan koordinat latlng di-set sebagai array [latitude, longitude]
            var lat = <?php echo $latlngArr[0]; ?>;
            var lng = <?php echo $latlngArr[1]; ?>;

            // Membuat peta dan menetapkan pusat serta zoom level
            var map = L.map('map-canvas').setView([lat, lng], 13);

            // Menambahkan tile layer ke peta menggunakan OpenStreetMap
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                maxZoom: 19,
            }).addTo(map);

            // Membuat icon marker (dapat mengganti dengan gambar custom seperti 'loka.png')
            var markerIcon = L.icon({
                iconUrl: './assets/images/loka.png',  // Ganti dengan path ke gambar icon yang Anda inginkan
                iconSize: [50, 50],    // Ukuran icon
                iconAnchor: [16, 32],  // Titik jangkar icon (pusat dari marker)
                popupAnchor: [0, -32]  // Posisi popup
            });

            // Menambahkan marker pada peta
            var marker = L.marker([lat, lng], { icon: markerIcon }).addTo(map);

            // Menambahkan popup (keterangan) yang muncul ketika marker diklik
            marker.bindPopup("<b>" + "<?php echo $titles; ?>" + "</b><br> Rute: <?php echo $rute; ?>");
        </script>
    </div>

</div>


