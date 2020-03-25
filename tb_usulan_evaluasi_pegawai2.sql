-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2020 pada 09.18
-- Versi server: 10.4.6-MariaDB-log
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaluasi_mutasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan_evaluasi_pegawai`
--

CREATE TABLE `tb_usulan_evaluasi_pegawai` (
  `id_usulan` int(15) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_usulan_evaluasi_pegawai`
--
ALTER TABLE `tb_usulan_evaluasi_pegawai`
  ADD KEY `tb_usulan_evaluasi_pegawai_ibfk_1` (`id_usulan`),
  ADD KEY `tb_usulan_evaluasi_pegawai_ibfk_2` (`nip`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_usulan_evaluasi_pegawai`
--
ALTER TABLE `tb_usulan_evaluasi_pegawai`
  ADD CONSTRAINT `tb_usulan_evaluasi_pegawai_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `tb_usulan_evaluasi` (`id_usulan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usulan_evaluasi_pegawai_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
