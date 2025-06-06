<div class="card card-info mt-3" id="card-data">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-table"></i> Data Wisata
        </h5>
    </div>
    <div class="card-body">
        <div>
            <a href="?page=add-wisata" class="btn" style="background-color: #004072; color: #fff;">
                <i class="fa fa-edit"></i> Tambah Data</a>

            <div class="kotak-form-user col-12">
                <div class="mb-2 kotak-input-user">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="excelFile" class="col-form-label">Pilih File Excel:</label>
                        <div class="input-group">
                            <input type="file" name="excelFile" id="excelFile" accept=".xls,.xlsx,.csv" class="form-control" required>
                            <button class="btn text-white" style="background-color: #004072;" type="submit" name="import">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <br>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

            <table id="example" class="table table-bordered table-striped" style="font-size: 14px; border-top:1px solid #eaeaea;"">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Wisata</th>
                        <th class="text-center">Operasional</th>
                        <th class="text-center">Tiket</th>
                        <th class="text-center">Wisata</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $result = mysqli_query($koneksi, 'SELECT * from wisata order by id desc');
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no++; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['nama_wisata']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['operasional']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['harga_tiket']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['kategori']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['kec']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['latlng']; ?>
                            </td>
                            <td>
                                <div class="action d-flex">
                                    <a href="?page=edit-wisata&kode=<?php echo $data['id']; ?>" title="Ubah" class="">
                                        <img src="assets/img/icon_action/edit.png" alt="edit" width="35">
                                    </a>
                                    <a href="?page=del-wisata&kode=<?php echo $data['id']; ?>&photo=<?= $data['gambar']; ?>&photo1=<?= $data['gambar1']; ?>&photo2=<?= $data['gambar2']; ?>&photo3=<?= $data['gambar3']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="mt-1">
                                        <img src="assets/img/icon_action/trash.png" alt="trash" width="28">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ], // Show 5 entries by default
            "pageLength": 5, // Set initial page length to 5
            "searching": true // Enable search filter
        });
    });
</script>

    <!-- /.card-body -->

    <?php
 require 'vendor/autoload.php';  // jika menggunakan Composer
 use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['import'])) {
   

    // Cek apakah file telah diunggah
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] === UPLOAD_ERR_OK) {
        
        // Ambil file yang diupload
        $fileTmpPath = $_FILES['excelFile']['tmp_name'];

        // Baca file Excel
        $spreadsheet = IOFactory::load($fileTmpPath);
        $sheet = $spreadsheet->getActiveSheet();
        
        // Ambil data dari sheet
        $rows = $sheet->toArray();



        // Mulai loop untuk memasukkan data baris demi baris ke database
        foreach ($rows as $row) {
            // Ambil data dari setiap baris, misalnya kolom 1 -> nama, kolom 2 -> operasional, dsb.
            // Pastikan urutan kolom di Excel sesuai dengan yang diinginkan
            $nama = $row[0];
            $operasional = $row[1];
            $tiket = $row[2];
            $deskripsi = $row[3];
            $kab = $row[4];
            $kec = $row[5];
            $latlng = $row[6];
            $status = $row[7];
            $kategori = $row[8];

            // Menangani gambar (Jika ada gambar di Excel, Anda bisa menguploadnya ke server, misalnya menggunakan kolom gambar)
            // Jika gambar ada di file Excel, Anda perlu mengatur cara menguploadnya
            $gambar1 = $row[9];  // Misalnya kolom 9 berisi nama gambar1
            $gambar2 = $row[10]; // Kolom 10 untuk gambar2
            $gambar3 = $row[11]; // Kolom 11 untuk gambar3
            $gambar4 = $row[12]; // Kolom 12 untuk gambar4

            // Query untuk insert data ke tabel wisata
            $query = "INSERT INTO wisata (nama_wisata, operasional, harga_tiket, deskripsi, kab, kec, latlng, status, kategori, gambar, gambar1, gambar2, gambar3)
                      VALUES ('$nama', '$operasional', '$tiket', '$deskripsi', '$kab', '$kec', '$latlng', '$status', '$kategori', '$gambar1', '$gambar2', '$gambar3', '$gambar4')";

            // Eksekusi query
            if (mysqli_query($koneksi, $query)) {
                    echo "<script>
                    Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        document.location.href='?page=data-wisata';
                        }
                    })</script>";
                } else {
                    echo "<script>
                    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        document.location.href='?page=data-wisata';
                        }
                    })</script>";
                }
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    }
}
?>
