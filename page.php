<?php

if (isset($_GET['page'])) {
    $hal = $_GET['page'];

    switch ($hal) {
            //home
        case '':
            include 'management_page/home.php';
            break;
        case 'form-logout':
            include 'form-logout.php';
            break;
        case 'home':
            include 'management_page/home.php';
            break;
        case 'detail':
            include 'management_page/detail.php';
            break;
        case 'wisata':
            include 'management_page/wisata.php';
            break;
        case 'travel':
            include 'management_page/travel.php';
            break;
        case 'detail-travel':
            include 'management_page/detail_travel.php';
            break;
        case 'rating':
            include 'management_page/rating.php';
            break;
        case 'proses-nilai':
            include 'management_page/proses_rating.php';
            break;
        case 'rute':
            include 'management_page/rute.php';
            break;
        case 'tentang':
            include 'management_page/tentang_kami.php';
            break;
        case 'dashboard':
            include 'management_page/dashboard.php';
            break;
            //default
        default:
            include 'management_page/home.php';
            break;
    }
} else {
    include 'management_page/home.php';
}
