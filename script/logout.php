<?php
session_start();
unset ($_SESSION["mahasiswa"]);
header("Location: ../login.php")
?>