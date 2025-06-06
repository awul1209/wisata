
<style>
.navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}
</style>
<nav class="navbar navbar-expand-lg fixed-top text-white" style="z-index: 99; background-color:#004072">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="backend/assets/img/icon_header.png" alt="" width="40px"></a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo ($page == 'home') ? 'active' : ''; ?>" href="?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo ($page == 'wisata' || $page == 'detail' || $page == 'rute') ? 'active' : ''; ?>" 
                      href="index.php?page=wisata">Wisata</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white <?php echo ($page == 'travel' || $page == 'detail-travel') ? 'active' : ''; ?>" href="index.php?page=travel">Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo ($page == 'rating' || $page == 'proses-nilai') ? 'active' : ''; ?>" href="index.php?page=rating">Rating</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?php echo ($page == 'tentang') ? 'active' : ''; ?>" href="index.php?page=tentang">Tentang Kami</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
        <?php if (!empty($s_nama)) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Welcome back, <?= $s_nama ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                
                  <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-right"></i> Logout</button>
        
              </li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a data-bs-toggle="modal" class="nav-link text-white" href="./login.php"><i class="bi bi-box-arrow-in-right"></i> Login/Daftar</a>
          </li>
        <?php } ?>
      </ul>
        </div>
    </div>
</nav>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <?php     $query = mysqli_query($koneksi,"SELECT * FROM rating WHERE user_id = '$s_id'");
               if(mysqli_num_rows($query) >= 1){ ?>

               <p>Apakah Anda Ingin Logout?</p>

            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tidak</button>
     <a href="?page=form-logout" class="text-decoration-none">
        <button type="button" class="btn text-white" style="background-color:#004072">Logout</button>
       </a>
        <?php } else{ ?>
          <p>Luangkan Waktu Untuk Memberi Ulasan Pada Website ini?</p>
          <a href="?page=rating" class="text-decoration-none">
          <button type="button" class="btn btn-primary" >Rating</button>
          </a>
          <a href="?page=form-logout" class="text-decoration-none">
        <button type="button" class="btn text-white" style="background-color:#004072">Logout</button>
       </a>
          <?php } ?>
      </div>
    </div>
  </div>
</div>
