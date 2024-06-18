-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 04:43 AM
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
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `ID_AKUN` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `HAK_AKSES` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_AKUN`, `USERNAME`, `PASSWORD`, `HAK_AKSES`) VALUES
(1, 'adm', '12345678', 'admin'),
(2, 'dsn', '12345678', 'dosen'),
(3, 'mhs', '12345678', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `ID_MATERI` int(11) NOT NULL,
  `NAMA_MATERI` varchar(200) DEFAULT NULL,
  `ISI_MATERI` varchar(200) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`ID_MATERI`, `NAMA_MATERI`, `ISI_MATERI`, `foto`) VALUES
(1, 'JARINGAN DASAR KOMPUTER', 'materi1.pdf', '1718426212_foto.jpg'),
(2, 'KONSEP DASAR JARINGAN KOMPUTER', 'materi2.pdf', '1718426473_foto.jpg'),
(3, 'Pengantar Jaringan Komputer dan Internet', 'materi3.pdf', '1718426584_foto.jpg'),
(4, 'Pengantar Jaringan Komputer: Konsep Dasar dan Implementasi', 'materi4.pdf', '1718427095_foto.jpg'),
(5, 'JARINGAN KOMPUTER', 'materi5.pdf', '1718427244_foto.jpg'),
(10, 'percobaan 1', '1718677229.pdf', '1718677229_foto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `ID_QUIZ` int(11) NOT NULL,
  `ID_MATERI` int(11) DEFAULT NULL,
  `PERTANYAAN` varchar(255) DEFAULT NULL,
  `JAWABANA` varchar(255) DEFAULT NULL,
  `JAWABANB` varchar(255) DEFAULT NULL,
  `JAWABANC` varchar(255) DEFAULT NULL,
  `JAWABAN_BENAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`ID_QUIZ`, `ID_MATERI`, `PERTANYAAN`, `JAWABANA`, `JAWABANB`, `JAWABANC`, `JAWABAN_BENAR`) VALUES
(1, 1, 'Apa yang dimaksud dengan topologi jaringan \"star\"?', 'Semua perangkat terhubung dalam lingkaran', 'Setiap perangkat terhubung tanpa titik pusat', 'Setiap perangkat terhubung secara berurutan', 'Setiap perangkat terhubung ke satu titik pusat'),
(2, 1, 'Berapa jumlah maksimum host yang dapat diakomodasi dalam subnet dengan subnet mask 255.255.255.224?', '16', '30', '126', '62'),
(3, 1, 'Apa perbedaan utama antara protokol UDP dan TCP?', 'UDP merupakan protokol koneksi yang handal, sedangkan TCP tidak', 'TCP menjamin pengiriman data tanpa kesalahan, sedangkan UDP tidak', 'TCP digunakan untuk aplikasi real-time, sedangkan UDP untuk aplikasi yang tidak sensitif waktu', 'UDP tidak memiliki mekanisme deteksi kesalahan, sedangkan TCP memiliki'),
(4, 1, 'Apa fungsi dari layer data link dalam model OSI?', 'Melakukan segmentasi pada layer atasnya', 'Menentukan pola header pada data1', 'Mengirimkan segmen dari satu host ke host lainnya', 'Pemilihan media fisik dan addressing'),
(5, 1, 'Apa media transmisi yang umum digunakan dalam jaringan komputer?', 'Kabel HDMI', 'Kabel USB', 'Kabel VGA', 'Kabel coaxial'),
(6, 2, 'Apa singkatan dari LAN dalam jaringan komputer?', 'WAN', 'MAN', 'PAN', 'LAN'),
(7, 2, 'Protokol yang digunakan untuk mengidentifikasi alamat unik setiap perangkat dalam jaringan IP adalah?', 'HTTP', 'IPX', 'TCP', 'IP'),
(8, 2, 'Apa fungsi dari DNS dalam jaringan komputer?', 'Mengenkripsi data', 'Mengatur lalu lintas jaringan', 'Mengelola keamanan jaringan', 'Mengonversi nama domain ke alamat IP'),
(9, 2, 'Berikut adalah langkah-langkah konfigurasi dasar pada Windows 7, kecuali:', 'Konfigurasi IP', 'Memberi Nama Komputer', 'Mengecek Nama Komputer', 'Mengatur Firewall'),
(10, 2, 'Apa yang membedakan antara LAN, MAN, dan WAN dalam jarak geografis?', 'Teknologi kabel yang digunakan', 'Kecepatan transfer data', 'Jumlah perangkat yang terhubung', 'Jarak cakupan area'),
(11, 3, 'Apa yang dimaksud dengan topologi jaringan star?', 'Setiap komputer terhubung satu sama lain dalam lingkaran', 'Setiap komputer terhubung secara acak', 'Tidak ada koneksi antar komputer', 'Semua komputer terhubung ke satu titik pusat'),
(12, 3, 'Protokol yang digunakan untuk mengirim email adalah?', 'HTTP', 'FTP', 'DHCP', 'SMTP'),
(13, 3, 'Manakah perangkat yang berfungsi sebagai penghubung antara jaringan lokal dengan jaringan luas (internet)?', 'Modem', 'Switch', 'Hub', 'Router'),
(14, 3, 'Berikut ini yang bukan termasuk jenis kabel yang digunakan dalam jaringan komputer adalah?', 'Coaxial', 'Fiber optic', 'UTP', 'HDMI'),
(15, 3, 'Apa yang dimaksud dengan IP address?', 'Alamat fisik perangkat keras', 'Alamat email pengguna', 'Alamat rumah pengguna', 'Alamat logis perangkat'),
(16, 4, 'Apa yang dimaksud dengan jaringan komputer?', 'Program yang mengendalikan perangkat keras.', 'Sebuah sistem yang mengatur lalu lintas internet.', 'Sebuah komputer yang menghubungkan beberapa printer.', 'Sekelompok komputer otonom yang saling berhubungan menggunakan protokol komunikasi.'),
(17, 4, 'Apa tujuan utama dibangunnya jaringan komputer?', 'Menghubungkan komputer di dalam satu ruangan.', 'Mengurangi biaya pembelian perangkat keras.', 'Mengatur penggunaan perangkat lunak.', 'Membawa informasi secara tepat dan tanpa kesalahan dari pengirim ke penerima.'),
(18, 4, 'Jenis jaringan komputer manakah yang mencakup area sebuah kota?', 'Local Area Network (LAN)', 'Personal Area Network (PAN)', 'Wide Area Network (WAN)', 'Metropolitan Area Network (MAN)'),
(19, 4, 'Apa manfaat dari topologi jaringan bintang?', 'Data dapat bergerak dalam dua arah pada saat bersamaan.', 'Semua simpul memiliki kedudukan yang sama.', 'Mencegah ketergantungan pada komputer pusat.', 'Pengaturan sumber daya terpusat sehingga mudah untuk dikontrol.'),
(20, 4, 'Media transmisi mana yang menggunakan cahaya untuk mengirim data?', 'Kabel twisted pair', 'Kabel koaksial', 'Gelombang mikro', 'Fiber optic'),
(21, 5, 'Apa yang dimaksud dengan routing?', 'Proses konfigurasi IP secara otomatis.', 'Pengaturan alamat MAC pada jaringan lokal.', 'Metode pengiriman data melalui satelit.', 'Proses penentuan rute dari satu jaringan ke jaringan lain.'),
(22, 5, 'Apa yang membedakan routing statik dari routing dinamis?', 'Routing statik memerlukan update otomatis.', 'Routing dinamis memerlukan tabel statis.', 'Routing dinamis tidak menggunakan protokol apapun.', 'Routing statik konfigurasinya dilakukan secara manual.'),
(23, 5, 'Apa yang dimaksud dengan routing default?', 'Routing yang digunakan untuk jaringan dengan banyak jalur keluar.', 'Routing yang tidak memerlukan tabel routing.', 'Routing yang memerlukan update manual oleh administrator.', 'Routing yang hanya digunakan pada network stub.'),
(24, 5, 'Protokol routing manakah yang termasuk dalam kategori Interior Gateway Protocol (IGP) dengan kemampuan Link-State?', 'RIPv1', 'EIGRP', 'BGP', 'OSPF'),
(25, 5, 'Dalam OSPF, apa fungsi dari Designated Router (DR)?', 'Menjadi jalur utama untuk semua data yang masuk.', 'Menghitung jarak hop untuk setiap paket.', 'Mengatur jalur keluar dari network stub.', 'Mengatur pengiriman informasi multicast dalam jaringan multiaccess.'),
(41, 10, '23', 'w', 'w', 'w', 'w'),
(42, 10, '1w213', 'we', 'w', 'w', 'w'),
(43, 10, '22', 'w', 'w', 'w', 'w'),
(44, 10, 'e', 'q', 'q', 'w', 'w'),
(45, 10, '23', 'w', 'w', 'w', 'w');

-- --------------------------------------------------------

--
-- Table structure for table `skor`
--

CREATE TABLE `skor` (
  `ID_SKOR` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_MATERI` int(11) DEFAULT NULL,
  `SKOR` decimal(3,0) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('admin','user','dosen') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$1rvINvkM1Cz8ioJGDoyj4uqyWznHLXLuv8xlYY9sizxMXSStT.ODW', '', '2024-06-13 03:14:43', '2024-06-13 03:14:43', 'admin'),
(4, 'huda', 'huda@gmail.com', NULL, '$2y$12$wpIIziarIClm8QqbSPTR4e88pVmN84UxT6X4ReEJddlwaF3OgYnHi', NULL, NULL, NULL, 'user'),
(5, 'dosen', 'dosen@gmail.com', NULL, '$2y$12$J7VQF1GyCv9EYDNV18gfKOvrfIv5KURBkqHQFrU9Zjcd38MN027dq', NULL, NULL, NULL, 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_AKUN`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`ID_MATERI`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`ID_QUIZ`),
  ADD KEY `FK_MENGERJAKAN` (`ID_MATERI`);

--
-- Indexes for table `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`ID_SKOR`),
  ADD KEY `FK_MENCATAT` (`ID_USER`),
  ADD KEY `FK_MENDAPATKAN` (`ID_MATERI`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `ID_MATERI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `ID_QUIZ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `skor`
--
ALTER TABLE `skor`
  MODIFY `ID_SKOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `FK_MENGERJAKAN` FOREIGN KEY (`ID_MATERI`) REFERENCES `materi` (`ID_MATERI`);

--
-- Constraints for table `skor`
--
ALTER TABLE `skor`
  ADD CONSTRAINT `FK_MENCATAT` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_MENDAPATKAN` FOREIGN KEY (`ID_MATERI`) REFERENCES `materi` (`ID_MATERI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
