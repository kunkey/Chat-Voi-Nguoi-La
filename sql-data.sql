-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 23, 2020 lúc 12:02 AM
-- Phiên bản máy phục vụ: 10.3.22-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fansubhd_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_data`
--

CREATE TABLE `chat_data` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `online`
--

CREATE TABLE `online` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(2555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text NOT NULL DEFAULT '0',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `online`
--

INSERT INTO `online` (`id`, `name`, `username`, `status`, `time`) VALUES
(244, '', '', 'true', 1584896491);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ready_chat`
--

CREATE TABLE `ready_chat` (
  `id` int(255) NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_by` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `go_room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `go_by` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fbid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(255) NOT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fbid`, `admin`, `name`, `username`, `password`, `email`, `sex`, `avatar`, `money`, `token`, `ip`, `time`) VALUES
(1, '0', 1, 'ADMIN Đẹp Trai', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'mm13571234@gmail.com', 'male', 'https://graph.facebook.com/v6.0/242487320476725/picture', '999', 'b7ae24473b42f4fe7d16fac2921d8a6c7ad6f6771f6ac9f3a02790ec135f', '14.171.32.156', 1852165),
(12, '0', 0, 'Kun Đẹp Troai', 'VuDuyLuc', '3a031f8fe218b0b355a60320ba4861c0', 'mm13571234ssds@gmail.com', 'female', 'https://audit-controle-interne.com/wp-content/uploads/2019/03/avatar-user-teacher-312a499a08079a12-512x512.png', '0', 'fce17dcdfa20c59eb9604827c0a8ace324f08bd0d7ba9a8e6a9c0f627aea', '14.188.126.43', 1584193306),
(13, '729543747876619', 0, 'Anh Lee', '729543747876619', '63a23fc0e0efb0eecdbcc15e310978c6', 'anh0853658928@gmail.com', '', 'https://graph.facebook.com/v6.0/729543747876619/picture', '0', '720fcec4d96700df96a4ba1e5deabf29ddf4c580bdf4cac6c57ab18ce734', '14.165.36.220', 1584193842),
(16, '0', 0, 'xnxxcom', 'Tú Sex', '34c30083aaad0cbad93051df5d56df80', 'tusex@xnxx.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', '7abc50d1ea8a16ec3830c2a730c2f161c6ab3999c88ddc1169fa7a85e7b1', '113.182.120.135', 1584253828),
(15, '0', 0, 'Nguyễn Đình Thái', 'thaidavid', '4297f44b13955235245b2497399d7a93', 'thai36798@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', 'dab99bd474c0af81c00f04060587c81756320929cd85ff1a96a0542c539d', '2402:800:610d:7d9b:79ac:715b:3610:cddd', 1584253504),
(14, '494250131455015', 0, 'Vũ Duy Lực', '494250131455015', '82f98b35c72fb98a9f23f362563c6c2b', 'mm13571234@outlook.com', '', 'https://graph.facebook.com/v6.0/494250131455015/picture', '0', 'c6c1606f4fe86177ce09b5cb0248458d9a46237615bc63f4b0d9ed973b1f', '113.185.45.104', 1584253245),
(11, '242487320476725', 1, 'Vũ Duy Lực', '242487320476725', 'a46f34993548554db4d0a572efe0a5d1', 'mm1357123@yahoo.com', 'male', 'https://graph.facebook.com/v6.0/242487320476725/picture', '0', '6f94e0e276783f0b7452a0fabbcfe04e4bbbd10709b68eb2041be7d39e74', '192.241.181.49', 1584192867),
(17, '0', 0, 'Vũ Hoàng Bảo', 'baovipytbg', '930d04e6cf9ab96632f21c71de187ecf', 'baocoi2040@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', 'e91da0973c3fb12d8f71d8fbd09f103077995a5e99bc3b9293f6e6174216', '2402:800:6130:ac92:d414:7adb:ace9:2498', 1584254111),
(18, '0', 0, 'Datcyber', 'Datcyber', '7255e805a1b67543abfa3fb1b790766e', 'Datcyber@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', '3d419f33060eb26bc9471d81e62fa7849fc9006f591f949bb0533c6be6ff', '1.55.239.132', 1584254553),
(19, '0', 0, 'Kun Đẹp Trai', 'kundeptrai', '124bd1296bec0d9d93c7b52a71ad8d5b', 'mm13571234cfds@gmail.com', 'female', 'https://audit-controle-interne.com/wp-content/uploads/2019/03/avatar-user-teacher-312a499a08079a12-512x512.png', '0', '3d154911c849135f88a4254802a929df196ae4c7dfec5b326a376123f18a', '14.188.126.43', 1584255031),
(20, '252906782392914', 0, 'Đỗ Thi', '252906782392914', 'cf0092b80bd83c492cddd33de67c8be8', 'caothuthi0850@gmail.com', '', 'https://graph.facebook.com/v6.0/252906782392914/picture', '0', 'f0b7418f59e4ab4e0bbf6282c1a1a550de5c1d90b390fd723742aa5e21b4', '171.224.181.208', 1584255607),
(21, '0', 0, 'kun Pro', 'Kundz123', 'e10adc3949ba59abbe56e057f20f883e', 'mm1357das1234@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', '892ff2a920c6d5d665e82b4b5a260737067ec8817e3875cda31ec19549c1', '116.107.225.61', 1584263621),
(22, '10149999114370619', 0, 'Joe McCormack', '10149999114370619', '797f3d250bd6d7a4e1f1cb196d8bab94', 'joe.mccormack2020@gmail.com', '', 'https://graph.facebook.com/v6.0/10149999114370619/picture', '0', 'be4974442611067fa226c33d34b7f5251220abe74b054e037dd5c323d9e0', '2620:10d:c092:200::1:e933', 1584267107),
(2, '0', 1, '<b><font color=\"#3366ff\">Ngọc Trinh</font></b>', 'bot', '19feda0b2522a33bde7981b72e95625c', 'ngoctrinh@gmail.com', 'female', 'https://res06.bignox.com/noxinfluencer/youtube/avatar/1ca45560682ccad441424669c467f6ae.png', '1000000', 'xnxx', '0', 17432144),
(23, '0', 0, 'Kun Đẹp Trai', 'kunkeypr', 'e10adc3949ba59abbe56e057f20f883e', 'mm13571234dyd@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', 'b1360de523166aaf313e0ef1d6de677f34c764295b4cb38215d83c1bef64', '113.185.45.211', 1584294354),
(24, '0', 0, 'Cân ALL Bọn M', 'thangkuro', 'a46f5ad39bcd66afde4ba2aa2040e813', 'emailne@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', '972a8e873ed7f2d0e342fc76347c063c000ee7588e61af951600dcf4892d', '2405:4800:74d7:49aa:9d:c35a:d4ac:9c44', 1584297032),
(25, '0', 0, 'hellohello', 'hellohello', '25f9e794323b453885f5181f1b624d0b', 'helooll@gmail.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', '3fccfc825f5e499dc444f282b48ddabbb0cb092d15d99b4cced51ea8aaed', '115.73.157.135', 1584338392),
(26, '0', 0, 'Tú Sex', 'Xnxx.Com', '34c30083aaad0cbad93051df5d56df80', 'admin@xnxx.com', 'male', 'https://i.ya-webdesign.com/images/avatar-png-1.png', '0', '4051652466be6a57992cda75e53a49ed6994d477cd115739c0de1d9e0338', '14.184.161.247', 1584369940),
(27, '0', 0, 'Người lạ d51a2744', '0fcf5e38f05a', '827ccb0eea8a706c4c34a16891f84e7b', 'e2b040303f6a06361cfd9bfcec72fa7f@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '4f84314cc92ac560c669593c63c55d8c3aea7c8a499118d59db84db0fa80', '116.107.227.198', 1584524236),
(28, '0', 0, 'Người lạ 5f165779', 'a1992be9ef86', '827ccb0eea8a706c4c34a16891f84e7b', '42157e6f2cceefa21274cc6521327fcc@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '3915a912c83c53be874f4ede78358a6a59da40375ffb8b156c2e7b0222cd', '116.107.227.198', 1584524350),
(29, '0', 0, 'Người lạ f62fe8ff', 'c66d538d6f34', '827ccb0eea8a706c4c34a16891f84e7b', '5eae0d63fb8b9e485029813aff7c757d@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '347a0de0d16d1ed03fcc2e452b72abc7c4edb72877e3652cb1da56a5b23a', '14.188.126.43', 1584529237),
(30, '0', 0, 'Người lạ e75d6f02', '40ac31dbb1e1', '827ccb0eea8a706c4c34a16891f84e7b', '89bcf586338ced55eb57852ab277e92e@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'ad7b3d88adeb323869a05ef5b347ce97d8bca3e54410d834e2b8ce4c5e14', '113.185.45.156', 1584533279),
(31, '0', 0, 'Người lạ bf975d77', 'b0d14856cbfe', '827ccb0eea8a706c4c34a16891f84e7b', 'c26b7536f45cd432b2f93daca945a924@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'fde74013677c5980226c5377963a4443fce7198d98b566a906ff78ca5067', '14.188.126.43', 1584536723),
(32, '0', 0, 'Người lạ 2dd0680b', '5607c4468b87', '827ccb0eea8a706c4c34a16891f84e7b', '23ce64f9ceea4c19a769b1a6726a8d14@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '66b73f3c0c37fba2e2188ab2b8aacbce4fc72a086eb1e24381d1b4bd3644', '66.249.65.153', 1584537522),
(33, '0', 0, 'Người lạ 83028d7d', 'e8a386405bdf', '827ccb0eea8a706c4c34a16891f84e7b', 'd6e5dec3333f042d54b4885c06f2a441@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'c82fe2c4b9980c8975e6a85485128541c71d2af901127889ccb43e3ecb34', '113.185.45.156', 1584540218),
(34, '0', 0, 'Người lạ c83d91dc', 'e16c8b252796', '827ccb0eea8a706c4c34a16891f84e7b', 'a0ce8cf0a9a8da31d52204143fcbdb2a@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '2857f90fd3a2192cfde7c7f4c6aa22e9cd3333e2376e946e28ca334b779b', '14.188.126.43', 1584548113),
(35, '0', 0, 'Người lạ 7695de6e', 'd02b9f6bb80c', '827ccb0eea8a706c4c34a16891f84e7b', 'eb48d840b221d6dc02351d838e9a8244@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '61dfb5b2766a02f1bfd6ce0a44db30ae6c30e6783dea095215950906ee78', '14.188.126.43', 1584548840),
(36, '0', 0, 'Người lạ 9effcbe2', 'b872b3a87f70', '827ccb0eea8a706c4c34a16891f84e7b', '275d7a52e785dee86c7b8446d5a5b9f3@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '62c4e29bf350b0315f1644f3ea09d428dd86b529ea9803cbdf5341c08a30', '14.165.36.220', 1584578671),
(37, '0', 0, 'Người lạ e3c271da', '525fd3131955', '827ccb0eea8a706c4c34a16891f84e7b', '35b4cd046444cfe2a62c65ae7c6b87f8@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'fb01f8396148fb2e7a09cccf6537ac04e3decd22237ac81acf3df99e2a23', '117.1.227.53', 1584601873),
(38, '0', 0, 'Người lạ da5396cc', '8e9ab2e9c787', '827ccb0eea8a706c4c34a16891f84e7b', '337d93cf93693613862d70f6bbdce646@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '7d42192c42e65c1dd3d71cd694bbd0b725735d95d74d0e910d2bb9a04e17', '117.1.227.53', 1584606649),
(39, '0', 0, 'Người lạ 9187b9a6', '55b240d98872', '827ccb0eea8a706c4c34a16891f84e7b', '8636906dddbff346bb2d7b9b70285296@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'd78133e4e72d7bd6c6e89c995c638289deac9ca1a1c433e1bbb2fa372629', '113.185.45.156', 1584607191),
(40, '0', 0, 'Người lạ f8dea88a', 'd9f586a86a4d', '827ccb0eea8a706c4c34a16891f84e7b', '9217ba03de70817901efec5f36cbce78@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'f8aceaccdd9100df169cd6d42d79f4793ed6c7017de3a4da737e7ac5fc82', '113.185.45.156', 1584621946),
(41, '0', 0, 'Người lạ 640cc838', '5514efa5c263', '827ccb0eea8a706c4c34a16891f84e7b', 'd3713651f1ed286c79b5b2420697cf9f@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'b97343a0b0b120121647bcd623abffedffc48ef7f8ed786569bb2dbf99b3', '113.185.45.156', 1584623266),
(42, '0', 0, 'Người lạ 3ceec466', '9d0cd924c033', '827ccb0eea8a706c4c34a16891f84e7b', '2576f8862faefd472469b95bf91ce1c6@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '002e1d648a78db8bbf1feabf208d1cfabe41effb0e4a61bbc40fbdaf580b', '14.188.126.43', 1584627972),
(43, '0', 0, 'Người lạ 2f4be555', '37910c250939', '827ccb0eea8a706c4c34a16891f84e7b', 'c5b364229627d777868f759956b8f0cd@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '2005c79ff17d982f292f178810930d6ffd4014d30d8269109314999c2b42', '14.188.126.43', 1584631851),
(44, '0', 0, 'Người lạ a581f1e6', '68aa4a754533', '827ccb0eea8a706c4c34a16891f84e7b', 'fd4fdc6ea2f31bbeaddd7e510f85a7dc@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'decdc40b936687833fc10cec24afa74434ac17fc43d7e969dff7ea2c482a', '113.185.45.156', 1584633987),
(45, '0', 0, 'Người lạ 3c1e4a19', '66fd13c23a30', '827ccb0eea8a706c4c34a16891f84e7b', 'fff1c58008d89040d8a1e572e3ac0c2f@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '63aa37e71968476c65912e961c9efd907e221698a2e367973fba4db781cc', '113.185.45.156', 1584676425),
(46, '0', 0, 'Người lạ d80a378d', 'fb9a365c2fbf', '827ccb0eea8a706c4c34a16891f84e7b', '9963f16eed838778953806649bbefd36@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '8e8bdf3e0f335de0dfbfd5ea867ed5a26cdd4967fab90a46a93934517401', '14.165.36.220', 1584676675),
(47, '0', 0, 'Người lạ 19ad2b67', 'e0004ca088fd', '827ccb0eea8a706c4c34a16891f84e7b', 'a11439dd56a375997853df7054339e58@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'bd5e9c4da99f46d3be523157141f8192a6cea7542bbfd835d281db1c1482', '14.188.126.43', 1584677155),
(48, '0', 0, 'Người lạ 813e0a75', 'e6b4eccb7894', '827ccb0eea8a706c4c34a16891f84e7b', '6bfc4a78938ba7b52a089fd612efe841@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '425a4f2711b1613c88ce1540bb3c9093a3f26d2ea86c44cc4a0e206e9a23', '14.188.126.43', 1584682354),
(49, '0', 0, 'Người lạ 6271f4f6', 'e23d6324aadd', '827ccb0eea8a706c4c34a16891f84e7b', '6bbb30aa9a2d4f62658ef2e33a07332a@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '1b572142dfbabc8e4fdacb21beca0e9bd3849cebc47cf9dafb24d8c73bfb', '2402:800:6130:ac92:f154:25bd:a430:6f10', 1584683574),
(50, '0', 0, 'Người lạ c33ee03b', '083db8b1863c', '827ccb0eea8a706c4c34a16891f84e7b', 'a2570b5685a9233827bbee46064fd961@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '9db68ecb928df1189390602a7124841eb481f85f0e406028747e3a3c0540', '2402:800:6130:ac92:f154:25bd:a430:6f10', 1584683622),
(51, '0', 0, 'Người lạ e25b3553', '21145815e130', '827ccb0eea8a706c4c34a16891f84e7b', 'ea7645a59f45ff3027e16432e4424a9f@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '7776a9a674efcea7f194862f8e6ea0fde05a0e34f111d85da2d28b2a519d', '113.170.45.75', 1584683812),
(52, '0', 0, 'Người lạ b20e95c9', 'beffe3777eab', '827ccb0eea8a706c4c34a16891f84e7b', '9e2178577a223c715137c244906159df@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '4c931c26cd19e8a0e65b1a08fb9061b6ed96b3a1c9959e29e318e5d1a426', '2402:800:610d:4eae:88e9:49d6:d1a0:2ae5', 1584689767),
(53, '0', 0, 'Người lạ b8e6bbfd', '756014e7d24d', '827ccb0eea8a706c4c34a16891f84e7b', 'dea1e42014f1f6ddd4d2d380082c0a6b@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'fbae021cc32b711f92723ef482e75b178410a1a104b9a3e2bfc4c681be9a', '2402:800:4177:220d:7a68:1970:5d89:df8f', 1584696809),
(54, '0', 0, 'Người lạ b0b7b7c9', '55c81f3a15d5', '827ccb0eea8a706c4c34a16891f84e7b', '15a98252c61aa55c64686510a4a69818@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '4dff46e4a20f3e7a67b14dd24bb8bf32e85a43a15b2089c4f7fa646a81e7', '113.170.45.75', 1584704503),
(55, '0', 0, 'Người lạ 070f14df', '3587b0f8b0b3', '827ccb0eea8a706c4c34a16891f84e7b', '94a090175cbd7a18455bb2fcaedcb99b@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'ad6ab8ae51dd1eaefe70fd787057e75fb2cb882109c7ddfc869193701d92', '14.188.126.43', 1584706845),
(56, '0', 0, 'Người lạ e128cf9b', '7c4c0bedfe95', '827ccb0eea8a706c4c34a16891f84e7b', '3dae14ec145b9942d455e0f12c5f33f0@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'd14ecd1054a8db6e4dc794688261090cc9523a455d81800967de9ea3ce56', '14.188.126.43', 1584707121),
(57, '0', 0, 'Người lạ ed66f8c1', 'c5550225498a', '827ccb0eea8a706c4c34a16891f84e7b', '0d383fa5e06039020e36d438e7e6d2bb@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '3e899556127084e7fa155e680323d8fba5e53a2ea3f480ac2d0e089ea9f0', '2001:19f0:4400:42fb:5400:2ff:fe9e:62f', 1584707422),
(58, '0', 0, 'Người lạ 7ad20582', '466d6e574843', '827ccb0eea8a706c4c34a16891f84e7b', '18eacd2fc4cb53dafda5ed8436a0c842@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'f8b60ec5526e6bcfd039deeb846aa0deeaeecb059c6878d9ac575b2a0e43', '103.131.71.75', 1584710793),
(59, '0', 0, 'Người lạ 435e4b8e', 'd05f9455a7d2', '827ccb0eea8a706c4c34a16891f84e7b', 'ae8f34fc9fc28a98b5d25a220e8d1b9f@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '5d94864bdd99563659ebf798db53f4ec904b629c42bbff29a6cc6b38b913', '14.188.126.43', 1584719390),
(60, '0', 0, 'Người lạ 2ee52d30', '3e0356f080b2', '827ccb0eea8a706c4c34a16891f84e7b', '866033228cc77fa12c8b7f008e257ce0@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '862ce81659e86aad260d431a7e0e038e304e96a0c173872c5fc360df23f7', '103.131.71.78', 1584720218),
(61, '0', 0, 'Người lạ 0127a181', 'fb9a25e96295', '827ccb0eea8a706c4c34a16891f84e7b', '910b07bebc1ad517e93b22dc18420c35@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '88a37627d89d401269f895e26c0e5f1528dd75cecf02ff69159ecf8ac6fc', '14.188.126.43', 1584722028),
(62, '0', 0, 'Người lạ 93cefb22', '897782fe2100', '827ccb0eea8a706c4c34a16891f84e7b', '3d77bf40459fed1a0efbec867f66147a@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '458f6b9c8370e4a0d9d408dd571facf5ff2bb2b50a32dfa4cf8896bee37c', '113.185.44.250', 1584724838),
(63, '0', 0, 'Người lạ 72242432', '3244fb5d43ce', '827ccb0eea8a706c4c34a16891f84e7b', 'e738a331fff55a16454627cc7909a403@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'd3394d58c18eff81174e125ba6495bb30764e4246fa619de8778d803fdc3', '14.188.126.43', 1584727744),
(64, '0', 0, 'Người lạ dc64572f', 'c63f90780531', '827ccb0eea8a706c4c34a16891f84e7b', 'f17f835791b89ab04cffdc1ccfed1ae8@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'ea08ebb55d85c8579872a190bd2085ff73000785a5147b527a511fe9eaa0', '14.188.126.43', 1584764866),
(65, '0', 0, 'Người lạ 2b62f3d8', 'e6a219aed5be', '827ccb0eea8a706c4c34a16891f84e7b', '90c7bb8bd7110c2b3979573497416131@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '152ad3f88d77f0c5d0afcebf1ca49ecc766297f74a6fd5065487ebd1bffa', '113.185.44.250', 1584764878),
(66, '0', 0, 'Người lạ dd165690', '7977bec70bc1', '827ccb0eea8a706c4c34a16891f84e7b', 'af43a4636dd68fc3251d6f3cdede45e6@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '945a9fd52cd4b535e7f398d9dcd0da64685780c3dea1553743b80f11154c', '14.188.126.43', 1584765380),
(67, '0', 0, 'Người lạ 62e94eca', '3a8cc8139e8c', '827ccb0eea8a706c4c34a16891f84e7b', '6892c66782905e3940579ed36388d3ef@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '9f6aa7b08e9ab440772a2dba3d5b31cc4a65f24a787a218af04a6b744031', '113.185.44.250', 1584769418),
(68, '0', 0, 'Người lạ 238788d1', '103b7d0493ba', '827ccb0eea8a706c4c34a16891f84e7b', '99a93714cdec61479b26b5365cd237a7@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '89ed5031b7d2f3f5da1cc683cae79e02e5f5949df814d425c3044682188c', '14.165.36.220', 1584770270),
(69, '0', 0, 'Người lạ 43c7a002', '9e8fd7f5da19', '827ccb0eea8a706c4c34a16891f84e7b', 'aa1a28e7bc8471f3e852beac5b495ae6@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '1fda6ab04e72bebfe93dc2d01c3e851896fba9884314dfba207e40d0f1d9', '113.170.45.75', 1584770592),
(70, '0', 0, 'Người lạ cc46b735', '7032ca00dc6f', '827ccb0eea8a706c4c34a16891f84e7b', '84bcdaea73d5a5376a48f7edd32a5de6@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'bd1c8485fce4d84c038b60a30129a8f315fc928679c0f10766f934e0d158', '14.188.126.43', 1584791119),
(71, '0', 0, 'Người lạ 5d9e0df5', '75e689ff7f9a', '827ccb0eea8a706c4c34a16891f84e7b', '9a5e504fcee4e557e5462b8c2a0251fe@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '2ec0defee6011d93547a0c3b6cfd9ed783c9071b689d8f29068868dd7ebe', '113.185.44.250', 1584791143),
(72, '0', 0, 'Người lạ 596ca29a', '183cfd4e451f', '827ccb0eea8a706c4c34a16891f84e7b', '2c96967e29fb783f182f51efa72bf918@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'cf82d4682b2f7a4663303eb555b8691af2bdc61b360586c89da9adc1fee6', '2402:800:4420:b3fd:8557:3f8f:5d3e:fece', 1584795473),
(73, '0', 0, 'Người lạ 07ec8fd2', '64d956461493', '827ccb0eea8a706c4c34a16891f84e7b', '2d6cf399d675ec466094bfa4a4181a9c@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '31cf1c3e8d88f5affa77b7180d06fd1cc9d6c4318810011287796e6a6d04', '2402:800:4420:b3fd:8557:3f8f:5d3e:fece', 1584795651),
(74, '0', 0, 'Người lạ f29f6caf', 'ace1d1256397', '827ccb0eea8a706c4c34a16891f84e7b', '8734b744822fe363417b838340e912c1@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '4cf30d4936a0c8108b8f5b06bfe471b27055569084d92b52122b1a313c1f', '2402:800:4420:b3fd:8557:3f8f:5d3e:fece', 1584795780),
(75, '0', 0, 'Người lạ 53fa38f8', '59a3816611a3', '827ccb0eea8a706c4c34a16891f84e7b', 'eb72ab75291a993cc37a1e9e4d318acc@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '4fd84d16a16c710929d445d54b3ae67874a25a96e313d20f4818b7d35ccf', '58.186.127.216', 1584796211),
(76, '0', 0, 'Người lạ d937e246', '882b48a49e6c', '827ccb0eea8a706c4c34a16891f84e7b', '9548e91bec707460221858b9d6342a3f@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '8c81c9dafcf6f1ff1f126486dddf34a2ee95ede27a7f88a73e82decc9d0e', '14.244.235.216', 1584796213),
(77, '0', 0, 'Người lạ 2c4e4fb8', 'ce317c430da7', '827ccb0eea8a706c4c34a16891f84e7b', 'cebc86439cf3bc59995ab1f053b3daac@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'fe9fa6c68aca24deedd88a4aaa8b6050aed3f566fbc48eac2869fbb2960c', '2402:800:610d:cd4:e4b0:167f:131c:1470', 1584796221),
(78, '0', 0, 'Người lạ 075c416d', '95dcf8a42eec', '827ccb0eea8a706c4c34a16891f84e7b', '447901bb7327daba53a3d6089d6e9ef6@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '1c92a6ad13796bc10501c1751fc27a359044bdc0f7eb3aafd069d8026995', '14.244.235.216', 1584796458),
(79, '0', 0, 'Người lạ 6631ffd8', '2e4b180998e7', '827ccb0eea8a706c4c34a16891f84e7b', '509992af61f5f2804c05510c6a64d707@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '33c1981c1075e755286ed148d8ccd05e41dd94280681e2a6f43f59de2a14', '113.185.44.250', 1584801220),
(80, '0', 0, 'Người lạ a5bd1beb', '90fb90e8779b', '827ccb0eea8a706c4c34a16891f84e7b', 'e7762c4c05220ea355c34376d2798616@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '030c3471c2cfaa760fcf63b637e313b363189bfd3b39b979d7e67cb54b03', '104.168.182.234', 1584838183),
(81, '0', 0, 'Người lạ 803a64f5', '32b1541a97f4', '827ccb0eea8a706c4c34a16891f84e7b', 'a512405d04f9ee039619e42423b9db5d@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '0f71044782e126d8d785ed43d37a140167e12135e422367cee0d881178c1', '14.188.126.43', 1584847945),
(82, '0', 0, 'Người lạ 4db58a4e', 'bf2b20bd28f9', '827ccb0eea8a706c4c34a16891f84e7b', '99eb44c406d1179c0f72af4d63c556d8@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', 'f882a5c4a347bbe83d3a9324d285fa5ee3292ec18fcc19ea59f0b44a7893', '14.188.126.43', 1584850971),
(83, '0', 0, 'Người lạ 16db56f1', '580e373b5b93', '827ccb0eea8a706c4c34a16891f84e7b', '6e00834e217101367f8ba1e2391ad41d@gmai.com', 'male', 'https://cdn3.iconfinder.com/data/icons/essentials-vol-1-1/512/User-2-512.png', '0', '1cd27e7e75c1f65add1b5baf0c35acdf903cb239c5c9b06ef44468900d52', '14.188.126.43', 1584851018);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ready_chat`
--
ALTER TABLE `ready_chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `online`
--
ALTER TABLE `online`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT cho bảng `ready_chat`
--
ALTER TABLE `ready_chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
