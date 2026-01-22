<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: index.php");
  exit;
}

$sql = "INSERT INTO tbl_pengunjung
(kode_pengunjung, nama_pengunjung, alamat_rumah, tanggal_kunjungan,
 hobi, asal_slta, pekerjaan, nama_orang_tua, nama_pacar, nama_mantan)
VALUES (?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssssssssss",
  $_POST['txtKodePen'],
  $_POST['txtNmPengunjung'],
  $_POST['txtAlRmh'],
  $_POST['txtTglKunjungan'],
  $_POST['txtHobi'],
  $_POST['txtAsalSMA'],
  $_POST['txtKerja'],
  $_POST['txtNmOrtu'],
  $_POST['txtNmPacar'],
  $_POST['txtNmMantan']
);

mysqli_stmt_execute($stmt);

header("Location: index.php#about");
exit;