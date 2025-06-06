<?php
$id=$_GET['kode'];
$result_tentang=mysqli_query($koneksi,"SELECT * FROM pengunjung WHERE id='$id'");
$row=mysqli_fetch_assoc($result_tentang);
?>
<div class="card card-info mt-3" id="card-add-user">
    <div class="card-header" style="background-color: #004072;">
        <h5 class="card-title" style="color: #fff;">
            <i class="fa fa-edit"></i> Form Edit Data
        </h5>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="card-body">

<div class="mb-2 kotak-input-user">
              <label for="date" class="col-form-label">Waktu:</label>
              <input type="date" name="date" class="form-control" id="date" value="<?= $row['date'] ?>">
            </div>

       

        
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit" name="simpan">Update</button>
            <a href="?page=data-pengunjung" title="Kembali" class="btn btn-warning text-white">Batal</a>
        </div>
    </form>
</div>



<?php
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $query = "UPDATE pengunjung SET
    date = '$date'
    WHERE id='$id'";
    $simpan = mysqli_query($koneksi, $query);
    if ($simpan) {
        echo "<script>
        Swal.fire({title: 'Update Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-pengunjung';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            document.location.href='?page=data-pengunjung';
            }
        })</script>";
    }
}

?>