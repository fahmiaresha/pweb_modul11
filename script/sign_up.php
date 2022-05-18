<?php
require_once("koneksi.php");
// filter data yang diinputkan
$nama_lengkap = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
$nim = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$prodi = filter_input(INPUT_POST, 'prodi', FILTER_SANITIZE_STRING);
$jurusan = filter_input(INPUT_POST, 'jurusan', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
// $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// menyiapkan query
$sql = "INSERT INTO user (nama_lengkap, nim, email, prodi,jurusan,password) 
        VALUES (:nama_lengkap, :nim, :email, :prodi,:jurusan,:password)";
$stmt = $db->prepare($sql);

// bind parameter ke query
$params = array(
    ":nama_lengkap" => $nama_lengkap,
    ":nim" => $nim,
    ":email" => $email,
    ":prodi" => $prodi,
    ":jurusan" => $jurusan,
    ":password" => $password,
);

// eksekusi query untuk menyimpan ke database
$saved = $stmt->execute($params);

// jika query simpan berhasil, maka user sudah terdaftar
// maka alihkan ke halaman login
if($saved) header("Location: ../login.php");
?>