<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_biodata'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

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

$errors = [];

if ($nim === '')  $errors[] = 'NIM wajib diisi.';

if ($nama === '') $errors[] = 'Nama minimal 3 karakter.';
elseif (strlen($nama) < 3) {
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
    redirect_ke('index.php#biodata');
}

$sql = "INSERT INTO biodata_mahasiswa
        (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan,
         nama_orang_tua, nama_kakak, nama_adik)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error_biodata'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $nim,
    $nama,
    $tempat_lahir,
    $tanggal_lahir,
    $hobi,
    $pasangan,
    $pekerjaan,
    $orang_tua,
    $kakak,
    $adik
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_biodata']);
    $_SESSION['flash_sukses_biodata'] = 'Data biodata berhasil disimpan.';
    redirect_ke('index.php#biodata');
} else {
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
    $_SESSION['flash_error_biodata'] = 'Data biodata gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);

$arrBiodata = [
    "nim" => $_POST["txtNim"] ?? "",
    "nama" => $_POST["txtNmLengkap"] ?? "",
    "tempat" => $_POST["txtT4Lhr"] ?? "",
    "tanggal" => $_POST["txtTglLhr"] ?? "",
    "hobi" => $_POST["txtHobi"] ?? "",
    "pasangan" => $_POST["txtPasangan"] ?? "",
    "pekerjaan" => $_POST["txtKerja"] ?? "",
    "ortu" => $_POST["txtNmOrtu"] ?? "",
    "kakak" => $_POST["txtNmKakak"] ?? "",
    "adik" => $_POST["txtNmAdik"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");
exit;