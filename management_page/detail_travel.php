<?php
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM travel WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $titles = $row['nama_travel'];

        $kontak = $row['kontak'];
        $alamat = $row['alamat'];

        $deskripsi_travel = $row['deskripsi_travel'];


        $title = "Detail dan Lokasi : " . $titles;

        // Pastikan latlng adalah format array atau decode jika berupa JSON string
        // $latlngArr = json_decode($latlng);  // Mengkonversi string JSON menjadi array
        ?>
<div class="row col-11" id="detail-travel">


    <div class="kotak-des">
        <h6 class="h6 text-center">Deskripsi</h6>
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Detail</th>
            </tr>
            <tr>
                <td>Nama Travel</td>
                <td>
                    <h6><?php echo $titles; ?></h6>
                </td>
            </tr>
            <!-- <tr>
                <td>Rute</td>
                <td>
                    <h6 class="text-justify"><?php echo $rute; ?></h6>
                </td>
            </tr>
            <tr>
                <td>Biaya Per-Orang</td>
                <td>
                    <h6 class="text-justify"><?php echo $tiket_org; ?></h6>
                </td>
            </tr>
            <tr>
                <td>Biaya Paket</td>
                <td>
                    <h6 class="text-justify"><?php echo $tiket_paket; ?></h6>
                </td>
            </tr> -->
            <tr>
                <td>Kontak</td>
                <td>
                    <h6 class="text-justify"><?php echo $kontak; ?></h6>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>
                    <h6 class="text-justify"><?php echo $deskripsi_travel; ?></h6>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <h6 class="text-justify"><?= $alamat; ?></h6>
                </td>
                
            </tr>
            <tr></tr>

            <!-- <tr>
                <td colspan="2">
                    <center>
                    <div class="btn btn-success"><a href="?page=rute-travel&id=<?= $row['id']; ?>" class="text-decoration-none text-white">Rute</a></div>
                    </center>
                </td>
            </tr> -->
        </table>
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


