<?php
require_once("koneksi.php");

$nim = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM `mahasiswa` WHERE `nim`='$nim' and `password`='$password' ";
$result = $db->query($sql);

$sql2 = "SELECT * FROM mahasiswa WHERE nim=:nim";
$stmt = $db->prepare($sql2);

// bind parameter ke query
$params = array(
    ":nim" => $nim,
);

$stmt->execute($params);

$mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result->rowCount() > 0){
    session_start();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["mahasiswa"] = $mahasiswa;
        header("Location: ../index.php");
    }
}
else{
    header("Location: ../login.php");
}

?>