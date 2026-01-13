<?php
require 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "nim"      => ["label" => "NIM:", "suffix" => ""],
    "nama"     => ["label" => "Nama Lengkap:", "suffix" => " &#128526;"],
    "tempat"   => ["label" => "Tempat Lahir:", "suffix" => ""],
    "tanggal"  => ["label" => "Tanggal Lahir:", "suffix" => ""],
    "hobi"     => ["label" => "Hobi:", "suffix" => " &#127926;"],
    "pasangan" => ["label" => "Pasangan:", "suffix" => " &hearts;"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "ortu"     => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "kakak"    => ["label" => "Nama Kakak:", "suffix" => ""],
    "adik"     => ["label" => "Nama Adik:", "suffix" => ""],
];

$sql = "SELECT * FROM biodata_mahasiswa ORDER BY id DESC";
$q   = mysqli_query($conn, $sql);
?>

<?php
if (!$q || mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada biodata di database.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $biodata = [
            "nim"      => $row["nim"]           ?? "",
            "nama"     => $row["nama_lengkap"]  ?? "",
            "tempat"   => $row["tempat_lahir"]  ?? "",
            "tanggal"  => $row["tanggal_lahir"] ?? "",
            "hobi"     => $row["hobi"]          ?? "",
            "pasangan" => $row["pasangan"]      ?? "",
            "pekerjaan" => $row["pekerjaan"]     ?? "",
            "ortu"     => $row["nama_orang_tua"] ?? "",
            "kakak"    => $row["nama_kakak"]    ?? "",
            "adik"     => $row["nama_adik"]     ?? "",
        ];

        echo tampilkanBiodata($fieldConfig, $biodata);
    }
}
?>
</section>