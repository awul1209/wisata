
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
              <label for="nama" class="col-form-label">Masukkan Nama:</label>
              <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="mb-2 kotak-input-user">
              <label for="email" class="col-form-label">Masukkan Email:</label>
              <input type="text" name="email" class="form-control" id="email">
            </div>
</div>
       
<label for="email" class="col-form-label">Password</label>
  <div class="input-group mb-2 kotak-input-user">
              <input type="password" name="password" id="passwordTambah" class="form-control" aria-describedby="button-addon2">
              <button onclick="togglePasswordTambah()" class="btn btn-outline-secondary" type="button" id="button-addon2"><img id="image-previewTambah" src="../assets/images/icon_form/eye-tutup-biru.png" alt="eye" width="25"></button>
            </div>

        
            <div class="mb-2 kotak-input-user">
            <label for="email" class="col-form-label" id="label-level">Level</label>
            <select class="form-select" name=level aria-label="Default select example">
            <option selected>Pilih</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
            </select>
            </div>

            <div class="mb-2 kotak-input-user">
              <label for="alamat" class="col-form-label">Masukkan Alamat:</label>
              <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            

           



        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            <a href="?page=data-user" title="Kembali" class="btn btn-warning text-white">Batal</a>
        </div>
    </form>
</div>
<script>
      function togglePasswordTambah() {
    var previewImage = document.getElementById('image-previewTambah');
    let imageUrlBuka = '../assets/images/icon_form/eye-biru.png';
    let imageUrlTutup = '../assets/images/icon_form/eye-tutup-biru.png';
    const passwordInput = document.getElementById('passwordTambah');
    const passwordType = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = passwordType;
    if (passwordInput.type === 'password') {
      previewImage.src = imageUrlTutup;
    } else {
      previewImage.src = imageUrlBuka;
    }
  }
   
</script>



<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $alamat = $_POST['alamat'];
    $password_acak = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (nama,email,password,level,alamat) VALUES ('$nama','$email','$password_acak','$level','$alamat')";
    $simpan = mysqli_query($koneksi, $query);
    if ($simpan) {
        echo "<script>
        Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-user';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-user';
            }
        })</script>";
    }
}
function upload()
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

    move_uploaded_file($tmpname, '../assets/img/blog/' . $namafilebaru);

    return $namafilebaru;
}

die();
?>