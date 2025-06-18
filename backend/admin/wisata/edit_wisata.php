<?php
$id=$_GET['kode'];
$result_tentang=mysqli_query($koneksi,"SELECT * FROM wisata WHERE id='$id'");
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
              <label for="nama" class="col-form-label">Nama Wisata:</label>
              <input type="text" name="nama" class="form-control" id="nama" value="<?= $row['nama_wisata'] ?>">
            </div>
            <div class="mb-2 kotak-input-user">
              <label for="operasional" class="col-form-label">Operasional:</label>
              <input type="text" name="operasional" class="form-control" id="operasional" value="<?= $row['operasional'] ?>">
            </div>
</div>

<div class="kotak-form-user col-12">
<div class="mb-2 kotak-input-user">
              <label for="tiket" class="col-form-label">Tiket:</label>
              <input type="text" name="tiket" class="form-control" id="tiket" value="<?= $row['harga_tiket'] ?>">
            </div>
            <div class="mb-2 kotak-input-user">
              <label for="status" class="col-form-label">Status:</label>
        <select class="form-select" aria-label="Default select example" name="status">
              <option selected value="<?= $row['status'] ?>"><?= $row['status'] ?></option>
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            </div>
            <div class="mb-2 kotak-input-user">
              <label for="kategori" class="col-form-label">Kategori</label>
              <select class="form-select" name="kategori" aria-label="Default select example">
                <option selected value="<?= $row['kategori'] ?>"><?= $row['kategori'] ?></option>
                <option value="ALama">ALam</option>
                <option value="Bermain">Bermain</option>
                <option value="Edukasi">Edukasi</option>
                <option value="Religi">Religi</option>
              </select>
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

</div>

<div class="kotak-form-user col-12">
  <div class="mb-2 kotak-input-user">
    <label for="gambar1-tambah" class="col-form-label">Gambar 1:</label>
    <input class="form-control" name="gambar1" id="gambar1-tambah" type="file" onchange="previewImageTambah1()">
    <?php if ($row['gambar']) : ?>
      <img class="foto-preview-tambah1" src="../assets/images/wisata/<?= $row['gambar'] ?>" alt="Gambar 1" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

  <div class="mb-2 kotak-input-user">
    <label for="gambar2-tambah" class="col-form-label">Gambar 2:</label>
    <input class="form-control" name="gambar2" id="gambar2-tambah" type="file" onchange="previewImageTambah2()">
    <?php if ($row['gambar1']) : ?>
      <img class="foto-preview-tambah2" src="../assets/images/wisata/<?= $row['gambar1'] ?>" alt="Gambar 2" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

  <div class="mb-2 kotak-input-user">
    <label for="gambar3-tambah" class="col-form-label">Gambar 3:</label>
    <input class="form-control" name="gambar3" id="gambar3-tambah" type="file" onchange="previewImageTambah3()">
    <?php if ($row['gambar2']) : ?>
      <img class="foto-preview-tambah3" src="../assets/images/wisata/<?= $row['gambar2'] ?>" alt="Gambar 3" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>


</div>
<div class="kotak-form-user col-12">
  <div class="mb-2 kotak-input-user">
    <label for="gambar4-tambah" class="col-form-label">Gambar 4:</label>
    <input class="form-control" name="gambar4" id="gambar4-tambah" type="file" onchange="previewImageTambah4()">
    <?php if ($row['gambar3']) : ?>
      <img class="foto-preview-tambah4" src="../assets/images/wisata/<?= $row['gambar3'] ?>" alt="Gambar 4" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

  <div class="mb-2 kotak-input-user">
    <label for="gambar5-tambah" class="col-form-label">Gambar 5:</label>
    <input class="form-control" name="gambar5" id="gambar5-tambah" type="file" onchange="previewImageTambah5()">
    <?php if ($row['gambar1']) : ?>
      <img class="foto-preview-tambah5" src="../assets/images/wisata/<?= $row['gambar4'] ?>" alt="Gambar 5" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

  <div class="mb-2 kotak-input-user">
    <label for="gambar6-tambah" class="col-form-label">Gambar 6:</label>
    <input class="form-control" name="gambar6" id="gambar6-tambah" type="file" onchange="previewImageTambah6()">
    <?php if ($row['gambar2']) : ?>
      <img class="foto-preview-tambah6" src="../assets/images/wisata/<?= $row['gambar5'] ?>" alt="Gambar 6" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

</div>

<div class="kotak-form-user col-12">
  <div class="mb-2 kotak-input-user">
    <label for="gambar7-tambah" class="col-form-label">Gambar 7:</label>
    <input class="form-control" name="gambar7" id="gambar7-tambah" type="file" onchange="previewImageTambah7()">
    <?php if ($row['gambar3']) : ?>
      <img class="foto-preview-tambah7" src="../assets/images/wisata/<?= $row['gambar6'] ?>" alt="Gambar 6" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

  <div class="mb-2 kotak-input-user">
    <label for="gambar8-tambah" class="col-form-label">Gambar 8:</label>
    <input class="form-control" name="gambar8" id="gambar8-tambah" type="file" onchange="previewImageTambah8()">
    <?php if ($row['gambar1']) : ?>
      <img class="foto-preview-tambah8" src="../assets/images/wisata/<?= $row['gambar7'] ?>" alt="Gambar 5" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

  <div class="mb-2 kotak-input-user">
    <label for="gambar9-tambah" class="col-form-label">Gambar 9:</label>
    <input class="form-control" name="gambar9" id="gambar9-tambah" type="file" onchange="previewImageTambah9()">
    <?php if ($row['gambar2']) : ?>
      <img class="foto-preview-tambah9" src="../assets/images/wisata/<?= $row['gambar8'] ?>" alt="Gambar 6" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>
  <div class="mb-2 kotak-input-user">
    <label for="gambar10-tambah" class="col-form-label">Gambar 10:</label>
    <input class="form-control" name="gambar10" id="gambar10-tambah" type="file" onchange="previewImageTambah10()">
    <?php if ($row['gambar2']) : ?>
      <img class="foto-preview-tambah10" src="../assets/images/wisata/<?= $row['gambar9'] ?>" alt="Gambar 6" width="80">
    <?php else : ?>
      <p>No image</p>
    <?php endif; ?>
  </div>

</div>

       




            <div class="mb-2 kotak-input-user">
              <label for="deskripsi" class="col-form-label">Deskripsi:</label>
              <input id="deskripsi" type="hidden" name="deskripsi" value="<?= $row['deskripsi'] ?>">
              <trix-editor input="deskripsi" style="height:auto;"></trix-editor>
            </div>

           



        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit" name="simpan">Update</button>
            <a href="?page=data-wisata" title="Kembali" class="btn btn-warning">Batal</a>
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
     function previewImageTambah2() {
    const image = document.querySelector('#gambar2-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah2');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah3() {
    const image = document.querySelector('#gambar3-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah3');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah4() {
    const image = document.querySelector('#gambar4-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah4');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah5() {
    const image = document.querySelector('#gambar5-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah5');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah6() {
    const image = document.querySelector('#gambar6-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah6');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah7() {
    const image = document.querySelector('#gambar7-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah7');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah8() {
    const image = document.querySelector('#gambar8-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah8');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah9() {
    const image = document.querySelector('#gambar9-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah9');
    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
     function previewImageTambah10() {
    const image = document.querySelector('#gambar10-tambah');
    const imgPreview = document.querySelector('.foto-preview-tambah10');
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
    $operasional = $_POST['operasional'];
    $tiket = $_POST['tiket'];
    $deskripsi = $_POST['deskripsi'];

    $kec = $_POST['kec'];
    $latlng = $_POST['latlng'];
    $status = $_POST['status'];
    $kategori = $_POST['kategori'];

    // Menangani gambar
    $gambar1 = ($_FILES['gambar1']['error'] === 4) ? $row['gambar'] : upload1(); // Gunakan gambar lama jika tidak ada gambar baru
    $gambar2 = ($_FILES['gambar2']['error'] === 4) ? $row['gambar1'] : upload2();
    $gambar3 = ($_FILES['gambar3']['error'] === 4) ? $row['gambar2'] : upload3();
    $gambar4 = ($_FILES['gambar4']['error'] === 4) ? $row['gambar3'] : upload4();
    $gambar5 = ($_FILES['gambar5']['error'] === 4) ? $row['gambar4'] : upload5();
    $gambar6 = ($_FILES['gambar6']['error'] === 4) ? $row['gambar5'] : upload6();
    $gambar7 = ($_FILES['gambar7']['error'] === 4) ? $row['gambar6'] : upload7();
    $gambar8 = ($_FILES['gambar8']['error'] === 4) ? $row['gambar7'] : upload8();
    $gambar9 = ($_FILES['gambar9']['error'] === 4) ? $row['gambar8'] : upload9();
    $gambar10 = ($_FILES['gambar10']['error'] === 4) ? $row['gambar9'] : upload10();

    // Query untuk update data ke tabel
    $query = "UPDATE wisata SET 
    nama_wisata='$nama',
    operasional='$operasional',
    harga_tiket='$tiket',
    deskripsi='$deskripsi',
    kec='$kec',
    latlng='$latlng',
    status='$status',
    kategori='$kategori',
    gambar='$gambar1',
    gambar1='$gambar2',
    gambar2='$gambar3',
    gambar3='$gambar4',
    gambar4='$gambar5',
    gambar5='$gambar6',
    gambar6='$gambar7',
    gambar7='$gambar8',
    gambar8='$gambar9',
    gambar9='$gambar10'
    WHERE id='$id'";

    $simpan = mysqli_query($koneksi, $query);
    if ($simpan) {
        echo "<script>
        Swal.fire({title: 'Update Data Berhasil', icon: 'success', confirmButtonText: 'OK'})
        .then((result) => {if (result.value){ document.location.href='?page=data-wisata'; }})
        </script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Update Data Gagal', icon: 'error', confirmButtonText: 'OK'})
        .then((result) => {if (result.value){ document.location.href='?page=data-wisata'; }})
        </script>";
    }
}


function upload1()
{
    $namafile = $_FILES['gambar1']['name'];
    $ukuranfile = $_FILES['gambar1']['size'];
    $error = $_FILES['gambar1']['error'];
    $tmpname = $_FILES['gambar1']['tmp_name'];

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
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload2()
{
    $namafile = $_FILES['gambar2']['name'];
    $ukuranfile = $_FILES['gambar2']['size'];
    $error = $_FILES['gambar2']['error'];
    $tmpname = $_FILES['gambar2']['tmp_name'];

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
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload3()
{
    $namafile = $_FILES['gambar3']['name'];
    $ukuranfile = $_FILES['gambar3']['size'];
    $error = $_FILES['gambar3']['error'];
    $tmpname = $_FILES['gambar3']['tmp_name'];

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
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload4()
{
    $namafile = $_FILES['gambar4']['name'];
    $ukuranfile = $_FILES['gambar4']['size'];
    $error = $_FILES['gambar4']['error'];
    $tmpname = $_FILES['gambar4']['tmp_name'];

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
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload5()
{
    $namafile = $_FILES['gambar5']['name'];
    $ukuranfile = $_FILES['gambar5']['size'];
    $error = $_FILES['gambar5']['error'];
    $tmpname = $_FILES['gambar5']['tmp_name'];

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
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload6()
{
    $namafile = $_FILES['gambar6']['name'];
    $ukuranfile = $_FILES['gambar6']['size'];
    $error = $_FILES['gambar6']['error'];
    $tmpname = $_FILES['gambar6']['tmp_name'];

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
    $ektensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload7()
{
    $namafile = $_FILES['gambar7']['name'];
    $ukuranfile = $_FILES['gambar7']['size'];
    $error = $_FILES['gambar7']['error'];
    $tmpname = $_FILES['gambar7']['tmp_name'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload8()
{
    $namafile = $_FILES['gambar8']['name'];
    $ukuranfile = $_FILES['gambar8']['size'];
    $error = $_FILES['gambar8']['error'];
    $tmpname = $_FILES['gambar8']['tmp_name'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload9()
{
    $namafile = $_FILES['gambar9']['name'];
    $ukuranfile = $_FILES['gambar9']['size'];
    $error = $_FILES['gambar9']['error'];
    $tmpname = $_FILES['gambar9']['tmp_name'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}
function upload10()
{
    $namafile = $_FILES['gambar10']['name'];
    $ukuranfile = $_FILES['gambar10']['size'];
    $error = $_FILES['gambar10']['error'];
    $tmpname = $_FILES['gambar10']['tmp_name'];

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

    move_uploaded_file($tmpname, '../assets/images/wisata/' . $namafilebaru);

    return $namafilebaru;
}

die();
?>
