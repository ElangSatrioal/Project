-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2023 pada 09.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alam_indonesia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `no_telp`, `email`, `alamat`) VALUES
(4, 'Elang Satrio Al Alyyu', 'Elang', 'hehe', '+6282233438134', 'elangsatrioalalyyu@gmail.com', 'JL.Kebon Jeruk 4'),
(19, 'Budi Santoso', 'Budsan', 'wow', '085100078255', 'jayaiwijaya2@gmail.com', 'JL A Yani No 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminbiro`
--

CREATE TABLE `adminbiro` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adminbiro`
--

INSERT INTO `adminbiro` (`id_admin`, `nama_admin`, `username`, `password`, `no_telp`, `email`, `alamat`) VALUES
(1, 'Reyhan', 'Travel Tour Jaya Wijaya', 'wow', '+6285707877943', 'reyhandanbudi@gmail.com', 'JL Merdeka Medan'),
(2, 'Joko', 'Pariwisata Surya Jaya ', 'hehe', '+6282131656780', 'jokowi24@gmail.com', 'JL Merdeka'),
(3, 'Reyhan', 'Indonesia Explore', 'lol', '+6285707877943', 'indoexp@gmail.com', 'JL Diponegoro ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(21, 'Air Terjun '),
(22, 'Danau'),
(23, 'Gunung'),
(24, 'Pantai'),
(25, 'Hutan'),
(27, 'Pulau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status_wisata` int(1) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`id_wisata`, `id_admin`, `id_kategori`, `nama_wisata`, `tarif`, `deskripsi`, `gambar`, `status_wisata`, `tanggal_dibuat`) VALUES
(45, 2, 23, 'Gunung Kapur', '100000', '<p>Kami menawarkan berbagai kegiatan petualangan, seperti pendakian gunung, hiking melintasi jalur-jalur yang menarik, dan eksplorasi gua-gua alami yang penuh misteri. Tim profesional kami akan memastikan Anda merasakan pengalaman yang aman dan menyenangkan. Kami juga menyediakan pemandu yang berpengalaman dan berpengetahuan luas tentang sejarah alam dan keunikan Gunung Kapur Madura.</p>\r\n', 'wisata1685794562.jpg', 1, '2023-05-14 15:44:43'),
(46, 2, 24, 'Pantai Kuta', '1000000', '<p>Pantai Kuta merupakan salah satu pantai yang terkenal di pulau Bali, Indonesia. Terletak di sebelah selatan Pulau Bali, Pantai Kuta menawarkan pemandangan indah, pasir putih yang luas, dan ombak yang cocok untuk berselancar. Pantai ini sering kali menjadi tujuan utama wisatawan yang mengunjungi Bali.</p>\r\n', 'wisata1685628738.jpg', 1, '2023-05-15 15:35:24'),
(47, 1, 23, 'Gunung Bromo', '800000', '<p>Jelajahi keajaiban alam yang magis di Gunung Bromo bersama kami! Bergabunglah dalam perjalanan petualangan yang tak terlupakan dan rasakan sensasi memukau dari salah satu keajaiban alam terbesar di Indonesia.</p>\r\n\r\n<p>Kami menawarkan paket travel eksklusif ke Gunung Bromo yang dirancang untuk memenuhi kebutuhan dan preferensi Anda. Bersama tim kami yang berpengalaman, Anda akan diajak menikmati keindahan matahari terbit yang spektakuler di puncak Gunung Bromo, mengelilingi lautan pasir luas yang menakjubkan, dan menyaksikan keindahan kawah berapi yang memukau.</p>\r\n', 'wisata1685607515.jpg', 1, '2023-05-15 15:37:18'),
(48, 1, 21, 'Air Terjun Coban Rondo', '200000', '<p>Paket wisata Air Terjun Coban Rondo kami menawarkan pengalaman luar biasa bagi pecinta alam dan petualangan. Nikmati panorama yang menakjubkan dari ketinggian air terjun yang megah, sambil merasakan semilir angin segar dan suara gemercik air yang menenangkan.</p>\r\n\r\n<p>Tidak hanya itu, dalam paket wisata ini, kami juga menyediakan fasilitas yang lengkap untuk memenuhi kebutuhan Anda. Anda akan diajak untuk menikmati trekking menyusuri hutan yang hijau dan penuh kehidupan, serta berfoto di spot-spot indah yang memukau.</p>\r\n', 'wisata1685607814.jpg', 1, '2023-05-15 15:38:33'),
(49, 2, 22, 'Danau Toba', '34000000', '<p>Danau Toba adalah sebuah danau vulkanik yang terletak di pulau Sumatera, Indonesia. Danau ini merupakan danau terbesar di Indonesia dan juga salah satu danau terbesar di dunia.Dan kini menjadi salah satu tujuan wisata populer di Indonesia. Danau Toba adalah destinasi wisata yang menarik dengan kombinasi keindahan alam, keunikan budaya, dan sejarah geologinya yang menakjubkan. Jika Anda mengunjungi Sumatera, Danau Toba adalah tempat yang wajib dikunjungi.</p>\r\n', 'wisata1685607218.jpg', 1, '2023-05-15 15:39:53'),
(50, 1, 25, 'Hutan Mangrove', '50000', '<p>Dalam paket wisata ini, Anda akan diajak untuk menjelajahi Hutan Mangrove Surabaya yang memukau dengan pemandangan yang memikat hati. Nikmati hembusan angin segar dan pemandangan hijau yang menyejukkan, sambil menjelajahi labirin alami dari pohon bakau yang menjulang tinggi.</p>\r\n\r\n<p>Selama perjalanan, Anda akan diajak untuk berjalan-jalan di atas jembatan kayu yang indah, menyusuri jalur yang telah disiapkan. Panduan lokal yang berpengalaman akan memberikan penjelasan mendalam tentang kehidupan ekosistem hutan mangrove dan pentingnya pelestariannya.</p>\r\n', 'wisata1685630006.jpg', 1, '2023-05-15 16:17:04'),
(51, 1, 27, 'Pulau Komodo', '5000000', '<p>Pulau Komodo, terletak di Taman Nasional Komodo, adalah rumah bagi hewan purba yang langka, yakni komodo, kadal terbesar di dunia. Dalam paket wisata ini, Anda akan memiliki kesempatan langka untuk melihat secara langsung komodo dan mengetahui lebih dalam tentang habitat mereka dari pemandu lokal yang berpengalaman.</p>\r\n\r\n<p>Selain itu, Anda akan diajak untuk menjelajahi keindahan pulau ini dengan mengunjungi pantai-pantai yang indah, menyelam di perairan yang kaya akan kehidupan bawah laut, dan trekking melalui padang rumput yang menakjubkan. Nikmati pemandangan matahari terbenam yang spektakuler dan jangan lewatkan kesempatan untuk berenang bersama ikan-ikan yang berwarna-warni.</p>\r\n', 'wisata1684167757.jpg', 1, '2023-05-15 16:22:37'),
(53, 3, 24, 'Pantai Pandawa', '2000000', '<p>Jelajahi Keindahan Pantai Pandawa! Nikmati liburan yang tak terlupakan di Pantai Pandawa, salah satu destinasi pariwisata terpopuler di Indonesia. Dengan pasir putih yang lembut, air laut yang jernih, dan pemandangan tebing karang yang spektakuler, Pantai Pandawa menawarkan pengalaman pantai yang luar biasa.</p>\r\n\r\n<p>Bersantai dan berjemur di bawah sinar matahari yang hangat, bermain air di ombak yang menenangkan, atau menjelajahi keindahan bawah laut dengan snorkeling atau menyelam. Pantai Pandawa memiliki berbagai kegiatan yang cocok untuk semua orang.</p>\r\n', 'wisata1686105756.jpg', 1, '2023-06-07 02:42:36'),
(54, 3, 27, 'Pulau Seribu', '4500000', '<p>Surga Tersembunyi di Pulau Seribu! Nikmati pesona alam yang menakjubkan di Kepulauan Seribu, destinasi pariwisata terbaik di Indonesia. Terletak di sebelah utara Jakarta, Pulau Seribu menawarkan keindahan tak terhingga dengan pulau-pulau cantik, pantai berpasir putih, dan air laut yang jernih.</p>\r\n\r\n<p>Dengan lebih dari 100 pulau yang tersebar, Anda dapat menjelajahi keindahan alam yang memukau, melakukan snorkeling atau menyelam untuk menikmati kehidupan bawah laut yang berwarna-warni, atau hanya bersantai di pantai yang tenang.</p>\r\n', 'wisata1686105908.jpg', 1, '2023-06-07 02:45:08'),
(55, 2, 25, 'Hutan Pinus Mangunan ', '100000', '<p>Jika Anda mencari tempat yang menenangkan untuk melarikan diri dari kepenatan kota, maka Hutan Pinus Mangunan adalah pilihan yang sempurna. Dengan paket wisata Hutan Pinus Mangunan, Anda akan menemukan keindahan alam yang menakjubkan, pepohonan pinus yang menjulang tinggi, dan udara segar yang menyegarkan.</p>\r\n\r\n<p>Dalam perjalanan wisata ini, Anda akan diajak untuk menjelajahi area hutan pinus yang luas dengan berbagai rute trekking yang menarik. Rasakan sensasi menyusuri jalur-jalur yang dilapisi dedaunan dan nikmati pemandangan yang menakjubkan sepanjang perjalanan. Tidak hanya itu, Anda juga bisa menemukan beberapa spot foto yang menarik dengan latar belakang pemandangan indah hutan pinus.</p>\r\n', 'wisata1686145689.jpg', 1, '2023-06-07 13:48:09'),
(56, 2, 22, 'Danau Kelimutu', '1500000', '<p>Apakah Anda siap untuk menjelajahi keajaiban alam yang menakjubkan? Kunjungi Danau Kelimutu, destinasi wisata yang menawarkan pengalaman yang tak terlupakan. Terletak di Pulau Flores, Nusa Tenggara Timur, Danau Kelimutu terkenal karena fenomena uniknya, yaitu warna-warni dan perubahan warna air danau yang misterius.</p>\r\n\r\n<p>Dalam paket wisata Danau Kelimutu, Anda akan diajak melihat langsung keindahan tiga danau di puncak gunung ini, yang masing-masing memiliki warna air yang berbeda. Anda akan terpesona dengan kombinasi warna yang mencolok, mulai dari biru, hijau, merah, hingga hitam. Pemandangan spektakuler ini sangatlah langka dan akan memberikan pengalaman yang tak terlupakan.</p>\r\n', 'wisata1686145879.jpg', 1, '2023-06-07 13:51:19'),
(57, 3, 21, 'Air Terjun Tumpak Sewu', '300000', '<p>Anda mencari petualangan alam yang mengagumkan? Jangan lewatkan kesempatan untuk mengunjungi Air Terjun Tumpak Sewu, salah satu destinasi wisata terindah di Indonesia. Terletak di kawasan Lumajang, Jawa Timur, air terjun ini menawarkan pemandangan yang luar biasa dan pengalaman yang tak terlupakan.</p>\r\n\r\n<p>Air Terjun Tumpak Sewu merupakan air terjun setinggi sekitar 120 meter dengan formasi air terjun yang berjumlah banyak, menciptakan pemandangan yang megah dan memukau. Air terjun ini terkenal karena keindahannya yang menyerupai rambut dewi yang menjuntai dari tebing karst. Suasana alami yang tenang dan sejuk di sekitar air terjun akan membuat Anda merasa terhubung dengan alam.</p>\r\n', 'wisata1686146117.jpeg', 1, '2023-06-07 13:55:17'),
(58, 3, 27, 'Kepulauan Raja Ampat', '5000000', '<p>Raja Ampat adalah destinasi wisata yang tak tertandingi di dunia. Terletak di Provinsi Papua Barat, Indonesia, Raja Ampat menawarkan keindahan alam yang menakjubkan dengan pulau-pulau eksotis, terumbu karang yang megah, dan keanekaragaman hayati yang luar biasa.</p>\r\n\r\n<p>Dalam paket wisata kami, Anda akan diajak menjelajahi keindahan bawah laut Raja Ampat yang mengagumkan. Dengan menyelam atau snorkeling, Anda akan memasuki dunia bawah laut yang memukau dengan terumbu karang yang indah, ikan-ikan tropis yang beraneka ragam, dan kehidupan laut yang melimpah. Anda akan terpesona dengan warna-warni terumbu karang dan berbagai spesies langka seperti ikan pari, hiu paus, dan penyu.</p>\r\n', 'wisata1686146424.png', 1, '2023-06-07 14:00:24'),
(59, 1, 27, 'Taman Nasional Bunaken', '4500000', '<p>Taman Nasional Bunaken terletak di Sulawesi Utara, Indonesia, dan merupakan salah satu destinasi wisata terbaik bagi para pecinta snorkeling dan menyelam. Di sini, Anda akan menemukan kekayaan alam bawah laut yang luar biasa dengan terumbu karang yang indah dan keanekaragaman hayati yang menakjubkan.</p>\r\n\r\n<p>Dalam paket wisata kami, kami akan membawa Anda menjelajahi keajaiban bawah laut Taman Nasional Bunaken. Dengan bantuan instruktur yang berpengalaman, Anda akan menyelam atau snorkeling di perairan yang jernih dan mengagumkan. Anda akan disuguhkan pemandangan terumbu karang yang spektakuler, ikan-ikan berwarna-warni, dan kehidupan laut yang melimpah. Tidak jarang Anda juga akan bertemu dengan penyu, ikan hiu, dan spesies langka lainnya.</p>\r\n', 'wisata1686146815.jpg', 1, '2023-06-07 14:06:55'),
(60, 1, 27, 'Kepulauan Gili', '5500000', '<p>Kepulauan Gili terletak di Lombok, Indonesia, dan merupakan destinasi wisata yang memikat dengan pasir putih, air jernih, dan pesona alam bawah laut yang menakjubkan. Dalam paket wisata kami, kami akan membawa Anda menjelajahi keindahan dan keajaiban alam Kepulauan Gili.</p>\r\n\r\n<p>Pulau-pulau Gili terkenal dengan kehidupan pantainya yang santai dan atmosfer yang menyenangkan. Anda dapat menikmati pasir putih yang lembut di kaki Anda sambil berjemur di bawah sinar matahari tropis. Anda juga dapat berenang atau bersantai di air yang tenang dan jernih, menyaksikan pemandangan matahari terbenam yang memukau.</p>\r\n', 'wisata1686146957.jpg', 1, '2023-06-07 14:09:17'),
(62, 3, 21, 'Air Terjun Dlundung', '200000', '<p>Air Terjun Dlundung adalah destinasi wisata yang memukau di Indonesia. Terletak di tengah hutan yang hijau dan alami, air terjun ini menawarkan pemandangan yang memukau dan pengalaman yang tak terlupakan bagi pengunjung.</p>\r\n\r\n<p>Dengan ketinggian sekitar 35 meter, Air Terjun Dlundung menawarkan keindahan alam yang menakjubkan. Air terjun ini membentuk kolam alami di bawahnya, di mana Anda dapat berenang atau sekadar berendam sambil menikmati suasana yang tenang dan segar. Suara gemuruh air jatuh dan semburan air yang menyegarkan akan membuat Anda merasa terhubung dengan alam.</p>\r\n', 'wisata1686147635.jpg', 1, '2023-06-07 14:20:35'),
(63, 1, 23, 'Gunung Arjuno', '550000', '<p>Gunung Arjuno adalah salah satu destinasi wisata alam yang menarik di Indonesia. Terletak di Jawa Timur, gunung ini menawarkan pengalaman mendaki yang menantang serta pemandangan alam yang memukau. Gunung Arjuno juga memiliki nilai sejarah dan budaya yang kaya, menjadikannya tempat yang ideal untuk petualangan dan eksplorasi.</p>\r\n\r\n<p>Dengan ketinggian sekitar 3.339 meter, Gunung Arjuno menawarkan pemandangan yang spektakuler dari puncaknya. Saat mendaki, Anda akan melewati hutan-hutan yang hijau dan melintasi jalur trekking yang menarik. Di sepanjang perjalanan, Anda akan menikmati keindahan flora dan fauna yang khas, serta udara segar yang menyegarkan.</p>\r\n', 'wisata1686148024.jpg', 1, '2023-06-07 14:27:04'),
(64, 2, 24, 'Pantai Pangandaran', '600000', '<p>Dengan garis pantai yang panjang, Anda dapat menemukan berbagai area di Pantai Pangandaran yang sesuai dengan keinginan Anda. Di sepanjang pantai, terdapat area yang ramai dengan restoran, kafe, dan toko-toko suvenir. Anda dapat menikmati hidangan laut segar, minuman segar, atau berbelanja oleh-oleh khas Pantai Pangandaran.</p>\r\n\r\n<p>Pantai Pangandaran juga menawarkan kegiatan yang mengasyikkan bagi pengunjungnya. Anda dapat mencoba olahraga air seperti selancar, snorkeling, atau berkeliling dengan perahu nelayan tradisional. Air yang jernih dan terumbu karang yang indah membuat pengalaman ini menjadi tak terlupakan.</p>\r\n', 'wisata1686148211.jpg', 1, '2023-06-07 14:30:11'),
(65, 3, 22, 'Danau Sentani', '6500000', '<p>Danau Sentani adalah salah satu destinasi wisata alam yang menakjubkan di Indonesia. Terletak di Kota Jayapura, Papua, danau ini menawarkan pemandangan yang memukau dengan perpaduan air biru yang jernih, perbukitan hijau, dan pulau-pulau kecil yang tersebar di sekitarnya. Danau Sentani adalah tempat yang sempurna untuk melarikan diri dari hiruk-pikuk kota dan menikmati keindahan alam yang autentik.</p>\r\n\r\n<p>Dengan luas sekitar 9.360 hektar, Danau Sentani memiliki berbagai sudut yang menarik untuk dieksplorasi. Anda dapat menjelajahi danau dengan perahu tradisional khas Papua, yang disebut &quot;kano&quot;. Melalui perjalanan ini, Anda akan dapat menyaksikan kehidupan sehari-hari masyarakat lokal yang tinggal di sekitar danau, serta menikmati pemandangan yang mempesona.</p>\r\n', 'wisata1686148505.jpg', 1, '2023-06-07 14:35:05'),
(66, 2, 25, 'Hutan Mangrove Jakarta', '200000', '<p>Hutan Mangrove PIK juga merupakan tempat tinggal bagi berbagai spesies satwa liar dan burung endemik. Pengunjung dapat menyaksikan berbagai jenis burung seperti bangau, elang, dan camar, serta menyaksikan kehidupan unik hewan-hewan laut seperti kepiting, udang, dan ikan-ikan kecil yang hidup di sekitar hutan mangrove. Untuk para fotografer dan pecinta alam, ini adalah tempat yang sempurna untuk mendapatkan gambar yang indah dan menikmati keindahan alam sekaligus.</p>\r\n\r\n<p>Selain itu, Anda juga dapat berpartisipasi dalam aktivitas ekowisata seperti berperahu atau kano jelajah melintasi sungai-sungai kecil dan menjelajahi ekosistem hutan mangrove yang luar biasa. Pandu lokal akan memberikan pengetahuan tentang pentingnya menjaga keberlanjutan lingkungan dan keunikan hutan mangrove sebagai penyangga pantai dan tempat berkembang biaknya banyak spesies</p>\r\n', 'wisata1686148859.jpg', 1, '2023-06-07 14:40:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `no_telp`, `email`, `alamat`) VALUES
(1, 'Elang', 'Elg', 'plis', '082233438134', 'elangsatrioalalyyu@gmail.com', 'Bluru Permai CJ 7'),
(6, 'Arka Ngawi', 'Ark', 'arka', '085373627228', 'arka15@gmail.com', 'Pasuruan'),
(9, 'van123', 'vian', 'krr', '099099099', 'dobe', 'ukiuo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `adminbiro`
--
ALTER TABLE `adminbiro`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `adminbiro`
--
ALTER TABLE `adminbiro`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
