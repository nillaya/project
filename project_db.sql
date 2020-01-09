-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 05:12 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booth`
--

CREATE TABLE `booth` (
  `booth_id` int(10) NOT NULL,
  `booth_date` date NOT NULL,
  `booth_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booth`
--

INSERT INTO `booth` (`booth_id`, `booth_date`, `booth_location`) VALUES
(9, '2019-11-28', 'Original pateg'),
(10, '2019-11-28', 'Bangkok'),
(11, '2019-11-28', 'Singkapo');

-- --------------------------------------------------------

--
-- Table structure for table `boot_d`
--

CREATE TABLE `boot_d` (
  `bd_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `booth_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boot_d`
--

INSERT INTO `boot_d` (`bd_id`, `p_id`, `p_qty`, `booth_id`) VALUES
(1, 1, 12, 1),
(2, 2, 12, 2),
(3, 1, 13, 2),
(4, 0, 3, 6),
(5, 1, 1, 7),
(6, 11, 2, 3),
(7, 13, 3, 3),
(8, 3, 3, 3),
(9, 4, 4, 3),
(10, 14, 1, 9),
(11, 13, 2, 9),
(12, 10, 3, 9),
(13, 7, 4, 9),
(14, 6, 2, 10),
(15, 4, 1, 10),
(16, 2, 3, 10),
(17, 13, 2, 11),
(18, 5, 1, 11),
(19, 3, 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Tlejourn X Flipflops'),
(2, 'Tlejourn X Larinn'),
(3, 'Tlejourn X TiiD');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_tel` varchar(15) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `username`, `email`, `passwd`, `cus_name`, `cus_tel`, `cus_address`, `level`) VALUES
(37, 'asdf', 'nillayabee@gmail.com', '202cb962ac59075b964b07152d234b70', 'นิลยา  โส๊ะอ้น', '0915328143', 'สุราษฎร์ธานี ไชยา 84110', 'm'),
(38, 'nillaya', 'yahabeesh@gmail.com', '75ebb02f92fc30a8040bbd625af999f1', 'ปวีณา  โส๊ะอ้น', '0915328455', 'hatyai thailand 84555', 'm'),
(39, 'azila', 'azila@gmail.com', '202cb962ac59075b964b07152d234b70', 'Azila wea', '0897554111', '                                                         Narathivat                                                                                                                                                                                            ', 'm'),
(40, 'liza', 'lizalalal@gmail.com', '202cb962ac59075b964b07152d234b70', 'lalalalal', '0915328455', 'bombea japan                                                                                                                   ', 'm'),
(41, 'user', 'nillaya@gmail.com', '202cb962ac59075b964b07152d234b70', 'เอ๋ ปารีณา', '0897556458', 'รูสะมิแล ปัตตานี 10140', 'm'),
(42, 'zzio', 'zzio@gmail.com', '202cb962ac59075b964b07152d234b70', 'ธนาธร จุ้ง', '0874569874', '12 อ.เมือง จ.สงขลา 8544', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `damage`
--

CREATE TABLE `damage` (
  `d_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `d_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `damage`
--

INSERT INTO `damage` (`d_id`, `p_id`, `d_qty`) VALUES
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `generate`
--

CREATE TABLE `generate` (
  `generate_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `generate_date` date NOT NULL,
  `generate_qty` int(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'กำลังผลิต',
  `sta` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generate`
--

INSERT INTO `generate` (`generate_id`, `p_id`, `mem_id`, `generate_date`, `generate_qty`, `status`, `sta`) VALUES
(27, 7, 5, '2019-11-10', 30, 'เสร็จสิ้น', 2),
(28, 8, 6, '2019-11-01', 13, 'กำลังผลิต', 2),
(29, 4, 2, '2019-11-12', 20, 'กำลังผลิต', 2),
(30, 3, 3, '2019-11-13', 100, 'เสร็จสิ้น', 1);

-- --------------------------------------------------------

--
-- Table structure for table `generate_detail`
--

CREATE TABLE `generate_detail` (
  `gd_id` int(10) NOT NULL,
  `generate_id` int(10) NOT NULL,
  `m_qty` int(10) NOT NULL,
  `material_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generate_detail`
--

INSERT INTO `generate_detail` (`gd_id`, `generate_id`, `m_qty`, `material_id`) VALUES
(48, 1, 10, 1),
(49, 1, 15, 2),
(50, 27, 20, 1),
(51, 27, 50, 2),
(52, 28, 13, 1),
(53, 28, 25, 2),
(54, 29, 20, 1),
(55, 29, 10, 2),
(56, 30, 100, 1),
(57, 30, 500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(10) NOT NULL,
  `mat_name` varchar(100) NOT NULL,
  `mat_qty` int(10) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `mat_name`, `mat_qty`, `unit`) VALUES
(1, 'พื้นรองเท้า', 6075, 'เมตร'),
(2, 'กาวโพลิรียูเทน', 5000, 'กรัม'),
(3, 'แผ่นอัด35x35', 5000, 'แผ่น'),
(4, 'กาวพอลิออล', 5000, 'มิลลิลิตร'),
(5, 'ไฮโซไซยาเนต', 5000, 'มิลลิลิตร');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(10) NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `mem_lastname` varchar(50) NOT NULL,
  `mem_tel` varchar(20) NOT NULL,
  `mem_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_lastname`, `mem_tel`, `mem_address`) VALUES
(2, 'นิลยา', 'โส๊ะอ้น', '0915328143', 'Suratthani thailand 84110'),
(3, 'อษิลา', 'แวสะมาแอ', '084759632', 'สุไหงโกลก จ.นราธิวาส  102253'),
(4, 'ยูมัยซะห์', 'ดาโต้ะ', '0937044802', 'สายบุรี ปานาเระ ปัตตานี'),
(5, 'ฮาฟีซา', 'เลาะปะ', '0635482146', 'สะนอ ยะรัง ปัตตานี'),
(6, 'ซารีดะห์', 'บุสุ', '0937356859', 'ปากน้ำโพ มันโก้จริงๆ');

-- --------------------------------------------------------

--
-- Table structure for table `order_m`
--

CREATE TABLE `order_m` (
  `om_id` int(10) NOT NULL,
  `om_date` date NOT NULL,
  `sup_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_m`
--

INSERT INTO `order_m` (`om_id`, `om_date`, `sup_id`) VALUES
(14, '0000-00-00', 0),
(15, '0000-00-00', 0),
(16, '0000-00-00', 0),
(17, '0000-00-00', 0),
(18, '0000-00-00', 0),
(19, '0000-00-00', 0),
(20, '0000-00-00', 0),
(21, '0000-00-00', 0),
(22, '0000-00-00', 0),
(23, '0000-00-00', 0),
(24, '0000-00-00', 0),
(25, '0000-00-00', 0),
(26, '0000-00-00', 0),
(27, '0000-00-00', 0),
(28, '0000-00-00', 0),
(29, '0000-00-00', 0),
(30, '0000-00-00', 0),
(31, '0000-00-00', 0),
(32, '0000-00-00', 0),
(33, '0000-00-00', 0),
(34, '0000-00-00', 0),
(35, '0000-00-00', 0),
(36, '0000-00-00', 0),
(37, '0000-00-00', 0),
(38, '0000-00-00', 0),
(39, '0000-00-00', 0),
(40, '0000-00-00', 0),
(41, '0000-00-00', 0),
(42, '0000-00-00', 0),
(43, '2019-11-08', 2),
(44, '2019-11-08', 2),
(45, '2019-11-08', 1),
(46, '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_md`
--

CREATE TABLE `order_md` (
  `omd_id` int(10) NOT NULL,
  `om_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
  `omd_price` int(10) NOT NULL,
  `omd_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_md`
--

INSERT INTO `order_md` (`omd_id`, `om_id`, `material_id`, `omd_price`, `omd_qty`) VALUES
(22, 13, 1, 88, 7777),
(23, 13, 2, 9, 8),
(24, 14, 1, 3, 2),
(25, 43, 1, 10, 200),
(26, 43, 2, 10, 100),
(27, 44, 2, 10, 100),
(28, 45, 1, 20, 200),
(29, 45, 2, 10, 100),
(30, 46, 2, 1000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `partner_id` int(10) NOT NULL,
  `p_brand` varchar(50) NOT NULL,
  `partner_name` varchar(100) NOT NULL,
  `partner_mail` varchar(50) NOT NULL,
  `partner_tel` varchar(15) NOT NULL,
  `partner_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `p_brand`, `partner_name`, `partner_mail`, `partner_tel`, `partner_address`) VALUES
(1, 'TiiD', 'TiiD Design and Innovation Center', 'industdev@gmail.com', '020484743', '406/65 อาร์เค พาร์ค รามอินทรา แขวงบางชัน กรุงเทพ 10510'),
(2, 'Larinn', 'Larinn', 'larinnbydoublep@gmail.com', '0854458871', 'Bangkok Thailand 10400'),
(3, 'Tlejourn X Flipflops', 'Tlejourn ', 'Tlejourn@gmail.com', '-', 'Pattani');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_amount` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `status_pay` varchar(50) NOT NULL,
  `pay_bill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_date`, `pay_amount`, `sale_id`, `status_pay`, `pay_bill`) VALUES
(12, '2019-11-10', 898, 53, 'ยืนยันการชำระเงิน', 'IMG_0161-1.JPG'),
(13, '2019-11-10', 1649, 54, 'ยืนยันการชำระเงิน', 'IMG_0943.JPG'),
(14, '2019-11-10', 449, 55, 'ยืนยันการชำระเงิน', 'IMG_1119.JPG'),
(15, '2019-11-10', 1250, 56, 'ยืนยันการชำระเงิน', 'IMG_0022.JPG'),
(16, '2019-11-11', 1250, 57, 'ยืนยันการชำระเงิน', 'IMG_0118.JPG'),
(17, '2019-11-11', 1250, 60, 'ยืนยันการชำระเงิน', 'IMG_0943.JPG'),
(18, '2019-11-11', 1250, 61, 'ยืนยันการชำระเงิน', 'IMG_0019-1.JPG'),
(19, '2019-11-11', 449, 64, 'ยืนยันการชำระเงิน', 'IMG_0161-1.JPG'),
(20, '2019-11-12', 1340, 65, 'ยืนยันการชำระเงิน', 'IMG_0019-1.JPG'),
(21, '2019-11-12', 1549, 66, 'ยืนยันการชำระเงิน', 'IMG_0292.JPG'),
(22, '2019-11-13', 449, 67, 'ชำระแล้ว', 'IMG_1981.JPG'),
(23, '2019-11-13', 4548, 68, 'ยืนยันการชำระเงิน', 'im21.jpg'),
(24, '2019-11-28', 449, 69, 'ชำระแล้ว', 'tristan-gevaux-Otedz7W0jAc-unsplash.jpg'),
(25, '2019-11-28', 1150, 70, 'ชำระแล้ว', 'IMG_0022.JPG'),
(26, '2019-11-28', 1150, 71, 'ชำระแล้ว', 'IMG_0021.JPG'),
(27, '2019-11-28', 1150, 73, 'ยืนยันการชำระเงิน', 'IMG_0019-1.JPG'),
(28, '2019-11-28', 449, 74, 'ชำระแล้ว', 'IMG_0118.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `partner_id` int(10) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_size` varchar(10) NOT NULL,
  `p_qt` int(10) NOT NULL,
  `p_detail` varchar(150) NOT NULL,
  `p_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `partner_id`, `p_price`, `p_size`, `p_qt`, `p_detail`, `p_image`) VALUES
(2, 'สลิปออน', 3, 1290, '39', 0, 'รองเท้าผ้าลินิน       ', '73015157_2428735877351341_3406847275564007424_n.jpg'),
(3, 'รองเท้าสาย', 3, 399, '39', 150, 'รองเท้าสายสำหรับผญ    ', 'im2.jpg'),
(4, 'รองเท้า', 3, 399, '36', 14, 'รองเท้าผูกเชือก     ', 'im13.jpg'),
(5, 'รองเท้า', 3, 399, '36', 241, 'รองเท้า ', '72712184_2429844430573819_7680950818735915008_n.jpg'),
(6, 'รองเท้า', 3, 399, '38', 56, 'รองเท้า', '73235541_2429652853926310_1273065831663665152_n.jpg'),
(7, 'รองเท้า', 3, 399, '37', 40, 'รองเท้า', '73015157_2428735877351341_3406847275564007424_n.jpg'),
(8, 'สลิปออนผ้าลินิน', 2, 1200, '39', 20, 'ผลิตจากผ้าธรรมชาติ ', '70240910_2386045304953732_6771370440154677248_n.jpg'),
(9, 'Toledo Kids', 2, 1100, '31', 11, 'รองเท้าเด็ก น่ารักๆ ผลิตจากผ้าธรรมชาติ ', 'im42.jpg'),
(10, 'สลิปออน', 1, 1500, '42', 9, 'สลิปออน มีเชือกนิดๆ สวยๆ  ', 'im43.jpg'),
(11, 'รองเท้าหนัง Oxford', 2, 1990, '44', 10, 'รองเท้าหนัง Oxford 3 สี (Navy, White, Grey) \r\nพื้นทะเลจร หนังแท้', 'im44.jpg'),
(12, 'รองเท้าหนังOxfordWhite', 2, 1990, '45', 10, 'รองเท้าหนัง Oxford สี White หนังแท้', 'im45.jpg'),
(13, 'รองเท้าแตะฟรุ้งฟริ้ง', 0, 399, '39', 15, 'รองเท้าแตะฟรุ้งฟริ้ง ขนนุ่มนิ่ม', 'im47.jpg'),
(14, 'รองเท้าพันสาย', 3, 399, '36', 20, 'รองเท้าสาย หุ้มด้วยเชือกผูก เก๋ๆ', 'im48.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `pd_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `partner_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `salary_date` date NOT NULL,
  `salary_amount` int(10) NOT NULL,
  `status_salary` varchar(20) NOT NULL,
  `generate_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_date`, `salary_amount`, `status_salary`, `generate_id`) VALUES
(4, '2019-11-12', 3900, 'จ่ายแล้ว', 27),
(5, '2019-11-01', 1690, 'จ่ายแล้ว', 28),
(6, '2019-11-28', 2600, 'จ่ายแล้ว', 29);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(10) NOT NULL,
  `sale_date` datetime NOT NULL,
  `c_id` int(10) NOT NULL,
  `sale_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `sale_date`, `c_id`, `sale_total`) VALUES
(53, '2019-11-10 17:38:21', 31, 898),
(54, '2019-11-10 18:39:22', 31, 1649),
(55, '2019-11-10 19:37:51', 31, 449),
(56, '2019-11-10 20:18:17', 31, 1250),
(57, '2019-11-11 12:16:09', 32, 1250),
(58, '2019-11-11 12:31:01', 32, 6700),
(60, '2019-11-11 14:01:39', 37, 1250),
(61, '2019-11-11 14:13:01', 38, 1250),
(62, '2019-11-11 19:23:45', 39, 449),
(64, '2019-11-11 19:24:13', 39, 449),
(65, '2019-11-12 12:44:50', 37, 1340),
(66, '2019-11-12 22:36:40', 40, 1549),
(67, '2019-11-13 11:01:23', 40, 449),
(68, '2019-11-13 15:53:20', 40, 4548),
(69, '2019-11-28 20:31:31', 37, 449),
(70, '2019-11-28 21:31:54', 41, 1150),
(71, '2019-11-28 21:32:55', 41, 1150),
(72, '2019-11-28 21:33:43', 41, 1150),
(73, '2019-11-28 21:34:04', 41, 1150),
(74, '2019-11-28 23:20:50', 42, 449);

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `sd_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `sd_price` int(10) NOT NULL,
  `sd_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`sd_id`, `sale_id`, `p_id`, `sd_price`, `sd_qty`) VALUES
(30, 53, 4, 399, 2),
(31, 54, 8, 1200, 1),
(32, 54, 4, 399, 1),
(33, 55, 3, 399, 1),
(34, 56, 8, 1200, 1),
(35, 57, 1, 1200, 1),
(36, 58, 2, 1290, 5),
(37, 60, 8, 1200, 1),
(38, 61, 8, 1200, 1),
(39, 62, 4, 399, 1),
(40, 64, 4, 399, 1),
(41, 65, 2, 1290, 1),
(42, 66, 9, 1100, 1),
(43, 66, 3, 399, 1),
(44, 67, 13, 399, 1),
(45, 68, 3, 399, 2),
(46, 68, 1, 1200, 3),
(47, 69, 4, 399, 1),
(48, 70, 9, 1100, 1),
(49, 71, 9, 1100, 1),
(50, 72, 9, 1100, 1),
(51, 73, 9, 1100, 1),
(52, 74, 3, 399, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `shipping` varchar(50) NOT NULL,
  `status_shipping` varchar(50) NOT NULL DEFAULT 'รอดำเนินการ',
  `shipping_date` date NOT NULL,
  `tracking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `sale_id`, `shipping`, `status_shipping`, `shipping_date`, `tracking`) VALUES
(11, 58, 'Kerry Express', 'รอดำเนินการ', '0000-00-00', ''),
(13, 60, 'Thailand Post-EMS', 'จัดส่งเรียบร้อย', '2019-11-14', 'EP88745555YH'),
(14, 61, 'Kerry Express', 'จัดส่งเรียบร้อย', '2019-11-11', 'KK554885TH'),
(15, 62, 'Thailand Post-EMS', 'จัดส่งเรียบร้อย', '2019-11-11', 'EP985470052TH'),
(17, 64, 'Thailand Post-EMS', 'รอดำเนินการ', '0000-00-00', ''),
(18, 65, 'Thailand Post-EMS', 'รอดำเนินการ', '0000-00-00', ''),
(19, 66, 'Kerry Express', 'จัดส่งเรียบร้อย', '2019-11-12', 'KK78945665TH'),
(20, 67, 'J&T Express', 'รอดำเนินการ', '0000-00-00', ''),
(21, 68, 'Thailand Post-EMS', 'รอดำเนินการ', '0000-00-00', ''),
(22, 69, 'Kerry Express', 'รอดำเนินการ', '0000-00-00', ''),
(23, 70, 'Kerry Express', 'จัดส่งเรียบร้อย', '0000-00-00', 'EP985478855TH'),
(24, 71, 'Ninja Van', 'รอดำเนินการ', '0000-00-00', ''),
(25, 72, 'Ninja Van', 'รอดำเนินการ', '0000-00-00', ''),
(26, 73, 'J&T Express', 'รอดำเนินการ', '0000-00-00', ''),
(27, 74, 'Flash Express', 'รอดำเนินการ', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(10) NOT NULL,
  `sup_name` varchar(150) NOT NULL,
  `sup_tel` varchar(15) NOT NULL,
  `sup_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_tel`, `sup_add`) VALUES
(1, 'Tash Hero', '0852236645', 'Phuket'),
(2, 'Tash Hero Bangkok', '087965212', 'bangkok thailand 11040'),
(3, 'Original Patak', '068554222', 'pattani thailand');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `userlevel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `passwd`, `userlevel`) VALUES
('admin', 'administator@gmail.com', '202cb962ac59075b964b07152d234b70', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booth`
--
ALTER TABLE `booth`
  ADD PRIMARY KEY (`booth_id`);

--
-- Indexes for table `boot_d`
--
ALTER TABLE `boot_d`
  ADD PRIMARY KEY (`bd_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `damage`
--
ALTER TABLE `damage`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `generate`
--
ALTER TABLE `generate`
  ADD PRIMARY KEY (`generate_id`);

--
-- Indexes for table `generate_detail`
--
ALTER TABLE `generate_detail`
  ADD PRIMARY KEY (`gd_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `order_m`
--
ALTER TABLE `order_m`
  ADD PRIMARY KEY (`om_id`);

--
-- Indexes for table `order_md`
--
ALTER TABLE `order_md`
  ADD PRIMARY KEY (`omd_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booth`
--
ALTER TABLE `booth`
  MODIFY `booth_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `boot_d`
--
ALTER TABLE `boot_d`
  MODIFY `bd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `damage`
--
ALTER TABLE `damage`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generate`
--
ALTER TABLE `generate`
  MODIFY `generate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `generate_detail`
--
ALTER TABLE `generate_detail`
  MODIFY `gd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_m`
--
ALTER TABLE `order_m`
  MODIFY `om_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_md`
--
ALTER TABLE `order_md`
  MODIFY `omd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `partner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `pd_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `sd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
