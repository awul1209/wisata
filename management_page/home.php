

<div id="carouselExampleAutoplaying" class="carousel slide kotak-carousel" data-bs-ride="carousel">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/konten/b1.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5 class="fs-1">Nikmati Keindahan Pantai</h5>
        <p class="fs-4">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/konten/b2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fs-1">Nikmati Keindahan Pantai</h5>
        <p class="fs-4">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/konten/b3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fs-1">Nikmati Keindahan Pantai</h5>
        <p class="fs-4">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<div class="top-destination">
  <div class="judul-destination">
    <h2 class="judul-kategori">Kategori Wisata</h2>
    <div class="kategori-container">
      <?php  
      $query_kategori = mysqli_query($koneksi, "SELECT DISTINCT kategori from wisata");
      while ($row_kategori = mysqli_fetch_assoc($query_kategori)){
      ?>
      <button class="btn btn-outline-dark kategori-btn" onclick="filterWisata('<?= $row_kategori['kategori'] ?>')"><?= $row_kategori['kategori'] ?></button>
      <?php } ?>
    </div>
    <h2 class="mt-2">Destinasi Wisata Terbaru</h2>
    <center>
    <hr>
    </center>
  </div>
  <div id="wisata-container" class="kotak-destination">
    <!-- Daftar wisata akan dimuat di sini melalui AJAX -->
  </div>
</div>

<div class="map-kotak">
<h2 id="judul-map">Destinasi Terdekat</h2>
<hr>
</div>
    <div id="mymap" class="kotak-map"></div>



    <script>
        // Fungsi untuk menghitung jarak antara dua titik (Haversine formula)
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius bumi dalam kilometer
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                      Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                      Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c; // dalam kilometer
            return distance;
        }

        // Fungsi untuk memuat peta dan menampilkan marker wisata terdekat
        function loadMap(userLocation) {
            // Inisialisasi peta dengan lokasi pengguna
            const map = L.map('mymap').setView(userLocation, 12); // Set zoom level ke 12

            // Tambahkan tile layer (peta dasar)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Ambil data lokasi wisata dari backend PHP
            fetch('proses_location.php')
                .then(response => response.json())
                .then(wisataLocations => {
                    // Filter lokasi wisata berdasarkan jarak (misal 5 km)
                    const nearbyWisata = wisataLocations.filter(wisata => {
                        const distance = calculateDistance(userLocation[0], userLocation[1], wisata.lat, wisata.lon);
                        return distance <= 5; // Radius 5 km
                    });

                    // Tambahkan marker untuk setiap lokasi wisata terdekat
                    nearbyWisata.forEach(wisata => {
                        L.marker([wisata.lat, wisata.lon])
                            .addTo(map)
                            .bindPopup(`<center><b>${wisata.name}</b><br><b>${wisata.kategori}</b><br><a href="?page=detail&id=${wisata.id}" class="btn text-white" style="color:white; padding:2px 5px; font-size:12px; background-color:#004072;">Detail</a></center>`);
                    });
                })
                .catch(error => {
                    console.error('Error fetching wisata data:', error);
                });
        }

        // Ambil lokasi pengguna menggunakan Geolocation API
        navigator.geolocation.getCurrentPosition(function(position) {
            const userLocation = [position.coords.latitude, position.coords.longitude];
            console.log('User location:', userLocation);

            // Muat peta dengan lokasi pengguna
            loadMap(userLocation);
        });
    </script>





<script>
  function filterWisata(kategori) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'wisata_filter.php?kategori=' + kategori, true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById('wisata-container').innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }

  // Untuk memuat data wisata saat halaman pertama kali dimuat
  window.onload = function() {
    filterWisata('');
  };
</script>




