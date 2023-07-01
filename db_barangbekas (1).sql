-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 03:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barangbekas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Elektronik'),
(2, 'Kebutuhan Laboratorium'),
(3, 'Alat Tulis'),
(6, 'Kebutuhan Sehari - Hari'),
(7, 'Bahan Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `user_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(8, 3, 1, 'Pulpen', 20000, 'Pulpen berwarna hitam dengan kualitasi luar biasa', 'produk1671356176.jpg', 1, '2022-12-17 23:11:20'),
(9, 2, 1, 'Jas Laboratorium', 150000, 'Jas Lab untuk praktikum Kimia', 'produk1671355699.jpg', 1, '2022-12-18 02:28:19'),
(10, 1, 1, 'Jam Tangan', 2000000, 'Jam tangan keren untuk anak muda', 'produk1671356024.jpg', 1, '2022-12-18 02:33:44'),
(11, 1, 1, 'Laptop', 7000000, 'Laptop dengan kondisi bagus', 'produk1671356849.jpg', 0, '2022-12-18 02:46:45'),
(12, 6, 3, 'Buku Tulis', 20000, 'Buku Tulis Tebal', 'produk1671358368.jpg', 1, '2022-12-18 03:12:48'),
(13, 6, 3, 'Ransel', 250000, 'Ransel hitam dengan kapasitas besar yang kuat', 'produk1671364169.jpg', 1, '2022-12-18 04:49:29'),
(14, 3, 3, 'Tipp-Ex', 15000, 'Tipp Ex untuk menghapus tulisan yang salah', 'produk1671428465.jpg', 1, '2022-12-18 22:41:05'),
(15, 2, 3, 'Laptop Testing', 5000000, 'Laptop bekas dengan kondisi yang masih bagus ', 'produk1671428864.jpg', 1, '2022-12-18 22:47:44'),
(18, 3, 1, 'Pensil HB', 3000, 'Pensil HB terbaek', 'produk1673323473.jpg', 1, '2023-01-10 04:04:33'),
(19, 1, 1, 'Acer Predator', 15000000, 'Acer Predator Ram 16gb', 'produk1673323649.jpg', 1, '2023-01-10 04:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `nim` int(11) NOT NULL,
  `no_telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `nama_lengkap`, `prodi`, `nim`, `no_telp`) VALUES
(1, 'Jojo', 'f1ac04f415d3b2488558471511d078f8', 'Josua Raun', 'Ilmu Komputer', 105219048, '+6281284428777'),
(3, 'Sofi', '5e815eeec84bd28f786bfe9e5a4571ad', 'Ahmad Shofiyullah', 'Ilmu Komputer', 105219008, '+628813766816');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
