<?php
include 'koneksi.php';
session_start();
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
                <h3 class="text-center mb-3">Form Login</h3>
                <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Masukkan Email">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Password</label>
              <div class="input-group mb-2">
                <input type="password" name="password" id="password" class="form-control" aria-describedby="button-addon2">
                <button onclick="togglePassword()" class="btn btn-outline-secondary" type="button" id="button-addon2"><img id="image-preview" src="assets/images/icon_form/eye-tutup-biru.png" alt="eye" width="25"></button>
              </div>
            </div>
            <div class="modal-footer">
              <a href="index.php" class="text-white"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
      
              <button type="submit" name="login" class="btn text-white" style="background-color:#0092dc;">Login</button>
            </div>
          </form>
            <div class="row text-center mt-1">
                <p><small>Belum Punya Akun? <a href="register.php" class="text-decoration-none">Register Now!</a></small></p>
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
if (isset($_POST['login'])) {
    // echo "<script>alert('hai');</script>";
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
  
    $result = mysqli_query($koneksi, "SELECT * FROM `user` WHERE email = '$email'");
    // cek username
    if (mysqli_num_rows($result) > 0) {
      // cek password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password'])) {
      if($row['level'] =='admin'){
            // set session
      $_SESSION["login"] = true;
      $_SESSION['ses_id'] = $row['id'];
      $_SESSION['ses_nama'] = $row['nama'];
      $_SESSION['ses_email'] = $row['email'];
      $_SESSION['ses_password'] = $row['password'];
      echo "<script>
            Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
                window.location = 'backend/index.php';
                }
                })</script>";
                die();
      }
       if($row['level'] != 'admin'){
        // set session
        $_SESSION["login"] = true;
        $_SESSION['ses_id'] = $row['id'];
        $_SESSION['ses_nama'] = $row['nama'];
        $_SESSION['ses_email'] = $row['email'];
        $_SESSION['ses_password'] = $row['password'];
        echo "<script>
                  Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                  }).then((result) => {if (result.value){
                      window.location = 'index.php';
                      }
                      })</script>";
      } else {
        echo "<script>
              alert('Username atau Password Salah');
            </script>";
      }
    } else {
      echo "<script>
          alert('Username atau Password Salah');
        </script>";
    }
  }else{
    echo "<script>
    Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value){
        }
        })</script>";
  }
  }

?>