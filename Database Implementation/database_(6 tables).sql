
CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'moderator' COMMENT 'Possible values: superadmin, moderator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Renad Admin', 'admin@admin.com', '$2y$10$S39XUMcyeQKyFqyg9DccqeP4Aql2xoCoBhwU7RKjHeyFDkh9Afxwe', 'superadmin'),
(2, 'Hager Admin', 'admin2@gmail.com', '$2y$10$JauK00Dn6pIpd6CL9ut7jO0BtOiQELvt1geDcBFBSw4FDmAS6/t92', 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `admin_id`, `name`) VALUES
(1, 1, 'Dress'),
(2, 1, 'abaya'),
(3, 1, 'jalabia');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `password`, `phone`, `address`, `profile_picture`) VALUES
(1, 'joory', 'joory@gmail.com', '$2y$10$dU60vOit1pop3eywAU7RJOLZO0GBstPrZNiJvVuXQDyaTU6XXPcJC', '0578738983', 'Jubail', NULL),
(2, 'Nermeen', 'nermeen@gmail.com', '$2y$10$dU60vOit1pop3eywAU7RJOLZO0GBstPrZNiJvVuXQDyaTU6XXPcJC', '0567823433', 'Jubail', '/uploads/10083-2024-09-26-66f52995ae350.webp');

-- --------------------------------------------------------

--
-- Table structure for table `customization`
--

CREATE TABLE `customization` (
  `customization_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `fashion_design_id` int DEFAULT NULL,
  `order_item_id` int NOT NULL,
  `customization_details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customization`
--

INSERT INTO `customization` (`customization_id`, `customer_id`, `fashion_design_id`, `order_item_id`, `customization_details`) VALUES
(1, 1, 1, 1, 'sddsfsd'),
(2, 2, 2, 2, 'assadasdsa dasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `designer_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `bio` text,
  `account_status` varchar(255) DEFAULT 'active' COMMENT 'Possible values: active, suspended'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`designer_id`, `name`, `email`, `password`, `phone`, `address`, `profile_picture`, `bio`, `account_status`) VALUES
(1, 'Shahad', 'shahd@gmail.com', '$2y$10$S39XUMcyeQKyFqyg9DccqeP4Aql2xoCoBhwU7RKjHeyFDkh9Afxwe', '0590988888', 'Jubail', '/uploads/22.png', 'A chic and versatile two-piece beige jalabia, ideal for modern women. The design blends comfort and elegance, making it perfect for various occasions.\n\n', 'active'),
(2, 'Arwad', 'arwad@gmail.com', '$2y$10$Q8oUdvKLeg.UseTDF2cQF.2qyFZDlcOt0G/iGL1b0S.d9aQr75hiy', '0567633333', 'Jubail', '/uploads/23.png', 'A luxurious full klush beige jalabia adorned with delicate floral patterns. This design offers a graceful and sophisticated look, ideal for formal events.\n\n\n\n\n\n\n', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupon`
--

CREATE TABLE `discount_coupon` (
  `discount_coupon_id` int NOT NULL,
  `designer_id` int DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` text,
  `discount_percentage` decimal(10,0) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `discount_coupon`
--

INSERT INTO `discount_coupon` (`discount_coupon_id`, `designer_id`, `code`, `description`, `discount_percentage`, `valid_from`, `valid_to`) VALUES
(1, 2, 'h45FG', 'تخفيضات اليوم الوطني', '10', '2024-09-03', '2024-12-26');



CREATE TABLE `invoice` (
                           `invoice_id` int NOT NULL,
                           `payment_id` int DEFAULT NULL,
                           `invoice_number` varchar(255) DEFAULT NULL,
                           `invoice_date` date DEFAULT NULL,
                           `billing_address` varchar(255) DEFAULT NULL,
                           `total_amount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `payment_id`, `invoice_number`, `invoice_date`, `billing_address`, `total_amount`) VALUES
                                                                                                                            (1, 2, '17260619934488', '2024-09-11', 'adsadsad', '360'),
                                                                                                                            (2, 3, '17261445804499', '2024-09-12', 'adsadsad', '49'),
                                                                                                                            (3, 4, '17275263575773', '2024-09-28', 'Accusamus nisi volup', '300'),
                                                                                                                            (4, 5, '17292853806163', '2024-10-19', 'Jubail', '600'),
                                                                                                                            (5, 6, '17321139747095', '2024-11-20', 'Jubail', '300');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
                         `order_id` int NOT NULL,
                         `customer_id` int DEFAULT NULL,
                         `total_amount` decimal(10,0) DEFAULT NULL,
                         `discount_value` decimal(8,2) DEFAULT NULL,
                         `status` varchar(255) DEFAULT 'pending' COMMENT 'Possible values: pending, completed, canceled',
                         `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                         `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `total_amount`, `discount_value`, `status`, `created_at`, `updated_at`) VALUES
                                                                                                                            (1, 1, '100', NULL, 'completed', '2024-11-20 14:47:48', '2024-11-20 14:47:48'),
                                                                                                                            (2, 2, '360', '40.00', 'rejected', '2024-11-20 14:47:48', '2024-11-23 14:38:15'),
                                                                                                                            (3, 2, '49', '0.00', 'accepted', '2024-11-20 14:47:48', '2024-11-23 14:36:00'),
                                                                                                                            (4, 2, '300', '0.00', 'pending', '2024-11-20 14:47:48', '2024-11-20 14:47:48'),
                                                                                                                            (5, 1, '600', '0.00', 'pending', '2024-11-20 14:47:48', '2024-11-20 14:47:48'),
                                                                                                                            (6, 1, '300', '0.00', 'pending', '2024-11-20 14:47:48', '2024-11-20 14:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
                              `order_item_id` int NOT NULL,
                              `order_id` int DEFAULT NULL,
                              `product_id` int DEFAULT NULL,
                              `quantity` int DEFAULT NULL,
                              `price` decimal(10,0) DEFAULT NULL,
                              `selected_color` varchar(255) DEFAULT NULL,
                              `selected_size` varchar(191) DEFAULT NULL,
                              `selected_fabric` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`, `selected_color`, `selected_size`, `selected_fabric`) VALUES
                                                                                                                                                    (1, 1, 1, 1, '100', NULL, NULL, NULL),
                                                                                                                                                    (2, 2, 2, 2, '200', NULL, NULL, NULL),
                                                                                                                                                    (3, 3, 1, 1, '49', NULL, NULL, NULL),
                                                                                                                                                    (4, 4, 1, 1, '300', NULL, NULL, NULL),
                                                                                                                                                    (5, 5, 1, 2, '300', '#3929b3', 'medium', 'Silk'),
                                                                                                                                                    (6, 6, 1, 1, '300', '#7c4141', 'small', 'Cotton');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
                           `payment_id` int NOT NULL,
                           `order_id` int DEFAULT NULL,
                           `amount` decimal(10,0) DEFAULT NULL,
                           `payment_method` varchar(255) DEFAULT NULL COMMENT 'Possible values: credit_card, paypal, bank_transfer',
                           `payment_status` varchar(255) DEFAULT 'unpaid' COMMENT 'Possible values: paid, unpaid, refunded',
                           `transaction_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `amount`, `payment_method`, `payment_status`, `transaction_id`) VALUES
                                                                                                                     (1, 2, '360', 'credit_card', 'paid', '17260619932615'),
                                                                                                                     (2, 3, '49', 'paypal', 'paid', '17261445802427'),
                                                                                                                     (3, 4, '300', 'credit_card', 'paid', '17275263578633'),
                                                                                                                     (4, 5, '600', 'credit_card', 'paid', '17292853809503'),
                                                                                                                     (5, 6, '300', 'credit_card', 'paid', '17321139744797');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
                           `product_id` int NOT NULL,
                           `designer_id` int DEFAULT NULL,
                           `category_id` int NOT NULL,
                           `title` varchar(255) DEFAULT NULL,
                           `description` text,
                           `price` decimal(10,0) DEFAULT NULL,
                           `image` varchar(255) DEFAULT NULL,
                           `sizes` text,
                           `fabrics` text,
                           `colors` text,
                           `availability_status` varchar(255) DEFAULT 'available' COMMENT 'Possible values: available, unavailable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `designer_id`, `category_id`, `title`, `description`, `price`, `image`, `sizes`, `fabrics`, `colors`, `availability_status`) VALUES
                                                                                                                                                                      (1, 1, 2, 'Straight Formal Beige Abaya', 'A classic straight-cut beige abaya that brings a formal and elegant appearance. Ideal for professional or formal gatherings. The neutral beige color enhances its sophistication.', '300', 'uploads/1.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#534646\",\"#754d4d\"]', 'available'),
                                                                                                                                                                      (2, 1, 2, 'Black Full Klush Abaya', 'A full klush black abaya that exudes luxury and tradition. It provides a graceful and loose silhouette, perfect for formal occasions or as a statement piece.', '350', 'uploads/2.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (3, 1, 2, 'White Linen Abaya', 'A white linen abaya crafted for comfort and elegance. The lightweight linen fabric is perfect for warmer climates while maintaining a stylish and modern look.', '280', 'uploads/3.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (4, 1, 2, 'Black Quarter Klush Abaya with Flowers', 'This black quarter klush abaya features a delicate floral design, adding a subtle touch of femininity to the traditional silhouette. A perfect blend of simplicity and style.', '320', 'uploads/4.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (5, 1, 2, 'Crepe Full Klush Beige Abaya', 'A full klush beige abaya made from crepe fabric for a luxurious and flowing look. Its soft, elegant design is suited for formal events and provides maximum comfort.', '340', 'uploads/5.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (6, 1, 2, 'Black and Purple Crepe Abaya', 'A bold black and purple crepe abaya that merges two classic colors for a striking effect. Its lightweight fabric and beautiful color combination make it stand out.', '360', 'uploads/6.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (7, 1, 2, 'Light Grey Crepe Abaya with White Linen Sleeves', 'A sophisticated light grey crepe abaya featuring white linen sleeves. The contrast of materials adds a touch of modern elegance to the timeless abaya.', '330', 'uploads/7.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (8, 1, 2, 'Two Face Blue and Gray Crepe Abaya', 'A modern two-face abaya combining blue and gray crepe fabric. The contrasting colors create a stylish and contemporary look that is perfect for any occasion.', '350', 'uploads/8.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (9, 1, 2, 'Black Abaya, Crepe, with Striped Taffeta', 'A unique black crepe abaya with striped taffeta accents. This design blends traditional and modern elements, providing a chic and luxurious feel.', '370', 'uploads/9.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (10, 1, 2, 'Abaya Full Klush and Leather Sleeves', 'A full klush abaya with striking leather sleeves for a bold and contemporary twist on the traditional design. Ideal for those seeking an edgy yet elegant look.', '380', 'uploads/10.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (11, 2, 1, 'Two Piece Beige Jalabia', 'A modern two-piece beige jalabia, perfect for a chic and effortless look. The neutral tone adds versatility, making it ideal for casual and semi-formal occasions.', '280', 'uploads/11.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (12, 2, 1, 'Full Klush Beige Jalabia with a Floral Pattern', 'A stunning full klush beige jalabia adorned with a beautiful floral pattern. The flowing design and intricate details make it perfect for festive or formal occasions.', '320', 'uploads/12.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (13, 2, 1, 'Bodycon Off-White with Gray Jalabia', 'A sleek bodycon-style off-white jalabia with subtle gray accents. Designed to flatter the figure, it is perfect for those seeking a modern, fitted look.', '300', 'uploads/13.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (14, 2, 1, 'One Shoulder Pink Jalabia', 'A bold and elegant one-shoulder pink jalabia that adds a fashionable twist to traditional wear. The striking design makes it perfect for special events.', '310', 'uploads/14.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (15, 2, 1, 'Mock Neck Black Jalabia', 'A minimalist mock neck black jalabia that blends simplicity with elegance. The high neckline gives it a refined look, suitable for both formal and casual outings.', '290', 'uploads/15.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (16, 2, 1, 'Olive Linen Jalabia', 'A comfortable and stylish olive linen jalabia designed for everyday wear. The lightweight fabric and natural tones make it ideal for warm climates.', '270', 'uploads/16.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (17, 2, 1, 'Sapphire Linen Jalabia', 'A striking sapphire-colored linen jalabia, perfect for making a statement. Its simple yet bold design makes it a versatile piece for various occasions.', '290', 'uploads/17.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (18, 2, 1, 'Moon Caftan Jalabia', 'An elegant moon caftan-style jalabia, offering a relaxed yet sophisticated look. The design combines traditional elements with a modern silhouette.', '310', 'uploads/18.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (19, 2, 1, 'Blue and Beige Jalabia', 'A graceful blue and beige jalabia that blends two neutral colors for a chic and timeless appearance. Ideal for both daytime and evening events.', '300', 'uploads/19.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available'),
                                                                                                                                                                      (20, 2, 1, 'Blue with Sparkling Floral Jalabia', 'A glamorous blue jalabia embellished with sparkling floral patterns. This eye-catching design is perfect for festive occasions or special events.', '350', 'uploads/20.jpeg', '[\"small\",\"medium\",\"large\", \"Xl\", \"XXL\"]', 'Polyester', '[\"#7c4141\",\"#3929b3\",\"#000000\"]', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
                          `review_id` int NOT NULL,
                          `customer_id` int DEFAULT NULL,
                          `product_id` int DEFAULT NULL,
                          `order_id` int DEFAULT NULL,
                          `designer_id` int DEFAULT NULL,
                          `admin_id` int DEFAULT NULL,
                          `rating` int DEFAULT NULL COMMENT 'Range: 1 to 5',
                          `comment` text,
                          `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `customer_id`, `product_id`, `order_id`, `designer_id`, `admin_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
                                                                                                                                                            (1, 2, 1, NULL, 1, 1, 3, 'good design', '2024-09-08 19:53:52', '2024-09-08 19:53:52'),
                                                                                                                                                            (2, 2, 2, 2, 2, 1, 4, 'thank you.', '2024-09-11 20:45:52', '2024-09-11 20:45:52'),
                                                                                                                                                            (3, 2, 1, 3, 1, 1, 5, 'تصميمها مره حلو', '2024-09-12 12:39:50', '2024-09-12 12:39:50');


-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customization`
--
ALTER TABLE `customization`
  ADD PRIMARY KEY (`customization_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `fashion_design_id` (`fashion_design_id`),
  ADD KEY `order_item_idFKKK` (`order_item_id`);

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`designer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  ADD PRIMARY KEY (`discount_coupon_id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `designer_id` (`designer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customization`
--
ALTER TABLE `customization`
  MODIFY `customization_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `designer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  MODIFY `discount_coupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `customization`
--
ALTER TABLE `customization`
  ADD CONSTRAINT `customization_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `customization_ibfk_2` FOREIGN KEY (`fashion_design_id`) REFERENCES `fashion_design` (`fashion_design_id`),
  ADD CONSTRAINT `order_item_idFKKK` FOREIGN KEY (`order_item_id`) REFERENCES `order_item` (`order_item_id`);

--
-- Constraints for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  ADD CONSTRAINT `discount_coupon_ibfk_1` FOREIGN KEY (`designer_id`) REFERENCES `designer` (`designer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
