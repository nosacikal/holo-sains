-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2020 pada 03.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holo-sains`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `nip`, `password`) VALUES
(1, 'nosa', 10116062, '21232f297a57a5a743894a0e4a801fc3'),
(2, 'yuniar', 10116063, '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_kelas` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_guru`, `nama_kelas`) VALUES
(1, 1, 'A'),
(2, 2, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_sub_tema` int(11) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `isi_materi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_sub_tema`, `judul_materi`, `isi_materi`, `gambar`) VALUES
(7, 1, 'Organ Gerak Kelinci', 'Salah satu organ gerak kelinci terdapat pada kakinya. Fungsi utama kaki pada kelinci adalah untuk bergerak. Kelinci bergerak dengan meloncat menggunakan kaki. Kaki belakang kelinci lebih kuat dan panjang dibandingkan dengan kaki depannya.', 'materi-200502-2bdf1a3eb0.png'),
(9, 1, 'Organ Gerak Siput', 'Kaki perut merupakan alat gerak pada siput. Fungsi utama kaki perut pada siput adalah untuk bergerak dan berpindah tempat.', 'materi-200503-f650f7c2d6.png'),
(14, 2, 'Tulang Lengan Manusia', 'Tulang lengan terdiri dari potongan-potongan yang bersamaan saat menjalankan tugasnya sebagai alat yang berfungsi dalam berbagai aktivitas manusia', 'materi-200620-6d7048ffea.png'),
(15, 2, 'Tulang Kaki Manusia', 'Kaki sebagai anggota gerak bagian bawah membantu manusia dalam berjalan, berlari, memanjat dan melakukan aktivitas lainnya.\r\n\r\nSusunan tulang kaki manusia terdiri dari:\r\n1. Tulang Paha\r\n2. Tulang Tempurung Lutut\r\n3. Tulang Betis\r\n4. Tulang Kering\r\n5. Tulang Pergelangan Kaki\r\n6. Tulang Telapak Kaki\r\n7. Tulang Jari Kaki', 'materi-200517-c358a16a10.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_evaluasi`
--

CREATE TABLE `nilai_evaluasi` (
  `id_nilai_evaluasi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_soal_evaluasi` int(11) NOT NULL,
  `jawaban` enum('benar','salah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simulasi`
--

CREATE TABLE `simulasi` (
  `id_simulasi` int(11) NOT NULL,
  `id_sub_tema` int(11) NOT NULL,
  `judul_simulasi` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `video` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simulasi`
--

INSERT INTO `simulasi` (`id_simulasi`, `id_sub_tema`, `judul_simulasi`, `keyword`, `video`) VALUES
(24, 1, 'Ciri-Ciri Hewan', 'Vertebrata', 'simulasi-200503-62b25bed4d.mp4'),
(25, 1, 'Organ Gerak Siput', 'Kaki Perut', 'simulasi-200503-2930d5a9c9.mp4'),
(27, 3, 'Penyakit Tulang pt1', 'Skoliosis', 'simulasi-200515-b60bc99452.mp4'),
(28, 3, 'Penyakit Tulang pt2', 'Lordosis', 'simulasi-200515-85ecd2c16c.mp4'),
(29, 2, 'Ciri-Ciri Otot', 'Otot Jantung', 'simulasi-200515-f6ced9a0f3.mp4'),
(30, 2, 'Tulang Lengan Manusia', 'Lima', 'simulasi-200515-17f5541f07.mp4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nis`, `nama_siswa`, `password`) VALUES
(98, 1, 10116062, 'Nosa Cikal Daputra', '$2y$10$6E6TNaFAsU1YvfueoF0TMOevaYAhrPR/jUVmSY42SQFiCThvIEObK'),
(99, 1, 10116063, 'Yuniar Khoirunnisa', '$2y$10$l5JmrE2ldTDpThzK3IzaLeELregaxWffNz2YurV2SsIiYRoyAdcUK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_evaluasi`
--

CREATE TABLE `soal_evaluasi` (
  `id_soal_evaluasi` int(11) NOT NULL,
  `id_sub_tema` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_A` varchar(100) NOT NULL,
  `pilihan_B` varchar(100) NOT NULL,
  `pilihan_C` varchar(100) NOT NULL,
  `pilihan_D` varchar(100) NOT NULL,
  `jawaban_benar` tinyint(1) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal_evaluasi`
--

INSERT INTO `soal_evaluasi` (`id_soal_evaluasi`, `id_sub_tema`, `pertanyaan`, `pilihan_A`, `pilihan_B`, `pilihan_C`, `pilihan_D`, `jawaban_benar`, `gambar`) VALUES
(8, 1, 'Organ gerak pada kelinci adalah...', 'Sayap', 'Kaki', 'Sirip', 'Perut', 2, 'soal-200619-7b755f6f20.png'),
(9, 1, 'Siput adalah susunan syaraf nya berada di perut. Siput merupakan ciri-ciri hewan...', 'Mamalia', 'Vertebrata', 'Avertebrata', 'Ternak', 3, 'soal-200619-36895eaa51.png'),
(10, 2, 'Gambar dibawah ini adalah ciri-ciri kelainan tulang, yaitu...', 'Osteoporosis', 'Skoliosis', 'Lordosis', 'Kifosis', 4, 'soal-200619-5c3624bdb8.png'),
(11, 2, 'Kelainan tulang akibat kecelakaan disebut...', 'Fraktura', 'Fisura', 'Osteoporosis', 'Lordosis', 1, 'soal-200619-43a1635106.png'),
(12, 2, 'Pada tanda panah gambar dibawah ini menunjukkan tulang...', 'Pengumpil', 'Telapak Tangan', 'Lengan Atas', 'Telapak Tangan', 3, 'soal-200620-92ac658cbb.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_tema`
--

CREATE TABLE `sub_tema` (
  `id_sub_tema` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_tema`
--

INSERT INTO `sub_tema` (`id_sub_tema`, `judul`, `banner`) VALUES
(1, 'Organ Gerak Hewan', 'image.png'),
(2, 'Manusia dan Lingkungan', 'image.png'),
(3, 'Lingkungan dan Manfaatnya', 'image.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `FK_MateriSubTema` (`id_sub_tema`);

--
-- Indeks untuk tabel `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  ADD PRIMARY KEY (`id_nilai_evaluasi`),
  ADD KEY `id_soal_evaluasi` (`id_soal_evaluasi`),
  ADD KEY `nilai_evaluasi_ibfk_1` (`id_siswa`);

--
-- Indeks untuk tabel `simulasi`
--
ALTER TABLE `simulasi`
  ADD PRIMARY KEY (`id_simulasi`),
  ADD KEY `id_sub_tema` (`id_sub_tema`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `soal_evaluasi`
--
ALTER TABLE `soal_evaluasi`
  ADD PRIMARY KEY (`id_soal_evaluasi`),
  ADD KEY `FK_SoalSubTema` (`id_sub_tema`);

--
-- Indeks untuk tabel `sub_tema`
--
ALTER TABLE `sub_tema`
  ADD PRIMARY KEY (`id_sub_tema`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  MODIFY `id_nilai_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `simulasi`
--
ALTER TABLE `simulasi`
  MODIFY `id_simulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `soal_evaluasi`
--
ALTER TABLE `soal_evaluasi`
  MODIFY `id_soal_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sub_tema`
--
ALTER TABLE `sub_tema`
  MODIFY `id_sub_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `FK_MateriSubTema` FOREIGN KEY (`id_sub_tema`) REFERENCES `sub_tema` (`id_sub_tema`);

--
-- Ketidakleluasaan untuk tabel `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  ADD CONSTRAINT `nilai_evaluasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_evaluasi_ibfk_2` FOREIGN KEY (`id_soal_evaluasi`) REFERENCES `soal_evaluasi` (`id_soal_evaluasi`);

--
-- Ketidakleluasaan untuk tabel `simulasi`
--
ALTER TABLE `simulasi`
  ADD CONSTRAINT `simulasi_ibfk_1` FOREIGN KEY (`id_sub_tema`) REFERENCES `sub_tema` (`id_sub_tema`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `soal_evaluasi`
--
ALTER TABLE `soal_evaluasi`
  ADD CONSTRAINT `FK_SoalSubTema` FOREIGN KEY (`id_sub_tema`) REFERENCES `sub_tema` (`id_sub_tema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
