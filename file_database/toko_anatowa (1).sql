-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2023 pada 17.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_anatowa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamats`
--

CREATE TABLE `alamats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `harga`, `stok`, `deskripsi`, `merk`, `berat`, `created_at`, `updated_at`) VALUES
(3, 'Keripik Pisang UMI 100g', 12000, 20, '-', 'UMI', 100, '2023-08-11 05:30:46', '2023-08-11 05:30:46'),
(4, 'Keripik Pisang UMI 170G ', 15000, 50, '-', 'UMI', 170, '2023-08-11 05:40:48', '2023-08-11 05:40:48'),
(5, 'Keripik Pisang UMI 400G', 25000, 20, '-', 'UMI', 400, '2023-08-11 05:42:00', '2023-08-11 05:42:00'),
(6, 'Keripik sukun UMI 100G', 12000, 900, '-', 'UMI', 100, '2023-08-11 06:29:42', '2023-08-11 06:29:42'),
(7, 'Jahe Merah Original 40g', 10000, 100, '-', 'Petiando  Mewanta', 40, '2023-08-11 06:32:53', '2023-08-11 06:32:53'),
(8, 'Jahe Mera Original 80g', 25000, 100, '-', 'Petiando Mewanta', 80, '2023-08-11 06:34:02', '2023-08-11 06:34:02'),
(9, 'Jahe Merah Gula Aren', 15000, 100, '-', 'Zayn Rempah', 250, '2023-08-11 06:37:22', '2023-08-11 06:37:22'),
(10, 'Kopi Arabika 300g', 50000, 100, '-', 'Teras Kopi', 300, '2023-08-11 06:39:13', '2023-08-11 06:39:13'),
(11, 'Abon ikan bandeng', 12000, 100, '-', 'Dapur Malili River', 75, '2023-08-11 06:42:26', '2023-08-11 06:42:26'),
(12, 'Bagea Kelor', 28000, 100, '-', 'UMKM SB Wasuponda', 1, '2023-08-11 06:44:31', '2023-08-11 07:36:54'),
(13, 'Bawang Goreng Duri', 35000, 100, '-', 'Mas Daeng', 100, '2023-08-11 07:33:14', '2023-08-11 07:33:14'),
(14, 'Bunga Telang', 1, 100, '-', '-', 1, '2023-08-11 07:35:15', '2023-08-11 07:35:15'),
(15, 'Creps Linopi Rasa Abon Sapi', 1, 100, '-', 'Meura Cookies', 1, '2023-08-11 07:39:59', '2023-08-11 07:39:59'),
(16, 'Crispy Pangkilang 70g', 22000, 100, '-', 'Muthy Andalangnge', 70, '2023-08-11 07:42:15', '2023-08-11 07:42:15'),
(17, 'Crispy Pangkilang 35g', 11000, 100, '-', 'Muthy Andalangnge', 35, '2023-08-11 07:43:17', '2023-08-11 07:43:17'),
(18, 'Jahe Merah Krimer 80g', 25000, 100, '-', 'Petiando Mawanta', 80, '2023-08-11 07:46:00', '2023-08-11 07:46:00'),
(19, 'Jahe Merah Krimer 40g', 10000, 100, '-', 'Petiando  Mewanta', 40, '2023-08-11 07:47:08', '2023-08-11 07:47:08'),
(20, 'Jamu Instan', 1, 100, '-', 'Herbal Mandiri', 125, '2023-08-11 07:49:29', '2023-08-11 07:49:29'),
(21, 'Kacang Bawang', 1, 100, '-', 'Habibie', 1, '2023-08-11 07:51:41', '2023-08-11 07:51:41'),
(22, 'Kacang Sembunyi', 1, 100, '-', 'Amazing Production', 1, '2023-08-11 07:58:27', '2023-08-11 07:58:27'),
(23, 'Kacang Sembunyi 150g', 15000, 100, '-', 'An Nur', 150, '2023-08-11 08:00:33', '2023-08-11 08:00:33'),
(24, 'Kacang Sembunyi 200g', 15000, 100, '-', 'An Nur', 200, '2023-08-11 08:01:42', '2023-08-11 08:01:42'),
(25, 'Kacang Sembunyi 500g', 37000, 100, '-', 'An Nur', 500, '2023-08-11 08:03:02', '2023-08-11 08:03:02'),
(26, 'Keripik Nangka 100g', 20000, 100, '-', 'Panda', 100, '2023-08-11 08:04:52', '2023-08-11 08:04:52'),
(27, 'Keripik Nangka 70g', 12000, 100, '-', 'Panda', 70, '2023-08-11 08:06:16', '2023-08-11 08:06:16'),
(28, 'Keripik Pisang  140g', 12000, 100, '-', 'Al Fatih', 140, '2023-08-11 08:12:23', '2023-08-12 03:44:04'),
(29, 'Keripik Pisang', 12000, 100, '-', 'Baruga Mandiri', 140, '2023-08-11 08:14:32', '2023-08-11 08:14:32'),
(30, 'Keripik Pisang Lahadeng 100g', 15000, 100, '-', 'Lahadeng Corner', 100, '2023-08-11 08:17:11', '2023-08-11 08:17:11'),
(31, 'Keripik Pisang Lahodeng 140g', 12000, 100, '-', 'Lahadeng Corner', 140, '2023-08-11 08:19:38', '2023-08-11 08:19:38'),
(32, 'Keripik Pisang Lahadeng 350g', 25000, 100, '-', 'Lahadeng Corner', 350, '2023-08-11 08:21:18', '2023-08-11 08:21:18'),
(33, 'Keripik Pisang Tanduk ', 1, 100, '-', 'UMI', 1, '2023-08-12 03:39:18', '2023-08-12 03:39:18'),
(34, 'Keripik Pisang 250g', 15000, 100, '-', 'Al-Fatih', 250, '2023-08-12 03:45:25', '2023-08-12 03:45:25'),
(35, 'Keripik Singkong', 1, 100, '-', 'Doa Ibu', 1, '2023-08-12 03:47:13', '2023-08-12 03:47:13'),
(36, 'Keripik Sukun ', 12000, 100, '-', 'UMI', 100, '2023-08-12 03:48:06', '2023-08-12 03:48:06'),
(37, 'Keripik Tempe', 1, 100, '-', 'Doa Ibu', 1, '2023-08-12 03:49:31', '2023-08-12 03:49:31'),
(38, 'Kue Jintan', 1, 100, '-', 'An-Nur', 1, '2023-08-12 03:51:17', '2023-08-12 03:51:17'),
(39, 'Lada Putih Bubuk Botol', 15000, 100, '-', 'Lada TowutiQu', 1, '2023-08-12 03:53:32', '2023-08-12 03:53:32'),
(40, 'Lada Hitam Bubuk', 15000, 100, '-', 'Lada TowutiQu', 1, '2023-08-12 03:56:04', '2023-08-12 03:56:04'),
(41, 'Lada Hitam Biji', 15000, 100, '-', 'Lada TowutiQu', 100, '2023-08-12 03:58:03', '2023-08-12 03:58:03'),
(42, 'Lulur Rempah ', 1, 100, '-', 'Mustika', 1, '2023-08-12 04:01:08', '2023-08-12 04:01:08'),
(43, 'Lurik Badda Lotong', 1, 100, '-', 'Hera Herbs', 1, '2023-08-12 04:14:32', '2023-08-12 04:14:32'),
(44, 'Makaroni Goreng', 1, 100, '-', 'Upiek', 1, '2023-08-12 04:42:22', '2023-08-12 04:42:22'),
(45, 'Minyak Kelapa Murni 100ml', 50000, 100, '-', 'MIKEM', 120, '2023-08-12 04:46:49', '2023-08-12 04:46:49'),
(46, 'Kue Sus', 1, 100, '-', 'Queen sus', 1, '2023-08-12 04:48:48', '2023-08-12 04:48:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_kategoris`
--

CREATE TABLE `barang_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_kategoris`
--

INSERT INTO `barang_kategoris` (`id`, `barang_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(5, 3, 2, NULL, NULL),
(6, 4, 2, NULL, NULL),
(7, 5, 2, NULL, NULL),
(8, 6, 2, NULL, NULL),
(9, 7, 3, NULL, NULL),
(10, 8, 3, NULL, NULL),
(11, 9, 3, NULL, NULL),
(12, 10, 3, NULL, NULL),
(13, 11, 2, NULL, NULL),
(14, 12, 2, NULL, NULL),
(15, 13, 7, NULL, NULL),
(16, 13, 2, NULL, NULL),
(17, 14, 3, NULL, NULL),
(18, 15, 2, NULL, NULL),
(19, 16, 2, NULL, NULL),
(20, 17, 2, NULL, NULL),
(21, 18, 3, NULL, NULL),
(22, 19, 3, NULL, NULL),
(23, 20, 3, NULL, NULL),
(24, 21, 2, NULL, NULL),
(25, 22, 2, NULL, NULL),
(26, 23, 2, NULL, NULL),
(27, 24, 2, NULL, NULL),
(28, 25, 2, NULL, NULL),
(29, 26, 2, NULL, NULL),
(30, 27, 2, NULL, NULL),
(31, 28, 2, NULL, NULL),
(32, 29, 2, NULL, NULL),
(33, 30, 2, NULL, NULL),
(34, 31, 2, NULL, NULL),
(35, 32, 2, NULL, NULL),
(36, 33, 2, NULL, NULL),
(37, 34, 2, NULL, NULL),
(38, 35, 2, NULL, NULL),
(39, 36, 2, NULL, NULL),
(40, 37, 2, NULL, NULL),
(41, 38, 2, NULL, NULL),
(42, 39, 7, NULL, NULL),
(43, 40, 7, NULL, NULL),
(44, 41, 7, NULL, NULL),
(45, 42, 8, NULL, NULL),
(46, 43, 8, NULL, NULL),
(47, 44, 2, NULL, NULL),
(48, 45, 7, NULL, NULL),
(49, 45, 8, NULL, NULL),
(50, 46, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `jumlah_berat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id`, `pesanan_id`, `barang_id`, `jumlah_barang`, `jumlah_harga`, `jumlah_berat`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 24000, 200, '2023-08-11 08:32:21', '2023-08-11 08:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar__barangs`
--

CREATE TABLE `gambar__barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gambar__barangs`
--

INSERT INTO `gambar__barangs` (`id`, `barang_id`, `gambar_barang`, `created_at`, `updated_at`) VALUES
(10, 3, '5DIDrZ1bHua9RuJYBPEsrtCHA5ezFU-metaRFNDMDkyMjUuSlBH-.jpg', '2023-08-11 05:35:35', '2023-08-11 05:35:35'),
(11, 3, '4TV5Y3dYQfbqx6p0rLarRoJK32PBuf-metaRFNDMDkxNTYuSlBH-.jpg', '2023-08-11 05:35:35', '2023-08-11 05:35:35'),
(12, 4, 'ZnZ3nIu9Z3vJP7C7ddVPcSwgD5kaF3-metaRFNDMDkyMjUuSlBH-.jpg', '2023-08-11 05:40:48', '2023-08-11 05:40:48'),
(13, 4, '9LxxmeATkU4MnZbFOQuVILnpxbIKRn-metaRFNDMDkxNTUuSlBH-.jpg', '2023-08-11 05:40:48', '2023-08-11 05:40:48'),
(14, 5, 'pAUyrYnu4j3q2WlOsBITuLK3fp6U6u-metaRFNDMDkyMjUuSlBH-.jpg', '2023-08-11 05:42:00', '2023-08-11 05:42:00'),
(15, 5, 'WkItmyOzPyctXMzIJmMps5PNDWfsRu-metaRFNDMDkxNTUuSlBH-.jpg', '2023-08-11 05:42:00', '2023-08-11 05:42:00'),
(16, 6, 'm6o5WjWT7YkF4U6s54dmoeINMsXxOG-metaa2VyaXBpayBzdWt1biB1bWkuSlBH-.jpg', '2023-08-11 06:29:42', '2023-08-11 06:29:42'),
(17, 7, 'BjykfkmlPXoHGkjLQpKFLmX6WHFEyR-metaamFoZSBtZXJhaCBwZXRpYW5kbyBtZXdhbnRhICgzKS5KUEc=-.jpg', '2023-08-11 06:32:53', '2023-08-11 06:32:53'),
(18, 7, 'vK6lcSmUjKIw3JMUaSCc3GepHyViSg-metaamFoZSBtZXJhaCBwZXRpYW5kbyBtZXdhbnRhICgxKS5KUEc=-.jpg', '2023-08-11 06:32:53', '2023-08-11 06:32:53'),
(19, 7, 'YCFkOfKaX4PnLRi7AlhGNzr17jhXQ3-metaamFoZSBtZXJhaCBwZXRpYW5kbyBtZXdhbnRhICgyKS5KUEc=-.jpg', '2023-08-11 06:32:53', '2023-08-11 06:32:53'),
(20, 8, '3kKeTKmGnt7BHNHfBIFCIUW3fUb12n-metaamFoZSBtZXJhaCBwZXRpYW5kbyBtZXdhbnRhICgzKS5KUEc=-.jpg', '2023-08-11 06:34:02', '2023-08-11 06:34:02'),
(21, 8, 'BWUwQ5TrrdiQzmWkWNA2BjI831coQH-metaamFoZSBtZXJhaCBwZXRpYW5kbyBtZXdhbnRhICgxKS5KUEc=-.jpg', '2023-08-11 06:34:02', '2023-08-11 06:34:02'),
(22, 8, '8Xt8MvRyekxjvvQeRL8Fx9Xsvs2lJX-metaamFoZSBtZXJhaCBwZXRpYW5kbyBtZXdhbnRhICgyKS5KUEc=-.jpg', '2023-08-11 06:34:02', '2023-08-11 06:34:02'),
(23, 9, '2tFNj4B8KjXA8OcIotiQnqbJJML2WH-metaamFoZSBtZXJhaCBndWxhIGFyZW4gKDIpLkpQRw==-.jpg', '2023-08-11 06:37:22', '2023-08-11 06:37:22'),
(24, 9, '3nSd34QUEtfKzDwfGNhrhk6usy6zev-metaamFoZSBtZXJhaCBndWxhIGFyZW4gKDEpLkpQRw==-.jpg', '2023-08-11 06:37:22', '2023-08-11 06:37:22'),
(25, 10, 'SXykjfVLs889Oe4pwCFKHg3RmiGNfY-metaQXJhYmlrYSB0ZXJhcyBrb3BpICgxKS5KUEc=-.jpg', '2023-08-11 06:39:13', '2023-08-11 06:39:13'),
(26, 10, 'uulWjH5IVGjCHiM4VBmLyv5wVNfo1M-metaQXJhYmlrYSB0ZXJhcyBrb3BpICgyKS5KUEc=-.jpg', '2023-08-11 06:39:13', '2023-08-11 06:39:13'),
(27, 10, 'mlb08PwKGxlyV9B9FOdWyS7TwZOqLS-metaQXJhYmlrYSB0ZXJhcyBrb3BpICgzKS5KUEc=-.jpg', '2023-08-11 06:39:13', '2023-08-11 06:39:13'),
(28, 11, 'V5ZfLXrO6AsSKOWuvfFD4cQ07zyun3-metaYWJvbiBpa2FuIGJhbmRlbmcgbWFsaWxpIHJpdmVyLkpQRw==-.jpg', '2023-08-11 06:42:26', '2023-08-11 06:42:26'),
(29, 12, 'BwBXm4rTPborxr4r9qaoabVMh7mC6w-metaYmFnZWEga2Vsb3IgKDIpLkpQRw==-.jpg', '2023-08-11 06:44:31', '2023-08-11 06:44:31'),
(30, 12, 'T6z2sVRsfQPXxryNi9DEsyoIgFLZtn-metaYmFnZWEga2Vsb3IgKDEpLkpQRw==-.jpg', '2023-08-11 06:44:31', '2023-08-11 06:44:31'),
(31, 12, 'TOT27BPPntnjcAIxAH5bJp6bQMwrXb-metaYmFnZWEga2Vsb3IgKDMpLkpQRw==-.jpg', '2023-08-11 06:44:31', '2023-08-11 06:44:31'),
(32, 13, 'LoePu3XDAsJkm8srQrsUe5PDIR7FVs-metaYmF3YW5nIGdvcmVuZyBkdXJpIG1hcyBkYWVuZyAoMSkuSlBH-.jpg', '2023-08-11 07:33:14', '2023-08-11 07:33:14'),
(33, 13, 'KCMV7eL0luugnBsNjTjAeDRsDqE7zU-metaYmF3YW5nIGdvcmVuZyBkdXJpIG1hcyBkYWVuZyAoMikuSlBH-.jpg', '2023-08-11 07:33:14', '2023-08-11 07:33:14'),
(34, 14, 'nN4zJ4LtfuSHKyDhYU2k1iu24UihMW-metaYnVuZ2EgdGVsYW5nLkpQRw==-.jpg', '2023-08-11 07:35:15', '2023-08-11 07:35:15'),
(35, 15, 'g75dgKRoTe22TnE12d2XFEP2fj3JVy-metaY3JlcHMgbGlub3BpICgxKS5KUEc=-.jpg', '2023-08-11 07:39:59', '2023-08-11 07:39:59'),
(36, 15, 'TRmHqzr9Kll4OhngsP1TUpUCoaic5z-metaY3JlcHMgbGlub3BpICgzKS5KUEc=-.jpg', '2023-08-11 07:39:59', '2023-08-11 07:39:59'),
(37, 15, 'WsrIsfaFuwyfb4AM3Nm5ulmMUnFqtJ-metaY3JlcHMgbGlub3BpICgyKS5KUEc=-.jpg', '2023-08-11 07:39:59', '2023-08-11 07:39:59'),
(38, 16, 'nzUc5MwrQc3dqD9Sf8JGLmcDt8K0B4-metaY3Jpc3B5IFBhbmdraWxhbmcgKDEpLkpQRw==-.jpg', '2023-08-11 07:42:15', '2023-08-11 07:42:15'),
(39, 16, 'hV4w48PpXGdRT2UoLda83ZkpdiONCb-metaY3Jpc3B5IFBhbmdraWxhbmcgKDIpLkpQRw==-.jpg', '2023-08-11 07:42:15', '2023-08-11 07:42:15'),
(40, 17, 'nU3WHBlbMPiOArVbV76BBTCQPYndt5-metaY3Jpc3B5IFBhbmdraWxhbmcgKDEpLkpQRw==-.jpg', '2023-08-11 07:43:17', '2023-08-11 07:43:17'),
(41, 17, '3hMz1TZWatCiSj1PqRhpOV5PU4RL2X-metaY3Jpc3B5IFBhbmdraWxhbmcgKDIpLkpQRw==-.jpg', '2023-08-11 07:43:17', '2023-08-11 07:43:17'),
(42, 18, 'I9Jit8I7cVsXZii61iAmYoAH4RbWPH-metaamFoZSBtZXJhaCBrcmltZXIgcGV0aWFuZG8gKDEpLkpQRw==-.jpg', '2023-08-11 07:46:00', '2023-08-11 07:46:00'),
(43, 18, 'S5MAnf3SgSlLD7FJicyI7KmEwsyZ8w-metaamFoZSBtZXJhaCBrcmltZXIgcGV0aWFuZG8gKDIpLkpQRw==-.jpg', '2023-08-11 07:46:00', '2023-08-11 07:46:00'),
(44, 19, 'tdGuffKkJcPD1a8qcBOleCFbUk8kEJ-metaamFoZSBtZXJhaCBrcmltZXIgcGV0aWFuZG8gKDEpLkpQRw==-.jpg', '2023-08-11 07:47:08', '2023-08-11 07:47:08'),
(45, 19, 'Ls4iNyjuOsl9oAuwaXYJMKCShidm2J-metaamFoZSBtZXJhaCBrcmltZXIgcGV0aWFuZG8gKDIpLkpQRw==-.jpg', '2023-08-11 07:47:08', '2023-08-11 07:47:08'),
(46, 20, '4RsR0BnWyvqFy0HrXdJdiTxteGZmwW-metaamFtdWt1IGluc3RhbiBoZXJiYWwgbWFuZGlyaSB3YXN1cG9uZGEuSlBH-.jpg', '2023-08-11 07:49:29', '2023-08-11 07:49:29'),
(47, 21, 'WVBMAi0JPhVEk8lztFrK8D6lqkt1kV-metaa2FjYW5nIGJhd2FuZyBoYWJpYmllICgxKS5KUEc=-.jpg', '2023-08-11 07:51:41', '2023-08-11 07:51:41'),
(48, 21, 'ExdTCz1MOMFVd4kuEaM25tT9wf7pWE-metaa2FjYW5nIGJhd2FuZyBoYWJpYmllICgyKS5KUEc=-.jpg', '2023-08-11 07:52:20', '2023-08-11 07:52:20'),
(49, 21, 'a1zWg5Coo0QMMKFPpMYnG7xiTjz7Mc-metaa2FjYW5nIGJhd2FuZyBoYWJpYmllICgzKS5KUEc=-.jpg', '2023-08-11 07:52:20', '2023-08-11 07:52:20'),
(50, 22, 'jKEl5R9XUpd3RYqYR2aB0b6VUnDk6V-metaa2FjYW5nIHNlbWJ1bnlpIGFtYXppbmcgcHJvZHVjdGlvbi5KUEc=-.jpg', '2023-08-11 07:58:27', '2023-08-11 07:58:27'),
(51, 23, 'fikuNbcbXh8o4ZXMulEIXsGu9KYktN-metaa2FjYW5nIHNlbWJ1bnlpIGFuIG51ciB0b3d1dGkuSlBH-.jpg', '2023-08-11 08:00:33', '2023-08-11 08:00:33'),
(52, 24, 'Q7pO4CWSvkerExXitRtUFHDloLo3ry-metaa2FjYW5nIHNlbWJ1bnlpIGFuIG51ciB0b3d1dGkuSlBH-.jpg', '2023-08-11 08:01:42', '2023-08-11 08:01:42'),
(53, 25, 'r8noK8eDHjPI8eu0f7J5fsqlJ5t9eK-metaa2FjYW5nIHNlbWJ1bnlpIGFuIG51ciB0b3d1dGkuSlBH-.jpg', '2023-08-11 08:03:02', '2023-08-11 08:03:02'),
(54, 26, 'x6m60CfLUWapfFtnaGKn3RKQNsOTj0-metaa2VyaXBpayBuYW5na2EgKDEpLkpQRw==-.jpg', '2023-08-11 08:04:52', '2023-08-11 08:04:52'),
(55, 26, 'uV1J4Db1ushKiMOidVd5KaGNEEW8YW-metaa2VyaXBpayBuYW5na2EgKDIpLkpQRw==-.jpg', '2023-08-11 08:04:52', '2023-08-11 08:04:52'),
(56, 27, 'jyqtbpmAxv47ytlMcpppAY81afJuHL-metaa2VyaXBpayBuYW5na2EgKDEpLkpQRw==-.jpg', '2023-08-11 08:06:16', '2023-08-11 08:06:16'),
(57, 27, 'z68BC61tTFoVDBhXP9fqCtxV7EeZWG-metaa2VyaXBpayBuYW5na2EgKDIpLkpQRw==-.jpg', '2023-08-11 08:06:16', '2023-08-11 08:06:16'),
(58, 28, 'ZYkhZiaIjZaW2drOLyJzNyYtjOb1VS-metaa2VyaXBpayBwaXNhbmcgYWwgZmF0aWguSlBH-.jpg', '2023-08-11 08:12:23', '2023-08-11 08:12:23'),
(59, 29, '2Xz06R8xrNZHyGO5SAhpiIof4J2AD7-metaa2VyaXBpayBwaXNhbmcgYmFydWdhIG1hbmRpcmkuSlBH-.jpg', '2023-08-11 08:14:32', '2023-08-11 08:14:32'),
(60, 30, 'qFHA6oCI9ta1rkQw2mXlEOBOYsgmU4-metaa2VyaXBpayBwaXNhbmcgbGFoYWRlbmcgY29ybmVyIG1hbGlsaS5KUEc=-.jpg', '2023-08-11 08:17:11', '2023-08-11 08:17:11'),
(61, 31, '7troRCkOobG3NirPuFHyGA5zpVOMFr-metaa2VyaXBpayBwaXNhbmcgbGFoYWRlbmcgY29ybmVyIG1hbGlsaS5KUEc=-.jpg', '2023-08-11 08:19:38', '2023-08-11 08:19:38'),
(62, 32, 'utKmmztagqRJc9FOEeki3JUp0LR2r7-metaa2VyaXBpayBwaXNhbmcgbGFoYWRlbmcgY29ybmVyIG1hbGlsaS5KUEc=-.jpg', '2023-08-11 08:21:18', '2023-08-11 08:21:18'),
(63, 33, '7Y06WvCYJh7pAdYqP0OxjwOOp4JSLa-metaa2VyaXBpayBwaXNhbmcgdGFuZHVrIHVtaSAoMSkuSlBH-.jpg', '2023-08-12 03:39:18', '2023-08-12 03:39:18'),
(64, 33, 'wqXTIqpEcl4JaLgMokroqyAVPwInLB-metaa2VyaXBpayBwaXNhbmcgdGFuZHVrIHVtaSAoMikuSlBH-.jpg', '2023-08-12 03:39:18', '2023-08-12 03:39:18'),
(65, 34, 'tx7mvHnyYe97J7Jxo181OasoPT4Zow-metaa2VyaXBpayBwaXNhbmcgYWwgZmF0aWguSlBH-.jpg', '2023-08-12 03:45:25', '2023-08-12 03:45:25'),
(66, 35, 'mFZor4Q8qyRz1qUOTOpGkpDJ2ZMYE9-metaa2VyaXBpayBzaW5na29uZyBkb2EgaWJ1LkpQRw==-.jpg', '2023-08-12 03:47:13', '2023-08-12 03:47:13'),
(67, 36, 's7wLkjupeFEBA3JSDltL6kSCk40fT9-metaa2VyaXBpayBzdWt1biB1bWkuSlBH-.jpg', '2023-08-12 03:48:06', '2023-08-12 03:48:06'),
(68, 37, 'z04WGWepWnoPfpFKCOK1Xt81FZRFpa-metaa2VyaXBpayB0ZW1wZSBkb2EgaWJ1LkpQRw==-.jpg', '2023-08-12 03:49:31', '2023-08-12 03:49:31'),
(69, 38, '2WwtGRXc6apEAJRk62VmBsl22p15LT-metaa3VlIGppbnRhbiBhbi1udXIuSlBH-.jpg', '2023-08-12 03:51:17', '2023-08-12 03:51:17'),
(70, 39, 'UFjRHwShLBX1xblEfMiFOjJZ6mz0F2-metabGFkYSBidWJ1ayBsYWRhIHRvd3V0aVF1ICgxKS5KUEc=-.jpg', '2023-08-12 03:53:32', '2023-08-12 03:53:32'),
(71, 39, 'nEMPOS5JxU8qMhoG7EpjJVlpwNaQSM-metabGFkYSBidWJ1ayBsYWRhIHRvd3V0aVF1ICgyKS5KUEc=-.jpg', '2023-08-12 03:53:32', '2023-08-12 03:53:32'),
(72, 40, 'eleE01XbErMEUrTNQhIbcVUJSsA1CC-metabGFkYSBidWJ1ayBsYWRhIHRvd3V0aVF1ICgxKS5KUEc=-.jpg', '2023-08-12 03:56:04', '2023-08-12 03:56:04'),
(73, 40, 'XUPRb4Y0Do6HIjUgDCAyhtYV3SRlP7-metabGFkYSBidWJ1ayBsYWRhIHRvd3V0aVF1ICgyKS5KUEc=-.jpg', '2023-08-12 03:56:04', '2023-08-12 03:56:04'),
(74, 41, 'enkyb34YaGE6RJY9McFFqXA114Cbfb-metabGFkYSBoaXRhbSBsYWRhIHRvd3V0aXEgKDEpLkpQRw==-.jpg', '2023-08-12 03:58:03', '2023-08-12 03:58:03'),
(75, 41, 'GsQCmyxrEik0zzhOKi4GS9emMMXTCe-metabGFkYSB0b3d1dGlxdSBsYWRhIGhpdGFtLkpQRw==-.jpg', '2023-08-12 03:58:03', '2023-08-12 03:58:03'),
(76, 41, 'DFwUAe9vrGXOTbCmL5t6WHoYG5fN9d-metabGFkYSBoaXRhbSBsYWRhIHRvd3V0aXEgKDIpLkpQRw==-.jpg', '2023-08-12 03:58:03', '2023-08-12 03:58:03'),
(77, 42, '0N6ctUfVESuY4yGqzFMkl8MA1FYjXb-metabHVsdXIgcmVtcGFoIG11c3Rpa2EgKDQpLkpQRw==-.jpg', '2023-08-12 04:01:08', '2023-08-12 04:01:08'),
(78, 42, 'fACMRv7Tf7ZtBaFmDGHlxwzO79gpJr-metabHVsdXIgcmVtcGFoIG11c3Rpa2EgKDMpLkpQRw==-.jpg', '2023-08-12 04:01:08', '2023-08-12 04:01:08'),
(79, 43, 'c9R2N4ikQFiAVbYVSQ810ZZqlRW1bw-metabHVyaWsgYmVkZGEgbG90b25nICgyKS5KUEc=-.jpg', '2023-08-12 04:14:32', '2023-08-12 04:14:32'),
(80, 43, 'S9WPpYG05n8YOaSxBoALhFnN0kvK54-metabHVyaWsgYmVkZGEgbG90b25nICgxKS5KUEc=-.jpg', '2023-08-12 04:14:32', '2023-08-12 04:14:32'),
(81, 44, 'ImiT3V9cwbCRyaGUXg28FyZxGEYIlS-metabWFrYXJvbmkgZ29yZW5nIHVwaWVrLkpQRw==-.jpg', '2023-08-12 04:42:22', '2023-08-12 04:42:22'),
(82, 45, 'tEiwG6xHYYFv8r8J02xM3dRgLHNueN-metabWlrZW0gbWlueWFrIGtlbGFwYSBtdXJuaSAoMSkuSlBH-.jpg', '2023-08-12 04:46:49', '2023-08-12 04:46:49'),
(83, 45, 'd7cMGSoqZDgXs8VKiNAWEiGLbQPomy-metabWlrZW0gbWlueWFrIGtlbGFwYSBtdXJuaSAoMikuSlBH-.jpg', '2023-08-12 04:46:49', '2023-08-12 04:46:49'),
(84, 45, 'yW5qAagtT8W3nYZ14jds64VD9KHOfS-metabWlrZW0gbWlueWFrIGtlbGFwYSBtdXJuaSAoMykuSlBH-.jpg', '2023-08-12 04:46:49', '2023-08-12 04:46:49'),
(85, 46, 'fsHpVm6tkiWZE2GlfgCwX0VbvG3ufn-metacXVlZW4gc3VzLkpQRw==-.jpg', '2023-08-12 04:48:48', '2023-08-12 04:48:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Promosi', '2023-08-10 06:13:57', '2023-08-10 06:13:57'),
(2, 'Makanan', '2023-08-10 06:14:06', '2023-08-10 06:14:06'),
(3, 'Minuman', '2023-08-10 06:14:10', '2023-08-10 06:14:10'),
(4, 'Kerajinan', '2023-08-10 06:14:16', '2023-08-10 06:14:16'),
(5, 'Beras Organik', '2023-08-10 06:14:21', '2023-08-10 06:14:21'),
(6, 'Fashion', '2023-08-10 06:14:45', '2023-08-10 06:14:45'),
(7, 'Bumbu Dapur', '2023-08-11 07:30:09', '2023-08-11 07:30:09'),
(8, 'Kosmetik', '2023-08-12 03:59:41', '2023-08-12 03:59:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_kamis`
--

CREATE TABLE `kontak_kamis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontak_kamis`
--

INSERT INTO `kontak_kamis` (`id`, `nama`, `email`, `nomor_hp`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'firman firman', 'firmanmkc41@gmail.com', '085342677431', 'sangat bagus', '2023-08-10 22:44:18', '2023-08-10 22:44:18'),
(2, 'firman Firman', 'firmanmkc41@gmail.com', '085342677431', 'yayaya', '2023-08-10 23:06:28', '2023-08-10 23:06:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_20_062157_create_barangs_table', 1),
(7, '2023_07_20_115159_create_kategoris_table', 1),
(8, '2023_07_20_115600_create_barang__kategoris_table', 1),
(9, '2023_07_21_105429_create_gambar__barangs_table', 1),
(10, '2023_07_23_063528_create_pesanans_table', 1),
(11, '2023_08_02_090811_create_alamats_table', 1),
(12, '2023_08_03_154710_create_pembayarans_table', 1),
(13, '2023_07_20_062627_create_detail_pesanans_table', 2),
(14, '2023_08_11_063432_create_kontak_kamis_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `jumlah_berat` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `tanggal`, `jumlah_harga`, `jumlah_berat`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-11', 24000, 200, 0, '2023-08-11 08:32:21', '2023-08-11 08:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_hp` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nomor_hp`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Firman', 'firmanmkc41@gmail.com', NULL, '$2y$10$y/BPHPZrP.fFZSo.sI/mFebZyxowFS0T0Coq/EwtXuyO8Y/eg387y', NULL, NULL, 'admin', 'nBlQYUVLYgYr1B8kxT7UNgshdHsiGPYyMLq52zw81Oy0SoPtZdv5sWFMZ9pU', '2023-08-10 06:11:25', '2023-08-10 06:11:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamats_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_kategoris`
--
ALTER TABLE `barang_kategoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_kategoris_barang_id_foreign` (`barang_id`),
  ADD KEY `barang_kategoris_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanans_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanans_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gambar__barangs`
--
ALTER TABLE `gambar__barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambar__barangs_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak_kamis`
--
ALTER TABLE `kontak_kamis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_user_id_foreign` (`user_id`),
  ADD KEY `pembayarans_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `barang_kategoris`
--
ALTER TABLE `barang_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gambar__barangs`
--
ALTER TABLE `gambar__barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kontak_kamis`
--
ALTER TABLE `kontak_kamis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD CONSTRAINT `alamats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_kategoris`
--
ALTER TABLE `barang_kategoris`
  ADD CONSTRAINT `barang_kategoris_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_kategoris_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gambar__barangs`
--
ALTER TABLE `gambar__barangs`
  ADD CONSTRAINT `gambar__barangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
