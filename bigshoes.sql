-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 12:44 PM
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
(16, 'Casio Pro Trek PRW-60-2A', 'casio_prw_60_2a.jpg', 80, 250, 20, 'A high-performance outdoor watch with triple sensor technology for accurate readings.', 21),
(17, 'Casio Exilim EX-ZR4100', 'casio_ex_zr4100.jpg', 30, 300, 25, 'A compact digital camera with advanced shooting capabilities and image stabilization.', 21),
(18, 'Casio Privia PX-770 Digital Piano', 'casio_px_770.jpg', 10, 800, 30, 'An elegant digital piano with realistic sound and feel, suitable for both beginners and professionals.', 21),
(19, 'Casio CTK-3500 Portable Keyboard', 'casio_ctk_3500.jpg', 15, 150, 10, 'A versatile portable keyboard with touch-sensitive keys and built-in lessons.', 21),
(20, 'Casio Scientific Calculator FX-991EX', 'casio_fx_991ex.jpg', 100, 30, 5, 'A powerful scientific calculator with high-resolution display and comprehensive functions.', 21),
(21, 'Casio Baby-G BGA-190BC-1B', 'casio_bga_190bc_1b.jpg', 70, 100, 10, 'A sporty and stylish women\'s watch with shock resistance and world time feature.', 25),
(22, 'Casio Youth Series AE-1000W', 'casio_ae_1000w.jpg', 120, 40, 5, 'A digital watch designed for outdoor enthusiasts, featuring world time and stopwatch functions.', 21),
(54, 'Casio G-Shock GA2100-1A1', 'https://example.com/casio_ga2100_1a1.jpg', 150, 180, 10, 'A sleek and modern analog-digital watch with a carbon core guard structure.', 20),
(55, 'Casio Classic Analog MQ24-1E', 'https://example.com/casio_mq24_1e.jpg', 300, 15, 5, 'A timeless classic analog watch with a simple yet elegant design.', 20),
(56, 'Casio Edifice EFR556PC-2AV', 'https://example.com/casio_efr556pc_2av.jpg', 70, 200, 15, 'A stylish analog watch with a blue dial and stainless steel bracelet.', 20),
(57, 'Casio Pro Trek PRW-50Y-1ACR', 'https://example.com/casio_prw_50y_1acr.jpg', 120, 280, 20, 'A rugged outdoor watch with solar power and triple sensor technology.', 20),
(58, 'Casio Exilim EX-ZS6', 'https://example.com/casio_ex_zs6.jpg', 40, 120, 10, 'An affordable digital camera with a compact design and easy-to-use features.', 20),
(59, 'Casio Privia PX-160 Digital Piano', 'https://example.com/casio_px_160.jpg', 20, 700, 25, 'A versatile digital piano with realistic piano sound and weighted keys.', 21),
(60, 'Casio CDP-S100 Compact Digital Piano', 'https://example.com/casio_cdp_s100.jpg', 25, 400, 15, 'A portable digital piano with authentic piano sound and keyboard touch.', 21),
(61, 'Casio FX-9750GIII Graphing Calculator', 'https://example.com/casio_fx_9750giii.jpg', 150, 50, 5, 'A powerful graphing calculator with natural textbook display and USB connectivity.', 21),
(62, 'Casio Youth Series MCW-100H-9AV', 'https://example.com/casio_mcw_100h_9av.jpg', 90, 60, 10, 'A sporty men\'s watch with a black resin band and analog-digital display.', 25),
(63, 'Casio Women\'s LTP-S100D-7BVCF', 'https://example.com/casio_ltp_s100d_7bvcf.jpg', 80, 70, 10, 'A chic women\'s watch with a silver-tone stainless steel band and analog display.', 25),
(64, 'Casio Baby-G BGD-560CF-1', 'https://example.com/casio_bgd_560cf_1.jpg', 100, 90, 10, 'A trendy women\'s watch with a camouflage pattern and shock resistance.', 25),
(65, 'Casio Classic Digital A168WA-1', 'https://example.com/casio_a168wa_1.jpg', 200, 25, 5, 'A retro-style digital watch with a stainless steel bracelet and alarm function.', 26),
(66, 'Casio Edifice ECB-900DB-1A', 'https://example.com/casio_ecb_900db_1a.jpg', 60, 300, 20, 'A sophisticated men\'s watch with smartphone link and chronograph features.', 26),
(67, 'Casio Pro Trek PRG-330-1', 'https://example.com/casio_prg_330_1.jpg', 110, 220, 15, 'An outdoor watch with solar power and triple sensor technology for outdoor adventures.', 26),
(68, 'Casio Exilim EX-ZR800', 'https://example.com/casio_ex_zr800.jpg', 35, 150, 10, 'A compact digital camera with high-speed shooting and advanced image processing.', 27),
(69, 'Casio Privia PX-S3000 Digital Piano', 'https://example.com/casio_px_s3000.jpg', 15, 1000, 30, 'A slim and stylish digital piano with touch-responsive keys and Bluetooth audio.', 27),
(70, 'Casio CTK-2550 Portable Keyboard', 'https://example.com/casio_ctk_2550.jpg', 30, 100, 10, 'An entry-level portable keyboard with dance music mode and lesson functions.', 27),
(71, 'Casio FX-300ESPLUS Scientific Calculator', 'https://example.com/casio_fx_300esplus.jpg', 120, 20, 5, 'A versatile scientific calculator with natural textbook display and solar power.', 27),
(72, 'Casio Youth Series MRW-S310H-9BVCF', 'https://example.com/casio_mrw_s310h_9bvcf.jpg', 80, 45, 5, 'A durable men\'s watch with a black resin band and analog display.', 20),
(73, 'Casio Women\'s LQ139B-1B3', 'https://example.com/casio_lq139b_1b3.jpg', 150, 20, 5, 'A classic women\'s watch with a black resin band and analog display.', 20),
(74, 'Casio Baby-G BGA-180BE-2B', 'https://example.com/casio_bga_180be_2b.jpg', 90, 80, 10, 'A sporty women\'s watch with a blue resin band and analog-digital display.', 20),
(75, 'Casio Classic Analog MW240-1B', 'https://example.com/casio_mw240_1b.jpg', 180, 18, 5, 'A timeless analog watch with a black resin band and simple design.', 20),
(76, 'Casio Edifice EFR-S107D-1AV', 'https://example.com/casio_efr_s107d_1av.jpg', 50, 180, 15, 'A sleek men\'s watch with a stainless steel band and chronograph function.', 20),
(77, 'Casio Pro Trek PRG-600Y-1CR', 'https://example.com/casio_prg_600y_1cr.jpg', 100, 300, 20, 'An outdoor watch with solar power and triple sensor technology for hiking and trekking.', 21),
(78, 'Casio Exilim EX-ZR200', 'https://example.com/casio_ex_zr200.jpg', 25, 200, 10, 'A compact digital camera with high-speed shooting and wide-angle lens.', 21),
(79, 'Casio Privia PX-360 Digital Piano', 'https://example.com/casio_px_360.jpg', 10, 900, 25, 'A versatile digital piano with AiR sound source and weighted keys.', 21),
(80, 'Casio CTK-6250 Portable Keyboard', 'https://example.com/casio_ctk_6250.jpg', 20, 200, 15, 'A portable keyboard with piano-style keys and built-in song sequencer.', 25),
(81, 'Casio FX-991MSPLUS Scientific Calculator', 'https://example.com/casio_fx_991msplus.jpg', 130, 25, 5, 'A scientific calculator with 2-line display and multi-replay function.', 25),
(82, 'Casio Youth Series MTD-1079D-1AV', 'https://example.com/casio_mtd_1079d_1av.jpg', 70, 70, 10, 'A durable men\'s watch with a stainless steel band and analog-digital display.', 25),
(83, 'Casio Women\'s LTP-V001GL-7B2', 'https://example.com/casio_ltp_v001gl_7b2.jpg', 110, 25, 5, 'A chic women\'s watch with a leather band and simple analog display.', 26),
(84, 'Casio Baby-G BGA-195M-2A', 'https://example.com/casio_bga_195m_2a.jpg', 120, 90, 10, 'A sporty women\'s watch with metallic accents and shock resistance.', 26);

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
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
