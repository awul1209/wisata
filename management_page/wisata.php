<?php

// Pagination
$data_per_halaman = 16;
$query_jumlah_data = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM wisata");
$row_jumlah_data = mysqli_fetch_assoc($query_jumlah_data);
$total_data = $row_jumlah_data['total'];
$total_halaman = ceil($total_data / $data_per_halaman);
$halaman_saat_ini = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$mulai_data = ($halaman_saat_ini - 1) * $data_per_halaman;

// Pencarian
if (isset($_POST['cari'])) {
    $kec = $_POST['kec'];
    $wisata = $_POST['wisata'];

    $kec = mysqli_real_escape_string($koneksi, $kec);
    $wisata = mysqli_real_escape_string($koneksi, $wisata);

    $query_wisata = "SELECT wisata.id,nama_wisata,kec,wisata.gambar,  FORMAT(SUM(rating) / COUNT(komentar.id), 1) as rating FROM wisata LEFT JOIN komentar ON wisata.id=komentar.wisata_id WHERE 1=1 "; // Inisialisasi query

    if (!empty($kec)) {
        $query_wisata .= "AND kec='$kec' ";
    }
    if (!empty($wisata)) {
        $query_wisata .= "AND nama_wisata LIKE '%$wisata%' ";
    }

    $query_wisata .= "GROUP BY wisata.id ORDER BY wisata.id DESC LIMIT $mulai_data, $data_per_halaman"; // Tambahkan LIMIT untuk pagination

    $query_wisata = mysqli_query($koneksi, $query_wisata);
} else {
    $query_wisata = mysqli_query($koneksi, "SELECT wisata.id,nama_wisata,kec,wisata.gambar,  FORMAT(SUM(rating) / COUNT(komentar.id), 1) as rating  FROM wisata LEFT JOIN komentar ON wisata.id=komentar.wisata_id GROUP BY wisata.id ORDER BY id DESC LIMIT $mulai_data, $data_per_halaman");
}
?>
     <?php include 'layout/jumbotron.php' ?>
<form action="" method="post">
    <div class="search input-group mb-3">
        <div>
            <select class="form-select search-combo" name="kec" id="kec-pc" aria-label="Default select example">
                <option value="" selected>Cari berdasarkan Kec.</option>
                <?php
                $query_kecamatan = mysqli_query($koneksi, "SELECT DISTINCT kec FROM wisata");
                while ($row = mysqli_fetch_assoc($query_kecamatan)) { ?>
                    <option value="<?= $row['kec'] ?>"><?= $row['kec'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-group cari">
            <input type="text" class="form-control" name="wisata" placeholder="search wisata" aria-label="search wisata"
                aria-describedby="basic-addon2">
            <button class="input-group-text btn text-white" style="background-color:#004072;" type="submit" name="cari">search..</button>
            <a href="index.php?page=wisata">
                <button class="btn text-white ms-1" style="background-color:#004072;">All</button>
            </a>
        </div>
    </div>
</form>

<center>
    <h2 id="h2">Wisata</h2>
</center>

<div class="kotak-wisata col-11">
    <?php
    while ($row = mysqli_fetch_assoc($query_wisata)) {
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
    <?php } ?>
</div>

<div id="kotak-pagination">
    <nav aria-label="Page navigation example"  style="display: flex; justify-content: center; margin-bottom:20px;">
        <ul class="pagination">
            <?php if ($halaman_saat_ini > 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=wisata&halaman=<?= $halaman_saat_ini - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php } ?>
    
            <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                <li class="page-item <?= ($i == $halaman_saat_ini) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=wisata&halaman=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>
    
            <?php if ($halaman_saat_ini < $total_halaman) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=wisata&halaman=<?= $halaman_saat_ini + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>