<?php
session_start();
require _DIR_ . '/koneksi.php';
require_once _DIR_ . '/fungsi.php';

/* hanya izinkan POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#about');
}

/* validasi id */
$id = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$id) {
  $_SESSION['flash_error'] = 'ID tidak valid.';
  redirect_ke('index.php#about');
}

/* ambil & bersihkan input */
$kode    = bersihkan($_POST['txtKodePen'] ?? '');
$nama    = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat  = bersihkan($_POST['txtAlRmh'] ?? '');
$tgl     = bersihkan($_POST['txtTglKunjungan'] ?? '');
$hobi    = bersihkan($_POST['txtHobi'] ?? '');
$asal    = bersihkan($_POST['txtAsalSMA'] ?? '');
$kerja   = bersihkan($_POST['txtKerja'] ?? '');
$ortu    = bersihkan($_POST['txtNmOrtu'] ?? '');
$pacar   = bersihkan($_POST['txtNmPacar'] ?? '');
$mantan  = bersihkan($_POST['txtNmMantan'] ?? '');

/* validasi */
$errors = [];

if ($kode === '')   $errors[] = 'Kode pengunjung wajib diisi.';
if ($nama === '')   $errors[] = 'Nama pengunjung wajib diisi.';
if ($alamat === '') $errors[] = 'Alamat rumah wajib diisi.';
if ($tgl === '')    $errors[] = 'Tanggal kunjungan wajib diisi.';
if ($hobi === '')   $errors[] = 'Hobi wajib diisi.';
if ($asal === '')   $errors[] = 'Asal SLTA wajib diisi.';
if ($kerja === '')  $errors[] = 'Pekerjaan wajib diisi.';
if ($ortu === '')   $errors[] = 'Nama orang tua wajib diisi.';

if (!empty($errors)) {
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('edit.php?cid=' . (int)$id);
}

/* UPDATE data (prepared statement) */
$sql = "UPDATE tbl_pengunjung SET
          kode_pengunjung   = ?,
          nama_pengunjung   = ?,
          alamat_rumah      = ?,
          tanggal_kunjungan = ?,
          hobi              = ?,
          asal_slta         = ?,
          pekerjaan         = ?,
          nama_orang_tua    = ?,
          nama_pacar        = ?,
          nama_mantan       = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Kesalahan sistem.';
  redirect_ke('edit.php?cid=' . (int)$id);
}

mysqli_stmt_bind_param(
  $stmt,
  "ssssssssssi",
  $kode, $nama, $alamat, $tgl, $hobi,
  $asal, $kerja, $ortu, $pacar, $mantan,
  $id
);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data pengunjung berhasil diperbarui.';
  redirect_ke('index.php#about');
} else {
  $_SESSION['flash_error'] = 'Data gagal diperbarui.';
  redirect_ke('edit.php?cid=' . (int)$id);
}

mysqli_stmt_close($stmt);