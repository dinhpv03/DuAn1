-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2023 at 04:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bien_the_date`
--

CREATE TABLE `bien_the_date` (
  `id_date` int NOT NULL,
  `day` int NOT NULL,
  `month` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bien_the_showtimes`
--

CREATE TABLE `bien_the_showtimes` (
  `id_time` int NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bien_the_ve_phim`
--

CREATE TABLE `bien_the_ve_phim` (
  `id_bienthevephim` int NOT NULL,
  `loai_ve` varchar(10) NOT NULL,
  `price` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bien_the_ve_phim`
--

INSERT INTO `bien_the_ve_phim` (`id_bienthevephim`, `loai_ve`, `price`) VALUES
(1, '2D', 80.000);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_ve_phim`
--

CREATE TABLE `chi_tiet_ve_phim` (
  `id_chitietvephim` int NOT NULL,
  `id_vephim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chon_ghe`
--

CREATE TABLE `chon_ghe` (
  `id_ghe` int NOT NULL,
  `seat_name` varchar(10) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0: chưa đặt - 1: đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chon_ghe`
--

INSERT INTO `chon_ghe` (`id_ghe`, `seat_name`, `status`) VALUES
(1, 'A1', 0),
(2, 'A2', 0),
(3, 'A3', 0),
(4, 'A4', 0),
(5, 'A5', 0),
(6, 'A6', 0),
(7, 'A7', 0),
(8, 'A8', 0),
(9, 'A9', 0),
(10, 'A10', 0),
(11, 'B1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chon_suat_chieu`
--

CREATE TABLE `chon_suat_chieu` (
  `id_suatchieu` int NOT NULL COMMENT 'ID',
  `id_date` int NOT NULL,
  `id_time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_phim`
--

CREATE TABLE `loai_phim` (
  `id_loaiphim` int NOT NULL,
  `STT` tinyint NOT NULL DEFAULT '0',
  `loai_phim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Thể loại phim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loai_phim`
--

INSERT INTO `loai_phim` (`id_loaiphim`, `STT`, `loai_phim`) VALUES
(1, 0, 'Hành động'),
(2, 1, 'Kinh dị'),
(3, 2, 'Tình cảm'),
(4, 3, 'Hài kịch'),
(5, 4, 'Hoạt hình');

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `id_phim` int NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `thoi_luong_phim` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `id_suatchieu` int NOT NULL,
  `id_loaiphim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number_phone` varchar(10) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `number_phone`, `address`, `role`) VALUES
(13, 'dinhde3', 'dinh03', 'dinhpvph31545@fpt.edu.vn', '0345499091', 'HN', 1),
(14, 'dinh1', 'dinh2003', 'phdinh1403@gmail.com', '0345499091', 'Hà Nội', 0),
(15, 'dinh', 'dinh2003', 'dinhpvph31545@fpt.edu.vn', '0345499091', 'Hà Nội', 1),
(23, 'dinh', '23e23', 'phdinh1403@gmail.com', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ve_phim`
--

CREATE TABLE `ve_phim` (
  `id_vephim` int NOT NULL,
  `id_ghe` int NOT NULL,
  `id_suatchieu` int NOT NULL,
  `id_bienthevephim` int NOT NULL,
  `id_phim` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bien_the_date`
--
ALTER TABLE `bien_the_date`
  ADD PRIMARY KEY (`id_date`);

--
-- Indexes for table `bien_the_showtimes`
--
ALTER TABLE `bien_the_showtimes`
  ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `bien_the_ve_phim`
--
ALTER TABLE `bien_the_ve_phim`
  ADD PRIMARY KEY (`id_bienthevephim`);

--
-- Indexes for table `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  ADD PRIMARY KEY (`id_chitietvephim`),
  ADD KEY `chi_tiet_ve_phim_LK_ve_phim` (`id_vephim`);

--
-- Indexes for table `chon_ghe`
--
ALTER TABLE `chon_ghe`
  ADD PRIMARY KEY (`id_ghe`);

--
-- Indexes for table `chon_suat_chieu`
--
ALTER TABLE `chon_suat_chieu`
  ADD PRIMARY KEY (`id_suatchieu`),
  ADD KEY `chon_suat_chieu_LK_bien_the_date` (`id_date`),
  ADD KEY `chon_suat_chieu_LK_bien_the_showtimes` (`id_time`);

--
-- Indexes for table `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id_loaiphim`);

--
-- Indexes for table `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id_phim`),
  ADD KEY `phim_LK_loai_phim` (`id_loaiphim`),
  ADD KEY `phim_LK_chon_suat_chieu` (`id_suatchieu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ve_phim`
--
ALTER TABLE `ve_phim`
  ADD PRIMARY KEY (`id_vephim`),
  ADD KEY `ve_phim_FK_bien_the_ve_phim` (`id_bienthevephim`),
  ADD KEY `ve_phim_FK_chon_ghe` (`id_ghe`),
  ADD KEY `ve_phim_FK_phim` (`id_phim`),
  ADD KEY `ve_phim_FK_chon_suat_chieu` (`id_suatchieu`),
  ADD KEY `ve_phim_FK_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bien_the_date`
--
ALTER TABLE `bien_the_date`
  MODIFY `id_date` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bien_the_showtimes`
--
ALTER TABLE `bien_the_showtimes`
  MODIFY `id_time` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bien_the_ve_phim`
--
ALTER TABLE `bien_the_ve_phim`
  MODIFY `id_bienthevephim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  MODIFY `id_chitietvephim` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chon_ghe`
--
ALTER TABLE `chon_ghe`
  MODIFY `id_ghe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chon_suat_chieu`
--
ALTER TABLE `chon_suat_chieu`
  MODIFY `id_suatchieu` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id_loaiphim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phim`
--
ALTER TABLE `phim`
  MODIFY `id_phim` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ve_phim`
--
ALTER TABLE `ve_phim`
  MODIFY `id_vephim` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  ADD CONSTRAINT `chi_tiet_ve_phim_LK_ve_phim` FOREIGN KEY (`id_vephim`) REFERENCES `ve_phim` (`id_vephim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chon_suat_chieu`
--
ALTER TABLE `chon_suat_chieu`
  ADD CONSTRAINT `chon_suat_chieu_LK_bien_the_date` FOREIGN KEY (`id_date`) REFERENCES `bien_the_date` (`id_date`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chon_suat_chieu_LK_bien_the_showtimes` FOREIGN KEY (`id_time`) REFERENCES `bien_the_showtimes` (`id_time`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_LK_chon_suat_chieu` FOREIGN KEY (`id_suatchieu`) REFERENCES `chon_suat_chieu` (`id_suatchieu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `phim_LK_loai_phim` FOREIGN KEY (`id_loaiphim`) REFERENCES `loai_phim` (`id_loaiphim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ve_phim`
--
ALTER TABLE `ve_phim`
  ADD CONSTRAINT `ve_phim_FK_bien_the_ve_phim` FOREIGN KEY (`id_bienthevephim`) REFERENCES `bien_the_ve_phim` (`id_bienthevephim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_chon_ghe` FOREIGN KEY (`id_ghe`) REFERENCES `chon_ghe` (`id_ghe`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_chon_suat_chieu` FOREIGN KEY (`id_suatchieu`) REFERENCES `chon_suat_chieu` (`id_suatchieu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
