-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Mar 2021 pada 09.44
-- Versi server: 8.0.23-0ubuntu0.20.04.1
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','owner','manager','hrd','supervisor','staff') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_auth` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `email`, `password`, `level`, `status_auth`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$6NWq8BqgRWlXojcMftlBveKPOv7bo2IIhiIZpcDEAZDfGjIkoRa3m', 'admin', 1, '2021-02-23 06:34:28'),
(2, 'owner@gmail.com', '$2y$10$6NWq8BqgRWlXojcMftlBveKPOv7bo2IIhiIZpcDEAZDfGjIkoRa3m', 'owner', 1, '2021-02-23 06:47:28'),
(3, 'manager@gmail.com', '$2y$10$6NWq8BqgRWlXojcMftlBveKPOv7bo2IIhiIZpcDEAZDfGjIkoRa3m', 'manager', 1, '2021-02-23 06:47:28'),
(4, 'hrd@gmail.com', '$2y$10$6NWq8BqgRWlXojcMftlBveKPOv7bo2IIhiIZpcDEAZDfGjIkoRa3m', 'hrd', 1, '2021-02-23 06:47:28'),
(5, 'supervisor@gmail.com', '$2y$10$6NWq8BqgRWlXojcMftlBveKPOv7bo2IIhiIZpcDEAZDfGjIkoRa3m', 'supervisor', 1, '2021-02-23 06:47:28'),
(6, 'staff@gmail.com', '$2y$10$6NWq8BqgRWlXojcMftlBveKPOv7bo2IIhiIZpcDEAZDfGjIkoRa3m', 'staff', 1, '2021-02-23 06:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mgroup`
--

CREATE TABLE `mgroup` (
  `id_group` int NOT NULL,
  `nama_group` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mgroup`
--

INSERT INTO `mgroup` (`id_group`, `nama_group`, `created_at`) VALUES
(2, 'Staff', '2021-02-24 07:10:27'),
(3, 'Manager', '2021-02-25 07:32:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mkaryawan`
--

CREATE TABLE `mkaryawan` (
  `id_karyawan` int NOT NULL,
  `id_group` int NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `status_karyawan` varchar(50) NOT NULL,
  `atasan_langsung` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_auth` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mkaryawan`
--

INSERT INTO `mkaryawan` (`id_karyawan`, `id_group`, `nama_karyawan`, `jabatan`, `status_karyawan`, `atasan_langsung`, `id_auth`, `created_at`) VALUES
(10, 3, 'TES', 'oke', 'oke', '-', 4, '2021-02-26 03:22:17'),
(11, 3, 'Budi', 'IT', 'Tetap', '10', 6, '2021-02-26 03:26:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mkpi`
--

CREATE TABLE `mkpi` (
  `id_kpi` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `nama_kpi` varchar(100) NOT NULL,
  `bobot_target` int NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mkpi`
--

INSERT INTO `mkpi` (`id_kpi`, `id_karyawan`, `nama_kpi`, `bobot_target`, `nominal`, `created_at`) VALUES
(2, 11, 'Target KPI', 50, '1000', '2021-03-01 03:39:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indeks untuk tabel `mgroup`
--
ALTER TABLE `mgroup`
  ADD PRIMARY KEY (`id_group`);

--
-- Indeks untuk tabel `mkaryawan`
--
ALTER TABLE `mkaryawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_auth` (`id_auth`);

--
-- Indeks untuk tabel `mkpi`
--
ALTER TABLE `mkpi`
  ADD PRIMARY KEY (`id_kpi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mgroup`
--
ALTER TABLE `mgroup`
  MODIFY `id_group` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mkaryawan`
--
ALTER TABLE `mkaryawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mkpi`
--
ALTER TABLE `mkpi`
  MODIFY `id_kpi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mkaryawan`
--
ALTER TABLE `mkaryawan`
  ADD CONSTRAINT `mkaryawan_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `mgroup` (`id_group`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mkaryawan_ibfk_2` FOREIGN KEY (`id_auth`) REFERENCES `auth` (`id_auth`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mkpi`
--
ALTER TABLE `mkpi`
  ADD CONSTRAINT `mkpi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `mkaryawan` (`id_karyawan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
