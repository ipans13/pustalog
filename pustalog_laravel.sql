-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2024 at 07:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustalog_laravel`
--
DROP DATABASE IF EXISTS `pustalog_laravel`;
CREATE DATABASE IF NOT EXISTS `pustalog_laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pustalog_laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategories`
--

DROP TABLE IF EXISTS `kategories`;
CREATE TABLE IF NOT EXISTS `kategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategories`
--

INSERT INTO `kategories` (`id`, `kategori`) VALUES
(1, 'Referensi'),
(2, 'Fiksi'),
(3, 'Animasi'),
(4, 'Agama'),
(5, 'Bisnis dan Ekonomi'),
(6, 'Desain');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_msk_keluar`
--

DROP TABLE IF EXISTS `laporan_msk_keluar`;
CREATE TABLE IF NOT EXISTS `laporan_msk_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_msk_keluar`
--

INSERT INTO `laporan_msk_keluar` (`id`, `judul`, `penerbit`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Experimental Design And Data Analysis Using R', 'Gramedia', 'Masuk', '2024-05-24 03:59:12', '2024-07-24 03:59:12'),
(10, 'Estetika', 'kanisius', 'Masuk', '2024-06-24 04:07:31', '2024-07-24 04:07:31'),
(11, 'Sebaik-Baik Teman Duduk', 'Elexmedia', 'Masuk', '2024-05-24 04:10:07', '2024-07-24 04:10:07'),
(12, 'Rahasia Keberhasilan Bisnis Ala Khadijah', 'Yash Media', 'Masuk', '2024-07-24 04:13:36', '2024-07-24 04:13:36'),
(13, 'Akselerasi Ivestasi Jokowi', 'Gramedia', 'Masuk', '2024-07-24 04:19:04', '2024-07-24 04:19:04'),
(14, 'Evaluasi Sensori Produk Pangan', 'Bumi Askara', 'Masuk', '2024-07-24 04:21:04', '2024-07-24 04:21:04'),
(15, 'Matematika', 'Rivan Setiawan', 'Keluar', '2024-07-24 04:22:26', '2024-07-24 04:22:26'),
(16, 'Detektif Konan', 'Rivan Setiawan', 'Keluar', '2024-07-24 04:22:31', '2024-07-24 04:22:31'),
(17, 'Buku Ensiklopedia Pintar Pertamaku Luar Angkasa', 'Bhuana Ilmu Populer', 'Masuk', '2024-07-24 04:25:32', '2024-07-24 04:25:32'),
(18, 'Ejaan Bahasa Indonesia yang Disempurnakan (EYD) Edisi Ke-V', 'Permata Press', 'Masuk', '2024-07-24 04:27:27', '2024-07-24 04:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_22_114720_create_kategories_table', 1),
(5, '2024_07_19_114847_create_books_table', 1),
(6, '2024_07_21_045116_create_masuk_keluar_table', 1),
(7, '2024_07_21_050433_add_tragger_buku', 1),
(8, '2024_07_21_053750_remove_trigger_buku', 1),
(9, '2024_07_23_045043_create_peminjaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_referensi` bigint(20) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pinjam` timestamp NULL DEFAULT NULL,
  `waktu_kembali` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `peminjaman_token_unique` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama`, `id_referensi`, `token`, `waktu_pinjam`, `waktu_kembali`) VALUES
(4, 'Rivan', 498685, '820fc1', '2024-07-23 06:40:30', NULL),
(5, 'Rivan', 418893, 'c0ac53', '2024-07-23 20:47:48', NULL),
(6, 'Rivan', 258067, 'fbd6db', '2024-07-23 20:49:04', '2024-07-23 20:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9vRrkf6vywvgAoZKoaYKo4HOiIkyB7PDTUnGoYgu', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYmJDUlR4SnZNV05PbzZlU0V1YTZpNEQ2dUpBeThQYXZUOUx4d3JtcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1721799602);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

DROP TABLE IF EXISTS `tbl_buku`;
CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_referensi` bigint(20) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `jml_halaman` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_buku_id_referensi_unique` (`id_referensi`),
  KEY `tbl_buku_kategori_id_foreign` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `id_referensi`, `judul`, `kategori_id`, `jml_halaman`, `tahun`, `penerbit`, `penulis`, `desc`, `img`) VALUES
(6, 564547, 'Experimental Design And Data Analysis Using R', 4, 260, 2022, 'Gramedia', 'IR. AKHMAD DAKHLAN, M.P., PH.D.', 'R sekarang secara luas diakui sebagai keterampilan ilmiah dan semakin banyak diterapkan di banyak bidang ilmiah karena kuat dan fleksibel dan juga dapat diunduh dan diinstal secara bebas di banyak platform (Windows, MacOSX dan Linux). Buku ini sangat bermanfaat bagi siswa dan peneliti dalam proses pembelajaran, untuk membantu mereka dalam menerapkan desain eksperimental dan metode statistik yang tepat menggunakan perangkat lunak R.', '1721793552.jpg'),
(7, 398405, 'Estetika', 6, 157, 2017, 'kanisius', 'Lingga Agung', 'Estetika juga dianggap sebagai cabang ilmu filsafat yang membahas tentang keindahan yang didalamnya ada seni dan alam semesta.', '1721794051.jpg'),
(8, 952668, 'Sebaik-Baik Teman Duduk', 4, 312, 2023, 'Elexmedia', 'Faisal Kunhi', 'kita sering menghadapi tantangan yang tidak sesuai dengan keinginan . Namun, semangat harus terus dijaga. Salah satu cara untuk tetap semangat adalah dengan menghafal kata-kata hikmah dari para ulama, yang dikenal di pesantren sebagai Al-Mahfuzhat. Kata-kata mutiara ini sarat dengan pesan bijak dan inspiratif.', '1721794207.jpg'),
(9, 473661, 'Rahasia Keberhasilan Bisnis Ala Khadijah', 4, 152, 2024, 'Yash Media', 'Umi Dilla', 'Khadijah radhiyallahu ‘anha merupakan sosok perempuan pengusaha sukses yang dapat menjalankan bisnisnya dengan menerapkan prinsip-prinsip secara baik. Beliau pandai dalam memanfaatkan modal, memilih mitra kerja, dan memilih karyawan. Hal yang tak kalah pentingnya adalah beliau cerdas dalam memikirkan strategi pemasaran untuk usaha dagangnya.', '1721794416.jpg'),
(10, 278432, 'Akselerasi Ivestasi Jokowi', 5, 231, 2024, 'Gramedia', 'Kristin Samah', 'Prinsip dasar pembangunan kawasan industri adalah memberi kemudahan untuk investasi dan bukan menjual lahan. Oleh karena itu, harus dilakukan teroboson-terobosan untuk mencari jalan keluar agar percepatan investasi dan pemanfaatan kawasan industri bisa terjadi. Dalam pembangunan kawasan industri, tugas pemerintah adalah menyediakan infrastruktur.', '1721794744.jpg'),
(11, 672851, 'Evaluasi Sensori Produk Pangan', 5, 224, 2024, 'Bumi Askara', 'Prof. Dr. Ir. Dede Robiatul Adawiyah, M.Si, dkk.', 'Standar mutu dan keselamatan pangan yang berkualitas tinggi dapat membantu seseorang dalam mengurangi risiko kontaminasi dan keracunan makanan. Perusahaan makanan menggunakan data dari evaluasi sensori untuk meningkatkan proses produksi, mengoptimalkan formulasi produk, dan merancang strategi pemasaran yang lebih efektif.', '1721794864.jpg'),
(12, 795460, 'Buku Ensiklopedia Pintar Pertamaku Luar Angkasa', 1, 98, 2022, 'Bhuana Ilmu Populer', 'Arcturus Publishing', 'Semakin bertambah usia si kecil, maka akan semakin banyak pertanyaan yang ia lontarkan. Awalnya mungkin berupa pertanyaan sederhana yang gampang jawabannya. Namun, seiring dengan berjalannya waktu, pertanyaan yang dilontarkan bisa makin rumit', '1721795132.jpg'),
(13, 773484, 'Ejaan Bahasa Indonesia yang Disempurnakan (EYD) Edisi Ke-V', 1, 2024, 2024, 'Permata Press', 'Tim Permata Press', 'Ejaan Bahasa Indonesia yang Disempurnakan (EYD) adalah pedoman resmi yang dapat dipergunakan oleh instansi pemerintah dan swasta serta masyarakat dalam penggunaan bahasa Indonesia secara baik dan benar.', '1721795247.jpg');

--
-- Triggers `tbl_buku`
--
DROP TRIGGER IF EXISTS `after_buku_keluar`;
DELIMITER $$
CREATE TRIGGER `after_buku_keluar` AFTER DELETE ON `tbl_buku` FOR EACH ROW BEGIN
            INSERT INTO laporan_msk_keluar (judul, penerbit, status, created_at,updated_at) 
            VALUES (OLD.judul, OLD.penerbit, "Keluar", NOW(),NOW());
        END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_buku_masuk`;
DELIMITER $$
CREATE TRIGGER `after_buku_masuk` AFTER INSERT ON `tbl_buku` FOR EACH ROW BEGIN
                INSERT INTO laporan_msk_keluar (judul, penerbit, status, created_at,updated_at) 
                VALUES (NEW.judul, NEW.penerbit, "Masuk", NOW(),NOW());
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rivan', 'ipans@pustalog.co.id', NULL, '$2y$12$7Z9VEqc3apMM1yXMSWGofOnTAIUhjIdonTqAVKNmo4UQnwjlGRDZW', NULL, '2024-07-23 05:37:46', '2024-07-23 05:37:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
