<?php
require 'koneksi.php';

// ambil data dari form
$nis           = $_POST['nis'];
$nama          = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp          = $_POST['telp'];
$alamat        = $_POST['alamat'];

// data file foto
$namaFile   = $_FILES['foto']['name'];
$ukuranFile = $_FILES['foto']['size'];
$tmpFile    = $_FILES['foto']['tmp_name'];

$extValid = ['jpg', 'jpeg', 'png'];
$extFile  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

if (!in_array($extFile, $extValid)) {
    die("Ekstensi file tidak diperbolehkan. Hanya jpg/jpeg/png.
        <br><a href='form_simpan.php'>Kembali</a>");
}

if ($ukuranFile > 2 * 1024 * 1024) { // 2MB
    die("Ukuran file terlalu besar (maksimal 2MB).
        <br><a href='form_simpan.php'>Kembali</a>");
}

// buat nama file baru supaya unik
$namaBaru = date('YmdHis') . '_' . mt_rand(100, 999) . '.' . $extFile;
$tujuan   = 'images/' . $namaBaru;

// pindahkan file ke folder images
if (!move_uploaded_file($tmpFile, $tujuan)) {
    die("Gagal mengupload file.
        <br><a href='form_simpan.php'>Kembali</a>");
}

// simpan ke database
$sql = "INSERT INTO siswa (nis, nama, jenis_kelamin, telp, alamat, foto)
        VALUES (:nis, :nama, :jk, :telp, :alamat, :foto)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nis'    => $nis,
    ':nama'   => $nama,
    ':jk'     => $jenis_kelamin,
    ':telp'   => $telp,
    ':alamat' => $alamat,
    ':foto'   => $namaBaru
]);

header('Location: index.php');
exit;
