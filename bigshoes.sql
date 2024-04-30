-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 08:12 PM
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
(13, 'Casio G-Shock GA2100-4A', 'casio_ga2100_4a.jpg', 100, 150, 10, 'A rugged yet stylish analog-digital watch with carbon core guard structure.', 20),
(15, 'Casio Edifice EFV130D-1A', 'casio_efv130d_1a.jpg', 50, 120, 15, 'A sophisticated analog watch with a stainless steel bracelet and chronograph features.', 21),
(16, 'Casio Pro Trek PRW-60-2A', 'casio_prw_60_2a.jpg', 80, 250, 20, 'A high-performance outdoor watch with triple sensor technology for accurate readings.', 29),
(21, 'Casio Baby-G BGA-190BC-1B', 'casio_bga_190bc_1b.jpg', 70, 100, 10, 'A sporty and stylish women\'s watch with shock resistance and world time feature.', 25),
(54, 'Casio G-Shock GA2100-1A1', 'casio_ga2100_1a1.jpg', 150, 180, 10, 'A sleek and modern analog-digital watch with a carbon core guard structure.', 20),
(56, 'Casio Edifice EFR556PC-2AV', 'casio_efr556pc_2av.jpg', 70, 200, 15, 'A stylish analog watch with a blue dial and stainless steel bracelet.', 21),
(57, 'Casio Pro Trek PRW-50Y-1ACR', 'casio_prw_50y_1acr.jpg', 120, 280, 20, 'A rugged outdoor watch with solar power and triple sensor technology.', 29),
(63, 'Casio Women\'s LTP-S100D-7BVCF', 'casio_ltp_s100d_7bvcf.jpg', 80, 70, 10, 'A chic women\'s watch with a silver-tone stainless steel band and analog display.', 30),
(64, 'Casio Baby-G BGD-560CF-1', 'casio_bgd_560cf_1.jpg', 100, 90, 10, 'A trendy women\'s watch with a camouflage pattern and shock resistance.', 25),
(66, 'Casio Edifice ECB-900DB-1A', 'casio_ecb_900db_1a.jpg', 60, 300, 20, 'A sophisticated men\'s watch with smartphone link and chronograph features.', 21),
(67, 'Casio Pro Trek PRG-330-1', 'casio_prg_330_1.jpg', 110, 220, 15, 'An outdoor watch with solar power and triple sensor technology for outdoor adventures.', 29),
(73, 'Casio Women\'s LQ139B-1B3', 'casio_lq139b_1b3.jpg', 150, 20, 5, 'A classic women\'s watch with a black resin band and analog display.', 30),
(74, 'Casio Baby-G BGA-180BE-2B', 'casio_bga_180be_2b.jpg', 90, 80, 10, 'A sporty women\'s watch with a blue resin band and analog-digital display.', 25),
(76, 'Casio Edifice EFR-S107D-1AV', 'casio_efr_s107d_1av.jpg', 50, 180, 15, 'A sleek men\'s watch with a stainless steel band and chronograph function.', 21),
(77, 'Casio Pro Trek PRG-600Y-1CR', 'casio_prg_600y_1cr.jpg', 100, 300, 20, 'An outdoor watch with solar power and triple sensor technology for hiking and trekking.', 29),
(83, 'Casio Women\'s LTP-V001GL-7B2', 'casio_ltp_v001gl_7b2.jpg', 110, 25, 5, 'A chic women\'s watch with a leather band and simple analog display.', 30),
(84, 'Casio Baby-G BGA-195M-2A', 'casio_bga_195m_2a.jpg', 120, 90, 10, 'A sporty women\'s watch with metallic accents and shock resistance.', 25),
(85, 'Casio SHE-4554D-2A', 'casio_she4554d_2a.jpg', 50, 200, 10, 'A sleek SHEEN watch with a stainless steel band and analog display.', 27),
(86, 'Casio SHE-4563BL-8A', 'casio_she4563bl_8a.jpg', 60, 250, 15, 'A luxurious SHEEN watch with a gold-tone bracelet and chronograph features.', 27),
(87, 'Casio SHE-4562BM-2A', 'casio_she4562bm_2a.jpg', 40, 180, 10, 'An elegant SHEEN watch with a mother-of-pearl dial and leather band.', 27),
(88, 'Casio SHE-4560BD-1A', 'casio_she4560bd_1a.jpg', 55, 220, 10, 'A sophisticated SHEEN watch with a rose gold finish and analog-digital display.', 27);

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
(27, 'Sheen'),
(29, 'Pro Trek'),
(30, 'Women\'s');

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
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
