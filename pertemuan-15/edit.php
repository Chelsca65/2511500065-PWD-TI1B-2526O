<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);

if (!$cid) {
    $_SESSION['flash_error_biodata'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

/* ambil data lama */
$stmt = mysqli_prepare($conn, "
    SELECT id, nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi,
           pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adik
    FROM biodata_mahasiswa
    WHERE id = ?
    LIMIT 1
");

if (!$stmt) {
    $_SESSION['flash_error_biodata'] = 'Query tidak benar.';
    redirect_ke('read.php');
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error_biodata'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
}

/* nilai awal */
$nim           = $row['nim'];
$nama          = $row['nama_lengkap'];
$tempat_lahir  = $row['tempat_lahir'];
$tanggal_lahir = $row['tanggal_lahir'];
$hobi          = $row['hobi'];
$pasangan      = $row['pasangan'];
$pekerjaan     = $row['pekerjaan'];
$orang_tua     = $row['nama_orang_tua'];
$kakak         = $row['nama_kakak'];
$adik          = $row['nama_adik'];

/* error & old */
$flash_error = $_SESSION['flash_error_biodata'] ?? '';
$old = $_SESSION['old_biodata'] ?? [];
unset($_SESSION['flash_error_biodata'], $_SESSION['old_biodata']);

if ($old) {
    $nim           = $old['txtNim']       ?? $nim;
    $nama          = $old['txtNmLengkap'] ?? $nama;
    $tempat_lahir  = $old['txtT4Lhr']     ?? $tempat_lahir;
    $tanggal_lahir = $old['txtTglLhr']    ?? $tanggal_lahir;
    $hobi          = $old['txtHobi']      ?? $hobi;
    $pasangan      = $old['txtPasangan']  ?? $pasangan;
    $pekerjaan     = $old['txtKerja']     ?? $pekerjaan;
    $orang_tua     = $old['txtNmOrtu']    ?? $orang_tua;
    $kakak         = $old['txtNmKakak']   ?? $kakak;
    $adik          = $old['txtNmAdik']    ?? $adik;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Biodata Mahasiswa</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Edit Biodata Mahasiswa</h2>

<?php if ($flash_error): ?>
<div style="padding:10px;background:#f8d7da;color:#721c24;border-radius:6px;">
    <?= $flash_error ?>
</div>
<?php endif; ?>

<form action="proses_update_biodata.php" method="POST">

<input type="hidden" name="cid" value="<?= (int)$cid ?>">

<label>NIM
<input type="text" name="txtNim" value="<?= htmlspecialchars($nim) ?>" required>
</label>

<label>Nama Lengkap
<input type="text" name="txtNmLengkap" value="<?= htmlspecialchars($nama) ?>" required>
</label>

<label>Tempat Lahir
<input type="text" name="txtT4Lhr" value="<?= htmlspecialchars($tempat_lahir) ?>" required>
</label>

<label>Tanggal Lahir
<input type="text" name="txtTglLhr" value="<?= htmlspecialchars($tanggal_lahir) ?>" required>
</label>

<label>Hobi
<input type="text" name="txtHobi" value="<?= htmlspecialchars($hobi) ?>" required>
</label>

<label>Pasangan
<input type="text" name="txtPasangan" value="<?= htmlspecialchars($pasangan) ?>">
</label>

<label>Pekerjaan
<input type="text" name="txtKerja" value="<?= htmlspecialchars($pekerjaan) ?>" required>
</label>

<label>Nama Orang Tua
<input type="text" name="txtNmOrtu" value="<?= htmlspecialchars($orang_tua) ?>" required>
</label>

<label>Nama Kakak
<input type="text" name="txtNmKakak" value="<?= htmlspecialchars($kakak) ?>">
</label>

<label>Nama Adik
<input type="text" name="txtNmAdik" value="<?= htmlspecialchars($adik) ?>">
</label>

<button type="submit">Update</button>
<a href="read.php">Batal</a>

</form>

</body>
</html>