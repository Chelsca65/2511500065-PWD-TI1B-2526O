<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/* ambil id pengunjung */
$id = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$id) {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#about');
}

/* ambil data lama */
$stmt = mysqli_prepare($conn, "
  SELECT 
    kode_pengunjung,
    nama_pengunjung,
    alamat_rumah,
    tanggal_kunjungan,
    hobi,
    asal_slta,
    pekerjaan,
    nama_orang_tua,
    nama_pacar,
    nama_mantan
  FROM tbl_pengunjung
  WHERE id = ?
  LIMIT 1
");

if (!$stmt) {
  $_SESSION['flash_error'] = 'Query tidak valid.';
  redirect_ke('index.php#about');
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$data) {
  $_SESSION['flash_error'] = 'Data tidak ditemukan.';
  redirect_ke('index.php#about');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Edit Biodata</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <h2>Edit Biodata Pengunjung</h2>

  <?php if ($flash_error): ?>
        <div style="padding:10px;background:#f8d7da;color:#721c24;border-radius:6px;">
            <?= $flash_error ?>
        </div>
    <?php endif; ?>

  <form action="proses_update.php" method="post">
    <input type="hidden" name="cid" value="<?= $id ?>">

    <label>Kode Pengunjung
      <input type="text" name="kode" value="<?= $data['kode_pengunjung'] ?>" required>
    </label>

    <label>Nama Pengunjung
      <input type="text" name="nama" value="<?= $data['nama_pengunjung'] ?>" required>
    </label>

    <label>Alamat Rumah
      <input type="text" name="alamat" value="<?= $data['alamat_rumah'] ?>" required>
    </label>

    <label>Tanggal Kunjungan
      <input type="text" name="tanggal" value="<?= $data['tanggal_kunjungan'] ?>" required>
    </label>

    <label>Hobi
      <input type="text" name="hobi" value="<?= $data['hobi'] ?>" required>
    </label>

    <label>Asal SLTA
      <input type="text" name="asal" value="<?= $data['asal_slta'] ?>" required>
    </label>

    <label>Pekerjaan
      <input type="text" name="pekerjaan" value="<?= $data['pekerjaan'] ?>" required>
    </label>

    <label>Nama Orang Tua
      <input type="text" name="ortu" value="<?= $data['nama_orang_tua'] ?>" required>
    </label>

    <label>Nama Pacar
      <input type="text" name="pacar" value="<?= $data['nama_pacar'] ?>">
    </label>

    <label>Nama Mantan
      <input type="text" name="mantan" value="<?= $data['nama_mantan'] ?>">
    </label>

    <button type="submit">Update</button>
    <a href="read.php">Batal</a>
  </form>

</body>

</html>