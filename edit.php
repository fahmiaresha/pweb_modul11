<?php require_once("script/auth.php"); ?>

<?php 
if (isset($_POST['btn_simpan'])){
    require_once("script/koneksi2.php");

	$id = $_POST['id'];
	$mahasiswa = $_POST['nama'];
	$nim = $_POST['nim'];
	$prodi = $_POST['prodi'];
	$jurusan = $_POST['jurusan'];
	$password = $_POST['password'];
	// $foto_profile = $_POST['file'];


	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama_file = $_FILES['file']['name'];
	$x = explode('.', $nama_file);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];

	move_uploaded_file($file_tmp, 'file_gambar/'.$nama_file);
	$sql = "UPDATE mahasiswa SET mahasiswa='$mahasiswa', nim='$nim', 
	prodi='$prodi', jurusan='$jurusan', password='$password',
	foto_profile='$nama_file' 
	WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	if( $query ) {
		header('Location: index.php');
	} else {
		die("Gagal menyimpan perubahan...");
	}
			
}

?>

<?php
	include 'script/koneksi2.php';
	$id = $_GET['id'];
	$sql=$conn->query("select * from mahasiswa where id='$id'");
	while($rs=$sql->fetch_object()) {
			$id_mahasiswa = $rs->id;
			$mahasiswa = $rs->mahasiswa;
			$nim = $rs->nim;
			$prodi = $rs->prodi;
			$jurusan = $rs->jurusan;
			$password = $rs->password;
			$foto_profile = $rs->foto_profile;
	}
?>
<center>
	<form action="" method="post" enctype='multipart/form-data'>
		<h1>Edit Data Mahasiswa</h1>
		<table>
			<tr>
				<td>Nama</td>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<td><input type="text" name="nama" value="<?php echo $mahasiswa; ?>" required></td>
			</tr>
			<tr>
				<td>Nim</td>
				<td><input type="text" name="nim" value="<?php echo $nim; ?>" required></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td><input type="text" name="prodi" value="<?php echo $prodi; ?>" required></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><input type="text" name="jurusan" value="<?php echo $jurusan; ?>" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $password; ?>" required></td>
			</tr>
			<tr>
				<td>Foto Profile</td>
				<td><input id="file-input" type="file" name="file" value="<?php echo $foto_profile; ?>" required></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<img id="image-preview" width="200px" src=" <?php echo "file_gambar/".$foto_profile; ?> " ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btn_simpan" value="Update"></td>
			</tr>
		</table>
	</form>
</center>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script>
	$("#file-input").on("change", function () {
		document.getElementById("image-preview").remove();
	});
</script>