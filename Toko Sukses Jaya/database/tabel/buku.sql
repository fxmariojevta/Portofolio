-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2019 at 07:43 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(80) NOT NULL,
  `penerbit` text NOT NULL,
  `penulis` text NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `kategori` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `harga` text NOT NULL,
  `stok` text NOT NULL,
  `popular` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penerbit`, `penulis`, `tahun_terbit`, `kategori`, `deskripsi`, `gambar`, `harga`, `stok`, `popular`, `status`, `tanggal`) VALUES
(1, 'awdaawdaw', '', '', '0000', '', 'awdawd', '005FXNGSgy1fg2np3xm2hj30k00c0tau.jpg', '0.0000', '0', 0, 0, '0000-00-00'),
(2, 'Tes', '', '', '1111', '', 'qwadawd', '1024px-Moody_EN.svg.png', '', '', 0, 0, '0000-00-00'),
(3, 'Penemuan Telegram Kabarkan Dahsyatnya Letusan Krakatau', '', '', '2222', '', 'qkkkqksq', '3.jpg', '', '', 0, 0, '0000-00-00'),
(4, 'Tes', '', '', '1990', '', 'tes', '4.jpg', '', '', 0, 0, '0000-00-00'),
(5, 'Mengenal Website Analitik Untuk Mengukur Performa Website', '', '', '4000', '', 'testimg', '0067Lrddgy1g1yug6r394j30vv0rs1kx.jpg', '', '', 0, 0, '0000-00-00'),
(6, 'nawdankwn', '', '', '1900', '', 'ankwdlkawn', '14457325_1096368330417039_2485641140866354122_n.jpg', '', '', 0, 0, '0000-00-00'),
(7, 'qwdnqklwd', '', '', '2019', '', 'ndlkqwndl', 'EKIaM8yUUAMBhMl.jpg', '50000', '3', 0, 0, '0000-00-00'),
(8, 'Otodidak Pemrograman Python', 'Elex Media Komputindo', 'Jubilee Enterprise', '2017', 'Data Science', 'Pemrograman Python memiliki masa depan yang baik. Kemampuannya dalam mengolah struktur data secara cepat dan praktis bisa membantu kita mempelajari kecerdasan buatan (AI) di masa depan. Buku ini membahas pemrograman Python untuk para pemula.\r\nPembahasan yang ada di dalam buku ini meliputi instalasi Python dan editor pendukung, pengenalan dasar-dasar Python, seperti variabel dan perintah dasar, pembuatan fungsi-fungsi, perulangan dalam Python, kondisional If, pemrograman GUI menggunakan Python, pembuatan aplikasi game (permainan) secara cepat.\r\nSetelah membaca buku ini, diharapkan Anda bisa mengetahui struktur pemrograman Python dan mencoba mengembangkannya sendiri agar dapat mendalami bahasa pemrograman ini dengan baik. Akhir kata, selamat membaca.', '1 (1).jpg', '42900', '8', 11, 1, '2019-12-06'),
(10, 'From Zero To A Pro: Java Script Dan jQuery', 'Andi Publisher', 'Abdul Kadir', '2013', 'Web Programming', 'Buku yang sangat cocok bagi yang ingin belajar membuat kode dengan JavaScript dan jQuery\r\nuntuk membuat halaman web yang interaktif dan dinamis.Dilengkapi dengan banyak contoh yang mudah untuk dipraktikkan.\r\n\r\nBuku ini mengajarkan dari hal dasar hingga ke tip-tip berharga untuk membuat aplikasi web profesional,\r\nmisalnya menyajikan data dalam bentuk diagram batang dan menyajikan data dalam bentuk tabel\r\nyang memungkinkan pemakai mengurutkan data menurut kolom tertentu secara interaktif.\r\n\r\nBuku ini juga membahas cara mengakses data\r\ndi MySQL Database Server, XML, dan JSON.', 'nHBfsgAAXQAAAAkACkXNqwABVGY.jpg', '168800', '10', 10, 1, '2019-12-14'),
(11, 'Buku Arduino Panduan Praktis Mempelajari Aplikasi Mikrokontroler', 'Andi Publisher', 'Abdul Kadir', '2014', 'Arduino Programming', 'Buku yang bermanfaat bagi siapa saja yang ingin mempelajari aplikasi mikrokontroler dan pemrogramannya.\r\nDengan menggunakan buku ini, siapa saja dapat mempelajari pemrograman mikrokontroler dengan cepat dan mudah.', 'images.jpg', '78000', '13', 7, 1, '2019-12-14'),
(12, 'Bermain Android Studio Itu Mudah', 'Deep Publish', 'Abdul Azis, dkk', '2018', 'Android Programming', 'Android Studio merupakan perangkat lunak buatan Google untuk para developer android dalam membuat dan mengembangkan aplikasi android. Android Studio menawarkan banyak fitur yang memungkinkan alur kerja pengembangan Anda menjadi lebih mudah dan menyenangkan dalam satu set. Selanjutnya kita mulai dengan mengeinstal Java Development Kit (JDK) dengan mengikuti langkah dibawah ini Instalasi Java Development Kit (JDK). Android Studio SDK dikembangkan dengan menggunakan bahasa pemrograman Java. Demikian pula, aplikasi Android juga dikembangkan menggunakan Java.\r\n\r\nBuku ini terdiri dari beberapa bab. Bab pertama membahas tentang android studio, bab dua membahas tentang android, bab tiga membahas tentang persiapan instalasi aplikasi, bab empat tentang pembuatan aplikasi em-tilang, bab lima membahas tentang pembuatan database. Selanjutnya bab enam membahas tentang pembuatan website admin, bab tujuh membahas tentang domain dan hosting, dan yang terakhir bab delapan tentang playstore.', 'images (1).jpg', '70000', '18', 7, 1, '2019-12-14'),
(13, 'The C++ Programming Language by Bjarne Stroustrup', 'Addison-Wesley(3 edition)', 'Bjarne Stroustrup', '1985', 'Web Programming', 'Ini adalah buku yang luar biasa dari pencipta bahasa C ++ Bjarne Stroustrup. Tetapi Anda harus diperingatkan! Jika Anda mencari buku untuk mempelajari bahasa C ++ dari awal, Anda sebaiknya tidak memilih buku ini.(Pemula harus mencari buku: C ++ Primer Plus). Ini adalah buku yang bagus untuk orang-orang yang sudah terbiasa dengan konsep dan sintaksis bahasa C ++. Semua konsep dan sintaksis dijelaskan dengan kaya.) Karena caranya ditulis (teliti, banyak detail pada satu halaman, dll) ini bukan buku untuk pemula mutlak atau programmer pemula. Ini adalah buku untuk programmer tingkat menengah dan berpengalaman. Jika Anda mencari buku referensi bahasa C ++, tidak perlu mencari lagi. Buku ini adalah tambahan penting untuk perpustakaan programmer C ++.', 'q.jpeg', '203000', '20', 5, 1, '2019-12-19'),
(14, 'Belajar Coding Android bagi Pemula', ' Elex Media Komputindo', 'Ir. Yuniar Supardi', '2015', 'Android Programming', 'Membantu Anda dari dasar dalam pembuatan program Android memakai bahasa pemrograman Java. Pembahasan dimulai dari membuat program sederhana dan mudah hingga pembuatan program database. Anda akan dipandu bagaimana mempersiapkan belajar mulai dari menginstal perangkat lunak hingga membuat program Android.', 'w.jpg', '93000', '4', 5, 1, '2019-12-19'),
(15, 'Pemrograman Arduino dan Processing', ' Elex Media Komputindo', 'Abdul Kadir', '2017', 'Arduino Programming', 'Ingin mengontrol Arduino melalui komputer atau sebaliknya mau memantau hasil sensor yang dikendalikan oleh Arduino di komputer?', 'e.jpg', '79900', '18', 7, 1, '2019-12-19'),
(16, 'Implementasi Data Mining Menggunakan Weka ', 'Universitas Brawijaya Press', 'Sigit Adinugroho, Yuita Arum Sari', '2018', 'Data Science', 'Data mining merupakan ilmu yang digunakan untuk mengolah informasi dan sekumpulan data yang memanfaatkan kecerdasan dalam membangun pola-pola untuk mengenali karakteristik dari data. Buku ini akan menjadi buku yang sangat membantu anda dalam mempelajari data science terkhususnya data mining', 'rrr.jpg', '150000', '2', 0, 1, '2019-12-19'),
(17, 'Principles of Data Mining', 'The MIT Press', 'David J. Hand, David J Hand, Heikki Mannila, Padhraic Smyth', '2001', 'Data Science', 'Pengukuran dan Data. Memvisualisasikan dan Menjelajahi Data. Analisis Data dan Ketidakpastian. Tinjauan Sistematis tentang Algoritma Penambangan Data. Model dan Pola. Fungsi Skor untuk Algoritma Penambangan Data. Metode Serach dan Optimasi.', 't.jpg', '285', '4', 2, 1, '2019-12-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
