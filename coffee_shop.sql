-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2026 pada 20.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` enum('Pending','Paid','Shipped','Delivered') DEFAULT 'Pending',
  `temperature` enum('Hot','Cold') DEFAULT 'Hot',
  `is_checked` tinyint(1) DEFAULT 0,
  `is_delivered` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `status`, `temperature`, `is_checked`, `is_delivered`) VALUES
(1, 2, 1, 1, '', 'Hot', 1, 0),
(2, 2, 6, 1, '', 'Hot', 0, 0),
(3, 2, 11, 1, '', 'Hot', 1, 0),
(4, 2, 11, 1, '', 'Hot', 1, 0),
(5, 2, 8, 1, '', 'Hot', 1, 0),
(6, 2, 8, 1, '', 'Hot', 1, 0),
(7, 2, 8, 1, '', 'Hot', 1, 0),
(8, 2, 8, 1, '', 'Hot', 1, 0),
(9, 3, 1, 1, 'Paid', 'Hot', 1, 1),
(10, 3, 1, 1, 'Paid', 'Hot', 1, 1),
(11, 5, 27, 1, 'Paid', 'Hot', 1, 1),
(13, 2, 5, 1, '', 'Hot', 0, 0),
(14, 2, 5, 1, '', 'Hot', 0, 0),
(15, 2, 3, 1, '', 'Hot', 1, 0),
(16, 2, 5, 1, '', 'Hot', 0, 0),
(18, 2, 5, 1, '', 'Hot', 0, 0),
(19, 2, 5, 1, '', 'Hot', 0, 0),
(20, 2, 3, 1, '', 'Hot', 1, 0),
(21, 2, 5, 1, '', 'Hot', 0, 0),
(24, 2, 5, 1, '', 'Hot', 0, 0),
(25, 2, 5, 1, '', 'Hot', 0, 0),
(26, 2, 3, 1, '', 'Hot', 1, 0),
(27, 2, 5, 1, '', 'Hot', 0, 0),
(28, 2, 5, 1, '', 'Hot', 0, 0),
(29, 2, 5, 1, '', 'Hot', 0, 0),
(30, 2, 3, 1, '', 'Hot', 1, 0),
(31, 2, 5, 1, '', 'Hot', 0, 0),
(32, 2, 5, 1, '', 'Hot', 0, 0),
(33, 2, 5, 1, '', 'Hot', 0, 0),
(34, 2, 3, 1, '', 'Hot', 1, 0),
(35, 2, 5, 1, '', 'Hot', 0, 0),
(36, 2, 5, 1, '', 'Hot', 0, 0),
(37, 2, 5, 1, '', 'Hot', 0, 0),
(38, 2, 3, 1, '', 'Hot', 1, 0),
(39, 2, 5, 1, '', 'Hot', 0, 0),
(40, 2, NULL, 3, '', 'Hot', 0, 0),
(41, 2, 6, 1, '', 'Hot', 0, 0),
(42, 2, 3, 1, '', 'Hot', 1, 0),
(43, 2, 2, 1, '', 'Hot', 1, 0),
(44, 2, 10, 1, '', 'Hot', 1, 0),
(45, 2, 8, 1, '', 'Hot', 1, 0),
(46, 2, 2, 1, '', 'Hot', 1, 0),
(47, 2, NULL, 2, '', 'Hot', 0, 0),
(48, 2, 27, 1, '', 'Hot', 1, 0),
(49, 2, NULL, 1, '', 'Hot', 0, 0),
(50, 2, 2, 1, '', 'Hot', 1, 0),
(51, 2, 2, 1, '', 'Hot', 1, 0),
(52, 2, NULL, 2, '', 'Hot', 0, 0),
(53, 2, 3, 1, '', 'Hot', 1, 0),
(54, 2, NULL, 1, '', 'Hot', 0, 0),
(55, 2, 2, 1, '', 'Hot', 1, 0),
(56, 2, 5, 1, '', 'Hot', 0, 0),
(57, 2, NULL, 1, '', 'Hot', 0, 0),
(58, 2, 2, 1, '', 'Hot', 1, 0),
(59, 2, 10, 1, '', 'Hot', 1, 0),
(60, 2, 7, 1, '', 'Hot', 0, 0),
(61, 2, NULL, 2, '', 'Hot', 0, 0),
(62, 2, 10, 1, '', 'Hot', 1, 0),
(63, 2, NULL, 1, '', 'Hot', 0, 0),
(64, 2, 7, 1, '', 'Hot', 0, 0),
(65, 2, 26, 1, '', 'Hot', 1, 0),
(66, 2, NULL, 1, '', 'Hot', 0, 0),
(67, 2, 31, 1, '', 'Hot', 1, 1),
(68, 2, NULL, 2, '', 'Hot', 0, 0),
(69, 2, 39, 1, '', 'Hot', 0, 0),
(70, 2, NULL, 2, '', 'Hot', 0, 0),
(71, 8, 2, 1, '', 'Hot', 1, 1),
(72, 8, NULL, 1, '', 'Hot', 0, 0),
(73, 8, 3, 1, 'Paid', 'Hot', 0, 0),
(74, 8, NULL, 1, 'Paid', 'Hot', 0, 0),
(75, 8, 2, 1, 'Paid', 'Hot', 1, 1),
(76, 8, NULL, 1, 'Paid', 'Hot', 0, 0),
(77, 8, 2, 1, 'Paid', 'Hot', 1, 1),
(78, 8, NULL, 8, 'Paid', 'Hot', 0, 0),
(79, 8, 3, 1, 'Paid', 'Hot', 0, 0),
(80, 2, 2, 1, '', 'Hot', 1, 0),
(81, 2, NULL, 1, '', 'Hot', 0, 0),
(82, 2, 2, 1, '', 'Hot', 1, 0),
(83, 2, NULL, 1, '', 'Hot', 0, 0),
(84, 2, 5, 1, '', 'Hot', 0, 0),
(85, 2, NULL, 1, '', 'Hot', 0, 0),
(86, 2, 2, 1, '', 'Hot', 1, 0),
(87, 2, NULL, 1, '', 'Hot', 0, 0),
(88, 2, 2, 1, '', 'Hot', 1, 0),
(89, 2, NULL, 1, '', 'Hot', 0, 0),
(90, 2, 2, 1, '', 'Hot', 1, 0),
(91, 2, NULL, 1, '', 'Hot', 0, 0),
(92, 9, 1, 1, '', 'Hot', 0, 0),
(93, 9, NULL, 1, '', 'Hot', 0, 0),
(94, 9, 2, 1, '', 'Hot', 0, 0),
(95, 9, NULL, 1, '', 'Hot', 0, 0),
(96, 9, NULL, 3, '', 'Hot', 0, 0),
(97, 9, NULL, 2, '', 'Hot', 0, 0),
(98, 9, NULL, 1, '', 'Hot', 0, 0),
(99, 9, NULL, 1, '', 'Hot', 0, 0),
(100, 9, NULL, 1, '', 'Hot', 0, 0),
(101, 11, NULL, 2, '', 'Hot', 0, 0),
(102, 11, NULL, 2, '', 'Hot', 0, 0),
(103, 11, NULL, 4, '', 'Hot', 0, 0),
(104, 12, NULL, 1, '', 'Hot', 0, 0),
(105, 12, NULL, 1, '', 'Hot', 0, 0),
(106, 12, NULL, 1, '', 'Hot', 0, 0),
(107, 12, NULL, 2, '', 'Hot', 0, 0),
(108, 12, NULL, 2, '', 'Hot', 0, 0),
(109, 12, NULL, 2, 'Paid', 'Hot', 0, 0),
(110, 12, NULL, 1, 'Paid', 'Hot', 0, 0),
(111, 13, NULL, 1, '', 'Hot', 0, 0),
(112, 14, NULL, 1, '', 'Hot', 0, 0),
(113, 9, NULL, 1, '', 'Hot', 0, 0),
(114, 13, NULL, 1, '', 'Hot', 0, 0),
(115, 13, NULL, 2, '', 'Hot', 0, 0),
(116, 13, NULL, 2, '', 'Hot', 0, 0),
(117, 16, NULL, 1, '', 'Hot', 0, 0),
(118, 16, NULL, 1, '', 'Hot', 0, 0),
(119, 16, NULL, 2, '', 'Hot', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Semangat Pagi', 18000.00, 'kopi.jpg'),
(2, 'Fokus Maksimal', 22000.00, 'kopi.jpg'),
(3, 'Optimis Hari Ini', 20000.00, 'kopi.jpg'),
(4, 'Pecinta Kopi', 18000.00, 'kopi.jpg'),
(5, 'Misi Sukses', 22000.00, 'kopi.jpg'),
(6, 'Santai Sore', 25000.00, 'kopi.jpg'),
(7, 'Sweet Escape', 28000.00, 'kopi.jpg'),
(8, 'Nyaman Banget', 28000.00, 'kopi.jpg'),
(9, 'Mood Bahagia', 30000.00, 'kopi.jpg'),
(10, 'Pelukan Hangat', 28000.00, 'kopi.jpg'),
(11, 'Slow Brew', 30000.00, 'kopi.jpg'),
(12, 'Tenang Sejenak', 32000.00, 'kopi.jpg'),
(13, 'Hangat Nostalgia', 30000.00, 'kopi.jpg'),
(14, 'Petualang Rasa', 32000.00, 'kopi.jpg'),
(15, 'Klasik Berkelas', 28000.00, 'kopi.jpg'),
(16, 'Coconut Bliss', 35000.00, 'kopi.jpg'),
(17, 'Chocolate Mood', 32000.00, 'kopi.jpg'),
(18, 'Matcha Fusion', 35000.00, 'kopi.jpg'),
(19, 'Golden Honey', 33000.00, 'kopi.jpg'),
(20, 'Almond Treat', 35000.00, 'kopi.jpg'),
(21, 'Matcha Harmony', 30000.00, 'kopi.jpg'),
(22, 'Cocoa Comfort', 28000.00, 'kopi.jpg'),
(23, 'Berry Smooth', 30000.00, 'kopi.jpg'),
(24, 'Chai Delight', 30000.00, 'kopi.jpg'),
(25, 'Lemon Zen', 28000.00, 'kopi.jpg'),
(26, 'Espresso', 25000.00, 'kopi.jpg'),
(27, 'Cappuccino', 30000.00, 'kopi.jpg'),
(28, 'Americano', 27000.00, 'kopi.jpg'),
(29, 'Ristretto', 26000.00, 'kopi.jpg'),
(30, 'Macchiato', 29000.00, 'kopi.jpg'),
(31, 'Latte', 32000.00, 'kopi.jpg'),
(32, 'Flat White', 31000.00, 'kopi.jpg'),
(33, 'Piccolo Latte', 30000.00, 'kopi.jpg'),
(34, 'Mocha', 35000.00, 'kopi.jpg'),
(35, 'Red Eye', 33000.00, 'kopi.jpg'),
(36, 'Affogato', 36000.00, 'kopi.jpg'),
(37, 'Cold Brew', 37000.00, 'kopi.jpg'),
(38, 'Yuanyang', 34000.00, 'kopi.jpg'),
(39, 'Cortado', 30000.00, 'kopi.jpg'),
(40, 'Frappe', 38000.00, 'kopi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `user_id`, `rating`, `comment`, `created_at`, `name`) VALUES
(7, 1, 5, 'Enakkk', '2025-02-27 18:31:11', 'Ran'),
(8, 1, 5, 'enakkk', '2025-02-27 19:18:19', 'Ran'),
(9, 1, 5, 'wow', '2025-02-27 21:27:33', 'Ran'),
(10, 1, 5, 'enakk', '2025-03-01 16:48:12', 'Ran'),
(11, 1, 5, 'keren', '2025-03-01 17:01:51', 'Ran'),
(12, 1, 5, 'enakkkk', '2025-03-01 17:04:41', 'Ran'),
(13, 1, 5, 'enak', '2025-03-01 17:11:15', 'Ran'),
(14, 1, 5, 'wowwww', '2025-03-01 17:11:41', 'Ran'),
(15, 2, 5, 'keren', '2025-03-01 17:18:00', 'Ran'),
(16, 9, 5, 'keren', '2025-03-01 17:18:46', 'Arin'),
(17, 9, 5, 'enakk', '2025-03-01 18:19:18', 'Arin'),
(18, 9, 5, 'yummy', '2025-03-01 18:42:19', 'Arin'),
(19, 11, 5, 'enakkk', '2025-03-01 21:57:17', 'Meli'),
(20, 12, 5, 'WAHH ENAKK BGTTT', '2025-03-02 11:42:40', 'Meli'),
(21, 13, 5, 'haha eanakkkkkkk', '2025-03-04 13:10:46', 'Arinnnn'),
(22, 14, 5, 'Bintang bintang bintang bintang bintang', '2025-03-04 19:12:58', 'Username'),
(23, 13, 5, 'mantapp', '2025-03-09 17:00:00', 'Arinnnn'),
(24, 9, 5, 'enak bgt', '2025-03-09 19:31:38', 'Arin'),
(25, 13, 5, 'enakkkkkkk', '2025-03-13 14:37:30', 'Arinnnn'),
(26, 13, 5, 'enak', '2025-03-14 07:55:26', 'Arinnnn'),
(27, 16, 5, 'Kopinya enak bangettt', '2026-05-19 00:06:49', 'Ran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ran', 'aaaa@gmail.com', '$2y$10$VlFytyazGyKoYKwrwtWJuOuMdgsw42zQugnWOeIzd0L6y.o.8t5Pq'),
(2, 'Ran', 'aaa@gmail.com', '$2y$10$RePO144PSTIu5HEmyOM14uLkQGbwLRxa3tQnkFnzolOKMej9jVPNS'),
(3, 'Ucang', 'ucang@gmail.com', '$2y$10$5yLnBKQjMn.BpnMSrfMoJO40RZ..2rYJAxojJxQW1C0212fu.fphq'),
(4, 'mila', 'mila@gmail.com', '$2y$10$PDD31E8Tt22tFpYQZdqL9OYTEDCiMZuuxbggJGZXZUTDbPdCLl8lu'),
(5, 'fitri', 'fitri@gmail.com', '$2y$10$67PokZLgGzF/xy4coENZB.otgQheF1vdtaMh1GXnVaer/KGaflUk6'),
(6, 'arin', 'arin@gmail.com', '$2y$10$2p0aED4KQSO.gDj92zONcOv8EchanndOrIsDJf04BpWR7ouTv0N26'),
(7, 'arinn', 'arinn@gmai.com', '$2y$10$NIYYjw.he0d/fj2GlsVWVOLTART5NEvkPNcrur7LMXnKgNXc/gQum'),
(8, 'MELI', 'meli@gmail.com', '$2y$10$BcFHWe7j4cP6X4/39mcLxemMCzgYPGm9gMzsd37kN44Q2JZgxnImO'),
(9, 'Arin', 'arinnn@gmail.com', '$2y$10$LHCW1L6DxHWsaZnCUUr7t.mu./3oNDkfTZDxzGSW9YR9i.X2w.PUW'),
(10, 'senior', 'senior@gmail.com', '$2y$10$Up3cCgsQ0Fl8nzxDKJwiL.DjPJakmZG9HWB9FlSx2rnTntx6sWZeS'),
(11, 'Meli', 'melii@gmail.com', '$2y$10$npQRt/ZVs2OAXOFj27lpk.7a.YEqDbp6FqORBIlxkQdAjgEuDOtVG'),
(12, 'Meli', 'meliii@gmail.com', '$2y$10$GmZ0e3MXnNkC6cGaopjkPeQ70iu6hPpkOFCjNOdPSwu4sdLubc/NK'),
(13, 'Arinnnn', 'arinnnn@gmail.com', '$2y$10$JvtV18cSmGX2VqrbvkI.oe1qQVgY8V/h14aIL6vNUY6TbDt5/4S9i'),
(14, 'Username', 'example@gmail.com', '$2y$10$DMLF0Sqxivj0Lm7QL6vs4.4FXYX.UFsJDnnfjp9171BCmR0uMHycC'),
(15, 'ran', 'ran@gmail.com', '$2y$10$ixzRDcn3V5BgvoJlV5VpW.gDFxohvdUkj/SksI2AndRenAVpumDLC'),
(16, 'Ran', 'rhanarhana33@gmail.com', '$2y$10$XWxJVm8czriHxAqzz6M8SuB2JAMixkb7lHirgbXLM3YHuXnBBjamu'),
(17, 'Farren Rafa Azland', 'rapaazland125@gmail.com', '$2y$10$weMtgMzuC02ZJEhBzyND8ez5q4xEhwHHe6bzMlz5XyPb65MNDL.X6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
