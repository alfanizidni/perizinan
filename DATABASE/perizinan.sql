-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2021 pada 11.19
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perizinan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_training`
--

CREATE TABLE `tbl_training` (
  `id_training` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_izin` varchar(25) NOT NULL,
  `jarak_izin` varchar(20) NOT NULL,
  `lama_izin` varchar(20) NOT NULL,
  `pelanggaran` varchar(20) NOT NULL,
  `terlambat_kembali` varchar(20) NOT NULL,
  `nilai_rapor` varchar(20) NOT NULL,
  `status_izin` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_training`
--

INSERT INTO `tbl_training` (`id_training`, `nama`, `jenis_izin`, `jarak_izin`, `lama_izin`, `pelanggaran`, `terlambat_kembali`, `nilai_rapor`, `status_izin`) VALUES
(144, 'Bambang Wijaya', 'Sakit', 'Jauh', 'Sedang', 'Tidak Pernah', 'Pernah', 'Cukup', 'Ya'),
(145, 'Yasril Maulana Ishaq', 'Acara Keluarga', 'Jauh', 'Lama', 'Ringan', 'Pernah', 'Baik', 'Tidak'),
(146, 'Ivan Budi Laksono', 'Sakit', 'Sangat Jauh', 'Lama', 'Sedang', 'Tidak Pernah', 'Kurang', 'Ya'),
(147, 'M. A\'lal Fikri', 'Dll(Menghadiri Undangan A', 'Jauh', 'Sedang', 'Ringan', 'Sering', 'Baik', 'Ya'),
(148, 'Angga Irawanto', 'Kifayah Kakek/Nenek', 'Sangat Jauh', 'Lama', 'Tidak Pernah', 'Pernah', 'Kurang', 'Ya'),
(149, 'M.Dzikrullah', 'Sakit', 'Sangat Jauh', 'Sedang', 'Berat', 'Sering', 'Kurang', 'Tidak'),
(150, 'Ahmad Zainuri', 'Mengurus Surat Diri', 'Dekat', 'Sebentar', 'Tidak Pernah', 'Tidak Pernah', 'Cukup', 'Ya'),
(151, 'M. Ramli Firdaus', 'Berobat Ringan', 'Dekat', 'Sebentar', 'Tidak Pernah', 'Pernah', 'Sangat Baik', 'Tidak'),
(152, 'Andika Syafarullah M B', 'Acara Keluarga', 'Jauh', 'Lama', 'Ringan', 'Pernah', 'Cukup', 'Tidak'),
(153, 'M. Feri Ferdianto', 'Berobat Ringan', 'Dekat', 'Sedang', 'Sedang', 'Pernah', 'Sangat Baik', 'Ya'),
(154, 'Abdul Hadi', 'Sakit', 'Jauh', 'Lama', 'Sedang', 'Tidak Pernah', 'Baik', 'Tidak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`id_training`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `id_training` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
