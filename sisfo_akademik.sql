-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2019 pada 13.21
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`) VALUES
(2, 'admin@example.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nid` varchar(128) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nid`, `nama_lengkap`, `alamat`, `telepon`, `email`, `foto`) VALUES
(1, '109243001104', 'Waluyo Sutriyo ', 'Jauh', '085262113122', 'waluyo@example.com', 'te1.jpg'),
(2, '109243001105', 'Wiro Sableng', 'Jauh Banget', '085291192899', 'wiro@example.com', 'te4.jpg'),
(5, '109243001033', 'Alexandria Jr.', 'Jauh', '085210022992', 'alex@example.com', 'te3.jpg'),
(6, '109243001211', 'Supratot', 'Jl. ini', '08979900', 'supratot@example.com', 'te22.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(30) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(2, 'EB', 'Ekonomi dan Bisnis'),
(3, 'IK', 'Ilmu Komputer'),
(5, 'KB', 'Komunikasi dan Bahasa'),
(6, 'TK', 'Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `npm` varchar(128) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nilai` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_mahasiswa`, `id_tahun_akademik`, `npm`, `id_matkul`, `nilai`) VALUES
(1, 3, 3, '', 4, ''),
(2, 2, 3, '', 4, ''),
(3, 3, 3, '', 1, ''),
(4, 3, 3, '', 2, ''),
(7, 2, 3, '', 5, ''),
(8, 2, 3, '', 1, ''),
(10, 2147483647, 2018, '', 5, ''),
(11, 2147483647, 2018, '', 5, ''),
(12, 2147483647, 2018, '', 5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_prodi`, `npm`, `nama_lengkap`, `alamat`, `email`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `foto`) VALUES
(1, 8, '201746001201', 'Wawan Racing', 'Jl. nya sama aku, jadiannya sama dia', 'wawan@example.com', '08960001110', 'Mars', '2019-10-12', 'Laki-laki', 't2.jpg'),
(2, 10, '201746001010', 'Asep Kusen', 'Jl. in aja dulu, siapa tau jodoh', 'asep@example.com', '08960001121', 'Jalan', '2019-10-07', 'Laki-laki', 'c2.jpg'),
(3, 8, '201746001200', 'James Deh Sama Kamu', 'Jl. jalan doang, gak jajan', 'james@example.com', '08960212111', 'Pluto', '1998-05-24', 'Laki-laki', 'm-product-4.jpg'),
(4, 9, '201746001203', 'Nurmala Sari Roti', 'Jl ini becek, gak ada ojek', 'sari@example.com', '089600011121', 'Jupiter', '2019-10-07', 'Perempuan', 'm-product-7.jpg'),
(6, 7, '201746001202', 'Yohannes', 'Jl. ini jalan buntu', 'yohan@example.com', '08960001910', 'Jupiter', '1996-08-25', 'Perempuan', '211.jpg'),
(7, 9, '201746001230', 'Alexa Marfuah.', 'Jl. ini sudah menjadi jalan ninjaku', 'alexa@example.com', '08960032110', 'Namec', '1996-07-03', 'Perempuan', '1.jpg'),
(8, 7, '201746001232', 'Tukiyem', 'Jl. Jauh gpp, yg penting sama kamu', 'tukiyem@example.com', '089600032321', 'Namec', '1995-10-26', 'Perempuan', '9.jpg'),
(9, 7, '201746001211', 'Kodijah', 'Jl. nya jauh, tapi dekat dihati', 'kodijah@example.com', '08960322111', 'Pluto', '1997-05-27', 'Perempuan', '23.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `kode_matkul` varchar(128) NOT NULL,
  `nama_matkul` varchar(128) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `id_prodi`, `kode_matkul`, `nama_matkul`, `sks`, `semester`) VALUES
(1, 3, 'MKK01', 'Algoritma dan Pemrograman Dasar', 3, 2),
(2, 3, 'MKK02', 'Pemrograman 2', 3, 5),
(4, 8, 'MKK03', 'Interpersonal Skill', 2, 2),
(5, 9, 'MKK04', 'Matematika', 3, 3),
(6, 10, 'MKK05', 'Fisika 1', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `icon` text NOT NULL,
  `logo` text NOT NULL,
  `banner` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `info` text NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `judul`, `email`, `alamat`, `telepon`, `facebook`, `instagram`, `icon`, `logo`, `banner`, `visi`, `misi`, `info`, `tentang`) VALUES
(1, 'Universitas Rindu', 'universitasrindu@example.com', 'Jl. nya sama aku, jadiannya sama dia', '088215111221', 'http://facebook.com/universitasrindu', 'http://instagram.com/universitasrindu', 'favicon.png', 'Univ. Rindu', 'b3.jpg', 'Lorem consectetur adipiscing elit. Vestibulum nibh urna, euLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. ILorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placeratnteger laoreet placeratismod ut ornare non, volutpat vea', 'Lorem ipsum dolor sit amet, consectetur adipiscing eLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placeratlit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat', 'Lorem consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placeratare non', 'Lorem consectetur adipiscing elLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placeratit. VestibulumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_jurusan`, `nama_prodi`, `kode_prodi`) VALUES
(3, 3, 'Teknik Informatika', 'TI'),
(7, 5, 'Bahasa Indonesia', 'BI'),
(8, 3, 'Sistem Informasi', 'SI'),
(9, 2, 'Akutansi', 'AK'),
(10, 6, 'Arsitektur', 'AR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `semester`) VALUES
(3, '2018/2019', 'Ganjil'),
(4, '2018/2019', 'Genap');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
