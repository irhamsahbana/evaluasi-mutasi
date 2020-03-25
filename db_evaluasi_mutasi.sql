-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2020 pada 07.49
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
-- Struktur dari tabel `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `id_administrator` int(15) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_administrator` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `business_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_approval_committee`
--

CREATE TABLE `tb_approval_committee` (
  `id_approval` int(15) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_approval` varchar(100) NOT NULL,
  `file_ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_approvement`
--

CREATE TABLE `tb_approvement` (
  `id_usulan` int(15) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_approval` int(15) NOT NULL,
  `approvement` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_business_area`
--

CREATE TABLE `tb_business_area` (
  `business_area` varchar(250) NOT NULL,
  `nama_business_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_sebutan_jabatan` int(15) NOT NULL,
  `sebutan_jabatan` text NOT NULL,
  `personnel_subarea` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_judul_talenta`
--

CREATE TABLE `tb_judul_talenta` (
  `id_talenta` int(15) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(15) NOT NULL,
  `pers_no` varchar(15) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `personnel_subarea` varchar(250) NOT NULL,
  `org_unit` varchar(15) NOT NULL,
  `organizational_unit` varchar(100) NOT NULL,
  `position` varchar(15) NOT NULL,
  `nama_panjang_posisi` varchar(100) NOT NULL,
  `jenjang_main_grp` varchar(50) NOT NULL,
  `jenjang_sub_grp` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `tgl_grade` datetime NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_sebutan_jabatan` int(15) NOT NULL,
  `talenta_tiga_semester_lalu` varchar(5) NOT NULL,
  `talenta_dua_semester_lalu` varchar(5) NOT NULL,
  `talenta_semester_lalu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_personnel_area`
--

CREATE TABLE `tb_personnel_area` (
  `personnel_subarea` varchar(250) NOT NULL,
  `nama_personnel_subarea` varchar(250) NOT NULL,
  `business_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_posisi_approval_committee`
--

CREATE TABLE `tb_posisi_approval_committee` (
  `id_posisi` int(15) NOT NULL,
  `posisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan_evaluasi`
--

CREATE TABLE `tb_usulan_evaluasi` (
  `id_usulan` int(15) NOT NULL,
  `id_administrator` int(15) NOT NULL,
  `tgl_usulan` datetime NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `status_usulan` varchar(25) NOT NULL,
  `alasan_ditolak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan_evaluasi_approval`
--

CREATE TABLE `tb_usulan_evaluasi_approval` (
  `id_usulan` int(15) NOT NULL,
  `id_approval` int(15) NOT NULL,
  `id_posisi` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indeks untuk tabel `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`id_administrator`),
  ADD KEY `nip` (`nip`),
  ADD KEY `business_area` (`business_area`);

--
-- Indeks untuk tabel `tb_approval_committee`
--
ALTER TABLE `tb_approval_committee`
  ADD PRIMARY KEY (`id_approval`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `tb_approvement`
--
ALTER TABLE `tb_approvement`
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_approval` (`id_approval`);

--
-- Indeks untuk tabel `tb_business_area`
--
ALTER TABLE `tb_business_area`
  ADD PRIMARY KEY (`business_area`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_sebutan_jabatan`),
  ADD KEY `personnel_subarea` (`personnel_subarea`);

--
-- Indeks untuk tabel `tb_judul_talenta`
--
ALTER TABLE `tb_judul_talenta`
  ADD PRIMARY KEY (`id_talenta`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `personnel_subarea` (`personnel_subarea`),
  ADD KEY `id_sebutan_jabatan` (`id_sebutan_jabatan`);

--
-- Indeks untuk tabel `tb_personnel_area`
--
ALTER TABLE `tb_personnel_area`
  ADD PRIMARY KEY (`personnel_subarea`),
  ADD KEY `business_area` (`business_area`);

--
-- Indeks untuk tabel `tb_posisi_approval_committee`
--
ALTER TABLE `tb_posisi_approval_committee`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indeks untuk tabel `tb_usulan_evaluasi`
--
ALTER TABLE `tb_usulan_evaluasi`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_administrator` (`id_administrator`);

--
-- Indeks untuk tabel `tb_usulan_evaluasi_approval`
--
ALTER TABLE `tb_usulan_evaluasi_approval`
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `id_approval` (`id_approval`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indeks untuk tabel `tb_usulan_evaluasi_pegawai`
--
ALTER TABLE `tb_usulan_evaluasi_pegawai`
  ADD KEY `id_usulan` (`id_usulan`),
  ADD KEY `nip` (`nip`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD CONSTRAINT `tb_administrator_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`),
  ADD CONSTRAINT `tb_administrator_ibfk_2` FOREIGN KEY (`business_area`) REFERENCES `tb_business_area` (`business_area`);

--
-- Ketidakleluasaan untuk tabel `tb_approval_committee`
--
ALTER TABLE `tb_approval_committee`
  ADD CONSTRAINT `tb_approval_committee_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `tb_approvement`
--
ALTER TABLE `tb_approvement`
  ADD CONSTRAINT `tb_approvement_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `tb_usulan_evaluasi` (`id_usulan`),
  ADD CONSTRAINT `tb_approvement_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`),
  ADD CONSTRAINT `tb_approvement_ibfk_3` FOREIGN KEY (`id_approval`) REFERENCES `tb_approval_committee` (`id_approval`);

--
-- Ketidakleluasaan untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD CONSTRAINT `tb_jabatan_ibfk_1` FOREIGN KEY (`personnel_subarea`) REFERENCES `tb_personnel_area` (`personnel_subarea`);

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`personnel_subarea`) REFERENCES `tb_personnel_area` (`personnel_subarea`),
  ADD CONSTRAINT `tb_pegawai_ibfk_2` FOREIGN KEY (`id_sebutan_jabatan`) REFERENCES `tb_jabatan` (`id_sebutan_jabatan`);

--
-- Ketidakleluasaan untuk tabel `tb_personnel_area`
--
ALTER TABLE `tb_personnel_area`
  ADD CONSTRAINT `tb_personnel_area_ibfk_1` FOREIGN KEY (`business_area`) REFERENCES `tb_business_area` (`business_area`);

--
-- Ketidakleluasaan untuk tabel `tb_usulan_evaluasi`
--
ALTER TABLE `tb_usulan_evaluasi`
  ADD CONSTRAINT `tb_usulan_evaluasi_ibfk_1` FOREIGN KEY (`id_administrator`) REFERENCES `tb_administrator` (`id_administrator`);

--
-- Ketidakleluasaan untuk tabel `tb_usulan_evaluasi_approval`
--
ALTER TABLE `tb_usulan_evaluasi_approval`
  ADD CONSTRAINT `tb_usulan_evaluasi_approval_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `tb_usulan_evaluasi` (`id_usulan`),
  ADD CONSTRAINT `tb_usulan_evaluasi_approval_ibfk_2` FOREIGN KEY (`id_approval`) REFERENCES `tb_approval_committee` (`id_approval`),
  ADD CONSTRAINT `tb_usulan_evaluasi_approval_ibfk_3` FOREIGN KEY (`id_posisi`) REFERENCES `tb_posisi_approval_committee` (`id_posisi`);

--
-- Ketidakleluasaan untuk tabel `tb_usulan_evaluasi_pegawai`
--
ALTER TABLE `tb_usulan_evaluasi_pegawai`
  ADD CONSTRAINT `tb_usulan_evaluasi_pegawai_ibfk_1` FOREIGN KEY (`id_usulan`) REFERENCES `tb_usulan_evaluasi` (`id_usulan`),
  ADD CONSTRAINT `tb_usulan_evaluasi_pegawai_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
