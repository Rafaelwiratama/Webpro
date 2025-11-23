<?php
require 'koneksi.php';

$stmt = $pdo->query("SELECT * FROM siswa ORDER BY id DESC");
$siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>

<h2>Data Siswa</h2>
<p><a href="form_simpan.php">Tambah Data</a></p>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    <?php if (count($siswa) === 0): ?>
        <tr><td colspan="7" align="center">Belum ada data</td></tr>
    <?php else: foreach ($siswa as $row): ?>
        <tr>
            <td><img src="images/<?= htmlspecialchars($row['foto']) ?>" width="70"></td>
            <td><?= htmlspecialchars($row['nis']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
            <td><?= htmlspecialchars($row['telp']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
            <td>
                <a href="form_ubah.php?id=<?= $row['id'] ?>">Ubah</a> |
                <a href="proses_hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?');">Hapus</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>
</table>

</body>
</html>
