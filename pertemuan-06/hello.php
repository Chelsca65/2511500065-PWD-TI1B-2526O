<?php
    echo "Halo Dunia!";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Belajar PHP Dasar</title>
</head>
<body>
    <h1><?php echo "Halo, Dunia PHP!"; ?></h1>
    <h2><?php echo "Selamat datang di PHP, Chelsea!"; ?></h2>
</body>
</html>

<?php
$nama = "Chelsea";
$umur = 18;
$tinggi = 150;
$aktif = true;

echo "Nama: $nama <br>";
echo "Umur: $umur tahun <br>";
echo "Tinggi: $tinggi centimeter <br>";
echo "Status aktif: " . ($aktif ? "Ya" : "Tidak") . "<br>";
var_dump($nama);
var_dump($umur);
var_dump($tinggi);
var_dump($aktif);
?>

<?php
$nama = "Chelsea Clarisa";
$umur = 18;
$tinggi = 150;
$aktif = true;
$hobi = ["Menonton", "Musik"];
$mahasiswa = (object)[
"nim" => "2511500065",
"nama" => "Chelsea Clarisa",
"prodi" => "Teknik Informatika"
];
$nilai_akhir = NULL;
echo "<h2>Demo Tipe Data PHP</h2>";

echo "<pre>";
echo "String:\n";
var_dump($nama);

echo "\nInteger:\n";
var_dump($umur);

echo "\nFloat:\n";
var_dump($tinggi);

echo "\nBoolean:\n";
var_dump($aktif);

echo "\nArray:\n";
var_dump($hobi);
?>

<?php
define("KAMPUS", "ISB Atma Luhur");
const ANGKATAN = 2025;

echo "Kampus: " . KAMPUS . "<br>";
echo "Angkatan: " . ANGKATAN . "<br>";

define("MATKUL", "Pemograman Web Dasar");
define("DOSEN_PENGAMPU", "Pak Yohanes");

echo "Mata kuliah: " . MATKUL . "<br>";
echo "Dosen Pengampu: " . DOSEN_PENGAMPU;
?>

<?php
// Ini komentar 1 baris
# Ini juga komentar 1 baris
/*
Ini komentar
lebih dari satu baris
*/
?>

<?php
$a = 10;
$b = 3;
echo $a + $b;
echo $a % $b;
?>

<?php
$a = 100;
$b = "100";
$c = 0;
$d = false;
echo "<h3>Perbandingan == dan ===</h3>";
echo "\$a == \$b : "; var_dump($a == $b);
echo "\$a === \$b : "; var_dump($a === $b);
echo "\$c == \$d : "; var_dump($c == $d);
echo "\$c === \$d : "; var_dump($c === $d);
?>

<?php
$nilai = 80;
if ($nilai >= 90) {
echo "A";
} elseif ($nilai >= 80) {
echo "B";
} else {
echo "C";
}
?>

<?php
$hari = "Senin";
switch ($hari) {
case "Senin": echo "Awal Minggu!"; break;
case "Jumat": echo "Hampir weekend!"; break;
default: echo "Hari biasa.";
}
?>

<?php
$hobi = ["Menonton", "Musik"];
foreach ($hobi as $item) {
echo "Hobi: $item <br>";
}
?>

<?php
$hobi = ["Menonton", "Memasak", "Musik", "Membaca", "Traveling"];
echo "<h3>Daftar Hobi Saya:</h3>";
for ($i = 0; $i < count($hobi); $i++) {
echo ($i + 1) . ". " . $hobi[$i] . "<br>";
}
echo "<hr>";
echo "<h4>Hasil print_r():</h4>";
echo "<pre>";
print_r($hobi);
echo "</pre>";
echo "<h4>Hasil var_dump():</h4>";
echo "<pre>";
var_dump($hobi);
echo "</pre>";
?>

<?php
for ($i=1; $i<=5; $i++) {
echo "Perulangan ke-$i <br>";
}
?>

<?php
$i = 1;
do {
echo "Iterasi ke-$i<br>";
$i++;
} while ($i <= 5);
?>


