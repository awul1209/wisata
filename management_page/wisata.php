<?php
// ======================================================================
// BAGIAN 1: LOGIKA PHP BARU (MENGGUNAKAN GET)
// ======================================================================

// Koneksi ke database (diasumsikan sudah ada)
// include 'koneksi.php';

// Ambil semua kategori unik dari database untuk membuat tombol filter
$kategori_list = [];
$query_kategori_all = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM wisata WHERE kategori IS NOT NULL AND kategori != ''");
while ($row = mysqli_fetch_assoc($query_kategori_all)) {
    $kategori_list[] = $row['kategori'];
}

// Inisialisasi query dasar
$query_wisata_base = "SELECT wisata.id, nama_wisata, kec, wisata.gambar, FORMAT(COALESCE(SUM(rating), 0) / COUNT(komentar.id), 1) as rating 
                      FROM wisata 
                      LEFT JOIN komentar ON wisata.id=komentar.wisata_id 
                      WHERE wisata.status='aktif'";

// Inisialisasi array untuk kondisi WHERE
$conditions = [];

// Ambil parameter filter dari URL (GET)
$kec_filter = isset($_GET['kec']) ? mysqli_real_escape_string($koneksi, $_GET['kec']) : '';
$kategori_filter = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : '';
$wisata_search = isset($_GET['wisata']) ? mysqli_real_escape_string($koneksi, $_GET['wisata']) : '';

// Bangun kondisi query berdasarkan filter yang ada
if (!empty($kec_filter)) {
    $conditions[] = "kec='$kec_filter'";
}
if (!empty($kategori_filter)) {
    $conditions[] = "kategori='$kategori_filter'";
}
if (!empty($wisata_search)) {
    $conditions[] = "nama_wisata LIKE '%$wisata_search%'";
}

// Gabungkan semua kondisi ke query dasar
if (count($conditions) > 0) {
    $query_wisata_base .= " AND " . implode(' AND ', $conditions);
}

// Logika Pagination (disesuaikan untuk query dinamis)
// KODE BARU (PERBAIKAN)
$query_jumlah_data = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM ($query_wisata_base GROUP BY wisata.id) AS subquery");
$row_jumlah_data = mysqli_fetch_assoc($query_jumlah_data);
$total_data = $row_jumlah_data['total'];

$data_per_halaman = 16;
$total_halaman = ceil($total_data / $data_per_halaman);
$halaman_saat_ini = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai_data = ($halaman_saat_ini - 1) * $data_per_halaman;

// Query final untuk menampilkan data dengan grouping dan pagination
$query_wisata_final = $query_wisata_base . " GROUP BY wisata.id ORDER BY wisata.id DESC LIMIT $mulai_data, $data_per_halaman";
$result_wisata = mysqli_query($koneksi, $query_wisata_final);

?>

<?php include 'layout/jumbotron.php' ?>
<div class="kotak-kosong" id="filter-wisata">
<h2 class="text-center mt-3">Temukan Destinasi Impian Anda</h2>
</div>
<form action="?page=wisata#filter-wisata" method="get" class="mb-4 mt-3" >
    <input type="hidden" name="page" value="wisata">
    
    <div class="d-flex flex-wrap justify-content-center gap-2" >
        <select class="form-select" name="kec" style="width: auto;">
            <option value="">Semua Kecamatan</option>
            <?php
            $query_kecamatan = mysqli_query($koneksi, "SELECT DISTINCT kec FROM wisata WHERE kec IS NOT NULL AND kec != ''");
            while ($row = mysqli_fetch_assoc($query_kecamatan)) {
                // Tandai sebagai 'selected' jika cocok dengan filter saat ini
                $selected = ($kec_filter == $row['kec']) ? 'selected' : '';
                echo "<option value='{$row['kec']}' $selected>{$row['kec']}</option>";
            }
            ?>
        </select>

        <div class="input-group" style="width: 300px;">
            <input type="text" class="form-control" name="wisata" placeholder="Cari nama wisata..." value="<?= htmlspecialchars($wisata_search) ?>">
            <button class="btn text-white" style="background-color:#004072;" type="submit">Cari</button>
        </div>
    </div>
</form>

<div class="text-center mb-5">
    <div class="btn-group flex-wrap" role="group" aria-label="Filter Kategori">
                   <?php
                $all_class = empty($kategori_filter) ? 'btn-primary' : 'btn-outline-primary';
                // Tambahkan anchor #filter-wisata ke link
                $base_link = "?page=wisata&kec=".urlencode($kec_filter)."&wisata=".urlencode($wisata_search)."#filter-wisata";
            ?>
            <a href="<?= $base_link ?>" class="btn <?= $all_class ?>">Semua Kategori</a>
            
            <?php foreach ($kategori_list as $kategori): ?>
                <?php
                    $kategori_class = ($kategori_filter == $kategori) ? 'btn-primary' : 'btn-outline-primary';
                    $kategori_link = "?page=wisata&kategori=".urlencode($kategori)."&kec=".urlencode($kec_filter)."&wisata=".urlencode($wisata_search)."#filter-wisata";
                ?>
                <a href="<?= $kategori_link ?>" class="btn <?= $kategori_class ?>"><?= htmlspecialchars($kategori) ?></a>
            <?php endforeach; ?>
    </div>
</div>


<center>
    <h2 id="h2">Wisata</h2>
</center>

<div class="kotak-wisata col-11">
    <?php
    if (mysqli_num_rows($result_wisata) > 0) {
        while ($row = mysqli_fetch_assoc($result_wisata)) {
    ?>
        <div class="card">
            <img src="./assets/images/wisata/<?= $row['gambar']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['nama_wisata']; ?></h5>
                <p class="card-text" style="display:block;">kec. <?= $row['kec']; ?>
                <p style="font-size: 0.8em;" class="card-info">Rating ⭐ <?= $row['rating'] ?? 0 ?> / 5</p>
                <a style="display:block; padding: 1px; width:60px; margin-top:3px; background-color:#004072;" href="?page=detail&id=<?= $row['id']; ?>" class="btn text-white">Detail</a>
            </div>
        </div>
    <?php 
        }
    } else {
        echo '<div class="alert alert-warning text-center">Wisata tidak ditemukan. Silakan coba filter yang lain.</div>';
    }
    ?>
</div>


<div id="kotak-pagination">
    <nav aria-label="Page navigation example" style="display: flex; justify-content: center; margin-bottom:20px;">
        <ul class="pagination">
            </ul>
    </nav>
</div>