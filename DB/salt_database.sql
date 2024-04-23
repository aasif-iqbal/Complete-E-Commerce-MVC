-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2024 at 05:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salt_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'FifthObject', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `localstorage_id` varchar(255) DEFAULT NULL COMMENT 'if User-login first,Then its Empty',
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(30) NOT NULL,
  `product_size_id` varchar(255) NOT NULL,
  `product_size_name` varchar(15) NOT NULL,
  `product_color_id` int(5) NOT NULL,
  `product_color_name` varchar(25) NOT NULL,
  `product_mrp` decimal(20,0) NOT NULL,
  `product_selling_price` decimal(20,0) NOT NULL,
  `product_discount` int(5) NOT NULL,
  `total_quantity_inStock` int(255) NOT NULL,
  `item_count` varchar(40) NOT NULL COMMENT 'product added by user',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_uuid`, `product_uuid`, `variation_uuid`, `localstorage_id`, `product_name`, `product_image`, `product_size_id`, `product_size_name`, `product_color_id`, `product_color_name`, `product_mrp`, `product_selling_price`, `product_discount`, `total_quantity_inStock`, `item_count`, `created_at`, `updated_at`, `status`) VALUES
(23, '988f64b4-bc4a-11ed-bb06-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'c16ba0d8-f7d1-11ed-b322-98460a99789a', NULL, 'Regular Fit Rib-knit resort shirt', 'w1.jpeg', '1bbb9fc8-ebf9-11ed-b6fa-98460a99789a', 'L', 3, 'Blue', '2999', '2849', 5, 7, '6', '2023-06-24 10:33:20.969241', '0000-00-00 00:00:00.000000', 1),
(25, '988f64b4-bc4a-11ed-bb06-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', '21009a26-1195-11ee-965b-98460a99789a', NULL, 'Regular Fit Rib-knit resort shirt', 'w1.jpeg', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 2, 'Black', '2999', '2849', 5, 12, '5', '2023-06-24 10:35:21.357537', '0000-00-00 00:00:00.000000', 1),
(26, '0e973860-b3b5-11ed-86da-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'c16ba0d8-f7d1-11ed-b322-98460a99789a', NULL, 'Regular Fit Rib-knit resort shirt', 'w1.jpeg', '1bbb9fc8-ebf9-11ed-b6fa-98460a99789a', 'L', 3, 'White', '2999', '2849', 5, 7, '1', '2024-04-14 11:28:33.912531', '0000-00-00 00:00:00.000000', 1),
(27, '0e973860-b3b5-11ed-86da-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'f2bc83b2-ed15-11ed-9432-98460a99789a', NULL, 'Regular Fit Short-sleeved shirt', 'edit-661ab5ccd167b.jpeg', '0b55f318-ebf9-11ed-b6fa-98460a99789a', 'M', 1, 'Black', '2999', '2099', 30, 6, '1', '2024-04-14 11:30:41.214955', '0000-00-00 00:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_children`
--

CREATE TABLE `tbl_category_children` (
  `child_id` int(11) NOT NULL,
  `child_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `fk_parent_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `links` varchar(255) DEFAULT NULL,
  `create_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category_children`
--

INSERT INTO `tbl_category_children` (`child_id`, `child_category_name`, `slug`, `fk_parent_id`, `status`, `links`, `create_at`, `updated_at`, `deleted_at`) VALUES
(1, 'T-Shirt', 't-shirt-646de0c3a2120', 1, 1, NULL, '2023-05-24 10:02:43.663964', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Women T-Shirts', 'women-t-shirts', 2, 1, NULL, '2023-02-21 09:52:15.586196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'Shirts', 'shirts-646c5746e20db', 1, 1, NULL, '2023-05-23 06:03:50.926080', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'Jean\'s', 'jean-s', 0, 1, NULL, '2023-05-23 05:19:08.359849', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, 'T-Shirts', 't-shirts-646de49416c41', 4, 1, NULL, '2023-05-24 10:19:00.093377', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_patents`
--

CREATE TABLE `tbl_category_patents` (
  `parent_id` int(11) NOT NULL,
  `parent_category_name` varchar(255) NOT NULL,
  `parent_category_image` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `links` int(255) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category_patents`
--

INSERT INTO `tbl_category_patents` (`parent_id`, `parent_category_name`, `parent_category_image`, `slug`, `links`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men', 'men_banner_original.jpeg', 'men-646ddf5827b85', NULL, 1, '2024-04-14 11:45:24.212638', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Women', 'banner2.jpeg', 'women-646c54954cc9d', NULL, 1, '2023-05-23 05:52:21.315113', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Kids', '', 'uni-sex-646df2863be82', NULL, 1, '2024-04-14 09:00:29.166008', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `hex_code` varchar(12) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`color_id`, `color_name`, `hex_code`, `status`) VALUES
(1, 'Red', '#FF0000', 1),
(2, 'Black', '#000000', 1),
(3, 'Blue', '#3838E5', 1),
(4, 'Green', '#4DFFAC', 1),
(12, 'Purple', '#C495EA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_size`
--

CREATE TABLE `tbl_custom_size` (
  `size_id` int(11) NOT NULL,
  `size_uuid` varchar(255) NOT NULL,
  `parent_category_id` int(2) NOT NULL,
  `child_category_id` int(2) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_custom_size`
--

INSERT INTO `tbl_custom_size` (`size_id`, `size_uuid`, `parent_category_id`, `child_category_id`, `size_name`, `label`, `isActive`, `status`) VALUES
(1, 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 1, 5, 'S', 'Small', 1, 1),
(2, '0b55f318-ebf9-11ed-b6fa-98460a99789a', 1, 5, 'M', 'Medium', 1, 1),
(3, '1bbb9fc8-ebf9-11ed-b6fa-98460a99789a', 1, 5, 'L', 'Large', 1, 1),
(4, '0078e2cc-f8b3-11ed-84b2-98460a99789a', 2, 4, 'S', 'Small', 1, 1),
(7, 'f470e07c-fa1c-11ed-990c-98460a99789a', 4, 9, 'XL', 'Extra-Large', 1, 1),
(8, '20a76192-fa23-11ed-990c-98460a99789a', 4, 9, 'M', 'Medium', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `role` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `phone_no`, `password`, `status`, `role`) VALUES
(1, '1111', '1111', 1, 0),
(2, '2222', '2222', 1, 0),
(3, '8888', '1111', 1, 0),
(4, 'admin', '1111', 1, 1),
(6, '9999', '9999', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_product`
--

CREATE TABLE `tbl_main_product` (
  `product_id` int(12) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug_product` varchar(255) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `article_no` varchar(100) NOT NULL,
  `parent_cat_id` int(2) NOT NULL,
  `child_cat_id` int(2) NOT NULL,
  `slug_cat_child` varchar(255) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_short_description` varchar(255) NOT NULL,
  `product_long_description` varchar(10000) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `discount_percentage` int(2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `status` int(2) NOT NULL DEFAULT 1,
  `isActive` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_main_product`
--

INSERT INTO `tbl_main_product` (`product_id`, `product_uuid`, `product_name`, `slug_product`, `brand_name`, `article_no`, `parent_cat_id`, `child_cat_id`, `slug_cat_child`, `product_main_image`, `product_short_description`, `product_long_description`, `product_mrp`, `product_selling_price`, `discount_percentage`, `created_at`, `updated_at`, `status`, `isActive`) VALUES
(1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'Regular Fit Short-sleeved shirt', 'regular-fit-short-sleeved-lyocell-shirt', 'FifthObject', 'ART$MWWW7Q', 1, 5, 'shirt', 'edit-661ab5ccd167b.jpeg', 'Regular Fit Short-sleeved lyocell shirt', '<p>Short-sleeved shirt in patterned lyocell. Regular fit with a turn-down collar, French front and straight-cut hem with a slit in each side. Fabric made from lyocell is super soft, wrinkle resistant and drapes beautifully.</p>\r\n', 2999, 2099, 30, '2024-04-13 16:41:48.859470', '0000-00-00 00:00:00.000000', 1, 1),
(2, 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'Regular Fit Rib-knit resort shirt', 'regular-fit-rib-knit-resort-shirt', 'FifthObject', 'ART49#FVUF', 1, 5, 'shirt', 'w1.jpeg', 'Regular Fit Rib-knit resort shirt', '<h1>Regular Fit Rib-knit resort shirt</h1>\r\n', 2999, 2849, 5, '2023-05-09 06:13:59.819220', '0000-00-00 00:00:00.000000', 1, 1),
(3, '22dcc004-ee31-11ed-9ffa-98460a99789a', 'Relaxed Fit Patterned resort shirt', 'relaxed-fit-patterned-resort-shirt', 'FifthObject', 'ART@KQGBWP', 1, 5, 'shirt', 'h1.jpeg', 'Relaxed Fit Patterned resort shirt', '<h1>Relaxed Fit Patterned resort shirt</h1>\r\n\r\n<h1>Relaxed Fit Patterned resort shirt</h1>\r\n', 3999, 3599, 10, '2023-05-09 06:17:12.405027', '0000-00-00 00:00:00.000000', 1, 1),
(4, '86e41d7c-ee31-11ed-9ffa-98460a99789a', 'Relaxed Fit linen-blend shirt', 'relaxed-fit-linen-blend-shirt', 'FifthObject', 'ARTXVQKR2U', 1, 5, 'shirt', 'img-661ab78a8b4d1.jpeg', 'Relaxed Fit linen-blend shirt', '<p>Relaxed Fit linen-blend shirt</p>\r\n', 1999, 1799, 10, '2024-04-13 16:55:57.933303', '0000-00-00 00:00:00.000000', 1, 1),
(6, '15eeb814-f667-11ed-b52c-98460a99789a', 'New T-shirt for women', 'new-t-shirt-for-women', 'FifthObject', 'ART26GZ6NC', 2, 4, 'women-t-shirts', 'w.jpeg', 'Oversized printed T-shirt 3', '<p>&bull; Fine furniture grade craftsmanship</p>\r\n\r\n<p>&bull; Solid hardwood construction 3333</p>\r\n\r\n<p>&bull; Furniture grade playfield with inlaid wood veneers</p>\r\n\r\n<p>&bull; Hand-painted foosball men 5555</p>\r\n\r\n<p>&bull; Telescopic rods 6666</p>\r\n\r\n<p>&bull; Octagonal solid hardwood handles</p>\r\n\r\n<p>&bull; Adjustable leg levelers</p>\r\n\r\n<p>&bull; 3/16&quot; tempered glass top</p>\r\n\r\n<p>&bull; Solid wood scoring beads</p>\r\n\r\n<p>&bull; Stainless steel ball return</p>\r\n\r\n<p>&bull; Hand-carved wood detail</p>\r\n\r\n<p>&bull; Ideal for living room, den or Man Cave</p>\r\n\r\n<p>&bull; Assembly required</p>\r\n', 2002, 1600, 20, '2023-05-24 07:09:56.728286', '0000-00-00 00:00:00.000000', 1, 1),
(7, '2a76760a-fa1d-11ed-990c-98460a99789a', 'Red T shirt White line', 'red-t-shirt-white-line', 'FifthObject', 'ARTKEC69IT', 4, 9, 't-shirts-646de49416c41', 'edit-646dee4959f84.jpeg', 'Red T shirt Line White', '<ul>\r\n	<li>Red T shirt</li>\r\n	<li>Red T shirt</li>\r\n	<li>Red T shirt</li>\r\n	<li>White Line</li>\r\n</ul>\r\n', 3500, 2275, 35, '2023-05-24 11:01:54.108042', '0000-00-00 00:00:00.000000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_product_images`
--

CREATE TABLE `tbl_main_product_images` (
  `main_image_id` int(6) NOT NULL,
  `main_image_uuid` varchar(255) NOT NULL,
  `product_id` int(6) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `main_product_image` varchar(255) NOT NULL,
  `createdAt` datetime(6) NOT NULL,
  `updatedAt` datetime(6) NOT NULL,
  `isActive` int(2) NOT NULL,
  `isDeleted` int(2) NOT NULL,
  `display_status` int(2) NOT NULL DEFAULT 1 COMMENT '0=>Hide\r\n1=>show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_main_product_images`
--

INSERT INTO `tbl_main_product_images` (`main_image_id`, `main_image_uuid`, `product_id`, `product_uuid`, `main_product_image`, `createdAt`, `updatedAt`, `isActive`, `isDeleted`, `display_status`) VALUES
(1, 'fe2d3f1e-ebeb-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-645616693e5a2.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(2, 'e7a00358-ebf5-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-6456270a5e3ff.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(3, '53f516a6-ebf6-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-645627c02232c.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(4, '98d3d716-ebf7-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-645629e12c0a8.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(5, '9025f1d6-f7d1-11ed-b322-98460a99789a', 2, 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'img-646a0c07aa66a.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(6, 'aa83b8d8-f7d1-11ed-b322-98460a99789a', 2, 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'img-646a0c33e3de1.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(7, 'dfec55d4-f8b2-11ed-84b2-98460a99789a', 6, '15eeb814-f667-11ed-b52c-98460a99789a', 'img-646b860a492a6.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(8, 'dcae6a06-fa06-11ed-990c-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-646dc071b6dd0.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(9, '9d58f8a2-fa20-11ed-990c-98460a99789a', 7, '2a76760a-fa1d-11ed-990c-98460a99789a', 'img-646deba663aa5.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(10, 'b4a96492-fa20-11ed-990c-98460a99789a', 7, '2a76760a-fa1d-11ed-990c-98460a99789a', 'img-646debcd8014b.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(11, 'c2b038fa-f9b5-11ee-88ea-98460a99789a', 4, '86e41d7c-ee31-11ed-9ffa-98460a99789a', 'img-661ab78a8b4d1.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_orderedProducts_user`
--

CREATE TABLE `tbl_mapping_orderedProducts_user` (
  `mapping_id` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `shipping_status` int(2) NOT NULL COMMENT '0 => Pending\r\n1 => delivered',
  `delivery_confirm_code` int(8) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `createdAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mapping_orderedProducts_user`
--

INSERT INTO `tbl_mapping_orderedProducts_user` (`mapping_id`, `user_uuid`, `product_uuid`, `product_name`, `shipping_status`, `delivery_confirm_code`, `isActive`, `createdAt`) VALUES
(1, '988f64b4-bc4a-11ed-bb06-98460a99789a', '2a76760a-fa1d-11ed-990c-98460a99789a', 'Red T shirt White line', 0, 944967, 1, '0000-00-00 00:00:00.000000'),
(2, '988f64b4-bc4a-11ed-bb06-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'Regular Fit Rib-knit reso', 0, 944967, 1, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(12) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_size_id` int(2) NOT NULL,
  `product_size_name` varchar(25) NOT NULL,
  `product_color_id` int(2) NOT NULL,
  `product_color_name` varchar(25) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `product_discount` int(3) NOT NULL,
  `product_quantity` int(6) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `receivers_phone_no` varchar(15) NOT NULL,
  `addr_house_no` varchar(50) NOT NULL,
  `addr_locality` varchar(100) NOT NULL,
  `addr_city` varchar(50) NOT NULL,
  `addr_pin_code` int(10) NOT NULL,
  `addr_state` varchar(20) NOT NULL,
  `addr_country` varchar(10) NOT NULL,
  `addr_type` int(2) NOT NULL,
  `total_product_quantity` int(10) NOT NULL COMMENT 'total Prod_Quantity order in one transaction',
  `total_amount` int(6) NOT NULL COMMENT 'total Amount made in one transaction',
  `transaction_id` varchar(25) NOT NULL COMMENT 'Payment_id',
  `transaction_status` int(2) NOT NULL COMMENT '0=> Online\r\n1=> COD',
  `conformation_code` int(8) DEFAULT NULL,
  `payment_method` varchar(25) NOT NULL,
  `productInfo_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`productInfo_json`)),
  `transaction_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `createdAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) COMMENT 'Order_dateTime, when order is made',
  `updatedAt` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' COMMENT 'updated when Product is Return',
  `cancelledAt` datetime(6) NOT NULL,
  `status` int(2) NOT NULL,
  `order_received_datetime` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' COMMENT 'it will updated when order shipping status will updated',
  `order_shipping_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Pending\r\n2=Processing\r\n3=Shipped/Dispatched\r\n4=delivered\r\n5=Cancelled\r\n6=On Hold\r\n7=Refunded',
  `order_return_status` int(2) NOT NULL COMMENT '0 => Return without shipping COD\r\n1 => Return without shipping Online Pay\r\n2 => Return & Refund After shipping COD\r\n3 => Return & Refund After shipping Online\r\n4 => NO RETURN\r\n',
  `soft_delete` int(2) NOT NULL DEFAULT 0 COMMENT 'soft delete to hide from user when cancel order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_uuid`, `user_uuid`, `product_uuid`, `variation_uuid`, `product_name`, `product_image`, `product_size_id`, `product_size_name`, `product_color_id`, `product_color_name`, `product_mrp`, `product_selling_price`, `product_discount`, `product_quantity`, `user_name`, `user_email`, `phone_no`, `receivers_phone_no`, `addr_house_no`, `addr_locality`, `addr_city`, `addr_pin_code`, `addr_state`, `addr_country`, `addr_type`, `total_product_quantity`, `total_amount`, `transaction_id`, `transaction_status`, `conformation_code`, `payment_method`, `productInfo_json`, `transaction_datetime`, `createdAt`, `updatedAt`, `cancelledAt`, `status`, `order_received_datetime`, `order_shipping_status`, `order_return_status`, `soft_delete`) VALUES
(4, 'ea1caa52-fc79-11ed-b684-98460a99789a', '988f64b4-bc4a-11ed-bb06-98460a99789a', '2a76760a-fa1d-11ed-990c-98460a99789a', 'e694729e-fa20-11ed-990c-98460a99789a', 'Red T shirt White line', 'edit-646dee4959f84.jpeg', 20, 'M', 12, 'Purple', 3500, 2275, 35, 1, 'Jack', 'jack@gmail.com', '8888', '9090221122', 'H-98/2, Near Dep Talab', 'Dr. Zakkir Hussain Road', 'Hazaribagh', 110023, 'Delhi', 'India', 1, 2, 5124, 'COD_offline', 1, NULL, 'COD', '[{\"user_uuid\":\"988f64b4-bc4a-11ed-bb06-98460a99789a\",\"product_uuid\":\"2a76760a-fa1d-11ed-990c-98460a99789a\",\"product_name\":\"Red T shirt White line\",\"product_image\":\"edit-646dee4959f84.jpeg\",\"item_count\":\"1\",\"product_size_name\":\"M\",\"product_color_name\":\"Purple\",\"product_selling_price\":\"2275\"},{\"user_uuid\":\"988f64b4-bc4a-11ed-bb06-98460a99789a\",\"product_uuid\":\"b012fa34-ee30-11ed-9ffa-98460a99789a\",\"product_name\":\"Regular Fit Rib-knit resort shirt\",\"product_image\":\"w1.jpeg\",\"item_count\":\"1\",\"product_size_name\":\"L\",\"product_color_name\":\"Blue\",\"product_selling_price\":\"2849\"}]', '2023-06-23 07:14:23.432839', '2023-05-27 10:33:26.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, '0000-00-00 00:00:00.000000', 3, 4, 1),
(5, 'ea1d2a86-fc79-11ed-b684-98460a99789a', '0e973860-b3b5-11ed-86da-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'c16ba0d8-f7d1-11ed-b322-98460a99789a', 'Regular Fit Rib-knit resort shirt', 'w1.jpeg', 1, 'L', 3, 'Blue', 2999, 2849, 5, 1, 'Jack', 'jack@gmail.com', '8888', '9090221122', 'H-98/2, Near Dep Talab', 'Dr. Zakkir Hussain Road', 'Hazaribagh', 110023, 'Delhi', 'India', 1, 2, 5124, 'COD_offline', 1, NULL, 'COD', '[{\"user_uuid\":\"988f64b4-bc4a-11ed-bb06-98460a99789a\",\"product_uuid\":\"2a76760a-fa1d-11ed-990c-98460a99789a\",\"product_name\":\"Red T shirt White line\",\"product_image\":\"edit-646dee4959f84.jpeg\",\"item_count\":\"1\",\"product_size_name\":\"M\",\"product_color_name\":\"Purple\",\"product_selling_price\":\"2275\"},{\"user_uuid\":\"988f64b4-bc4a-11ed-bb06-98460a99789a\",\"product_uuid\":\"b012fa34-ee30-11ed-9ffa-98460a99789a\",\"product_name\":\"Regular Fit Rib-knit resort shirt\",\"product_image\":\"w1.jpeg\",\"item_count\":\"1\",\"product_size_name\":\"L\",\"product_color_name\":\"Blue\",\"product_selling_price\":\"2849\"}]', '2024-04-14 09:13:03.412813', '2023-05-27 10:33:26.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, '0000-00-00 00:00:00.000000', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cancellation`
--

CREATE TABLE `tbl_order_cancellation` (
  `auto_id` int(5) NOT NULL,
  `cancellation_uuid` varchar(255) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `shipping_uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_size_name` varchar(25) NOT NULL,
  `product_color_name` varchar(25) NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `payment_mode` int(2) NOT NULL,
  `payment_id` varchar(255) NOT NULL COMMENT 'transaction_id',
  `reason_for_cancel` varchar(255) NOT NULL,
  `order_datetime` datetime(6) NOT NULL,
  `order_cancel_datetime` datetime(6) NOT NULL,
  `productInfo_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`productInfo_json`)),
  `refund_status` int(2) NOT NULL COMMENT '0=> NOT refund done yet(COD)\r\n1=> only for Online-payment',
  `transaction_status` int(2) NOT NULL COMMENT '0=>NOT Done\r\n1=>DONE',
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_return_refund`
--

CREATE TABLE `tbl_order_return_refund` (
  `auto_id` int(6) NOT NULL,
  `order_return_refund_uuid` varchar(255) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `shipping_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size_name` varchar(20) NOT NULL,
  `product_color_name` varchar(20) NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `product_discount` int(3) NOT NULL,
  `product_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_json`)),
  `payment_mode` int(2) NOT NULL,
  `payment_id` varchar(25) NOT NULL,
  `reason_for_cancel` varchar(200) NOT NULL,
  `order_datetime` datetime(6) NOT NULL,
  `order_received_datetime` datetime(6) NOT NULL,
  `refunding_mode_of_payment` int(2) NOT NULL,
  `refund_payment_upi` varchar(20) DEFAULT NULL,
  `refund_bank_name` varchar(100) DEFAULT NULL,
  `refund_acct_holder_name` varchar(100) DEFAULT NULL,
  `refund_acct_num` varchar(100) DEFAULT NULL,
  `refund_IFSC_code` varchar(10) DEFAULT NULL,
  `refund_branch_name` varchar(50) DEFAULT NULL,
  `pickup_datetime` datetime(6) NOT NULL,
  `return_addr_house_no` varchar(200) NOT NULL,
  `return_addr_locality` varchar(200) NOT NULL,
  `return_addr_city` varchar(100) NOT NULL,
  `return_addr_pin_code` int(8) NOT NULL,
  `return_addr_state` varchar(20) NOT NULL,
  `return_addr_country` varchar(20) NOT NULL,
  `return_addr_type` int(2) NOT NULL,
  `receivers_phone_no` int(15) NOT NULL,
  `return_refund_status` int(2) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variation`
--

CREATE TABLE `tbl_product_variation` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `size_uuid` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_size_label` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_color_name` varchar(255) NOT NULL,
  `product_hex_code` varchar(15) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `discount_percentage` int(2) NOT NULL,
  `product_quantity` int(11) NOT NULL COMMENT 'Total products in stock',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `isDeleted` int(2) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `isMain` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_variation`
--

INSERT INTO `tbl_product_variation` (`variant_id`, `product_id`, `variation_uuid`, `product_uuid`, `size_uuid`, `product_size`, `product_size_label`, `product_color`, `product_color_name`, `product_hex_code`, `product_mrp`, `product_selling_price`, `discount_percentage`, `product_quantity`, `created_at`, `updated_at`, `isDeleted`, `isActive`, `isMain`, `status`) VALUES
(1, 1, '13c548e0-ebfa-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', '1', 'Red', '#FF0000', 2999, 2099, 30, 1, '2023-05-06 10:38:02.439933', '0000-00-00 00:00:00.000000', 0, 1, 1, 1),
(2, 1, 'f2bc83b2-ed15-11ed-9432-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '0b55f318-ebf9-11ed-b6fa-98460a99789a', 'M', 'Medium', '1', 'Red', '#FF0000', 2999, 2099, 30, 6, '2023-05-07 20:30:04.083015', '0000-00-00 00:00:00.000000', 0, 1, 1, 1),
(3, 1, 'b321b2ee-ed16-11ed-9432-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', '2', 'Black', '#000000', 299, 284, 5, 99, '2023-05-24 06:25:09.698719', '0000-00-00 00:00:00.000000', 0, 1, 0, 1),
(5, 2, 'c16ba0d8-f7d1-11ed-b322-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', '1bbb9fc8-ebf9-11ed-b6fa-98460a99789a', 'L', 'Large', '3', 'Blue', '#0000FF', 2999, 1500, 50, 7, '2023-05-23 10:34:16.161904', '0000-00-00 00:00:00.000000', 0, 1, 1, 1),
(8, 7, 'e694729e-fa20-11ed-990c-98460a99789a', '2a76760a-fa1d-11ed-990c-98460a99789a', '20a76192-fa23-11ed-990c-98460a99789a', 'M', 'Medium', '12', 'Purple', '#C495EA', 3444, 2239, 35, 47, '2023-06-14 12:48:37.006251', '0000-00-00 00:00:00.000000', 0, 1, 1, 1),
(9, 2, '21009a26-1195-11ee-965b-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', '2', 'Black', '#000000', 2955, 2660, 10, 12, '2023-06-23 07:11:09.654876', '0000-00-00 00:00:00.000000', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variation_colorImgs`
--

CREATE TABLE `tbl_product_variation_colorImgs` (
  `auto_color_img_id` int(11) NOT NULL,
  `product_color_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `size_uuid` varchar(255) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_size_label` varchar(15) NOT NULL,
  `variation_color_id` int(4) NOT NULL,
  `variation_color_name` varchar(25) NOT NULL,
  `product_color_img` varchar(255) NOT NULL,
  `createdAt` datetime(6) NOT NULL,
  `updatedAt` datetime(6) NOT NULL,
  `deletedAt` datetime(6) NOT NULL,
  `isDeleted` int(2) NOT NULL,
  `isActive` int(2) NOT NULL,
  `display_status` int(2) NOT NULL DEFAULT 1 COMMENT '0=>hide\r\n1=>show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_variation_colorImgs`
--

INSERT INTO `tbl_product_variation_colorImgs` (`auto_color_img_id`, `product_color_uuid`, `product_uuid`, `variation_uuid`, `size_uuid`, `product_size`, `product_size_label`, `variation_color_id`, `variation_color_name`, `product_color_img`, `createdAt`, `updatedAt`, `deletedAt`, `isDeleted`, `isActive`, `display_status`) VALUES
(1, '2af81e70-ebfa-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '13c548e0-ebfa-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', 1, 'Red', 'img-1683369521.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(2, '9f570db2-ebfa-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '13c548e0-ebfa-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', 1, 'Red', 'img-1683369716.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(3, '9baa25ee-ec01-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '13c548e0-ebfa-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', 1, 'Red', 'img-1683372716.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(4, 'a716c42a-f749-11ed-a758-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'e71fc4c8-ed20-11ed-9432-98460a99789a', '0b55f318-ebf9-11ed-b6fa-98460a99789a', 'M', 'Medium', 2, 'Black', 'img-1684613122.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(6, '84fa497c-fa21-11ed-990c-98460a99789a', '2a76760a-fa1d-11ed-990c-98460a99789a', 'e694729e-fa20-11ed-990c-98460a99789a', 'f470e07c-fa1c-11ed-990c-98460a99789a', 'XL', 'extra-large', 1, 'Red', 'img-1684925739.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(7, 'fe914eb6-fa21-11ed-990c-98460a99789a', '2a76760a-fa1d-11ed-990c-98460a99789a', 'e694729e-fa20-11ed-990c-98460a99789a', 'f470e07c-fa1c-11ed-990c-98460a99789a', 'XL', 'extra-large', 1, 'Red', 'img-1684925943.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(8, '3ecc3f0c-fa24-11ed-990c-98460a99789a', '2a76760a-fa1d-11ed-990c-98460a99789a', 'e694729e-fa20-11ed-990c-98460a99789a', '20a76192-fa23-11ed-990c-98460a99789a', 'M', 'Medium', 12, 'Purple', 'img-1684926909.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating_reviews`
--

CREATE TABLE `tbl_rating_reviews` (
  `rating_id` int(11) NOT NULL,
  `rating_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `rating_number` int(6) NOT NULL,
  `rating_title` varchar(255) NOT NULL,
  `rating_comment` varchar(255) NOT NULL,
  `isVerifiedBuyer` int(2) NOT NULL DEFAULT 0,
  `admin_reply` varchar(255) NOT NULL,
  `showAdminReply` int(2) NOT NULL DEFAULT 1,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `status` int(2) NOT NULL DEFAULT 1,
  `createdAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `modifiedAt` datetime(6) NOT NULL,
  `deletedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating_reviews`
--

INSERT INTO `tbl_rating_reviews` (`rating_id`, `rating_uuid`, `product_uuid`, `variation_uuid`, `user_uuid`, `user_name`, `rating_number`, `rating_title`, `rating_comment`, `isVerifiedBuyer`, `admin_reply`, `showAdminReply`, `isActive`, `status`, `createdAt`, `modifiedAt`, `deletedAt`) VALUES
(1, 'f5678960-ef20-11ed-aa1a-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', NULL, 'None', 'User', 4, 'A Shopper\'s Paradise!', ' The product selection is extensive, and I appreciate the detailed product descriptions and reviews from other customers. The checkout process is smooth, and I always receive my orders on time. Overall, a great online shopping experience!\"', 0, '', 1, 1, 1, '2024-04-14 11:03:39.355977', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, '4ca743ac-effb-11ed-b06e-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', NULL, '0e973860-b3b5-11ed-86da-98460a99789a', 'Asif Iqbal', 3, 'Must Buy, Nice Product', 'The staff was great. The receptionists were very helpful and answered all our questions. The room was clean and bright, and the room service was always on time. Will be coming back! Thank you so much', 0, '', 1, 1, 1, '2023-05-11 12:56:52.017808', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'f304f9a2-f036-11ed-ac58-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', NULL, 'None', 'User', 3, 'Efficient and Reliable Shopping Hub', 'As a busy professional, I rely heavily on online shopping for convenience. This ecommerce platform has become my go-to hub for all my purchases. The website\'s layout is clean and easy to navigate, allowing me to find what I need quickly.', 0, '', 1, 1, 1, '2024-04-14 11:08:14.626418', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, '217a1b6e-f037-11ed-ac58-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', NULL, '0e973860-b3b5-11ed-86da-98460a99789a', 'Asif Iqbal', 5, 'Good Product Must Buy', '\"I\'ve been using this ecommerce platform for my small business for over a year now, and I couldn\'t be happier. The user interface is intuitive, making it easy for me to manage my products and orders.', 0, '', 1, 1, 1, '2024-04-14 11:09:42.679262', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'a3118ea0-07b6-11ee-884f-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', NULL, 'None', 'User', 4, 'Very good', 'very very gooooood', 0, '', 1, 1, 1, '2023-06-10 17:45:49.632605', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, 'c62f0532-07b8-11ee-884f-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', NULL, 'None', 'User', 5, 'hello ', 'hellooo', 0, '', 1, 1, 1, '2023-06-10 18:01:07.540926', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'd061ba60-07bb-11ee-884f-98460a99789a', 'b012fa34-ee30-11ed-9ffa-98460a99789a', NULL, 'None', 'User', 1, 'hello one star', 'hello one starhello one starhello one starhello one star\r\nhello one starhello one starhello one starhello one starhello one starhello one starhello one starhello one starhello one starhello one star', 0, '', 1, 1, 1, '2023-06-10 18:22:53.140557', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `receivers_phone_no` varchar(15) NOT NULL,
  `addr_house_no` varchar(50) NOT NULL,
  `addr_locality` varchar(100) NOT NULL,
  `addr_city` varchar(100) NOT NULL,
  `addr_pin_code` int(10) NOT NULL,
  `addr_state` varchar(20) NOT NULL,
  `addr_country` varchar(10) NOT NULL,
  `addr_type` int(2) NOT NULL COMMENT '1 => home,\r\n2 => work'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `user_uuid`, `user_name`, `email`, `phone_no`, `password`, `receivers_phone_no`, `addr_house_no`, `addr_locality`, `addr_city`, `addr_pin_code`, `addr_state`, `addr_country`, `addr_type`) VALUES
(1, '0e973860-b3b5-11ed-86da-98460a99789a', 'Asif Iqbal', 'aasif.iqbal9000@gmail.com', '1111', '1111', '9898119988', 'K-294,K-Block', 'Ashok Nagar', 'Delhi', 110024, 'Delhi', 'India', 1),
(2, 'baa40c4c-b404-11ed-b371-98460a99789a', 'Testing', 'test123@gmail.com', '2222', '2222', '0', 'testing house 29/2', 'Testing', 'Testing', 221122, 'Delhi', 'India', 1),
(3, '988f64b4-bc4a-11ed-bb06-98460a99789a', 'Jack', 'jack@gmail.com', '8888', '1111', '9090221122', 'H-98/2, Near Dep Talab', 'Dr. Zakkir Hussain Road', 'Hazaribagh', 110023, 'Delhi', 'India', 1),
(5, '2aa6bd0e-f7bd-11ed-b322-98460a99789a', 'Jaki', 'jaki@gmail.com', '9999', '9999', '9898001122', 'house no 99', 'hzb', 'Delhi', 110024, 'Delhi', 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_orders`
--

CREATE TABLE `tbl_shipping_orders` (
  `shipping_id` int(11) NOT NULL,
  `shipping_uuid` varchar(255) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `total_amount` int(6) NOT NULL,
  `total_quantity` int(4) NOT NULL,
  `payment_mode` varchar(10) NOT NULL COMMENT '0=>Online\r\n1=>COD',
  `payment_status` int(5) NOT NULL,
  `shipping_status` int(2) NOT NULL COMMENT '0=> Pending\r\n1=> Shipped\r\n2=> Cancelled',
  `transpoter_name` varchar(25) NOT NULL,
  `conformation_code` int(8) NOT NULL,
  `ordered_datetime` datetime(6) NOT NULL,
  `order_recived_datetime` datetime(6) NOT NULL COMMENT 'it update when c_code is updated',
  `product_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_json`)),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipping_orders`
--

INSERT INTO `tbl_shipping_orders` (`shipping_id`, `shipping_uuid`, `order_uuid`, `product_uuid`, `variation_uuid`, `user_uuid`, `payment_id`, `total_amount`, `total_quantity`, `payment_mode`, `payment_status`, `shipping_status`, `transpoter_name`, `conformation_code`, `ordered_datetime`, `order_recived_datetime`, `product_json`, `status`) VALUES
(1, '3c0ffa7a-fb8b-11ed-8d0a-98460a99789a', '3c0f39d2-fb8b-11ed-8d0a-98460a99789a', '', NULL, '0e973860-b3b5-11ed-86da-98460a99789a', '', 0, 0, '1', 0, 0, '', 944967, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '[{\"user_uuid\":\"988f64b4-bc4a-11ed-bb06-98460a99789a\",\"product_uuid\":\"2a76760a-fa1d-11ed-990c-98460a99789a\",\"product_name\":\"Red T shirt White line\",\"product_image\":\"edit-646dee4959f84.jpeg\",\"item_count\":\"1\",\"product_size_name\":\"M\",\"product_color_name\":\"Purple\",\"product_selling_price\":\"2275\"},{\"user_uuid\":\"988f64b4-bc4a-11ed-bb06-98460a99789a\",\"product_uuid\":\"b012fa34-ee30-11ed-9ffa-98460a99789a\",\"product_name\":\"Regular Fit Rib-knit resort shirt\",\"product_image\":\"w1.jpeg\",\"item_count\":\"1\",\"product_size_name\":\"L\",\"product_color_name\":\"Blue\",\"product_selling_price\":\"2849\"}]', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category_children`
--
ALTER TABLE `tbl_category_children`
  ADD PRIMARY KEY (`child_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tbl_category_patents`
--
ALTER TABLE `tbl_category_patents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_custom_size`
--
ALTER TABLE `tbl_custom_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `tbl_main_product`
--
ALTER TABLE `tbl_main_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_main_product_images`
--
ALTER TABLE `tbl_main_product_images`
  ADD PRIMARY KEY (`main_image_id`);

--
-- Indexes for table `tbl_mapping_orderedProducts_user`
--
ALTER TABLE `tbl_mapping_orderedProducts_user`
  ADD PRIMARY KEY (`mapping_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_cancellation`
--
ALTER TABLE `tbl_order_cancellation`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `tbl_order_return_refund`
--
ALTER TABLE `tbl_order_return_refund`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `tbl_product_variation_colorImgs`
--
ALTER TABLE `tbl_product_variation_colorImgs`
  ADD PRIMARY KEY (`auto_color_img_id`);

--
-- Indexes for table `tbl_rating_reviews`
--
ALTER TABLE `tbl_rating_reviews`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_shipping_orders`
--
ALTER TABLE `tbl_shipping_orders`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_category_children`
--
ALTER TABLE `tbl_category_children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category_patents`
--
ALTER TABLE `tbl_category_patents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_custom_size`
--
ALTER TABLE `tbl_custom_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_main_product`
--
ALTER TABLE `tbl_main_product`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_main_product_images`
--
ALTER TABLE `tbl_main_product_images`
  MODIFY `main_image_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_mapping_orderedProducts_user`
--
ALTER TABLE `tbl_mapping_orderedProducts_user`
  MODIFY `mapping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_cancellation`
--
ALTER TABLE `tbl_order_cancellation`
  MODIFY `auto_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_return_refund`
--
ALTER TABLE `tbl_order_return_refund`
  MODIFY `auto_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product_variation_colorImgs`
--
ALTER TABLE `tbl_product_variation_colorImgs`
  MODIFY `auto_color_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_rating_reviews`
--
ALTER TABLE `tbl_rating_reviews`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shipping_orders`
--
ALTER TABLE `tbl_shipping_orders`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
