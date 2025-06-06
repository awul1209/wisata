-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `user_id`, `komentar`, `rating`, `wisata_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel delectus nobis, voluptates possimus sint quidem quaerat deserunt veniam quod, aspernatur natus aut voluptate alias aliquam quisquam magni dolore. Numquam, ullam?', 4, 30, '2025-02-20 09:38:35', '2025-02-20 09:38:35'),
(5, 2, 'Tempatnya Bagus Cocok Untuk Libran AKhir Tahun Bersama Keluarga, Tempatnya Bersih ', 3, 28, '2025-02-21 03:07:26', '2025-02-21 03:07:26'),
(6, 6, 'Bagus,Bersih, Yang Jual makanan banyak lengkap banget santai sambil kulineran disini, harganya terjangkau juga.', 4, 28, '2025-02-21 03:19:44', '2025-02-21 03:19:44'),
(7, 3, 'Bagus sekali tempatnya, salah satu wisata terbai yang ada dikabupaten sumenep', 3, 28, '2025-02-21 03:21:49', '2025-02-21 03:21:49'),
(8, 6, 'Temaptnya bagus dan bersih, cocok untuk liburan akhir tahun bersamakeluarga\r\n', 5, 29, '2025-02-26 00:37:51', '2025-02-26 00:37:51'),
(9, 9, 'Tempat Wisatanya Bersih, Bagus, Tapi Tiket Masuknya Agak Mahal', 3, 30, '2025-05-02 06:21:38', '2025-05-02 06:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip`, `date`) VALUES
(1, '::1', '2025-01-08'),
(2, '127.0.0.1', '2025-01-01'),
(3, '::1', '2025-03-05'),
(4, '::1', '2025-01-02'),
(5, '::1', '2025-01-09'),
(6, '::1', '2025-02-01'),
(7, '::1', '2025-02-03'),
(8, '::1', '2025-02-07'),
(10, '::1', '2025-02-05'),
(11, '::1', '2025-02-05'),
(12, '::1', '2025-02-11'),
(13, '::1', '2025-02-04'),
(14, '::1', '2025-02-02'),
(15, '::1', '2025-02-03'),
(16, '::1', '2025-03-06'),
(17, '::1', '2025-03-06'),
(33, '::1', '2025-03-06'),
(34, '::1', '2025-02-06'),
(35, '::1', '2025-01-08'),
(36, '::1', '2025-03-06'),
(37, '::1', '2025-03-06'),
(38, '::1', '2025-03-06'),
(39, '::1', '2025-03-06'),
(40, '::1', '2025-03-06'),
(41, '::1', '2025-03-06'),
(42, '::1', '2025-03-06'),
(43, '::1', '2025-03-06'),
(44, '::1', '2025-03-06'),
(45, '::1', '2025-03-06'),
(46, '::1', '2025-03-06'),
(47, '::1', '2025-03-06'),
(48, '::1', '2025-03-06'),
(49, '::1', '2025-03-06'),
(50, '::1', '2025-03-06'),
(51, '::1', '2025-03-06'),
(52, '::1', '2025-03-06'),
(53, '::1', '2025-03-06'),
(54, '::1', '2025-03-06'),
(55, '::1', '2025-03-06'),
(56, '::1', '2025-03-06'),
(57, '::1', '2025-03-06'),
(58, '::1', '2025-03-06'),
(59, '::1', '2025-03-06'),
(60, '::1', '2025-03-06'),
(61, '::1', '2025-03-06'),
(62, '::1', '2025-03-06'),
(63, '::1', '2025-03-06'),
(64, '::1', '2025-03-06'),
(65, '::1', '2025-03-06'),
(66, '::1', '2025-03-06'),
(67, '::1', '2025-03-06'),
(68, '::1', '2025-03-06'),
(69, '::1', '2025-03-06'),
(70, '::1', '2025-03-06'),
(71, '::1', '2025-03-06'),
(72, '::1', '2025-03-06'),
(73, '::1', '2025-03-06'),
(74, '::1', '2025-03-07'),
(75, '::1', '2025-03-07'),
(76, '::1', '2025-03-07'),
(77, '::1', '2025-03-07'),
(78, '::1', '2025-03-07'),
(79, '::1', '2025-03-07'),
(80, '::1', '2025-03-07'),
(81, '::1', '2025-03-07'),
(82, '::1', '2025-03-07'),
(83, '::1', '2025-03-07'),
(84, '::1', '2025-03-07'),
(85, '::1', '2025-03-07'),
(86, '::1', '2025-05-02'),
(87, '::1', '2025-05-02'),
(88, '::1', '2025-05-02'),
(89, '::1', '2025-05-02'),
(90, '::1', '2025-05-02'),
(91, '::1', '2025-05-02'),
(92, '::1', '2025-05-02'),
(93, '::1', '2025-05-02'),
(94, '::1', '2025-05-02'),
(95, '::1', '2025-05-02'),
(96, '::1', '2025-05-02'),
(97, '::1', '2025-05-02'),
(98, '::1', '2025-05-02'),
(99, '::1', '2025-05-02'),
(100, '::1', '2025-05-02'),
(101, '::1', '2025-05-02'),
(102, '::1', '2025-05-02'),
(103, '::1', '2025-05-02'),
(104, '::1', '2025-05-02'),
(105, '::1', '2025-05-02'),
(106, '::1', '2025-05-02'),
(107, '::1', '2025-05-02'),
(108, '::1', '2025-05-02'),
(109, '::1', '2025-05-02'),
(110, '::1', '2025-05-02'),
(111, '::1', '2025-05-02'),
(112, '::1', '2025-05-02'),
(113, '::1', '2025-05-02'),
(114, '::1', '2025-05-02'),
(115, '::1', '2025-05-02'),
(116, '::1', '2025-05-02'),
(190, '::1', '2025-05-02'),
(191, '::1', '2025-05-02'),
(192, '::1', '2025-05-02'),
(193, '::1', '2025-05-02'),
(194, '::1', '2025-05-02'),
(195, '::1', '2025-05-02'),
(196, '::1', '2025-05-02'),
(197, '::1', '2025-05-08'),
(198, '::1', '2025-05-08'),
(199, '::1', '2025-05-08'),
(200, '::1', '2025-05-10'),
(201, '::1', '2025-05-10'),
(202, '::1', '2025-05-10'),
(203, '::1', '2025-05-10'),
(204, '::1', '2025-05-10'),
(205, '::1', '2025-05-10'),
(206, '::1', '2025-05-10'),
(207, '::1', '2025-05-10'),
(208, '::1', '2025-05-10'),
(209, '::1', '2025-05-10'),
(210, '::1', '2025-05-10'),
(211, '::1', '2025-05-10'),
(212, '::1', '2025-05-10'),
(213, '::1', '2025-05-10'),
(214, '::1', '2025-05-10'),
(215, '::1', '2025-05-10'),
(216, '::1', '2025-05-10'),
(217, '::1', '2025-05-10'),
(218, '::1', '2025-05-10'),
(219, '::1', '2025-05-10'),
(220, '::1', '2025-05-10'),
(221, '::1', '2025-05-10'),
(222, '::1', '2025-05-10'),
(223, '::1', '2025-05-16'),
(224, '::1', '2025-05-16'),
(225, '::1', '2025-05-16'),
(226, '::1', '2025-05-16'),
(227, '::1', '2025-05-16'),
(228, '::1', '2025-05-16'),
(266, '::1', '2025-05-17'),
(267, '::1', '2025-05-17'),
(268, '::1', '2025-05-17'),
(269, '::1', '2025-05-17'),
(270, '::1', '2025-05-17'),
(271, '::1', '2025-05-17'),
(332, '::1', '2025-05-18'),
(333, '::1', '2025-05-18'),
(334, '::1', '2025-05-18'),
(335, '::1', '2025-05-21'),
(336, '::1', '2025-05-21'),
(337, '::1', '2025-05-21'),
(338, '::1', '2025-05-21'),
(339, '::1', '2025-05-21'),
(340, '::1', '2025-05-21'),
(341, '::1', '2025-05-21'),
(342, '::1', '2025-05-21'),
(343, '::1', '2025-05-21'),
(344, '::1', '2025-05-21'),
(345, '::1', '2025-05-21'),
(346, '::1', '2025-05-21'),
(347, '::1', '2025-05-21'),
(348, '::1', '2025-05-21'),
(349, '::1', '2025-05-21'),
(350, '::1', '2025-05-21'),
(351, '::1', '2025-05-21'),
(352, '::1', '2025-05-21'),
(353, '::1', '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating1` int(11) NOT NULL,
  `rating2` int(11) NOT NULL,
  `rating3` int(11) NOT NULL,
  `rating4` int(11) NOT NULL,
  `rating5` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `komentar`, `created_at`, `updated_at`) VALUES
(9, 6, 4, 0, 0, 0, NULL, 'Website ini cukup lengakp daftar wisatanya', '2025-02-20 09:08:22', '2025-02-20 09:08:22'),
(12, 9, 4, 0, 0, 0, NULL, 'Bagus Website Wisata ini menyediakan refrensi untuk wisata', '2025-05-02 06:11:41', '2025-05-02 06:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, '<div><strong>Selamat datang di Aplikasi Wisata Angkasa Kami!<br></strong><br></div><ul><li>Untuk mendapatkan pengalaman pengguna yang lebih menarik, pastikan untuk mengaktifkan lokasi Anda. Dengan lokasi yang aktif, aplikasi ini dapat menawarkan berbagai pilihan wisata yang relevan dan terdekat dengan Anda.</li><li><br></li><li>Kami juga menghadirkan fitur rekomendasi wisata yang disesuaikan dengan preferensi dan minat Anda. Temukan tempat wisata yang cocok dan jelajahi berbagai destinasi menarik di sekitar Anda!</li><li><br></li><li>Jangan lupa untuk memberikan rating dan ulasan pada aplikasi ini. Umpan balik Anda sangat berarti bagi kami untuk terus meningkatkan kualitas layanan dan fitur yang ada.</li></ul><div><br></div><div>Selamat berwisata, semoga pengalaman Anda menyenangkan!</div>', '2025-02-16 03:22:48', '2025-02-16 03:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `nama_travel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi_travel` text NOT NULL,
  `kontak` text NOT NULL,
  `gambar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `nama_travel`, `alamat`, `deskripsi_travel`, `kontak`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Travel Angkasa', 'Jalan Raya Gapura Paberasan Sumenep. RT.12/RW.06', '', '0874376263435', 'tv1.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(2, 'Travel Bos Muda', 'Jalan Raya Longos Batang-Batang Daya, Dusun ABC RT.12/RW.06', '', '0359345839', 'tv2.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(3, 'Travel Maharaja', 'Jalan Raya Arya Wiraraja Bluto, Dusun Sera Tengah. RT.13/R.86', '', '038437483485', 'tv3.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(4, 'Travel Malam', 'Jalan Raya Gapura. Barat Daya Pamolokan, Dusun BCA RT.12/RW.90', '', '0328423904', 'tv4.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(13, 'Travel Luar Kota', 'Jl. Magel Utara No ABC', '', '98877', 't1.png', '2025-02-17 09:45:42', '2025-02-17 09:45:42'),
(14, 'Travel Dalam Kota', '<div>Jl. Raya ABC No KJHG7</div>', '<div>lorem ipsum dolor white play victim</div>', '99348823', '67be5eeaba65a.png', '2025-02-17 09:45:42', '2025-02-17 09:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `Alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `Alamat`, `created_at`, `updated_at`) VALUES
(2, 'anton', 'anton@gmail.com', '$2y$10$yjWl1cVS6WH5a.5m4AXnOOyerPMZTc94K/HsOMqvOsa0GIWg42/IK', 'user', '', '2025-02-14 02:15:32', '2025-02-14 02:15:32'),
(3, 'awul', 'awul@gmail.com', '$2y$10$Q.KLcCzoMf30GY6EFm6IQOABc94c70SIWaGfjfa9H4tWXIRjAvdEO', 'user', '', '2025-02-14 10:31:43', '2025-02-14 10:31:43'),
(4, 'admin', 'admin@gmail.com', '$2y$10$TuiPkmmggB3BLKWlvm5WhePuISQEzMbUxOo6UUku.LUFV3w/KyepG', 'admin', '', '2025-02-15 21:32:48', '2025-02-15 21:32:48'),
(6, 'coba', 'coba@gmail.com', '$2y$10$YZTBMt1PI/9cqo.19mkb8uVnoEv4gJAzK7gYRWncvX6CfZnhCQP5e', 'user', '', '2025-02-20 09:07:54', '2025-02-20 09:07:54'),
(7, 'awul', 'aw@gmail.com', '$2y$10$huab75Lu8T/CfMyKu2JOGOGMrdbV6ARg3NdGyRnzrwUSxm62z6iY.', 'user', '', '2025-02-20 09:23:00', '2025-02-20 09:23:00'),
(9, 'ayyub', 'ayyub@gmail.com', '$2y$10$OOR2pXD.IopMjJ9whtNXAeq3EOe4UiAUtCtmC.9hUQubn9O4uZFgO', 'user', 'paberasan dusun salosa', '2025-05-02 05:55:56', '2025-05-02 05:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama_wisata` varchar(255) DEFAULT NULL,
  `operasional` varchar(255) DEFAULT NULL,
  `harga_tiket` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `gambar1` text DEFAULT NULL,
  `gambar2` text DEFAULT NULL,
  `gambar3` text DEFAULT NULL,
  `gambar4` text DEFAULT NULL,
  `gambar5` text DEFAULT NULL,
  `kec` varchar(255) NOT NULL,
  `latlng` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `nama_wisata`, `operasional`, `harga_tiket`, `deskripsi`, `gambar`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `kec`, `latlng`, `kategori`, `status`, `created_at`, `updated-at`) VALUES
(1, 'Pantai Lombang', '09.00 - 16.00', '10.000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, magnam quaerat minus, numquam doloremque quas in cupiditate illo labore, eum accusamus? Totam reprehenderit minus voluptatem dicta adipisci temporibus pariatur vel saepe soluta mollitia sit dolores, eos illum veniam ratione!repudiandae pariatur provident eaque voluptas placeat beatae deleniti nulla culpa sequi hic dicta delectus. Quam, possimus veniam facilis adipisci nemo exercitationem aut quis? Nostrum, sunt? Illo, voluptas vel?', 'pantai1.png', 'kolam1.png', 'taman1.png', 'bukit.png', NULL, NULL, 'batang-batang', '[-6.918801772112746, 114.06485324494663]', 'pantai', 'aktif', '2024-12-24 13:43:13', '2024-12-24 13:43:13'),
(2, 'Waterpark Sumekar', '09.00-12.00', '25.000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, magnam quaerat minus, numquam doloremque quas in cupiditate illo labore, eum accusamus? Totam reprehenderit minus voluptatem dicta adipisci temporibus pariatur vel saepe soluta mollitia sit dolores, eos illum veniam rationeperspiciatis quo earum a ipsum dolorum facilis enim eveniet quasi deserunt nulla culpa sequi hic dicta delectus. Quam, possimus veniam facilis adipisci nemo exercitationem aut quis? Nostrum, sunt? Illo, voluptas vel?', 'kolam1.png', NULL, NULL, NULL, NULL, NULL, 'kota sumenep', '-6.990285800317763, 113.84064182556729', 'kolam', 'aktif', '2024-12-24 14:17:53', '2024-12-24 14:17:53'),
(3, 'Taman Adipura Sumenep', '09.00-12.00', 'free', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, magnam quaerat minus, numquam doloremque quas in cupiditate illo labore, eum accusamus? Totam reprehenderit minus voluptatem dicta adipisci temporibus pariatur vel saepe soluta mollitia sit dolores, eos illum veniam ratione! Officiis accusantium consequatur quidem natus porro nostrum minima, blanditiis, dolores vitae repellat esse fuga repudiandae pariatur provident eaque voluptas placeat beatae deleniti molestias. Dolor quod obcaecati minima blanditiis, fugit voluptates perspiciatis quo earum a ipsum dolorum facilis enim eveniet', 'taman1.png', NULL, NULL, NULL, NULL, NULL, 'kota sumenep', '[-7.007840321942111, 113.86033898146918]', 'taman', 'aktif', '2024-12-24 14:18:35', '2024-12-24 14:18:35'),
(4, 'Bukit Love Pojah', '24 Jam', 'free', 'Bukit Love Yang berada di desa pojah ini menawarkan keindahan alam sumenep yang bisa dilihat dari bukit ', 'bukit.png', NULL, NULL, NULL, NULL, NULL, 'gapura', '[-6.984545082248768, 113.89662532562855]', 'bukit', 'aktif', '2025-02-12 08:25:49', '2025-02-12 08:25:49'),
(5, 'Wisata Kota', '24 Jam', 'free', 'Menyediakan Pemandangan Indah Kota Sumenep di malam Hari dengan Segala Kondisi', 'konten1.png', NULL, NULL, NULL, NULL, NULL, 'batu marmar', '[-7.001018637066543, 113.8706531072479]', 'kota', 'aktif', '2025-02-12 08:44:34', '2025-02-12 08:44:34'),
(6, 'Wisata Kota Malam', '19.00-03.00', 'free', 'Wisata Kota Malam Yang Menawarkan berbagai makanan dan olah olahan ini cocok untuk', 'konten2.png', NULL, NULL, NULL, NULL, NULL, 'larangan', '[-7.0022713190284325, 113.86699720989935]', 'kota', 'aktif', '2025-02-12 08:48:28', '2025-02-12 08:48:28'),
(7, 'Wisata Surabaya', '24 jam', '50000', '<div>asd</div>', '67b2745942e15.png', '67b25fa64f153.jpeg', '', '', NULL, NULL, 'nagel', '[-7.259264891278502, 112.72469466145941]', 'pantai', 'aktif', '2025-02-15 09:59:09', '2025-02-15 09:59:09'),
(26, 'Wisata Baru', '24 jam', 'free', '<div>asf</div>', '67b272c3a9c79.png', '', '', '', NULL, NULL, 'Kota Sumenep', '[-7.05478560535806, 113.8595450648566]', 'Kota', 'aktif', '2025-02-16 23:20:35', '2025-02-16 23:20:35'),
(28, 'Pantai A', '08:00 - 17:00', '50000', 'Pantai indah', 'g1.png', 'g2.png', 'g3.png', 'g4.png', NULL, NULL, 'Kecamatan Y', '[-7.053031656301919, 113.85550717456904]', 'Alam', 'Aktif', '2025-02-16 23:25:32', '2025-02-16 23:25:32'),
(29, 'Air Terjun B', '09:00 - 18:00', '20000', 'Air terjun B', 'g2.png', 'g1.png', 'g3.png', 'g4.png', NULL, NULL, 'Kecamatan W', '[-7.088808201668157, 113.8581775992116]', 'Alam', 'Tidak Aktif', '2025-02-16 23:25:32', '2025-02-16 23:25:32'),
(30, 'Wisata Café Sumenep', '24 jam', 'free', '<div>Santai</div>', '67be5dc7978ba.png', 'g4.png', 'g2.png', 'g1.png', NULL, NULL, 'Kota Sumenep', '[-7.031294539511496, 113.86209410628321]', 'Alam', 'aktif', '2025-02-16 23:25:32', '2025-02-16 23:25:32'),
(31, 'Wisata Hari Ini', '24 jam', 'free', '<div>asd</div>', '682865d535a56.jpg', '', '', '', NULL, NULL, 'Kota Sumenep', '[-6.999952559546536, 113.8887152512204]', 'ALama', 'Aktif', '2025-05-17 10:32:53', '2025-05-17 10:32:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
