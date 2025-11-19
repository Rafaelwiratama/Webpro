<?php
include("config.php");

if( isset($_GET['id']) ){

    $id = intval($_GET['id']);

    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("Gagal menghapus: " . mysqli_error($db));
    }

} else {
    die("Akses dilarang...");
}
?>
