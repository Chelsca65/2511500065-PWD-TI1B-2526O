<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_pengunjung ORDER BY id DESC";
$q   = mysqli_query($conn, $sql);
if (!$q) {
  die("Query error: " . mysqli_error($conn));
}
?>

<?php
$flash_sukses_biodata = $_SESSION['flash_sukses_biodata'] ?? '';
$flash_error_biodata = $_SESSION['flash_error_biodata'] ?? '';
unset($_SESSION['flash_sukses_biodata'], $_SESSION['flash_error_biodata']);
?>

<?php if (!empty($flash_sukses_biodata)): ?>
  <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
    <?= $flash_sukses_biodata; ?>
  </div>
<?php endif; ?>

<?php if (!empty($flash_error_biodata)): ?>
  <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
    <?= $flash_error_biodata; ?>
  </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Kode Pengunjung</th>
    <th>Nama Pengunjung</th>
    <th>Alamat Rumah</th>
    <th>Tanggal Kunjungan</th>
    <th>Hobi</th>
    <th>Asal SLTA</th>
    <th>Pekerjaan</th>
    <th>Nama Orang Tua</th>
    <th>Nama Pacar</th>
    <th>Nama Mantan</th>
  </tr>

  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?cid=<?= (int)$row['id']; ?>">Edit</a> |
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['nama_pengunjung']); ?> ?')" 
           href="proses_delete.php?cid=<?= (int)$row['id']; ?>">Delete</a>
      </td>
      <td><?= $row['id']; ?></td>
      <td><?= htmlspecialchars($row['kode_pengunjung']); ?></td>
      <td><?= htmlspecialchars($row['nama_pengunjung']); ?></td>
      <td><?= htmlspecialchars($row['alamat_rumah']); ?></td>
      <td><?= htmlspecialchars($row['tanggal_kunjungan']); ?></td>
      <td><?= htmlspecialchars($row['hobi']); ?></td>
      <td><?= htmlspecialchars($row['asal_slta']); ?></td>
      <td><?= htmlspecialchars($row['pekerjaan']); ?></td>
      <td><?= htmlspecialchars($row['nama_orang_tua']); ?></td>
      <td><?= htmlspecialchars($row['nama_pacar']); ?></td>
      <td><?= htmlspecialchars($row['nama_mantan']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>