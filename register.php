<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <!-- alert -->
 <script src="assets/js/alert.js"></script>
</head>
<body>
    <div class="row" style="height: 100vh; display: grid; place-items:center;">
            <div class="col-lg-4 border border-2 p-4 rounded-2" style="box-sizing: border-box;">
                <h3 class="text-center mb-3">Form Register</h3>
                <form action="" method="post">
                <div class="mb-2">
                    <label for="nama" class="mb-2">Masukkan Nama</label>
                    <input type="nama" name="nama" id="nama" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="email" class="mb-2">Masukkan Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <label for="password" class="mb-2">Masukkan Password</label>
                <div class="input-group mb-2">
                    <input type="password" name="password" id="password" class="form-control" aria-describedby="button-addon2">
                    <button onclick="togglePassword()" class="btn btn-outline-secondary" type="button" id="button-addon2"><img id="image-preview" src="assets/images/icon_form/eye-tutup-biru.png" alt="eye" width="25" ></button>
                </div>
                <div class="mb-2">
                    <label for="password2" class="mb-2">Ulangi Password</label>
                    <input type="password" name="password2" id="password2" class="form-control">
                </div>
                <div class="mb-2">
                <label for="alamat" class="col-form-label">Masukkan Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
                <div class="row justify-content-center  mt-3">
                    <button type="submit" name="register" id="register" class="btn btn-primary w-75">Register</button>
                </div>
            </form>
            <div class="row text-center mt-1">
                <p><small>Sudah Punya Akun? <a href="login.php" class="text-decoration-none">Login Now!</a></small></p>
            </div>
            </div>
    </div>

    <script>
        function togglePassword() {
            var previewImage = document.getElementById('image-preview');
            let imageUrlBuka = 'assets/images/icon_form/eye-biru.png';
            let imageUrlTutup = 'assets/images/icon_form/eye-tutup-biru.png';
            const passwordInput = document.getElementById('password');
            const passwordType = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = passwordType;
            if (passwordInput.type === 'password') {
              previewImage.src = imageUrlTutup;
            }else{
              previewImage.src = imageUrlBuka;
            }
        }

      function previewImage(){
      const image=document.querySelector('#foto');
      const imgPreview=document.querySelector('.foto-preview');
      imgPreview.style.display='block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload=function(oFREvent){
        imgPreview.src=oFREvent.target.result;
      }
    }
    </script>


<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<?php
if(isset($_POST['register'])){
    $nama= strtolower(stripslashes(htmlspecialchars($_POST['nama'])));
    $email= strtolower(stripslashes(htmlspecialchars($_POST['email'])));
    $alamat= strtolower(stripslashes(htmlspecialchars($_POST['alamat'])));
    $password=mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['password']));
    $password2=mysqli_real_escape_string($koneksi,htmlspecialchars($_POST['password2']));

    // cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
		return false;
	}

    	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password_acak = password_hash($password, PASSWORD_DEFAULT);
    $level='user';
	// tambahkan userbaru ke database
	$simpan = mysqli_query($koneksi, "INSERT INTO user (nama,email,password,level,alamat) VALUES ('$nama','$email', '$password_acak','$level','$alamat')");
    if($simpan){
        echo "<script>
        Swal.fire({title: 'Berhasil Register',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php';
            }
            })</script>";
    }

}

?>