

<?php include 'layout/jumbotron.php' ?>

<div class="top-destination">
  <div class="iklan-kiri">
   <a href="https://www.myzehotelsumenep.com/" target="_blank" class="ad-link-wrapper">
  <div class="ad-container">
    <center>
      <img src="https://manage.myzehotelsumenep.com/ImageData/Travel_guide/MA25020004/images-0.jpg" alt="Promo Paket Wisata" class="ad-image" style="width: 160px; height: 100px;">
    </center>
    <div class="ad-content">
      <h4 class="ad-title">Hotel Myze Sumenep</h4>
      <p class="ad-description">Booking Kamar Mulai dari 100 Ribu Per Hari</p>
      <span class="ad-cta-button">Lihat Detail</span>
    </div>
  </div>
  <div class="ad-container">
    <img src="https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sewa Mobil" class="ad-image" style="width: 160px; height:100px;">
    <div class="ad-content">
      <h4 class="ad-title">Sewa Mobil Hemat</h4>
      <p class="ad-description">Lepas Kunci & Dengan Sopir. Armada Terbaru, Bersih, dan Terawat.</p>
      <span class="ad-cta-button">Cek Harga</span>
    </div>
  </div>
</a>
  </div>
  <div class="iklan-kanan">
    <a href="#" class="ad-link-wrapper">
  <div class="ad-container">
    <img src="https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Sewa Mobil" class="ad-image" style="width: 160px; height:100px;">
    <div class="ad-content">
      <h4 class="ad-title">Sewa Mobil Hemat</h4>
      <p class="ad-description">Lepas Kunci & Dengan Sopir. Armada Terbaru, Bersih, dan Terawat.</p>
      <span class="ad-cta-button">Cek Harga</span>
    </div>
  </div>
    <div class="ad-container">
    <center>
      <img src="https://images.pexels.com/photos/189349/pexels-photo-189349.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Promo Paket Wisata" class="ad-image" style="width: 160px; height: 100px;">
    </center>
    <div class="ad-content">
      <h4 class="ad-title">Liburan ke Raja Ampat</h4>
      <p class="ad-description">4 Hari 3 Malam, Termasuk Snorkeling & Penginapan. Mulai dari Rp 3 Jt!</p>
      <span class="ad-cta-button">Lihat Detail</span>
    </div>
  </div>
</a>
  </div>
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

<section class="welcome-section">
  <div class="welcome-overlay"></div>
  
  <div class="welcome-container">
    <h2>Selamat Datang di Website Wisata Kabupaten Sumenep</h2>
    <p>
      Temukan pesona keindahan tersembunyi dan destinasi populer di seluruh Sumenep. 
      Kami siap membantu Anda merencanakan petualangan tak terlupakan.
    </p>
    <a href="?page=wisata" class="cta-button">Jelajahi Sekarang</a>
  </div>
</section>

<div class="map-kotak">
<h2 class="mt-5" id="judul-map">Destinasi Terdekat</h2>
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

<!-- iklan -->




