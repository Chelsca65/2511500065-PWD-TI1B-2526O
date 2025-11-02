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
            ?>

        </section>

    </main>
    <footer>
        <p>&copy; 2025 Chelsea Clarisa [2511500065]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>