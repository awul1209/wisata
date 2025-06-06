<div class="card card-info mt-3" id="card-data">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-table"></i> Data Pengunjung
        </h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table id="example" class="table table-bordered table-striped" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ip Address</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $result = mysqli_query($koneksi, 'SELECT * from pengunjung');
                    while ($data = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['ip']; ?>
                            </td>
                            <td>
                                <?php echo $data['date']; ?>
                            </td>

                            <td>
                                <div class="action d-flex">
                                    <a href="?page=edit-pengunjung&kode=<?php echo $data['id']; ?>" title="Ubah"
                                        class="">
                                        <img src="assets/img/icon_action/edit.png" alt="edit" width="35">
                                    </a>
                                    <a href="?page=del-pengunjung&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="mt-1">
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