-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2020 lúc 04:39 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacsanphuyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateorder` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `total`, `payment`, `dateorder`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 34, '605,000.00', 'COD', '2020-04-13', '2020-04-13 14:33:21', '2020-04-13 14:33:21', NULL),
(31, 35, '1,290,000.00', 'ATM', '2020-04-13', '2020-04-13 14:33:48', '2020-04-14 13:54:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills_detail`
--

CREATE TABLE `bills_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED DEFAULT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills_detail`
--

INSERT INTO `bills_detail` (`id`, `id_bill`, `id_product`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(21, 30, 4, '1', '35000', '2020-04-13 14:33:21', '2020-04-13 14:33:21'),
(22, 30, 5, '1', '570000', '2020-04-13 14:33:21', '2020-04-13 14:33:21'),
(23, 31, 1, '1', '520000', '2020-04-13 14:33:48', '2020-04-13 14:33:48'),
(24, 31, 2, '1', '770000', '2020-04-13 14:33:48', '2020-04-13 14:33:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đặc sản một nắng', 'Để làm đặc sản một nắng ngon, người ta phải rửa bằng nước biển, sau đó sẽ đem ra phơi nắng. Phải chọn nơi nhiều ánh nắng, nắng to để được ngon hơn. ', '', '2020-03-16 07:02:49', '2020-04-14 13:54:49', NULL),
(2, 'Các loại chả', 'Chả cá Phú Yên được làm từ các loại cá biển có nhiều ở đây như cá thu, cá mối, cá cờ, cá nhồng...tùy theo mùa nên bạn sẽ nếm được hương vị thơm ngon.', '', '2020-03-16 07:02:49', '2020-03-16 07:02:49', NULL),
(3, 'Nước mắm Phú Yên', 'Được sản xuất theo phương pháp truyền thống, từ cá tươi và muối tinh, ủ trong  thùng, lên men hoàn toàn tự nhiên. Sau 18-24 tháng,  được rút nỏ cho ra nước mắm màu đỏ nâu cánh gián, thơm lừng, đậm đà vị béo, hậu vị sâu, thực sự tự nhiên và an toàn.\r\n', '', '2020-03-16 07:02:49', '2020-03-16 07:02:49', NULL),
(4, 'Cà phê Phú Yên', 'Cà phê là một loại thức uống được ủ từ hạt cà phê rang, lấy từ quả của cây cà phê. ', '', '2020-03-16 07:02:49', '2020-04-05 04:23:02', NULL),
(5, 'Cá ngừ Đại Dương', 'Cá ngừ đại dương là tên địa phương để chỉ loại cá ngừ mắt to và cá ngừ vây vàng. Cá ngừ đại dương là loại hải sản đặc biệt thơm ngon, mắt rất bổ (cá ngừ mắt to), được chế biến thành nhiều loại món ăn ngon và tạo nguồn hàng xuất khẩu có giá trị.', '', '2020-03-16 07:06:50', '2020-04-05 04:26:54', NULL),
(6, 'Đặc sản khác', 'Ẩm thực độc lạ hấp dẫn', '', '2020-03-16 07:08:49', '2020-04-05 08:53:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `email`, `name`, `content`, `id_product`, `created_at`, `updated_at`) VALUES
(3, 'luongbaotin2019@gmail.com', 'Lương Bảo Tín', 'Giá quá đắt', 24, '2020-03-31 03:46:10', '2020-03-31 03:46:10'),
(4, 'manager@gmail.com', 'User', 'ttttt', 24, '2020-03-31 03:53:22', '2020-03-31 03:53:22'),
(5, 'luongbaotin2019@gmail.com', 'Lương Bảo Tín', 'Verygood', 6, '2020-04-01 03:01:43', '2020-04-01 03:01:43'),
(7, 'admin@gmail.com', 'Lương Bảo Tín', 'Ngon', 6, '2020-04-10 01:44:39', '2020-04-10 01:44:39'),
(8, 'luongbaotin2019@gmail.com', 'Tinpro', 'Quá ngon và rẻ', 4, '2020-04-10 01:52:24', '2020-04-10 01:52:24'),
(9, 'manager@gmail.com', 'tin', 'Rất ngon!', 5, '2020-04-10 08:54:39', '2020-04-10 08:54:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `email`, `name`, `phonenumber`, `address`, `created_at`, `updated_at`) VALUES
(34, 'admin@gmail.com', 'Lương Bảo Tín', '0385618501', 'Phu Yen, Dong Hoa', '2020-04-13 14:33:21', '2020-04-13 14:33:21'),
(35, 'user@gmail.com', 'Tinpro', '0385618501', 'Phu Yen, Dong Hoa', '2020-04-13 14:33:48', '2020-04-13 14:33:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_31_094737_comment', 1),
(4, '2020_04_04_063951_user', 2),
(8, '2020_04_04_090536_vp_users', 3),
(12, '2020_04_09_040451_customer', 4),
(13, '2020_04_09_050044_customers', 5),
(14, '2020_04_09_050218_bills', 6),
(15, '2020_04_09_050436_bills_detail', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình',
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_category`, `description`, `unit_price`, `promotion_price`, `status`, `image`, `unit`, `featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bò một năng', 1, 'Những sợi thịt bò một nắng thơm, ngọt và dai chấm cùng thứ muối kiến vàng với vị chua độc đáo đã làm nên thương hiệu cho món ăn này ở vùng đất hoa vằng cỏ xanh. Dưới đây sẽ hướng dẫn bò 1 nắng Phú Yên ăn như thế nào là ngon nhất', 550000, 520000, 1, 'bo-mot-nang.jpg', 'bì', 1, '2020-03-16 07:16:17', '2020-04-05 09:06:54', NULL),
(2, 'Mục một nắng', 1, NULL, 790000, 770000, 1, 'muc-mot-nang.jpg', 'bì', 1, '2020-03-16 07:18:00', '2020-03-30 11:19:18', NULL),
(3, 'Cá thu một nắng', 1, NULL, 320000, NULL, 0, 'ca-thu-mot-nang.jpg', 'bì', 1, '2020-03-16 07:18:00', '2020-03-30 12:31:22', NULL),
(4, 'Muối kiến vàng', 1, 'Trong cuộc sống hằng ngày chắc hẳn kiến vàng không xa lạ gì với người dân chúng ta nhất là đối với nhà nông kiến vàng có khả năng tiết ra một loại axit làm thúc đẩy quy trình sinh trưởng của cây ăn quả. Hơn thế nữa, theo dân địa phương kiến vàng còn giúp ích cho người bị bệnh tiểu đường  bằng cách treo miếng thịt bò trên cành cây cao có ổ kiến vàng để khoảng 2 giờ, sau đó để nguyên miếng thịt bò không rửa sạch mà đem thái mỏng nấu cháo, chất chua tiết ra từ kiến ngấm vào miếng thịt bò sẽ khử được lượng đường thừa trong máu. Ở miền Nam Trung Bộ như Gia Lai, Bình Định, Phú Yên kiến vàng đã trở thành món ăn đặc sản, nổi bật nhất phải kể đến xôi trứng kiến, trứng kiến nấu măng sặc, trứng kiến trộn gỏi đu đủ, gỏi bưởi hay nấu canh chua lá giang.\r\n\r\nNếu có dịp đặt chân đến vùng đất Phú Yên bạn đừng quên mang về món chấm Muối kiến vàng rất nổi tiếng và không kém phần độc đáo. Cách chế biến muối kiến vàng rất là công phu người dân phải đi vào rừng núi tìm từng tổ kiến vàng và chỉ chọn lấy phẩn kén kiến, kiến non rang với muối hột, tiếp đến là công đoạn pha chế phải theo đúng tỷ lệ hợp lý không quá năng mùi, không quá mặn xen lẫn vị cay cay của ớt và vị chua chua của kiến mà không quá nồng vẫn giữ được mùi vị đặc trưng của kiến vàng. Muối kiến vàng được dùng làm gia vị ăn kèm với các món thịt một nắng như heo một nắng, tôm một nắng, nai một nắng…nhưng ngon nhất là dùng kèm với bò một nắng Sơn Hòa Phú Yên, nếu ai được nếm qua một lần chắc hẳn sẽ không bỏ lỡ “bò một nắng, muối kiến vàng”  trong danh sách món ngon cuối tuần của các quý ông.\r\n\r\nNgoài ra kiến vàng cung cấp từ 42-67% chất đạm, 28 loại axit amin và có nhiều sinh tố và khoáng chất khác.trứng kiến có chứa hàm lượng protein rất cao. Do vậy đây còn là sự lựa chọn tuyệt vời cho các bà vợ khi lựa chọn thực phẩm dự trữ tại nhà.', 350000, NULL, 1, 'muoi-kien-vang.jpg', 'hủ', 1, '2020-03-16 07:19:39', '2020-04-14 05:44:45', NULL),
(5, 'Nai một nắg', 1, NULL, 570000, NULL, 1, 'nai-mot-nang.jpg', 'bì', 1, '2020-03-16 07:19:39', '2020-03-30 12:31:46', NULL),
(6, 'Tôm một nắng', 1, NULL, 600000, NULL, 1, 'tom-mot-nang.jpg', 'bì', 1, '2020-03-16 07:19:55', '2020-04-01 08:26:36', NULL),
(7, 'Nem chua', 2, NULL, 230000, 200000, 1, 'nem-chua.jpg', 'cây', 1, '2020-03-16 07:31:53', '2020-03-30 12:32:19', NULL),
(8, 'Chả ớt xiêm', 2, NULL, 240000, NULL, 0, 'cha-ot-xiem.jpg', 'cây', 1, '2020-03-16 07:31:53', '2020-03-30 12:32:46', NULL),
(9, 'Chả cá Phú Yên', 2, NULL, 190000, 150000, 1, 'cha-ca-py.jpg', 'miếng', 0, '2020-03-16 07:31:53', '2020-03-30 12:32:38', NULL),
(10, 'Mắm mực', 3, NULL, 80000, 65000, 1, 'mam-muc.jpg', 'hủ', 0, '2020-03-16 07:31:53', '2020-03-30 12:32:51', NULL),
(11, 'Măm cá thu', 3, NULL, 150000, NULL, 0, 'mam-ca-thu-xay.jpg', 'hủ', 0, '2020-03-16 07:31:53', '2020-04-07 09:59:22', NULL),
(12, 'Mắm cá thu chưng', 3, NULL, 150000, NULL, 0, 'mam-ca-thu-chung.jpg', 'hủ', 1, '2020-03-16 07:31:53', '2020-03-30 12:33:00', NULL),
(13, 'Mắm Ông già', 3, NULL, 170000, NULL, 1, 'nuoc-mam-phu-yen.jpg', 'chai', 1, '2020-03-16 07:31:53', '2020-04-07 09:59:03', NULL),
(14, 'Mắm Tân Lập', 3, NULL, 170000, NULL, 1, 'mam-tan-lap.jpg', 'chai', 1, '2020-03-16 07:31:53', '2020-04-07 09:59:38', NULL),
(15, 'Mắm cá cơm', 3, NULL, 8000, NULL, 0, 'mam-ca-com.jpg', 'hủ', 1, '2020-03-16 07:31:53', '2020-04-07 11:16:36', NULL),
(16, 'Cà phê Huy Tùng', 4, NULL, 400000, 390000, 1, 'ca-phe-huy-tung.jpg', 'hộp', 0, '2020-03-16 07:43:44', '2020-04-07 09:59:30', NULL),
(17, 'Cà phê Hương Hương', 4, NULL, 200000, NULL, 0, 'ca-phe-huong-huong.jpg', 'hộp', 0, '2020-03-16 07:43:44', '2020-04-07 09:59:49', NULL),
(18, 'Cà phê Huy Tùng ĐB', 4, NULL, 250000, 200000, 0, 'ca-phe-huong-chon.jpg', 'hộp', 1, '2020-03-16 07:43:44', '2020-04-15 15:25:01', NULL),
(19, 'Cá ngừ Đại Dương', 5, NULL, 350000, 3300000, 0, 'ca-ngu-cat-khuc.jpg', 'phần', 1, '2020-03-16 07:56:38', '2020-04-07 10:00:21', NULL),
(20, 'Cá ngừ Đại Dương ĐB', 5, 'Giá liên hệ', 190000, NULL, 1, 'ca-ngu-nguyen-con.jpg', 'con', 0, '2020-03-16 07:56:38', '2020-04-07 10:00:33', NULL),
(21, 'Mắt cá ngừ', 5, NULL, 140000, NULL, 0, 'mat-ca-ngu.jpg', 'con', 0, '2020-03-16 07:56:38', '2020-04-07 10:00:48', NULL),
(22, 'Mắt cá ngừ ĐB', 5, NULL, 70000, NULL, 1, 'mat-ca-ngu-chung.jpg', 'con', 0, '2020-03-16 07:56:38', '2020-04-07 10:01:00', NULL),
(23, 'Thit cá ngừ', 5, NULL, 300000, NULL, 1, 'ca-ngu-phi-le.jpg', 'phần', 0, '2020-03-16 07:56:38', '2020-04-07 10:01:14', NULL),
(24, 'Khô mép cá ngừ', 5, NULL, 360000, 300000, 0, 'kho-mep-ca-ngu.jpg', 'phần', 1, '2020-03-16 07:56:38', '2020-04-15 15:24:24', NULL),
(25, 'Thịt ngâm mắm', 6, NULL, 190000, 150000, 0, 'thit-ngam-mam.jpg', 'hủ', 0, '2020-03-16 08:07:55', '2020-03-30 12:32:02', NULL),
(26, 'Cá mai Phú Yên', 6, NULL, 250000, 240000, NULL, 'ca-mai-py.jpg', 'dĩa', 0, '2020-03-16 08:07:55', '2020-03-16 08:09:10', NULL),
(27, 'Bánh tráng Hòa Đa', 1, NULL, 250000, 230000, NULL, 'banh-trang-hoa-da.jpg', '10 dây', 0, '2020-03-16 08:07:55', '2020-04-14 13:55:06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `view`
--

CREATE TABLE `view` (
  `id` int(11) NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_users`
--

CREATE TABLE `vp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberphone` int(10) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_users`
--

INSERT INTO `vp_users` (`id`, `name`, `address`, `numberphone`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, 'admin@gmail.com', '$2y$10$6Yvh3WT1Nyw6QydDY/h2NOpVJ/TzOMAZq4tUn93pJKciU/HH8hS4i', '1', 'KOwcI81ImwfkSPFXi9aLcsFkAFytH6WvVb0qVh7QNe2aMGuLSfEXcemxYvOs', NULL, NULL, NULL),
(2, 'Lương Bảo Tín', 'Phu Yen, Dong Hoa', 385618501, 'user@gmail.com', '$2y$10$mvzFMctpgx9j7ZSSkRiWGu3TDn8vAHmRi0hCUZ5QdBoUARm6RLsJG', '2', 'BMBBIHTiXtDotgPRHmWgnmeZChLw5XSiRLvszudw7HknYE64MwQvi9M7w4vs', NULL, '2020-04-11 10:58:46', NULL),
(9, 'Lương Bảo', 'Phu Yen, Dong Hoa', 385618501, 'tinpro67@gmail.com', '$2y$10$rgJBDrLcF0ZvWF0lOc5zcu5H8iRCVFV.e7f3iQxjKyzNv6rlJ.Gl.', '2', NULL, '2020-04-11 10:20:33', '2020-04-11 10:58:51', NULL),
(10, 'Lương Tín', 'Phu Yen, Dong Hoa', 385618501, 'manager@gmail.com', '$2y$10$u8YEvf.xJN.STa49ig6tLO9N5C.xqjmrWY40fXL1ldIpiyCyhYYGO', '1', NULL, '2020-04-11 10:51:53', '2020-04-11 10:52:17', NULL),
(11, 'lương bảo tín', 'Phu Yen, Dong Hoa', 385618501, 'user2@gmail.com', '$2y$10$45GD4yv2VFgT30yHcPCHqu5wDKnrLTyCAhDsk5ix2WiQ4V4Txdd0a', '2', NULL, '2020-04-14 11:09:42', '2020-04-14 11:09:42', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `bills_detail`
--
ALTER TABLE `bills_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod` (`id_product`),
  ADD KEY `FK_billid` (`id_bill`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`) USING BTREE;

--
-- Chỉ mục cho bảng `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `bills_detail`
--
ALTER TABLE `bills_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `view`
--
ALTER TABLE `view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `bills_detail`
--
ALTER TABLE `bills_detail`
  ADD CONSTRAINT `FK_billid` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bills_detail_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
