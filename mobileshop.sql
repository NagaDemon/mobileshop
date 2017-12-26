-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 05:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--


--
-- Table structure for table `blsanpham`
--

CREATE TABLE `blsanpham` (
  `id_bl` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `binh_luan` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_gio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blsanpham`
--

INSERT INTO `blsanpham` (`id_bl`, `id_sp`, `ten`, `dien_thoai`, `binh_luan`, `ngay_gio`) VALUES
(1, 1, 'Tin TQ', '01666068838', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus ligula nibh, consectetur gravida odio congue id. Suspendisse potenti.', '2017-11-03 09:19:30'),
(2, 1, 'Hoang NH', '01688896123', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus ligula nibh, consectetur gravida odio congue id. Suspendisse potenti.', '2017-10-09 06:19:30'),
(3, 1, 'Tuan LD', '01673979660', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus ligula nibh, consectetur gravida odio congue id. Suspendisse potenti.', '2017-07-24 08:20:11'),
(4, 1, 'Tuan HM', '0974129740', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus ligula nibh, consectetur gravida odio congue id. Suspendisse potenti.', '2017-05-15 02:29:18'),
(6, 36, 'Anonymous', '9999999', 'lorem ipsum dolor sit amet', '2017-11-03 18:05:22'),
(7, 4, 'a', 'b', 'c', '2017-11-16 17:40:09'),
(8, 4, 'trần quang tín', '01666068838', 'lorum ipsum dolor sit amet', '2017-11-16 17:40:41'),
(9, 6, 'uyguygu', '123123', 'b', '2017-12-12 09:03:02'),
(10, 6, 'dfasdf', '098481498498', 'dgergwerg', '2017-12-13 09:36:32'),
(11, 6, 'uyyu', '66546854', 'kjhkjhkj', '2017-12-22 04:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`) VALUES
(8, 'Asus'),
(7, 'Blackberry'),
(5, 'HTC'),
(1, 'iPhone'),
(9, 'Lenovo'),
(4, 'LG'),
(6, 'Nokia'),
(2, 'Samsung'),
(3, 'Sony Ericson'),
(12, 'Vertu');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(10) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` int(1) NOT NULL,
  `id_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_dh`, `ten`, `email`, `dien_thoai`, `dia_chi`, `tinh_trang`, `id_sp`, `so_luong`) VALUES
(16, 'Trần Quang Tín', 'tranquangtin710@gmail.com', '01666068838', 'Mipec Riverside Long Biên', 0, '5,6', '3,1'),
(17, 'tqt', 'afasdf@gmail.com', '14123213213', 'đống đa\r\n', 1, '6', '4'),
(18, 'Hoàng Minh Tuấn', 'minhtuan@gmail.com', '123456789', 'Cầu Giấy, Hà Nội', 1, '2,3', '2,6'),
(19, 'Hoàng Minh Tuấn', 'tuanhm@gmail.com', '0132465465465', 'Cầu Giấy', 0, '6,2', '4,3'),
(20, 'tín', 'tqt@gmail.com', '123', 'abc', 1, '1041,6', '3,6');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `id_dm` int(10) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `bao_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phu_kien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dac_biet` int(1) NOT NULL,
  `chi_tiet_sp` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `bao_hanh`, `phu_kien`, `tinh_trang`, `khuyen_mai`, `trang_thai`, `dac_biet`, `chi_tiet_sp`) VALUES
(1, 2, 'Samsung S7 Edge 11', 'samsungs7edge.png', 7000000, '6 tháng', 'Sạc pin, tai nghe', 'Máy mới 99%', 'Dán màn hình', 'Còn hàng', 1, 'Hàng xách tay'),
(2, 2, 'Samsung Note 8', 'samsungnote8.png', 16000000, '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', 'Dán màn hình', 'Còn hàng', 1, 'Hàng xách tay'),
(3, 1, 'iPhone 6S', 'iphone6s.png', 8000000, '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', 'Dán cường lực', 'Còn hàng', 1, 'Hàng xách tay'),
(4, 1, 'iPhone 6 Plus', 'iphone6plus.png', 10000000, '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', 'Dán cường lực', 'Còn hàng', 1, 'Hàng xách tay'),
(5, 1, 'iPhone 7 Plus', 'iphone7plus.png', 14000000, '12 tháng', 'Sạc pin, tai nghe', 'Máy Mới 100%', 'Dán cường lực', 'Còn hàng', 1, 'Hàng xách tay'),
(6, 1, 'iPhone X', 'iphonex.png', 30000000, '12 tháng', 'Sạc pin, tai nghe', 'Máy Mới 100%', 'Dán cường lực', 'Còn hàng', 1, 'Hàng xách tay');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(10) NOT NULL,
  `tai_khoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `tai_khoan`, `email`, `quyen_truy_cap`, `mat_khau`) VALUES
(1, 'tintran', 'tranquangtin710@gmail.com', 'Admin', 'tintran123'),
(2, 'huyhoang', 'nguyenhuyhoang@gmail.com', 'Admin', 'huyhoang123'),
(3, 'minhtuan', 'hoangminhtuan@gmail.com', 'Admin', 'minhtuan123'),
(4, 'dinhtuan', 'ledinhtuan@gmail.com', 'Admin', 'dinhtuan123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blsanpham`
--
ALTER TABLE `blsanpham`
  ADD PRIMARY KEY (`id_bl`);

--
-- Indexes for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`),
  ADD UNIQUE KEY `ten_dm` (`ten_dm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD UNIQUE KEY `ten_sp` (`ten_sp`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blsanpham`
--
ALTER TABLE `blsanpham`
  MODIFY `id_bl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1043;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
