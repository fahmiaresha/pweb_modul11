<?php require_once("script/auth.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <title>Modul 11</title>
    <style>
    </style>
</head>

<body>
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4" style="margin-left:-22px;">
            <h6>Halo <?php echo $_SESSION["mahasiswa"]["mahasiswa"] ?>, Selamat datang di halaman admin!</h6>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-2" style="margin-left:22px;">
            <a href="/script/logout.php">
                <button type="button" class="btn btn-success mb-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout</button></a></div>
    </div>


    <center>

        <div class="card bg-light mb-3" style="width: 72rem;">
            <div class="card-header bg-dark" style="color:white;">Data Mahasiswa</div>
            <div class="card-body">
                <a href="/input.php"><button type="button" class="btn btn-primary mb-2">
                        <i class="fa fa-plus-circle"></i> Tambah Mahasiswa</button></a>
                <table class="table table-bordered  table-hover table-bordered" style="cursor:pointer;"
                    id="table-mahasiswa">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto Profile</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Prodi</th>
                            <th>Jurusan</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    include 'script/koneksi2.php';
                    $sql=$conn->query("select * from mahasiswa");
                    $no=0;
                    while($rs=$sql->fetch_object()) {
                ?>
                        <tr>
                            <?php $no++ ?>
                            <td><?php echo $no."." ?></td>
                            <td>
                                <center>
                                    <img width="200px" src=" <?php echo "file_gambar/".$rs->foto_profile; ?> ">
                                </center>
                            </td>
                            <td><?php echo $rs->id;?></td>
                            <td><?php echo $rs->mahasiswa;?></td>
                            <td><?php echo $rs->nim;?></td>
                            <td><?php echo $rs->prodi;?></td>
                            <td><?php echo $rs->jurusan;?></td>
                            <td><?php echo $rs->password;?></td>
                            <td>
                                <a href="edit.php?id=<?php echo  $rs->id; ?>"><button type="button"
                                        class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit</button></a>
                                <a href="delete.php?id=<?php echo  $rs->id; ?>"><button type="button"
                                        class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                        Hapus</button></a>
                            </td>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </center>


</body>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table-mahasiswa').DataTable();
    });
</script>

</html>