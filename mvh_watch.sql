-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2024 lúc 07:10 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvh_watch`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_kh` int(10) UNSIGNED NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `noi_dung` varchar(50) NOT NULL,
  `ngay_bl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `hinh` varchar(200) NOT NULL,
  `so_luong` int(10) NOT NULL DEFAULT 1,
  `don_gia` int(11) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `mo_ta` varchar(500) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `hinh`, `so_luong`, `don_gia`, `giam_gia`, `mo_ta`, `trang_thai`, `ma_loai`) VALUES
(13, 'Casio G-Shock GA2100-4A', 'casio_ga2100_4a.jpg', 1, 1500, 10, 'A rugged yet stylish analog-digital watch with carbon core guard structure.', 1, 20),
(15, 'Casio Edifice EFV130D-1A', 'casio_efv130d_1a.jpg', 1, 120, 15, 'A sophisticated analog watch with a stainless steel bracelet and chronograph features.', 0, 21),
(16, 'Casio Pro Trek PRW-60-2A', 'casio_prw_60_2a.jpg', 1, 250, 20, 'A high-performance outdoor watch with triple sensor technology for accurate readings.', 0, 29),
(21, 'Casio Baby-G BGA-190BC-1B', 'casio_bga_190bc_1b.jpg', 1, 100, 10, 'A sporty and stylish women\'s watch with shock resistance and world time feature.', 0, 25),
(54, 'Casio G-Shock GA2100-1A1', 'casio_ga2100_1a1.jpg', 1, 180, 10, 'A sleek and modern analog-digital watch with a carbon core guard structure.', 0, 20),
(56, 'Casio Edifice EFR556PC-2AV', 'casio_efr556pc_2av.jpg', 1, 200, 15, 'A stylish analog watch with a blue dial and stainless steel bracelet.', 0, 21),
(57, 'Casio Pro Trek PRW-50Y-1ACR', 'casio_prw_50y_1acr.jpg', 1, 280, 20, 'A rugged outdoor watch with solar power and triple sensor technology.', 0, 29),
(63, 'Casio Women\'s LTP-S100D-7BVCF', 'casio_ltp_s100d_7bvcf.jpg', 1, 70, 10, 'A chic women\'s watch with a silver-tone stainless steel band and analog display.', 0, 30),
(64, 'Casio Baby-G BGD-560CF-1', 'casio_bgd_560cf_1.jpg', 1, 90, 10, 'A trendy women\'s watch with a camouflage pattern and shock resistance.', 0, 25),
(66, 'Casio Edifice ECB-900DB-1A', 'casio_ecb_900db_1a.jpg', 1, 300, 20, 'A sophisticated men\'s watch with smartphone link and chronograph features.', 0, 21),
(67, 'Casio Pro Trek PRG-330-1', 'casio_prg_330_1.jpg', 1, 220, 15, 'An outdoor watch with solar power and triple sensor technology for outdoor adventures.', 0, 29),
(73, 'Casio Women\'s LQ139B-1B3', 'casio_lq139b_1b3.jpg', 1, 20, 5, 'A classic women\'s watch with a black resin band and analog display.', 0, 30),
(74, 'Casio Baby-G BGA-180BE-2B', 'casio_bga_180be_2b.jpg', 1, 80, 10, 'A sporty women\'s watch with a blue resin band and analog-digital display.', 0, 25),
(76, 'Casio Edifice EFR-S107D-1AV', 'casio_efr_s107d_1av.jpg', 1, 180, 15, 'A sleek men\'s watch with a stainless steel band and chronograph function.', 0, 21),
(77, 'Casio Pro Trek PRG-600Y-1CR', 'casio_prg_600y_1cr.jpg', 1, 300, 20, 'An outdoor watch with solar power and triple sensor technology for hiking and trekking.', 0, 29),
(83, 'Casio Women\'s LTP-V001GL-7B2', 'casio_ltp_v001gl_7b2.jpg', 1, 25, 5, 'A chic women\'s watch with a leather band and simple analog display.', 0, 30),
(84, 'Casio Baby-G BGA-195M-2A', 'casio_bga_195m_2a.jpg', 1, 90, 10, 'A sporty women\'s watch with metallic accents and shock resistance.', 0, 25),
(85, 'Casio SHE-4554D-2A', 'casio_she4554d_2a.jpg', 1, 200, 10, 'A sleek SHEEN watch with a stainless steel band and analog display.', 0, 27),
(86, 'Casio SHE-4563BL-8A', 'casio_she4563bl_8a.jpg', 1, 250, 15, 'A luxurious SHEEN watch with a gold-tone bracelet and chronograph features.', 0, 27),
(87, 'Casio SHE-4562BM-2A', 'casio_she4562bm_2a.jpg', 1, 180, 10, 'An elegant SHEEN watch with a mother-of-pearl dial and leather band.', 0, 27),
(88, 'Casio SHE-4560BD-1A', 'casio_she4560bd_1a.jpg', 1, 220, 10, 'A sophisticated SHEEN watch with a rose gold finish and analog-digital display.', 0, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ngay_mua` date NOT NULL DEFAULT current_timestamp(),
  `ghi_chu` varchar(50) NOT NULL,
  `tinh_trang` varchar(20) NOT NULL DEFAULT '0',
  `ma_kh` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `ngay_mua`, `ghi_chu`, `tinh_trang`, `ma_kh`) VALUES
(10, '2024-05-12', '', '1', 5),
(13, '2024-05-12', '', '1', 9),
(14, '2024-05-12', '', '1', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hd` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `duong` varchar(20) NOT NULL,
  `phuong` varchar(20) NOT NULL,
  `quan` varchar(20) NOT NULL,
  `thanh_pho` varchar(20) NOT NULL,
  `Thanh_toan` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hd`, `ma_hh`, `so_luong`, `duong`, `phuong`, `quan`, `thanh_pho`, `Thanh_toan`) VALUES
(10, 13, 0, '', '', '', '', b'0'),
(13, 15, 0, '123 caigido', '2', '5', 'Hồ Chí Minh', b'1'),
(13, 54, 0, '123 caigido', '2', '5', 'Hồ Chí Minh', b'1'),
(14, 56, 0, '123 caigido', '2', '5', 'Hồ Chí Minh', b'1'),
(14, 57, 0, '123 caigido', '2', '5', 'Hồ Chí Minh', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(12) NOT NULL,
  `duong` varchar(50) NOT NULL,
  `phuong` varchar(10) NOT NULL,
  `quan` varchar(20) NOT NULL,
  `thanh_pho` varchar(20) NOT NULL,
  `trang_thai` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_dang_nhap`, `ho_ten`, `mat_khau`, `email`, `sdt`, `duong`, `phuong`, `quan`, `thanh_pho`, `trang_thai`) VALUES
(4, 'hieu', 'Nguyễn Quang Hiếu', '123', 'h@gmail.com', 12345678, 'Quận 12', '0', '', '0', b'0'),
(5, 'manh', 'tran manh', '123', 'manh@gmail.com', 931439171, '460 nơ trang long', 'phường 13', 'Bình Thành', 'Hồ Chí Minh', b'0'),
(7, 'bebon', 'Thùy Trang', '0606', 'bon@gmail.com', 123456789, '460 nơ trang long phường 13 quận bình thạnh', '0', '', '0', b'0'),
(9, 'vydethuong', 'Nguyễn Ngọc Thúy Vy', '123', 'vydethuong@gmail.com', 123456789, '123 caigido', '2', '5', 'Hồ Chí Minh', b'0'),
(10, 'Test', 'TEST', '123', 'test@gmail.com', 123456789, '123 caigido', 'phường 2', 'quận 5', 'Hồ Chí Minh', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`) VALUES
(20, 'Gshock'),
(21, 'Edifice'),
(25, 'Baby-G'),
(27, 'Sheen'),
(29, 'Pro Trek'),
(30, 'Women\'s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `ManagerID` int(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Manager_Full_Name` varchar(30) NOT NULL,
  `Manager_Phone` varchar(15) NOT NULL,
  `Manager_email` varchar(100) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `manager`
--

INSERT INTO `manager` (`ManagerID`, `password`, `Manager_Full_Name`, `Manager_Phone`, `Manager_email`, `Address`, `status`) VALUES
(4, '123', 'Phuc Manh', '0931439171', 'phucmanhtran08@gmail.com', '460 Nơ Trang Long, Phường 13 Quận BThạnh', b'0'),
(5, '0606', 'Thùy Trang', '0931439172', 'manh@gmail.com', 'tphcm', b'0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_kh`,`ma_hh`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `hanghoa_loaihang` (`ma_loai`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `hoadon_khachhang` (`ma_kh`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hd`,`ma_hh`,`so_luong`),
  ADD KEY `hdchitiet_hanghoa` (`ma_hh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `manager`
--
ALTER TABLE `manager`
  MODIFY `ManagerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `khachhang_binhluan` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hanghoa_loaihang` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoadon_khachhang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hdchitiet_hanghoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `hdchitiet_hoadon` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
