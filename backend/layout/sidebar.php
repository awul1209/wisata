<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary position-fixed" id="side">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Wisata VI.0</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div id="parent-sidebar" class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto ps-1 pe-1" style="box-sizing: border-box;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link"
                        style="color:#004072; <?php if ($page == 'home' or $page == '') {
                                    echo 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;';
                                } ?>"
                        aria-current="page" href="?page=home">
                        <i style="font-size: 1.2rem; margin-right:5px; color: #004072;" class="bi bi-layout-sidebar"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        style="color:#004072; <?= ($page == 'data-user' || $page == 'add-user' || $page == 'edit-user') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>"
                        href="?page=data-user">
                        <i style="font-size: 1.2rem; margin-right:5px; color: #004072;" class="bi bi-file-person"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        style="color:#004072; <?= ($page == 'data-pengunjung' || $page == 'add-pengunjung' || $page == 'edit-pengunjung') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>"
                        href="?page=data-pengunjung">
                        <i style="font-size: 1.2rem; margin-right:5px; color: #004072;" class="bi bi-eye-fill"></i>
                        Pengunjung
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#004072;<?= ($page == 'data-wisata' || $page == 'add-wisata' || $page == 'edit-wisata') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>" href="?page=data-wisata">
                        <i style="color:#004072; font-size: 1.2rem; margin-right:5px; color: #004072;" class="bi bi-camera-fill"> </i> Wisata
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=data-travel" style="color:#004072;<?= ($page == 'data-travel' || $page == 'add-travel' || $page == 'edit-travel') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>">
                        <i style="color:#004072; font-size: 1.2rem; margin-right:5px; color: #004072;" class="bi bi-car-front-fill"></i>
                        Travel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=data-ulasan" style="color:#004072;<?= ($page == 'data-ulasan' || $page == 'add-ulasan' || $page == 'edit-ulasan') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>">
                        <i style="color:#004072; font-size: 1.2rem; margin-right:5px; color: #004072;"  class="bi bi-star-half"></i>
                        Ulasan Web
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=data-ulasan-wisata" style="color:#004072;<?= ($page == 'data-ulasan-wisata' || $page == 'add-ulasan-wisata' || $page == 'edit-ulasan-wisata') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>">
                        <i style="color:#004072; font-size: 1.2rem; margin-right:5px; color: #004072;"  class="bi bi-star-half"></i>
                        Ulasan Wisata
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=tentang-kami" style="color:#004072;<?= ($page == 'tentang-kami' || $page == 'add-tentang-kami' || $page == 'edit-tentang') ? 'background-color: #eaeaea; border-radius:2px; border-left: 5px solid black;' : '' ?>">
                        <i style="color:#004072; font-size: 1.2rem; margin-right:5px; color: #004072;" class="bi bi-universal-access-circle"></i>
                        Tentang Kami
                    </a>
                </li>
                <!-- style="font-size: 1.5rem; color: #004072;" -->

            </ul>



            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a style="color: #004072;" class="nav-link d-flex align-items-center gap-2" onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php">
                        <svg class="bi" style="color: #004072;">
                            <use xlink:href="#door-closed" />
                        </svg>
                       Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>