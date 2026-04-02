-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2026 at 03:03 PM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `role` enum('admin','siswa') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_admin`, `role`) VALUES
(1, 'admin', 'admin123', 'Admin Perpustakaan', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `halaman` int(11) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `penerbit` varchar(150) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `judul`, `penulis`, `kategori`, `stok`, `halaman`, `tahun_terbit`, `penerbit`, `deskripsi`, `cover`) VALUES
(1, 'The Alchemist', 'Paulo Coelho', 'Novel', 9, 138, '1998', 'Gramedia', 'The Alchemist adalah sebuah novel yang telah memikat pembaca dengan pesannya yang mendalam dan bahasanya yang indah. Novel ini menceritakan kisah Santiago, seorang anak gembala yang bermimpi menemukan harta di piramida Mesir. Sepanjang perjalanannya, ia bertemu berbagai karakter yang membimbingnya menuju \"Legenda Pribadinya.\" Novel ini dikenal karena pelajaran yang sederhana namun mendalam, seperti pentingnya mempercayai diri sendiri dan keterhubungan semua hal. Novel ini telah diterjemahkan ke dalam lebih dari 65 bahasa dan telah terjual lebih dari 150 juta eksemplar di seluruh dunia, menjadikannya salah satu buku terlaris sepanjang masa.', 'TheAlchemist_cover.jpg'),
(2, 'Atomic Habits', 'James Clear', 'Pendidikan', 10, 356, '2019', 'Gramedia', '\"Atomic Habits\" adalah panduan yang sangat berguna bagi siapa saja yang ingin meningkatkan kualitas hidup melalui perubahan kebiasaan. Dengan pendekatan yang berbasis pada sains dan contoh nyata, James Clear memberikan wawasan yang mendalam tentang bagaimana kebiasaan kecil dapat mengubah hidup kita secara signifikan. Buku ini cocok untuk dibaca oleh siapa saja yang ingin memahami dan menerapkan prinsip-prinsip kebiasaan dalam kehidupan sehari-hari.', 'Atomic_Habits_cover.jpg'),
(3, 'Transform Your Habits', 'James Clear', 'Pelajaran', 10, 36, '2018', 'Gramedia', 'Mengubah kebiasaan Anda melibatkan pemahaman ilmu di baliknya dan menerapkan strategi praktis untuk menciptakan perubahan yang bertahan lama.', 'Transform_Your_Habits_cover.jpg'),
(4, '10 Dosa Besar Soeharto', 'Wimanjaya K. Liotohe', 'Sejarah', 14, 64, '1998', 'Upaya Warga Negara', 'zine- zine pendobrak kediktatoran orba soeharto dan digagas oleh para konseptor reformasi ini terdiri dari beberapa edisi, yang didalamnya dikemukakan fakta fakta berbahaya baik dari segi ekonomi , sosial, dan politik dari rezim suharto dan keluarganya ini, benar benar buku perlawanan!', '10_Dosa_Besar_Soeharto.jpg'),
(5, '20 Bodoh Besar Soeharto', 'Wimanjaya K. Liotohe', 'Sejarah', 10, 64, '1998', 'Upaya Warga Negara', 'zine- zine pendobrak kediktatoran orba soeharto dan digagas oleh para konseptor reformasi ini terdiri dari beberapa edisi, yang didalamnya dikemukakan fakta fakta berbahaya baik dari segi ekonomi , sosial, dan politik dari rezim suharto dan keluarganya ini, benar benar buku perlawanan!', '20_Bodoh_Besar_Soeharto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `denda` int(11) NOT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') DEFAULT 'dipinjam',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`id`, `user_id`, `siswa_id`, `book_id`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `denda`, `status`, `created_at`) VALUES
(1, NULL, 1, 3, '2026-03-05', '2026-03-12', NULL, 0, 'dikembalikan', '2026-03-05 10:57:11'),
(2, NULL, 2, 1, '2026-03-01', '2026-03-08', NULL, 0, 'dikembalikan', '2026-03-05 10:57:11'),
(14, NULL, 22, 5, '2026-03-05', '2026-03-12', NULL, 0, 'dipinjam', '2026-03-05 13:16:53'),
(15, NULL, 22, 5, '2026-03-05', '2026-03-12', NULL, 0, 'dipinjam', '2026-03-05 13:16:53'),
(17, NULL, 0, 5, '2026-03-05', '0000-00-00', NULL, 0, 'dipinjam', '2026-03-05 13:23:26'),
(18, NULL, 0, 5, '2026-03-05', '0000-00-00', NULL, 0, 'dipinjam', '2026-03-05 13:24:26'),
(19, NULL, 0, 3, '2026-03-05', '0000-00-00', NULL, 0, 'dipinjam', '2026-03-05 13:27:13'),
(20, NULL, 0, 5, '2026-03-05', '0000-00-00', NULL, 0, 'dipinjam', '2026-03-05 13:27:46'),
(21, NULL, 0, 4, '2026-03-05', '2026-03-12', NULL, 0, 'dipinjam', '2026-03-05 13:37:04'),
(22, NULL, 0, 1, '2026-03-05', '2026-03-12', NULL, 0, 'dipinjam', '2026-03-05 13:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `password`) VALUES
(1, '0086596350', 'Abu Ibnun Haris', 'XII RPL 1', '12345'),
(2, '0087194999', 'Andini Syahfiya', 'XII RPL 1', '12345'),
(3, '0078352487', 'Anisa Larasati', 'XII RPL 1', '12345'),
(4, '0085763686', 'Aulia Salsabila', 'XII RPL 1', '12345'),
(5, '0081613519', 'Ayunda Affira', 'XII RPL 1', '12345'),
(6, '0087886903', 'Bunga Puspita Sari Nasution', 'XII RPL 1', '12345'),
(7, '0086478683', 'Daffa Quntara Putra', 'XII RPL 1', '12345'),
(8, '0075197438', 'Diana Ningsih', 'XII RPL 1', '12345'),
(9, '0081166076', 'Eca Handini', 'XII RPL 1', '12345'),
(10, '0095801078', 'Fahri Febrian Nugroho', 'XII RPL 1', '12345'),
(11, '0081320271', 'Gabriel Ratus Panggabean', 'XII RPL 1', '12345'),
(12, '0087469991', 'Gadis Tumayroh', 'XII RPL 1', '12345'),
(13, '0088222820', 'Kayla Al Bhira Iswandari', 'XII RPL 1', '12345'),
(14, '0088860713', 'Kevin Khariri Siregar', 'XII RPL 1', '12345'),
(15, '0082755921', 'Laila Andini', 'XII RPL 1', '12345'),
(16, '0088703474', 'MHD. Raafi Afif', 'XII RPL 1', '12345'),
(17, '0082622430', 'Mualimah Sadiyah', 'XII RPL 1', '12345'),
(18, '0087397657', 'Muhammad Abdul Razak', 'XII RPL 1', '12345'),
(19, '0082140553', 'Muhammad Varel', 'XII RPL 1', '12345'),
(20, '0085161923', 'Nadyn Lila Sari', 'XII RPL 1', '12345'),
(21, '0082376993', 'Nayla Azzahra', 'XII RPL 1', '12345'),
(22, '0081569469', 'Panji Nouvaldo', 'XII RPL 1', '12345'),
(23, '0084973819', 'Radit Ferbriyan', 'XII RPL 1', '12345'),
(24, '0093459514', 'Rafi Ahmad', 'XII RPL 1', '12345'),
(25, '0082902451', 'Rayhan Pratama', 'XII RPL 1', '12345'),
(26, '0085516606', 'Sasya Aulia Winanda', 'XII RPL 1', '12345'),
(27, '0089416781', 'Silla Natasya Putri', 'XII RPL 1', '12345'),
(28, '0086398074', 'Tasya Hanifa Tarigan', 'XII RPL 1', '12345'),
(29, '0089431486', 'Tegar Cakra Wijaya', 'XII RPL 1', '12345'),
(30, '0077210420', 'Widya Ramadani', 'XII RPL 1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','siswa') DEFAULT 'siswa',
  `nisn` varchar(20) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `nisn`, `kelas`) VALUES
(1, 'Admin Perpus', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', NULL, NULL),
(2, 'Abu Ibnun Haris', NULL, '123', 'siswa', '23.10639', '11 RPL 1'),
(3, 'Andini Syafiyah', NULL, '123', 'siswa', '23.10640', '11 RPL 1'),
(4, 'Anisa Larasati', NULL, '12345', 'siswa', '0085064592', 'XII RPL 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
