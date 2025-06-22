-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2025 pada 06.58
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

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
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gambar1` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `user_id`, `komentar`, `rating`, `wisata_id`, `gambar`, `gambar1`, `created_at`, `updated_at`) VALUES
(1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel delectus nobis, voluptates possimus sint quidem quaerat deserunt veniam quod, aspernatur natus aut voluptate alias aliquam quisquam magni dolore. Numquam, ullam?', 4, 30, '', '', '2025-02-20 09:38:35', '2025-02-20 09:38:35'),
(5, 2, 'Tempatnya Bagus Cocok Untuk Libran AKhir Tahun Bersama Keluarga, Tempatnya Bersih ', 3, 28, '', '', '2025-02-21 03:07:26', '2025-02-21 03:07:26'),
(6, 6, 'Bagus,Bersih, Yang Jual makanan banyak lengkap banget santai sambil kulineran disini, harganya terjangkau juga.', 4, 28, '', '', '2025-02-21 03:19:44', '2025-02-21 03:19:44'),
(7, 3, 'Bagus sekali tempatnya, salah satu wisata terbai yang ada dikabupaten sumenep', 3, 28, '', '', '2025-02-21 03:21:49', '2025-02-21 03:21:49'),
(8, 6, 'Temaptnya bagus dan bersih, cocok untuk liburan akhir tahun bersamakeluarga\r\n', 5, 29, '', '', '2025-02-26 00:37:51', '2025-02-26 00:37:51'),
(9, 9, 'ini dua gambar', 0, 30, '6850fa1e9826d.jpg', '6850fa1e9904b.jpg', '2025-05-02 06:21:38', '2025-05-02 06:21:38'),
(10, 9, 'bagus diubah', 5, 31, '6850f44fa2199.jpg', '', '2025-06-17 04:23:16', '2025-06-17 04:23:16'),
(11, 3, 'bagus', 4, 31, '68510bd52b81d.jpg', '68510bd52bb34.jpg', '2025-06-17 06:31:49', '2025-06-17 06:31:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
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
(353, '::1', '2025-05-25'),
(542, '::1', '2025-06-08'),
(543, '::1', '2025-06-08'),
(544, '::1', '2025-06-08'),
(545, '::1', '2025-06-08'),
(546, '::1', '2025-06-08'),
(547, '::1', '2025-06-08'),
(548, '::1', '2025-06-08'),
(549, '::1', '2025-06-08'),
(550, '::1', '2025-06-08'),
(551, '::1', '2025-06-08'),
(552, '::1', '2025-06-08'),
(553, '::1', '2025-06-08'),
(554, '::1', '2025-06-08'),
(555, '::1', '2025-06-08'),
(556, '::1', '2025-06-08'),
(557, '::1', '2025-06-08'),
(558, '::1', '2025-06-08'),
(559, '::1', '2025-06-08'),
(560, '::1', '2025-06-08'),
(561, '::1', '2025-06-08'),
(562, '::1', '2025-06-08'),
(563, '::1', '2025-06-08'),
(564, '::1', '2025-06-08'),
(565, '::1', '2025-06-08'),
(566, '::1', '2025-06-08'),
(567, '::1', '2025-06-08'),
(568, '::1', '2025-06-08'),
(569, '::1', '2025-06-08'),
(570, '::1', '2025-06-08'),
(571, '::1', '2025-06-08'),
(572, '::1', '2025-06-08'),
(573, '::1', '2025-06-08'),
(574, '::1', '2025-06-08'),
(575, '::1', '2025-06-08'),
(576, '::1', '2025-06-08'),
(577, '::1', '2025-06-08'),
(578, '::1', '2025-06-08'),
(579, '::1', '2025-06-08'),
(580, '::1', '2025-06-08'),
(581, '::1', '2025-06-08'),
(582, '::1', '2025-06-08'),
(583, '::1', '2025-06-08'),
(584, '::1', '2025-06-08'),
(585, '::1', '2025-06-08'),
(586, '::1', '2025-06-08'),
(587, '::1', '2025-06-08'),
(588, '::1', '2025-06-10'),
(589, '::1', '2025-06-10'),
(590, '::1', '2025-06-10'),
(591, '::1', '2025-06-10'),
(592, '::1', '2025-06-10'),
(593, '::1', '2025-06-10'),
(594, '::1', '2025-06-10'),
(595, '::1', '2025-06-10'),
(596, '::1', '2025-06-10'),
(597, '::1', '2025-06-10'),
(598, '::1', '2025-06-10'),
(599, '::1', '2025-06-10'),
(600, '::1', '2025-06-10'),
(601, '::1', '2025-06-10'),
(602, '::1', '2025-06-10'),
(603, '::1', '2025-06-10'),
(604, '::1', '2025-06-10'),
(605, '::1', '2025-06-10'),
(606, '::1', '2025-06-10'),
(607, '::1', '2025-06-10'),
(608, '::1', '2025-06-10'),
(609, '::1', '2025-06-10'),
(610, '::1', '2025-06-10'),
(611, '::1', '2025-06-10'),
(612, '::1', '2025-06-10'),
(613, '::1', '2025-06-10'),
(614, '::1', '2025-06-10'),
(615, '::1', '2025-06-10'),
(616, '::1', '2025-06-10'),
(617, '::1', '2025-06-10'),
(618, '::1', '2025-06-10'),
(619, '::1', '2025-06-10'),
(620, '::1', '2025-06-10'),
(621, '::1', '2025-06-10'),
(622, '::1', '2025-06-10'),
(623, '::1', '2025-06-10'),
(624, '::1', '2025-06-10'),
(625, '::1', '2025-06-10'),
(626, '::1', '2025-06-10'),
(627, '::1', '2025-06-11'),
(628, '::1', '2025-06-11'),
(629, '::1', '2025-06-11'),
(630, '::1', '2025-06-11'),
(631, '::1', '2025-06-11'),
(632, '::1', '2025-06-11'),
(633, '::1', '2025-06-11'),
(634, '::1', '2025-06-11'),
(635, '::1', '2025-06-11'),
(636, '::1', '2025-06-11'),
(637, '::1', '2025-06-11'),
(638, '::1', '2025-06-11'),
(639, '::1', '2025-06-11'),
(640, '::1', '2025-06-11'),
(641, '::1', '2025-06-11'),
(642, '::1', '2025-06-11'),
(643, '::1', '2025-06-11'),
(644, '::1', '2025-06-11'),
(645, '::1', '2025-06-11'),
(646, '::1', '2025-06-11'),
(647, '::1', '2025-06-11'),
(648, '::1', '2025-06-11'),
(649, '::1', '2025-06-11'),
(650, '::1', '2025-06-11'),
(651, '::1', '2025-06-11'),
(652, '::1', '2025-06-11'),
(653, '::1', '2025-06-11'),
(654, '::1', '2025-06-11'),
(655, '::1', '2025-06-11'),
(656, '::1', '2025-06-11'),
(657, '::1', '2025-06-11'),
(658, '::1', '2025-06-11'),
(659, '::1', '2025-06-11'),
(660, '::1', '2025-06-11'),
(661, '::1', '2025-06-11'),
(662, '::1', '2025-06-11'),
(663, '::1', '2025-06-11'),
(664, '::1', '2025-06-11'),
(665, '::1', '2025-06-11'),
(666, '::1', '2025-06-11'),
(667, '::1', '2025-06-11'),
(668, '::1', '2025-06-11'),
(669, '::1', '2025-06-11'),
(670, '::1', '2025-06-11'),
(671, '::1', '2025-06-11'),
(672, '::1', '2025-06-11'),
(673, '::1', '2025-06-11'),
(674, '::1', '2025-06-11'),
(675, '::1', '2025-06-11'),
(676, '::1', '2025-06-11'),
(677, '::1', '2025-06-11'),
(678, '::1', '2025-06-11'),
(679, '::1', '2025-06-11'),
(680, '::1', '2025-06-11'),
(681, '::1', '2025-06-11'),
(682, '::1', '2025-06-11'),
(683, '::1', '2025-06-11'),
(684, '::1', '2025-06-11'),
(685, '::1', '2025-06-11'),
(686, '::1', '2025-06-11'),
(687, '::1', '2025-06-11'),
(688, '::1', '2025-06-11'),
(689, '::1', '2025-06-11'),
(690, '::1', '2025-06-11'),
(691, '::1', '2025-06-11'),
(692, '::1', '2025-06-11'),
(693, '::1', '2025-06-11'),
(694, '::1', '2025-06-11'),
(695, '::1', '2025-06-11'),
(696, '::1', '2025-06-11'),
(697, '::1', '2025-06-11'),
(698, '::1', '2025-06-11'),
(699, '::1', '2025-06-11'),
(700, '::1', '2025-06-11'),
(701, '::1', '2025-06-11'),
(702, '::1', '2025-06-11'),
(703, '::1', '2025-06-13'),
(704, '::1', '2025-06-13'),
(705, '::1', '2025-06-13'),
(706, '::1', '2025-06-13'),
(707, '::1', '2025-06-13'),
(708, '::1', '2025-06-13'),
(709, '::1', '2025-06-13'),
(710, '::1', '2025-06-13'),
(711, '::1', '2025-06-13'),
(712, '::1', '2025-06-13'),
(713, '::1', '2025-06-13'),
(714, '::1', '2025-06-13'),
(715, '::1', '2025-06-13'),
(716, '::1', '2025-06-13'),
(717, '::1', '2025-06-16'),
(718, '::1', '2025-06-17'),
(719, '::1', '2025-06-17'),
(720, '::1', '2025-06-17'),
(721, '::1', '2025-06-17'),
(722, '::1', '2025-06-17'),
(723, '::1', '2025-06-17'),
(724, '::1', '2025-06-17'),
(725, '::1', '2025-06-17'),
(726, '::1', '2025-06-17'),
(727, '::1', '2025-06-17'),
(728, '::1', '2025-06-17'),
(729, '::1', '2025-06-17'),
(730, '::1', '2025-06-17'),
(731, '::1', '2025-06-17'),
(732, '::1', '2025-06-17'),
(733, '::1', '2025-06-17'),
(734, '::1', '2025-06-17'),
(735, '::1', '2025-06-17'),
(736, '::1', '2025-06-17'),
(737, '::1', '2025-06-17'),
(738, '::1', '2025-06-17'),
(739, '::1', '2025-06-17'),
(740, '::1', '2025-06-17'),
(741, '::1', '2025-06-17'),
(742, '::1', '2025-06-17'),
(743, '::1', '2025-06-17'),
(744, '::1', '2025-06-17'),
(745, '::1', '2025-06-17'),
(746, '::1', '2025-06-17'),
(747, '::1', '2025-06-17'),
(748, '::1', '2025-06-17'),
(749, '::1', '2025-06-17'),
(750, '::1', '2025-06-17'),
(751, '::1', '2025-06-17'),
(752, '::1', '2025-06-17'),
(753, '::1', '2025-06-17'),
(754, '::1', '2025-06-17'),
(755, '::1', '2025-06-17'),
(756, '::1', '2025-06-17'),
(757, '::1', '2025-06-17'),
(758, '::1', '2025-06-17'),
(759, '::1', '2025-06-17'),
(760, '::1', '2025-06-17'),
(761, '::1', '2025-06-17'),
(762, '::1', '2025-06-17'),
(763, '::1', '2025-06-17'),
(764, '::1', '2025-06-17'),
(765, '::1', '2025-06-17'),
(766, '::1', '2025-06-17'),
(767, '::1', '2025-06-17'),
(768, '::1', '2025-06-17'),
(769, '::1', '2025-06-17'),
(770, '::1', '2025-06-17'),
(771, '::1', '2025-06-17'),
(772, '::1', '2025-06-17'),
(773, '::1', '2025-06-17'),
(774, '::1', '2025-06-17'),
(775, '::1', '2025-06-17'),
(776, '::1', '2025-06-17'),
(777, '::1', '2025-06-17'),
(778, '::1', '2025-06-17'),
(779, '::1', '2025-06-17'),
(780, '::1', '2025-06-17'),
(781, '::1', '2025-06-17'),
(782, '::1', '2025-06-17'),
(783, '::1', '2025-06-17'),
(784, '::1', '2025-06-17'),
(785, '::1', '2025-06-17'),
(786, '::1', '2025-06-17'),
(787, '::1', '2025-06-17'),
(788, '::1', '2025-06-17'),
(789, '::1', '2025-06-17'),
(790, '::1', '2025-06-17'),
(791, '::1', '2025-06-17'),
(792, '::1', '2025-06-17'),
(793, '::1', '2025-06-17'),
(794, '::1', '2025-06-17'),
(795, '::1', '2025-06-17'),
(796, '::1', '2025-06-17'),
(797, '::1', '2025-06-17'),
(798, '::1', '2025-06-17'),
(799, '::1', '2025-06-17'),
(800, '::1', '2025-06-17'),
(801, '::1', '2025-06-17'),
(802, '::1', '2025-06-17'),
(803, '::1', '2025-06-17'),
(804, '::1', '2025-06-17'),
(805, '::1', '2025-06-17'),
(806, '::1', '2025-06-17'),
(807, '::1', '2025-06-17'),
(808, '::1', '2025-06-17'),
(809, '::1', '2025-06-17'),
(810, '::1', '2025-06-17'),
(811, '::1', '2025-06-17'),
(812, '::1', '2025-06-17'),
(813, '::1', '2025-06-17'),
(814, '::1', '2025-06-17'),
(815, '::1', '2025-06-17'),
(816, '::1', '2025-06-17'),
(817, '::1', '2025-06-17'),
(818, '::1', '2025-06-17'),
(819, '::1', '2025-06-17'),
(820, '::1', '2025-06-17'),
(821, '::1', '2025-06-17'),
(822, '::1', '2025-06-17'),
(823, '::1', '2025-06-17'),
(824, '::1', '2025-06-17'),
(825, '::1', '2025-06-17'),
(826, '::1', '2025-06-17'),
(827, '::1', '2025-06-17'),
(828, '::1', '2025-06-17'),
(829, '::1', '2025-06-17'),
(830, '::1', '2025-06-17'),
(831, '::1', '2025-06-17'),
(832, '::1', '2025-06-17'),
(833, '::1', '2025-06-17'),
(834, '::1', '2025-06-17'),
(835, '::1', '2025-06-17'),
(836, '::1', '2025-06-17'),
(837, '::1', '2025-06-17'),
(838, '::1', '2025-06-17'),
(839, '::1', '2025-06-17'),
(840, '::1', '2025-06-17'),
(841, '::1', '2025-06-17'),
(842, '::1', '2025-06-17'),
(843, '::1', '2025-06-17'),
(844, '::1', '2025-06-17'),
(845, '::1', '2025-06-17'),
(846, '::1', '2025-06-17'),
(847, '::1', '2025-06-17'),
(848, '::1', '2025-06-17'),
(849, '::1', '2025-06-17'),
(850, '::1', '2025-06-17'),
(851, '::1', '2025-06-18'),
(852, '::1', '2025-06-18'),
(853, '::1', '2025-06-18'),
(854, '::1', '2025-06-18'),
(855, '::1', '2025-06-18'),
(856, '::1', '2025-06-18'),
(857, '::1', '2025-06-18'),
(858, '::1', '2025-06-18'),
(859, '::1', '2025-06-18'),
(860, '::1', '2025-06-18'),
(861, '::1', '2025-06-18'),
(862, '::1', '2025-06-18'),
(863, '::1', '2025-06-18'),
(864, '::1', '2025-06-18'),
(865, '::1', '2025-06-18'),
(866, '::1', '2025-06-18'),
(867, '::1', '2025-06-18'),
(868, '::1', '2025-06-18'),
(869, '::1', '2025-06-18'),
(870, '::1', '2025-06-18'),
(871, '::1', '2025-06-18'),
(872, '::1', '2025-06-18'),
(873, '::1', '2025-06-18'),
(874, '::1', '2025-06-18'),
(875, '::1', '2025-06-18'),
(876, '::1', '2025-06-18'),
(877, '::1', '2025-06-18'),
(878, '::1', '2025-06-22'),
(879, '::1', '2025-06-22'),
(880, '::1', '2025-06-22'),
(881, '::1', '2025-06-22'),
(882, '::1', '2025-06-22'),
(883, '::1', '2025-06-22'),
(884, '::1', '2025-06-22'),
(885, '::1', '2025-06-22'),
(886, '::1', '2025-06-22'),
(887, '::1', '2025-06-22'),
(888, '::1', '2025-06-22'),
(889, '::1', '2025-06-22'),
(890, '::1', '2025-06-22'),
(891, '::1', '2025-06-22'),
(892, '::1', '2025-06-22'),
(893, '::1', '2025-06-22'),
(894, '::1', '2025-06-22'),
(895, '::1', '2025-06-22'),
(896, '::1', '2025-06-22'),
(897, '::1', '2025-06-22'),
(898, '::1', '2025-06-22'),
(899, '::1', '2025-06-22'),
(900, '::1', '2025-06-22'),
(901, '::1', '2025-06-22'),
(902, '::1', '2025-06-22'),
(903, '::1', '2025-06-22'),
(904, '::1', '2025-06-22'),
(905, '::1', '2025-06-22'),
(906, '::1', '2025-06-22'),
(907, '::1', '2025-06-22'),
(908, '::1', '2025-06-22'),
(909, '::1', '2025-06-22'),
(910, '::1', '2025-06-22'),
(911, '::1', '2025-06-22'),
(912, '::1', '2025-06-22'),
(913, '::1', '2025-06-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
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
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `komentar`, `created_at`, `updated_at`) VALUES
(9, 6, 4, 0, 0, 0, NULL, 'Website ini cukup lengakp daftar wisatanya', '2025-02-20 09:08:22', '2025-02-20 09:08:22'),
(12, 9, 4, 0, 0, 0, NULL, 'Bagus Website Wisata ini menyediakan refrensi untuk wisata', '2025-05-02 06:11:41', '2025-05-02 06:11:41'),
(13, 3, 3, 0, 0, 0, NULL, 'Websitenya bagus responsive dan cukup lengkap untuk rekomendasi tempat wisata', '2025-06-18 04:57:09', '2025-06-18 04:57:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, '<div><strong>Selamat datang di Aplikasi Wisata Angkasa Kami!<br></strong><br></div><ul><li>Untuk mendapatkan pengalaman pengguna yang lebih menarik, pastikan untuk mengaktifkan lokasi Anda. Dengan lokasi yang aktif, aplikasi ini dapat menawarkan berbagai pilihan wisata yang relevan dan terdekat dengan Anda.</li><li><br></li><li>Kami juga menghadirkan fitur rekomendasi wisata yang disesuaikan dengan preferensi dan minat Anda. Temukan tempat wisata yang cocok dan jelajahi berbagai destinasi menarik di sekitar Anda!</li><li><br></li><li>Jangan lupa untuk memberikan rating dan ulasan pada aplikasi ini. Umpan balik Anda sangat berarti bagi kami untuk terus meningkatkan kualitas layanan dan fitur yang ada.</li></ul><div><br></div><div>Selamat berwisata, semoga pengalaman Anda menyenangkan!</div>', '2025-02-16 03:22:48', '2025-02-16 03:22:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `nama_travel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi_travel` text NOT NULL,
  `kontak` text NOT NULL,
  `area_layanan` text NOT NULL,
  `gambar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `travel`
--

INSERT INTO `travel` (`id`, `nama_travel`, `alamat`, `deskripsi_travel`, `kontak`, `area_layanan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Travel Angkasa', 'Jalan Raya Gapura Paberasan Sumenep. RT.12/RW.06', '', '0874376263435', '', 'tv1.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(2, 'Travel Bos Muda', 'Jalan Raya Longos Batang-Batang Daya, Dusun ABC RT.12/RW.06', '', '0359345839', '', 'tv2.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(3, 'Travel Maharaja', 'Jalan Raya Arya Wiraraja Bluto, Dusun Sera Tengah. RT.13/R.86', '', '038437483485', '', 'tv3.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(4, 'Travel Malam', 'Jalan Raya Gapura. Barat Daya Pamolokan, Dusun BCA RT.12/RW.90', '', '0328423904', '', 'tv4.png', '2025-02-14 09:53:01', '2025-02-14 09:53:01'),
(13, 'Travel Luar Kota', 'Jl. Magel Utara No ABC', '', '98877', '', 't1.png', '2025-02-17 09:45:42', '2025-02-17 09:45:42'),
(14, 'Travel Dalam Kota', '<div>Jl. Raya ABC No KJHG7</div>', '<div>lorem ipsum dolor white play victim</div>', '99348823', 'Kalianget, Kota Sumenep', '67be5eeaba65a.png', '2025-02-17 09:45:42', '2025-02-17 09:45:42'),
(19, 'Travel Percobaan', '<div>asd</div>', '<div>ini yang barusan durubah</div>', '3485737532', 'Gapura, Kota Sumenep', '68577c26136c9.jpg', '2025-06-22 03:44:38', '2025-06-22 03:44:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `Alamat`, `created_at`, `updated_at`) VALUES
(2, 'anton', 'anton@gmail.com', '$2y$10$yefUZ270X6LbtZLJ7urN3ODsFrQn.h/swo0lbb9Brv8YybtMKjPvK', 'user', 'alamat anton', '2025-02-14 02:15:32', '2025-02-14 02:15:32'),
(3, 'awul', 'awul@gmail.com', '$2y$10$Q.KLcCzoMf30GY6EFm6IQOABc94c70SIWaGfjfa9H4tWXIRjAvdEO', 'user', '', '2025-02-14 10:31:43', '2025-02-14 10:31:43'),
(4, 'admin', 'admin@gmail.com', '$2y$10$TuiPkmmggB3BLKWlvm5WhePuISQEzMbUxOo6UUku.LUFV3w/KyepG', 'admin', '', '2025-02-15 21:32:48', '2025-02-15 21:32:48'),
(6, 'coba', 'coba@gmail.com', '$2y$10$YZTBMt1PI/9cqo.19mkb8uVnoEv4gJAzK7gYRWncvX6CfZnhCQP5e', 'user', '', '2025-02-20 09:07:54', '2025-02-20 09:07:54'),
(7, 'awul', 'aw@gmail.com', '$2y$10$huab75Lu8T/CfMyKu2JOGOGMrdbV6ARg3NdGyRnzrwUSxm62z6iY.', 'user', '', '2025-02-20 09:23:00', '2025-02-20 09:23:00'),
(9, 'ayyub', 'ayyub@gmail.com', '$2y$10$OOR2pXD.IopMjJ9whtNXAeq3EOe4UiAUtCtmC.9hUQubn9O4uZFgO', 'user', 'paberasan dusun salosa', '2025-05-02 05:55:56', '2025-05-02 05:55:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
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
  `gambar6` varchar(255) NOT NULL,
  `gambar7` varchar(255) NOT NULL,
  `gambar8` varchar(255) NOT NULL,
  `gambar9` varchar(255) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `latlng` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama_wisata`, `operasional`, `harga_tiket`, `deskripsi`, `gambar`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `gambar7`, `gambar8`, `gambar9`, `kec`, `latlng`, `kategori`, `status`, `created_at`, `updated-at`) VALUES
(1, 'Pantai Lombang', '09.00 - 16.00', '10.000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, magnam quaerat minus, numquam doloremque quas in cupiditate illo labore, eum accusamus? Totam reprehenderit minus voluptatem dicta adipisci temporibus pariatur vel saepe soluta mollitia sit dolores, eos illum veniam ratione!repudiandae pariatur provident eaque voluptas placeat beatae deleniti nulla culpa sequi hic dicta delectus. Quam, possimus veniam facilis adipisci nemo exercitationem aut quis? Nostrum, sunt? Illo, voluptas vel?', 'pantai1.png', 'kolam1.png', 'taman1.png', 'bukit.png', NULL, NULL, '', '', '', '', 'batang-batang', '[-6.918801772112746, 114.06485324494663]', 'pantai', 'aktif', '2024-12-24 13:43:13', '2024-12-24 13:43:13'),
(2, 'Waterpark Sumekar', '09.00-12.00', '25.000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, magnam quaerat minus, numquam doloremque quas in cupiditate illo labore, eum accusamus? Totam reprehenderit minus voluptatem dicta adipisci temporibus pariatur vel saepe soluta mollitia sit dolores, eos illum veniam rationeperspiciatis quo earum a ipsum dolorum facilis enim eveniet quasi deserunt nulla culpa sequi hic dicta delectus. Quam, possimus veniam facilis adipisci nemo exercitationem aut quis? Nostrum, sunt? Illo, voluptas vel?', 'kolam1.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'kota sumenep', '-6.990285800317763, 113.84064182556729', 'kolam', 'aktif', '2024-12-24 14:17:53', '2024-12-24 14:17:53'),
(3, 'Taman Adipura Sumenep', '09.00-12.00', 'free', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, magnam quaerat minus, numquam doloremque quas in cupiditate illo labore, eum accusamus? Totam reprehenderit minus voluptatem dicta adipisci temporibus pariatur vel saepe soluta mollitia sit dolores, eos illum veniam ratione! Officiis accusantium consequatur quidem natus porro nostrum minima, blanditiis, dolores vitae repellat esse fuga repudiandae pariatur provident eaque voluptas placeat beatae deleniti molestias. Dolor quod obcaecati minima blanditiis, fugit voluptates perspiciatis quo earum a ipsum dolorum facilis enim eveniet', 'taman1.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'kota sumenep', '[-7.007840321942111, 113.86033898146918]', 'taman', 'aktif', '2024-12-24 14:18:35', '2024-12-24 14:18:35'),
(4, 'Bukit Love Pojah', '24 Jam', 'free', 'Bukit Love Yang berada di desa pojah ini menawarkan keindahan alam sumenep yang bisa dilihat dari bukit ', 'bukit.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'gapura', '[-6.984545082248768, 113.89662532562855]', 'bukit', 'aktif', '2025-02-12 08:25:49', '2025-02-12 08:25:49'),
(5, 'Wisata Kota', '24 Jam', 'free', 'Menyediakan Pemandangan Indah Kota Sumenep di malam Hari dengan Segala Kondisi', 'konten1.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'batu marmar', '[-7.001018637066543, 113.8706531072479]', 'kota', 'aktif', '2025-02-12 08:44:34', '2025-02-12 08:44:34'),
(6, 'Wisata Kota Malam', '19.00-03.00', 'free', 'Wisata Kota Malam Yang Menawarkan berbagai makanan dan olah olahan ini cocok untuk', 'konten2.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'larangan', '[-7.0022713190284325, 113.86699720989935]', 'kota', 'aktif', '2025-02-12 08:48:28', '2025-02-12 08:48:28'),
(7, 'Wisata Surabaya', '24 jam', '50000', '<div>asd</div>', '67b2745942e15.png', '67b25fa64f153.jpeg', '', '', NULL, NULL, '', '', '', '', 'nagel', '[-7.259264891278502, 112.72469466145941]', 'pantai', 'aktif', '2025-02-15 09:59:09', '2025-02-15 09:59:09'),
(26, 'Wisata Baru', '24 jam', 'free', '<div>asf</div>', '67b272c3a9c79.png', '', '', '', NULL, NULL, '', '', '', '', 'Kota Sumenep', '[-7.05478560535806, 113.8595450648566]', 'Kota', 'aktif', '2025-02-16 23:20:35', '2025-02-16 23:20:35'),
(28, 'Pantai A', '08:00 - 17:00', '50000', 'Pantai indah', 'g1.png', 'g2.png', 'g3.png', 'g4.png', NULL, NULL, '', '', '', '', 'Kecamatan Y', '[-7.053031656301919, 113.85550717456904]', 'Alam', 'Aktif', '2025-02-16 23:25:32', '2025-02-16 23:25:32'),
(29, 'Air Terjun B', '09:00 - 18:00', '20000', 'Air terjun B', 'g2.png', 'g1.png', 'g3.png', 'g4.png', NULL, NULL, '', '', '', '', 'Kecamatan W', '[-7.088808201668157, 113.8581775992116]', 'Alam', 'Tidak Aktif', '2025-02-16 23:25:32', '2025-02-16 23:25:32'),
(30, 'Wisata Café Sumenep', '24 jam', 'free', '<div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est sapiente mollitia illo labore. Hic, officiis! Officia, perspiciatis eaque pariatur id debitis aliquam et nisi culpa facere voluptates sapiente dolores hic quo dolorem aliquid a quasi commodi porro deleniti fugit minima eveniet animi illo. Ullam numquam culpa sapiente, repudiandae officiis enim!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, magni eaque rem consectetur saepe aut, dicta adipisci sed quod corporis odio ad! Animi consequuntur impedit nihil est dolor praesentium rem cumque, itaque qui similique excepturi modi maiores odio, adipisci, a natus hic recusandae ipsum quidem. Expedita asperiores reprehenderit iusto error?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, ipsam quis natus facilis fuga voluptatibus aspernatur iste commodi enim laborum veniam fugit, unde exercitationem hic obcaecati quaerat debitis voluptates rerum explicabo, ad laudantium minima. Accusamus dignissimos suscipit culpa, quam nobis placeat minus! Atque enim recusandae dolorem itaque facere nesciunt expedita!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error nesciunt unde tempora veniam similique delectus dolores, id maiores quod illo aspernatur cumque pariatur? Delectus dolorem culpa quis repellat rerum ad soluta veritatis, asperiores libero dolore? Debitis minima veniam repellat expedita molestiae velit quas vero, accusantium sit, hic eos, repellendus unde.</div>', '684550fd64a73.png', 'g4.png', 'g2.png', 'g1.png', 'g4.png', 'g2.png', '', '', '', '', 'Kota Sumenep', '[-7.031294539511496, 113.86209410628321]', 'Alam', 'aktif', '2025-02-16 23:25:32', '2025-02-16 23:25:32'),
(31, 'Wisata Hari Ini', '24 jam', 'free', '<ol><li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam et tenetur vero asperiores hic a dignissimos mollitia culpa quasi consequuntur eveniet, rem non officia, nobis cupiditate pariatur magnam! Doloribus quae accusamus quaerat culpa libero molestias alias dolorum doloremque cum obcaecati voluptas omnis eius expedita eos architecto dolor, quasi nulla accusantium nemo distinctio</li><li>consequatur provident dignissimos? Neque nulla consequatur provident eaque dolores! Modi facere iure quisquam obcaecati. Id, delectus sapiente animi eveniet omnis culpa sunt minus hic expedita excepturi eius iure maxime fugiat adipisci qui dolorem, magni veritatis</li><li>laudantium earum officiis blanditiis nihil. Facere omnis inventore tempora doloremque iure et pariatur.</li></ol>', '684570e05a00f.png', '68456e33835df.png', '68456e33839a5.png', '68456e3383db1.png', '68456e3385522.png', '68456e3385830.png', '', '', '', '', 'Kota Sumenep', '[-6.999952559546536, 113.8887152512204]', 'Alam', 'Aktif', '2025-05-17 10:32:53', '2025-05-17 10:32:53'),
(32, 'Wisata Coba', '24 jam', 'free', '<div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam id sit cumque amet similique odit reiciendis aut quod animi fugit, eius sed laboriosam minus repellendus saepe ullam a exercitationem placeat modi obcaecati ipsa ut, doloremque neque. Aut temporibus recusandae, pariatur excepturi quam minima autem ex corporis beatae dolorem deleniti libero eveniet officiis inventore adipisci veritatis dolore dolor fuga architecto incidunt earum mollitia! Illum sit minima eaque. Quo laborum praesentium quibusdam sequi voluptate! Id est temporibus eligendi quidem. Molestiae perspiciatis maiores reiciendis. Reiciendis, facere, voluptatem amet laboriosam veritatis veniam, fugiat alias asperiores ad minima repudiandae aperiam harum autem delectus quisquam modi. Est, qui accusamus, laboriosam totam delectus adipisci architecto explicabo tenetur quia, consequatur nulla cumque necessitatibus porro non quasi numquam. Eius, mollitia aliquam blanditiis ipsam itaque quo esse nostrum, facere a, cum quam! Est amet eveniet dicta ipsam modi nisi provident recusandae doloremque nostrum animi! Ab praesentium a facilis deserunt tempora?<br><br><strong>Deskripsi perkiraan harga transportasi&nbsp;</strong></div><ul><li>Kapal RP 25.000</li><li>Mobil 100.00</li></ul>', '68457099dcd22.png', '68457099dd08c.png', '68457099dd3cc.png', '68457099dd72e.png', '68457099de167.png', '68524b4d8f3d9.jpg', '68524c23639fa.jpg', '68524c2363e31.jpg', '68524c236436b.jpg', '68524c2364679.jpg', '', '[-6.699952559546536, 113.8777152512204]', 'ALama', 'Aktif', '2025-06-08 11:14:33', '2025-06-08 11:14:33'),
(33, 'mecoba wisata baru', '24 jam', 'free', '<div>lokasi wisata yang cocok untuk liburan kahir tahun bersama keluarga</div>', '68577fde4f3fa.jpg', '68577fde4f88b.jpg', '68577fde4fb31.jpg', '', '', '', '', '', '', '', 'Kota Sumenep', '[-6.999952559546536, 113.8887152512204]', 'Alam', 'Aktif', '2025-06-22 04:00:30', '2025-06-22 04:00:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=914;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
