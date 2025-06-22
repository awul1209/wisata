<?php
// --- (Letakkan daftar kecamatan ini di bagian atas file PHP Anda) ---
// Daftar kecamatan di Kabupaten Sumenep
$kecamatan_sumenep = [
    'Arjasa', 'Batang Batang', 'Batuputih', 'Bluto', 'Dasuk', 'Dungkek', 'Ganding', 
    'Gayam', 'Giliginting', 'Guluk-Guluk', 'Kalianget', 'Kangayan', 'Kota Sumenep', 
    'Lenteng', 'Manding', 'Masalembu', 'Nonggunong', 'Pasongsongan', 'Pragaan', 
    'Raas', 'Rubaru', 'Sapeken', 'Saronggi', 'Talango', 'Ambunten', 'Gapura', 'Batuan'
];
// Urutkan berdasarkan abjad agar mudah dicari di form
sort($kecamatan_sumenep);
?>

<div class="card card-info mt-3" id="card-add-user">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-edit"></i> Form Tambah Data
        </h5>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            
            <div class="kotak-form-user col-12">
                <div class="mb-2 kotak-input-user">
                    <label for="nama" class="col-form-label">Nama Travel:</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-2 kotak-input-user">
                    <label for="kontak" class="col-form-label">Kontak :</label>
                    <input type="text" name="kontak" class="form-control" id="kontak" required>
                </div>
                <div class="mb-2 kotak-input-user">
                    <label for="gambar1-tambah" class="col-form-label">Gambar:</label>
                    <input class="form-control" name="gambar" id="gambar1-tambah" type="file" onchange="previewImageTambah1()">
                    <img class="foto-preview-tambah1" src="" alt="" width="80" style="margin-top: 10px;">
                </div>
            </div>

            <div class="kotak-form-user col-12">
                <div class="mb-2 kotak-input-user">
                    <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                    <input id="deskripsi" type="hidden" name="deskripsi">
                    <trix-editor input="deskripsi" style="height:auto;"></trix-editor>
                </div>
                <div class="mb-2 kotak-input-user">
                    <label for="Alamat" class="col-form-label">Alamat:</label>
                    <input id="Alamat" type="hidden" name="Alamat">
                    <trix-editor input="Alamat" style="height:auto;"></trix-editor>
                </div>
            </div>

            
            <div class="kotak-form-user col-12 mt-3">
                <div class="mb-2">
                    <label class="col-form-label">Area Layanan (Kecamatan di Sumenep):</label>
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; border: 1px solid #ced4da; padding: 10px; border-radius: .25rem;">
                        <?php foreach ($kecamatan_sumenep as $kecamatan) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="area_layanan[]" value="<?= htmlspecialchars($kecamatan) ?>" id="kec_<?= str_replace(' ', '', $kecamatan) ?>">
                                <label class="form-check-label" for="kec_<?= str_replace(' ', '', $kecamatan) ?>">
                                    <?= htmlspecialchars($kecamatan) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="card-footer mb-4">
            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
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
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];
    $Alamat = $_POST['Alamat'];

    // BARU: Menangani input area_layanan dari checkbox
    $area_layanan_str = '';
    if (!empty($_POST['area_layanan']) && is_array($_POST['area_layanan'])) {
        // Gabungkan semua nilai checkbox yang dipilih menjadi satu string dipisah koma
        $area_layanan_str = implode(', ', $_POST['area_layanan']);
    }

    // Menangani gambar
    $gambar1 = ($_FILES['gambar']['error'] === 4) ? NULL : upload1();

    // PENINGKATAN KEAMANAN: Menggunakan Prepared Statements untuk mencegah SQL Injection
    $query = "INSERT INTO travel (nama_travel, kontak, gambar, alamat, deskripsi_travel, area_layanan) 
              VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter ke query
    // s = string
    mysqli_stmt_bind_param($stmt, "ssssss", $nama, $kontak, $gambar1, $Alamat, $deskripsi, $area_layanan_str);

    // Eksekusi statement
    $simpan = mysqli_stmt_execute($stmt);

    if ($simpan) {
        echo "<script>
        Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-travel';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-travel';
            }
        })</script>";
    }
    // Tutup statement
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
        // Tidak perlu alert di sini, karena sudah ditangani di bagian utama
        return NULL;
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

    // lolos pengecekan , gambar siap di upload
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ektensigambar;
    move_uploaded_file($tmpname, '../assets/images/travel/' . $namafilebaru);
    return $namafilebaru;
}

// die(); // Sebaiknya jangan gunakan die() di sini agar sisa halaman tetap bisa dimuat jika diperlukan
?>