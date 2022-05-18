<?php require_once("script/auth.php"); ?>
<?php
	if(isset($_POST['btn_simpan'])){
	include 'script/koneksi2.php';
	
	$sql=$conn->query("insert into mahasiswa (mahasiswa, nim,prodi,jurusan,password) 
	values('".$_POST['nama']."','".$_POST['nim']."','".$_POST['prodi']."','".$_POST['jurusan']."','".$_POST['password']."') ");

	$last_id = mysqli_insert_id($conn);
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'file_gambar/'.$nama);
					$query = mysqli_query($conn,"UPDATE mahasiswa SET foto_profile ='$nama' WHERE id='$last_id'");
					if($query){
						// echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
			header("Location: ../index.php");
}
?>

<center>
<form action="" method="post" enctype='multipart/form-data'>

	<h1>Tambah Data Mahasiswa</h1>
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" required></td>
		</tr>
		<tr>
			<td>Nim</td>
			<td><input type="text" name="nim" required></td>
		</tr>
		<tr>
			<td>Prodi</td>
			<td><input type="text" name="prodi" required></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><input type="text" name="jurusan" required></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password" required></td>
		</tr>
		<tr>
			<td>Foto Profile</td>
			<td><input type="file" name="file" required></td>
		</tr>
		<td></td>
		<td><input type="submit" name="btn_simpan" value="Tambah"></td>
		</tr>
	</table>
</form>
</center>