<?php
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
$titles = $row['nama_wisata'];
$latlng = $row['latlng']; // latlng harus berupa string yang bisa di-parse menjadi array
$deskripsi = $row['deskripsi'];
$operasional = $row['operasional'];

$title = "Detail dan Lokasi : " . $titles;

// Pastikan latlng adalah format array atau decode jika berupa JSON string
$latlngArr = json_decode($latlng);  // Mengkonversi string JSON menjadi array
?>

<div id="mapid" style="margin-top:55px; z-index: 1;"></div>
<script>
    // Pastikan koordinat latlng di-set sebagai array [latitude, longitude]
    var lat = <?php echo $latlngArr[0]; ?>;
    var lng = <?php echo $latlngArr[1]; ?>;

    var aktif = L.layerGroup();

    // Menggunakan divIcon untuk membuat marker biru
    var targetLocationIcon = L.divIcon({
        className: 'user-location-icon',
        html: '<div style="background-color: red; width: 20px; height: 20px; border-radius: 50%; border: 2px solid white;"></div>',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });



    // Lokasi yang sudah ditentukan
    var targetLocation = [lat,lng];

        // Tambahkan marker untuk lokasi pengguna dengan ikon biru
        var tergetMarker = L.marker(targetLocation, { icon: targetLocationIcon }).addTo(aktif);
        tergetMarker.bindPopup(`<?php echo $title  ?>`);

    // Set up map
    var mbAttr = 'Map data &copy; Designer : Skripsi Perencanaan Wisata';
    var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

    var Leaflet = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    });

    var googlemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: mbAttr
    });

    var mymap = L.map('mapid', {
        center: [lat,lng],
        zoom: 15,
        layers: [googlemap, aktif],
        fullscreenControl: {
            pseudoFullscreen: false
        }
    });

    var basemaps = {
        'Google Map': googlemap,
        'Jalan Map': Leaflet,
    };

    var layerControl = L.control.layers(basemaps).addTo(mymap);

    // Menggunakan divIcon untuk membuat marker biru
    var userLocationIcon = L.divIcon({
        className: 'user-location-icon',
        html: '<div style="background-color: blue; width: 20px; height: 20px; border-radius: 50%; border: 2px solid white;"></div>',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });

    // Mendapatkan lokasi pengguna saat pertama kali membuka peta
    navigator.geolocation.getCurrentPosition(function(position) {
        var userLocation = [position.coords.latitude, position.coords.longitude];

        // Tambahkan marker untuk lokasi pengguna dengan ikon biru
        var userMarker = L.marker(userLocation, { icon: userLocationIcon }).addTo(mymap);
        userMarker.bindPopup('Lokasi Anda');

        // Buat rute dari lokasi pengguna ke lokasi target
  L.Routing.control({
    waypoints: [
        L.latLng(userLocation),
        L.latLng(targetLocation)
    ],
    routeWhileDragging: true,
    show: false,
    createMarker: function() { return null; } // opsional, kalau tidak ingin marker otomatis
}).addTo(mymap);


        // Pindahkan peta ke lokasi pengguna
        mymap.setView(userLocation, 13);
    }, function() {
        alert("Lokasi pengguna tidak dapat diakses.");
    });
</script>

<style>
.leaflet-routing-container {
    display: none !important;
}
</style>



