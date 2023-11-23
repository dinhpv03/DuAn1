-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 23, 2023 lúc 05:23 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `booking_movie_ticket`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the_date`
--

CREATE TABLE `bien_the_date` (
  `id_date` int NOT NULL,
  `date_month` date NOT NULL,
  `id_phim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the_showtimes`
--

CREATE TABLE `bien_the_showtimes` (
  `id_showtimes` int NOT NULL,
  `time` time NOT NULL,
  `id_phim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bien_the_showtimes`
--

INSERT INTO `bien_the_showtimes` (`id_showtimes`, `time`, `id_phim`) VALUES
(1, '09:00:00', 1),
(2, '12:00:00', 1),
(3, '15:00:00', 1),
(4, '18:00:00', 1),
(5, '20:00:00', 1),
(6, '22:00:00', 1),
(7, '09:00:00', 2),
(8, '12:00:00', 2),
(9, '15:00:00', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the_ve_phim`
--

CREATE TABLE `bien_the_ve_phim` (
  `id_bienthevephim` int NOT NULL,
  `loai_ve` varchar(10) NOT NULL,
  `loai_ghe` varchar(50) NOT NULL,
  `price` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bien_the_ve_phim`
--

INSERT INTO `bien_the_ve_phim` (`id_bienthevephim`, `loai_ve`, `loai_ghe`, `price`) VALUES
(1, '2D', 'Ghế thường', 60.000),
(2, '2D', 'Ghế VIP', 80.000),
(3, '3D', 'Ghế thường', 90.000),
(4, '3D', 'Ghế VIP', 110.000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_ve_phim`
--

CREATE TABLE `chi_tiet_ve_phim` (
  `id_chitietvephim` int NOT NULL,
  `id_vephim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chon_ghe`
--

CREATE TABLE `chon_ghe` (
  `id_ghe` int NOT NULL,
  `seat_name` varchar(10) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0: chưa đặt - 1: đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chon_ghe`
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
-- Cấu trúc bảng cho bảng `loai_phim`
--

CREATE TABLE `loai_phim` (
  `id_loaiphim` int NOT NULL,
  `STT` tinyint NOT NULL DEFAULT '0',
  `the_loai_phim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Thể loại phim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_phim`
--

INSERT INTO `loai_phim` (`id_loaiphim`, `STT`, `the_loai_phim`) VALUES
(1, 0, 'Hành động'),
(2, 1, 'Kinh dị'),
(3, 2, 'Tình cảm'),
(4, 3, 'Hài kịch'),
(5, 4, 'Hoạt hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id_phim` int NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Ảnh Slide Show',
  `mo_ta` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `thoi_luong_phim` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `id_loaiphim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id_phim`, `film_name`, `poster`, `banner`, `mo_ta`, `thoi_luong_phim`, `release_date`, `id_loaiphim`) VALUES
(1, 'Avengers: Endgame', 'poster_1.jpeg', 'banner_1.jpg', 'Avengers: Hồi kết (tựa gốc tiếng Anh: Avengers: Endgame)\r\n                là phim điện ảnh siêu anh hùng Mỹ ra mắt năm 2019, \r\n                do Marvel Studios sản xuất và Walt Disney Studios Motion Pictures phân phối độc quyền tại thị trường Bắc Mỹ.', '109 phút', '2023-11-06', 1),
(2, 'Five Nights At Freddy\'s', 'poster_2.webp', 'banner_2.webp', 'Năm đêm kinh hoàng (tựa tiếng Anh: Five Nights at Freddy\'s) là một bộ phim điện ảnh Mỹ thuộc thể loại kinh dị – siêu nhiên – giật gân ra mắt vào năm 2023 được Emma Tammi đạo diễn từ kịch bản mà cô cùng viết với Scott Cawthon và Seth Cuddeback. Được sản xuất bởi Blumhouse Productions và Striker Entertainment, bộ phim được dựa trên loạt trò chơi điện tử cùng tên được sản xuất bởi Cawthon, người đóng vai trò sản xuất với Jason Blum. Bộ phim có sự tham gia của Josh Hutcherson, Elizabeth Lail, Piper Rubio, và Matthew Lillard.', '136 phút', '2023-10-27', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number_phone` int DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `number_phone`, `address`, `role`) VALUES
(1, 'duc', '123', 'duc@gmail.com', 123456, 'Kim Hoa', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve_phim`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bien_the_date`
--
ALTER TABLE `bien_the_date`
  ADD PRIMARY KEY (`id_date`),
  ADD KEY `bien_the_date_LK_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `bien_the_showtimes`
--
ALTER TABLE `bien_the_showtimes`
  ADD PRIMARY KEY (`id_showtimes`),
  ADD KEY `bien_the_showtimes_LK_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `bien_the_ve_phim`
--
ALTER TABLE `bien_the_ve_phim`
  ADD PRIMARY KEY (`id_bienthevephim`);

--
-- Chỉ mục cho bảng `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  ADD PRIMARY KEY (`id_chitietvephim`),
  ADD KEY `chi_tiet_ve_phim_LK_ve_phim` (`id_vephim`);

--
-- Chỉ mục cho bảng `chon_ghe`
--
ALTER TABLE `chon_ghe`
  ADD PRIMARY KEY (`id_ghe`);

--
-- Chỉ mục cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id_loaiphim`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id_phim`),
  ADD KEY `phim_LK_loai_phim` (`id_loaiphim`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `ve_phim`
--
ALTER TABLE `ve_phim`
  ADD PRIMARY KEY (`id_vephim`),
  ADD KEY `ve_phim_FK_bien_the_ve_phim` (`id_bienthevephim`),
  ADD KEY `ve_phim_FK_chon_ghe` (`id_ghe`),
  ADD KEY `ve_phim_FK_phim` (`id_phim`),
  ADD KEY `ve_phim_FK_chon_suat_chieu` (`id_suatchieu`),
  ADD KEY `ve_phim_FK_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bien_the_date`
--
ALTER TABLE `bien_the_date`
  MODIFY `id_date` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bien_the_showtimes`
--
ALTER TABLE `bien_the_showtimes`
  MODIFY `id_showtimes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bien_the_ve_phim`
--
ALTER TABLE `bien_the_ve_phim`
  MODIFY `id_bienthevephim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  MODIFY `id_chitietvephim` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chon_ghe`
--
ALTER TABLE `chon_ghe`
  MODIFY `id_ghe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id_loaiphim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id_phim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ve_phim`
--
ALTER TABLE `ve_phim`
  MODIFY `id_vephim` int NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bien_the_date`
--
ALTER TABLE `bien_the_date`
  ADD CONSTRAINT `bien_the_date_LK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `bien_the_showtimes`
--
ALTER TABLE `bien_the_showtimes`
  ADD CONSTRAINT `bien_the_showtimé_LK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  ADD CONSTRAINT `chi_tiet_ve_phim_LK_ve_phim` FOREIGN KEY (`id_vephim`) REFERENCES `ve_phim` (`id_vephim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_LK_loai_phim` FOREIGN KEY (`id_loaiphim`) REFERENCES `loai_phim` (`id_loaiphim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ve_phim`
--
ALTER TABLE `ve_phim`
  ADD CONSTRAINT `ve_phim_FK_bien_the_ve_phim` FOREIGN KEY (`id_bienthevephim`) REFERENCES `bien_the_ve_phim` (`id_bienthevephim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_chon_ghe` FOREIGN KEY (`id_ghe`) REFERENCES `chon_ghe` (`id_ghe`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
