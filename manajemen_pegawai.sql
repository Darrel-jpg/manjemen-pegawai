-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2025 at 06:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `umur` char(2) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `foto`, `nama`, `jenis_kelamin`, `umur`, `tanggal_masuk`, `jabatan`, `no_hp`) VALUES
(1, 'yuji.jpg', 'Itadori Yuji', 'Laki-laki', '20', '2025-08-05', 'Sekretaris', '081273912831'),
(38, '68f226a08a533.jpg', 'Kento Nanami', 'Laki-laki', '37', '2025-06-16', 'Asisten Eksekutif', '087638292737'),
(39, '68f226e4072b1.jpg', 'Rintarou Suna', 'Laki-laki', '23', '2025-09-03', 'Sekretaris', '08976425887'),
(40, '68f2274d27606.jpg', 'Megumi Fushiguro', 'Laki-laki', '21', '2024-06-05', 'Manajer', '0877328474829'),
(41, '68f369886cf1d.jpg', 'Monkey D Luffy', 'Laki-laki', '25', '2025-06-09', 'Supervisor', '08674638298'),
(42, '68f369ad35a87.jpg', 'Gojo Satoru', 'Laki-laki', '32', '2025-05-20', 'Staf Admin', '081234722937'),
(43, '68f369c794e30.jpg', 'Miya Atsumu', 'Laki-laki', '22', '2025-09-23', 'Sekretaris', '088763826382'),
(44, '68f369f5a678a.jpg', 'Kageyama Tobio', 'Laki-laki', '21', '2025-08-26', 'Asisten Eksekutif', '0876473927383'),
(45, '68f36a24cd515.jpg', 'Izuku Midoriya', 'Laki-laki', '19', '2025-10-15', 'HRD', '085850282739');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'gajah', '$2y$10$DWvk9GcKsv4Q0U3Wwj3lbugA/UYVo26fNZGHuNnFEOYIZVfEesK0W'),
(5, 'Darrel', '$2y$10$.s1kejkjqGwM.OZTLPn7MO5ynxrtrQPXZVVVBTF29HpaNCrYUXfVK'),
(6, 'Admin', '$2y$10$HsRfiAxUGY5/3EmFiWXtLuksx2UjcR0eM4TIVXJuxCuRKPjpiTtp6'),
(8, 'darrel', '$2y$10$xdLZXKzWvxfU3dWJ56udPur5QV1z8ZVMSVqS2D3wnAb4E7HoXRw3O'),
(9, 'hehe', '$2y$10$ppWOtXUqTngQfgGLROLgSe10nDXvSO1TTSeeYIcj2dO3qmlBHXkl.'),
(10, 'Anjay', '$2y$10$C/o3CEO9qqbwuKX2/WmyIuOfzgmDLD3C8WPtjXDjyCU2h7TZIQW0W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
