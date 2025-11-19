<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru</title>
</head>
<body>

<header>
    <h3>Pendaftaran Siswa Baru</h3>
    <h1>SMK Coding</h1>
</header>

<nav>
    <ul>
        <li><a href="form-daftar.php">Daftar Baru</a></li>
        <li><a href="list-siswa.php">Lihat Pendaftar</a></li>
    </ul>
</nav>

<?php if(isset($_GET['status'])): ?>
<p>
    <?php
        if($_GET['status'] == 'sukses'){
            echo "Pendaftaran berhasil!";
        } else {
            echo "Pendaftaran gagal!";
        }
    ?>
</p>
<?php endif; ?>

</body>
</html>
