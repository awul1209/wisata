<?php
 $query = mysqli_query($koneksi,"SELECT * FROM rating WHERE user_id = '$s_id'");
 $row=mysqli_fetch_assoc($query);
     // Menangkap nilai rating dari setiap pertanyaan
     $rating_1 =$row['rating1'] ;
     $rating_2 =$row['rating2'] ;
     $rating_3 =$row['rating3'] ;
     $rating_4 =$row['rating4'] ;

         // Menghitung rata-rata rating hanya jika semua rating valid
    if ($rating_1 > 0 && $rating_2 > 0 && $rating_3 > 0 && $rating_4 > 0) {
        $average_rating = ($rating_1 + $rating_2 + $rating_3 + $rating_4) / 4;
    } else {
        $average_rating = "Anda Belum Memberi Rating";
    }
?>
<div class="kotak-dashboard">
    <div class="kotak-profil">
    <div class="card">
        <div class="card-image">
            <img src="./assets/images/icon_form/user.png" alt="Image">
        </div>
        <div class="card-content">
            <h5>Welcome <?= $s_nama ?></h5>
            <h5><?= $s_email ?></h5>
            <p class="card-description">Anda Memberi Ulasan. <strong><?= $average_rating ?></strong>  dari <strong>5</strong></p>
            <a href="?page=proses-nilai">
                <button class="card-btn text-white" style="background-color:#0092dc;">Rating</button>
            </a>
        </div>
    </div>
    </div>
</div>