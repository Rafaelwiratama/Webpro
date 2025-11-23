<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = (int) $_GET['id'];

// ambil data dulu untuk tau nama file foto
$stmt = $pdo->prepare("SELECT foto FROM siswa WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data) {
    $foto = $data['foto'];

    // hapus data di database
    $del = $pdo->prepare("DELETE FROM siswa WHERE id = :id");
    $del->execute([':id' => $id]);

    // hapus file foto jika ada
    if ($foto && file_exists('images/' . $foto)) {
        unlink('images/' . $foto);
    }
}

header('Location: index.php');
exit;
