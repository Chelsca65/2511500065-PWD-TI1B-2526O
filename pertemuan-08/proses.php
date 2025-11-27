<?php
session_start();
$_session["nim"] = $_POST["txtNIM"];
$_SESSION["nama"] = $_POST["txtNama"];
$_SESSION["tempat"] = $_POST["txtTempatLahir"];
$_SESSION["tanggal"] = $_POST["txtTanggalLahir"];
$_SESSION["hobi"] = $_POST["txtHobi"];
$_SESSION["pasangan"] = $_POST["txtPasangan"];
$_SESSION["pekerjaan"] = $_POST["txtPekerjaan"];
$_SESSION["ortu"] = $_POST["txtOrtu"];
$_SESSION["kakak"] = $_POST["txtKakak"];
$_SESSION["adik"] = $_POST["txtAdik"];

$sesnim = $_SESSION["nim"];
$sesNama = $_SESSION["nama"];
$sestempat = $_SESSION["tempat"];
$sestanggal = $_SESSION["tanggal"];
$seshobi = $_SESSION["hobi"];
$sespasangan = $_SESSION["pasangan"];
$sespekerjaan = $_SESSION["pekerjaan"];
$sesortu = $_SESSION["ortu"];
$seskakak = $_SESSION["kakak"];
$sesadik = $_SESSION["adik"];

echo $_SESSION["nim"] . $_SESSION["nama"] . $_SESSION["tempat"] . $_SESSION["tanggal"] . $_SESSION["hobi"] . $_SESSION["pasangan"] . $_SESSION["pekerjaan"] . $_SESSION["ortu"] . $_SESSION["kakak"] . $_SESSION["adik"];
header("location: index.php");
?>


