-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 11:55 AM
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
  `id_administrator` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nama_administrator` varchar(255) NOT NULL,
  `business_area` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_approval_committee`
--

CREATE TABLE `tb_approval_committee` (
  `id_approval` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nama_approval` varchar(255) NOT NULL,
  `file_ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_approvement`
--

CREATE TABLE `tb_approvement` (
  `id_usulan` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_approval` varchar(100) NOT NULL,
  `approvement` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_area`
--

CREATE TABLE `tb_business_area` (
  `business_area` varchar(250) NOT NULL,
  `nama_business_area` varchar(250) NOT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_business_area`
--

INSERT INTO `tb_business_area` (`business_area`, `nama_business_area`, `target`) VALUES
('7401', 'UIW SULSELRABAR', 'a9d6eef1-77dd-11ea-9864-14dae95f4e07'),
('7412', 'UP3 PAREPARE', 'baae8c14-77dd-11ea-9864-14dae95f4e07'),
('7413', 'UP3 WATAMPONE', '0c89db07-77de-11ea-9864-14dae95f4e07'),
('7414', 'UP3 KENDARI', 'e2c3af3c-77dd-11ea-9864-14dae95f4e07'),
('7415', 'UP3 PINRANG', '027414ce-77de-11ea-9864-14dae95f4e07'),
('7416', 'UP3 PALOPO', 'fa495aa5-77dd-11ea-9864-14dae95f4e07'),
('7417', 'UP3 BULUKUMBA', 'd8a3036a-77dd-11ea-9864-14dae95f4e07'),
('7418', 'UP3 BAUBAU', 'cffeca8c-77dd-11ea-9864-14dae95f4e07'),
('7419', 'UP3 MAMUJU', 'ef93f71f-77dd-11ea-9864-14dae95f4e07'),
('7424', 'UP2D MAKASSAR', '2abcb7e9-77de-11ea-9864-14dae95f4e07'),
('7427', 'UP3 MAKASSAR UTARA', '2075d0d7-77de-11ea-9864-14dae95f4e07'),
('7428', 'UP3 MAKASSAR SELATAN', '157644bf-77de-11ea-9864-14dae95f4e07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_sebutan_jabatan` varchar(100) NOT NULL,
  `sebutan_jabatan` text NOT NULL,
  `personnel_subarea` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul_talenta`
--

CREATE TABLE `tb_judul_talenta` (
  `id_talenta` varchar(100) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(15) NOT NULL,
  `pers_no` varchar(15) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_personnel_area`
--

CREATE TABLE `tb_personnel_area` (
  `personnel_subarea` varchar(250) NOT NULL,
  `nama_personnel_subarea` varchar(250) NOT NULL,
  `business_area` varchar(250) NOT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_personnel_area`
--

INSERT INTO `tb_personnel_area` (`personnel_subarea`, `nama_personnel_subarea`, `business_area`, `target`) VALUES
('UIW SULSELRABAR', 'UIW SULSELRABAR', '7401', 'c45da206-77e6-11ea-9864-14dae95f4e07'),
('ULP BANTAENG', 'ULP BANTAENG', '7417', '61b00166-77e7-11ea-9864-14dae95f4e07'),
('ULP BAUBAU KOTA', 'ULP BAUBAU KOTA', '7418', '2bfa8fa5-77e7-11ea-9864-14dae95f4e07'),
('ULP BELOPA', 'ULP BELOPA', '7416', '817c409f-77e8-11ea-9864-14dae95f4e07'),
('ULP BENUBENUA', 'ULP BENUBENUA', '7414', 'a90ec007-77e7-11ea-9864-14dae95f4e07'),
('ULP BOMBANA', 'ULP BOMBANA', '7414', 'b3d64264-77e7-11ea-9864-14dae95f4e07'),
('ULP DAYA', 'ULP DAYA', '7427', 'a38a9c84-77e9-11ea-9864-14dae95f4e07'),
('ULP ENREKANG', 'ULP ENREKANG', '7415', 'be8be68c-77e8-11ea-9864-14dae95f4e07'),
('ULP HASANUDDIN', 'ULP HASANUDDIN', '7413', 'f4b9f079-77e8-11ea-9864-14dae95f4e07'),
('ULP JENEPONTO', 'ULP JENEPONTO', '7417', '69457a0e-77e7-11ea-9864-14dae95f4e07'),
('ULP KALEBAJENG', 'ULP KALEBAJENG', '7428', '5e69a68f-77e9-11ea-9864-14dae95f4e07'),
('ULP KALUMPANG', 'ULP KALUMPANG', '7417', '72f13625-77e7-11ea-9864-14dae95f4e07'),
('ULP KAREBOSI', 'ULP KAREBOSI', '7427', 'a94ad2c9-77e9-11ea-9864-14dae95f4e07'),
('ULP KARIANGO', 'ULP KARIANGO', '7415', 'c6c671cf-77e8-11ea-9864-14dae95f4e07'),
('ULP KOLAKA', 'ULP KOLAKA', '7414', 'bb74301c-77e7-11ea-9864-14dae95f4e07'),
('ULP KOLAKA UTARA', 'ULP KOLAKA UTARA', '7414', 'c5e7176d-77e7-11ea-9864-14dae95f4e07'),
('ULP KONAWE SELATAN', 'ULP KONAWE SELATAN', '7414', 'd073c908-77e7-11ea-9864-14dae95f4e07'),
('ULP LAKAWAN', 'ULP LAKAWAN', '7415', 'cf85c798-77e8-11ea-9864-14dae95f4e07'),
('ULP MAJENE', 'ULP MAJENE', '7419', '2bcc1725-77e8-11ea-9864-14dae95f4e07'),
('ULP MAKALE', 'ULP MAKALE', '7416', '934a1b5e-77e8-11ea-9864-14dae95f4e07'),
('ULP MALILI', 'ULP MALILI', '7416', '9a2251d6-77e8-11ea-9864-14dae95f4e07'),
('ULP MALINO', 'ULP MALINO', '7428', '4f587726-77e9-11ea-9864-14dae95f4e07'),
('ULP MAMASA', 'ULP MAMASA', '7419', '345d6569-77e8-11ea-9864-14dae95f4e07'),
('ULP MANAKARRA', 'ULP MANAKARRA', '7419', '3b9f2552-77e8-11ea-9864-14dae95f4e07'),
('ULP MAROS', 'ULP MAROS', '7427', 'b031e36b-77e9-11ea-9864-14dae95f4e07'),
('ULP MASAMBA', 'ULP MASAMBA', '7416', 'a1001fbe-77e8-11ea-9864-14dae95f4e07'),
('ULP MATTIROTASI', 'ULP MATTIROTASI', '7412', 'd8fb983a-77e6-11ea-9864-14dae95f4e07'),
('ULP MATTOANGING', 'ULP MATTOANGING', '7428', '3a265900-77e9-11ea-9864-14dae95f4e07'),
('ULP MAWASANGKA', 'ULP MAWASANGKA', '7418', '36000d1c-77e7-11ea-9864-14dae95f4e07'),
('ULP PAJALESANG', 'ULP PAJALESANG', '7412', '09cf860a-77e7-11ea-9864-14dae95f4e07'),
('ULP PALOPO KOTA', 'ULP PALOPO KOTA', '7416', 'aa148421-77e8-11ea-9864-14dae95f4e07'),
('ULP PANAKKUKANG', 'ULP PANAKKUKANG', '7428', '2ffbfee2-77e9-11ea-9864-14dae95f4e07'),
('ULP PANGKEP', 'ULP PANGKEP', '7427', 'b6ea456e-77e9-11ea-9864-14dae95f4e07'),
('ULP PANGSID', 'ULP PANGSID', '7412', 'eb7303f4-77e6-11ea-9864-14dae95f4e07'),
('ULP PANRITA LOPI', 'ULP PANRITA LOPI', '7417', '7a4c7cbe-77e7-11ea-9864-14dae95f4e07'),
('ULP PARIA', 'ULP PARIA', '7413', 'fca85511-77e8-11ea-9864-14dae95f4e07'),
('ULP PASANGKAYU', 'ULP PASANGKAYU', '7419', '43e6ac6c-77e8-11ea-9864-14dae95f4e07'),
('ULP PASAR WAJO', 'ULP PASAR WAJO', '7418', '438be431-77e7-11ea-9864-14dae95f4e07'),
('ULP PATANGKAI', 'ULP PATANGKAI', '7413', '0e643419-77e9-11ea-9864-14dae95f4e07'),
('ULP PEKKABATA', 'ULP PEKKABATA', '7415', 'da607e29-77e8-11ea-9864-14dae95f4e07'),
('ULP POLEWALI', 'ULP POLEWALI', '7419', '4cea7e5a-77e8-11ea-9864-14dae95f4e07'),
('ULP RAHA', 'ULP RAHA', '7418', '4bdf265e-77e7-11ea-9864-14dae95f4e07'),
('ULP RANTEPAO', 'ULP RANTEPAO', '7416', 'b08e9a22-77e8-11ea-9864-14dae95f4e07'),
('ULP RAPPANG', 'ULP RAPPANG', '7412', '193ac0e7-77e7-11ea-9864-14dae95f4e07'),
('ULP SELAYAR', 'ULP SELAYAR', '7417', '83f8ca4c-77e7-11ea-9864-14dae95f4e07'),
('ULP SENGKANG', 'ULP SENGKANG', '7413', '14fe0be5-77e9-11ea-9864-14dae95f4e07'),
('ULP SINJAI', 'ULP SINJAI', '7417', '8dd3c6b3-77e7-11ea-9864-14dae95f4e07'),
('ULP SUNGGUMINASA', 'ULP SUNGGUMINASA', '7428', '40287bf1-77e9-11ea-9864-14dae95f4e07'),
('ULP TAKALAR', 'ULP TAKALAR', '7428', '48db2186-77e9-11ea-9864-14dae95f4e07'),
('ULP TANETE', 'ULP TANETE', '7417', '9e7d89fc-77e7-11ea-9864-14dae95f4e07'),
('ULP TANRU TEDDONG', 'ULP TANRU TEDDONG', '7412', '10fb358e-77e7-11ea-9864-14dae95f4e07'),
('ULP TELLU BOCCOE', 'ULP TELLU BOCCOE', '7413', '1cdb1f89-77e9-11ea-9864-14dae95f4e07'),
('ULP TOMONI', 'ULP TOMONI', '7416', 'b7600311-77e8-11ea-9864-14dae95f4e07'),
('ULP ULOE', 'ULP ULOE', '7413', '24904fd5-77e9-11ea-9864-14dae95f4e07'),
('ULP UNAAHA', 'ULP UNAAHA', '7414', 'ed7af0a4-77e7-11ea-9864-14dae95f4e07'),
('ULP WANGI-WANGI', 'ULP WANGI-WANGI', '7418', '5a6d66a2-77e7-11ea-9864-14dae95f4e07'),
('ULP WATAN SOPPENG', 'ULP WATAN SOPPENG', '7412', 'fc7b9696-77e6-11ea-9864-14dae95f4e07'),
('ULP WATANG SAWITTO', 'ULP WATANG SAWITTO', '7415', 'e5906abd-77e8-11ea-9864-14dae95f4e07'),
('ULP WONOMULYO', 'ULP WONOMULYO', '7419', '5540fb8e-77e8-11ea-9864-14dae95f4e07'),
('ULP WUA-WUA', 'ULP WUA-WUA', '7414', 'f4231538-77e7-11ea-9864-14dae95f4e07'),
('UP2D MAKASSAR', 'UP2D MAKASSAR', '7424', 'bff550a5-77e9-11ea-9864-14dae95f4e07'),
('UP2K SULAWESI BARAT', 'UP2K SULAWESI BARAT', '7419', '72671f74-77e8-11ea-9864-14dae95f4e07'),
('UP2K SULAWESI SELATAN', 'UP2K SULAWESI SELATAN', '7401', '4ef7b3b6-77ea-11ea-9864-14dae95f4e07'),
('UP2K SULAWESI TENGGARA', 'UP2K SULAWESI TENGGARA', '7414', '1dc98565-77e8-11ea-9864-14dae95f4e07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posisi_approval_committee`
--

CREATE TABLE `tb_posisi_approval_committee` (
  `id_posisi` varchar(100) NOT NULL,
  `posisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan_evaluasi`
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
-- Table structure for table `tb_usulan_evaluasi_approval`
--

CREATE TABLE `tb_usulan_evaluasi_approval` (
  `id_usulan` varchar(100) NOT NULL,
  `id_approval` varchar(100) NOT NULL,
  `id_posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan_evaluasi_pegawai`
--

CREATE TABLE `tb_usulan_evaluasi_pegawai` (
  `id_usulan` varchar(100) NOT NULL,
  `nip` varchar(15) NOT NULL,
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
