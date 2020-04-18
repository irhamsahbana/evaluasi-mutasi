-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 05:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `last_login_admin`, `status_admin`, `foto_admin`, `nama_lengkap_admin`) VALUES
(1, 'irhamsahbana', '30a838bd52aaf321806e03924ad94c3e', '2020-03-09 04:03:14', 'super_admin', '', 'Irham Sahbana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `id_administrator` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama_administrator` varchar(255) NOT NULL,
  `business_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_approval_committee`
--

CREATE TABLE `tb_approval_committee` (
  `id_approval` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama_approval` varchar(255) NOT NULL,
  `file_ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_approvement`
--

CREATE TABLE `tb_approvement` (
  `id_usulan` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `id_approval` varchar(255) NOT NULL,
  `approvement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_area`
--

CREATE TABLE `tb_business_area` (
  `business_area` varchar(255) NOT NULL,
  `nama_business_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_area`
--

INSERT INTO `tb_business_area` (`business_area`, `nama_business_area`) VALUES
('7401', 'UIW SULSELRABAR'),
('7412', 'UP3 PAREPARE'),
('7413', 'UP3 WATAMPONE'),
('7414', 'UP3 KENDARI'),
('7415', 'UP3 PINRANG'),
('7416', 'UP3 PALOPO'),
('7417', 'UP3 BULUKUMBA'),
('7418', 'UP3 BAUBAU'),
('7419', 'UP3 MAMUJU'),
('7424', 'UP2D MAKASSAR'),
('7427', 'UP3 MAKASSAR UTARA'),
('7428', 'UP3 MAKASSAR SELATAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_sebutan_jabatan` varchar(255) NOT NULL,
  `urutan_dalam_org` int(5) NOT NULL,
  `sebutan_jabatan` text NOT NULL,
  `personnel_subarea` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul_talenta`
--

CREATE TABLE `tb_judul_talenta` (
  `id_talenta` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_talenta_pegawai`
--

CREATE TABLE `tb_nilai_talenta_pegawai` (
  `tahun_talenta` int(5) NOT NULL,
  `semester_talenta` int(5) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nilai_talenta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(255) NOT NULL,
  `pers_no` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `personnel_subarea` varchar(255) NOT NULL,
  `org_unit` varchar(255) NOT NULL,
  `organizational_unit` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `nama_panjang_posisi` varchar(255) NOT NULL,
  `jenjang_main_grp` varchar(255) NOT NULL,
  `jenjang_sub_grp` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `tgl_grade` date NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `id_sebutan_jabatan` varchar(255) NOT NULL,
  `talenta_tiga_semester_lalu` varchar(255) NOT NULL,
  `talenta_dua_semester_lalu` varchar(255) NOT NULL,
  `talenta_semester_lalu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_personnel_area`
--

CREATE TABLE `tb_personnel_area` (
  `personnel_subarea` varchar(255) NOT NULL,
  `nama_personnel_subarea` varchar(255) NOT NULL,
  `business_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_personnel_area`
--

INSERT INTO `tb_personnel_area` (`personnel_subarea`, `nama_personnel_subarea`, `business_area`) VALUES
('UIW-SULSELRABAR', 'UIW SULSELRABAR', '7401'),
('ULP-BANTAENG', 'ULP BANTAENG', '7417'),
('ULP-BAUBAU-KOTA', 'ULP BAUBAU KOTA', '7418'),
('ULP-BELOPA', 'ULP BELOPA', '7416'),
('ULP-BENUBENUA', 'ULP BENUBENUA', '7414'),
('ULP-BOMBANA', 'ULP BOMBANA', '7414'),
('ULP-DAYA', 'ULP DAYA', '7427'),
('ULP-ENREKANG', 'ULP ENREKANG', '7415'),
('ULP-HASANUDDIN', 'ULP HASANUDDIN', '7413'),
('ULP-JENEPONTO', 'ULP JENEPONTO', '7417'),
('ULP-KALEBAJENG', 'ULP KALEBAJENG', '7428'),
('ULP-KALUMPANG', 'ULP KALUMPANG', '7417'),
('ULP-KAREBOSI', 'ULP KAREBOSI', '7427'),
('ULP-KARIANGO', 'ULP KARIANGO', '7415'),
('ULP-KOLAKA', 'ULP KOLAKA', '7414'),
('ULP-KOLAKA-UTARA', 'ULP KOLAKA UTARA', '7414'),
('ULP-KONAWE-SELATAN', 'ULP KONAWE SELATAN', '7414'),
('ULP-LAKAWAN', 'ULP LAKAWAN', '7415'),
('ULP-MAJENE', 'ULP MAJENE', '7419'),
('ULP-MAKALE', 'ULP MAKALE', '7416'),
('ULP-MALILI', 'ULP MALILI', '7416'),
('ULP-MALINO', 'ULP MALINO', '7428'),
('ULP-MAMASA', 'ULP MAMASA', '7419'),
('ULP-MANAKARRA', 'ULP MANAKARRA', '7419'),
('ULP-MAROS', 'ULP MAROS', '7427'),
('ULP-MASAMBA', 'ULP MASAMBA', '7416'),
('ULP-MATTIROTASI', 'ULP MATTIROTASI', '7412'),
('ULP-MATTOANGING', 'ULP MATTOANGING', '7428'),
('ULP-MAWASANGKA', 'ULP MAWASANGKA', '7418'),
('ULP-PAJALESANG', 'ULP PAJALESANG', '7412'),
('ULP-PALOPO-KOTA', 'ULP PALOPO KOTA', '7416'),
('ULP-PANAKKUKANG', 'ULP PANAKKUKANG', '7428'),
('ULP-PANGKEP', 'ULP PANGKEP', '7427'),
('ULP-PANGSID', 'ULP PANGSID', '7412'),
('ULP-PANRITA-LOPI', 'ULP PANRITA LOPI', '7417'),
('ULP-PARIA', 'ULP PARIA', '7413'),
('ULP-PASANGKAYU', 'ULP PASANGKAYU', '7419'),
('ULP-PASAR-WAJO', 'ULP PASAR WAJO', '7418'),
('ULP-PATANGKAI', 'ULP PATANGKAI', '7413'),
('ULP-PEKKABATA', 'ULP PEKKABATA', '7415'),
('ULP-POLEWALI', 'ULP POLEWALI', '7419'),
('ULP-RAHA', 'ULP RAHA', '7418'),
('ULP-RANTEPAO', 'ULP RANTEPAO', '7416'),
('ULP-RAPPANG', 'ULP RAPPANG', '7412'),
('ULP-SELAYAR', 'ULP SELAYAR', '7417'),
('ULP-SENGKANG', 'ULP SENGKANG', '7413'),
('ULP-SINJAI', 'ULP SINJAI', '7417'),
('ULP-SUNGGUMINASA', 'ULP SUNGGUMINASA', '7428'),
('ULP-TAKALAR', 'ULP TAKALAR', '7428'),
('ULP-TANETE', 'ULP TANETE', '7417'),
('ULP-TANRU-TEDDONG', 'ULP TANRU TEDDONG', '7412'),
('ULP-TELLU-BOCCOE', 'ULP TELLU BOCCOE', '7413'),
('ULP-TOMONI', 'ULP TOMONI', '7416'),
('ULP-ULOE', 'ULP ULOE', '7413'),
('ULP-UNAAHA', 'ULP UNAAHA', '7414'),
('ULP-WANGI-WANGI', 'ULP WANGI-WANGI', '7418'),
('ULP-WATAN-SOPPENG', 'ULP WATAN SOPPENG', '7412'),
('ULP-WATANG-SAWITTO', 'ULP WATANG SAWITTO', '7415'),
('ULP-WONOMULYO', 'ULP WONOMULYO', '7419'),
('ULP-WUA-WUA', 'ULP WUA-WUA', '7414'),
('UP2D-MAKASSAR', 'UP2D MAKASSAR', '7424'),
('UP2K-SULAWESI-BARAT', 'UP2K SULAWESI BARAT', '7419'),
('UP2K-SULAWESI-SELATAN', 'UP2K SULAWESI SELATAN', '7401'),
('UP2K-SULAWESI-TENGGARA', 'UP2K SULAWESI TENGGARA', '7414'),
('UP3-BAUBAU', 'UP3 BAUBAU', '7418'),
('UP3-BULUKUMBA', 'UP3 BULUKUMBA', '7417'),
('UP3-KENDARI', 'UP3 KENDARI', '7414'),
('UP3-MAKASSAR-SELATAN', 'UP3 MAKASSAR SELATAN', '7428'),
('UP3-MAKASSAR-UTARA', 'UP3 MAKASSAR UTARA', '7427'),
('UP3-MAMUJU', 'UP3 MAMUJU', '7419'),
('UP3-PALOPO', 'UP3 PALOPO', '7416'),
('UP3-PAREPARE', 'UP3 PAREPARE', '7412'),
('UP3-PINRANG', 'UP3 PINRANG', '7415'),
('UP3-WATAMPONE', 'UP3 WATAMPONE', '7413');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posisi_approval_committee`
--

CREATE TABLE `tb_posisi_approval_committee` (
  `id_posisi` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan_evaluasi`
--

CREATE TABLE `tb_usulan_evaluasi` (
  `id_usulan` varchar(255) NOT NULL,
  `id_administrator` varchar(255) NOT NULL,
  `tgl_usulan` datetime NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `status_usulan` varchar(255) NOT NULL,
  `alasan_ditolak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan_evaluasi_approval`
--

CREATE TABLE `tb_usulan_evaluasi_approval` (
  `id_usulan` varchar(255) NOT NULL,
  `id_approval` varchar(255) NOT NULL,
  `id_posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan_evaluasi_pegawai`
--

CREATE TABLE `tb_usulan_evaluasi_pegawai` (
  `id_usulan` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `password_user`, `last_login_user`, `status_user`, `foto_user`, `fullname_user`) VALUES
(1, 'irhamsahbana', '30a838bd52aaf321806e03924ad94c3e', NULL, 'maintainer', '', 'Irham Sahbana'),
(5, 'sdvs', 'sfd', NULL, 'A', '', 'sdvsdas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`id_administrator`);

--
-- Indexes for table `tb_approval_committee`
--
ALTER TABLE `tb_approval_committee`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indexes for table `tb_business_area`
--
ALTER TABLE `tb_business_area`
  ADD PRIMARY KEY (`business_area`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_sebutan_jabatan`);

--
-- Indexes for table `tb_judul_talenta`
--
ALTER TABLE `tb_judul_talenta`
  ADD PRIMARY KEY (`id_talenta`);

--
-- Indexes for table `tb_nilai_talenta_pegawai`
--
ALTER TABLE `tb_nilai_talenta_pegawai`
  ADD PRIMARY KEY (`tahun_talenta`,`semester_talenta`,`nip`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_personnel_area`
--
ALTER TABLE `tb_personnel_area`
  ADD PRIMARY KEY (`personnel_subarea`);

--
-- Indexes for table `tb_posisi_approval_committee`
--
ALTER TABLE `tb_posisi_approval_committee`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `tb_usulan_evaluasi`
--
ALTER TABLE `tb_usulan_evaluasi`
  ADD PRIMARY KEY (`id_usulan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
