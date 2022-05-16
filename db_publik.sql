-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 10.37
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_publik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_type` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `email`) VALUES
(1, 'alvika', 'alvika123', 'admin', 'alvikaajiandrianty@gmail.com'),
(2, 'aa', 'aa', 'Admin', 'alvikaajiandrianty@gmail.com'),
(3, 'aa', '$2y$10$LCw/iVth3JTRgfCPJ3xZE.TyjqLEPicHJg9a/7AlDPgMAQGz1Buiq', 'Admin', 'alvikaajiandrianty@gmail.com'),
(4, 'aa', '$2y$10$X9sdpsAOlMgqZAet.HrzU.sATVMlA97oG63yUVAt8AVLod0dMmQvK', 'Admin', 'alvikaajiandrianty@gmail.com'),
(5, 'bb', '$2y$10$/pTEyqlECSSPchVAw28e4evzEMFNhrYxGSLo41ai7itOTMBoGfK4a', 'Admin', 'alvika@hsjjs.hsj'),
(6, 'aa', '$2y$10$iGF9lYbaVg7.eIWTEMVtx..o23aYnFBiiUO7mZy85uusX3kQ3UtSa', 'Admin', 'alvikaajiandrianty@gmail.com'),
(7, 'aa', '$2y$10$IV4uCfA..jBnIRegyOito.D7jbykRzxejSL/mYIqqy5pTbEe.UPAK', 'User', 'aa@s'),
(8, 'admin', '$2y$10$JQmj51bhr0DhK9/HbD1.9.TE/QsUxWO8.6lWuttOgw2MukaW41fRy', 'Admin', 'alvikaajiandrianty@gmail.com'),
(9, 'aa', '$2y$10$Yqb4TZbRkQcTZNQDN688A.iI5YlLsI9egWBIjDT5ihk8/8/XOGrHe', 'User', 'aa@asd'),
(10, 'aa', '$2y$10$6JUBwn0U95BHWtaH1/ctH.QmW36xlLeyBKtqJJSU1gwec9e.IbLDW', 'User', 'aa@ssd'),
(11, 'aa', '$2y$10$Y8SV4y0Lmk8ERWrlzFXnKeU5hW7rZNp2Pn1TH/1xEn4MHyVMih5ca', 'User', 'alvikaajiandrianty@gmail.com'),
(12, 'aa', '$2y$10$bf6Gvu9ITCQyq6UJSJljhOtfq1xnMNl2Lh87d854BlYtII52GEoci', 'Admin', 'alvikaajiandrianty@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
