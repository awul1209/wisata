<?php

// Pagination
$data_per_halaman = 8;
$query_jumlah_data = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM travel");
$row_jumlah_data = mysqli_fetch_assoc($query_jumlah_data);
$total_data = $row_jumlah_data['total'];
$total_halaman = ceil($total_data / $data_per_halaman);
$halaman_saat_ini = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$mulai_data = ($halaman_saat_ini - 1) * $data_per_halaman;

// Pencarian
if (isset($_POST['cari'])) {
 
    // $kec = $_POST['kec'];
    $travel = $_POST['travel'];


    // $kec = mysqli_real_escape_string($koneksi, $kec);
    $travel = mysqli_real_escape_string($koneksi, $travel);

    $query_travel = "SELECT * FROM travel WHERE 1=1 "; // Inisialisasi query

    // if (!empty($kec)) {
    //     $query_travel .= "AND kec='$kec' ";
    // }
    if (!empty($travel)) {
        $query_travel .= "AND nama_travel LIKE '%$travel%' ";
    }

    $query_travel .= "ORDER BY id DESC LIMIT $mulai_data, $data_per_halaman"; // Tambahkan LIMIT untuk pagination

    $query_travel = mysqli_query($koneksi, $query_travel);
} else {
    $query_travel = mysqli_query($koneksi, "SELECT * FROM travel ORDER BY id DESC LIMIT $mulai_data, $data_per_halaman");
}
?>

<form action="" method="post">
    <div class="search input-group mb-3">
       
        <div class="input-group cari" id="cari">
            <input type="text" class="form-control" name="travel" placeholder="search travel" aria-label="search travel"
                aria-describedby="basic-addon2">
            <button class="input-group-text btn text-white" style="background-color:#004072;"  type="submit" name="cari">search..</button>
            <a href="index.php?page=travel">
                <button class="btn text-white ms-1" style="background-color:#004072;" >All</button>
            </a>
        </div>
    </div>
</form>
<center>
    <h2 id="h2">Travel</h2>
</center>

<div class="kotak-travel col-11">
    <?php
    while ($row = mysqli_fetch_assoc($query_travel)) {

        ?>
        <div class="card">
            <img src="./assets/images/travel/<?= $row['gambar']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['nama_travel']; ?></h5>
                <a href="?page=detail-travel&id=<?= $row['id']; ?>" class="btn text-white" style="background-color:#004072;" >Detail</a>
            </div>
        </div>
    <?php } ?>
</div>

<div id="kotak-pagination">
    <nav aria-label="Page navigation example"  style="display: flex; justify-content: center; margin-bottom:20px;">
        <ul class="pagination">
            <?php if ($halaman_saat_ini > 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=travel&halaman=<?= $halaman_saat_ini - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php } ?>
    
            <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                <li class="page-item <?= ($i == $halaman_saat_ini) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=travel&halaman=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>
    
            <?php if ($halaman_saat_ini < $total_halaman) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=travel&halaman=<?= $halaman_saat_ini + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>













