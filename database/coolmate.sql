create database coolmate;
use coolmate;

-- Cấu trúc bảng admin --
CREATE TABLE admins (
  email varchar(50) NOT NULL,
  password varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admins (email, password) VALUES
('admin', '12345');



CREATE TABLE contacts (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  phone char(10) NOT NULL,
  mail varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE members (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(20) NOT NULL,
    phone_number varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    password varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE feedback (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(20) NOT NULL,
    phone_number varchar(20) NOT NULL,
    email varchar(20) NOT NULL,
    content varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE products (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name char(255) NOT NULL,
  price int(11) NOT NULL,
  image varchar(255) NOT NULL,
  type varchar(20) NOT NULL,
  material varchar(20) NOT NULL,
  description varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products (name, price, image, type, material, description) VALUES
('Outlet - Áo sát nách thể thao nam Dri-Breathe thoáng mát tối đa','189000','https://media.coolmate.me/cdn-cgi/image/quality=80,format=auto/uploads/April2022/thumb_sat_nach_xam.jpg','Áo Tank top','Vải Polyester tính năng','Chất liệu: 100% Polyester, tính năng Quick Dry (Nhanh Khô) Kiểu dệt Twill (chéo) mới mang lại cảm giác thoải mái khi mặc Phù hợp với: đi làm, đi chơi, mặc ở nhà Kiểu dáng: regularfit dáng suông'),
('Áo Tank Top thể thao nam Recycle Active V1','159000','https://media.coolmate.me/cdn-cgi/image/quality=80,format=auto/uploads/August2022/_MG_2334-Recovered3_94.jpg','Áo Tank top','Vải Recycle','Chất liệu 100% Recycle Polyester, theo xu hướng thời trang bền vững Công nghệ ứng dụng: Wicking (thoáng khí) & Quick-Dry (Nhanh khô) Phù hợp với: chơi thể thao Kiểu dáng: áo tanktop khoét nách sâu, đem đến sự thoải mái trong quá trình vận động'),
('Áo thun Marvel thêu Basics','299000','https://media.coolmate.me/cdn-cgi/image/quality=80,format=auto/uploads/July2022/_CMM4177_13-2.jpg','Áo T-shirt','Vải Cotton','Chất liệu: 80% Cotton - 20% Recycle Polyester, co giãn 4 chiều Là sản phẩm của sự hợp tác giữa Coolmate và Disney - đơn vị sở hữu bản quyền Marvel. Phù hợp với: đi chơi, đi làm, ở nhà Kiểu dáng: regularfit dáng suông'),
('Áo thun cổ tròn Excool','299000','https://media.coolmate.me/cdn-cgi/image/quality=80,format=auto/uploads/March2022/tshirtxcool-19-copy.jpg','Áo T-shirt','Vải Excool','Chất liệu: 56% Polyester PET high stretch + 44% Polyester PTT Sorona Kiểu dáng: Slightly Slim, cổ viền vải chính, có xẻ tà vạt trước sau Phù hợp với: đi làm, đi chơi, ở nhà Vải EXCOOL là vải có ưu điểm vượt trội: mềm mại, thấm hút và nhanh khô'),
('Áo Polo nam Excool','399000','https://media.coolmate.me/cdn-cgi/image/quality=80,format=auto/uploads/November2021/BT5A9094_copy.jpg','Áo Polo','Vải Excool','Chất liệu: 56% Polyester PET high stretch + 44% Polyester PTT Sorona Phù hợp với: đi làm, đi chơi, mặc ở nhà Kiểu dáng: regularfit, phù hợp với mọi dáng người'),
('Áo Polo nam Pique Cotton USA thấm hút tối đa (kẻ sọc)','399000','https://media.coolmate.me/cdn-cgi/image/quality=80,format=auto/uploads/August2022/DSC04936-copy-1.jpg','Áo Polo','Vải Cotton','Chất liệu: 97% Cotton USA + 3% Spandex, co giãn 4 chiều Phù hợp với: đi làm, đi chơi, mặc ở nhà Kiểu dáng: áo hơi ôm eo và phù hợp với dáng nam giới Việt');

CREATE TABLE products_in_cart (
  UserId int(11) NOT NULL,
  productId int(11) NOT NULL,
  size varchar(20) NOT NULL,
  quantity int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE orders (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email int(11) NOT NULL,
  name varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  phone char(10) NOT NULL,
  product varchar(255) NOT NULL,
  total int(11) NOT NULL,
  status varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;