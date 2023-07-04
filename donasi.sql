-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2022 pada 10.40
-- Versi server: 5.6.20
-- Versi PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_nama` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`, `admin_foto`) VALUES
('6d3d96d6a22f6874d724fa3761d1b323', 'Ahmad Adha', 'ahmadadha@gmail.com', '$2y$10$CehV2ITnn98irs1GaFLPW.nZYAkaY94QeqxBwVFZoNrriu7u6BFh6', 'avatar-01.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(255) NOT NULL,
  `bank_no` varchar(255) NOT NULL,
  `bank_an` varchar(255) NOT NULL,
  `bank_kode` varchar(10) NOT NULL,
  `bank_status` varchar(255) NOT NULL DEFAULT 'Gangguan, Lancar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`bank_id`, `bank_nama`, `bank_no`, `bank_an`, `bank_kode`, `bank_status`) VALUES
(1, 'MANDIRI', '68949202732', 'YUBA INDONESIA', '008', 'Lancar'),
(2, 'BRI', '378973922', 'YUBA INDONESIA', '002', 'Lancar'),
(3, 'BNI', '638291002', 'YUBA INDONESIA', '009', 'Gangguan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_blog`
--

CREATE TABLE `tb_blog` (
  `post_id` varchar(200) NOT NULL,
  `post_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_kategori` varchar(200) NOT NULL,
  `post_judul` varchar(200) NOT NULL,
  `post_isi` text NOT NULL,
  `post_foto` varchar(200) NOT NULL,
  `post_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_blog`
--

INSERT INTO `tb_blog` (`post_id`, `post_tgl`, `post_kategori`, `post_judul`, `post_isi`, `post_foto`, `post_url`) VALUES
('350a3797caea1668d227c8cbe52c793e', '2022-03-13 12:34:44', '98cf4846deaa135dd2601b3afbed5086', 'Lorem Ipsum Dolor Sit, Amet Consectetur, Adipisicing.', 'Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Totam voluptas cupiditate earum, optio sit impedit. Perspiciatis rem, omnis, nemo, atque amet, doloribus mollitia tempora eum provident repellat ab dolorem commodi? <br>\r\n\r\n<br>\r\nLorem ipsum dolor sit amet, consectetur, adipisicing elit. Aut quod repudiandae molestias dolor tempora facere libero, laudantium ipsum distinctio fugiat vel rerum saepe tenetur, eaque tempore deleniti dolore debitis quam consequuntur suscipit ex facilis? Quibusdam a, rerum illo eum numquam, eaque magnam. Odit labore cum deleniti quidem unde vero voluptas quos asperiores, reiciendis cupiditate minus adipisci consequatur culpa similique earum dicta a. Labore magnam, assumenda ducimus nam facere! Reprehenderit accusamus recusandae, sint dicta numquam. Laudantium delectus, ullam aspernatur beatae pariatur distinctio, minus. Quos, quasi excepturi iste quibusdam officia, neque impedit iure. Odit enim, vitae eos iure accusamus ipsam neque excepturi. Iste fuga, excepturi blanditiis, quisquam recusandae ex accusantium laboriosam dignissimos magni repellat cum rem quia. Architecto doloremque reiciendis dolorum? Repudiandae officiis, sit porro ea ipsum voluptates? Iure voluptates, harum numquam corporis cupiditate reiciendis suscipit possimus dicta modi nisi sed. Repellat, nam libero rerum fuga. Earum officiis dolor, eaque, quidem voluptate ducimus nostrum vero asperiores laboriosam facere nisi exercitationem illo. Doloribus, sunt a minus ut officiis veritatis laudantium dolor atque iusto suscipit ea animi, quia ducimus magni nam dolore repellat id delectus ex? Assumenda autem possimus quo error voluptate quia fugit iste facere non neque, debitis illo voluptatem earum placeat deserunt rerum veritatis ullam, officia repellendus! Tenetur, atque labore illum maiores iste quam quibusdam, pariatur et eaque ducimus sit suscipit est consectetur rem? Iusto sit provident consequatur reprehenderit quis error quia deleniti voluptatem sunt porro nostrum atque, maiores non ullam nesciunt voluptates deserunt, obcaecati aut rem. Neque quia blanditiis quis consequuntur laborum distinctio optio quisquam earum aspernatur quas, incidunt tempore veritatis, rerum consectetur quidem adipisci quam ullam qui officia, laboriosam est nemo sed. Voluptates sint voluptatibus optio nostrum ullam, animi voluptatem id itaque dolorum sequi. Dolor, optio? Natus sed dignissimos, nobis cupiditate eaque dolore ipsam deleniti quae ut, beatae, vitae, in? <br>\r\n<br>\r\nLorem, ipsum dolor, sit amet consectetur adipisicing elit. Iure nihil dolorem fuga praesentium. Enim recusandae magnam animi beatae possimus adipisci blanditiis, debitis voluptatum vitae vero saepe? Impedit laboriosam dignissimos, eaque dicta expedita molestiae ipsum nemo in odit voluptate non commodi consequatur reprehenderit totam, illum mollitia consequuntur qui magnam est dolorum vero reiciendis facilis. Quidem sed consectetur laboriosam sapiente odio vel nobis ea voluptates perspiciatis voluptas reiciendis provident velit error, eaque debitis illo. Recusandae atque placeat beatae sed facere perspiciatis optio voluptas, iusto earum voluptates, at? In possimus dolorem, ad eius eveniet modi praesentium atque cum libero deserunt consequatur mollitia earum beatae totam, adipisci fuga, odio fugiat perspiciatis expedita repudiandae. Praesentium deserunt odit labore officiis, dolorem quisquam iusto blanditiis dolore mollitia tempore provident. Corporis, dolore rem consequatur enim harum reprehenderit doloribus corrupti, dolor molestias repudiandae adipisci saepe illo temporibus iste perferendis provident ut eaque non aperiam ea impedit omnis modi neque praesentium! Doloribus facere aperiam voluptatem incidunt perferendis nulla omnis possimus, velit a laudantium iure adipisci ex reiciendis, illum rerum, non error facilis. Enim id a quod consectetur ducimus, nam cumque quae fuga molestiae itaque qui saepe rem voluptate optio laboriosam. Veritatis reiciendis cum eligendi sunt dignissimos reprehenderit fugiat, assumenda cupiditate deleniti repellendus magnam, ea a molestiae animi repellat ipsum dolor! Repellat, sunt. Libero, earum dolor ex fugiat minima neque nulla aut quia corporis, provident sequi beatae, consequatur quo saepe, nesciunt praesentium dolores eum aperiam vitae odio aliquid ab. Expedita recusandae dignissimos commodi harum ad dolore soluta ratione ipsa sint qui possimus perspiciatis veniam nesciunt corrupti voluptates iusto repellendus ab eos, doloribus architecto. Officia hic tempore recusandae nisi quo accusamus sequi neque, iure ipsa soluta non. Similique culpa ad enim ut consequatur esse dolor porro aut aliquam explicabo, soluta quisquam debitis quia necessitatibus omnis officia quis at! Corporis qui vero aut ad delectus aliquam a velit fugit, dicta earum ipsam dolores repudiandae consectetur totam? Error odio vitae dolorum tenetur itaque cum, maiores autem quam impedit. Eum nostrum dolor, cum amet laboriosam voluptate nemo molestias tempora alias earum quibusdam libero inventore, quis id error, nulla sequi eos accusantium unde non, explicabo voluptatum! Fuga autem repudiandae ut officia, nesciunt non sequi, molestiae neque eveniet iure voluptate amet perspiciatis obcaecati ipsam exercitationem commodi quisquam accusantium maiores cumque perferendis hic. Quo fugiat est provident fuga.', 'single_blog_1.png', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing'),
('8995a6c234df0504e73ff81dd3af8ff5', '2022-03-15 12:39:53', '41600d0346fcb212b113e95dde1d906c', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Autem?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quia libero quidem error possimus facere nostrum, ad fugit dignissimos eligendi qui itaque molestias similique eius repudiandae ipsa dicta dolores dolore odio consectetur. Tempora aut aliquam rerum animi labore ea hic quas molestias excepturi vitae, fugiat adipisci vero expedita, nostrum mollitia, fuga quo voluptates assumenda sequi eos aspernatur rem odio non, quis. Consequatur provident commodi perferendis officiis magnam? Esse hic doloremque facilis tenetur asperiores sequi dolore aliquid deserunt eveniet, voluptas, optio voluptates magni neque ad quaerat nisi reiciendis minima fugit eaque consectetur nesciunt. Accusantium, dolore expedita ipsum, quas repellendus optio, incidunt blanditiis animi, libero est iure deleniti facere eaque debitis nihil omnis minus quisquam perspiciatis amet facilis quidem rem maxime modi perferendis suscipit? Debitis excepturi quia tempora pariatur error ad? Praesentium deleniti quis officia necessitatibus minus ullam ad, soluta, repudiandae tenetur sit incidunt commodi. Debitis error, fugit laboriosam ad quos autem hic eos voluptatum rerum. Asperiores cupiditate nihil repudiandae voluptate nisi qui voluptatum provident adipisci facere consequuntur! Nostrum perspiciatis eum totam consequuntur reiciendis deleniti illum. Consequatur, optio. Ducimus, facilis illo voluptates blanditiis minima aliquam iusto harum cumque tenetur nesciunt, consectetur deleniti laboriosam, dolores tempore doloribus sunt voluptatem velit repellendus quam maiores? Vero provident, magnam, cumque cum qui quidem ipsum soluta, culpa doloribus nisi repudiandae magni eum exercitationem quos ad temporibus nulla assumenda voluptate tempore, commodi reiciendis voluptates. Inventore voluptatibus nihil provident. Iste accusamus ea consequuntur tenetur enim quasi distinctio, esse blanditiis perspiciatis suscipit accusantium, incidunt sapiente? Tempora eligendi cumque ducimus voluptatibus, quo iure ea ullam libero perspiciatis, expedita possimus facere veniam reprehenderit a voluptatem tempore ad laborum quam praesentium error consequatur, nisi, non. Consequuntur, hic omnis numquam molestias magnam quaerat quia assumenda saepe deserunt ex culpa tempora, dignissimos ipsum accusamus sed veniam vitae modi reprehenderit, blanditiis vel maxime obcaecati. Perferendis quidem eveniet quis, id fugit architecto laudantium veniam et doloribus adipisci, fuga pariatur quaerat officiis saepe doloremque expedita explicabo, rerum repudiandae unde ipsum magni facilis nam consectetur dolorem sapiente? Necessitatibus doloremque, voluptate sint, minus soluta eum. Repellat quia quaerat itaque animi, officia quisquam aliquid dolore natus voluptates quo ipsum fugiat consequuntur ex vitae similique esse dignissimos quibusdam deserunt in labore sit, iure nihil consectetur non nesciunt. Qui quaerat ipsum non consectetur placeat magni quibusdam culpa provident quod repellendus amet veritatis voluptatibus molestias, fugit voluptas. Ducimus eum nobis animi quam impedit eligendi repudiandae laborum doloribus voluptate laboriosam iste dicta architecto, libero illum quo iure nam labore sed, facere rem! Nesciunt dolorum alias modi itaque maiores at, laborum vero, officiis. Omnis, totam doloremque aliquam, nulla, vitae minus quidem quos ut consectetur in explicabo ea! Laboriosam quae animi quisquam atque fugiat reiciendis, nostrum molestiae esse similique explicabo cum possimus omnis eveniet! Nostrum voluptas enim aperiam necessitatibus recusandae voluptatum officiis reprehenderit perferendis iure nam neque voluptate placeat quam minus, nisi rem. Maiores officia mollitia tempora blanditiis sequi necessitatibus neque consequatur, odit quos culpa adipisci porro voluptatum sint illo, alias! Quo consequatur ducimus reprehenderit vitae commodi. Voluptatibus quam, amet corrupti. Sapiente culpa exercitationem quibusdam recusandae earum?', 'single_blog_2.png', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-autem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_donasi`
--

CREATE TABLE `tb_donasi` (
  `donasi_id` varchar(255) NOT NULL,
  `donasi_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `donasi_time` date NOT NULL,
  `donasi_userid` varchar(255) NOT NULL,
  `donasi_gdid` varchar(255) NOT NULL,
  `donasi_jml` int(11) NOT NULL,
  `donasi_bank` varchar(255) NOT NULL,
  `donasi_status` int(11) NOT NULL,
  `donasi_doa` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_donasi`
--

INSERT INTO `tb_donasi` (`donasi_id`, `donasi_tgl`, `donasi_time`, `donasi_userid`, `donasi_gdid`, `donasi_jml`, `donasi_bank`, `donasi_status`, `donasi_doa`) VALUES
('234dd9e577ac5892481bc60663ffa405', '2022-03-14 13:43:14', '2022-03-14', 'dd8d550bdca086653d8d3997e2d3a8a7', 'd44ea21d9f3f0734cb163b5fe8168cac', 2000000, 'MANDIRI', 2, 'Semoga cita-citanya tercapai'),
('39f3a91f7def5376b696f85ccde52382', '2022-03-11 07:40:22', '2022-03-11', '2478f263ea867250ce8fcbfd57c06fe4', '5855ca6943b39eebcf37a20cf7e4626c', 70000, 'MANDIRI', 2, 'Semoga dimudahkan urusan kita'),
('4445ce38acb3e04e637fd5c30557edbf', '2022-03-05 22:36:56', '2022-03-05', 'e10df082e702a9600c65f430a8bf8fed', '96c400a4b18a8c07772675977b43ce31', 24003500, 'Mandiri', 2, 'Semoga berkah'),
('4f20f7f5d2e7a1b640ebc8244428558c', '2022-03-12 11:01:33', '2022-03-12', '216f44e2d28d4e175a194492bde9148f', '96c400a4b18a8c07772675977b43ce31', 11996500, 'MANDIRI', 2, 'Semoga berkah'),
('8f378ebbb1e12e36cfb2229b251778ae', '2022-03-05 22:10:28', '2022-03-05', 'dd8d550bdca086653d8d3997e2d3a8a7', '5855ca6943b39eebcf37a20cf7e4626c', 750500, 'BCA', 2, NULL),
('ee76626ee11ada502d5dbf1fb5aae4d2', '2022-03-12 10:47:15', '2022-03-12', '975ff777e4f3c121942a6b8f51e26e9c', '96c400a4b18a8c07772675977b43ce31', 13000000, 'BRI', 2, ''),
('fbabbe3076a43f86b9b6d4cda87a4f57', '2022-03-12 10:45:16', '2022-03-12', '7ad874c1df47197ed606592e1a07c230', '96c400a4b18a8c07772675977b43ce31', 1000000, 'BRI', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_email`
--

CREATE TABLE `tb_email` (
  `email_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_email`
--

INSERT INTO `tb_email` (`email_id`, `email`, `email_password`) VALUES
(1, 'noreply@yukbantu.ahmadadha.com', 'D*.~;cT[AcnL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galang_dana`
--

CREATE TABLE `tb_galang_dana` (
  `gd_id` varchar(255) NOT NULL,
  `gd_url` text NOT NULL,
  `gd_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gd_time` date NOT NULL,
  `gd_tgl_selesai` date NOT NULL,
  `gd_userid` varchar(255) NOT NULL,
  `gd_judul` varchar(255) NOT NULL,
  `gd_isi` text NOT NULL,
  `gd_dana` int(11) NOT NULL,
  `gd_foto` varchar(255) NOT NULL,
  `gd_status` int(11) NOT NULL,
  `gd_alasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galang_dana`
--

INSERT INTO `tb_galang_dana` (`gd_id`, `gd_url`, `gd_tgl`, `gd_time`, `gd_tgl_selesai`, `gd_userid`, `gd_judul`, `gd_isi`, `gd_dana`, `gd_foto`, `gd_status`, `gd_alasan`) VALUES
('5855ca6943b39eebcf37a20cf7e4626c', 'bantu-kakek-abcd-yang-hidup-sebatang-kara', '2022-03-05 21:37:00', '0000-00-00', '2022-03-31', '08860acb2e1ce88385ffe4badc802922', 'Bantu Kakek ABCD Yang Hidup Sebatang Kara', 'bantu kakek ABCD yang hidup sebatang kara', 10000000, 'a9f079c9a94dadc00ff0597b4a1638e1.png', 1, NULL),
('96c400a4b18a8c07772675977b43ce31', 'bantuan-air-bersih-untuk-saudara-kita-di-pelosok', '2022-03-05 21:49:48', '0000-00-00', '2022-04-08', '08860acb2e1ce88385ffe4badc802922', 'Bantuan Air Bersih Untuk Saudara Kita Di Pelosok', 'bantuan air bersih untuk saudara kita di pelosok', 50000000, '25c3613ca8c39998e68dd619b1158a81.png', 2, NULL),
('d44ea21d9f3f0734cb163b5fe8168cac', 'bantu-adik-qwerty-untuk-bisa-kembali-bersekolah', '2022-03-12 08:09:16', '0000-00-00', '2022-04-10', '5464028132750fc3d9705f63c4804a09', 'Bantu Adik QWERTY Untuk Bisa Kembali Bersekolah', 'bantu adik QWERTY untuk bisa kembali bersekolah', 60000000, 'b6182e608b4aa0cce7c54ae56ebf18eb.png', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_inbox`
--

INSERT INTO `tb_inbox` (`id`, `nama`, `email`, `subjek`, `isi`, `tgl`) VALUES
('8d262ec96f07a05f6ac6f8f1f68efeac', 'Muhammad Deni', 'mdeni@gmail.com', 'Registrasi', 'Saya gagal registrasi', '2022-03-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kat_id` varchar(255) NOT NULL,
  `kat_nama` varchar(255) NOT NULL,
  `kat_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kat_id`, `kat_nama`, `kat_url`) VALUES
('41600d0346fcb212b113e95dde1d906c', 'Info Terkini', 'info-terkini'),
('98cf4846deaa135dd2601b3afbed5086', 'Uncategorized', 'uncategorized');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `nama`, `telp`, `email`, `facebook`, `instagram`, `twitter`, `alamat`) VALUES
(1, 'Yuk Bantu Indonesia', '085732879010', 'yukbantuindonesia@gmail.com', '', '', '', 'Flat 20, Reynolds Neck, North Helenaville, FV77 8WS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` text NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_telp` varchar(15) NOT NULL,
  `user_password` text NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_dokumen` varchar(255) DEFAULT NULL,
  `user_alamat` text,
  `user_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_nama`, `user_email`, `user_telp`, `user_password`, `user_foto`, `user_status`, `user_dokumen`, `user_alamat`, `user_since`) VALUES
('08860acb2e1ce88385ffe4badc802922', 'Sahabat Kita', 'store.ahmadadha@gmail.com', '085289110271', '$2y$10$UNA0pO2MnGM73WlJeJbkneh4tR4Bkfb2PhOrm7OtVYPmcnZw6HauG', '0bd0f75bef82f608e0fca31eee2243cd.jpg', 1, '690c33da2b56079d255e0e0d721e5f77.jpg', 'Kediri', '2022-03-05 06:24:50'),
('1ca188ea50f3fc60a66b1aeec9622089', 'Olivia Nurjati', 'olivia@gmail.com', '08390328858', '$2y$10$GVygNwhyTNy3zawNdEEKQ.cZO0QY.LKQqhv2H.YPzNljQ4ZYPAh7C', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:05:29'),
('216f44e2d28d4e175a194492bde9148f', 'Oktavia Rahmadani', 'oktavia@gmail.com', '085150544076', '$2y$10$9Nwp8Izd1hzXwcdUrUyJaOA3QjWovdjp0KzZ9KOnk6xGbC07QM7Du', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:48:53'),
('2478f263ea867250ce8fcbfd57c06fe4', 'Jibril Putra Pratama', 'jibril@gmail.com', '081865405572', '$2y$10$1D1s93zqDH3gnaHwZrq8l.gJUbucFa65OsXn7TZ1JGKJf.rPvj.ue', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:45:52'),
('30219b29705d056409e50d7e369be507', 'Arif Teguh Maulana', 'arif@gmail.com', '081008647930', '$2y$10$0mpS9UcfUOZFfFlJzxwiletn32pvoP1mtDAk7Z70k/VYKRTXqzhqW', 'default_avatar.jpg', 0, NULL, NULL, '2022-03-09 02:41:03'),
('36455d3b4aa959a5a5799f2316c06660', 'Arman Rahmat', 'arman@gmail.com', '085390026783', '$2y$10$Y4dU/OUh4VJErh1W/5O2b.R/L0BPH1x738KiJ0ja.ZmJ0dQE2frXO', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:18:15'),
('5464028132750fc3d9705f63c4804a09', 'Muhammad Anzal Khafabih', 'anzal@gmail.com', '08887001621', '$2y$10$7xjTePCSv4IrM8R97fJCHeKcUpKTkgaoMAtpwHCnr.KLi4TLlTAy.', '6837eab7d49368cf3b12076309e61c5c.png', 1, 'fdbb7dc76a6490adf76f29bc3d95c525.jpg', 'Sidoarjo', '2022-03-09 02:48:17'),
('7ad874c1df47197ed606592e1a07c230', 'Akhmad Murtaqi', 'murtaqi@gmail.com', '081366081878', '$2y$10$71HvpZXIIAH92jLY6BkPxeEpBr3HjnuEoBHjXYurrBnuRT.7t.yEC', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:09:09'),
('8c7228219b23699f256dea45ba5cdf13', 'Sarah Rahmawati', 'sarah@gmail.com', '08747420554', '$2y$10$iExHXmkMwG3.JXHVERTejuxoXfZiYsyvsxl2Sxq2VW/AMGlQWhGMa', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:06:28'),
('8ccf849734993abe369360d16d262328', 'Ahmad Fatih', 'afatih@gmail.com', '081380027219', '$2y$10$50ifJqYShuF0D1WHdolR5umff3h.4czC8uQW3rzAqxZfy9ut1swIu', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-08 10:35:18'),
('975ff777e4f3c121942a6b8f51e26e9c', 'Citra Ariyanti', 'citra@gmail.com', '08926994462', '$2y$10$WwhtL2cBf0n/fmkNI01TJO7xkZGkfiIizysTUfpgwXykMOozXPD6C', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:41:36'),
('9f12f0dc21dfa09b139fd01c4045481d', 'Maelajanah', 'maelajanah@gmail.com', '081082558045', '$2y$10$PV1wp/F7dENdVyYHuOISGeGdJrYWTuqKsEtzgHrhsYgPlCd0jHWkm', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:47:30'),
('a4cd9bc071c923daab48132b0bb2e4f3', 'Dini Azhira Septiani', 'dini@gmail.com', '08540808309', '$2y$10$DGcXTyd73WaGxrMKzO4LTePWmpidyTi1cK4RlC.7fPSF3VcaDgdUu', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:10:48'),
('a71f9f47d27e10623154025319152a82', 'Fajriah Lestari', 'fajriah@gmail.com', '08762563356', '$2y$10$yLujJ2Oqn0r96M8WPJ3Ks.5xlDOWa4wZ1CLpHLb9ezJJzHQLhN2o6', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:44:51'),
('a93dddc1fd67c3a6409fafb5801d7d50', 'Almafiroh Umi Solihah', 'almafiroh@gmail.com', '081653438845', '$2y$10$XTbTcrWag2LM6psgRyB5p.pdRnCBVghYLRPPlXVfuk19PCjniRaS2', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:09:34'),
('ae581798565c3b1c587905bff731b86a', 'Ema Salamah', 'ema@gmail.com', '08132338760', '$2y$10$TrUOusTCHkvr1.H.flPJi.MwXpOXJAtIDHSIf/BvDgQChq9e3YOqi', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 02:43:24'),
('af5a968312f8d1e3246a966fac1606da', 'Septiani', 'septiani@gmail.com', '08954009302', '$2y$10$Hou6a.MUPvRGvziV9lBShe2lgLqGfPquHFL.G7RLbxOlvx41EmHPK', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:08:20'),
('b3f25f67fa7662dec75e006a97770e6c', 'Anas Helmy Afdila', 'anas@gmail.com', '081329886779', '$2y$10$XHiNxQUKetUd7JtHetViWuDPC1VffLWiRbVOL4yah5cilteLrPQ5W', 'default_avatar.jpg', 0, NULL, NULL, '2022-03-09 02:39:40'),
('bf40f0ab4e5e63171dd16036913ae828', 'Dewi Febrianti', 'febrianti@gmail.com', '08367906165', '$2y$10$7NwL0n7x5JQmYI77eTdPbObCM6wD2.qTuN.wB/O7QJSM9kNj2gn26', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:10:20'),
('d736bb10d83a904aefc1d6ce93dc54b8', 'Dwi Meliana Putri', 'dwi@gmail.com', '081037273299', '$2y$10$FdwJXRPZDJ0q5VO5crajZe90s2Y0rvkxTGhdQiG3VEM83.VfegQIO', '80e498e7b6baaec2c19536d5f6571b08.png', 1, NULL, 'Jl. Buaran Raya Blok D No. 100 Duren Sawit Jakarta Timur', '2022-03-09 02:42:49'),
('dd8d550bdca086653d8d3997e2d3a8a7', 'Agustin Eka Safitri', 'agustin@gmail.com', '081815274617', '$2y$10$AueXCE/kk5tjnxXukt14n.cx7oIgYLYG8W2dKVFMHLyOV4bzbYLES', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:08:43'),
('e10df082e702a9600c65f430a8bf8fed', 'Jeni Saputri', 'jeni@gmail.com', '081047046926', '$2y$10$p/nU4QgmXp0xoaj2oh7iRu2hoAGy.8489IKGb4XuEFWFsaaLNiZQW', 'default_avatar.jpg', 1, 'cb828bb26600cd0318bfb9b1e7631155.PNG', 'Kalimantan timur', '2022-03-09 02:45:21'),
('f7ab113fb2bdb9d5674ef9ab826d7979', 'Anggi Novita Sari', 'anggi@gmail.com', '08892778916', '$2y$10$AGeA2.N1ECnviMSwHGA.H.hjz2XGdg3GuAeKN.5jTtJpv./39Faie', 'default_avatar.jpg', 1, NULL, NULL, '2022-03-09 06:09:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_withdrawal`
--

CREATE TABLE `tb_withdrawal` (
  `wd_id` varchar(255) NOT NULL,
  `wd_tgl` date NOT NULL,
  `wd_dari` varchar(255) NOT NULL,
  `wd_gdid` varchar(255) NOT NULL,
  `wd_jumlah` int(11) NOT NULL,
  `wd_tujuan` text NOT NULL,
  `wd_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_withdrawal`
--

INSERT INTO `tb_withdrawal` (`wd_id`, `wd_tgl`, `wd_dari`, `wd_gdid`, `wd_jumlah`, `wd_tujuan`, `wd_status`) VALUES
('2961e81dfb2ddaa93aa482cbaebaa91c', '2022-03-14', '08860acb2e1ce88385ffe4badc802922', '96c400a4b18a8c07772675977b43ce31', 25000000, '71048711022 BCA An. Sahabat Kita', 1),
('abebb7c39f4b5e46bbcfab2b565ef32b', '2022-03-13', '08860acb2e1ce88385ffe4badc802922', '96c400a4b18a8c07772675977b43ce31', 22500000, '71048711022 BCA An. Sahabat Kita', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indeks untuk tabel `tb_donasi`
--
ALTER TABLE `tb_donasi`
  ADD PRIMARY KEY (`donasi_id`);

--
-- Indeks untuk tabel `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indeks untuk tabel `tb_galang_dana`
--
ALTER TABLE `tb_galang_dana`
  ADD PRIMARY KEY (`gd_id`);

--
-- Indeks untuk tabel `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_withdrawal`
--
ALTER TABLE `tb_withdrawal`
  ADD PRIMARY KEY (`wd_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
