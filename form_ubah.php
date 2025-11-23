<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM siswa WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Siswa</title>
</head>
<body>

<h2>Ubah Data Siswa</h2>

<form action="proses_ubah.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($data['foto']) ?>">
    <table>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><input type="text" name="nis" value="<?= htmlspecialchars($data['nis']) ?>" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <label>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki"
                        <?= $data['jenis_kelamin']=='Laki-laki'?'checked':''; ?>> Laki-laki
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" value="Perempuan"
                        <?= $data['jenis_kelamin']=='Perempuan'?'checked':''; ?>> Perempuan
                </label>
            </td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><input type="text" name="telp" value="<?= htmlspecialchars($data['telp']) ?>" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <textarea name="alamat" rows="3" cols="30" required><?= htmlspecialchars($data['alamat']) ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Foto Sekarang</td>
            <td>:</td>
            <td>
                <img src="images/<?= htmlspecialchars($data['foto']) ?>" width="70"><br>
                <small>Biarkan kosong jika tidak ingin ganti foto.</small>
            </td>
        </tr>
        <tr>
            <td>Ganti Foto</td>
            <td>:</td>
            <td><input type="file" name="foto" accept="image/*"></td>
        </tr>
        <tr>
            <td colspan="3">
                <br>
                <input type="submit" value="Update">
                <input type="button" value="Batal" onclick="window.location='index.php'">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
