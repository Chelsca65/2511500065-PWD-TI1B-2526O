<?php
session_start();

$sesnama = "";
if (isset($_SESSION["nama"])):
  $sesnama = $_SESSION["nama"];
endif;

$sesemail = "";
if (isset($_SESSION["email"])):
  $sesemail = $_SESSION["email"];
endif;

$sespesan= "";
if (isset($_SESSION["pesan"])):
  $sespesan = $_SESSION["pesan"];
endif;

$sesnim = "";
if (isset($_SESSION["nim"])):
  $sesnim = $_SESSION["nim"];
endif;

$sesNama = "";
if (isset($_SESSION["Nama"])):
  $sesNama = $_SESSION["Nama"];
endif;

$sestempat = "";
if (isset($_SESSION["tempat"])):
  $sestempat = $_SESSION["tempat"];
endif;

$sestanggal = "";
if (isset($_SESSION["tanggal"])):
  $sestanggal = $_SESSION["tanggal"];
endif;

$seshobi = "";
if (isset($_SESSION["hobi"])):
  $seshobi = $_SESSION["hobi"];
endif;

$sespasangan = "";
if (isset($_SESSION["pasangan"])):
  $sespasangan = $_SESSION["pasangan"];
endif;

$sespekerjaan = "";
if (isset($_SESSION["pekerjaan"])):
  $sespekerjaan = $_SESSION["pekerjaan"];
endif;

$sesortu = "";
if (isset($_SESSION["ortu"])):
  $sesortu = $_SESSION["ortu"];
endif;

$seskakak = "";
if (isset($_SESSION["kakak"])):
  $seskakak = $_SESSION["kakak"];
endif;

$sesadik = "";
if (isset($_SESSION["adik"])):
  $sesadik = $_SESSION["adik"];
endif;
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
        <li><a href="#data">Entry Data Mahasiswa</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>


    <section id="data">
     <h2>Entry Data Mahasiswa</h2> 

     <form action="proses.php" method="POST">

      <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="userid">
        </label>

           <label for="txtNama"><span>Nama Lengkap:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama Lengkap" required autocomplete="name">
        </label>

             <label for="txtTempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLahir" name="txtTempatLahir" placeholder="Masukkan Tempat Lahir" required autocomplete="city">
        </label>

           <label for="txtTanggalLahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTanggalLahir" name="txtTanggalLahir" placeholder="Masukkan Tanggal Lahir" required autocomplete="bday">
        </label>

         <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required autocomplete="Hobby">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Nama Pasangan" required autocomplete="love">
        </label>

                <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" required autocomplete="work">
        </label>

            <label for="txtOrtu"><span>Nama Orangtua:</span>
          <input type="text" id="txtOrtu" name="txtOrtu" placeholder="Masukkan Nama Orang Tua" required autocomplete="parent">
        </label>

         <label for="txtKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtKakak" name="txtKakak" placeholder="Masukkan Nama Kakak" required autocomplete="sibling">
        </label>

                <label for="txtAdik"><span>Nama Adik:</span>
          <input type="text" id="txtAdik" name="txtAdik" placeholder="Masukkan Nama Adik" required autocomplete="sibling">
        </label>

          <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

</section>


    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?php echo $sesnim; ?></p>
      <p><strong>Nama Lengkap:</strong> <?php echo $sesNama; ?></p>
      <p><strong>Tempat Lahir:</strong> <?php echo $sestempat; ?></p>
      <p><strong>Tanggal Lahir:</strong><?php echo $sestanggal; ?></p>
      <p><strong>Hobi:</strong><?php echo $seshobi; ?></p>
      <p><strong>Pasangan:</strong><?php echo $sespasangan; ?> </p>
      <p><strong>Pekerjaan:</strong> <?php echo $sespekerjaan; ?> </p>
      <p><strong>Nama Orang Tua:</strong><?php echo $sesortu; ?> </p>
      <p><strong>Nama Kakak:</strong> <?php echo $seskakak; ?></p>
      <p><strong>Nama Adik:</strong> <?php echo $sesadik; ?></p>
     
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>