<?php
include("config.php");

if(isset($_POST['simpan'])){

    $id = intval($_POST['id']);
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $jk = mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($db, $_POST['agama']);
    $sekolah = mysqli_real_escape_string($db, $_POST['sekolah_asal']);

    $sql = "UPDATE calon_siswa SET
                nama='$nama',
                alamat='$alamat',
                jenis_kelamin='$jk',
                agama='$agama',
                sekolah_asal='$sekolah'
            WHERE id=$id";

    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: list-siswa.php');
    } else {
        die("Gagal menyimpan perubahan: " . mysqli_error($db));
    }

} else {
    die("Akses dilarang...");
}
?>
