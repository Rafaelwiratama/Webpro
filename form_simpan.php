<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
</head>
<body>

<h2>Tambah Data Siswa</h2>

<form action="proses_simpan.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><input type="text" name="nis" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <label>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </label>
            </td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><input type="text" name="telp" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" rows="3" cols="30" required></textarea></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td>
                <input type="file" name="foto" accept="image/*" required>
                <br><small>Upload pas foto 3x4 (jpg/jpeg/png, maks 2MB).</small>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <br>
                <input type="submit" value="Simpan">
                <input type="button" value="Batal" onclick="window.location='index.php'">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
