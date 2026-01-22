<?php
require 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "kode"      => ["label" => "Kode Pengunjung:", "suffix" => ""],
    "nama"      => ["label" => "Nama Pengunjung:", "suffix" => " &#128526;"],
    "alamat"    => ["label" => "Alamat Rumah:", "suffix" => ""],
    "tanggal"   => ["label" => "Tanggal Kunjungan:", "suffix" => ""],
    "hobi"      => ["label" => "Hobi:", "suffix" => " &#127926;"],
    "asal"      => ["label" => "Asal SLTA:", "suffix" => ""],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "ortu"      => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "pacar"     => ["label" => "Nama Pacar:", "suffix" => " &hearts;"],
    "mantan"    => ["label" => "Nama Mantan:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_pengunjung ORDER BY id DESC";
$q   = mysqli_query($conn, $sql);

if (!$q || mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data pengunjung di database.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $biodata = [
            "kode"      => $row["kode_pengunjung"]   ?? "",
            "nama"      => $row["nama_pengunjung"]   ?? "",
            "alamat"    => $row["alamat_rumah"]      ?? "",
            "tanggal"   => $row["tanggal_kunjungan"] ?? "",
            "hobi"      => $row["hobi"]               ?? "",
            "asal"      => $row["asal_slta"]          ?? "",
            "pekerjaan" => $row["pekerjaan"]          ?? "",
            "ortu"      => $row["nama_orang_tua"]     ?? "",
            "pacar"     => $row["nama_pacar"]         ?? "",
            "mantan"    => $row["nama_mantan"]        ?? "",
        ];

        echo tampilkanBiodata($fieldConfig, $biodata);
    }
}
?>