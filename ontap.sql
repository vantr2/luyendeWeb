-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 10:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ontap`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietvandon`
--

CREATE TABLE `chitietvandon` (
  `id` varchar(32) NOT NULL,
  `vandon_id` varchar(32) NOT NULL,
  `hanghoa_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `quycach` text NOT NULL,
  `hangsx_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `hovaten`, `dienthoai`, `email`, `diachi`) VALUES
(1, 'Trần Trọng Văn', '0354457151', 'van75780@st.vimaru.edu.vn', 'Thủy Nguyên Hải Phòng'),
(2, 'Nguyễn Huy Hùng', '0342143343', 'hung8232@gmail.com', 'Vĩnh Bảo Hải Phòng'),
(3, 'Phạm Trung Thành', '0123492948', 'sdsdad@gmail.com', 'Hà Nội Thanh Lịch');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `tendaydu` varchar(255) NOT NULL,
  `quyenhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `matkhau`, `tendaydu`, `quyenhan`) VALUES
(1, 'trongvan', '123456', 'Trần Trọng Văn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vandon`
--

CREATE TABLE `vandon` (
  `id` varchar(32) NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `nguoinhan` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `diachi` text NOT NULL,
  `ngaygiaohang` datetime NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vandon`
--

INSERT INTO `vandon` (`id`, `nhanvien_id`, `trangthai`, `nguoinhan`, `dienthoai`, `diachi`, `ngaygiaohang`, `ghichu`) VALUES
('DH001', 1, 0, 'Trịnh Thị Tằm', '0354457151', 'Cổ Am Vĩnh Bảo Hải Phòng', '2020-01-03 00:00:00', 'Đơn hàng này giao ở nông thôn'),
('DH002', 1, 0, 'Trần Thị Hiền', '0345678978', 'Hải Hậu Nam Định', '2019-12-30 00:00:00', 'Đơn hàng này đã thanh toán'),
('DH003', 2, 0, 'Nguyễn Thành Đô', '0324564684', 'Thủy Nguyên Hải Phòng', '2020-11-05 00:00:00', 'Đơn hàng này không mất tiền ship'),
('DH004', 1, 0, 'Vũ Thị The', '0123456789', 'Thái Bình', '2021-01-03 04:14:41', 'Ngoại tỉnh'),
('DH005', 1, 0, 'Vũ Thị The', '0123456789', 'Thái Bình', '2021-01-03 04:15:06', 'Ngoại tỉnh'),
('DH006', 3, 1, 'Vũ Gia Hưng', '0123456789', 'Vĩnh Tiến Hải Phòng', '2021-01-03 04:17:18', 'Đơn hàng của trẻ con'),
('DH007', 2, 0, 'Vũ Thị The', '0123456789', 'Thái Bình', '2021-01-03 04:19:25', 'Đơn hàng ngoại tỉnh\r\n'),
('DH008', 3, 1, 'Vũ Gia Hưng', '0123456789', 'Vĩnh Tiến', '2021-01-03 04:20:17', 'Đơn hàng của trẻ con');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_vandon`
-- (See below for the actual view)
--
CREATE TABLE `v_vandon` (
`id` varchar(32)
,`hovaten` varchar(255)
,`trangthai` varchar(9)
,`nguoinhan` varchar(255)
,`dienthoai` varchar(10)
,`diachi` text
,`ngaygiaohang` datetime
,`ghichu` text
);

-- --------------------------------------------------------

--
-- Structure for view `v_vandon`
--
DROP TABLE IF EXISTS `v_vandon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_vandon`  AS SELECT `t1`.`id` AS `id`, `t2`.`hovaten` AS `hovaten`, if(`t1`.`trangthai` = '0','Đang giao','Đã nhận') AS `trangthai`, `t1`.`nguoinhan` AS `nguoinhan`, `t1`.`dienthoai` AS `dienthoai`, `t1`.`diachi` AS `diachi`, `t1`.`ngaygiaohang` AS `ngaygiaohang`, `t1`.`ghichu` AS `ghichu` FROM (`vandon` `t1` join `nhanvien` `t2` on(`t2`.`id` = `t1`.`nhanvien_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietvandon`
--
ALTER TABLE `chitietvandon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ctvd_hh` (`hanghoa_id`),
  ADD KEY `FK_ctvd_vd` (`vandon_id`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hsx_hh` (`hangsx_id`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vandon`
--
ALTER TABLE `vandon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_vd_nv` (`nhanvien_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietvandon`
--
ALTER TABLE `chitietvandon`
  ADD CONSTRAINT `FK_ctvd_hh` FOREIGN KEY (`hanghoa_id`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `FK_ctvd_vd` FOREIGN KEY (`vandon_id`) REFERENCES `vandon` (`id`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_hsx_hh` FOREIGN KEY (`hangsx_id`) REFERENCES `hangsanxuat` (`id`);

--
-- Constraints for table `vandon`
--
ALTER TABLE `vandon`
  ADD CONSTRAINT `FK_vd_nv` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
