-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2023 pada 21.05
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `category_payment_method`
--

CREATE TABLE `category_payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category_payment_method`
--

INSERT INTO `category_payment_method` (`id`, `name`) VALUES
(1, 'Bank / ATM Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `city`
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
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nama_hotel` varchar(256) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemilik` varchar(256) NOT NULL,
  `maps` text NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `jumlah_kamar` varchar(10) NOT NULL,
  `about` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id`, `nama_hotel`, `id_city`, `id_user`, `pemilik`, `maps`, `alamat`, `jumlah_kamar`, `about`, `status`) VALUES
(21, 'Sans Hotel Puri Indah Jakarta', 4, 9, 'Bella afani', '', 'Jalan Kembangan Raya, No.2, Kembangan, Indonesia, 11610', '99', 'Popular Leisure, Shopping and Entertainment experiences near the Guest House are;  CBD Puri Indah (700 m), Puri Indah Mall (800 m), Hypermart Puri Indah (850 m), Lippo Mall Puri (950 m), Lotte Mart (3,8 km), Ranch Market Pesanggrahan (2,9 km), Lokbin Meruya Ilir (4,2 km), and The FoodHall (4,2 km).', 1),
(22, 'Aveta Hotel Malioboro', 6, 17, 'Ridho Pamungkas', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9616539019867!2d110.36362791432643!3d-7.793884879512569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59c6e514a5a3%3A0xbeca960436f8fe88!2sAveta%20Hotel%20Malioboro!5e0!3m2!1sid!2sid!4v1674158273990!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', '15', 'Hotel berkualitas di Yogyakarta', 1),
(23, 'Hotel Alia Matraman', 4, 18, 'Gilang Ramahan Pratama', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3736018037084!2d106.86112211431022!3d-6.214360962597789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f47fbf5c4a2f%3A0xa4bc2bd739efbbf3!2sHotel%20Alia%20Matraman!5e0!3m2!1sid!2sid!4v1674158212498!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', '32', 'Hotel mewah di jakarta yang sangat modern dan nyaman', 1),
(24, 'Quest Hotel San Denpasar', 5, 19, 'Heru Kristanto', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.1505489770843!2d115.18827561433653!3d-8.677229790741336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2472da60574ab%3A0x1441c746432a3b6d!2sQuest%20Hotel%20San%20Denpasar!5e0!3m2!1sid!2sid!4v1674158175781!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', '56', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `method` varchar(128) NOT NULL,
  `id_class` varchar(32) NOT NULL,
  `id_category` int(11) NOT NULL,
  `icon` varchar(256) NOT NULL,
  `norek` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_method`
--

INSERT INTO `payment_method` (`id`, `method`, `id_class`, `id_category`, `icon`, `norek`) VALUES
(1, 'Bank Central Asia (BCA)', 'bca', 1, 'BCA_new-1n 1.png', '43423424221'),
(3, 'Bank Mandiri', 'mandiri', 1, '1-removebg-preview_1.png', '123456787651'),
(4, 'Bank BRI', 'bri', 1, 'bank-bri-1n_2.png', '987654312123'),
(5, 'Bank BNI', 'bni', 1, 'bni-1n_1.png', '54313211231'),
(6, 'Maybank', 'maybank', 1, 'may-bank_1n_1.png', '1231312311213'),
(7, 'Permata', 'permata', 1, 'permata_new-1n_1.png', '34632425256');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tanggal_lahir` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `hotel` varchar(256) NOT NULL,
  `city` varchar(64) NOT NULL,
  `room` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'Pengajuan',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nama`, `tanggal_lahir`, `email`, `telp`, `gender`, `hotel`, `city`, `room`, `image`, `address`, `about`, `status`, `created`) VALUES
(1, 'Nico Izumi', '2022-11-04', 'xzumi3@gmail.com', '085703073753', 'Female', 'Resaa', '5', '11', 'WhatsApp Image 2022-10-19 at 18.02.58.jpg', 'Bantul\r\nYogyakarta', 'sialan', 'Diterima', '2022-11-19 16:22:20'),
(2, 'Nico Izumi', '2021-12-27', 'xzumi3@gmail.com', '085703073753', 'Female', 'Resaa', '4', '12', 'WhatsApp Image 2022-10-31 at 19.56.50.jpg', 'Bantul\r\nYogyakarta', 'yahahahahahha', 'Diterima', '2022-11-19 16:26:38'),
(3, 'Niczumi', '2004-12-30', 'xzumi3@gmail.com', '085703073753', 'Male', 'Resaa Hotel', '5', '30', '7V1HiE37lVI-01-12-24.png', 'Jauh di sanaa', 'oks', 'Diterima', '2022-11-19 16:17:02'),
(4, 'Nico Izumi', '2016-06-21', 'tantoyk7@gmail.com', '085703073753', 'Male', 'Mishaa Hotel', '6', '13', 'eab2604f7db5ff2b4361ba0c0035e86491b4db3d_s2_n2.jpg', 'Bantul\r\nYogyakarta', 'No About', 'Diterima', '2022-11-19 16:29:16'),
(5, 'Resaa Zahra', '2023-09-14', 'lalumana@mail.com', '6285703073753', 'Female', 'Resaa Hotel Bali', '5', '99', 'BCA_new-1n 1.png', 'Bali Pura Lupa Km 12 ', 'This Hotel YGY', 'Ditolak', '2022-11-19 20:00:03'),
(6, 'Buka Lapak', '2022-11-08', 'cobaan@mail.com', '6256178127121', 'Male', 'Halilintar Hotel', '8', '12', '152e12e8998e0d43adbedabc7f6b136c6ada4ca1_s2_n2.jpg', 'Di atas awan', 'Musim ujan', 'Diterima', '2022-11-19 20:16:31'),
(7, 'Jalham', '2022-12-15', 'kikiiii@mail.com', '12712173191', 'Female', 'Jalaludin Hotel', '11', '901', 'bf4a575ead1f4f6baea5ed25263f0f8176c6e930_s2_n2.jpg', 'Jauh disanaa', 'YTTA', 'Ditolak', '2022-11-19 20:16:36'),
(8, 'Ridho Pamungkas', '1993-02-10', 'ridhopamungkas@gmail.com', '085696232418', 'Male', 'Aveta Hotel Malioboro', '6', '15', 'sertipikat-tanah-baru1.jpg', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', 'Hotel berkualitas di Yogyakarta', 'Diterima', '2023-01-19 04:17:03'),
(9, 'Gilang Ramahan Pratama', '1992-11-12', 'gilangrmdhan@gmail.com', '082110432047', 'Male', 'pemilik Hotel Alia Matraman', '4', '32', 'sertipikat-tanah-baru1.jpg', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', 'Hotel mewah di jakarta yang sangat modern dan nyaman', 'Diterima', '2023-01-19 04:27:50'),
(10, 'Heru Kristanto', '1994-12-30', 'herukristanto2@gmail.com', '0859126462972', 'Male', 'Quest Hotel San Denpasar', '5', '56', 'sertipikat-tanah-baru1.jpg', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', 'Diterima', '2023-01-19 04:35:39'),
(11, 'Rahayu Putri Selina', '19993-03-12', 'rhyuptrilina@gmail.com', '087882129535', 'Female', 'Grand Cordela Hotel Bandung', '7', '65', 'sertipikat-tanah-baru1.jpg', 'Jl. Soekarno Hatta No.791B, Babakan Penghulu, Kec. Cinambo, Kota Bandung, Jawa Barat 4029', 'Di gedung modern dekat pertokoan dan tempat makan, hotel santai yang berada di Jalan Nasional Rute 3 ini berjarak 12 km dari taman hiburan indoor Trans Studio Bandung, dan 17 km dari Bandara Internasional Sastranegara.', 'Pengajuan', '2023-01-19 04:40:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` varchar(64) NOT NULL,
  `check_out` varchar(64) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `expired` varchar(128) NOT NULL,
  `total` varchar(32) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `hotel_id`, `room_id`, `check_in`, `check_out`, `payment_method`, `expired`, `total`, `kode`, `status`) VALUES
(7, 3, 21, 4, '2022-11-30', '2022-12-09', 1, '1669551141827', '444300', '86gfMC', 'Expired'),
(9, 8, 23, 8, '2023-01-21', '2023-01-25', 1, '1674158402439', '1181600', 'QkrNlq', 'Expired'),
(10, 8, 24, 13, '2023-01-20', '2023-01-24', 4, '', '1302800', 'CSWhnI', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `room_name` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `facility` varchar(256) NOT NULL,
  `price` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id`, `user_id`, `hotel_id`, `type_id`, `city_id`, `room_name`, `image`, `address`, `facility`, `price`, `about`, `status`) VALUES
(1, 17, 22, 1, 6, 'Standar Room Aveta Hotel Malioboro', 'room(1).jpg,room(3).jpg,room(4).jpg,room(5).jpg,room(6).jpg', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', 'Resepsionis,AC,Televisi', '215000', 'Hotel berkualitas di Yogyakarta', '1'),
(2, 17, 22, 3, 6, 'Superior Room Aveta Hotel Malioboro', 'room(2).jpg,room(7).jpg,room(8).jpg,room(9).jpg,room(10).jpg', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', 'Resepsionis,AC,Televisi', '290000', 'Hotel berkualitas di Yogyakarta', '1'),
(3, 17, 22, 4, 6, 'Deluxe Room Aveta Hotel Malioboro', 'room(11).jpg,room(12).jpg,room(13).jpg,room(14).jpg,room(15).jpg', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', 'Resepsionis,AC,Televisi', '350000', 'Hotel berkualitas di Yogyakarta', '1'),
(4, 17, 22, 6, 6, 'Suite Room Aveta Hotel Malioboro', 'room(19).jpg,room(17).jpg,room(18).jpg,room(16).jpg,room(20).jpg', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', 'Resepsionis,AC,Televisi', '390000', 'Hotel berkualitas di Yogyakarta', '1'),
(5, 17, 22, 8, 6, 'Single Room Aveta Hotel Malioboro', 'room(22).jpg,room(23).jpg,room(24).jpg,room(25).jpg,room(26).jpg', 'Jl. Malioboro No.42, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55271', 'Resepsionis,AC,Televisi', '190000', 'Hotel berkualitas di Yogyakarta', '1'),
(6, 18, 23, 1, 4, 'Standar Room Hotel Alia Matraman', 'room(20).jpg,room(28).jpg,room(29).jpg,room(33).jpg,room(34).jpg', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', 'Resepsionis,AC,Televisi', '210000', 'Hotel mewah di jakarta yang sangat modern dan nyaman', '1'),
(7, 18, 23, 3, 4, 'Superior Room Hotel Alia Matraman', 'room(11).jpg,room(35).jpg,room(36).jpg,room(37).jpg,room(42).jpg', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', 'Resepsionis,AC,Televisi', '250000', 'Hotel mewah di jakarta yang sangat modern dan nyaman', '1'),
(8, 18, 23, 6, 4, 'Suite Room Hotel Alia Matraman', 'room(17).jpg,room(26).jpg,room(43).jpg,room(48).jpg,room(51).jpg', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', 'Resepsionis,AC,Televisi', '290000', 'Hotel mewah di jakarta yang sangat modern dan nyaman', '1'),
(9, 18, 23, 8, 4, 'Single Room Aveta Hotel Malioboro', 'room(20).jpg,room(22).jpg,room(26).jpg,room(28).jpg,room(5).jpg', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', 'Resepsionis,AC,Televisi', '196000', 'Hotel mewah di jakarta yang sangat modern dan nyaman', '1'),
(10, 18, 23, 9, 4, 'Twin Room Hotel Alia Matraman', 'room(59).jpg,room(60).jpg,room(66).jpg,room(72).jpg,room(73).jpg', 'Jl. Matraman Raya No.224, RT.4/RW.6, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310', 'Resepsionis,AC,Televisi', '375000', 'Hotel mewah di jakarta yang sangat modern dan nyaman', '1'),
(11, 19, 24, 1, 5, 'Standar Room Quest Hotel San Denpasar', 'room(20).jpg,room(23).jpg,room(24).jpg,room(26).jpg,room(28).jpg', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', 'Resepsionis,AC,Televisi', '240000', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', '1'),
(12, 19, 24, 3, 5, 'Superior Room Quest Hotel San Denpasar', 'room(23).jpg,room(43).jpg,room(55).jpg,room(72).jpg,room(73).jpg', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', 'Resepsionis,AC,Televisi', '290000', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', '1'),
(13, 19, 24, 4, 5, 'Deluxe Room Quest Hotel San Denpasar', 'room(72).jpg,room(73).jpg,room(84).jpg,room(85).jpg,room(86).jpg', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', 'Resepsionis,AC,Televisi', '320000', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', '1'),
(14, 19, 24, 6, 5, 'Suite Room Quest Hotel San Denpasar', 'room(58).jpg,room(62).jpg,room(89).jpg,room(90).jpg,room(93).jpg', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', 'Resepsionis,AC,Televisi', '340000', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', '1'),
(15, 19, 24, 9, 5, 'Twin Room Quest Hotel San Denpasar', 'room(3).jpg,room(11).jpg,room(29).jpg,room(48).jpg,room(63).jpg', 'Jl. Mahendradatta No.93, Padangsambian, Kec. Denpasar Bar., Kota Denpasar, Bali 80117•(0361) 4717000', 'Resepsionis,AC,Televisi', '330000', 'Hotel modern yang terletak di bangunan mewah di tepi jalan yang dikelilingi pohon palem ini berjarak 6 km dari Pura Petitenget, 7 km dari Pantai Seminyak, dan 17 km dari toko perak dan emas di Desa Celuk.', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room_type`
--

INSERT INTO `room_type` (`id`, `name`) VALUES
(1, 'Standar Room'),
(3, 'Superior Room'),
(4, 'Deluxe Room'),
(5, 'Junior Suite Room'),
(6, 'Suite Room'),
(7, 'Presidential Suite'),
(8, 'Single Room'),
(9, 'Twin Room');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampungan`
--

CREATE TABLE `tampungan` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tampungan`
--

INSERT INTO `tampungan` (`id`, `text`) VALUES
(1, '\r\n           \r\n            <h4>Yth Bapak/Ibu Niczumi</h4>\r\n\r\n            <p>Pada tanggal 2022-11-19 20:00:04 sistem kami menerima permintaan pendaftaran untuk properti Resaa Hotel .</p>\r\n            <p>Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.</p>\r\n            <p>Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>xzumi3@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>3gjCySptQn</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(2, '\r\n           \r\n            <h4>Yth Bapak/Ibu Nico Izumi</h4>\r\n\r\n            <p>Pada tanggal 0000-00-00 00:00:00 sistem kami menerima permintaan pendaftaran untuk properti Resaa .</p>\r\n            <p>Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.</p>\r\n            <p>Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>xzumi3@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>J3sv20WFZC</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(3, '\r\n           \r\n            <h4>Yth Bapak/Ibu Nico Izumi</h4>\r\n\r\n            <p>Pada tanggal 0000-00-00 00:00:00 sistem kami menerima permintaan pendaftaran untuk properti Resaa .</p>\r\n            <p>Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.</p>\r\n            <p>Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>xzumi3@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>1kqrE6HUv9</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(4, '\r\n           \r\n            <h4>Yth Bapak/Ibu Nico Izumi</h4>\r\n\r\n            <p>Pada tanggal 2022-11-19 23:28:54 sistem kami menerima permintaan pendaftaran untuk properti Mishaa Hotel .</p>\r\n            <p>Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.</p>\r\n            <p>Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>tantoyk7@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>KumZdx0cVN</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(5, '\r\n        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css\">\r\n  \r\n         \r\n         <h4>Yth Bapak/Ibu Resaa Zahra</h4>\r\n        \r\n                    <p>Pada tanggal 2022-11-20 02:59:26 sistem kami menerima permintaan pendaftaran untuk properti Resaa Hotel Bali . <br>\r\n                  Setelah kami melakukan pengecekan mendalam kami tidak dapat memastikan bahwa properti tersebut milik anda.<br>\r\n                    Silahkan cek ulang data yang anda kirim dan coba mendaftar ulang.</p>\r\n                        \r\n                        \r\n                        <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>\r\n                       <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:150px\"><i class=\"fa fa-whatsapp\" style=\"color:green;\"></i> 62859126462972 </button>\r\n<button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:180px\"><i class=\"fa fa-envelope\" style=\"color:#333;\"></i> saferoom@gmail.com </button>\r\n                        \r\n                    \r\n                    <p>Hormat Kami,</p>\r\n                    <p>Administrator SafeRoom</p>\r\n                    <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n                    https://saferoom.site\r\n                    </a>\r\n            '),
(6, '\r\n            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n            <h4>Yth Bapak/Ibu Buka Lapak</h4>\r\n\r\n            <>Pada tanggal 2022-11-20 03:14:40 sistem kami menerima permintaan pendaftaran untuk properti Halilintar Hotel .<br>\r\n            Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.<br>\r\n            Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>cobaan@mail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>32Bsh6XMnD</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n\r\n            <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>\r\n            <button style=\"font-size:20px;background-color:#fff;border:1px solid #333;color:#333;height:40px;width:250px\"><i class=\"fa fa-whatsapp\" style=\"color:green;\"></i> 62859126462972 </button>\r\n            <button style=\"font-size:20px;background-color:#fff;border:1px solid #333;color:#333;height:40px;width:250px\"><i class=\"fa fa-envelope\" style=\"color:#333;\"></i> saferoom@gmail.com </button>\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(7, '\r\n        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n         \r\n         <h4>Yth Bapak/Ibu Jalham</h4>\r\n        \r\n                    <p>Pada tanggal 2022-11-20 03:16:03 sistem kami menerima permintaan pendaftaran untuk properti Jalaludin Hotel . <br>\r\n                  Setelah kami melakukan pengecekan mendalam kami tidak dapat memastikan bahwa properti tersebut milik anda.<br>\r\n                    Silahkan cek ulang data yang anda kirim dan coba mendaftar ulang.</p>\r\n                        \r\n                        <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>\r\n                        <button style=\"font-size:20px;background-color:#fff;border:1px solid #333;color:#333;height:40px;width:250px\"><i class=\"fa fa-whatsapp\" style=\"color:green;\"></i> 62859126462972 </button>\r\n                        <button style=\"font-size:20px;background-color:#fff;border:1px solid #333;color:#333;height:40px;width:250px\"><i class=\"fa fa-envelope\" style=\"color:#333;\"></i> saferoom@gmail.com </button>\r\n                        \r\n                    \r\n                    <p>Hormat Kami,</p>\r\n                    <p>Administrator SafeRoom</p>\r\n                    <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n                    https://saferoom.site\r\n                    </a>\r\n            '),
(8, '\r\n            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n            <h4>Yth Bapak/Ibu Ridho Pamungkas</h4>\r\n\r\n            <>Pada tanggal 2023-01-19 11:15:59 sistem kami menerima permintaan pendaftaran untuk properti Aveta Hotel Malioboro .<br>\r\n            Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.<br>\r\n            Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>ridhopamungkas@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>Eq78Hij9Q5</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n            <br><br>\r\n            <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>\r\n            <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:150px\"><i class=\"fa fa-whatsapp\" style=\"color:green;\"></i> 62859126462972 </button>\r\n            <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:180px\"><i class=\"fa fa-envelope\" style=\"color:#333;\"></i> saferoom@gmail.com </button>\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(9, '\r\n            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n            <h4>Yth Bapak/Ibu Gilang Ramahan Pratama</h4>\r\n\r\n            <>Pada tanggal 2023-01-19 11:27:21 sistem kami menerima permintaan pendaftaran untuk properti pemilik Hotel Alia Matraman .<br>\r\n            Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.<br>\r\n            Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>gilangrmdhan@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>YUA6M8kPU3</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n            <br><br>\r\n            <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>\r\n            <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:150px\"><i class=\"fa fa-whatsapp\" style=\"color:green;\"></i> 62859126462972 </button>\r\n            <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:180px\"><i class=\"fa fa-envelope\" style=\"color:#333;\"></i> saferoom@gmail.com </button>\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            '),
(10, '\r\n            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n            <h4>Yth Bapak/Ibu Heru Kristanto</h4>\r\n\r\n            <>Pada tanggal 2023-01-19 11:34:50 sistem kami menerima permintaan pendaftaran untuk properti Quest Hotel San Denpasar .<br>\r\n            Setelah kami melakukan pengecekan mendalam kami memutuskan bahwa properti tersebut benar benar milik anda.<br>\r\n            Selamat bergabung menjadi mitra SafeRoom, silahkan login ke halaman dashboard untuk mengelola properti anda</p>\r\n\r\n            <table>\r\n            <tbody>\r\n                <tr>\r\n                <td>Email</td>\r\n                <td> : </td>\r\n                <td>herukristanto2@gmail.com</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Password </td>\r\n                <td> : </td>\r\n                <td>KFBrDrxdaA</td>\r\n                </tr>\r\n                <tr>\r\n                <td>Link Dashboard</td>\r\n                <td> : </td>\r\n                <td><a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">https:saferoom/site/auth</a></td>\r\n                </tr>\r\n            </tbody>\r\n            </table>\r\n            <br><br>\r\n            <p>Bila ada yang ingin ditanyakan silahkan hubungi client support SafeRoom.</p>\r\n            <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:150px\"><i class=\"fa fa-whatsapp\" style=\"color:green;\"></i> 62859126462972 </button>\r\n            <button style=\"font-size:13px;background-color:#fff;border:1px solid #333;color:#333;height:30px;width:180px\"><i class=\"fa fa-envelope\" style=\"color:#333;\"></i> saferoom@gmail.com </button>\r\n\r\n            <p>Hormat Kami,</p>\r\n            <p>Administrator SafeRoom</p>\r\n            <a href=\"https:saferoom/site/auth\" target=\"_blank\" style=\"text-decoration:none\">\r\n            https://saferoom.site\r\n            </a>\r\n            ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` varchar(64) NOT NULL,
  `check_out` varchar(64) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `total` varchar(32) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `status` varchar(8) NOT NULL,
  `created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `hotel_id`, `room_id`, `check_in`, `check_out`, `payment_method`, `total`, `kode`, `status`, `created`) VALUES
(2, 4, 21, 5, 'Thu, 24 Nov', 'Fri, 25 Nov', 1, '540000', 'jdscax', 'Selesai', '1669539924'),
(3, 3, 21, 5, 'Sun, 27 Nov', 'Mon, 28 Nov', 1, '515000', 'sry87u', 'Selesai', '1669540007'),
(4, 8, 22, 3, '2023-01-26', '2023-01-27', 1, '363500', 'UWbhNS', 'Selesai', '1674149418');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `date_of_birth`, `gender`, `email`, `telp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Nico Izumi', '', '', 'izumi@mail.com', '', 'default.jpg', '$2y$10$eZ1zsN22l6Epwl.umfdGQO0.zx0CK1R2Zh5BQPonX11Irmclk/tfW', 1, 1, 1664092535),
(8, 'Rafi', '', '', 'jal@admin.com', '', 'default.jpg', '$2y$10$PiQVnpM8Bmm3eBDST3oNx./mxUJs7kTs0skpRQIBgiTVRWMUp.iui', 1, 0, 1665026453),
(9, 'Bella', '', '', 'bela@mail.com', '', 'default.jpg', '$2y$10$kw3RdQwa.rY.miSDS/tRkeWA6ZJwDA.HZihdZ9CgLnh6u4B/JdHZC', 7, 1, 1668475090),
(10, 'Bella', '', '', 'izumi123@mail.com', '', 'default.jpg', '$2y$10$5WXClpm84pgo0221cx/26Ol8CUFD6gvJR4W6VEyrFztbgcIck98eC', 2, 1, 1668484918),
(15, 'Nico Izumi', '', '', 'tantoyk7@gmail.com', '', 'default.jpg', '$2y$10$RZzN8HBfawAumuDGAy1GAuXEethiOZnNtKeZ3pYzMsyLBbosVZ1P6', 7, 1, 1668875356),
(16, 'Buka Lapak', '', '', 'cobaan@mail.com', '', 'default.jpg', '$2y$10$mA3wTfnE6gD498/yIAwik.cIx6BJY367/rZWck11xwCTcRpkPKf/G', 7, 1, 1668888991),
(17, 'Ridho Pamungkas', '', '', 'ridhopamungkas@gmail.com', '', 'default.jpg', '$2y$10$7V0Y5AyatD123SrfvfO54uKOb.r4D2w1jtPkvqjAdGhPETaujZ/mK', 7, 1, 1674101823),
(18, 'Gilang Ramahan Pratama', '', '', 'gilangrmdhan@gmail.com', '', 'default.jpg', '$2y$10$35Nl9PCEIbvspYA.qKPjyOec21grkgZs7MUqyt9o3LjLknyjItBvC', 7, 1, 1674102470),
(19, 'Heru Kristanto', '', '', 'herukristanto2@gmail.com', '', 'default.jpg', '$2y$10$GSGTDU2xmw0ZvmaGE48N3OLroFG/WohBHVZkWUOlwQmHPkvSnxodC', 7, 1, 1674102939);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
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
(42, 1, 14),
(45, 7, 2),
(46, 7, 17),
(47, 7, 1),
(48, 1, 20),
(49, 1, 22),
(50, 1, 23),
(51, 7, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_client`
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
-- Dumping data untuk tabel `user_client`
--

INSERT INTO `user_client` (`id`, `full_name`, `email`, `telp`, `password`, `image`, `is_active`, `role`, `date_created`) VALUES
(1, 'Izumii', 'xzumi3@gmail.com', '859126462972', '$2y$10$K4d.D3Lg4JVeoyktkh/0SuwTMhoUPijfXvwfs17QjQJpSDdaiWx7.', 'default.jpg', '1', 'member', '1667233868'),
(2, 'Izumii', 'xzumi31@gmail.com', '859126462972', '$2y$10$i5pQ6AfTeS3ycdkQIXdhle9SDkVQEIU2pOMxhFZEvc2XoUEHRF3la', 'default.jpg', '1', 'partner', '1667234340'),
(3, 'Izumii', 'xzumi311@gmail.com', '234242', '$2y$10$62AhBpxB2anpgrsWYj5Kt.PKXhOJiDEihogUgkZFNB3eNDk4nCmZC', 'default.jpg', '1', 'member', '1668325799'),
(4, 'Heru Kristanto', 'heru@mail.com', '12345678', '$2y$10$kE9EGuckpp/TBjuo1yrQ1.8M6sa2psU3XZGW8eMD4XhHRr/LTU01u', 'default.jpg', '1', 'member', '1669168996'),
(5, 'Heru Kristanto', 'herukristanto2@mail.com', '0859126462972', '$2y$10$.VbFd3JlnGCXe9dxAas.3./8lji0m4TA4plxw7.k.dnXpgncUzqdS', 'default.jpg', '1', 'member', '1674088696'),
(6, 'Ridho Pamungkas', 'ridhopamungkas@gmail.com', '085696232418', '$2y$10$e1feVBrdcoZGKF9VWvCRYulUQHyqCtzhPW2oOGueeucuetLUQwIIm', 'default.jpg', '1', 'member', '1674101532'),
(7, 'Gilang Ramadhan Pratama', 'gilangrmdhan@gmail.com', '082110432047', '$2y$10$Ek1kCSqhXWbLlJ0vN8JgCuCD/Qn88oFyQ/5fwj.fIo/zdFMzGIxui', 'default.jpg', '1', 'member', '1674102196'),
(8, 'Heru Kristanto', 'herukristanto2@gmail.com', '081316592005', '$2y$10$rQPhZmYAZPDXowpmKQ9gv.PLhGDMtTMQip/R0BpxkROuLr1gFf/Uu', 'default.jpg', '1', 'member', '1674102700'),
(9, 'Rahayu Putri Selina', 'rhyuptrilina@gmail.com', '087882129535', '$2y$10$dg8K1EQv5NZ1.loeOjmXreo1pPV947FCmWwZPh3QeikvYwU8p./7u', 'default.jpg', '1', 'member', '1674103089');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Dashboard', 'fas fa-fw fa-tachometer-alt'),
(2, 'Profile', 'fas fa-fw fa-user'),
(6, 'Menu', 'fas fa-fw fa-folder'),
(14, 'Users', 'fas fa-fw fa-users'),
(15, 'Type', 'fas fa-fw fa-list'),
(16, 'Hotel', 'fas fa-fw fa-hotel'),
(17, 'Room', 'fas fa-fw fa-bed'),
(19, 'City', 'fas fa-fw fa-city'),
(20, 'Pengajuan', 'fas fa-fw fa-inbox'),
(22, 'Payment', 'fas fa-fw fa-credit-card'),
(23, 'Transaksi', 'fas fa-fw fa-money-check');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member\r\n'),
(7, 'Partner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
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
(24, 14, 'User Client', 'users/user_client', 1),
(25, 20, 'Data Pengajuan Hotel', 'pengajuan/data', 1),
(26, 20, 'Data Pesan', 'pengajuan/tampungan', 1),
(27, 22, 'Category Payment Method', 'payment/category', 1),
(28, 22, 'Payment Method', 'payment', 1),
(29, 23, 'Pesanan', 'transaksi/pesanan', 1),
(30, 23, 'Data Transaksi', 'transaksi', 1),
(31, 23, 'Pesanan Gagal', 'transaksi/failed_order', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category_payment_method`
--
ALTER TABLE `category_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tampungan`
--
ALTER TABLE `tampungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_payment_method`
--
ALTER TABLE `category_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tampungan`
--
ALTER TABLE `tampungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user_client`
--
ALTER TABLE `user_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
