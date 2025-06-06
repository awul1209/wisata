
<?php
$id=$_GET['kode'];
$result_tentang=mysqli_query($koneksi,"SELECT * FROM travel WHERE id='$id'");
$row=mysqli_fetch_assoc($result_tentang);
?>
<div class="card card-info mt-3" id="card-add-user">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-edit"></i> Form Tambah Data
        </h5>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="card-body">

           
<div class="kotak-form-user col-12">
<div class="mb-2 kotak-input-user">
              <label for="nama" class="col-form-label">Nama Travel:</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?= $row['nama_travel'] ?>">
            </div>
<div class="mb-2 kotak-input-user">
              <label for="kontak" class="col-form-label">Kontak :</label>
              <input type="text" name="kontak" class="form-control" id="kontak" value="<?= $row['kontak'] ?>">
            </div>
            <div class="mb-2 kotak-input-user">
              <label for="gambar1-tambah" class="col-form-label">Gambar:</label>
            <input class="form-control" name="gambar" id="gambar1-tambah" type="file" id="formFileMultiple" multiple onchange="previewImageTambah1()">
            <?php if ($row['gambar']) : ?>
            <img class="foto-preview-tambah1" src="../assets/images/travel/<?= $row['gambar'] ?>" 
            alt="Gambar 1" width="80">
            <?php else : ?>
            <p>No image</p>
            <?php endif; ?>
            </div>
            <!-- <div class="mb-2 kotak-input-user">
              <label for="rute" class="col-form-label">Rute:</label>
              <input type="text" name="rute" class="form-control" id="rute" value="<?= $row['rute'] ?>">
            </div> -->
</div>

<!-- <div class="kotak-form-user col-12">
<div class="mb-2 kotak-input-user">
              <label for="tiket_org" class="col-form-label">Tiket_org Per-Orang:</label>
              <input type="text" name="tiket_org" class="form-control" id="tiket_org" value="<?= $row['tiket_org'] ?>">
            </div>
            <div class="mb-2 kotak-input-user">
              <label for="tiket_paket" class="col-form-label">Tiket Paket:</label>
              <input type="text" name="tiket_paket" class="form-control" id="tiket_paket" value="<?= $row['tiket_paket'] ?>">
            </div>
</div>

<div class="kotak-form-user col-12">
<div class="mb-2 kotak-input-user">
              <label for="latlng" class="col-form-label">Latlng:</label>
              <input type="text" name="latlng" class="form-control" id="latlng" value="<?= $row['latlng'] ?>">
            </div>
<div class="mb-2 kotak-input-user">
              <label for="kec" class="col-form-label">Kec:</label>
              <input type="text" name="kec" class="form-control" id="kec" value="<?= $row['kec'] ?>">
            </div>
<div class="mb-2 kotak-input-user">
              <label for="kab" class="col-form-label">Kab:</label>
              <input type="text" name="kab" class="form-control" id="kab" value="<?= $row['kab'] ?>">
            </div>

</div> -->

<div class="kotak-form-user col-12">
            <div class="mb-2 kotak-input-user">
              <label for="deskripsi" class="col-form-label">Deskripsi:</label>
              <input id="deskripsi" type="hidden" name="deskripsi" value="<?= $row['deskripsi_travel'] ?>">
              <trix-editor input="deskripsi" style="height:auto;"></trix-editor>
            </div>

                        <div class="mb-2 kotak-input-user">
              <label for="Alamat" class="col-form-label">Alamat:</label>
              <input id="Alamat" type="hidden" name="Alamat" value="<?= $row['alamat'] ?>" >
              <trix-editor input="Alamat" style="height:auto;"></trix-editor>
            </div>
</div>
       


           



        </div>
        <div class="card-footer">
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
    $nama = $_POST['nama'];

    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];
    $Alamat = $_POST['Alamat'];

    // Menangani gambar
    // $gambar1 = ($_FILES['gambar']['error'] === 4) ? NULL : upload1();
    $gambar1 = ($_FILES['gambar']['error'] === 4) ? $row['gambar'] : upload1();

    // Query untuk update data ke tabel
    $query = "UPDATE travel SET 
    nama_travel='$nama',
    alamat='$Alamat',
    deskripsi_travel='$deskripsi',
    kontak='$kontak',
    gambar='$gambar1'
    WHERE id='$id'";
    $simpan = mysqli_query($koneksi, $query);
    if ($simpan) {
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
}

function upload1()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    // cek gambar tidak diupload
    if ($error === 4) {
        echo "
        <script>
        alert('pilih gambar');
        </script>
        
        ";
        return false;
    }
    // cek yang di uplod gambar atau tidak
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp','jfif'];

    $ektensigambar = explode('.', $namafile);
    $ektensigambar = strtolower(end($ektensigambar));
    // cek adakah string didalam array
    if (!in_array($ektensigambar, $ektensigambarvalid)) {
        echo "
        <script>
        alert('yang anda upload bukan gambar');
        </script>
        ";

        return false;
    }
    // cek jika ukuran terlalu besar
    if ($ukuranfile > 90000000) {
        echo "
        <script>
        alert('ukuran gambar terlalu besar');
        </script>
        
        ";
        return false;
    }

    // lolos pengecekan , gambar siap di upload
    // generete nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ektensigambar;

    move_uploaded_file($tmpname, '../assets/images/travel/' . $namafilebaru);

    return $namafilebaru;
}


die();
?>