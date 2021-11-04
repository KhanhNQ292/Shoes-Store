ALTER DATABASE store CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE products (
    product_id int(11) PRIMARY KEY auto_increment,
    name varchar(255),
    image varchar(500) ,
    price double
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE users (
    user_id integer(11) PRIMARY KEY not null auto_increment,
    name varchar(255) ,
    email varchar(255) ,
    password varchar(255) ,
    contact varchar(255) ,
    address varchar(255),
    role varchar(255) not null
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE orders(
	order_id integer(11) PRIMARY KEY auto_increment ,
	user_id int(11),
	name varchar(255) ,
	phone varchar(255) ,
	address varchar(255) ,
	method varchar(255) ,
	total double  ,
	created_at varchar(255),
    status varchar(255) ,
    FOREIGN KEY (user_id) REFERENCES users(user_id) on delete cascade on update cascade
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE carts(
    cart_id integer (11) not null auto_increment primary key,
    user_id integer(11) ,
    product_id integer(11),
    quantity integer(11) ,
    order_id int(11) ,
    size integer(11) ,
    color varchar(255) ,
    totalPrice double,
    status varchar(255)  ,
    FOREIGN KEY (user_id) REFERENCES users(user_id) on delete cascade on update cascade ,
    FOREIGN KEY (product_id) REFERENCES products(product_id) on delete cascade on update cascade,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) on delete cascade on update cascade
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Dumping data for table `products`
--

INSERT INTO `products`(`product_id`, `name`,`image`, `price`) VALUES
(1, 'W300', 'images/1.jpg', 1950000),
(2, 'W122', 'images/2.jpg', 2650000),
(3, 'W443', 'images/3.jpg', 2900000),
(4, 'W312', 'images/4.jpg', 1800000),
(5, 'W081', 'images/5.jpg', 2930000),
(6, 'W937', 'images/6.jpg', 1990000),
(7, 'W912', 'images/7.jpg', 2700000),
(8, 'W422', 'images/8.jpg', 1990000),
(9, 'W917', 'images/9.jpg', 2000000),
(10, 'W234', 'images/10.jpg', 1480000),
(11, 'W611', 'images/11.jpg', 3600000),
(12, 'W061', 'images/12.jpg', 5100000),
(13, 'W236', 'images/13.jpg', 4100000),
(14, 'W717', 'images/14.jpg', 2500000),
(15, 'W474', 'images/15.jpg', 2900000);




--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `contact`, `address`, `role`) VALUES
(1, 'Nguyen Quynh Hoa', 'quynhhoa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0123456789', 'km9, Thanh Xuan, Ha Noi', 'user'),
(2, 'Duong Thi Hue', 'hueduong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0123456789', 'Km6, Thanh Xuan, Ha Noi', 'user'),
(3, 'Dang Thi Thu Uyen', 'thuuyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0123456789', 'Gia Lam, Ha Noi', 'user'),
(4, 'Dao Phuong Nam', 'phuongnam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0123456789', 'Quang Trung, Ha Noi', 'admin'),
(5, 'Le Tuan Kiet', 'kietbit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0123456789', 'km10, Thanh Xuan, Ha Noi', 'user'),
(6, 'Nguyen Van B', 'b@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(7, 'Nguyen Van C', 'c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(8, 'Nguyen Van D', 'd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(9, 'Nguyen Van E', 'e@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(10, 'Nguyen Van F', 'f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(11, 'Nguyen Van G', 'g@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(12, 'Nguyen Van H', 'h@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user'),
(13, 'Nguyen Van I', 'i@gmail.com', 'e10adc3949ba59abbe56e057f20f883e','0341654321', 'Ha Noi', 'user');