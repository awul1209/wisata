<?php
include 'koneksi.php';
session_start();
// error_reporting(0);
if ($_SESSION['ses_nama'] != '') {
    $s_id = $_SESSION['ses_id'];
    $s_nama = $_SESSION['ses_nama'];
    $s_email = $_SESSION['ses_email'];
    $s_pa = $_SESSION['ses_password'];
  }
$page = $_GET['page'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->


    <!-- Leaflet -->
    <link rel="stylesheet" href="https://nltgit.github.io/Leaflet.LinearMeasurement/basic.ruler-src.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.0/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/org-arl/leaflet-tracksymbol2/dist/leaflet-tracksymbol2.umd.js"></script>
    <script type="text/javascript" src="https://nltgit.github.io/Leaflet.LinearMeasurement/basic.ruler-src.js"></script>
    <link rel="stylesheet" href="assets/css/MarkerCluster.css" />
    <link rel="stylesheet" href="assets/css/MarkerCluster.Default.css" />
    <script src="assets/js/leaflet.markercluster-src.js"></script>
    <link href='assets/css/leaflet.fullscreen.css' rel='stylesheet' />
    <script src='assets/js/Leaflet.fullscreen.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
  <!-- Fancybox CSS -->

    <!-- my css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/travel.css">
    <link rel="stylesheet" href="assets/css/rating.css">
    <link rel="stylesheet" href="assets/css/map.css">
    <link rel="stylesheet" href="assets/css/tentang.css">
    <link rel="stylesheet" href="assets/css/dashboard-profil.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
   
    <script src="assets/js/alert.js"></script>
<!-- 
     <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> -->
     <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    
    <style type="text/css">
        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1;
            color: #262626 !important;
            background-color: #f2f2f2 !important;
            border: 1px solid #262626 !important;
        }

        .page-link:hover {
            z-index: 2;
            color: #fff !important;
            text-decoration: none;
            background-color: #a4a4a4 !important;
            border-color: #dee2e6;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #808080 !important;
            border-color: #353535;
        }

        #mapid {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body >
  

    <header>
        <?php include 'layout/navbar.php'; ?>
    </header>
    <main role="main">
 
        <!-- web dinamis -->
        <?php include 'page.php' ?>
    </main>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-column footer-about">
            <h5>Skripsi Perencanaan Wisata</h5>
            <p>Platform Anda untuk merencanakan petualangan tak terlupakan. Temukan destinasi, buat itinerary, dan wujudkan liburan impian Anda.</p>
        </div>

        <div class="footer-column footer-links">
            <h5>Navigasi</h5>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Semua Destinasi</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
            </ul>
        </div>

        <div class="footer-column footer-contact">
            <h5>Kontak Kami</h5>
            <p><i class="icon-map-pin"></i> Jl. Pendidikan No. 123, Kota Ilmu, Indonesia</p>
            <p><i class="icon-mail"></i> info@perencanaanwisata.com</p>
            <p><i class="icon-phone"></i> (021) 123-4567</p>
        </div>
    </div>

    <div class="footer-partners">
        <h5>Bekerja Sama Dengan</h5>
        <div class="partner-logos">
            <a href="https://www.myzehotelsumenep.com/" target="_blank" title="Hotel Myze" style="background-color:#eaeaea;padding:5px">
                <img src="https://manage.myzehotelsumenep.com/ImageData/System/logo.png" alt="Logo Hotel Murah">
            </a>
            <a href="https://www.traveloka.com/id-id?id=14221853873389010960&adloc=id-id&kw=traveloka&gmt=e&gn=g&gd=c&gdm=&gcid=705646680131&gdp=&gdt=&gap=&pc=1&cp=ID_TV_SM_AU_AL_Google+-+X+-+Search-ID/id+-+B+-+X+-+X_X+|+QueryType:Brand+Pure,MT:Exact_Traveloka+|+MT:Exact&aid=170276730131&wid=kwd-51659214310&fid=&gid=1007715&utm_id=CQrjwi8M&ad_id=705646680131&target_id=kwd-51659214310&click_id=Cj0KCQjwpf7CBhCfARIsANIETVoUt7oIlFT_Ey2qdkebqEFSXyjbJk3PIr04VipgWx4a1m-jzytvmgkaAncfEALw_wcB&group_id=170276730131&gad_source=1&gad_campaignid=21466334833&gbraid=0AAAAADi60UmGC6KHeEBHMmkxRHHNzFOsi&gclid=Cj0KCQjwpf7CBhCfARIsANIETVoUt7oIlFT_Ey2qdkebqEFSXyjbJk3PIr04VipgWx4a1m-jzytvmgkaAncfEALw_wcB" target="_blank" title="traveloka" style="background-color:#eaeaea;padding:5px" >
                <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v4.6.0/f/fbab4f587da2242fbe9858fe3e5ba717.svg" alt="Logo traveloka">
            </a>
            <a href="https://www.garuda-indonesia.com" target="_blank" title="garuda" style="background-color:#eaeaea;padding:5px" >
                <img src="https://images.seeklogo.com/logo-png/28/1/garuda-indonesia-logo-png_seeklogo-283969.png" alt="Logo garuda">
            </a>
            <a href="https://www.pegipegi.com" target="_blank" title="PegiPegi">
                <img src="https://i.imgur.com/wV2yZeX.png" alt="Logo PegiPegi">
            </a>
            </div>
    </div>

    <div class="footer-bottom">
        <p class="copyright-text">Copyright &copy; 2025 Skripsi Perencanaan Wisata. All Rights Reserved.</p>
        <div class="social-icons">
            <a href="#" aria-label="Facebook"><i class="icon-facebook"></i></a>
            <a href="#" aria-label="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="icon-instagram"></i></a>
        </div>
    </div>
</footer>


    <!-- Modal Login -->
  <div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login Now!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="login" class="btn text-white" style="background-color:#004072;">Login</button>
            </div>
          </form>
        </div>
        <div class="mb-3">
          <center>
            <p>Belum Punya Akun ? <a href="register.php" class="text-decoration-none text-black">Daftar Sekarang!</a></p>
          </center>
        </div>
      </div>
    </div>
  </div> 
   <script src="assets/js/lrm-graphhopper.js"></script>
  <!-- end modal login -->


  

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
      } else {
        previewImage.src = imageUrlBuka;
      }
    }
  </script>


    <!-- my script -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/alert.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- slick -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
</body>

</html>


<?php



// / Fungsi untuk mendapatkan IP pengunjung
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip = getUserIP();
$date=Date('Y-m-d');
// Simpan IP ke database
$sql = "INSERT INTO pengunjung (ip, date) VALUES ('$ip', '$date')";
mysqli_query($koneksi,$sql);



$koneksi->close();



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