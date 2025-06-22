<div class="card card-info mt-3" id="card-data">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-table"></i> Data Travel
        </h5>
    </div>
    <!-- /.card-header -->
   <div class="card-body">
    <div>
        <a href="?page=add-travel" class="btn" style="background-color: #004072; color: #fff;">
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <div class="table-responsive">
        <br>

        <table id="example" class="table table-bordered table-striped" style="font-size: 14px; border-top:1px solid #eaeaea;">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Travel</th>
                    <th class="text-center">Kontak</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Area Layanan</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = mysqli_query($koneksi, 'SELECT * from travel order by id desc');
                while ($data = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $no++; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $data['nama_travel']; ?>
                        </td>
                        <!-- <td class="text-center">
                            <?php echo $data['rute']; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $data['tiket_org']; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $data['tiket_paket']; ?>
                        </td> -->
                        <td class="text-center">
                            <?php echo $data['kontak']; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $data['deskripsi_travel']; ?>
                        </td>
                        <td class="text-center">
                            <?= $data['area_layanan']; ?>
                        </td>
                        <td class="text-center">
                            <?= $data['alamat']; ?>
                        </td>
                        <td>
                            <div class="action d-flex">
                                <a href="?page=edit-travel&kode=<?php echo $data['id']; ?>" title="Ubah" class="">
                                    <img src="assets/img/icon_action/edit.png" alt="edit" width="35">
                                </a>
                                <a href="?page=del-travel&kode=<?php echo $data['id']; ?>&photo=<?= $data['gambar']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="mt-1">
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
            $rute = $row[1];
            $tiket_org = $row[2];
            $tiket_paket = $row[3];
            $kab = $row[4];
            $kec = $row[5];
            $latlng = $row[6];
            $kontak = $row[7];
            $alamat = $row[8];

            // Menangani gambar (Jika ada gambar di Excel, Anda bisa menguploadnya ke server, misalnya menggunakan kolom gambar)
            // Jika gambar ada di file Excel, Anda perlu mengatur cara menguploadnya
            $gambar = $row[9];  // Misalnya kolom 9 berisi nama gambar1

            // Query untuk insert data ke tabel wisata
            $query = "INSERT INTO travel (nama_travel, rute, tiket_org, tiket_paket, kab, kec, latlng,  kontak, alamat, gambar)
                      VALUES ('$nama', '$rute', '$tiket_org','$tiket_paket', '$kab', '$kec', '$latlng',  '$kontak','$alamat', '$gambar')";

            // Eksekusi query
            if (mysqli_query($koneksi, $query)) {
                    echo "<script>
                    Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        document.location.href='?page=data-travel';
                        }
                    })</script>";
                } else {
                    echo "<script>
                    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        document.location.href='?page=data-travel';
                        }
                    })</script>";
                }
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    }
}
?>
