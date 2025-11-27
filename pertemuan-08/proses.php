<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;
header("location: index.php");
?>

<?php
session_start();
$sesnim = $_POST["txtNIM"];
$sesNama = $_POST["txtNama"];
$sestempat = $_POST["txtTempatLahir"];
$sestanggal = $_POST["txtTanggalLahir"];
$seshobi = $_POST["txtHobi"];
$sespasangan = $_POST["txtPasangan"];
$sespekerjaan = $_POST["txtPekerjaan"];
$sesortu = $_POST["txtOrtu"];
$seskakak = $_POST["txtKakak"];
$sesadik = $_POST["txtAdik"];


$_SESSION["sesnim"] = $sesnim;
$_SESSION["sesNama"] = $sesNama;
$_SESSION["sestempat"] = $sestempat;
$_SESSION["sestanggal"] = $sestanggal;
$_SESSION["seshobi"] = $seshobi;
$_SESSION["sespasangan"] = $sespasangan;
$_SESSION["sespekerjaan"] = $sespekerjaan;
$_SESSION["sesortu"] = $sesortu;
$_SESSION["seskakak"] = $seskakak;
$_SESSION["sesadik"] = $sesadik;

header("location:index.php#data");
?>
