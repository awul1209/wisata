
<?php
// $hostname = "sql109.infinityfree.com";
// $username = "if0_37978538";
// $password = "ExoD4vRs0EHSD";
// $database = "if0_37978538_wisata";
// $hostname = "sql109.infinityfree.com";
// $username = "if0_37978538";
// $password = "ExoD4vRs0EHSD";
// $database = "if0_37978538_wisata";
$hostname = "localhost";
$username = "root";
$password = "";
$database = "wisata";
//sesuaikan dengan password MySQL kalian
//create variable connectin
$koneksi = mysqli_connect($hostname, $username, $password, $database);
//checking connection
if (!$koneksi) {

    echo "Koneksi Gagal! : " . mysqli_connect_error();
} else {

    //echo "Koneksi Berhasil!";

}
