<?php
// --- (Letakkan daftar kecamatan ini di bagian atas file PHP Anda) ---
$kecamatan_sumenep = [
    'Arjasa', 'Batang Batang', 'Batuputih', 'Bluto', 'Dasuk', 'Dungkek', 'Ganding', 
    'Gayam', 'Giliginting', 'Guluk-Guluk', 'Kalianget', 'Kangayan', 'Kota Sumenep', 
    'Lenteng', 'Manding', 'Masalembu', 'Nonggunong', 'Pasongsongan', 'Pragaan', 
    'Raas', 'Rubaru', 'Sapeken', 'Saronggi', 'Talango', 'Ambunten', 'Gapura', 'Batuan'
];
sort($kecamatan_sumenep); // Urutkan berdasarkan abjad

// --- Ambil data yang ada dari DB ---
$id=$_GET['kode'];
// PENTING: Amankan query SELECT dengan prepared statement
$stmt_select = mysqli_prepare($koneksi, "SELECT * FROM travel WHERE id = ?");
mysqli_stmt_bind_param($stmt_select, "i", $id);
mysqli_stmt_execute($stmt_select);
$result_tentang = mysqli_stmt_get_result($stmt_select);
$row = mysqli_fetch_assoc($result_tentang);
mysqli_stmt_close($stmt_select);


// BARU: Siapkan data area layanan yang sudah tersimpan untuk dicentang
// Ambil string dari DB, contoh: "Arjasa, Batuan, Kota Sumenep"
$area_layanan_tersimpan_str = $row['area_layanan'] ?? '';
// Ubah string menjadi array agar mudah dicek, contoh: ['Arjasa', 'Batuan', 'Kota Sumenep']
$area_layanan_tersimpan_arr = explode(', ', $area_layanan_tersimpan_str);
?>
<div class="card card-info mt-3" id="card-add-user">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-edit"></i> Form Edit Data
        </h5>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>"> 
        <div class="card-body">

            <div class="kotak-form-user col-12">
                <div class="mb-2 kotak-input-user">
                    <label for="nama" class="col-form-label">Nama Travel:</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= htmlspecialchars($row['nama_travel']) ?>">
                </div>
                <div class="mb-2 kotak-input-user">
                    <label for="kontak" class="col-form-label">Kontak :</label>
                    <input type="text" name="kontak" class="form-control" id="kontak" value="<?= htmlspecialchars($row['kontak']) ?>">
                </div>
                <div class="mb-2 kotak-input-user">
                    <label for="gambar1-tambah" class="col-form-label">Gambar (Kosongkan jika tidak ingin diubah):</label>
                    <input class="form-control" name="gambar" id="gambar1-tambah" type="file" onchange="previewImageTambah1()">
                    <?php if ($row['gambar']) : ?>
                    <img class="foto-preview-tambah1 mt-2" src="../assets/images/travel/<?= $row['gambar'] ?>" 
                    alt="Gambar 1" width="80">
                    <?php else : ?>
                    <img class="foto-preview-tambah1 mt-2" src="" alt="" width="80">
                    <?php endif; ?>
                </div>
            </div>

           
            <div class="kotak-form-user col-12">
                <div class="mb-2 kotak-input-user">
                    <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                    <input id="deskripsi" type="hidden" name="deskripsi" value="<?= htmlspecialchars($row['deskripsi_travel']) ?>">
                    <trix-editor input="deskripsi" style="height:auto;"></trix-editor>
                </div>
                <div class="mb-2 kotak-input-user">
                    <label for="Alamat" class="col-form-label">Alamat:</label>
                    <input id="Alamat" type="hidden" name="Alamat" value="<?= htmlspecialchars($row['alamat']) ?>" >
                    <trix-editor input="Alamat" style="height:auto;"></trix-editor>
                </div>
            </div>
        </div>
         <div class="kotak-form-user col-12 mt-3">
                <div class="mb-2">
                    <label class="ms-2 col-form-label">Area Layanan (Kecamatan di Sumenep):</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; border: 1px solid #ced4da; padding: 10px; border-radius: .25rem;">
                        <?php foreach ($kecamatan_sumenep as $kecamatan) : ?>
                            <?php
                                // Cek apakah kecamatan ini ada di dalam array yang sudah disimpan
                                $isChecked = in_array($kecamatan, $area_layanan_tersimpan_arr) ? 'checked' : '';
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="area_layanan[]" value="<?= htmlspecialchars($kecamatan) ?>" id="kec_<?= str_replace(' ', '', $kecamatan) ?>" <?= $isChecked ?>>
                                <label class="form-check-label" for="kec_<?= str_replace(' ', '', $kecamatan) ?>">
                                    <?= htmlspecialchars($kecamatan) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <div class="card-footer mb-5">
            <button class="btn btn-primary" type="submit" name="simpan">Update</button>
            <a href="?page=data-travel" title="Kembali" class="btn btn-warning">Batal</a>
        </div>
    </form>
</div>

<script>
    function previewImageTambah1() {
        const image = document.querySelector('#gambar1-tambah');
        const imgPreview = document.querySelector('.foto-preview-tambah1');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<?php
if (isset($_POST['simpan'])) {
    // Ambil semua data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];
    $Alamat = $_POST['Alamat'];
    $gambar_lama = $_POST['gambar_lama'];

    // BARU: Menangani input area_layanan dari checkbox
    $area_layanan_str = '';
    if (!empty($_POST['area_layanan']) && is_array($_POST['area_layanan'])) {
        $area_layanan_str = implode(', ', $_POST['area_layanan']);
    }

    // Menangani gambar: jika tidak ada gambar baru diupload, gunakan gambar lama
    $gambar_baru = ($_FILES['gambar']['error'] === 4) ? $gambar_lama : upload1();
    // Jika upload gagal, hentikan proses
    if ($gambar_baru === false) {
        return; 
    }

    // PENINGKATAN KEAMANAN: Query UPDATE dengan prepared statements
    $query = "UPDATE travel SET 
                nama_travel=?,
                alamat=?,
                deskripsi_travel=?,
                kontak=?,
                gambar=?,
                area_layanan=?
              WHERE id=?";
    
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter (s = string, i = integer)
    mysqli_stmt_bind_param($stmt, "ssssssi", $nama, $Alamat, $deskripsi, $kontak, $gambar_baru, $area_layanan_str, $id);
    
    $simpan = mysqli_stmt_execute($stmt);

    if ($simpan) {
        // Jika ada gambar baru yang diupload dan gambar lama ada, hapus gambar lama
        if ($gambar_baru !== $gambar_lama && !empty($gambar_lama)) {
            if (file_exists("../assets/images/travel/" . $gambar_lama)) {
                unlink("../assets/images/travel/" . $gambar_lama);
            }
        }

        echo "<script>
        Swal.fire({title: 'Update Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-travel';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-travel';
            }
        })</script>";
    }
    mysqli_stmt_close($stmt);
}

function upload1() {
    // ... (Fungsi upload1() Anda tidak perlu diubah, tetap sama)
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    // cek gambar tidak diupload
    if ($error === 4) {
        return null; // Seharusnya tidak terjadi karena sudah dicek sebelumnya
    }
    // cek yang di uplod gambar atau tidak
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp','jfif'];
    $ektensigambar = explode('.', $namafile);
    $ektensigambar = strtolower(end($ektensigambar));
    if (!in_array($ektensigambar, $ektensigambarvalid)) {
        echo "<script>alert('yang anda upload bukan gambar');</script>";
        return false;
    }
    // cek jika ukuran terlalu besar
    if ($ukuranfile > 90000000) {
        echo "<script>alert('ukuran gambar terlalu besar');</script>";
        return false;
    }

    $namafilebaru = uniqid() . '.' . $ektensigambar;
    move_uploaded_file($tmpname, '../assets/images/travel/' . $namafilebaru);
    return $namafilebaru;
}

// die(); // Sebaiknya jangan gunakan die()
?>