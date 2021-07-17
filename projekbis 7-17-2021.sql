-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 09:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekbis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_jenis_anggota` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 0,
  `namaPanggilan` varchar(128) NOT NULL,
  `jenisKelamin` varchar(128) NOT NULL,
  `tempatLahir` varchar(128) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `namaIbuKandung` varchar(128) NOT NULL,
  `jenisID` varchar(128) NOT NULL,
  `nomerID` int(11) NOT NULL,
  `statusMarital` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `kewarganegaraan` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id`, `nama`, `id_jenis_anggota`, `id_status`, `namaPanggilan`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `namaIbuKandung`, `jenisID`, `nomerID`, `statusMarital`, `agama`, `kewarganegaraan`, `pendidikan`) VALUES
(0001, 'Ivan Firmansyah ', 1, 1, 'ipet', 'Laki-laki', 'Jakarta', '1999-05-11', 'Ivo', 'KTP', 327605, 'Belum Menikah', 'Islam', 'Indonesia', 'SMA'),
(0003, 'Rakha', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0007, 'Fuadhli Rahman', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0008, 'Ridho Rhoma', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0009, 'Yazid', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0014, 'Azzam', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0015, 'Agung Prasetyo', 1, 3, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0016, 'Maulana', 1, 0, 'Maul', 'Laki-laki', 'Jakarta', '1999-01-01', 'Mama Maul', 'KTP', 321, 'Belum Menikah', 'Islam', 'Indonesia', 'SMA'),
(0017, 'Rakha Aditama Iskandar', 1, 0, 'Raicha', 'Laki-laki', 'Bogor', '1999-01-31', 'Mamih Rakha', 'KTP', 327, 'Belum Menikah', 'Islam', 'Indonesia', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `id` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `cicilan` int(11) NOT NULL,
  `tanggalTagihan` date NOT NULL,
  `tanggalSetor` date NOT NULL,
  `tagihan` int(11) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id`, `id_rekening`, `cicilan`, `tanggalTagihan`, `tanggalSetor`, `tagihan`, `angsuran`, `id_status`) VALUES
(200, 100015, 1, '2021-08-02', '0000-00-00', 1700000, 1700000, 2),
(201, 100015, 2, '2021-09-02', '0000-00-00', 1700000, 1700000, 2),
(202, 100015, 3, '2021-10-02', '0000-00-00', 1700000, 1700000, 2),
(203, 100016, 1, '2021-08-02', '2021-07-05', 2550000, 2550000, 2),
(204, 100016, 2, '2021-09-02', '2021-07-16', 2550000, 2550000, 2),
(205, 100016, 3, '2021-10-02', '2021-07-16', 2550000, 550000, 1),
(230, 100017, 1, '2021-08-02', '2021-07-25', 2040000, 2040000, 2),
(231, 100017, 2, '2021-09-02', '2021-09-25', 2040000, 2040000, 2),
(232, 100017, 3, '2021-10-02', '2021-07-08', 2040000, 2040000, 2),
(234, 100018, 1, '2021-08-02', '2021-07-05', 1020000, 1020000, 2),
(235, 100018, 2, '2021-09-02', '2021-07-05', 1020000, 1020000, 2),
(236, 100018, 3, '2021-10-02', '0000-00-00', 1020000, 0, 1);

--
-- Triggers `tbl_angsuran`
--
DELIMITER $$
CREATE TRIGGER `updateStatusJadwal` BEFORE UPDATE ON `tbl_angsuran` FOR EACH ROW IF old.tagihan = new.angsuran
THEN
SET new.id_status = 2;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crud_access`
--

CREATE TABLE `tbl_crud_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_crud_access`
--

INSERT INTO `tbl_crud_access` (`id`, `role_id`, `menu_id`, `crud_id`) VALUES
(1, 1, 34, 2),
(2, 1, 34, 3),
(3, 1, 34, 4),
(4, 1, 34, 5),
(5, 1, 34, 7),
(6, 1, 34, 9),
(7, 1, 1, 2),
(8, 1, 1, 6),
(9, 1, 2, 1),
(10, 1, 2, 2),
(11, 1, 2, 4),
(12, 1, 2, 5),
(13, 1, 2, 6),
(14, 1, 2, 8),
(15, 1, 2, 10),
(18, 2, 34, 1),
(19, 2, 34, 5),
(20, 2, 1, 2),
(21, 2, 1, 5),
(22, 3, 1, 2),
(23, 3, 1, 5),
(24, 3, 34, 3),
(25, 3, 34, 5),
(26, 1, 2, 7),
(27, 1, 34, 1),
(28, 1, 34, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_transaksi`
--

CREATE TABLE `tbl_jenis_transaksi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_transaksi`
--

INSERT INTO `tbl_jenis_transaksi` (`id`, `jenis`) VALUES
(1, 'Pembiayaan Murobahah'),
(2, 'Angsuran Murobahah'),
(3, 'Simpanan Pokok Anggota'),
(4, 'Simpanan Bulanan Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_anggota` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `#` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `id_user`, `id_anggota`, `id_rekening`, `#`, `tanggal`, `debit`, `kredit`, `id_jenis`) VALUES
(58, 0, 0007, 100015, 0, '2021-07-02', 5100000, 0, 1),
(59, 0, 0007, 100015, 1, '2021-07-02', 0, 1700000, 2),
(60, 0, 0007, 100015, 2, '2021-07-02', 0, 1000000, 2),
(61, 0, 0007, 100015, 2, '2021-07-02', 0, 700000, 2),
(62, 0, 0007, 100015, 3, '2021-07-02', 0, 1000000, 2),
(63, 0, 0007, 100015, 3, '2021-07-02', 0, 500000, 2),
(64, 0, 0007, 100015, 3, '2021-07-02', 0, 200000, 2),
(65, 0, 0003, 100016, 0, '2021-07-02', 7650000, 0, 1),
(66, 0, 0003, 100016, 1, '2021-08-10', 0, 1000000, 2),
(67, 0, 0003, 100016, 1, '2021-08-10', 0, 1000000, 2),
(75, 0, 0008, 100017, 0, '2021-07-02', 6120000, 0, 1),
(76, 0, 0008, 100017, 1, '2021-08-10', 0, 2040000, 2),
(78, 0, 0008, 100017, 2, '2021-08-25', 0, 1000000, 2),
(79, 0, 0008, 100017, 2, '2021-09-25', 0, 1040000, 2),
(80, 0, 0008, 100017, 3, '2021-09-25', 0, 1040000, 2),
(81, 0, 0008, 100017, 3, '2021-10-25', 0, 500000, 2),
(83, 0, 0003, 100018, 0, '2021-07-02', 3060000, 0, 1),
(85, 0, 0009, 10005, 0, '2021-07-03', 0, 500000, 3),
(94, 0, 0014, 0, 0, '2021-07-04', 0, 500000, 3),
(95, 0, 0003, 100018, 1, '2021-07-05', 0, 1020000, 2),
(96, 0, 0003, 100018, 2, '2021-07-05', 0, 1020000, 2),
(98, 0, 0014, 200020, NULL, '2021-07-05', 0, 100000, 4),
(99, 0, 0003, 100016, 1, '2021-07-05', 0, 550000, 2),
(100, 0, 0014, 200020, 0, '2021-07-05', 0, 50000, 4),
(101, 0, 0015, 0, NULL, '2021-07-05', 0, 500000, 3),
(104, 0, 0008, 100017, 3, '2021-07-08', 0, 500000, 2),
(105, 0, 0015, 200022, 0, '2021-07-08', 0, 50000, 4),
(106, 41, 0003, 100016, 2, '2021-07-16', 0, 2550000, 2),
(107, 41, 0003, 100016, 3, '2021-07-16', 0, 550000, 2);

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `insertSimpananPokok` AFTER INSERT ON `tbl_transaksi` FOR EACH ROW IF new.id_jenis = 3
THEN
INSERT INTO `tbl_rekening_simpanan` (`id`, `id_anggota`, `tanggal`, `id_jenis`, `saldo`, `id_status`)
VALUES 
(NULL, new.id_anggota, new.tanggal, new.id_jenis, new.kredit, 1), 
(NULL, new.id_anggota, new.tanggal, 4, 0, 1);
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateRekeningAngsuran` BEFORE INSERT ON `tbl_transaksi` FOR EACH ROW IF new.id_jenis = 2
THEN
UPDATE tbl_rekening_pembiayaan
SET 
tbl_rekening_pembiayaan.saldo=tbl_rekening_pembiayaan.saldo + new.kredit
WHERE
tbl_rekening_pembiayaan.id = new.id_rekening;

UPDATE tbl_angsuran
SET 
tbl_angsuran.angsuran=tbl_angsuran.angsuran + new.kredit,
tbl_angsuran.tanggalSetor = new.tanggal
WHERE
tbl_angsuran.cicilan = new.`#` AND tbl_angsuran.id_rekening = new.id_rekening;

END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateSimpananBulanan` BEFORE INSERT ON `tbl_transaksi` FOR EACH ROW IF new.id_jenis = 4
THEN
UPDATE tbl_rekening_simpanan 
SET
tbl_rekening_simpanan.saldo=tbl_rekening_simpanan.saldo + new.kredit
WHERE
tbl_rekening_simpanan.id = new.id_rekening;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_status` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `image`, `email`, `role_id`, `id_status`, `date_created`) VALUES
(40, 'ivan', '$2y$10$3GMOIx7LGuxDmgujIPX0JeKuNysFKZT.Mth1KDDxblRIXZ3FfwvaG', 'default.png', 'ivan@gmail.com', 2, 1, 1625838119),
(41, 'ipet ', '$2y$10$AXM4kFDVjrn7KeYsY63d4eFQ8/r5F6rVZCE8kqAlMpBqcorhR29MS', 'ProfilePic.png', 'ipet@gmail.com', 1, 1, 1622614425),
(47, 'Ivan F', '$2y$10$hCPEjW1uKRLXqF3buXyIteLOmsu3qA3L0JdxcK5dxqXhqj.7ERUyu', 'default.png', '17102072@student.tazkia.ac.id', 3, 1, 1622797260),
(64, 'Maulana', '$2y$10$V9dfGKLGG0lhhBoupH5X6e467ge2a6kTW7Wn/TOqCENc4Yu4YBx6e', 'default.png', 'maul@gmail.com', 2, 3, 1625048648);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access_menu`
--

CREATE TABLE `tbl_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_access_menu`
--

INSERT INTO `tbl_user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 2),
(3, 2, 1),
(19, 3, 1),
(50, 1, 1),
(54, 3, 34),
(58, 2, 34),
(73, 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_crud_menu`
--

CREATE TABLE `tbl_user_crud_menu` (
  `id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_crud_menu`
--

INSERT INTO `tbl_user_crud_menu` (`id`, `url`) VALUES
(1, 'add'),
(2, 'update'),
(3, 'detail'),
(4, 'delete'),
(5, 'index'),
(6, 'changepassword'),
(7, 'changeActive'),
(8, 'changeMenuAccess'),
(9, 'changeRekeningStatus'),
(10, 'changeCrudAccess'),
(11, 'print');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `urlMenu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id`, `menu`, `urlMenu`) VALUES
(1, 'Dashboard', 'profile'),
(2, 'Sistem Admin', 'sisadmin'),
(34, 'Data Keanggotaan', 'dataKeanggotaan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'pengurus'),
(2, 'admin'),
(3, 'pengawas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_menu`
--

CREATE TABLE `tbl_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `urlSubMenu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_sub_menu`
--

INSERT INTO `tbl_user_sub_menu` (`id`, `menu_id`, `title`, `urlSubMenu`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tw fa-tachometer-alt', 1),
(2, 1, 'My Profile', 'profile', 'fas fa-fw fa-user', 1),
(9, 2, 'Role', 'role', 'fas fa-fw fa-user-tie', 1),
(12, 2, 'User Management', 'user', 'fas fa-fw fa-users-cog', 1),
(31, 2, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(35, 2, 'Sub Menu Management', 'subMenu', 'fas fa-fw fa-folder-open', 1),
(47, 34, 'Anggota', 'anggota', 'fas fa-fw fa-users', 1),
(48, 34, 'Rekening Pembiayaan', 'rekening', 'fas fa-fw fa-wallet', 1),
(49, 34, 'Rekening Simpanan', 'simpanan', 'fas fa-fw fa-wallet', 1),
(50, 34, 'Transaksi', 'transaksi', 'fas fa-fw fa-cash-register', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_crud_access`
--
ALTER TABLE `tbl_crud_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_transaksi`
--
ALTER TABLE `tbl_jenis_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKeyIdRekening` (`id_rekening`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleAccessMenuCascade` (`menu_id`);

--
-- Indexes for table `tbl_user_crud_menu`
--
ALTER TABLE `tbl_user_crud_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleteSubMenu` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tbl_crud_access`
--
ALTER TABLE `tbl_crud_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_jenis_transaksi`
--
ALTER TABLE `tbl_jenis_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_user_crud_menu`
--
ALTER TABLE `tbl_user_crud_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  ADD CONSTRAINT `roleAccessMenuCascade` FOREIGN KEY (`menu_id`) REFERENCES `tbl_user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  ADD CONSTRAINT `deleteSubMenu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
