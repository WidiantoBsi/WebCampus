-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 08:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(50) NOT NULL,
  `NamaDosen` varchar(50) DEFAULT NULL,
  `Tgl_Lahir` varchar(15) DEFAULT NULL,
  `JK` enum('L','P') DEFAULT 'L',
  `NoTelepon` varchar(18) DEFAULT NULL,
  `Alamat` varchar(150) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `NamaDosen`, `Tgl_Lahir`, `JK`, `NoTelepon`, `Alamat`, `Photo`) VALUES
('140402202101', 'Amdika K.Mk.Kom', '23/06/1999', 'L', '058884773880', 'Bekasi', 'foto1614153697.png'),
('140402202102', 'Widianto A.Md.Kom', '13/06/1989', 'L', '08578246689', 'Bekasi', 'foto1614153758.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `grupuser`
--

CREATE TABLE `grupuser` (
  `ID_Grup` int(2) NOT NULL,
  `NamaGrup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupuser`
--

INSERT INTO `grupuser` (`ID_Grup`, `NamaGrup`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiwa');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_Jadwal` varchar(35) NOT NULL,
  `ID_Matakuliah` varchar(35) DEFAULT NULL,
  `NIP` varchar(25) DEFAULT NULL,
  `ID_Ruangan` varchar(35) DEFAULT NULL,
  `ID_Jurusan` varchar(35) DEFAULT NULL,
  `Hari` varchar(35) DEFAULT NULL,
  `Jam` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_Jadwal`, `ID_Matakuliah`, `NIP`, `ID_Ruangan`, `ID_Jurusan`, `Hari`, `Jam`) VALUES
('02202101', 'MH-002', '140402202101', 'R001', 'JS-001', 'Selasa', '21:00-22:30'),
('02202102', 'MH-003', '140402202102', 'R001', 'JS-001', 'Selasa', '22:30-22:00'),
('02202103', 'MH-002', '140402202101', 'R002', 'JS-002', 'Selasa', '20:00-21:00'),
('02202104', 'MH-002', '140402202102', 'R002', 'JS-002', 'Selasa', '21:00-22:30');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `ID_Jenjang` varchar(25) NOT NULL,
  `NamaJenjang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`ID_Jenjang`, `NamaJenjang`) VALUES
('AK-001', 'D1'),
('AK-002', 'D2'),
('AK-003', 'D3'),
('AK-004', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `ID_Jurusan` varchar(25) NOT NULL,
  `NamaJurusan` varchar(50) DEFAULT NULL,
  `ID_Jenjang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ID_Jurusan`, `NamaJurusan`, `ID_Jenjang`) VALUES
('JS-001', 'Sistem Informasi', 'AK-003'),
('JS-002', 'Akuntasi', 'AK-003'),
('JS-003', 'Ekonomi', 'AK-003');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(25) NOT NULL,
  `NamaSiswa` varchar(50) DEFAULT NULL,
  `Tgl_Lahir` varchar(15) DEFAULT NULL,
  `JenisKelamin` enum('L','P') DEFAULT 'L',
  `NoTelepon` varchar(18) DEFAULT NULL,
  `Alamat` varchar(150) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `ID_Jurusan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `NamaSiswa`, `Tgl_Lahir`, `JenisKelamin`, `NoTelepon`, `Alamat`, `Photo`, `ID_Jurusan`) VALUES
('140102202101', 'Widianto', '1998-04-17', 'L', '058884773880', 'Jatiasih Bekasi', 'foto1614154708.png', 'JS-001'),
('140102202102', 'Anisatafa', '1993-02-17', 'P', '08578246689', 'Kalimalang Bekasi', 'foto1614154803.png', 'JS-002'),
('140102202103', 'Silfi', '1989-04-03', 'P', '085667736647', 'Bekasi', NULL, 'JS-002');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `ID_Matakuliah` varchar(35) NOT NULL,
  `Matakuliah` varchar(50) DEFAULT NULL,
  `SKS` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`ID_Matakuliah`, `Matakuliah`, `SKS`) VALUES
('MH-002', 'Mahir Dengan PHP', 8),
('MH-003', 'Dasar CI', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_Ruang` varchar(25) NOT NULL,
  `NamaRuangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ID_Ruang`, `NamaRuangan`) VALUES
('R001', '201'),
('R002', '303'),
('R003', '304');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `ID_Tugas` varchar(25) NOT NULL,
  `ID_Matakuliah` varchar(15) NOT NULL,
  `Nim` varchar(25) DEFAULT NULL,
  `Judul` varchar(100) DEFAULT NULL,
  `Keterangan` int(2) DEFAULT NULL,
  `Berkas` varchar(150) DEFAULT NULL,
  `Nilai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`ID_Tugas`, `ID_Matakuliah`, `Nim`, `Judul`, `Keterangan`, `Berkas`, `Nilai`) VALUES
('TGS-001', 'MH-003', '140102202101', 'Crud CI', 2, 'TGS1615374151.pdf', 'B'),
('TGS-002', 'MH-003', '140102202101', 'Belajar CI', 2, 'TGS1615466847.pdf', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` varchar(25) NOT NULL,
  `IdGrup` int(2) DEFAULT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `NamaUser` varchar(50) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `IdGrup`, `Status`, `NamaUser`, `Photo`, `Password`) VALUES
('140102202101', 3, 'Y', 'Widianto', 'foto1614154708.png', '1998-04-17'),
('140102202102', 3, 'Y', 'Anisatafa', 'foto1614154803.png', '1993-02-17'),
('140402202101', 2, 'Y', 'Amdika K.Mk.Kom', 'foto1614153697.png', '23/06/1999'),
('140402202102', 2, 'Y', 'Widianto A.Md.Kom', 'foto1614153758.jpg', '13/06/1989'),
('admin', 1, 'Y', 'Widianto', 'man.png', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `grupuser`
--
ALTER TABLE `grupuser`
  ADD PRIMARY KEY (`ID_Grup`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_Jadwal`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `ID_Ruangan` (`ID_Ruangan`),
  ADD KEY `FK_jadwal_jurusan` (`ID_Jurusan`),
  ADD KEY `ID_Matakuliah` (`ID_Matakuliah`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`ID_Jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`ID_Jurusan`),
  ADD KEY `ID_Jenjang` (`ID_Jenjang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`),
  ADD KEY `ID_Jurusan` (`ID_Jurusan`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`ID_Matakuliah`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_Ruang`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`ID_Tugas`) USING BTREE,
  ADD KEY `ID_Matakuliah` (`ID_Matakuliah`) USING BTREE,
  ADD KEY `ID_Jurusan` (`Nim`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `IdIGrup` (`IdGrup`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_dosen` FOREIGN KEY (`NIP`) REFERENCES `dosen` (`NIP`),
  ADD CONSTRAINT `FK_jadwal_jurusan` FOREIGN KEY (`ID_Jurusan`) REFERENCES `jurusan` (`ID_Jurusan`),
  ADD CONSTRAINT `FK_jadwal_matakuliah` FOREIGN KEY (`ID_Matakuliah`) REFERENCES `matakuliah` (`ID_Matakuliah`),
  ADD CONSTRAINT `FK_jadwal_ruangan` FOREIGN KEY (`ID_Ruangan`) REFERENCES `ruangan` (`ID_Ruang`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `FK_jurusan_jenjang` FOREIGN KEY (`ID_Jenjang`) REFERENCES `jenjang` (`ID_Jenjang`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_mahasiswa_jurusan` FOREIGN KEY (`ID_Jurusan`) REFERENCES `jurusan` (`ID_Jurusan`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `FK_tugas_mahasiswa` FOREIGN KEY (`Nim`) REFERENCES `mahasiswa` (`Nim`),
  ADD CONSTRAINT `FK_tugas_matakuliah` FOREIGN KEY (`ID_Matakuliah`) REFERENCES `matakuliah` (`ID_Matakuliah`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_grupuser` FOREIGN KEY (`IdGrup`) REFERENCES `grupuser` (`ID_Grup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
