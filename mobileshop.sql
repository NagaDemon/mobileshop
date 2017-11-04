-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 02:15 PM
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
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Sony Ericson'),
(4, 'LG'),
(5, 'HTC'),
(6, 'Nokia'),
(7, 'Blackberry'),
(8, 'Asus'),
(9, 'Lenovo'),
(10, 'Motorola'),
(11, 'Mobiado'),
(12, 'Vertu'),
(13, 'QMobile');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `id_dm` int(10) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` int(10) NOT NULL,
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
(1, 1, 'IPhone 3GS 32G Màu Đen', 'IPhone-3GS-32G-Mau-Den.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(2, 1, 'iPhone 4 16G Quốc Tế Trắng', 'iPhone-4-16G-Quoc-Te-Trang.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(3, 1, 'iPhone 5 16GB Quốc Tế Đen', 'iPhone-5-16GB-Quoc-Te-Den.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(4, 1, 'iPhone 5C 16GB Blue', 'iPhone-5C-16GB-Blue.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(5, 1, 'iPhone 5S 32GB Quốc tế Màu Trắng', 'iPhone-5S-32GB-Quoc-te-Mau-Trang.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(6, 2, 'Samsung Galaxy Note N7000 pink', 'Sam-Galaxy-Note-N7000-pink.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(7, 2, 'Samsung Galaxy Note 2 đen', 'samsung-galaxy-note-2-den.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(8, 2, 'Samsung Galaxy Note 3', 'samsung-galaxy-note-3.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(9, 2, 'Samsung Galaxy S2', 'samsung-galaxy-s2.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(10, 2, 'Samsung Galaxy S3', 'samsung-galaxy-s3.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(11, 2, 'Samsung Galaxy S4', 'samsung-galaxy-s4-galaxy.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(12, 3, 'Sony Arc S (LT18i) Trắng', 'Sony-arc-S-LT18i-Trang.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(13, 3, 'Sony Arc S', 'Sony-Arc-S.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(14, 3, 'Sony X10', 'sony-x10.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(15, 3, 'Sony Xperia TX (LT29i) Đen', 'Sony-Xperia-TX-LT29i-Den.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(16, 3, 'Sony Xperia Z Màu Đen', 'Sony-Xperia-Z-Mau-Den.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(17, 4, 'LG F160 Optimus LTE 2', 'LG-F160-Optimus-LTE-2.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(18, 4, 'LG LTE 3 (LG F260)', 'LG-LTE-3-LG F260.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(19, 4, 'LG Optimus 2X SU660', 'LG-optimus-2x-SU660.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(20, 4, 'LG Optimus 3D SU760', 'LG-Optimus-3D-SU760.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(21, 4, 'LG Optimus G', 'LG-Optimus-G.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(22, 4, 'LG Optimus L7(LG P705)', 'LG-Optimus-L7LG P705.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(23, 5, 'HTC EVO 3D', 'HTC-EVO-3D.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(24, 5, 'HTC One Đen 16GB công ty FPT', 'HTC-One-Den-16GB-cong-ty-FPT.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(25, 5, 'HTC One Trắng 16GB công ty FPT', 'HTC-One-Trang-16GB-cong-ty-FPT.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(26, 5, 'HTC one x white', 'htc-one-x-white.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(27, 5, 'HTC Windows Phone 8S', 'HTC-Windows-Phone-8S.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(28, 6, 'Lumia 800 đen', 'lumia-800-den.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(29, 6, 'Lumia 900 trắng', 'lumia-900-trang.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(30, 6, 'Lumia 920 hồng', 'lumia-920-hong.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(31, 6, 'Lumia 800 mau trắng', 'lumia-800-mau-trang.jpeg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(32, 6, 'Nokia 8800 Sirocco Gold', 'Nokia-8800-Sirocco-Gold.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(33, 7, 'Blackberry 8820', 'Blackberry-8820.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(34, 7, 'Blackberry 8830', 'Blackberry-8830.jpeg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(35, 7, 'Blackberry Bold 9000', 'Blackberry-Bold-9000.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(36, 7, 'BlackBerry Bold 9700', 'BlackBerry-Bold-9700.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.'),
(37, 7, 'BlackBerry Curve 3G 9300', 'BlackBerry-Curve-3G-9300.jpg', 8600000, '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 1, 'Tất cả các sản phẩm Điện thoại của Vietpro Mobile Shop đều là các sản phẩm chính hãng, được bảo hành 12 tháng trên toàn quốc.');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(10) NOT NULL,
  `tai_khoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `tai_khoan`, `mat_khau`, `quyen_truy_cap`) VALUES
(1, 'tintran', 'tintran123', 0),
(2, 'minhtuan', 'minhtuan123', 1),
(3, 'dinhtuan', 'dinhtuan123', 1),
(4, 'huyhoang', 'huyhoang123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
