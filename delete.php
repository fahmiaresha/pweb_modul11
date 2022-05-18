<?php
 include 'script/koneksi2.php';
 $id = $_GET['id'];
 mysqli_query($conn,"delete from mahasiswa where id='$id'");
 header("location:index.php");
?>