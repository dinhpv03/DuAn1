-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 04, 2023 lúc 09:45 PM
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
-- Cấu trúc bảng cho bảng `chi_tiet_ve_phim`
--

CREATE TABLE `chi_tiet_ve_phim` (
  `id_chitietvephim` int NOT NULL,
  `id_vephim` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cinema_room`
--

CREATE TABLE `cinema_room` (
  `id_room` int NOT NULL,
  `id_showtimes` int NOT NULL,
  `id_phim` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0: chưa đặt - 1: đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `date`
--

CREATE TABLE `date` (
  `id_date` int NOT NULL,
  `date_month` date NOT NULL,
  `id_phim` int NOT NULL DEFAULT '1',
  `stt` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `date`
--

INSERT INTO `date` (`id_date`, `date_month`, `id_phim`, `stt`) VALUES
(1, '2023-12-03', 1, 1),
(2, '2023-12-04', 1, 0),
(3, '2023-12-03', 2, 1),
(4, '2023-12-05', 2, 0);

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
-- Cấu trúc bảng cho bảng `loai_ve`
--

CREATE TABLE `loai_ve` (
  `id_loaive` int NOT NULL,
  `dinh_dang_ve` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hang_ghe` tinyint NOT NULL DEFAULT '0' COMMENT '0: ghế thường - 1: ghế vip',
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_ve`
--

INSERT INTO `loai_ve` (`id_loaive`, `dinh_dang_ve`, `hang_ghe`, `price`) VALUES
(1, '2D', 0, '60.000'),
(2, '2D', 1, '80.000'),
(3, '3D', 0, '100.000'),
(4, '3D', 1, '120.000');

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
(2, 'Five Nights At Freddy\'s', 'poster_2.webp', 'banner_2.webp', 'Năm đêm kinh hoàng (tựa tiếng Anh: Five Nights at Freddy\'s) là một bộ phim điện ảnh Mỹ thuộc thể loại kinh dị – siêu nhiên – giật gân ra mắt vào năm 2023 được Emma Tammi đạo diễn từ kịch bản mà cô cùng viết với Scott Cawthon và Seth Cuddeback. Được sản xuất bởi Blumhouse Productions và Striker Entertainment, bộ phim được dựa trên loạt trò chơi điện tử cùng tên được sản xuất bởi Cawthon, người đóng vai trò sản xuất với Jason Blum. Bộ phim có sự tham gia của Josh Hutcherson, Elizabeth Lail, Piper Rubio, và Matthew Lillard.', '136 phút', '2023-10-27', 2),
(7, 'Aquaman and the Lost Kingdom', 'poster_3.jpg', 'banner_3.jpg', 'Aquaman và Vương Quốc Thất Lạc là bộ phim siêu anh hùng của Mỹ ra mắt năm 2023 dựa trên nhân vật Aquaman từ DC Comics. Phim được sản xuất bởi DC Films, The Safran Company và Atomic Monster Productions và phân phối bởi Warner Bros. Pictures.', '115 phút', '2023-12-22', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seat`
--

CREATE TABLE `seat` (
  `id_seat` int NOT NULL,
  `seat_name` varchar(10) NOT NULL,
  `stt` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0: chưa đặt - 1: đã đặt',
  `id_loaive` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `seat`
--

INSERT INTO `seat` (`id_seat`, `seat_name`, `stt`, `status`, `id_loaive`) VALUES
(1, 'A', 1, 0, 1),
(2, 'A', 2, 0, 1),
(3, 'A', 3, 0, 1),
(4, 'A', 4, 0, 1),
(5, 'A', 5, 0, 1),
(6, 'A', 6, 0, 1),
(7, 'A', 7, 0, 1),
(8, 'A', 8, 0, 1),
(9, 'A', 9, 0, 1),
(10, 'A', 10, 0, 1),
(11, 'B', 1, 0, 1),
(12, 'B', 2, 0, 1),
(13, 'B', 3, 0, 1),
(14, 'B', 4, 0, 1),
(15, 'B', 5, 0, 1),
(16, 'B', 6, 0, 1),
(17, 'B', 7, 0, 1),
(18, 'B', 8, 0, 1),
(19, 'B', 9, 0, 1),
(20, 'B', 10, 0, 1),
(21, 'C', 1, 0, 2),
(22, 'C', 2, 0, 2),
(23, 'C', 3, 0, 2),
(24, 'C', 4, 0, 2),
(25, 'C', 5, 0, 2),
(26, 'C', 6, 0, 2),
(27, 'C', 7, 0, 2),
(28, 'C', 8, 0, 2),
(29, 'C', 9, 0, 2),
(30, 'C', 10, 0, 2),
(31, 'D', 1, 0, 2),
(32, 'D', 2, 0, 2),
(33, 'D', 3, 0, 2),
(34, 'D', 4, 0, 2),
(35, 'D', 5, 0, 2),
(36, 'D', 6, 0, 2),
(37, 'D', 7, 0, 2),
(38, 'D', 8, 0, 2),
(39, 'D', 9, 0, 2),
(40, 'D', 10, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showtimes`
--

CREATE TABLE `showtimes` (
  `id_showtimes` int NOT NULL,
  `time` time NOT NULL,
  `id_date` int NOT NULL,
  `id_phim` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `showtimes`
--

INSERT INTO `showtimes` (`id_showtimes`, `time`, `id_date`, `id_phim`) VALUES
(1, '09:00:00', 1, 1),
(2, '12:00:00', 1, 1),
(3, '15:00:00', 2, 1),
(4, '18:00:00', 1, 1),
(5, '20:00:00', 2, 1),
(6, '22:00:00', 1, 1),
(7, '09:00:00', 3, 2),
(8, '12:00:00', 3, 2),
(9, '15:00:00', 4, 2);

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
(1, 'duc', '123', 'duc@gmail.com', 123456, 'HN', 1);

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
-- Chỉ mục cho bảng `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  ADD PRIMARY KEY (`id_chitietvephim`),
  ADD KEY `chi_tiet_ve_phim_LK_ve_phim` (`id_vephim`);

--
-- Chỉ mục cho bảng `cinema_room`
--
ALTER TABLE `cinema_room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `cinema_room_LK_showtimes` (`id_showtimes`),
  ADD KEY `cinema_room_LK_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id_date`),
  ADD KEY `date_LK_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id_loaiphim`);

--
-- Chỉ mục cho bảng `loai_ve`
--
ALTER TABLE `loai_ve`
  ADD PRIMARY KEY (`id_loaive`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id_phim`),
  ADD KEY `phim_LK_loai_phim` (`id_loaiphim`);

--
-- Chỉ mục cho bảng `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`),
  ADD KEY `seat_LK_loai_ve` (`id_loaive`);

--
-- Chỉ mục cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id_showtimes`),
  ADD KEY `showtimes_LK_date` (`id_date`),
  ADD KEY `showtimes_LK_phim` (`id_phim`);

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
-- AUTO_INCREMENT cho bảng `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  MODIFY `id_chitietvephim` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cinema_room`
--
ALTER TABLE `cinema_room`
  MODIFY `id_room` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `date`
--
ALTER TABLE `date`
  MODIFY `id_date` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id_loaiphim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai_ve`
--
ALTER TABLE `loai_ve`
  MODIFY `id_loaive` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id_phim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `seat`
--
ALTER TABLE `seat`
  MODIFY `id_seat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id_showtimes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Các ràng buộc cho bảng `chi_tiet_ve_phim`
--
ALTER TABLE `chi_tiet_ve_phim`
  ADD CONSTRAINT `chi_tiet_ve_phim_LK_ve_phim` FOREIGN KEY (`id_vephim`) REFERENCES `ve_phim` (`id_vephim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `cinema_room`
--
ALTER TABLE `cinema_room`
  ADD CONSTRAINT `cinema_room_LK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cinema_room_LK_showtimes` FOREIGN KEY (`id_showtimes`) REFERENCES `showtimes` (`id_showtimes`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `date`
--
ALTER TABLE `date`
  ADD CONSTRAINT `date_LK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_LK_loai_phim` FOREIGN KEY (`id_loaiphim`) REFERENCES `loai_phim` (`id_loaiphim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_LK_loai_ve` FOREIGN KEY (`id_loaive`) REFERENCES `loai_ve` (`id_loaive`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_LK_date` FOREIGN KEY (`id_date`) REFERENCES `date` (`id_date`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `showtimes_LK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ve_phim`
--
ALTER TABLE `ve_phim`
  ADD CONSTRAINT `ve_phim_FK_bien_the_ve_phim` FOREIGN KEY (`id_bienthevephim`) REFERENCES `loai_ve` (`id_loaive`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_chon_ghe` FOREIGN KEY (`id_ghe`) REFERENCES `cinema_room` (`id_room`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_phim` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ve_phim_FK_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
