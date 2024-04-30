-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 12:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_kh` int(10) UNSIGNED NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `noi_dung` varchar(50) NOT NULL,
  `ngay_bl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `hinh` varchar(200) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `mo_ta` varchar(500) NOT NULL,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `hinh`, `so_luong`, `don_gia`, `giam_gia`, `mo_ta`, `ma_loai`) VALUES
(2, 'G-shock H23487', '', 12, 1400000, 0, '', 20),
(13, 'Casio G-Shock GA2100-4A', 'casio_ga2100_4a.jpg', 100, 150, 10, 'A rugged yet stylish analog-digital watch with carbon core guard structure.', 21),
(14, 'Casio Classic Digital F91W', 'casio_f91w.jpg', 200, 20, 5, 'The iconic digital watch known for its simplicity, durability, and affordability.', 26),
(15, 'Casio Edifice EFV130D-1A', 'casio_efv130d_1a.jpg', 50, 120, 15, 'A sophisticated analog watch with a stainless steel bracelet and chronograph features.', 21),
(16, 'Casio Pro Trek PRW-60-2A', 'casio_prw_60_2a.jpg', 80, 250, 20, 'A high-performance outdoor watch with triple sensor technology for accurate readings.', 21),
(17, 'Casio Exilim EX-ZR4100', 'casio_ex_zr4100.jpg', 30, 300, 25, 'A compact digital camera with advanced shooting capabilities and image stabilization.', 21),
(18, 'Casio Privia PX-770 Digital Piano', 'casio_px_770.jpg', 10, 800, 30, 'An elegant digital piano with realistic sound and feel, suitable for both beginners and professionals.', 21),
(19, 'Casio CTK-3500 Portable Keyboard', 'casio_ctk_3500.jpg', 15, 150, 10, 'A versatile portable keyboard with touch-sensitive keys and built-in lessons.', 21),
(20, 'Casio Scientific Calculator FX-991EX', 'casio_fx_991ex.jpg', 100, 30, 5, 'A powerful scientific calculator with high-resolution display and comprehensive functions.', 21),
(21, 'Casio Baby-G BGA-190BC-1B', 'casio_bga_190bc_1b.jpg', 70, 100, 10, 'A sporty and stylish women\'s watch with shock resistance and world time feature.', 25),
(22, 'Casio Youth Series AE-1000W', 'casio_ae_1000w.jpg', 120, 40, 5, 'A digital watch designed for outdoor enthusiasts, featuring world time and stopwatch functions.', 21);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ngay_mua` date NOT NULL DEFAULT current_timestamp(),
  `ghi_chu` varchar(50) NOT NULL,
  `tinh_trang` varchar(20) NOT NULL DEFAULT '0',
  `ma_kh` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `ngay_mua`, `ghi_chu`, `tinh_trang`, `ma_kh`) VALUES
(1, '2024-04-30', 'test hoa don 1', 'đang chờ xử lý', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hd` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `so_luong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hd`, `ma_hh`, `so_luong`) VALUES
(1, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(12) NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `trang_thai` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_dang_nhap`, `ho_ten`, `mat_khau`, `email`, `sdt`, `dia_chi`, `trang_thai`) VALUES
(1, 'john_doe', 'John Doe', 'password123', 'john.doe@example.com', 1234567890, '123 Main Street, City, Country', b'0'),
(2, 'jane_smith', 'Jane Smith', 'p@ssw0rd', 'jane.smith@example.com', 987654321, '456 Elm Street, City, Country', b'0'),
(3, 'alex_williams', 'Alex Williams', 'securepass', 'alex.williams@example.com', 2147483647, '789 Oak Street, City, Country', b'0'),
(4, 'quanghieu', 'Nguyễn Quang Hiếu', '123', 'h@gmail.com', 12345678, 'Quận 12', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`) VALUES
(20, 'Gshock'),
(21, 'Edifice'),
(25, 'Baby-G'),
(26, 'Mtp'),
(27, 'Sheen She');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_kh`,`ma_hh`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `hanghoa_loaihang` (`ma_loai`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `hoadon_khachhang` (`ma_kh`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hd`,`ma_hh`,`so_luong`),
  ADD KEY `hdchitiet_hanghoa` (`ma_hh`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `khachhang_binhluan` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hanghoa_loaihang` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoadon_khachhang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Constraints for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hdchitiet_hanghoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `hdchitiet_hoadon` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
