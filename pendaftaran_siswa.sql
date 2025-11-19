CREATE DATABASE IF NOT EXISTS pendaftaran_siswa;
USE pendaftaran_siswa;

CREATE TABLE IF NOT EXISTS calon_siswa (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    agama VARCHAR(20) NOT NULL,
    sekolah_asal VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal)
VALUES ('Lia', 'Jl. Mangga No. 3, Mataram', 'perempuan', 'Islam', 'SMPN 32 Ampenan');
