<?php
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $titles = $row['nama_wisata'];
        $latlng = $row['latlng']; // latlng harus berupa string yang bisa di-parse menjadi array
        $deskripsi = $row['deskripsi'];
        $operasional = $row['operasional'];
        $harga_tiket = $row['harga_tiket'];
        $gambar1 = $row['gambar1'];
        $gambar2 = $row['gambar2'];
        $gambar3 = $row['gambar3'];
        $gambar4 = $row['gambar4'];
        $gambar5 = $row['gambar5'];


        $title = "Detail dan Lokasi : " . $titles;

        // Pastikan latlng adalah format array atau decode jika berupa JSON string
        $latlngArr = json_decode($latlng);  // Mengkonversi string JSON menjadi array
        ?>







<div class="row col-11" id="detail">
<!-- Leaflet core -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.min.js"></script>



<style>
     .scrollable-content {
        padding: 5px;
        text-align: justify;
        max-height: 200px;
        overflow-y: auto;
    }
    #route-instructions {
        max-height: 350px;
        overflow-y: auto;
        padding-right: 10px;
    }
    #route-instructions li i {
        margin-right: 8px;
        color: #007bff;
    }
    #map-canvas{
        z-index: 1;
    }
    .leaflet-routing-container.leaflet-control {
        display: none !important;
    }
</style>

<div class="kotak-petunjuk">
    <h6 class="h6 text-center">Deskripsi</h6>
     <table class="table">
            <tr>
                <th>Item</th>
                <th>Detail</th>
            </tr>
            <tr>
                <td>Nama Wisata</td>
                <td>
                    <h6><?php echo $titles; ?></h6>
                </td>
            </tr>
            <tr>
                <td>Operasional</td>
                <td>
                    <h6 class="text-justify"><?php echo $operasional; ?></h6>
                </td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td>
                    <h6 class="text-justify"><?php echo $harga_tiket; ?></h6>
                </td>
            </tr>
   



            <tr>
                <td colspan="2">
                    <img src="./assets/images/wisata/<?=  $gambar1;  ?>" alt="" width="100%" style="max-height:300px">
                </td>
  
            </tr>
           
            <tr id="trscroll">
                  <td rowspan="2" colspan="2">
        <div class="scrollable-content">
            <?= $deskripsi; ?>
        </div>
    </td>
            </tr>
                      <tr>
                 <td colspan="2" style="display: none;">
                    <center>
                    <div class="btn" style="background-color:#004072;"><a href="?page=rute&id=<?= $row['id']; ?>" class="text-decoration-none text-white">Rute</a></div>
                    </center>
                </td>
            </tr>
        </table>


</div>

<div class="kotak-peta">
    <h6 class="h6 text-center">Peta</h6>
    <div class="text-center" id="map-canvas" style="height: 350px;"></div>
        <div id="route-instructions" style="padding: 10px; font-size: 14px; overflow-y: auto;"></div>
        
               
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.min.js"></script>

<!-- CORS helper (WAJIB untuk OpenRouteService) -->
<script src="https://unpkg.com/corslite@0.0.7/corslite.js"></script>

<!-- OpenRouteService Router Plugin -->
<script src="https://unpkg.com/@gegeweb/leaflet-routing-machine-openroute@latest/dist/leaflet-routing-openroute.min.js"></script>


<script>
    var lat = <?php echo $latlngArr[0]; ?>;
    var lng = <?php echo $latlngArr[1]; ?>;

    var map = L.map('map-canvas').setView([lat, lng], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19,
    }).addTo(map);

    var wisataLatLng = L.latLng(lat, lng);
    var wisataMarker = L.marker(wisataLatLng, {
        icon: L.icon({
            iconUrl: './assets/images/loka.png',
            iconSize: [50, 50],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        })
    }).addTo(map).bindPopup("<b><?php echo $titles; ?></b><br>Operasional: <?php echo $operasional; ?>");

    let routingControl = null;
    let startMarker = null;
    const instructionDiv = document.getElementById('route-instructions');

    function getIcon(text) {
        if (text.includes("kiri")) return '<i class="fa fa-arrow-left"></i>';
        if (text.includes("kanan")) return '<i class="fa fa-arrow-right"></i>';
        if (text.includes("lurus") || text.includes("Lanjutkan")) return '<i class="fa fa-arrow-up"></i>';
        if (text.includes("bundaran")) return '<i class="fa fa-sync-alt"></i>';
        if (text.includes("Tujuan")) return '<i class="fa fa-flag-checkered"></i>';
        return '<i class="fa fa-arrow-right"></i>';
    }

    function createOrUpdateRoute(startLatLng) {
        if (startMarker) {
            map.removeLayer(startMarker);
        }
        startMarker = L.marker(startLatLng, { draggable: true }).addTo(map)
            .bindPopup("<b>Lokasi Awal</b>").openPopup();
        startMarker.on('dragend', (e) => createOrUpdateRoute(e.target.getLatLng()));

        instructionDiv.innerHTML = "<p class='text-info'>Mencari rute (via Openrouteservice)...</p>";

        if (routingControl) {
            map.removeControl(routingControl);
        }

        // Gunakan API Key Anda
        var orsApiKey = '5b3ce3597851110001cf6248e62069013df5487da389ad987962b5ce';

        routingControl = L.Routing.control({
            waypoints: [startLatLng, wisataLatLng],
            router: new L.Routing.OpenRouteService(orsApiKey, {
                profile: "driving-car"
            }),
            createMarker: () => null,
            addWaypoints: false,
            draggableWaypoints: false,
            show: false,
            lineOptions: {
                styles: [{ color: '#fd7e14', opacity: 0.8, weight: 6 }]
            }
        })
        .on('routesfound', function (e) {
            var route = e.routes[0];
            var totalTime = route.summary.totalTime;
            var totalDistanceKm = (route.summary.totalDistance / 1000).toFixed(2);
            var jam = Math.floor(totalTime / 3600);
            var menit = Math.floor((totalTime % 3600) / 60);
            var waktuTempuh = jam > 0 ? `${jam} jam ${menit} menit` : `${menit} menit`;

            var output = `<p><strong>Total jarak:</strong> ${totalDistanceKm} km</p>`;
            output += `<p><strong>Estimasi waktu (Mobil):</strong> ${waktuTempuh}</p><hr/>`;

            if (route.instructions && route.instructions.length > 0) {
                output += `<strong>Petunjuk Arah:</strong><ol>`;
                route.instructions.forEach(function (step) {
                if (step.text) {
                    let distance = Math.round(step.distance);
                    let text = step.text
                    .replace("Turn left", "Belok kiri")
                    .replace("Turn right", "Belok kanan")
                    .replace("Continue straight", "Lurus terus")
                    .replace("Continue", "Lanjutkan")
                    .replace("Destination", "Tujuan")
                    .replace("at the roundabout", "di bundaran")
                    .replace("Take the", "Ambil")
                    .replace("exit", "jalan keluar")
                    .replace(" to stay on", " untuk tetap di")
                    .replace("onto", "menuju")
                    .replace("Head", "Menuju")
                    .replace("You have arrived at your destination, on the right", "Anda telah tiba di tujuan Anda, di sebelah kanan.")
                    .replace("You have arrived at your destination, on the left", "Anda telah tiba di tujuan Anda, di sebelah kiri.")
                    .replace("Exit the traffic circle", "Keluar dari bundaran")
                    .replace("Enter the traffic circle and take the 1st", "Masuk ke bundaran lalu ambil jalan pertama")
                    .replace("west on", "ke barat")
                    .replace("east", "timur")
                    .replace("west", "barat")
                    .replace("northeast", "timur laut")
                    .replace("southwest", "barat daya")
                    .replace("north", "utara")
                    .replace("Lanjutkanz", "Lanjutkan")
                    .replace("Lanjutkanz tout droit sur Jalan Kusuma Bangsa", "Lanjutkan lurus di Jalan Kusuma Bangsa")
                    .replace("Tournez à gauche sur Jalan Kusuma Bangsa", "Belok kiri ke Jalan Kusuma Bangsa")
                    .replace("Démarrez en direction de l’Ouest sur Jalan BKR Pelajar", "Mulai menuju ke barat di Jalan BKR Pelajar.")
                    .replace("south", "selatan ");
                output += `<li>${getIcon(text)} ${text} (${distance} m)</li>`;
                    }
                });
                output += `</ol>`;
            }
            instructionDiv.innerHTML = output;
        })
        .on('routingerror', function (e) {
            instructionDiv.innerHTML = "<p class='text-danger'><b>Rute Tidak Ditemukan.</b><br>Layanan Openrouteservice gagal atau rute tidak ada.</p>";
            console.error("Routing Error dari Openrouteservice:", e);
        })
        .addTo(map);
    }

    navigator.geolocation.getCurrentPosition(
        (position) => createOrUpdateRoute(L.latLng(position.coords.latitude, position.coords.longitude)),
        () => instructionDiv.innerHTML = "<p class='text-info'>Gagal mendapatkan lokasi Anda. <br><b>Silakan klik di peta untuk menentukan lokasi awal.</b></p>"
    );

    map.on('click', (e) => createOrUpdateRoute(e.latlng));
</script>






</div>

<div class="kotak-galeri">
    <h2>Galeri</h2>
    <div class="slider">
        <?php
        // Asumsi variabel $koneksi dan $id sudah ada dari file utama Anda

        // 2. Struktur PHP yang lebih sederhana dan aman
        $result = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id='$id'");
        
        // Cukup ambil satu baris data karena kita query berdasarkan id unik
        if ($row = mysqli_fetch_assoc($result)) {
            // Looping untuk setiap kolom gambar (gambar1, gambar2, dst.)
            for ($i = 1; $i <= 4; $i++) {
                $gambar = $row['gambar' . $i];
                // Hanya tampilkan jika nama filenya tidak kosong
                if (!empty($gambar)) {
        ?>
                    <div class="slide-item">
                        <img src="./assets/images/wisata/<?= htmlspecialchars($gambar); ?>" alt="Galeri Wisata <?= $i; ?>">
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>


    <div class="container kotak-komentar">
        <h2 class="mb-4">Berikan Komentar Anda</h2>
        <form action="" method="post">
        <div class="stars" id="stars_1">
        <div class="star" data-value="1" onclick="setRating(this, 1, 'rating_1')"></div>
        <div class="star" data-value="2" onclick="setRating(this, 2, 'rating_1')"></div>
        <div class="star" data-value="3" onclick="setRating(this, 3, 'rating_1')"></div>
        <div class="star" data-value="4" onclick="setRating(this, 4, 'rating_1')"></div>
        <div class="star" data-value="5" onclick="setRating(this, 5, 'rating_1')"></div>
    </div>
        <input type="hidden" name="rating_1" id="rating_1" required>
            <textarea class="text-area" name="comment" placeholder="Tulis komentar Anda..." required></textarea>
            <button type="submit" name="komen">Kirim</button>
        </form>

        <?php
        $kome = mysqli_query($koneksi, "SELECT user.id,user.nama, wisata.nama_wisata,komentar,komentar.created_at FROM `komentar` JOIN user ON komentar.user_id=user.id 
JOIN wisata ON komentar.wisata_id=wisata.id WHERE wisata.id='$id'");
while($row = mysqli_fetch_assoc($kome)){
        ?>
        <div class="isi-komentar">
            <div class="kotak-profil">
                <div class="img">
                <img class="thumbnail logo" src="assets/images/icon_form/user.png">
                </div>
                <div class="text">
                    <p class="title"><?= $row['nama'] ?></p>
                    <p><?= $row['komentar'] ?></p>
                    <p class="tgl"><?= $row['created_at'] ?></p>
                </div>
            </div>
            <div class="kotak-btn">
            <!-- <div class="btn-view btn text-white" data-bs-toggle="modal" data-bs-target="#view" style="background-color:#564be6;">View</div> -->
            </div>
        </div>
    
        <?php } ?>

    </div>






<script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true
               
            });
        });
    </script>

<script>
    function setRating(star, value, inputId) {
        // Menentukan nilai rating untuk bintang yang dipilih
        var stars = star.parentElement.children;

        // Update bintang menjadi penuh atau kosong
        for (var i = 0; i < stars.length; i++) {
            if (i < value) {
                stars[i].classList.add('selected'); // Menambahkan kelas 'selected' untuk bintang penuh
            } else {
                stars[i].classList.remove('selected'); // Menghapus kelas 'selected' untuk bintang kosong
            }
        }

        // Update nilai input tersembunyi
        document.getElementById(inputId).value = value;
    }
</script>

    
<?php
if (isset($_POST['komen'])) {
    require 'koneksi.php'; // Pastikan file koneksi disertakan jika belum

    $komen = htmlspecialchars($_POST['comment']);
    $rating = isset($_POST['rating_1']) ? intval($_POST['rating_1']) : 0;
    
    // Pastikan variabel $s_nama sudah dideklarasikan sebelum digunakan
    if (empty($s_nama)) {
        echo "<script>
        Swal.fire({
            title: 'Anda Belum Terdaftar',
            text: 'Silakan login atau daftar terlebih dahulu!',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        </script>";
    } else {
        // Cek apakah user sudah memberi komentar sebelumnya
        $query = mysqli_query($koneksi, "SELECT * FROM komentar WHERE user_id = '$s_id' AND wisata_id = '$id'");
        $roww = mysqli_fetch_assoc($query);
        $id_komen = $roww['id'] ?? null;

        if (mysqli_num_rows($query) >= 1) {
            // Jika sudah ada komentar, update
            $sql = "UPDATE komentar SET 
                    komentar = '" . mysqli_real_escape_string($koneksi, $komen) . "', 
                    rating = '$rating' 
                    WHERE id = '$id_komen'";
            $result = mysqli_query($koneksi, $sql);
        } else {
            // Jika belum ada komentar, insert baru
            $sql = "INSERT INTO komentar (komentar, rating, user_id, wisata_id) 
                    VALUES ('" . mysqli_real_escape_string($koneksi, $komen) . "', '$rating', '$s_id', '$id')";
            $result = mysqli_query($koneksi, $sql);
        }

        // Cek apakah query berhasil dijalankan
        if ($result) {
            echo "<script>
            Swal.fire({
                title: 'Terima kasih atas komentarnya!',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = '?page=detail&id=$id';
                }
            });
            </script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>
