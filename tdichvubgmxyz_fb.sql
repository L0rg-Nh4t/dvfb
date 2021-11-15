-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 10, 2021 lúc 09:39 PM
-- Phiên bản máy phục vụ: 10.3.30-MariaDB-log-cll-lve
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tdichvubgmxyz_fb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `loaithe` varchar(32) NOT NULL,
  `menhgia` int(11) NOT NULL,
  `thucnhan` int(11) DEFAULT 0,
  `seri` text NOT NULL,
  `pin` text NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `cards`
--

INSERT INTO `cards` (`id`, `code`, `username`, `loaithe`, `menhgia`, `thucnhan`, `seri`, `pin`, `createdate`, `status`, `note`) VALUES
(0, 'sg1LzibIHkfU', 'admin', 'VINAPHONE', 10000, 7800, '59000016185890', '75073972192262', '2021-05-16 09:33:39', 'thanhcong', ''),
(0, 'iuGzeHCsVbKR', 'admin', 'VIETTEL', 10000, 7800, '10006889203957', '715295975692518', '2021-05-18 14:29:05', 'thanhcong', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like`
--

CREATE TABLE `like` (
  `link_post` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `like`
--

INSERT INTO `like` (`link_post`, `amount`, `username`, `order_code`) VALUES
('https://www.facebook.com/Vinhjam/posts/477516133462913', '100', 'admin', 'MSN_W615VVITNXIT'),
('https://www.facebook.com/Vinhjam/posts/477516133462913', '100', 'admin', 'MSN_1PFRTQMGPZMP'),
('https://www.facebook.com/Vinhjam/posts/477516133462913', '200', 'admin', 'MSN_06X6NTWY5LPL'),
('https://www.facebook.com/Vinhjam/posts/477516133462913', '100', 'admin', 'MSN_ZXLP15QOC2H5'),
('https://www.facebook.com/Vinhjam/posts/477516133462913', '100', 'admin', 'MSN_MU8896PENA2A'),
('https://www.facebook.com/Vinhjam/posts/477516133462913', '100', 'admin', 'MSN_01AN10XZHLQT'),
('https://www.facebook.com/Vinhjam/posts/477516133462913', '100', 'admin', 'MSN_1FVEGQCKSAT8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tranId` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tien` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `momo`
--

INSERT INTO `momo` (`username`, `tranId`, `time`, `tien`) VALUES
('admin', '12132634729', '15/5/21', '30000'),
('admin', '12133499631', '1621094288', '100'),
('admin', '12133500549', '15/05/21', '900');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `idpage` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `page`
--

INSERT INTO `page` (`idpage`, `amount`, `username`, `order_code`) VALUES
('', '100', 'admin', 'MSN_MJREX6OIBTK2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub`
--

CREATE TABLE `sub` (
  `idfb` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `sub`
--

INSERT INTO `sub` (`idfb`, `amount`, `username`, `order_code`) VALUES
('100036135908805', '101', 'admin', 'MSN_8R6ES1UBC4QT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tsr`
--

CREATE TABLE `tsr` (
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tranId` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tien` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `tsr`
--

INSERT INTO `tsr` (`username`, `tranId`, `tien`, `time`) VALUES
('admin', 'T609F888904F27', '15000', '15/5/21'),
('admin', 'T60A078F9151C7', '10000đ', '16/05/21'),
('admin', 'T60A4AD9384A13', '10000đ', '19/05/21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `money` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `time` varchar(32) NOT NULL,
  `total_nap` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `money`, `level`, `time`, `total_nap`) VALUES
('quangvinhnguyen026@gmail.com', 'adminori', 'adminori', 87480, 3, '2021-05-15 12:50:44', '91600'),
('hoanghoang0317@gmail.com', 'Hoang0307', 'hoang2005', 0, 0, '2021-05-15 23:03:30', '0'),
('nguyenhongkong888@gmail.com', 'nguyenhongkong', 'Kongne00@@', 0, 0, '2021-05-15 23:05:46', '0'),
('quyenkill125@gmail.com', 'hackerteam', '0969545924', 0, 0, '2021-05-16 19:39:52', '0'),
('vrtwkbq_moiduescu_1606916152@tfbnw.net', 'trunghoang', '19772007', 0, 0, '2021-05-17 09:31:37', '0'),
('nguyenthihang19950409@gmail.com', 'emceean', '0977057822an', 0, 0, '2021-05-17 11:09:02', '0'),
('tuyen21406@gmail.com', 'tuyen214', 'tuyen123', 0, 0, '2021-05-17 13:11:48', '0'),
('hu@gmail.com.vn', 'Mảrk', '1', 0, 0, '2021-05-17 13:12:32', '0'),
('khongvanduong.info@gmail.com', 'quaformloginvoiregtrongbuoncuoiv', 'concacne123', 0, 0, '2021-05-17 14:30:07', '0'),
('minhkhoi7811@gmail.com', 'jjjon112', 'minhkhoi7811', 0, 0, '2021-05-17 21:15:46', '0'),
('vuong@vuong.xyz', 'vuongaz', 'vuongaz', 0, 0, '2021-05-17 20:53:15', '0'),
('aduhack@gamil.com', 'phamtrong13', 'F4E83ZzBS9apqcr', 0, 0, '2021-05-18 18:15:23', '0'),
('dinhhung1508204@gmail.com', 'Dinhhung1508', 'hung1234', 0, 0, '2021-05-18 18:29:32', '0'),
('R90xcapturer@gmail.com', 'HaiOcCho', 'HaiOcCho', 0, 0, '2021-05-18 18:44:40', '0'),
('mcong922@gmail.com', 'congcaycu', 'Cong061204', 0, 0, '2021-05-18 19:01:30', '0'),
('duyp2841@gmail.com', 'kgđyldulfild', 'kgđyldulfild', 0, 0, '2021-05-19 09:42:07', '0'),
('phanducduy456@gmail.com', 'Yddufufufufu', 'Yddufufufufu', 0, 0, '2021-05-19 09:56:31', '0'),
('phanducduy55@gmail.com', 'phanducduy123', 'phanducduy12345@@', 0, 0, '2021-05-19 11:48:53', '0'),
('anhquat644@gmail.com', 'adminori', 'adminori', 0, 0, '2021-08-10 21:32:23', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
