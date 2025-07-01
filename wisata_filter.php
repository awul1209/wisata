<?php
include 'koneksi.php';
// Menangani kategori yang dipilih
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Query berdasarkan kategori
if ($kategori) {
  $query_wisata = mysqli_query($koneksi, "SELECT wisata.id,nama_wisata,kec,wisata.gambar,  FORMAT(SUM(rating) / COUNT(komentar.id), 1) as rating  FROM wisata LEFT JOIN komentar ON wisata.id=komentar.wisata_id WHERE kategori='$kategori' GROUP BY wisata.id ORDER BY wisata.id DESC LIMIT 4");
} else {
  $query_wisata = mysqli_query($koneksi, "SELECT wisata.id,nama_wisata,kec,wisata.gambar,  FORMAT(SUM(rating) / COUNT(komentar.id), 1) as rating  FROM wisata LEFT JOIN komentar ON wisata.id=komentar.wisata_id GROUP BY wisata.id ORDER BY wisata.id DESC LIMIT 4");
}


// <p class="card-text" style="display:block;">Rating ⭐' .$row['rating'] ?? 0 .' / 5</p>
// Menampilkan hasil wisata
while ($row = mysqli_fetch_assoc($query_wisata)) {
  echo '
  <div class="card">
    <img src="./assets/images/wisata/' . $row['gambar'] . '" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">' . $row['nama_wisata'] . '</h5>
        <p class="card-text" style="display:block;">kec. ' . $row['kec']. '</p>
      <a style="display:block; padding: 1px; width:60px; margin-top:3px; background-color:#004072" href="?page=detail&id=' . $row['id'] . '" class="btn text-white">Lihat</a>
    </div>
  </div>';
}
?>
