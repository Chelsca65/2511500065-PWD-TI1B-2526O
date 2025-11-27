<?php
session_start();
$sesNama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];

$_SESSION["nama"] = $sesNama;
$_SESSION["email"] = $sesemail;
$_SESSION["pesan"] = $sespesan;
echo $_SESSION["nama"] . $_SESSION["email"] . $_SESSION["pesan"];
#header("location: index.php");
?>