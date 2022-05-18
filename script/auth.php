<?php
session_start();
if(!isset($_SESSION["mahasiswa"])) header("Location: login.php");
?>