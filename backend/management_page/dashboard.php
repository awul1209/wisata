<?php
$date=date('Y-m-d');
$jmlseller = mysqli_query($koneksi, "SELECT COUNT(wisata.id) as jml_wisata FROM wisata");
$seller = mysqli_fetch_assoc($jmlseller);

$user=mysqli_query($koneksi,"SELECT COUNT(travel.id) jml_travel FROM travel");
$userr=mysqli_fetch_assoc($user);

$produk=mysqli_query($koneksi,"SELECT COUNT(user.id) jml_user FROM user WHERE level='user'");
$produkk=mysqli_fetch_assoc($produk);


?>

<div class="row kotak-seller">
    <!-- ./col -->
    <div class="card-seller">
        <!-- small box -->
        <div class="small-box" style="background-color: #fff; color:#222; border-radius: 10px; box-shadow: 2px 2px 1px #b8b8b8, -1px -1px 1px #ececec;">
            <div class="inner" style="padding: 20px;">
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <h3 style=" font-weight: bold;">
                            <?= $seller['jml_wisata']; ?>
                        </h3>
                        <p style=" font-weight: bold;">Wisata</p>
                    </div>
                    <!-- Right: Image -->
                    <div>
                        <img src="assets/img/wisata/wisata.png" alt="Pesanan" style="width: 60px; height: auto;"/>
                    </div>
                </div>
            </div>
            <div class="footer" style="padding: 10px; text-align: center; background-color: #004072; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <a href="?page=data-wisata" class="small-box-footer" style="color: #fff;  font-weight: bold; text-decoration: none;">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="card-seller">
        <!-- small box -->
        <div class="small-box" style="background-color: #fff; color:#222; border-radius: 10px; box-shadow: 2px 2px 1px #b8b8b8, -1px -1px 1px #ececec;">
            <div class="inner" style="padding: 20px;">
                <!-- Left: Data count -->
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <h3 style="  font-weight: bold;">
                            <?= $userr['jml_travel']; ?>
                        </h3>
                        <p style=" font-weight: bold;">Travel</p>
                    </div>
                    <!-- Right: Image -->
                    <div>
                        <img src="assets/img/wisata/travel.png" alt="Transaksi" style="width: 60px; height: auto;"/>
                    </div>
                </div>
            </div>
            <div class="footer" style="padding: 10px; text-align: center; background-color:#004072; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <a href="?page=data-travel" class="small-box-footer" style="color: #fff; font-weight: bold; text-decoration: none;">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="card-seller">
        <!-- small box -->
        <div class="small-box" style="background-color: #fff; color:#222; border-radius: 10px; box-shadow: 2px 2px 1px #b8b8b8, -1px -1px 1px #ececec;">
            <div class="inner" style="padding: 20px;">
                <!-- Left: Data count -->
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <h3 style="  font-weight: bold;">
                            <?= $produkk['jml_user']; ?>
                             
                        </h3>
                        <p style=" font-weight: bold;">Member</p>
                    </div>
                    <!-- Right: Image -->
                    <div>
                        <img src="assets/img/wisata/member.png" alt="Transaksi" style="width: 60px; height: auto;"/>
                    </div>
                </div>
            </div>
            <div class="footer" style="padding: 10px; text-align: center; background-color:#004072; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                <a href="?page=data-user" class="small-box-footer" style="color: #fff;  font-weight: bold; text-decoration: none;">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>


<div class="kotak-chart">
    <div class="pengunjung">
        <canvas id="pengunjung"></canvas>
    </div>
    <div class="kategori">
        <canvas id="kategori"></canvas>
    </div>
    <br>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
 
<script>
    let tahunSekarang = new Date().getFullYear();
    const pengunjung = document.getElementById('pengunjung');
    new Chart(pengunjung, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: '# Data Pengunjung ' + tahunSekarang,
                data:[
                    <?php
                    $sql_pengunjung1 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-01-01' AND '$tahun-01-30'");
                    echo mysqli_num_rows($sql_pengunjung1);
                    ?>,
                    <?php
                    $sql_pengunjung2 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-02-01' AND '$tahun-02-29'");
                    echo mysqli_num_rows($sql_pengunjung2);
                    ?>,
                    <?php
                    $sql_pengunjung3 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-03-01' AND '$tahun-03-30'");
                    echo mysqli_num_rows($sql_pengunjung3);
                    ?>,
                    <?php
                    $sql_pengunjung4 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-04-01' AND '$tahun-04-30'");
                    echo mysqli_num_rows($sql_pengunjung4);
                    ?>,
                    <?php
                    $sql_pengunjung5 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-05-01' AND '$tahun-05-30'");
                    echo mysqli_num_rows($sql_pengunjung5);
                    ?>,
                    <?php
                    $sql_pengunjung6 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-06-01' AND '$tahun-06-30'");
                    echo mysqli_num_rows($sql_pengunjung6);
                    ?>,
                    <?php
                    $sql_pengunjung7 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-07-01' AND '$tahun-07-30'");
                    echo mysqli_num_rows($sql_pengunjung7);
                    ?>,
                    <?php
                    $sql_pengunjung8 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-08-01' AND '$tahun-08-30'");
                    echo mysqli_num_rows($sql_pengunjung8);
                    ?>,
                    <?php
                    $sql_pengunjung9 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-09-01' AND '$tahun-09-30'");
                    echo mysqli_num_rows($sql_pengunjung9);
                    ?>,
                    <?php
                    $sql_pengunjung10 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-10-01' AND '$tahun-10-30'");
                    echo mysqli_num_rows($sql_pengunjung10);
                    ?>,
                    <?php
                    $sql_pengunjung11 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-11-01' AND '$tahun-11-30'");
                    echo mysqli_num_rows($sql_pengunjung11);
                    ?>,
                    <?php
                    $sql_pengunjung12 = mysqli_query($koneksi, "SELECT date FROM pengunjung WHERE date BETWEEN '$tahun-12-01' AND '$tahun-12-30'");
                    echo mysqli_num_rows($sql_pengunjung12);
                    ?>,
                ],
                backgroundColor: [
                    '#004072'
                ],
                borderColor: '#004072',

                // borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    min: 0,
                    max: 200
                }
            }
        }
    });
</script>

<?php
// 1. Buat satu kueri SQL yang efisien untuk mengambil semua data kategori
$sql = "SELECT kategori, COUNT(*) as jumlah FROM wisata GROUP BY kategori ORDER BY kategori ASC";
$result = mysqli_query($koneksi, $sql);

// 2. Siapkan array kosong untuk menampung label dan data chart
$chart_labels = [];
$chart_data = [];

// 3. Looping hasil kueri dan masukkan ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $chart_labels[] = $row['kategori'];
    $chart_data[] = $row['jumlah'];
}
?>

<script>
const kategori = document.getElementById('kategori');
new Chart(kategori, {
    type: 'doughnut',
    data: {
        // 4. Gunakan data dari PHP yang sudah di-encode ke format JSON
        labels: <?php echo json_encode($chart_labels); ?>,
        datasets: [{
            label: 'Jumlah Wisata per Kategori',
            data: <?php echo json_encode($chart_data); ?>,
            backgroundColor: [ // Sediakan lebih banyak warna untuk kategori dinamis
                'rgb(255, 99, 132)',  // Merah
                'rgb(54, 162, 235)', // Biru
                'rgb(255, 205, 86)', // Kuning
                'rgb(75, 192, 192)',  // Hijau Tosca
                'rgb(153, 102, 255)', // Ungu
                'rgb(255, 159, 64)',  // Oranye
                'rgb(46, 204, 113)',  // Hijau Terang
                'rgb(231, 76, 60)'    // Merah Bata
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Jumlah Wisata Berdasarkan Kategori'
            }
        }
    }
});
</script>

