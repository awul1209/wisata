<?php
if (isset($_GET['kode'])) {

    if (isset($_GET['photo'])) {
        $fileToDelete = $_GET['photo'];
    
        // Direktori tempat foto disimpan
        $directory = '../assets/images/wisata/';
    
        // Path lengkap file
        $filePath = $directory . $fileToDelete;
    
        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Hapus file
            if (unlink($filePath)) {
                // echo "Foto '$fileToDelete' telah berhasil dihapus.";
            } else {
                // echo "Terjadi kesalahan saat menghapus foto '$fileToDelete'.";
            }
        } else {
            // echo "Foto '$fileToDelete' tidak ditemukan.";
        }
    } else {
        echo "Tidak ada foto yang dipilih untuk dihapus.";
    }

    if (isset($_GET['photo1'])) {
        $fileToDelete = $_GET['photo1'];
    
        // Direktori tempat foto disimpan
        $directory = '../assets/images/wisata/';
    
        // Path lengkap file
        $filePath = $directory . $fileToDelete;
    
        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Hapus file
            if (unlink($filePath)) {
                // echo "Foto '$fileToDelete' telah berhasil dihapus.";
            } else {
                // echo "Terjadi kesalahan saat menghapus foto '$fileToDelete'.";
            }
        } else {
            // echo "Foto '$fileToDelete' tidak ditemukan.";
        }
    } else {
        echo "Tidak ada foto yang dipilih untuk dihapus.";
    }

    if (isset($_GET['photo2'])) {
        $fileToDelete = $_GET['photo2'];
    
        // Direktori tempat foto disimpan
        $directory = '../assets/images/wisata/';
    
        // Path lengkap file
        $filePath = $directory . $fileToDelete;
    
        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Hapus file
            if (unlink($filePath)) {
                // echo "Foto '$fileToDelete' telah berhasil dihapus.";
            } else {
                // echo "Terjadi kesalahan saat menghapus foto '$fileToDelete'.";
            }
        } else {
            // echo "Foto '$fileToDelete' tidak ditemukan.";
        }
    } else {
        echo "Tidak ada foto yang dipilih untuk dihapus.";
    }

    if (isset($_GET['photo3'])) {
        $fileToDelete = $_GET['photo3'];
    
        // Direktori tempat foto disimpan
        $directory = '../assets/images/wisata/';
    
        // Path lengkap file
        $filePath = $directory . $fileToDelete;
    
        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Hapus file
            if (unlink($filePath)) {
                // echo "Foto '$fileToDelete' telah berhasil dihapus.";
            } else {
                // echo "Terjadi kesalahan saat menghapus foto '$fileToDelete'.";
            }
        } else {
            // echo "Foto '$fileToDelete' tidak ditemukan.";
        }
    } else {
        echo "Tidak ada foto yang dipilih untuk dihapus.";
    }

    $sql_hapus = "DELETE FROM wisata WHERE id='" . $_GET['kode'] . "'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = '?page=data-wisata';
            }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value){
                window.location = '?page=data-wisata';
            }
        })</script>";
    }
}
