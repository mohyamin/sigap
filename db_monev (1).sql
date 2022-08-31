-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2021 at 02:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monev`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pelaksana`
--

CREATE TABLE `jenis_pelaksana` (
  `id` int(11) NOT NULL,
  `kd_dpa` char(30) NOT NULL,
  `nama_dpa` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pelaksana`
--

INSERT INTO `jenis_pelaksana` (`id`, `kd_dpa`, `nama_dpa`, `created_at`, `update_at`) VALUES
(1, '6001.600113.01.01.0001.5.2', 'Penyedia Jasa Komunikasi , Sumber Daya Air dan Listrik', '2020-11-18 00:00:00', '2020-11-10 00:00:00'),
(2, '6001.600113.01.01.0004.5.2', 'Penyedia Makanan dan Minuman ', '2020-11-19 03:00:00', '2020-11-03 00:00:00'),
(5, '6001.600113.01.01.0005.5.2', 'Pengelola Dokumentasi dan Arsip Perangkat Daerah', '2020-11-30 02:32:20', '2020-11-30 02:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `jenis_pelaksana_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_kegiatan` varchar(50) NOT NULL,
  `nama_kegiatan` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_approve` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `jenis_pelaksana_id`, `id_user`, `tgl_kegiatan`, `nama_kegiatan`, `keterangan`, `status`, `tgl_approve`, `created_at`, `update_at`) VALUES
(35, 2, 17, '2020-11-24', 'dfamslkdf', 'dmsnfsadm', 1, NULL, '2020-11-23 23:28:23', '2020-11-24 12:00:48'),
(36, 2, 17, '2020-11-25', 'adsjbkfkasdf', 'fakdsjbfads', 1, NULL, '2020-11-24 18:28:38', '2020-11-24 18:31:12'),
(37, 2, 2, '2020-11-25', 'f;dsafads', 'asklfjdsakl', 1, '2020-11-17', '2020-11-27 00:00:00', '0000-00-00 00:00:00'),
(38, 1, 17, '2020-11-25', 'fdasjfdsaf', 'dasfhjksadf', 1, '2020-11-27', '2020-11-27 13:06:16', '2020-11-27 13:06:16'),
(39, 1, 5, '2021-01-15', 'asdfdsaf', 'sadfdasfas', 0, NULL, '2021-01-14 23:49:01', '2021-01-14 23:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_system`
--

CREATE TABLE `notifikasi_system` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi_system`
--

INSERT INTO `notifikasi_system` (`id`, `id_user`, `type`, `tanggal`) VALUES
(14, 5, 'mengirim', '2021-01-14 23:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_kegiatan`
--

CREATE TABLE `rincian_kegiatan` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `kd_rekening` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian_kegiatan`
--

INSERT INTO `rincian_kegiatan` (`id`, `kegiatan_id`, `kd_rekening`) VALUES
(51, 35, '5221102'),
(52, 35, '5221103'),
(53, 35, '5221104'),
(55, 36, '5221102'),
(56, 36, '5221103'),
(57, 36, '5221104');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pelaksana`
--

CREATE TABLE `rincian_pelaksana` (
  `kd_rekening` varchar(7) NOT NULL,
  `jenis_pelaksana_id` int(11) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `update_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rincian_pelaksana`
--

INSERT INTO `rincian_pelaksana` (`kd_rekening`, `jenis_pelaksana_id`, `uraian`, `update_at`, `created_at`) VALUES
('5221102', 2, 'Belanja Makan dan Minum Rapat', '2020-11-10 00:00:00', '2020-11-17 00:00:00'),
('5221103', 2, 'Belanja Makanan dan Minum Tamu', '2020-11-10 00:00:00', '2020-11-11 00:00:00'),
('5221104', 2, 'Belanja Makanan dan Minuman Kegiatan', '2020-11-10 00:00:00', '2020-11-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `jabatan`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `tanggal_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `email`, `token`, `tanggal_buat`) VALUES
(1, 'bradleydelta371@gmail.com', 'xrgJIyzeS2uGrS9qEqoKIFAqLh4loO6ER98O+DfkC0I=', '2020-11-24 20:29:03'),
(2, 'bradleydelta371@gmail.com', '12UE4azPnQ6Sc8UahDX5Q2R4WmOP6uKWHgtmNKySqf0=', '2020-11-24 20:43:30'),
(3, 'bradleydelta371@gmail.com', '9FBOikvtJgETFe/XicEGygPS/2Fhx+0Rt5kQEQIFDm4=', '2020-11-24 20:57:45'),
(4, 'bradleydelta371@gmail.com', 'nvGH0BfSX7S+d5sG09lqMmZ20gplaqJea52SVPsr2WY=', '2020-11-24 20:59:38'),
(5, 'bradleydelta371@gmail.com', 'ZV/fkTPLaVLSEzWgxYpnDiFtPRmOI0OQAJFV8dlX2C0=', '2020-11-24 21:02:48'),
(6, 'bradleydelta371@gmail.com', '6FsaSDCGfs4Jx6YA1IsPKg1CHA80wNcVq1Z9TE1zu6s=', '2020-11-24 21:04:28'),
(7, 'bradleydelta371@gmail.com', '55LhNdhLgmK4WjsHdxGFl2bK7cPTeyc9ffjeZl91dFc=', '2020-11-24 21:05:27'),
(8, 'bradleydelta371@gmail.com', 'e7OmhD08l2lTXMXJyzqherc5uvMhzYOtt/2BbOPYp9k=', '2020-11-24 21:09:05'),
(9, 'bradleydelta371@gmail.com', '03NtyOalHY6OYQFaqNzoYraV8CSd9xTOUQxg0p7DWJs=', '2020-11-24 21:23:42'),
(10, 'bradleydelta371@gmail.com', 'cvo8DARi6a0WFZxtWtT3m3XxuwkiEw0Sszl1vL93zZ8=', '2020-11-24 21:35:05'),
(11, 'bradleydelta371@gmail.com', 'EG2gQNM1xubYkKVbYE0V2gb1VDxoZO6hujxJkBTcjrM=', '2020-11-24 21:47:01'),
(12, 'bradleydelta371@gmail.com', 'zWsiRHCdJeYFY4H75oDj6EC+A3PHRRUWvXhclGGlYYQ=', '2020-11-24 21:48:18'),
(13, 'bradleydelta371@gmail.com', 'lLD7n3TWHPwaRAlvnkSe6QNDapj3XPHbCMo20aSqtuM=', '2020-11-24 21:49:23'),
(14, 'bradleydelta371@gmail.com', 'ys+Esbv5TWMRGtw08z6qBa39qqCmgv2UtG7O+71hcQ8=', '2020-11-24 21:51:55'),
(15, 'bradleydelta371@gmail.com', '6MXGYFB+kOjV/raw/GCCCEsiqyW9d+uaHGbdtkRePFk=', '2020-11-24 21:52:29'),
(16, 'bradleydelta371@gmail.com', 'LG2parahlVbV1vIdMS45DoK9mSUBBhrDT6/JZCQm0oc=', '2020-11-24 21:53:53'),
(17, 'bradleydelta371@gmail.com', 'gEi2hiXxTGCnqBYzOz+ixRbHc+vsxGgwT72W1dEHDhQ=', '2020-11-30 08:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `total_kegiatan`
--

CREATE TABLE `total_kegiatan` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `total_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_kegiatan`
--

INSERT INTO `total_kegiatan` (`id`, `tahun`, `total_kegiatan`) VALUES
(3, 2020, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `role_id` int(3) NOT NULL,
  `nip` char(18) NOT NULL,
  `password` char(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `tanggal_lahir`, `role_id`, `nip`, `password`, `image`, `email`, `is_active`, `created_at`, `update_at`) VALUES
(3, 'Ridwan', '2020-11-02', 2, '218282818281828182', '$2y$10$5oxNBhAZXjPo2fNhJ482fe0vI08zmzptHutOcNR0SQbOU0rzzu2Ey', 'default.jpg', 'Ridwan@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Ramli', '0000-00-00', 2, '121212', '$2y$10$3Nyvsx.gEHum6nb6yiLonugiHOd5uInUqsq9WUJUGl1YE6M0MpukO', 'default.jpg', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'yamin', '2020-11-12', 1, '123456789012345678', '$2y$10$5oxNBhAZXjPo2fNhJ482fe0vI08zmzptHutOcNR0SQbOU0rzzu2Ey', 'default.jpg', 'yamin@gmail.com', 0, '0000-00-00 00:00:00', '2020-11-28 00:15:38'),
(13, 'Mahmud', '0000-00-00', 3, '121313212263616262', '$2y$10$q5hgGAFTgfyDbSOwBg8ih.hJTC7bduL2GHwlaGdZfBkpWUkAVf4h2', 'default.jpg', 'mahmud@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'dskfkjasdf', '0000-00-00', 2, '123132128281828182', '$2y$10$TQ5oH9uvRln4.aP7OirGn.rw6FkRL.5vnYLzyCAOsxfW27.T8WeiG', 'default.jpg', 'sdahfkjdsa@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'bento', '2020-11-17', 1, '123123453493920302', '$2y$10$7/CKRWO.bxRvqMCR3jZtmeC4Ihu6Xr5a/XLABLNdQ0DDX.nbXeiz6', 'default.jpg', 'bento@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Muhamad Ridwan', '0000-00-00', 1, '12180408', '$2y$10$KMhj5OlJnkKG1bV/7gmJyed37Ec9lcSPBhHmCzsxZVxdsLjlr1/BG', 'default.jpg', 'bradleydelta371@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Ridwansss', '0000-00-00', 2, '000000000000000000', '$2y$10$LBtVbXI2wvYGE3pw1SbhBOsLlKXPSo2cfVu3Q6AfTJKKU41SCggo.', 'default.jpg', 'ksadflkdsf@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'asdfjas', '0000-00-00', 3, '999999999999999999', '$2y$10$nAtX8VbpRAAW7sGOtPE.ueDDABHnxVnOlFxxft8/1BiZyvnOhapF6', 'default.jpg', 'sdfs@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Heri Baso', '2020-11-26', 2, '777777777777777777', '$2y$10$ZCgiD.hUelEfaop/G31aH.5osDBx6riXqQHHxvkBDzAo/Y/yv8X3K', 'default.jpg', 'heri@gmail.com', 0, '2020-11-27 21:49:38', '2020-11-28 12:47:12'),
(25, 'covba', '0000-00-00', 3, '128181829481828181', '$2y$10$KMhj5OlJnkKG1bV/7gmJyed37Ec9lcSPBhHmCzsxZVxdsLjlr1/BG', 'default.jpg', 'dasfnkjdnsf@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(3) NOT NULL,
  `menu_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 4),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(3, 'Staff'),
(4, 'User'),
(5, 'Management User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Admin/Dashboard', 'settings_input_svideo', '1'),
(2, 1, 'Jenis Pelaksana', 'Admin/JenisPelaksana', 'card_travel', '1'),
(3, 3, 'Home', 'Staff/Home', 'home', '1'),
(4, 4, 'Home', 'User/Home', 'home', '1'),
(5, 1, 'Rincian Pelaksana', 'Admin/RincianPelaksana', 'details', '1'),
(7, 5, 'Daftar User', 'Admin/DaftarUser', 'group', '1'),
(10, 4, 'Kegiatan', 'User/Kegiatan', 'work', '1'),
(11, 3, 'Kegiatan', 'Staff/Kegiatan', 'work', '1'),
(14, 1, 'Kegiatan', 'Admin/Kegiatan', 'work', '1'),
(15, 1, 'Jadwal Kegiatan', 'Admin/JadwalKegiatan', 'event', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_pelaksana`
--
ALTER TABLE `jenis_pelaksana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `notifikasi_system`
--
ALTER TABLE `notifikasi_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rincian_kegiatan`
--
ALTER TABLE `rincian_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rincian_pelaksana`
--
ALTER TABLE `rincian_pelaksana`
  ADD PRIMARY KEY (`kd_rekening`),
  ADD KEY `jenis_pelaksana_id` (`jenis_pelaksana_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_kegiatan`
--
ALTER TABLE `total_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pelaksana`
--
ALTER TABLE `jenis_pelaksana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifikasi_system`
--
ALTER TABLE `notifikasi_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rincian_kegiatan`
--
ALTER TABLE `rincian_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `total_kegiatan`
--
ALTER TABLE `total_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rincian_pelaksana`
--
ALTER TABLE `rincian_pelaksana`
  ADD CONSTRAINT `rincian_pelaksana_ibfk_1` FOREIGN KEY (`jenis_pelaksana_id`) REFERENCES `jenis_pelaksana` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
