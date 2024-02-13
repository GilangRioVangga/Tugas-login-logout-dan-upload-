<?php include("config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<h1>PENDAFTARAN DATA SISWA</h1>
		<h3>DAFTARLAH SEBELUM TERLAMBAT</h3>
	</div>
	<br/>
    <h4>Menu</h4>
    <nav>
        <ul>
            <li><a href="index.php">Form daftar siswa</a></li>
            <li><a href="index2.php">Form daftar guru</a></li>
            <li><a href="data-upload.php">Data Upload</a></li>
            <li><a href="logout.php">Lougout</a></li>
        </ul>
    </nav>
        <?php if(isset($_GET['Daftar'])): ?>
    <p>
        <?php
            if($_GET['Daftar'] == 'sukses'){
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
<?php endif; ?>
    </body>
</html>