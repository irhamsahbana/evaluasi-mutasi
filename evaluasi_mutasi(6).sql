-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2020 pada 10.14
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
-- Database: `evaluasi_mutasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `password_admin` varchar(40) NOT NULL,
  `last_login_admin` datetime DEFAULT NULL,
  `status_admin` varchar(50) NOT NULL,
  `foto_admin` varchar(50) NOT NULL,
  `nama_lengkap_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `last_login_admin`, `status_admin`, `foto_admin`, `nama_lengkap_admin`) VALUES
(1, 'irhamsahbana', '30a838bd52aaf321806e03924ad94c3e', '2020-03-09 04:03:14', 'super_admin', '', 'Irham Sahbana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `id_administrator` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL,
  `nama_administrator` varchar(25) NOT NULL,
  `business_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_approval_committee`
--

CREATE TABLE `tb_approval_committee` (
  `id_approval` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL,
  `nama_approval` varchar(100) NOT NULL,
  `file_ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_approvement`
--

CREATE TABLE `tb_approvement` (
  `id_usulan` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_approval` varchar(100) NOT NULL,
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

--
-- Dumping data untuk tabel `tb_business_area`
--

INSERT INTO `tb_business_area` (`business_area`, `nama_business_area`) VALUES
('UIW001', 'UIW Sulselrabar'),
('UP3001', 'UP3 Palopo'),
('UP3002', 'UP3 Pinrang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_sebutan_jabatan` varchar(100) NOT NULL,
  `sebutan_jabatan` text NOT NULL,
  `personnel_subarea` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_judul_talenta`
--

CREATE TABLE `tb_judul_talenta` (
  `id_talenta` varchar(100) NOT NULL,
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
  `tgl_grade` date NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_sebutan_jabatan` varchar(100) NOT NULL,
  `talenta_tiga_semester_lalu` varchar(5) NOT NULL,
  `talenta_dua_semester_lalu` varchar(5) NOT NULL,
  `talenta_semester_lalu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `pers_no`, `nama_pegawai`, `personnel_subarea`, `org_unit`, `organizational_unit`, `position`, `nama_panjang_posisi`, `jenjang_main_grp`, `jenjang_sub_grp`, `grade`, `tgl_grade`, `pendidikan_terakhir`, `gender`, `email`, `tgl_masuk`, `agama`, `no_telp`, `id_sebutan_jabatan`, `talenta_tiga_semester_lalu`, `talenta_dua_semester_lalu`, `talenta_semester_lalu`) VALUES
('6401007P', '64017600', 'AMIR', 'ULP001', '10069013', 'SIE TE', '37413727', 'ASSISTANT ENGINEER PENYAMBUNGAN DAN PEMUTUSAN', 'Fungsional', 'Fungsional V', 'SPE04', '2018-01-01', 'STM', 'Male', 'AMIR007@PLN.CO.ID', '2001-10-01', 'Islam', '081241314815', '', '', '', ''),
('6483084F', '64837601', 'JUFRI D', 'ULP002', '15845307', 'ULP PEKKABATA', '37423009', 'ANALYST KINERJA', 'Fungsional', 'Fungsional IV', 'SYS04', '2019-01-01', 'S1 Non Teknik', 'Male', 'JUFRI.D@PLN.CO.ID', '1983-08-01', 'Islam', '08124162212', '', '', '', ''),
('6483113F', '64837603', 'MUHAMMAD RIZAL', 'UIW001', '17400702', 'SBI REN POLA OP DAN HAR SIS DIST', '30272190', 'ENGINEER PERENCANAAN KONSTRUKSI DAN TEKNIK DISTRIBUSI', 'Fungsional', 'Fungsional IV', 'SYS01', '2014-01-01', 'S1 Teknik', 'Male', 'MUHAMMAD.RIZAL2@PLN.CO.ID', '1983-10-01', 'Islam', '081222229020', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_personnel_area`
--

CREATE TABLE `tb_personnel_area` (
  `personnel_subarea` varchar(250) NOT NULL,
  `nama_personnel_subarea` varchar(250) NOT NULL,
  `business_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_personnel_area`
--

INSERT INTO `tb_personnel_area` (`personnel_subarea`, `nama_personnel_subarea`, `business_area`) VALUES
('UIW001', 'UIW SULSELRABAR', 'UIW001'),
('ULP001', 'ULP MASAMBA', 'UP3001'),
('ULP002', 'ULP PEKKABATA', 'UP3002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_posisi_approval_committee`
--

CREATE TABLE `tb_posisi_approval_committee` (
  `id_posisi` varchar(100) NOT NULL,
  `posisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan_evaluasi`
--

CREATE TABLE `tb_usulan_evaluasi` (
  `id_usulan` varchar(100) NOT NULL,
  `id_administrator` varchar(100) NOT NULL,
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
  `id_usulan` varchar(100) NOT NULL,
  `id_approval` varchar(100) NOT NULL,
  `id_posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usulan_evaluasi_pegawai`
--

CREATE TABLE `tb_usulan_evaluasi_pegawai` (
  `id_usulan` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `password_user` varchar(40) NOT NULL,
  `last_login_user` datetime DEFAULT NULL,
  `status_user` varchar(50) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `fullname_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `password_user`, `last_login_user`, `status_user`, `foto_user`, `fullname_user`) VALUES
(1, 'irhamsahbana', '30a838bd52aaf321806e03924ad94c3e', NULL, 'maintainer', '', 'Irham Sahbana'),
(5, 'sdvs', 'sfd', NULL, 'A', '', 'sdvsdas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`id_administrator`);

--
-- Indeks untuk tabel `tb_approval_committee`
--
ALTER TABLE `tb_approval_committee`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indeks untuk tabel `tb_business_area`
--
ALTER TABLE `tb_business_area`
  ADD PRIMARY KEY (`business_area`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_sebutan_jabatan`);

--
-- Indeks untuk tabel `tb_judul_talenta`
--
ALTER TABLE `tb_judul_talenta`
  ADD PRIMARY KEY (`id_talenta`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_personnel_area`
--
ALTER TABLE `tb_personnel_area`
  ADD PRIMARY KEY (`personnel_subarea`);

--
-- Indeks untuk tabel `tb_posisi_approval_committee`
--
ALTER TABLE `tb_posisi_approval_committee`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indeks untuk tabel `tb_usulan_evaluasi`
--
ALTER TABLE `tb_usulan_evaluasi`
  ADD PRIMARY KEY (`id_usulan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
