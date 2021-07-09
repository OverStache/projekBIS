-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 09:47 AM
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
  `status` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
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

INSERT INTO `tbl_anggota` (`id`, `nama`, `status`, `is_active`, `namaPanggilan`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `namaIbuKandung`, `jenisID`, `nomerID`, `statusMarital`, `agama`, `kewarganegaraan`, `pendidikan`) VALUES
(0001, 'Ivan Firmansyah ', 1, 1, 'ipet', 'Laki-laki', 'Jakarta', '1999-05-11', 'Ivo', 'KTP', 327605, 'Belum Menikah', 'Islam', 'Indonesia', 'SMA'),
(0003, 'Rakha', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0007, 'Fuadhli Rahman', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0008, 'Ridho Rhoma', 1, 0, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0009, 'Yazid', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0014, 'Azzam', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', ''),
(0015, 'Agung Prasetyo', 1, 1, '', '', '', '0000-00-00', '', '', 0, '', '', '', '');

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
  `status` int(11) NOT NULL,
  `npf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id`, `id_rekening`, `cicilan`, `tanggalTagihan`, `tanggalSetor`, `tagihan`, `angsuran`, `status`, `npf`) VALUES
(200, 100015, 1, '2021-08-02', '0000-00-00', 1700000, 1700000, 2, 1),
(201, 100015, 2, '2021-09-02', '0000-00-00', 1700000, 1700000, 2, 1),
(202, 100015, 3, '2021-10-02', '0000-00-00', 1700000, 1700000, 2, 1),
(203, 100016, 1, '2021-08-02', '2021-07-05', 2550000, 2550000, 2, 1),
(204, 100016, 2, '2021-09-02', '0000-00-00', 2550000, 0, 1, 1),
(205, 100016, 3, '2021-10-02', '0000-00-00', 2550000, 0, 1, 1),
(230, 100017, 1, '2021-08-02', '2021-07-25', 2040000, 2040000, 2, 1),
(231, 100017, 2, '2021-09-02', '2021-09-25', 2040000, 2040000, 2, 2),
(232, 100017, 3, '2021-10-02', '2021-10-25', 2040000, 1540000, 1, 3),
(234, 100018, 1, '2021-08-02', '2021-07-05', 1020000, 1020000, 2, 1),
(235, 100018, 2, '2021-09-02', '2021-07-05', 1020000, 1020000, 2, 1),
(236, 100018, 3, '2021-10-02', '0000-00-00', 1020000, 0, 1, 1);

--
-- Triggers `tbl_angsuran`
--
DELIMITER $$
CREATE TRIGGER `updateNpfJadwal` BEFORE UPDATE ON `tbl_angsuran` FOR EACH ROW IF (new.status = 1)
THEN
	IF (date(old.tanggalTagihan) >= CURRENT_DATE())
    THEN
	SET new.npf = 1;
	ELSEIF (date(old.tanggalTagihan) <= CURRENT_DATE())
	THEN
	SET new.npf = 3;
	END IF;
ELSEIF (new.status = 2)
THEN
	IF (date(old.tanggalTagihan) >= date(new.tanggalSetor))
    THEN
	SET new.npf = 1;   
	ELSEIF (date(old.tanggalTagihan) <= date(new.tanggalSetor))
	THEN
	SET new.npf = 2;
	END IF;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateStatusJadwal` BEFORE UPDATE ON `tbl_angsuran` FOR EACH ROW IF old.tagihan = new.angsuran
THEN
SET new.status = 2;
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
(27, 1, 34, 1);

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
-- Table structure for table `tbl_npf`
--

CREATE TABLE `tbl_npf` (
  `id` int(11) NOT NULL,
  `npf` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_npf`
--

INSERT INTO `tbl_npf` (`id`, `npf`, `color`) VALUES
(1, 'Lancar', 'success'),
(2, 'Kurang Lancar', 'warning'),
(3, 'Macet', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id` int(11) NOT NULL,
  `id_anggota` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `perolehan` int(11) NOT NULL,
  `%` int(11) NOT NULL,
  `margin` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `jaminan` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id`, `id_anggota`, `id_user`, `tanggal`, `jangka_waktu`, `perolehan`, `%`, `margin`, `jumlah`, `saldo`, `jaminan`, `status`) VALUES
(100003, 0001, 41, '0000-00-00', 6, 0, 0, 0, 6000000, 6000000, '', 2),
(100015, 0007, 41, '2021-07-02', 3, 5000000, 2, 100000, 5100000, 5100000, '', 2),
(100016, 0003, 41, '2021-07-02', 3, 7500000, 2, 150000, 7650000, 2550000, '', 1),
(100017, 0008, 41, '2021-07-02', 3, 6000000, 2, 120000, 6120000, 5620000, '', 1),
(100018, 0003, 41, '2021-07-02', 3, 3000000, 2, 60000, 3060000, 2040000, '', 1),
(100021, 0015, 41, '2021-07-06', 6, 6000000, 2, 120000, 6120000, 0, 'laptop gaming rog', 0),
(100022, 0001, 40, '2021-07-07', 3, 6000000, 2, 120000, 6120000, 0, 'iphone SE', 0);

--
-- Triggers `tbl_rekening`
--
DELIMITER $$
CREATE TRIGGER `checkStatus` BEFORE UPDATE ON `tbl_rekening` FOR EACH ROW IF new.saldo=old.jumlah
THEN 
SET new.status=2;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLoopdanTransaksi` AFTER UPDATE ON `tbl_rekening` FOR EACH ROW IF old.status=0 AND new.status=1
THEN  
SET @i=1;
    WHILE @i <= old.jangka_waktu DO
        INSERT INTO `tbl_angsuran` (`id`, `id_rekening`, `cicilan`, `tanggalTagihan`, `tanggalSetor`, `tagihan`, `angsuran`, `status`, `npf`) 
        VALUES (NULL, old.id, @i, DATE_ADD(old.tanggal, INTERVAL @i MONTH), '0000-00-00', old.jumlah/old.jangka_waktu, 0, 1, 1);
        SET @i = @i + 1;
    END WHILE;		
   
INSERT INTO `tbl_transaksi` (`id`, `id_rekening`, `#`, `tanggal`, `debit`, `kredit`, `keterangan`) 
VALUES (NULL, old.id,  0, old.tanggal, old.jumlah, 0, 1);

END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpanan`
--

CREATE TABLE `tbl_simpanan` (
  `id` int(11) NOT NULL,
  `id_anggota` int(4) UNSIGNED ZEROFILL NOT NULL,
  `tanggal` date NOT NULL,
  `produk` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_simpanan`
--

INSERT INTO `tbl_simpanan` (`id`, `id_anggota`, `tanggal`, `produk`, `saldo`, `status`) VALUES
(200005, 0009, '2021-07-03', 3, 500000, 1),
(200019, 0014, '2021-07-04', 3, 500000, 1),
(200020, 0014, '2021-07-04', 4, 150000, 1),
(200021, 0015, '2021-07-05', 3, 500000, 1),
(200022, 0015, '2021-07-05', 4, 0, 1);

--
-- Triggers `tbl_simpanan`
--
DELIMITER $$
CREATE TRIGGER `updateAnggota` AFTER INSERT ON `tbl_simpanan` FOR EACH ROW IF new.produk = 4
THEN
UPDATE tbl_anggota
SET tbl_anggota.is_active = 1
WHERE tbl_anggota.id = new.id_anggota;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_anggota`
--

CREATE TABLE `tbl_status_anggota` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status_anggota`
--

INSERT INTO `tbl_status_anggota` (`id`, `status`) VALUES
(1, 'Anggota'),
(2, 'Anggota Luar Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_rekening_jadwal`
--

CREATE TABLE `tbl_status_rekening_jadwal` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status_rekening_jadwal`
--

INSERT INTO `tbl_status_rekening_jadwal` (`id`, `status`, `color`) VALUES
(0, 'Pending', 'warning'),
(1, 'Active', 'success'),
(2, 'Lunas', 'secondary'),
(3, 'Inactive', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `id_anggota` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `#` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `id_anggota`, `id_rekening`, `#`, `tanggal`, `debit`, `kredit`, `jenis`) VALUES
(58, 0007, 100015, 0, '2021-07-02', 5100000, 0, 1),
(59, 0007, 100015, 1, '2021-07-02', 0, 1700000, 2),
(60, 0007, 100015, 2, '2021-07-02', 0, 1000000, 2),
(61, 0007, 100015, 2, '2021-07-02', 0, 700000, 2),
(62, 0007, 100015, 3, '2021-07-02', 0, 1000000, 2),
(63, 0007, 100015, 3, '2021-07-02', 0, 500000, 2),
(64, 0007, 100015, 3, '2021-07-02', 0, 200000, 2),
(65, 0003, 100016, 0, '2021-07-02', 7650000, 0, 1),
(66, 0003, 100016, 1, '2021-08-10', 0, 1000000, 2),
(67, 0003, 100016, 1, '2021-08-10', 0, 1000000, 2),
(75, 0008, 100017, 0, '2021-07-02', 6120000, 0, 1),
(76, 0008, 100017, 1, '2021-08-10', 0, 2040000, 2),
(78, 0008, 100017, 2, '2021-08-25', 0, 1000000, 2),
(79, 0008, 100017, 2, '2021-09-25', 0, 1040000, 2),
(80, 0008, 100017, 3, '2021-09-25', 0, 1040000, 2),
(81, 0008, 100017, 3, '2021-10-25', 0, 500000, 2),
(83, 0003, 100018, 0, '2021-07-02', 3060000, 0, 1),
(85, 0009, 10005, 0, '2021-07-03', 0, 500000, 3),
(94, 0014, 0, 0, '2021-07-04', 0, 500000, 3),
(95, 0003, 100018, 1, '2021-07-05', 0, 1020000, 2),
(96, 0003, 100018, 2, '2021-07-05', 0, 1020000, 2),
(98, 0014, 200020, NULL, '2021-07-05', 0, 100000, 4),
(99, 0003, 100016, 1, '2021-07-05', 0, 550000, 2),
(100, 0014, 200020, 0, '2021-07-05', 0, 50000, 4),
(101, 0015, 0, NULL, '2021-07-05', 0, 500000, 3);

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `insertSimpananPokok` AFTER INSERT ON `tbl_transaksi` FOR EACH ROW IF new.jenis = 3
THEN
INSERT INTO `tbl_simpanan` (`id`, `id_anggota`, `tanggal`, `produk`, `saldo`, `status`)
VALUES (NULL, new.id_Anggota, new.tanggal, new.jenis, new.kredit, 1), (NULL, new.id_Anggota, new.tanggal, 4, 0, 1);
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateRekeningAngsuran` BEFORE INSERT ON `tbl_transaksi` FOR EACH ROW IF new.jenis = 2
THEN
UPDATE tbl_rekening
SET 
tbl_rekening.saldo=tbl_rekening.saldo + new.kredit
WHERE
tbl_rekening.id = new.id_rekening;

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
CREATE TRIGGER `updateSimpananBulanan` BEFORE INSERT ON `tbl_transaksi` FOR EACH ROW IF new.jenis = 4
THEN
UPDATE tbl_simpanan 
SET
tbl_simpanan.saldo=tbl_simpanan.saldo + new.kredit
WHERE
tbl_simpanan.id = new.id_rekening;
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
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `image`, `email`, `role_id`, `is_active`, `date_created`) VALUES
(40, 'ivan', '$2y$10$5MjVvXKb3O4eKF7Zo48o/.LuAIwQYVbqv0jE/m.WI0/UCaprcqP8.', 'avatar4.png', 'ivan@gmail.com', 2, 1, 1622534909),
(41, 'ipet ', '$2y$10$AXM4kFDVjrn7KeYsY63d4eFQ8/r5F6rVZCE8kqAlMpBqcorhR29MS', 'ProfilePic.png', 'ipet@gmail.com', 1, 1, 1622614425),
(47, 'Ivan F', '$2y$10$hCPEjW1uKRLXqF3buXyIteLOmsu3qA3L0JdxcK5dxqXhqj.7ERUyu', 'default.png', '17102072@student.tazkia.ac.id', 3, 1, 1622797260),
(64, 'Maulana', '$2y$10$V9dfGKLGG0lhhBoupH5X6e467ge2a6kTW7Wn/TOqCENc4Yu4YBx6e', 'default.png', 'maul@gmail.com', 2, 1, 1625048648);

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
(10, 'changeCrudAccess');

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
(1, 'Welcome', 'profile'),
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_token`
--

CREATE TABLE `tbl_user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_token`
--

INSERT INTO `tbl_user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'rara@gmail.com', 'tZ5VciS4gRs=', 1623762821);

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
-- Indexes for table `tbl_npf`
--
ALTER TABLE `tbl_npf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKeyIdAnggota` (`id_anggota`);

--
-- Indexes for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status_anggota`
--
ALTER TABLE `tbl_status_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status_rekening_jadwal`
--
ALTER TABLE `tbl_status_rekening_jadwal`
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
-- Indexes for table `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `tbl_crud_access`
--
ALTER TABLE `tbl_crud_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_jenis_transaksi`
--
ALTER TABLE `tbl_jenis_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_npf`
--
ALTER TABLE `tbl_npf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100023;

--
-- AUTO_INCREMENT for table `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200025;

--
-- AUTO_INCREMENT for table `tbl_status_anggota`
--
ALTER TABLE `tbl_status_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_rekening_jadwal`
--
ALTER TABLE `tbl_status_rekening_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
