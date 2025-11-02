<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>judul halaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle-Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
                <li><a href="#ipk">nilai</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Selamat Datang</h2>
            <p>Ini contoh paragraf HTML.</p>
            <?php
            echo "Halo Dunia!";
            ?>
        </section>
        
        <section id="about">
            <?php
                $nim = "2511500065";
                $namalengkap = "Chelsea Clarisa &#129321;";
                $tempatlahir = "Pangkalpinang";
                $tanggallahir = "12 Mei 2007";
                $hobi = "Belajar, menonton film, mendengarkan musik &#127925;";
                $pasangan = "Matthew Ignatius Susanto &hearts;";
                $pekerjaan = "Mahasiswi di ISB Atma Luhur &copy; 2025";
                $namaorangtua = "Liu Yin Siang dan Chew Kim Thui";
                $namakakak = "Fitri Natalia dan Evans Leonardo";
                $namaadik = "Jennifer Gracia";
            ?>
            <h2>Tentang Saya</h2>
            <p><strong>NIM:</strong> <?php echo $nim ?></p>
            <p><strong>Nama Lengkap:</strong> <?php echo $namalengkap ?></p>
            <p><strong>Tempat Lahir:</strong> <?php echo $tempatlahir ?></p>
            <p><strong>Tanggal Lahir:</strong> <?php echo $tanggallahir ?></p>
            <p><strong>Hobi:</strong> <?php echo $hobi ?></p>
            <p><strong>Pasangan:</strong> <?php echo $pasangan ?></p>
            <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan ?></p>
            <p><strong>Nama Orang Tua:</strong> <?php echo $namaorangtua ?></p>
            <p><strong>Nama Kakak:</strong> <?php echo $namakakak ?></p>
            <p><strong>Nama Adik:</strong> <?php echo $namaadik ?></p>
        </section>
        <section id="contact">
            <h2>Kontak Kami</h2>
            <form action="" method="GET">
                <label for="txtNama"><span>Nama:</span>
                     <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" autocomplete="Name">
                </label>

                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" autocomplete="email">
                </label>

                <label for="txtpesan"><span>Pesan Anda:</span>
                    <textarea id="txtpesan" name="txtpesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
                     <small id="charCount">0/200 karakter</small> 
                </label>

                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
        </section>

        <section id="ipk">
            <?php
                $namaMatkul1 = "Algoritma dan Struktur Data";
                $namaMatkul2 = "Agama";
                $namaMatkul3 = "Konsep Basis Data";
                $namaMatkul4 = "Kalkulus";
                $namaMatkul5 = "Pemrograman Web Dasar";

                $sksMatkul1 = 4;
                $sksMatkul2 = 2;
                $sksMatkul3 = 3;
                $sksMatkul4 = 3;
                $sksMatkul5 = 3;

                $nilaiHadir1 = 90; $nilaiTugas1 = 60; $nilaiUTS1 = 80; $nilaiUAS1 = 70;
                $nilaiHadir2 = 70; $nilaiTugas2 = 50; $nilaiUTS2 = 60; $nilaiUAS2 = 80;
                $nilaiHadir3 = 80; $nilaiTugas3 = 80; $nilaiUTS3 = 80; $nilaiUAS3 = 90;
                $nilaiHadir4 = 90; $nilaiTugas4 = 75; $nilaiUTS4 = 80; $nilaiUAS4 = 85;
                $nilaiHadir5 = 69; $nilaiTugas5 = 80; $nilaiUTS5 = 90; $nilaiUAS5 = 100;

                function angkaMutu($grade){
                    switch ($grade) {
                        case "A": $angkaMutu = 4.00; break;
                        case "A-": $angkaMutu = 3.70; break;
                        case "B+": $angkaMutu = 3.30; break;
                        case "B": $angkaMutu = 3.00; break;
                        case "C+": $angkaMutu = 2.70; break;
                        case "C": $angkaMutu = 2.00; break;
                        case "D+": $angkaMutu = 1.70; break;
                        case "D": $angkaMutu = 1.00; break;
                        default: $angkaMutu = 0.00; break;
                }
                return $angkaMutu;
            }
                
                 
                $totalBobot = 0;
                $totalSks = 0;

                for ($i = 1; $i <= 5; $i++) {
                    ${"nilaiAkhir$i"} = round((0.1 * ${"nilaiHadir$i"}) + (0.2 * ${"nilaiTugas$i"}) + (0.3 * ${"nilaiUTS$i"}) + (0.4 * ${"nilaiUAS$i"}));

                if (${"nilaiHadir$i"} < 70) {
                    ${"grade$i"} = "E";
                } elseif (${"nilaiAkhir$i"} >= 91) {
                    ${"grade$i"} = "A";
                } elseif (${"nilaiAkhir$i"} >= 81) {
                    ${"grade$i"} = "A-";
                } elseif (${"nilaiAkhir$i"} >= 76) {
                    ${"grade$i"} = "B+";
                } elseif (${"nilaiAkhir$i"} >= 71) {
                    ${"grade$i"} = "B";
                } elseif (${"nilaiAkhir$i"} >= 66) {
                    ${"grade$i"} = "C+";
                } elseif (${"nilaiAkhir$i"} >= 61) {
                    ${"grade$i"} = "C";
                } elseif (${"nilaiAkhir$i"} >= 36) {
                    ${"grade$i"} = "D";
                } else {
                    ${"grade$i"} = "E";
                } 

                if (${"grade$i"} == "D" || ${"grade$i"} == "E") {
                    ${"status$i"} = "Gagal";
                } else {
                    ${"status$i"} = "Lulus";
                }

                $angkaMutu = angkaMutu(${"grade$i"});
                ${"bobot$i"} = $angkaMutu * ${"sksMatkul$i"};
                $totalBobot += ${"bobot$i"};
                $totalSks += ${"sksMatkul$i"};
                $ipk = $totalBobot / $totalSks; 

            }
            ?>

            <h2>Nilai Saya</h2>
            <?php 
            for ($i = 1; $i <= 5; $i++) { ?>
            <p><strong>Nama Matakuliah ke-<?php echo $i; ?>:</strong> <span><?php echo ${"namaMatkul$i"}; ?></span></p>
            <p><strong>SKS:</strong> <span> <?php echo ${"sksMatkul$i"};?></span></p>
            <p><strong>Kehadiran:</strong> <span><?php echo ${"nilaiHadir$i"}; ?></span></p>
            <p><strong>Tugas:</strong> <span><?php echo ${"nilaiTugas$i"}; ?></span></p>
            <p><strong>UTS:</strong> <span><?php echo ${"nilaiUTS$i"}; ?></span></p>
            <P><strong>UAS:</strong> <span><?php echo ${"nilaiUAS$i"}; ?></span></p>
            <p><strong>Nilai Akhir: <span></strong> <?php echo (${"nilaiAkhir$i"}); ?></span></p>
            <p><strong>Grade:</strong> <span><?php echo ${"grade$i"}; ?></span></p>
            <p><strong>Angka Mutu:</strong> <span><?php echo number_format(angkaMutu(${"grade$i"}), 2); ?></span></p>
            <p><strong>Bobot:</strong> <span><?php echo number_format (${"bobot$i"}, 2); ?></span></p>
            <p><strong>Status:</strong> <span><?php echo ${"status$i"}; ?></span></p>

            <?php 
            } 

            echo "<p><strong>Total Bobot: </strong>" . number_format($totalBobot, 2) . "</p>";
            echo "<p><strong>Total SKS: </strong>" . $totalSks . "</p>";
            echo "<p><strong>IPK: </strong>" . number_format($ipk, 2). "</p>";
        ?>
        </section>

    </main>
    <footer>
        <p>&copy; 2025 Chelsea Clarisa [2511500065]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>