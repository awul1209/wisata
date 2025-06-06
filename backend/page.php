
<?php

if (isset($_GET['page'])) {
    $hal = $_GET['page'];

    switch ($hal) {
            //home
        case 'home':
            include 'management_page/dashboard.php';
            break;
            //Pengguna
        case 'data-user':
            include 'admin/user/index.php';
            break;
        case 'add-user':
            include 'admin/user/add_user.php';
            break;
        case 'del-user':
            include 'admin/user/del.php';
            break;
        case 'edit-user':
            include 'admin/user/edit_user.php';
            break;
            //pengunjung
        case 'data-pengunjung':
            include 'admin/pengunjung/index.php';
            break;
        case 'add-pengunjung':
            include 'admin/pengunjung/add_pengunjung.php';
            break;
        case 'del-pengunjung':
            include 'admin/pengunjung/del.php';
            break;
        case 'edit-pengunjung':
            include 'admin/pengunjung/edit_pengunjung.php';
            break;
            //wisata
        case 'data-wisata':
            include 'admin/wisata/index.php';
            break;
        case 'add-wisata':
            include 'admin/wisata/add_wisata.php';
            break;
        case 'del-wisata':
            include 'admin/wisata/del.php';
            break;
        case 'edit-wisata':
            include 'admin/wisata/edit_wisata.php';
            break;
            //travel
        case 'data-travel':
            include 'admin/travel/index.php';
            break;
        case 'add-travel':
            include 'admin/travel/add_travel.php';
            break;
        case 'del-travel':
            include 'admin/travel/del.php';
            break;
        case 'edit-travel':
            include 'admin/travel/edit_travel.php';
            break;
            //ulasan
        case 'data-ulasan':
            include 'admin/ulasan/index.php';
            break;
        case 'add-ulasan':
            include 'admin/ulasan/add_ulasan.php';
            break;
        case 'del-ulasan':
            include 'admin/ulasan/del.php';
            break;
        case 'edit-ulasan':
            include 'admin/ulasan/edit_ulasan.php';
            break;
            //ulasan-wisata
        case 'data-ulasan-wisata':
            include 'admin/ulasan_wisata/index.php';
            break;
        case 'add-ulasan-wisata':
            include 'admin/ulasan_wisata/add_ulasan_wisata.php';
            break;
        case 'del-ulasan-wisata':
            include 'admin/ulasan_wisata/del.php';
            break;
        case 'edit-ulasan-wisata':
            include 'admin/ulasan_wisata/edit_ulasan_wisata.php';
            break;
        // tentang kami
        case 'tentang-kami':
            include 'admin/tentang_kami/index.php';
            break;
        case 'add-tentang-kami':
            include 'admin/tentang_kami/add_tentang_kami.php';
            break;
        case 'edit-tentang':
            include 'admin/tentang_kami/edit_tentang.php';
            break;
        case 'del-tentang':
            include 'admin/tentang_kami/del.php';
            break;
            // logout
        case 'logout':
            include 'logout.php';
            break;




        default:
            echo '<center><h1> ERROR !</h1></center>';
            break;
    }
} else {
    include 'management_page/dashboard.php';
}
