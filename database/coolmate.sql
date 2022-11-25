create database coolmate;
use coolmate;


-- Cấu trúc bảng admin --
CREATE TABLE `admins` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admins` (`username`, `password`) VALUES
('admin', '12345');


------
--contact customer---
------
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


------
---member---
------
CREATE TABLE `member` (
    `id` int(11) NOT NULL,
    `username` varchar(20) NOT NULL,
    `phone_number` varchar(20) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(20) NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `feedback` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(20) NOT NULL,
    `phone_number` varchar(20) NOT NULL,
    `email` varchar(20) NOT NULL,
    `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` char(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`name`, `price`, `image`, `type`, `quantity`, `description`) VALUES
('Outlet - Áo sát nách thể thao nam Dri-Breathe thoáng mát tối đa','189000','','Áo Tank top','Vải Polyester tính năng','Chất liệu: 100% Polyester, tính năng Quick Dry (Nhanh Khô) Kiểu dệt Twill (chéo) mới mang lại cảm giác thoải mái khi mặc Phù hợp với: đi làm, đi chơi, mặc ở nhà Kiểu dáng: regularfit dáng suông')

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);


--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
