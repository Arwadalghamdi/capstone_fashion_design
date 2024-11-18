
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

--
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
