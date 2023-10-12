-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 12, 2023 lúc 05:41 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lar_mobifonekv4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about_us`
--

CREATE TABLE `about_us` (
  `id` smallint(6) NOT NULL,
  `content` text NOT NULL,
  `photo_about` varchar(50) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about_us`
--

INSERT INTO `about_us` (`id`, `content`, `photo_about`, `image_path`, `slug`, `created_at`, `updated_at`) VALUES
(3, '<p style=\"text-align:justify;\"><strong>Công ty Dịch vụ MobiFone Khu vực 4</strong></p><p style=\"text-align:justify;\">Công ty Dịch vụ MobiFone Khu vực 4 được thành lập vào ngày 10/02/2015, là đơn vị trực thuộc Tổng Công ty Viễn thông MobiFone, chịu trách nhiệm kinh doanh trong phạm vi 13 tỉnh/thành phố bao gồm: Vĩnh Phúc, Phú Thọ, Lào Cai, Yên Bái, Sơn La, Lai Châu, Điện Biên, Ninh Bình, Hà Nam, Hoà Bình, Nam Định, Hà Giang, Tuyên Quang.</p><p style=\"text-align:justify;\">Trụ sở của công ty được đặt tại Khu Đồng Mạ, Đường Nguyễn Tất Thành, TP Việt Trì, tỉnh Phú Thọ.</p><p style=\"text-align:justify;\"><strong>Tầm nhìn:&nbsp;</strong></p><p style=\"text-align:justify;\">Nhằm cụ thể hóa những nội dung của Chiến lược phát triển kinh tế-xã hội giai đoạn 2021-2030, Chiến lược phát triển các doanh nghiệp thuộc Ủy ban Quản lý vốn nhà nước tại doanh nghiệp, tầm nhìn phát triển đến năm 2030 của MobiFone được thể hiện rõ nét trong thông điệp&nbsp;<strong>“Sáng tạo tương lai số”.</strong>&nbsp;</p><p style=\"text-align:justify;\">MobiFone hướng đến trở thành nhà cung cấp hạ tầng, giải pháp/ nền tảng và dịch vụ số hàng đầu tại Việt Nam và quốc tế.</p><p style=\"text-align:justify;\">MobiFone mang tới các nền tảng, công nghệ, giải pháp ưu việt giúp các cá nhân, doanh nghiệp, tổ chức nhanh chóng chuyển đổi, hòa nhịp vào nền kinh tế số; góp phần sớm đưa Việt Nam trở thành quốc gia số.</p><p style=\"text-align:justify;\">MobiFone xây dựng hệ sinh thái số hoàn chỉnh đáp ứng mọi nhu cầu, đánh thức mọi tiềm năng và đồng hành cùng khách hàng kiến tạo tương lai số.</p><p style=\"text-align:justify;\">Đến năm 2035, MobiFone phấn đấu trở thành Tập đoàn Công nghệ có hệ sinh thái công nghệ (hạ tầng viễn thông, hạ tầng công nghệ, dịch vụ/giải pháp công nghệ) hàng đầu Việt Nam; với cơ sở hạ tầng công nghệ đáp ứng nhu cầu phát triển của thị trường và xã hội Việt Nam; phát triển, mở rộng các giải pháp công nghệ để đáp ứng yêu cầu của cuộc cách mạng công nghiệp 4.0 và xu thế vận động của nền kinh tế thế giới.</p><p style=\"text-align:justify;\"><strong>Sứ mệnh</strong>: Không ngừng đổi mới, sáng tạo và tạo dựng hệ sinh thái số hoàn chỉnh, đáp ứng mọi nhu cầu, đánh thức mọi tiềm năng, đồng hành cùng người Việt kiến tạo tương lai số, xã hội số và góp phần đưa Việt Nam sớm trở thành quốc gia số.</p><p style=\"text-align:justify;\"><strong>Định hướng hoạt động</strong>:</p><p style=\"text-align:justify;\">MobiFone duy trì là doanh nghiệp nhà nước chủ lực quốc gia về cung cấp các dịch vụ số; phát triển dịch vụ viễn thông di động sử dụng các công nghệ nâng cấp và công nghệ mới; phát triển hạ tầng dữ liệu ảo hóa, giải pháp số/nền tảng số và các dịch vụ nội dung số. MobiFone dịch chuyển thần tốc từ doanh nghiệp khai thác viễn thông truyền thống sang doanh nghiệp số.</p><p style=\"text-align:justify;\"><strong>Giá trị cốt lõi:</strong>&nbsp;</p><p style=\"text-align:justify;\">Đứng trước bối cảnh mới, với định hướng chuyển đổi từ kinh doanh dịch vụ viễn thông trở thành nhà cung cấp hạ tầng số và dịch vụ số tại Việt Nam, từng người MobiFone đồng lòng quyết tâm sẽ thực hiện theo định hướng văn hóa mới, bao gồm 04 giá trị cốt lõi là: THẦN TỐC - ĐỔI MỚI - CHUYÊN NGHIỆP - HIỆU QUẢ. Với ý nghĩa, người MobiFone cần Thần tốc trong hành động, Đổi mới trong suy nghĩ, Chuyên nghiệp trong công việc và Hiệu quả trong mọi hoạt động.</p><p style=\"text-align:justify;\"><strong>Lĩnh vực kinh doanh:</strong>&nbsp;</p><p style=\"text-align:justify;\">MobiFone định hướng tiếp tục đẩy mạnh việc chuyển đổi số và xây dựng hạ tầng số, hệ sinh thái số cho khách hàng, đối tác, xã hội. Phát triển có chiều sâu, mở rộng và tăng trưởng mạnh trong các lĩnh vực kinh doanh trụ cột: (1) Hạ tầng số (hạ tầng dữ liệu di động (kết nối 3G/4G/5G/…), hạ tầng Cloud, băng rộng cố định); (2) Nền tảng số, giải pháp số doanh nghiệp (tài chính số/thanh toán số, IoT, Giám sát thông minh, Bảo mật số, dịch vụ chuyển đổi số doanh nghiệp,...); (3) Dịch vụ nội dung số (Giáo dục, Chăm sóc sức khỏe, Quảng cáo, Âm nhạc, video, truyền hình OTT,...).</p>', 'banner_about.jpg', '/storage/about_us//12102023_022427_kvxYg0aYcN.jpg', 've-chung-toi.html', '2023-10-12 02:29:03', '2023-10-11 19:29:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `path` text NOT NULL,
  `type` tinyint(10) NOT NULL COMMENT '1/ slider, 2/ gallery',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `name`, `file_name`, `path`, `type`, `status`, `created_at`, `updated_at`) VALUES
(7, 'MobiFiber', 'slider-6.jpg', '/storage/image//11102023_092654_NRsmbNZOkK.jpg', 1, 1, '2023-10-11 14:59:17', '2023-10-11 14:54:26'),
(8, 'Hợp đồng điện tử', 'slider-3.jpg', '/storage/image//11102023_095459_1zx1oP2G13.jpg', 1, 1, '2023-10-11 14:59:54', '2023-10-11 14:59:54'),
(9, 'Gói cước data dung lượng lớn', 'slider-2.jpg', '/storage/image//11102023_102700_eSEJKO4oe3.jpg', 1, 1, '2023-10-11 15:00:27', '2023-10-11 15:00:27'),
(10, 'Gói MF159', 'slider-9.jpg', '/storage/image//11102023_102601_tbuu3oEAIa.jpg', 1, 1, '2023-10-11 15:01:26', '2023-10-11 15:01:26'),
(11, 'MobiEdu', 'slider-7.jpg', '/storage/image//11102023_104601_iNnoGWtToP.jpg', 1, 1, '2023-10-11 15:01:46', '2023-10-11 15:01:46'),
(12, 'MobiFone Money', 'slider-4.jpg', '/storage/image//11102023_100602_Yqb7OSXIz4.jpg', 2, 0, '2023-10-11 15:35:43', '2023-10-11 15:35:43'),
(13, 'Toàn công ty chỉnh sửa', 'banner_about.jpg', '/storage/image//11102023_103110_zMH8iFqehj.jpg', 2, 0, '2023-10-11 15:35:38', '2023-10-11 15:35:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_companies`
--

CREATE TABLE `info_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `map` text NOT NULL,
  `facebook` text DEFAULT NULL,
  `tiktok` text DEFAULT NULL,
  `zalo` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_logo_path` varchar(191) DEFAULT NULL,
  `image_favicon_path` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_companies`
--

INSERT INTO `info_companies` (`id`, `image_logo`, `favicon`, `address`, `email`, `phone`, `map`, `facebook`, `tiktok`, `zalo`, `youtube`, `created_at`, `updated_at`, `image_logo_path`, `image_favicon_path`) VALUES
(3, '2 xanh đỏ .png', 'English logo XĐ 2.png', 'Tòa nhà MobiFone - Khu Đồng Mạ - P. Tiên Cát - TP Việt Trì - T. Phú Thọ', 'mobifonekv4@mobifone.vn', '0899838838', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59471.43160630164!2d105.3398740486328!3d21.31242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f3b59d1746f7%3A0xcb2964dd35567dab!2zQ8O0bmcgdHkgZOG7i2NoIHbhu6UgTW9iaUZvbmUga2h1IHbhu7FjIDQ!5e0!3m2!1svi!2s!4v1690379681652!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.facebook.com/mobifonekv4.vn', 'https://www.tiktok.com/@mobifonekv4', 'https://zalo.me/626767492003379900?gidzl=pAGh9RQ-XN3Clo8gkwECSyAwBosZy8XqZRju8FEXt7sFjoWZyQtRUeYxVNJnh8qksxLvTJbFBvPiihk9Vm', 'https://www.youtube.com/channel/UCOsP75SL3f-EM7z4eylRbJQ', '2023-07-26 08:25:37', '2023-07-26 09:59:09', '/storage/logo/1/26072023_031649_2hQluK4cDl.png', '/storage/logo/1/26072023_031649_AsLj6o9gIu.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug_name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Trang Chủ', 'trang-chu', 0, '2023-07-14 02:14:09', '2023-07-14 02:14:09'),
(2, 'Về MobiFone KV4', 've-mobifone-kv4', 0, '2023-07-14 02:14:32', '2023-07-14 02:14:32'),
(3, 'Giới thiệu công ty', 'gioi-thieu-cong-ty', 2, '2023-07-14 02:43:31', '2023-07-14 02:43:31'),
(4, 'Hoạt động sxkd', 'hoat-dong-sxkd', 2, '2023-07-14 02:44:04', '2023-07-14 02:44:04'),
(5, 'Thi đua khen thưởng', 'thi-dua-khen-thuong', 2, '2023-07-14 02:46:05', '2023-07-14 02:46:05'),
(6, 'Sáng kiến', 'sang-kien', 2, '2023-07-14 02:46:20', '2023-07-14 02:46:20'),
(7, 'An sinh xã hội', 'an-sinh-xa-hoi', 2, '2023-07-14 02:46:32', '2023-07-14 02:46:32'),
(8, 'Tuyển dụng', 'tuyen-dung', 2, '2023-07-14 02:46:48', '2023-07-14 02:46:48'),
(9, 'Sản phẩm - Dịch vụ', 'san-pham-dich-vu', 0, '2023-07-14 02:47:02', '2023-07-14 02:47:02'),
(10, 'Tin tức', 'tin-tuc', 0, '2023-07-14 02:47:15', '2023-07-14 02:47:15'),
(11, 'Liên hệ', 'lien-he', 0, '2023-07-14 02:47:22', '2023-07-14 02:47:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_13_101859_create_news_categories_table', 1),
(6, '2023_07_14_080733_create_menuses_table', 2),
(7, '2023_07_14_085436_create_menus_table', 3),
(8, '2023_07_17_031025_create_news_table', 4),
(9, '2023_07_17_034704_create_tags_table', 4),
(10, '2023_07_17_034756_create_news_tags_table', 4),
(11, '2023_07_17_092959_add_column_tags_to_news_table', 5),
(12, '2023_07_26_072524_create_info_companies_table', 5),
(13, '2023_07_26_081200_add_colume_image__logo_path_to_table_info_companies', 6),
(14, '2023_07_26_081228_add_colume_image_favicon_path_to_table_info_companies', 6),
(15, '2023_07_27_015136_create_recruitments_table', 7),
(16, '2023_07_27_080805_create_product_categories_table', 8),
(17, '2023_07_27_090302_create_products_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_name` varchar(191) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `show_app` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `slug_name`, `created_at`, `updated_at`) VALUES
(1, 'Tin sản phẩm - dịch vụ', 'tin-san-pham-dich-vu', '2023-07-13 05:14:42', '2023-07-13 05:14:42'),
(2, 'Hoạt động SXKD', 'hoat-dong-sxkd', '2023-07-13 05:15:03', '2023-07-13 05:15:03'),
(3, 'Thi đua khen thưởng', 'thi-dua-khen-thuong', '2023-07-13 05:15:14', '2023-07-13 05:15:14'),
(4, 'Sáng kiến', 'sang-kien', '2023-07-13 05:15:22', '2023-07-13 05:15:22'),
(5, 'An sinh xã hội', 'an-sinh-xa-hoi', '2023-07-13 05:15:29', '2023-07-13 05:15:29'),
(6, 'Viễn thông', 'vien-thong', '2023-07-27 01:36:07', '2023-07-27 01:36:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_tags`
--

CREATE TABLE `news_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_tags`
--

INSERT INTO `news_tags` (`id`, `news_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-07-19 13:45:18', '2023-07-19 13:45:18'),
(2, 1, 2, '2023-07-19 13:45:18', '2023-07-19 13:45:18'),
(3, 2, 1, '2023-07-19 13:51:33', '2023-07-19 13:51:33'),
(4, 2, 3, '2023-07-19 13:51:33', '2023-07-19 13:51:33'),
(15, 7, 0, '2023-07-26 07:07:32', '2023-07-26 07:07:32'),
(17, 3, 16, '2023-07-26 07:13:18', '2023-07-26 07:13:18'),
(18, 8, 18, '2023-10-11 04:10:08', '2023-10-11 04:10:08'),
(19, 8, 19, '2023-10-11 04:10:08', '2023-10-11 04:10:08'),
(20, 8, 20, '2023-10-11 04:10:08', '2023-10-11 04:10:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `product_categories` int(11) NOT NULL,
  `contents` text NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Viễn thông', 'vien-thong', '2023-07-27 01:41:35', '2023-07-27 01:41:35'),
(2, 'Giải pháp số - Nền tảng số', 'giai-phap-so-nen-tang-so', '2023-07-27 01:42:34', '2023-07-27 01:42:34'),
(3, 'Nội dung số', 'noi-dung-so', '2023-07-27 01:42:53', '2023-07-27 01:42:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruitments`
--

CREATE TABLE `recruitments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `contents` text NOT NULL,
  `number_of_applicants` int(11) NOT NULL,
  `application_deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'thi đua', '2023-07-19 13:45:18', '2023-07-19 13:45:18'),
(2, 'sáng kiến', '2023-07-19 13:45:18', '2023-07-19 13:45:18'),
(3, 'phong trào', '2023-07-19 13:51:33', '2023-07-19 13:51:33'),
(4, 'công đoàn', '2023-07-19 15:23:51', '2023-07-19 15:23:51'),
(5, 'chính sách', '2023-07-19 15:23:51', '2023-07-19 15:23:51'),
(16, 'hội nghị', '2023-07-19 16:18:07', '2023-07-19 16:18:07'),
(17, 'ghfjghf', '2023-07-25 14:31:19', '2023-07-25 14:31:19'),
(18, 'ádfádgdfgd', '2023-10-11 04:10:08', '2023-10-11 04:10:08'),
(19, 'dfhgftytyu', '2023-10-11 04:10:08', '2023-10-11 04:10:08'),
(20, 'ttest1110', '2023-10-11 04:10:08', '2023-10-11 04:10:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pass_decode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `pass_decode`) VALUES
(1, 'anhduc', 'anhduc89@gmail.com', NULL, '$2y$10$.fq7KHPKEgWDEAT60aHkoeemSc0YCDGcp.NkJg8bJl9pLvReG5ztq', NULL, NULL, NULL, 'anhduc89');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info_companies`
--
ALTER TABLE `info_companies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_tags`
--
ALTER TABLE `news_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `info_companies`
--
ALTER TABLE `info_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `news_tags`
--
ALTER TABLE `news_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
