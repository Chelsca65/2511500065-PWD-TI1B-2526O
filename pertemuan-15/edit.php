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

$stmt = mysqli_prepare(
    $conn,
    "SELECT id, nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi,
            pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adik
     FROM biodata_mahasiswa
     WHERE id = ?
     LIMIT 1"
);
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

// nilai awal dari DB
    $nim           = $row['nim']             ?? '';
    $nama          = $row['nama_lengkap']    ?? '';
    $tempat_lahir  = $row['tempat_lahir']    ?? '';
    $tanggal_lahir = $row['tanggal_lahir']   ?? '';
    $hobi          = $row['hobi']            ?? '';
    $pasangan      = $row['pasangan']        ?? '';
    $pekerjaan     = $row['pekerjaan']       ?? '';
    $orang_tua     = $row['nama_orang_tua']  ?? '';
    $kakak         = $row['nama_kakak']      ?? '';
    $adik          = $row['nama_adik']       ?? '';

// error & old
$flash_error   = $_SESSION['flash_error_biodata'] ?? '';
$old_biodata   = $_SESSION['old_biodata']        ?? [];
unset($_SESSION['flash_error_biodata'], $_SESSION['old_biodata']);

if (!empty($old_biodata)) {
    $nim           = $old_biodata['txtNim']       ?? $nim;
    $nama          = $old_biodata['txtNmLengkap'] ?? $nama;
    $tempat_lahir  = $old_biodata['txtT4Lhr']     ?? $tempat_lahir;
    $tanggal_lahir = $old_biodata['txtTglLhr']    ?? $tanggal_lahir;
    $hobi          = $old_biodata['txtHobi']      ?? $hobi;
    $pasangan      = $old_biodata['txtPasangan']  ?? $pasangan;
    $pekerjaan     = $old_biodata['txtKerja']     ?? $pekerjaan;
    $orang_tua     = $old_biodata['txtNmOrtu']    ?? $orang_tua;
    $kakak         = $old_biodata['txtNmKakak']   ?? $kakak;
    $adik          = $old_biodata['txtNmAdik']    ?? $adik;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section id="biodata">
            <h2>Edit Biodata Mahasiswa</h2>
            <?php if (!empty($flash_error)): ?>
                <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
                    <?= $flash_error; ?>
                </div>
            <?php endif; ?>
            <form action="proses.php" method="POST">

                <input type="text" name="cid" value="<?= (int)$cid; ?>">

                <label for="txtNim"><span>NIM:</span>
                    <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan NIM" required
                        value="<?= !empty($nim) ? $nim : '' ?>">
                </label>

                <label for="txtNmLengkap"><span>Nama Lengkap:</span>
                    <input type="text" id="txtNmLengkap" name="txtNmLengkap" placeholder="Masukkan Nama Lengkap" required
                        value="<?= !empty($nama) ? $nama : '' ?>">
                </label>

                <label for="txtT4Lhr"><span>Tempat Lahir:</span>
                    <input type="text" id="txtT4Lhr" name="txtT4Lhr" placeholder="Masukkan Tempat Lahir" required
                        value="<?= !empty($tempat_lahir) ? $tempat_lahir : '' ?>">
                </label>

                <label for="txtTglLhr"><span>Tanggal Lahir:</span>
                    <input type="text" id="txtTglLhr" name="txtTglLhr" placeholder="Masukkan Tanggal Lahir" required
                        value="<?= !empty($tanggal_lahir) ? $tanggal_lahir : '' ?>">
                </label>

                <label for="txtHobi"><span>Hobi:</span>
                    <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required
                        value="<?= !empty($hobi) ? $hobi : '' ?>">
                </label>

                <label for="txtPasangan"><span>Pasangan:</span>
                    <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" required
                        value="<?= !empty($pasangan) ? $pasangan : '' ?>">
                </label>

                <label for="txtKerja"><span>Pekerjaan:</span>
                    <input type="text" id="txtKerja" name="txtKerja" placeholder="Masukkan Pekerjaan" required
                        value="<?= !empty($pekerjaan) ? $pekerjaan : '' ?>">
                </label>

                <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
                    <input type="text" id="txtNmOrtu" name="txtNmOrtu" placeholder="Masukkan Nama Orang Tua" required
                        value="<?= !empty($orang_tua) ? $orang_tua : '' ?>">
                </label>

                <label for="txtNmKakak"><span>Nama Kakak:</span>
                    <input type="text" id="txtNmKakak" name="txtNmKakak" placeholder="Masukkan Nama Kakak" required
                        value="<?= !empty($kakak) ? $kakak : '' ?>">
                </label>

                <label for="txtNmAdik"><span>Nama Adik:</span>
                    <input type="text" id="txtNmAdik" name="txtNmAdik" placeholder="Masukkan Nama Adik" required
                        value="<?= !empty($adik) ? $adik : '' ?>">
                </label>

                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
        </section>