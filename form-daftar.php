<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
</head>
<body>

<h3>Formulir Pendaftaran Siswa Baru</h3>

<form action="proses-pendaftaran.php" method="POST">

<p>Nama: <input type="text" name="nama" /></p>

<p>Alamat: <textarea name="alamat"></textarea></p>

<p>Jenis Kelamin:
    <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
    <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
</p>

<p>Agama:
    <select name="agama">
        <option>Islam</option>
        <option>Kristen</option>
        <option>Hindu</option>
        <option>Budha</option>
        <option>Atheis</option>
    </select>
</p>

<p>Sekolah Asal: <input type="text" name="sekolah_asal" /></p>

<p><input type="submit" name="daftar" value="Daftar" /></p>

</form>

</body>
</html>
