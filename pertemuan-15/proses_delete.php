<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

// cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_biodata'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

// validasi cid wajib angka dan > 0
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1],
]);

if (!$cid) {
    $_SESSION['flash_error_biodata'] = 'CID tidak valid.';
    redirect_ke('read.php');
}

// ambil dan bersihkan (sanitasi) nilai dari form
$nim           = bersihkan($_POST['txtNim']       ?? '');
$nama          = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat_lahir  = bersihkan($_POST['txtT4Lhr']     ?? '');
$tanggal_lahir = bersihkan($_POST['txtTglLhr']    ?? '');
$hobi          = bersihkan($_POST['txtHobi']      ?? '');
$pasangan      = bersihkan($_POST['txtPasangan']  ?? '');
$pekerjaan     = bersihkan($_POST['txtKerja']     ?? '');
$orang_tua     = bersihkan($_POST['txtNmOrtu']    ?? '');
$kakak         = bersihkan($_POST['txtNmKakak']   ?? '');
$adik          = bersihkan($_POST['txtNmAdik']    ?? '');

// Validasi sederhana
$errors = [];

if ($nim === '') {
    $errors[] = 'NIM wajib diisi.';
}

if ($nama === '') {
    $errors[] = 'Nama minimal 3 karakter.';
} elseif (strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if (
    $tanggal_lahir !== '' &&
    !preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal_lahir)
) {
    $errors[] = 'Format tanggal lahir harus YYYY-MM-DD.';
}

if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
        'txtNim'       => $nim,
        'txtNmLengkap' => $nama,
        'txtT4Lhr'     => $tempat_lahir,
        'txtTglLhr'    => $tanggal_lahir,
        'txtHobi'      => $hobi,
        'txtPasangan'  => $pasangan,
        'txtKerja'     => $pekerjaan,
        'txtNmOrtu'    => $orang_tua,
        'txtNmKakak'   => $kakak,
        'txtNmAdik'    => $adik,
    ];

    $_SESSION['flash_error_biodata'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid=' . (int)$cid);
}

// Prepared statement untuk UPDATE biodata_mahasiswa
$sql = "UPDATE biodata_mahasiswa
        SET nim = ?,
            nama_lengkap = ?,
            tempat_lahir = ?,
            tanggal_lahir = ?,
            hobi = ?,
            pasangan = ?,
            pekerjaan = ?,
            nama_orang_tua = ?,
            nama_kakak = ?,
            nama_adik = ?
        WHERE id = ?"; // ganti 'id' jika nama kolom PK berbeda

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    $_SESSION['flash_error_biodata'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssi",
    $nim,
    $nama,
    $tempat_lahir,
    $tanggal_lahir,
    $hobi,
    $pasangan,
    $pekerjaan,
    $orang_tua,
    $kakak,
    $adik,
    $cid
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    unset($_SESSION['old_biodata']);

    $_SESSION['flash_sukses_biodata'] = 'Terima kasih, data biodata Anda sudah diperbaharui.';
    redirect_ke('read.php'); // kembali ke daftar biodata
} else {
    mysqli_stmt_close($stmt);

    $_SESSION['old_biodata'] = [
        'txtNim'       => $nim,
        'txtNmLengkap' => $nama,
        'txtT4Lhr'     => $tempat_lahir,
        'txtTglLhr'    => $tanggal_lahir,
        'txtHobi'      => $hobi,
        'txtPasangan'  => $pasangan,
        'txtKerja'     => $pekerjaan,
        'txtNmOrtu'    => $orang_tua,
        'txtNmKakak'   => $kakak,
        'txtNmAdik'    => $adik,
    ];

    $_SESSION['flash_error_biodata'] = 'Data biodata gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}