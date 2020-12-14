-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 01:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE IF NOT EXISTS `db_admin` (
  `id_member` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`id_member`, `username`, `password`, `fullname`, `email`, `phone`, `permission`, `status`) VALUES
('a4', 'admin3', '123', 'đạt', 'dat@gmail.com', '0123456789', 'accountant', 'disable'),
('ad02', 'admin2', 'abc123', 'nguyễn võ trường giang', 'admin2@satlyboss.com', '0987654321', 'boss', 'disable'),
('boss', 'dqd', '123', 'đào quốc đạt', 'daoquocdat1807@gmail.com', '0853312353', 'boss', 'active'),
('nv01', 'nhanvien', 'abc123', 'A B C', 'abc@gmail.com', '1234566789', 'nhanvien', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `db_catelogy`
--

CREATE TABLE IF NOT EXISTS `db_catelogy` (
  `id_cat` varchar(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_catelogy`
--

INSERT INTO `db_catelogy` (`id_cat`, `name`) VALUES
('clot', 'clothes'),
('shoes', 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `db_details_product`
--

CREATE TABLE IF NOT EXISTS `db_details_product` (
  `id_pro` varchar(10) NOT NULL,
  `style` varchar(50) DEFAULT NULL COMMENT 'các loại kiểu dáng của sp',
  `color` varchar(50) NOT NULL COMMENT 'màu sắc của sp',
  `size` varchar(10) DEFAULT NULL COMMENT 'M,S,L,XL',
  `id_detail` varchar(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_detail`),
  KEY `id_pro` (`id_pro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_order`
--

CREATE TABLE IF NOT EXISTS `db_order` (
  `id_ord` int(10) NOT NULL AUTO_INCREMENT,
  `id_pro` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` int(100) NOT NULL,
  `date_purchase` date NOT NULL,
  `id_dis` varchar(10) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ord`),
  KEY `id_pro` (`id_pro`),
  KEY `id_user` (`id_user`),
  KEY `id_dis` (`id_dis`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE IF NOT EXISTS `db_product` (
  `id_pro` varchar(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_cat` varchar(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `status` varchar(50) NOT NULL COMMENT 'trạng thái gồm active và no active và new',
  `id_sup` varchar(10) NOT NULL,
  `pro_hot` tinyint(4) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `id_cat` (`id_cat`),
  KEY `id_sup` (`id_sup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_product`
--

INSERT INTO `db_product` (`id_pro`, `name`, `id_cat`, `amount`, `price`, `status`, `id_sup`, `pro_hot`, `img`) VALUES
('pro1', 'giày thể thao nike', 'shoes', 10, 1000000, 'active', 'nk', 0, 'http://localhost/admin/fileUpload/quan-gucci.jpg'),
('pro10', 'quần gucci xám', 'clot', 8, 500000, 'active', 'gc', 0, 'http://localhost/admin/fileUpload/quan-gucci-1.jpg'),
('pro2', 'Áo Gucci thời trang', 'clot', 5, 2300000, 'active', 'gc', 0, 'http://localhost/admin/fileUpload/ao-gucci.jpg'),
('pro20', 'abcddd', 'clot', 10, 100000, 'active', 'nk', 0, 'http://localhost/admin/fileUpload/giay-adidas.jpg'),
('pro3', 'quần gucci thời trang', 'clot', 10, 500000, 'active', 'gc', 0, 'http://localhost/admin/fileUpload/quan-gucci.jpg'),
('pro4', 'giày adidas đen', 'shoes', 10, 1050000, 'active', 'ad', 0, 'http://localhost/admin/fileUpload/adidas-den.jpg'),
('pro5', 'quần gucci', 'clot', 10, 350000, 'active', 'gc', 0, 'http://localhost/admin/fileUpload/quan-gucci.jpg'),
('pro6', 'quần nike ngắn', 'clot', 5, 500000, 'active', 'nk', 0, 'http://localhost/admin/fileUpload/quan-nike.jpg'),
('pro7', 'giày ultra boost', 'shoes', 7, 1050000, 'active', 'ad', 0, 'http://localhost/admin/fileUpload/ultra-boost-adidas.jpg'),
('pro8', 'giày adidas', 'shoes', 6, 600000, 'active', 'ad', 0, 'http://localhost/admin/fileUpload/giay-adidas-den.jpg'),
('pro9', 'áo nike xanh', 'clot', 11, 150000, 'active', 'nk', 0, 'http://localhost/admin/fileUpload/ao-nike.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_supplier`
--

CREATE TABLE IF NOT EXISTS `db_supplier` (
  `id_sup` varchar(10) NOT NULL COMMENT 'mã nhà cc',
  `name` varchar(255) NOT NULL COMMENT 'tên nhà cc',
  PRIMARY KEY (`id_sup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_supplier`
--

INSERT INTO `db_supplier` (`id_sup`, `name`) VALUES
('ad', 'adidas'),
('gc', 'gucci'),
('nk', 'nike');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_details_product`
--
ALTER TABLE `db_details_product`
  ADD CONSTRAINT `db_details_product_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `db_product` (`id_pro`);

--
-- Constraints for table `db_order`
--
ALTER TABLE `db_order`
  ADD CONSTRAINT `db_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`),
  ADD CONSTRAINT `db_order_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `db_admin` (`id_member`),
  ADD CONSTRAINT `db_order_ibfk_3` FOREIGN KEY (`id_pro`) REFERENCES `db_product` (`id_pro`);

--
-- Constraints for table `db_product`
--
ALTER TABLE `db_product`
  ADD CONSTRAINT `db_product_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `db_catelogy` (`id_cat`),
  ADD CONSTRAINT `db_product_ibfk_2` FOREIGN KEY (`id_sup`) REFERENCES `db_supplier` (`id_sup`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
