<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM biodata_mahasiswa ORDER BY id DESC";
$q   = mysqli_query($conn, $sql);
if (!$q) {
  die("Query error: " . mysqli_error($conn));
}
?>

<?php
$flash_sukses_biodata = $_SESSION['flash_sukses_biodata'] ?? ''; #jika query sukses
$flash_error_biodata = $_SESSION['flash_error_biodata'] ?? ''; #jika ada error
#bersihkan session ini
unset($_SESSION['flash_sukses_biodata'], $_SESSION['flash_error_biodata']);
?>

<?php if (!empty($flash_sukses_biodata)): ?>
  <div style="padding:10px; margin-bottom:10px; 
          background:#d4edda; color:#155724; border-radius:6px;">
    <?= $flash_sukses_biodata; ?>
  </div>
<?php endif; ?>

<?php if (!empty($flash_error_biodata)): ?>
  <div style="padding:10px; margin-bottom:10px; 
          background:#f8d7da; color:#721c24; border-radius:6px;">
    <?= $flash_error_biodata; ?>
  </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>ID</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Hobi</th>
    <th>Pasangan</th>
    <th>Pekerjaan</th>
    <th>Orang Tua</th>
    <th>Kakak</th>
    <th>Adik</th>
  </tr>

  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $row['id']; ?></td>
      <td><?= htmlspecialchars($row['nim']); ?></td>
      <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
      <td><?= htmlspecialchars($row['tempat_lahir']); ?></td>
      <td><?= htmlspecialchars($row['tanggal_lahir']); ?></td>
      <td><?= htmlspecialchars($row['hobi']); ?></td>
      <td><?= htmlspecialchars($row['pasangan']); ?></td>
      <td><?= htmlspecialchars($row['pekerjaan']); ?></td>
      <td><?= htmlspecialchars($row['nama_orang_tua']); ?></td>
      <td><?= htmlspecialchars($row['nama_kakak']); ?></td>
      <td><?= htmlspecialchars($row['nama_adik']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>