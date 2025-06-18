<?php

// Query untuk mengambil semua data rating
$query = "SELECT * FROM rating";
$stmt = mysqli_query($koneksi, $query);

// Mengambil semua data rating
$data = mysqli_fetch_all($stmt, MYSQLI_ASSOC);

// Fungsi untuk menentukan ulasan berdasarkan rating
function buatUlasan($rating) {
    switch ($rating) {
        case 1:
            return "Kurang";
        case 2:
            return "Cukup";
        case 3:
            return "Baik";
        case 4:
            return "Sangat Baik";
        case 5:
            return "Sempurna";
        case 6:
            return "Sempurna";
        default:
            return "Tidak Valid";
    }
}

// Menyimpan rating per kategori
$semua_rating = [];
$all_ratings_combined = []; // Array untuk menyimpan semua rating dari kategori 1 hingga 4

// Mengambil rating per kategori dari setiap data
foreach ($data as $row) {
    for ($i = 1; $i <= 1; $i++) {
        // Menambahkan rating dari setiap kategori ke array $semua_rating
        $semua_rating[$i][] = $row['rating' . $i];
        
        // Menambahkan semua rating ke dalam satu array untuk perhitungan rata-rata total
        $all_ratings_combined[] = $row['rating' . $i];
    }
}

// Membuat ulasan per kategori berdasarkan rata-rata rating
$ulasan_per_kategori = [];
for ($i = 1; $i <= 1; $i++) {
    $total_rating = array_sum($semua_rating[$i]); // Menghitung total rating per kategori
    $rata_rata_rating = $total_rating / count($semua_rating[$i]); 
    // Menghitung rata-rata rating per kategori
    $ulasan_per_kategori[$i] = buatUlasan(round($rata_rata_rating)); // Menyimpan ulasan berdasarkan rata-rata kategori
}

// Menghitung rata-rata total dari semua rating
$total_rating_combined = array_sum($all_ratings_combined); // Total rating dari semua kategori
$rata_rata_combined = round($total_rating_combined / count($all_ratings_combined),1); // Rata-rata rating keseluruhan
$ulasan_total = buatUlasan(round($rata_rata_combined)); // Ulasan total berdasarkan rata-rata keseluruhan

?>

<script src="assets/js/alert.js"></script>
<div class="kotak-rating">
<?php if (!isset($s_nama)) { ?>
    <h3>Welcome back, Pengunjung</h3>

    <?php if($ulasan_total == 'Kurang') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Cukup') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Baik') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Sangat Baik') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Sempurna') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } ?>

    

    


      <!-- user -->
<?php } else { ?>
    <h3>Welcome back, <?= $s_nama ?></h3><br>
    <?php if($ulasan_total == 'Kurang') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini :  <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Cukup') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Baik') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini :  <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Sangat Baik') { ?>
      <!-- Ulasan Total -->
      <p><strong>Rating Website Wisata ini : <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } else if($ulasan_total == 'Sempurna') { ?>
      <!-- Ulasan Total -->
      <p><strong>Ulasan Total (dari semua pertanyaan): <?= $rata_rata_combined ?> dari 5  </strong>( <?= $ulasan_total ?> )</p>
      <div class="stars">
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
        <div class="star-rating"></div>
    </div>
    <?php } ?>
 
<?php }  ?>

    <form action="" method="post">
        <button type="submit" name="nilai" class="btn text-white mt-2" style="background-color:#004072;" >Nilai</button>
    </form>
</div>

<div class="komentar my-5 mb-5">
    <h4>Komentar & Rating</h4>
    <hr>
    
    <?php
    // --- QUERY DIPERBAIKI: Menambahkan `rating` dan diurutkan berdasarkan terbaru ---
    $query_komen = mysqli_query($koneksi, "
        SELECT 
            user.nama, 
            rating.komentar, 
            rating.rating1,
            rating.created_at 
        FROM rating 
        JOIN user ON rating.user_id = user.id
        ORDER BY rating.created_at DESC
    ");

    if (mysqli_num_rows($query_komen) > 0) {
        while ($row = mysqli_fetch_assoc($query_komen)) {
    ?>
            <div class="d-flex align-items-start mb-4">
                <div class="flex-shrink-0">
                    <img src="./assets/images/icon_form/user.png" alt="user" class="rounded-circle" width="50px">
                </div>
                
                <div class="ms-3 flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong class="mb-1"><?= htmlspecialchars($row['nama']) ?></strong>
                        
                        <div class="text-warning">
                            <?php 
                            $rating = (int)$row['rating1']; // Ambil nilai rating
                            for ($i = 1; $i <= 5; $i++) {
                                // Tampilkan bintang penuh jika $i <= nilai rating, jika tidak, tampilkan bintang kosong
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // Ikon bintang penuh
                                } else {
                                    echo '<i class="far fa-star"></i>'; // Ikon bintang kosong
                                }
                            }
                            ?>
                        </div>
                    </div>
                    
                    <small class="text-muted d-block mb-2">
                        <?= date('d M Y, H:i', strtotime($row['created_at'])) ?>
                    </small>
                    
                    <p class="mb-0">
                        <?= nl2br(htmlspecialchars($row['komentar'])) ?>
                    </p>
                </div>
            </div>
            <hr class="my-3 d-md-none"> <?php 
        } // Akhir while loop
    } else { ?>
        <p class="text-muted fst-italic">Belum ada komentar.</p>
    <?php } ?>
</div>

<?php
// Proses setelah tombol 'Nilai' diklik
if (isset($_POST['nilai'])) {
    if (!empty($s_nama)) {
        echo "<script>
            window.location = '?page=proses-nilai';
            </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Anda Belum Terdaftar',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {}
            });
        </script>";
    }
}
?>
