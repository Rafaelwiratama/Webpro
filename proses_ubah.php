<?php
require 'koneksi.php';

$id            = (int) $_POST['id'];
$nis           = $_POST['nis'];
$nama          = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp          = $_POST['telp'];
$alamat        = $_POST['alamat'];
$fotoLama      = $_POST['foto_lama'];

$fotoBaru = $fotoLama;

// cek apakah user upload foto baru
if (!empty($_FILES['foto']['name'])) {

    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpFile    = $_FILES['foto']['tmp_name'];

    $extValid = ['jpg', 'jpeg', 'png'];
    $extFile  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($extFile, $extValid)) {
        die("Ekstensi file tidak diperbolehkan. Hanya jpg/jpeg/png.
            <br><a href='form_ubah.php?id=$id'>Kembali</a>");
    }

    if ($ukuranFile > 2 * 1024 * 1024) {
        die("Ukuran file terlalu besar (maksimal 2MB).
            <br><a href='form_ubah.php?id=$id'>Kembali</a>");
    }

    $namaBaru = date('YmdHis') . '_' . mt_rand(100, 999) . '.' . $extFile;
    $tujuan   = 'images/' . $namaBaru;

    if (!move_uploaded_file($tmpFile, $tujuan)) {
        die("Gagal mengupload file.
            <br><a href='form_ubah.php?id=$id'>Kembali</a>");
    }

    // hapus foto lama jika ada
    if ($fotoLama && file_exists('images/' . $fotoLama)) {
        unlink('images/' . $fotoLama);
    }

    $fotoBaru = $namaBaru;
}

// update data ke database
$sql = "UPDATE siswa
        SET nis = :nis,
            nama = :nama,
            jenis_kelamin = :jk,
            telp = :telp,
            alamat = :alamat,
            foto = :foto
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nis'   => $nis,
    ':nama'  => $nama,
    ':jk'    => $jenis_kelamin,
    ':telp'  => $telp,
    ':alamat'=> $alamat,
    ':foto'  => $fotoBaru,
    ':id'    => $id
]);

header('Location: index.php');
exit;
