<div class="card card-info mt-3" id="card-data">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-table"></i> Data Rating Wisata
        </h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- <div class="pertanyaan-rating">
            <p>Seberapa membantu web ini bagi anda?</p>
            <p>Seberapa lengkap destinasi wisata yang kami tawarkan?</p>
            <p>Seberapa mudah pengunaan website ini?</p>
            <p>Seberapa menarik tampilan website ini menurut Anda?</p>
        </div> -->
        <!-- <div>
            <a href="?page=add-ulasan" class="btn" style="background-color: #004072; color: #fff;">
                <i class="fa fa-edit"></i> Tambah Data</a>
        </div> -->
        <div class="table-responsive">
            <br>
            <table id="example" class="table table-bordered table-striped" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Wisata</th>
                        <th class="text-center">Rating</th>
                        <th class="text-center">Komentar</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $result = mysqli_query($koneksi, "SELECT user.nama,nama_wisata,komentar.id,rating,komentar,komentar.created_at,komentar.updated_at FROM komentar JOIN user ON komentar.user_id = user.id JOIN wisata ON komentar.wisata_id = wisata.id");
                    while ($data = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td class="text-center">
                                <?php echo $no++; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['nama']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['nama_wisata']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['rating']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['komentar']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['created_at']; ?> - <?= $data['updated_at']; ?>
                            </td>


                            <td>
                                <div class="action d-flex">
                                    <!-- <a href="?page=edit-ulasan&kode=<?php echo $data['id']; ?>" title="Ubah"
                                        class="">
                                        <img src="assets/img/icon_action/edit.png" alt="edit" width="35">
                                    </a> -->
                                    <a href="?page=del-ulasan-wisata&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="mt-1">
                                        <img src="assets/img/icon_action/trash.png" alt="trash" width="28">
                                    </a>
                                </div>
                            </td>

                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- /.card-body -->