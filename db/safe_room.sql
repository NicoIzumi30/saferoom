-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 09:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safe_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `image`) VALUES
(4, 'Jakarta', 'jakarta.png'),
(5, 'Bali', 'bali.png'),
(6, 'Yogyakarta', 'yogyakarta.png'),
(7, 'Bandung', 'bandung.png'),
(8, 'Malang', 'malang.png'),
(9, 'Medan', 'medan.png'),
(10, 'Solo', 'solo.png'),
(11, 'Bogor', 'bogor.png');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `coment` text NOT NULL,
  `fasilitas` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`id`, `full_name`, `coment`, `fasilitas`, `image`) VALUES
(8, 'Heru', 'Hahaha', 'Resepsionis,AC,Televisi', ''),
(9, 'Heru', 'random bang', 'Resepsionis,AC,wifi Gratis', 'Array,Array,Array,Array,Array,Array'),
(10, 'Heru', 'bismillah', 'Resepsionis,AC,Televisi', 'thumb1.png,twitter.png,download (4) 1.png,download (5) 1.png,download (6) 1.png'),
(11, 'Heru', 'asdcfwesdacvfeaw', 'Resepsionis,AC,Televisi', 'close-icon-13591.png,email-icon-121.png,img1.png'),
(12, 'sdc vfdr', 'aszxc sadz', 'Resepsionis,AC', 'close-icon-13591.png,email-icon-121.png,img1.png');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nama_hotel` varchar(256) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemilik` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `jumlah_kamar` varchar(10) NOT NULL,
  `about` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `nama_hotel`, `id_city`, `id_user`, `pemilik`, `alamat`, `jumlah_kamar`, `about`, `status`) VALUES
(1, 'Purnama Hotel', 2, 8, 'Sukardi', '', '', 'Check in from 2 pm to 4 am on the next day\r\nCheck out before 12 pm', 1),
(2, 'Hotel Mangkubumi', 2, 1, 'Cahyaningrat', '', '', 'Check in from 2 pm to 4 am on the next day Check out before 12 pm', 1),
(6, 'Jiuaa', 2, 1, 'aasdx', '', '', 'ewqfdrew4', 1),
(7, 'Hotel Mangkubumi', 2, 1, 'Cahyaningrat', '', '', 'asdw', 1),
(10, 'Hotel Mangkubumi', 2, 1, 'Cahyaningrat', 'Jl. Imam Bonjol No.45, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80112, Jalan Imam Bonjol, No 45, Pemecutan Klod, Kecamatan Denpasar Barat, Denpasar Barat, Indonesia, 80112', '12', 'yangPunyaYGY', 1),
(14, 'Nico', 2, 1, 'Suharto', 'Jl. Imam Bonjol No.45, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80112, Jalan Imam Bonjol, No 45, Pemecutan Klod, Kecamatan Denpasar Barat, Denpasar Barat, Indonesia, 80112', '11', 'Hotel yang berada di tanah hijau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `room_name` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `facility` varchar(256) NOT NULL,
  `price` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `user_id`, `hotel_id`, `type_id`, `room_name`, `image`, `address`, `facility`, `price`, `about`, `status`) VALUES
(1, 1, 2, 1, 'Heru', 'img1.png,keripik-bawang-pangsit-crispy-fried-260nw-1897975168-removebg-preview.png,logo.png,tugu-pancakarsa-sentul 1.png', 'Jl lagi gabut km 12', 'Resepsionis,AC,wifi Gratis', '210000', 'Cape bang?', '1');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `name`) VALUES
(1, 'Standar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `date_of_birth` varchar(256) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `date_of_birth`, `gender`, `email`, `telp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Nico Izumi', '', '', 'izumi@mail.com', '', 'default.jpg', '$2y$10$eZ1zsN22l6Epwl.umfdGQO0.zx0CK1R2Zh5BQPonX11Irmclk/tfW', 1, 1, 1664092535),
(8, 'Rafi', '', '', 'jal@admin.com', '', 'default.jpg', '$2y$10$PiQVnpM8Bmm3eBDST3oNx./mxUJs7kTs0skpRQIBgiTVRWMUp.iui', 1, 1, 1665026453);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 5),
(11, 1, 10),
(13, 1, 12),
(14, 1, 13),
(15, 2, 1),
(16, 2, 5),
(17, 2, 11),
(18, 2, 13),
(22, 1, 9),
(23, 1, 11),
(28, 1, 6),
(29, 2, 2),
(31, 1, 15),
(36, 1, 16),
(37, 1, 17),
(38, 1, 18),
(39, 1, 19),
(41, 1, 2),
(42, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_client`
--

CREATE TABLE `user_client` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_client`
--

INSERT INTO `user_client` (`id`, `full_name`, `email`, `telp`, `password`, `image`, `is_active`, `role`, `date_created`) VALUES
(1, 'Izumii', 'xzumi3@gmail.com', '859126462972', '$2y$10$K4d.D3Lg4JVeoyktkh/0SuwTMhoUPijfXvwfs17QjQJpSDdaiWx7.', 'default.jpg', '1', 'member', '1667233868'),
(2, 'Izumii', 'xzumi31@gmail.com', '859126462972', '$2y$10$i5pQ6AfTeS3ycdkQIXdhle9SDkVQEIU2pOMxhFZEvc2XoUEHRF3la', 'default.jpg', '1', 'partner', '1667234340'),
(3, 'Izumii', 'xzumi311@gmail.com', '234242', '$2y$10$62AhBpxB2anpgrsWYj5Kt.PKXhOJiDEihogUgkZFNB3eNDk4nCmZC', 'default.jpg', '1', 'member', '1668325799');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Dashboard', 'fas fa-fw fa-tachometer-alt'),
(2, 'Profile', 'fas fa-fw fa-user'),
(6, 'Menu', 'fas fa-fw fa-folder'),
(14, 'Users', 'fas fa-fw fa-users'),
(15, 'Type', 'fas fa-fw fa-list'),
(16, 'Hotel', 'fas fa-fw fa-hotel'),
(17, 'Room', 'fas fa-fw fa-bed'),
(19, 'City', 'fas fa-fw fa-city');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member\r\n'),
(4, 'Intership');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 1),
(2, 2, 'My Profile', 'profile', 1),
(3, 2, 'Edit Profile', 'profile/edit', 1),
(4, 5, 'Data Kategori Menu', 'product/category', 1),
(5, 5, 'Data Variasi Menu', 'product/variasi', 1),
(6, 6, 'Menu Management', 'menu', 1),
(7, 6, 'Sub Menu Management', 'menu/submenu', 1),
(12, 10, 'Article', 'pr/article', 1),
(13, 11, 'Article', 'pr/article', 1),
(14, 12, 'Laporan Survey', 'survey', 1),
(15, 13, 'Pinter Hits Challenge', 'challenge', 1),
(16, 11, 'Upload Image', 'pr/upload_image', 1),
(17, 6, 'Role', 'menu/role', 1),
(18, 2, 'Change Password', 'profile/changepassword', 1),
(19, 19, 'List City', 'city', 1),
(20, 15, 'List Type', 'type', 1),
(21, 16, 'Data Hotel', 'hotel', 1),
(22, 17, 'Data room', 'room', 1),
(23, 14, 'User Admin', 'users/user_admin', 1),
(24, 14, 'User Client', 'users/user_client', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coba`
--
ALTER TABLE `coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_client`
--
ALTER TABLE `user_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
