-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2017 at 08:20 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `installation_bijoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_line_1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` longtext COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` longtext COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `country_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'YU', 'Yugoslavia'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `name`) VALUES
(1, 'DHL Express'),
(2, 'FedEx'),
(3, 'United Parcel Service,Inc.'),
(4, 'Blue Dart');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_symbol`, `currency_name`) VALUES
(1, 'USD', '$', 'US dollar'),
(2, 'GBP', '£', 'Pound'),
(3, 'EUR', '€', 'Euro'),
(4, 'AUD', '$', 'Australian Dollar'),
(5, 'CAD', '$', 'Canadian Dollar'),
(6, 'JPY', '¥', 'Japanese Yen'),
(7, 'NZD', '$', 'N.Z. Dollar'),
(8, 'CHF', 'Fr', 'Swiss Franc'),
(9, 'HKD', '$', 'Hong Kong Dollar'),
(10, 'SGD', '$', 'Singapore Dollar'),
(11, 'SEK', 'kr', 'Swedish Krona'),
(12, 'DKK', 'kr', 'Danish Krone'),
(13, 'PLN', 'zł', 'Polish Zloty'),
(14, 'HUF', 'Ft', 'Hungarian Forint'),
(15, 'CZK', 'Kč', 'Czech Koruna'),
(16, 'MXN', '$', 'Mexican Peso'),
(17, 'CZK', 'Kč', 'Czech Koruna'),
(18, 'MYR', 'RM', 'Malaysian Ringgit');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

DROP TABLE IF EXISTS `email_template`;
CREATE TABLE `email_template` (
  `email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'sales,purchase',
  `invoice_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 unpaid 1 paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_template`
--

DROP TABLE IF EXISTS `invoice_template`;
CREATE TABLE `invoice_template` (
  `invoice_template_id` int(11) NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1(selected)0(not selected)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bengali` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dutch` longtext COLLATE utf8_unicode_ci NOT NULL,
  `polish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `german` longtext COLLATE utf8_unicode_ci NOT NULL,
  `french` longtext COLLATE utf8_unicode_ci NOT NULL,
  `italian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `russian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `portugese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `turkish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `korean` longtext COLLATE utf8_unicode_ci NOT NULL,
  `greek` longtext COLLATE utf8_unicode_ci NOT NULL,
  `chinese` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `bengali`, `spanish`, `dutch`, `polish`, `german`, `french`, `italian`, `russian`, `portugese`, `turkish`, `korean`, `greek`, `chinese`) VALUES
(1, 'login', 'Login', 'লগইন', 'Iniciar sesión', 'Log in', 'Zaloguj Się', 'Anmeldung', 'S\'identifier', 'Accesso', 'Авторизоваться', 'Entrar', 'Oturum aç', '로그인', 'Σύνδεση', '登录'),
(2, 'forgot_password', 'Forgot Password', 'পাসওয়ার্ড ভুলে গেছেন', 'Se te olvidó tu contraseña', 'Wachtwoord vergeten', 'Zapomniałeś hasła', 'Passwort vergessen', 'Mot de passe oublié', 'Ha dimenticato la password', 'Забыли пароль', 'Esqueceu a senha', 'Parolanızı mı unuttunuz', '비밀번호를 잊으 셨나요', 'Ξεχάσατε τον κωδικό', '忘记密码'),
(3, 'admin_dashboard', 'Admin Dashboard', 'অ্যাডমিন ড্যাশবোর্ডের', 'Tablero de instrumentos de administración', 'Admin Dashboard', 'Admin Dashboard', 'Admin-Dashboard', 'Administrateur Dashboard', 'Dashboard Admin', 'Админ Панель приборов', 'Painel de administração', 'Yönetici Paneli', '관리 대시 보드', 'ταμπλό διαχειριστή', '管理仪表板'),
(4, 'are_you_sure_to_delete_this_information', 'Are You Sure To Delete This Information', 'আপনি কি নিশ্চিত মুছে ফেলতে এই তথ্য আছেন', 'Está seguro que desea eliminar esta información', 'Weet u zeker dat u wilt verwijderen deze informatie', 'Czy na pewno chcesz usunąć te informacje', 'Sind Sie sicher, dass diese Informationen zu löschen', 'Êtes-vous sûr de vouloir supprimer cette information', 'Sei sicuro di voler eliminare queste informazioni', 'Вы действительно хотите удалить эту информацию', 'Tem certeza que deseja excluir essas informações', 'Bu bilgiler silmek istediğinizden emin misiniz', '당신은이 정보를 삭제 하시겠습니까', 'Είστε σίγουροι ότι για να διαγράψετε αυτές τις πληροφορίες', '您确定要删除这些信息'),
(5, 'delete', 'Delete', 'মুছে ফেলা', 'Borrar', 'Verwijder', 'Kasować', 'Löschen', 'Effacer', 'cancellare', 'Удалить', 'Excluir', 'silmek', '지우다', 'Διαγράφω', '删除'),
(6, 'cancel', 'Cancel', 'বাতিল', 'Cancelar', 'Annuleer', 'Anuluj', 'Stornieren', 'Annuler', 'Annulla', 'Отмена', 'Cancelar', 'İptal etmek', '취소하다', 'Ματαίωση', '取消'),
(7, 'dashboard', 'Dashboard', 'ড্যাশবোর্ড', 'Tablero', 'Dashboard', 'Deska rozdzielcza', 'Instrumententafel', 'Tableau de bord', 'scrivania', 'Панель приборов', 'painel de instrumentos', 'gösterge paneli', '계기반', 'Ταμπλό', '仪表板'),
(8, 'branch', 'Branch', 'শাখা', 'Rama', 'Tak', 'Gałąź', 'Ast', 'Une succursale', 'Ramo', 'Филиал', 'Ramo', 'şube', '분기', 'Κλαδί', '科'),
(9, 'users', 'Users', 'ব্যবহারকারীরা', 'usuarios', 'gebruikers', 'użytkownicy', 'Benutzer', 'Utilisateurs', 'utenti', 'пользователей', 'usuários', 'Kullanıcılar', '사용자', 'χρήστες', '用户'),
(10, 'add_new_user', 'Add New User', 'নতুন ব্যবহারকারী জুড়ুন', 'Añadir nuevo usuario', 'Nieuwe gebruiker toevoegen', 'Dodaj nowego użytkownika', 'Neuen Benutzer hinzufügen', 'Ajouter un nouvel utilisateur', 'Aggiungi nuovo utente', 'Добавление нового пользователя', 'Adicionar novo usuário', 'Yeni Kullanıcı Ekle', '새 사용자 추가', 'Προσθήκη νέου χρήστη', '添加新用户'),
(11, 'user_list', 'User List', 'ব্যবহারকারীর তালিকা', 'Lista de usuarios', 'Gebruikers Lijst', 'Lista użytkowników', 'Benutzerliste', 'liste d\'utilisateur', 'Lista utenti', 'Список пользователей', 'Lista de usuários', 'kullanıcı listesi', '사용자 목록', 'Κατάλογος χρηστών', '用户列表'),
(12, 'products', 'Products', 'পণ্য', 'productos', 'producten', 'Produkty', 'Produkte', 'Produits', 'Prodotti', 'Продукты', 'Produtos', 'Ürünler', '제작품', 'προϊόντα', '制品'),
(13, 'sales_order', 'Sales Order', 'বিক্রয় আদেশ', 'Órdenes de venta', 'Sales Order', 'Zamówienie', 'Kundenauftrag', 'Sales Order', 'Ordine di vendita', 'Заказ клиента', 'Pedido de venda', 'satış Sipariş', '판매 주문', 'Παραγγελία πώλησης', '销售订单'),
(14, 'add_new_order', 'Add New Order', 'নতুন অর্ডার যোগ', 'Añadir nuevo orden', 'Voeg New Order', 'Dodaj New Order', 'In New Order', 'Ajouter New Order', 'Aggiungere New Order', 'Добавить новый порядок', 'Adicionar Nova Ordem', 'Yeni Sipariş ekleyin', '새로 추가 주문', 'Προσθέστε Νέα Τάξη', '添加新订单'),
(15, 'order_list', 'Order List', 'অর্ডার তালিকা', 'Lista de orden', 'Bestellijst', 'Lista zamówień', 'Bestellliste', 'Liste des commandes', 'Lista degli ordini', 'Список заказа', 'Lista fim', 'Sipariş listesi', '주문 목록', 'Λίστα Παραγγελία', '订单'),
(16, 'purchase_order', 'Purchase Order', 'ক্রয় আদেশ', 'Orden de compra', 'Bestelling', 'Zamówienie', 'Bestellung', 'Ordre d\'achat', 'Ordinazione d\'acquisto', 'Заказ на покупку', 'Ordem de compra', 'Satın alma emri', '구매 주문', 'Εντολή αγοράς', '采购订单'),
(17, 'inventory', 'Inventory', 'জায়', 'Inventario', 'Inventaris', 'Inwentarz', 'Inventar', 'Inventaire', 'Inventario', 'инвентарь', 'Inventário', 'Envanter', '목록', 'Καταγραφή εμπορευμάτων', '库存'),
(18, 'reports', 'Reports', 'প্রতিবেদন', 'Informes', 'rapporten', 'Raporty', 'Berichte', 'Rapports', 'Rapporti', 'Отчеты', 'Relatórios', 'Raporlar', '보고서', 'αναφορές', '报告'),
(19, 'settings', 'Settings', 'সেটিংস', 'ajustes', 'instellingen', 'Settings', 'Einstellungen', 'Paramètres', 'impostazioni', 'настройки', 'Configurações', 'Ayarlar', '설정', 'Ρυθμίσεις', '设置'),
(20, 'system_settings', 'System Settings', 'পদ্ধতি নির্ধারণ', 'Ajustes del sistema', 'Systeem instellingen', 'Ustawienia systemowe', 'Systemeinstellungen', 'Les paramètres du système', 'Impostazioni di sistema', 'Настройки системы', 'Configurações de sistema', 'Sistem ayarları', '시스템 설정', 'Ρυθμίσεις συστήματος', '系统设置'),
(21, 'language_settings', 'Language Settings', 'ভাষা ব্যাবস্থা', 'Ajustes de idioma', 'Taal instellingen', 'Ustawienia języka', 'Spracheinstellungen', 'Paramètres de langue', 'Impostazioni della lingua', 'Языковые настройки', 'Configurações de linguagem', 'Dil ayarları', '언어 설정', 'Ρυθμίσεις γλώσσας', '语言设定'),
(22, 'email_settings', 'Email Settings', 'ইমেল সেটিংস', 'Ajustes del correo electrónico', 'E-mailinstellingen', 'Ustawienia poczty e-mail', 'Email Einstellungen', 'Paramètres de messagerie', 'Impostazioni e-mail', 'Настройки электронной почты', 'Configurações de e-mail', 'E-posta Ayarları', '이메일 설정', 'Ρυθμίσεις email', '电子邮件设置'),
(23, 'invoice_templates', 'Invoice Templates', 'চালান টেম্পলেটসমূহ', 'Plantillas de factura', 'factuur Templates', 'Szablony faktury', 'Rechnungsvorlagen', 'Modèles de facture', 'Modelli fattura', 'Шаблоны счетов-фактур', 'modelos de nota fiscal', 'fatura Şablonları', '송장 템플릿', 'τιμολόγιο Πρότυπα', '发票模板'),
(24, 'all_users', 'All Users', 'সকল ব্যবহারকারী', 'Todos los usuarios', 'Alle gebruikers', 'Wszyscy użytkownicy', 'Alle Nutzer', 'Tous les utilisateurs', 'Tutti gli utenti', 'Все пользователи', 'Todos os usuários', 'Tüm kullanıcılar', '모든 사용자들', 'Όλοι οι χρήστες', '全部用户'),
(25, 'view_all', 'View All', 'সব দেখ', 'Ver todo', 'Bekijk alles', 'Pokaż wszystkie', 'Alle anzeigen', 'Voir tout', 'Guarda tutto', 'Посмотреть все', 'Ver tudo', 'Hepsini gör', '모두보기', 'Δείτε όλα τα', '查看全部'),
(26, 'log_out', 'Log Out', 'প্রস্থান', 'Cerrar sesión', 'Uitloggen', 'Wyloguj', 'Ausloggen', 'Se déconnecter', 'Disconnettersi', 'Выйти', 'Sair', 'Çıkış Yap', '로그 아웃', 'Αποσυνδέομαι', '登出'),
(27, 'profile', 'Profile', 'প্রোফাইলের', 'Perfil', 'Profiel', 'Profil', 'Profil', 'Profil', 'Profilo', 'Профиль', 'Perfil', 'Profil', '윤곽', 'Προφίλ', '轮廓'),
(28, 'all', 'All', 'সব', 'Todas', 'Alle', 'Wszystko', 'Alle', 'Tout', 'Tutti', 'Все', 'Todos', 'Herşey', '모든', 'Όλοι', '所有'),
(29, 'customers', 'Customers', 'গ্রাহকদের', 'Clientes', 'Klanten', 'Klienci', 'Kundschaft', 'Les clients', 'Clienti', 'Клиенты', 'clientes', 'Müşteriler', '고객', 'Πελάτες', '顾客'),
(30, 'suppliers', 'Suppliers', 'সরবরাহকারীদের', 'proveedores', 'leveranciers', 'Dostawcy', 'Lieferanten', 'Fournisseurs', 'fornitori', 'Поставщики', 'fornecedores', 'Tedarikçiler', '공급 업체', 'Προμηθευτές', '供应商'),
(31, 'employees', 'Employees', 'এমপ্লয়িজ', 'Empleados', 'werknemers', 'Pracowników', 'Mitarbeiter', 'Des employés', 'I dipendenti', 'Сотрудники', 'funcionários', 'Çalışanlar', '직원', 'εργαζόμενοι', '雇员'),
(32, 'user_information', 'User Information', 'ব্যবহারকারীর তথ্য', 'informacion del usuario', 'gebruikers informatie', 'Informacje o użytkowniku', 'Nutzerinformation', 'informations de l\'utilisateur', 'informazioni utente', 'информация о пользователе', 'Informação do usuário', 'Kullanıcı bilgisi', '사용자 정보', 'Πληροφορίες χρήστη', '用户信息'),
(33, 'name', 'Name', 'নাম', 'Nombre', 'Naam', 'Nazwa', 'Name', 'prénom', 'Nome', 'имя', 'Nome', 'isim', '이름', 'Όνομα', '名称'),
(34, 'user_name', 'User Name', 'ব্যবহারকারীর নাম', 'Nombre de usuario', 'Gebruikersnaam', 'Nazwa Użytkownika', 'Benutzername', 'Nom d\'utilisateur', 'Nome utente', 'имя пользователя', 'Nome de usuário', 'Kullanıcı adı', '사용자 이름', 'Όνομα χρήστη', '用户名'),
(35, 'email', 'Email', 'ই-মেইল', 'Email', 'E-mail', 'E-mail', 'Email', 'Email', 'E-mail', 'Эл. адрес', 'O email', 'E-posta', '이메일', 'E-mail', '电子邮件'),
(36, 'user_email', 'User Email', 'ব্যবহারকারী ইমেইল', 'user Correo electrónico', 'gebruiker Email', 'użytkownik Email', 'Benutzer E-Mail', 'utilisateur Email', 'user-mail', 'Пользователь E-mail', 'usuário E-mail', 'kullanıcı e-posta', '사용자 이메일', 'Ο χρήστης E-mail', '用户电子邮件'),
(37, 'password', 'Password', 'পাসওয়ার্ড', 'Contraseña', 'Wachtwoord', 'Hasło', 'Passwort', 'Mot de passe', 'parola d\'ordine', 'пароль', 'Senha', 'Parola', '암호', 'Σύνθημα', '密码'),
(38, 'user_login_password', 'User Login Password', 'ইউজার লগইন পাসওয়ার্ড', 'Inicio de sesión Contraseña', 'Gebruiker Wachtwoord', 'Użytkownik Login Hasło', 'Benutzer-Login Passwort', 'Utilisateur Mot de passe', 'Utente Login Password', 'Пользователь Логин Пароль', 'Usuário Login Senha', 'Kullanıcı Girişi Şifre', '사용자 로그인 비밀번호', 'Είσοδος Χρήστη Κωδικός', '用户登录密码'),
(39, 'phone', 'Phone', 'ফোন', 'Teléfono', 'Telefoon', 'Telefon', 'Telefon', 'Téléphone', 'Telefono', 'Телефон', 'Telefone', 'Telefon', '전화', 'Τηλέφωνο', '电话'),
(40, 'user_phone_number', 'User Phone Number', 'ব্যবহারকারী ফোন নম্বর', 'Número de teléfono del usuario', 'Gebruiker Telefoonnummer', 'Numer telefonu użytkownika', 'User-Telefonnummer', 'Utilisateur numéro de téléphone', 'Utente Numero di telefono', 'Номер телефона пользователя', 'Número de telefone do usuário', 'Kullanıcı Telefon Numarası', '사용자 전화 번호', 'Τηλέφωνο χρήστη', '用户电话号码'),
(41, 'address', 'Address', 'ঠিকানা', 'Dirección', 'Adres', 'Adres', 'Adresse', 'Adresse', 'Indirizzo', 'Адрес', 'Endereço', 'Adres', '주소', 'Διεύθυνση', '地址'),
(42, 'user_address', 'User Address', 'ব্যবহারকারী ঠিকানা', 'Dirección de usuario', 'user Address', 'Adres użytkownika', 'Benutzeradresse', 'Adresse de l\'utilisateur', 'Indirizzo utente', 'Пользователь Адрес', 'Endereço do usuário', 'kullanıcı Adresi', '유저 어드레스', 'Διεύθυνση του χρήστη', '用户地址'),
(43, 'gender', 'Gender', 'লিঙ্গ', 'Género', 'Geslacht', 'Płeć', 'Geschlecht', 'Le genre', 'Genere', 'Пол', 'Gênero', 'Cinsiyet', '성별', 'Γένος', '性别'),
(44, 'male', 'Male', 'পুরুষ', 'Masculino', 'Mannetje', 'Męski', 'Männlich', 'Mâle', 'Maschio', 'мужчина', 'Masculino', 'Erkek', '남성', 'Αρσενικός', '男'),
(45, 'female', 'Female', 'মহিলা', 'Hembra', 'Vrouw', 'Płeć żeńska', 'Weiblich', 'Femelle', 'Femmina', 'женский', 'Fêmea', 'Kadın', '여자', 'Θηλυκός', '女'),
(46, 'user_type', 'User Type', 'ব্যবহারকারীর ধরন', 'Tipo de usuario', 'Gebruikerstype', 'Rodzaj użytkownika', 'Benutzertyp', 'Type d\'utilisateur', 'Tipologia di utente', 'Тип пользователя', 'Tipo de usuário', 'Kullanıcı tipi', '사용자 유형', 'Τύπος χρήστη', '用户类型'),
(47, 'select_user_type', 'Select User Type', 'নির্বাচন ব্যবহারকারী প্রকার', 'Tipo de usuario', 'Selecteer User Type', 'Wybierz typ użytkownika', 'Benutzertyp auswählen', 'Sélectionner le type d\'utilisateur', 'Selezionare il tipo di utente', 'Выберите тип пользователя', 'Escolha um Tipo de Usuário', 'Kullanıcı Seç Tipi', '사용자 선택 유형', 'Επιλέξτε Τύπος Χρήστη', '选择用户类型'),
(48, 'admin', 'Admin', 'অ্যাডমিন', 'Administración', 'beheerder', 'Admin', 'Administrator', 'Administrateur', 'Admin', 'Администратор', 'administrador', 'yönetim', '관리자', 'διαχειριστής', '联系'),
(49, 'branch_manager', 'Branch Manager', 'শাখা ব্যবস্থাপক', 'Gerente de sucursal', 'Branch Manager', 'Kierownik oddziału', 'Niederlassungsleiter', 'Directeur de succursale', 'Direttore della filiale', 'Руководитель филиала', 'Gerente da filial', 'Şube Müdürü', '지점장', 'Διευθυντής του υποκαταστήματος', '分公司经理'),
(50, 'customer', 'Customer', 'ক্রেতা', 'Cliente', 'Klant', 'Klient', 'Kunde', 'Client', 'Cliente', 'Клиент', 'Cliente', 'Müşteri', '고객', 'Πελάτης', '顾客'),
(51, 'supplier', 'Supplier', 'সরবরাহকারী', 'Proveedor', 'Leverancier', 'Dostawca', 'Lieferant', 'Fournisseur', 'Fornitore', 'поставщик', 'fornecedor', 'satıcı', '공급 업체', 'Προμηθευτής', '供应商'),
(52, 'employee', 'Employee', 'কর্মচারী', 'Empleado', 'Werknemer', 'Pracownik', 'Mitarbeiter', 'Employé', 'Dipendente', 'Наемный рабочий', 'Empregado', 'işçi', '종업원', 'Υπάλληλος', '雇员'),
(53, 'permissions', 'Permissions', 'অনুমতিসমূহ', 'permisos', 'machtigingen', 'Uprawnienia', 'Berechtigungen', 'Autorisations', 'Permessi', 'Разрешения', 'permissões', 'İzinler', '권한', 'δικαιώματα', '权限'),
(54, 'manage_products', 'Manage Products', 'পণ্য পরিচালনা', 'Manejo de Productos', 'beheren producten', 'Zarządzaj produkty', 'Produkte verwalten', 'Gérer les produits', 'Gestione Prodotti', 'Управление продуктами', 'Gerenciar produtos', 'Ürünleri Yönet', '제품 관리', 'διαχειριστείτε Προϊόντα', '管理产品'),
(55, 'manage_purchases', 'Manage Purchases', 'ক্রয়গুলি পরিচালনা', 'Manejo de compras', 'Beheer Aankopen', 'Zarządzaj zakupy', 'verwalten Käufe', 'Gérer les achats', 'gestire gli acquisti', 'Управление Закупки', 'Gerenciar Compras', 'satın yönet', '구매 관리', 'διαχειριστείτε Αγορές', '采购管理'),
(56, 'manage_sales', 'Manage Sales', 'সেলস পরিচালনা', 'gestionar las ventas', 'Manage Sales', 'zarządzanie sprzedażą', 'verwalten Vertrieb', 'Gérer les ventes', 'gestire le vendite', 'Управление продаж', 'Gerenciar Vendas', 'Satış yönet', '판매 관리', 'διαχειριστείτε Πωλήσεις', '销售管理'),
(57, 'manage_accounts', 'Manage Accounts', 'হিসাব পরিচালনা', 'Cuentas de administración', 'Accounts beheren', 'zarządzanie kontami', 'Konten verwalten', 'Gérer les comptes', 'Gestisci account', 'Управление учетными записями', 'Gerenciar contas', 'Hesapları Yönet', '계정 관리', 'Διαχείριση λογαριασμών', '管理帐户'),
(58, 'manage_users', 'Manage Users', 'পরিচালনা ব্যবহারকারীরা', 'administrar usuarios', 'Gebruikers beheren', 'zarządzanie użytkownikami', 'Benutzer verwalten', 'gérer les utilisateurs', 'Gestione utenti', 'Управление пользователями', 'Gerenciar usuários', 'kullanıcıları yönetme', '사용자 관리', 'Διαχείριση χρηστών', '管理用户'),
(59, 'photo', 'Photo', 'ছবি', 'Foto', 'Foto', 'Zdjęcie', 'Foto', 'photo', 'Foto', 'Фото', 'foto', 'Fotoğraf', '사진', 'φωτογραφία', '照片'),
(60, 'select_image', 'Select Image', 'ছবি নির্বাচন করুন', 'Seleccionar imagen', 'Selecteer Afbeelding', 'Wybierz obraz', 'Bild auswählen', 'Sélectionner l\'image', 'Seleziona Immagine', 'Выберите изображение', 'Selecionar imagem', 'Resim seç', '선택 이미지', 'Επιλογή εικόνας', '选择图片'),
(61, 'change', 'Change', 'পরিবর্তন', 'Cambio', 'Verandering', 'Zmiana', 'Veränderung', 'Changement', 'Cambiamento', '+ Изменить', 'Alterar', 'Değişiklik', '변화', 'Αλλαγή', '更改'),
(62, 'remove', 'Remove', 'অপসারণ', 'retirar', 'Verwijderen', 'Usunąć', 'Entfernen', 'Retirer', 'Rimuovere', 'Удалить', 'Remover', 'Kaldır', '없애다', 'Αφαιρώ', '去掉'),
(63, 'save_user', 'Save User', 'সংরক্ষণ ব্যবহারকারী', 'Guardar usuario', 'Save User', 'Zapisz użytkownika', 'Benutzer speichern', 'Enregistrer l\'utilisateur', 'Salva utente', 'Сохранить пользователя', 'Salvar Usuário', 'Kaydet Kullanıcı', '사용자 저장', 'Αποθήκευση χρήστη', '保存用户'),
(64, 'user_added_successfully', 'User Added Successfully', 'ব্যবহারকারী সফলভাবে যোগ করা', 'Usuario agregado con éxito', 'Gebruiker succesvol toegevoegd', 'Użytkownik został dodany', 'Benutzer erfolgreich hinzugefügt', 'Utilisateur ajouté avec succès', 'Utente aggiunto con successo', 'Пользователь успешно добавлен', 'Usuário adicionado com sucesso', 'Kullanıcı Başarıyla Eklendi', '사용자가 성공적으로 추가', 'Χρήστη προστέθηκε με επιτυχία', '用户添加成功'),
(65, 'success', 'Success', 'সাফল্য', 'Éxito', 'Succes', 'Powodzenie', 'Erfolg', 'le succès', 'Successo', 'успех', 'Sucesso', 'başarı', '성공', 'Επιτυχία', '成功'),
(66, 'error', 'Error', 'ভুল', 'Error', 'Fout', 'Błąd', 'Fehler', 'Erreur', 'Errore', 'ошибка', 'Erro', 'Hata', '오류', 'Λάθος', '错误'),
(67, 'phone_number', 'Phone Number', 'ফোন নম্বর', 'Número de teléfono', 'Telefoonnummer', 'Numer telefonu', 'Telefonnummer', 'Numéro de téléphone', 'Numero di telefono', 'Номер телефона', 'Número de telefone', 'Telefon numarası', '전화 번호', 'Τηλεφωνικό νούμερο', '电话号码'),
(68, 'manage_inventory', 'Manage Inventory', 'পরিসংখ্যা পরিচালনা', 'Manejo de Inventario', 'Beheer Inventory', 'zarządzanie magazynem', 'verwalten Inventar', 'Gérer l\'inventaire', 'gestire inventario', 'Управление инвентаризации', 'Gerenciar Inventory', 'Envanter yönet', '재고 관리', 'διαχείριση των αποθεμάτων', '库存管理'),
(69, 'manage_purchase_orders', 'Manage Purchase Orders', 'ক্রয় আদেশ পরিচালনা', 'Manejo de órdenes de compra', 'Beheren Bestellingen', 'Zarządzanie zamówień zakupu', 'Verwalten von Bestellungen', 'Gérer les commandes d\'achat', 'Gestire ordini di acquisto', 'Управление заказов на поставку', 'Gerir pedidos de compra', 'Satınalma Siparişleri yönetin', '구매 주문 관리', 'Διαχειριστείτε Εντολές Αγοράς', '管理采购订单'),
(70, 'manage_sales_orders', 'Manage Sales Orders', 'সেলস অর্ডার পরিচালনা', 'Manejo de órdenes de venta', 'Beheer klantorders', 'Zarządzaj zleceń sprzedaży', 'Verwalten von Kundenaufträgen', 'Gérer des commandes clients', 'Gestire gli ordini di vendita', 'Управление заказов на продажу', 'Gerir Pedidos de Vendas', 'Satış Siparişleri yönetin', '판매 주문 관리', 'Διαχειριστείτε Παραγγελίες', '管理销售订单'),
(71, 'add_address', 'Add Address', 'ঠিকানা যুক্ত করুন', 'Añadir dirección', 'Adres toevoegen', 'Dodaj adres', 'Adresse hinzufügen', 'Ajoutez l\'adresse', 'Aggiungere Indirizzo', 'Добавить адрес', 'Adicionar endereço', 'Adres ekle', '주소 추가', 'Προσθήκη διεύθυνσης', '添加地址'),
(72, 'company', 'Company', 'কোম্পানির', 'Empresa', 'Bedrijf', 'Firma', 'Unternehmen', 'Compagnie', 'Società', 'Компания', 'companhia', 'şirket', '회사', 'Εταιρεία', '公司'),
(73, 'city', 'City', 'শহর', 'Ciudad', 'stad', 'Miasto', 'Stadt', 'Ville', 'Città', 'город', 'Cidade', 'Şehir', '시티', 'Πόλη', '市'),
(74, 'zip_code', 'Zip Code', 'পোস্টাল কোড', 'Código postal', 'Postcode', 'Kod pocztowy', 'Postleitzahl', 'Code postal', 'Cap', 'Почтовый Индекс', 'CEP', 'Posta kodu', '우편 번호', 'Ταχυδρομικός κώδικας', '邮政编码'),
(75, 'state', 'State', 'রাষ্ট্র', 'Estado', 'Staat', 'Stan', 'Bundesland', 'Etat', 'Stato', 'состояние', 'Estado', 'Belirtmek, bildirmek', '상태', 'Κατάσταση', '州'),
(76, 'select_address', 'Select Address', 'ঠিকানা নির্বাচন', 'Seleccione la Dirección', 'Selecteer Adres', 'Wybierz adres', 'Adresse auswählen', 'Sélectionnez Adresse', 'Selezionare Indirizzo', 'выбирать адрес', 'Escolha a Morada', 'seçin Adres', '선택 주소', 'Επιλέξτε Διεύθυνση', '选择地址'),
(77, 'country', 'Country', 'দেশ', 'País', 'land', 'Kraj', 'Land', 'Pays', 'Nazione', 'Страна', 'País', 'ülke', '국가', 'Χώρα', '国家'),
(78, 'select_country', 'Select Country', 'দেশ নির্বাচন করুন', 'Seleccionar país', 'Selecteer land', 'Wybierz kraj', 'Land auswählen', 'Sélectionner le pays', 'Seleziona il paese', 'Выберите страну', 'Selecione o pais', 'Ülke seç', '국가 선택', 'Επιλέξτε Χώρα', '选择国家'),
(79, 'address_line', 'Address Line', 'ঠিকানা লাইন', 'Dirección', 'Adresregel', 'Wiersz adresu', 'Adresszeile', 'Adresse ligne', 'indirizzo riga', 'Адресная строка', 'Endereço', 'Adres satırı', '주소 입력란', 'Γραμμή διεύθυνσης', '地址栏'),
(80, 'process_order', 'Process Order', 'প্রক্রিয়া', 'proceso de pedidos', 'Procesorder', 'proces zamawiania', 'Prozessauftrag', 'Ordre de process', 'Ordine di processo', 'Процесс заказа', 'processo de Ordem', 'İşlem sırası', '프로세스 주문', 'Παραγγελία διαδικασία', '流程订单'),
(81, 'pending', 'Pending', 'বিচারাধীন', 'Pendiente', 'in afwachting van', 'W oczekiwaniu', 'anstehend', 'en attendant', 'in attesa di', 'в ожидании', 'Pendente', 'kadar', '대기 중', 'εκκρεμής', '有待'),
(82, 'confirmed', 'Confirmed', 'নিশ্চিতকৃত', 'Confirmado', 'bevestigd', 'Zatwierdzony', 'bestätigt', 'Confirmé', 'Confermato', 'подтвержденный', 'Confirmado', 'onaylı', '확인 된', 'Επιβεβαιωμένος', '确认'),
(83, 'partially_shipped', 'Partially Shipped', 'আংশিক প্রেরিত', 'Parcialmente Enviado', 'Gedeeltelijk Verzonden', 'częsciowo Wysłany', 'zum Teil versandt', 'Expédition partielle', 'Parzialmente spedito', 'Частично Высылаем', 'enviado parcialmente', 'kısmen Gönderildi', '부분적으로 배송', 'μερικώς αποσταλεί', '部分出货'),
(84, 'shipped', 'Shipped', 'জাহাজে', 'Enviado', 'verzonden', 'Wysłane', 'versendet', 'Expédié', 'Spedito', 'Высылаем', 'Enviado', 'gönderilen', '배송', 'αποστέλλονται', '运'),
(85, 'delivered', 'Delivered', 'নিষ্কৃত', 'Entregado', 'geleverd', 'Dostarczany', 'Lieferung', 'Livré', 'consegnato', 'доставлен', 'entregue', 'Teslim edilen', '배달', 'Παραδόθηκε', '交付'),
(86, 'overview', 'Overview', 'সংক্ষিপ্ত বিবরণ', 'Visión de conjunto', 'Overzicht', 'Przegląd', 'Überblick', 'aperçu', 'Panoramica', 'обзор', 'Visão geral', 'genel bakış', '개요', 'Επισκόπηση', '概观'),
(87, 'shipments', 'Shipments', 'চালানে', 'Los envíos', 'zendingen', 'Przesyłki', 'Sendungen', 'Livraisons', 'Spedizioni', 'Отгрузки', 'Os embarques', 'gönderiler', '선적', 'αποστολές', '出货量'),
(88, 'invoice', 'Invoice', 'চালান', 'Factura', 'Factuur', 'Faktura', 'Rechnung', 'Facture d\'achat', 'Fattura', 'Выставленный счет', 'Fatura', 'Fatura', '송장', 'Τιμολόγιο', '发票'),
(89, 'payments', 'Payments', 'পেমেন্টস্', 'pagos', 'betalingen', 'Płatności', 'Zahlungen', 'Paiements', 'Pagamenti', 'платежи', 'pagamentos', 'Ödemeler', '지급', 'πληρωμές', '支付'),
(90, 'approve_order', 'Approve Order', 'অর্ডার অনুমোদন', 'aprobar Orden', 'goedkeuren Order', 'Zatwierdzanie Order', 'genehmigen Bestellen', 'Approuver Ordre', 'Approva Order', 'Утвердить Order', 'aprovar Ordem', 'Sipariş Onayla', '주문 승인', 'εγκρίνει Παραγγελία', '批准订单'),
(91, 'confirm_order', 'Confirm Order', 'আদেশ নিশ্চিত করুন', 'Confirmar pedido', 'Bevestig bestelling', 'Potwierdzić zamówienie', 'Bestellung bestätigen', 'Confirmer la commande', 'Confermare l\'ordine', 'Подтвердите заказ', 'Confirmar pedido', 'Sipariş onaylamak', '주문 확인', 'Επιβεβαίωση παραγγελίας', '确认订单'),
(92, 'shipping_method', 'Shipping Method', 'পরিবহণ মাধ্যম', 'Método de envío', 'Verzendmethode', 'Sposób wysyłki', 'Versandart', 'Méthode d\'envoi', 'metodo di spedizione', 'способ доставки', 'método de envio', 'Nakliye Yöntemi', '배송 방법', 'Μέθοδος αποστολής', '邮寄方式'),
(93, 'select_a_shipping_method', 'Select A Shipping Method', 'নির্বাচন একটি শিপিং পদ্ধতি', 'Seleccione un método de envío', 'Selecteer een verzendmethode', 'Wybierz metodę wysyłce', 'Wählen Sie eine Versandart', 'Sélectionnez A Méthode d\'expédition', 'Selezionare un metodo di spedizione', 'Выберите способ доставки', 'Selecione um método de envio', 'A Nakliye Yöntemi Seçin', '해운 방법 선택', 'Επιλέξτε μια μέθοδο αποστολής', '选择送货方式'),
(94, 'add_shipping_method', 'Add Shipping Method', 'যোগ শিপিং পদ্ধতি', 'Agregar método de envío', 'Voeg Verzendmethode', 'Dodaj metodę wysyłki', 'In Versandart', 'Ajouter Méthode d\'expédition', 'Aggiungere Metodo di Spedizione', 'Добавить метод доставки', 'Adicionar método de envio', 'Nakliye Yöntemi Ekle', '배송 방법 추가', 'Προσθέστε Μέθοδος ναυτιλίας', '添加送货方式'),
(95, 'shipping_method_name', 'Shipping Method Name', 'শিপিং পদ্ধতি নাম', 'Nombre del método de envío', 'Verzendmethode Naam', 'Nazwa Sposób wysyłki', 'Versandmethodenname', 'Nom Méthode d\'expédition', 'Nome Metodo di Spedizione', 'Имя Способ доставки', 'Nome do método de envio', 'Nakliye Yöntemi ismi', '배송 방법 이름', 'Όνομα Μέθοδος ναυτιλίας', '送货方式名称'),
(96, 'courier_name', 'Courier Name', 'কুরিয়ার নাম', 'Nombre del mensajero', 'Courier Naam', 'Kurier Nazwa', 'Courier-Name', 'Courier Nom', 'Courier Nome', 'Имя курьера', 'Nome Courier', 'kurye Adı', '택배 이름', 'Courier Όνομα', '快递名称'),
(97, 'select_a_courier_name', 'Select A Courier Name', 'নির্বাচন একটি কুরিয়ার নাম', 'Seleccione un nombre de Correo', 'Selecteer A Courier Naam', 'Wybierz nazwę Courier', 'Wählen Sie ein Kurier-Name', 'Sélectionnez un nom Courier', 'Selezionare un nome Courier', 'Выберите имя курьера', 'Selecione um nome de Courier', 'Bir Kurye Adı Seç', '택배 이름을 선택', 'Επιλέξτε ένα όνομα Courier', '选择courier名称'),
(98, 'add_courier', 'Add Courier', 'কুরিয়ার যোগ', 'Añadir Courier', 'Voeg Courier', 'Dodaj Courier', 'In Courier', 'Ajouter Courier', 'Aggiungere Courier', 'Добавить Courier', 'Adicionar Courier', 'Kurye ekle', '택배 추가', 'Προσθέστε Courier', '加入速递'),
(99, 'tracking_number', 'Tracking Number', 'ট্র্যাকিং নম্বর', 'El número de rastreo', 'Volg nummer', 'Numer przesyłki', 'Auftragsnummer, Frachtnummer, Sendungscode', 'Numéro de traçage', 'Numero di identificazione', 'Номер Отслеживания', 'Numero de rastreio', 'Takip numarası', '추적 번호', 'Αριθμός εντοπισμού', '追踪号码'),
(100, 'new_shipping_method', 'New Shipping Method', 'নতুন শিপিং পদ্ধতি', 'Nuevo método de envío', 'Nieuwe Verzendmethode', 'Nowa metoda wysyłki', 'Neue Versandart', 'Nouvelle Méthode d\'expédition', 'Nuovo metodo di spedizione', 'Новый метод доставки', 'Novo Método de Envio', 'Yeni Nakliye Yöntemi', '새로운 배송 방법', 'Νέα Μέθοδος Αποστολής', '新的配送方式'),
(101, 'new_courier_name', 'New Courier Name', 'নিউ কুরিয়ার নাম', 'Nuevo Correo Nombre', 'New Courier Naam', 'Nowy Kurier Nazwa', 'New Courier-Name', 'Nouveau nom de Courier', 'Nuovo nome Courier', 'Новый Курьер Имя', 'Novo nome de Courier', 'Yeni Kurye Adı', '새로운 택배 이름', 'Νέα Courier Όνομα', '新品速递名称'),
(102, 'date', 'Date', 'তারিখ', 'Fecha', 'Datum', 'Data', 'Datum', 'date', 'Data', 'Дата', 'Encontro', 'tarih', '날짜', 'Ημερομηνία', '日期'),
(103, 'create_shipment', 'Create Shipment', 'চালান তৈরি করুন', 'crear envío', 'Maak Zending', 'Tworzenie przesyłki', 'erstellen Versand', 'Créer l\'envoi', 'creazione di spedizione', 'Создание Пересылка', 'Criar Remessa', 'Gönderi oluşturma', '출하 만들기', 'Δημιουργία αποστολή', '创建装运'),
(104, 'product', 'Product', 'পণ্য', 'Producto', 'Artikel', 'Produkt', 'Produkt', 'Produit', 'Prodotto', 'Продукт', 'Produto', 'Ürün', '생성물', 'Προϊόν', '产品'),
(105, 'left_in_stock', 'Left In Stock', 'স্টক ইন বাম', 'Quedaban en almacenaje', 'Op voorraad', 'W magazynie', 'Stück auf Lager', 'En stock', 'Disponibilità immediata', 'Слева на складе', 'Left in stock', 'Stokta Sol', '주식에서 왼쪽', 'Αριστερά Διαθέσιμα', '左库存'),
(106, 'qty', 'Qty', 'Qty', 'Cantidad', 'Aantal', 'Ilosc', 'Anz', 'Quantité', 'Quantità', 'Кол-во', 'Qtde', 'Adet', '수량', 'ποσότητα', '数量'),
(107, 'ship_qty', 'Ship Qty', 'জাহাজ চলছে', 'nave Cantidad', 'schip Aantal', 'statek szt', 'Schiffs Menge', 'navire Quantité', 'Quantità nave', 'Судовая Кол-во', 'navio Qtde', 'Gemi Adet', '선박 수량', 'πλοίο Ποσότητα', '船舶数量'),
(108, 'price', 'Price', 'মূল্য', 'Precio', 'Prijs', 'Cena', 'Preis', 'Prix', 'Prezzo', 'Цена', 'Preço', 'Fiyat', '가격', 'Τιμή', '价钱'),
(109, 'discount', 'Discount', 'ডিসকাউন্ট', 'Descuento', 'Korting', 'Zniżka', 'Rabatt', 'Remise', 'Sconto', 'скидка', 'Desconto', 'İndirim', '할인', 'Έκπτωση', '折扣'),
(110, 'tax', 'Tax', 'কর', 'Impuesto', 'belasting', 'Podatek', 'Steuer', 'Impôt', 'Imposta', 'налог', 'imposto', 'Vergi', '세', 'Φόρος', '税'),
(111, 'sub_total', 'sub Total', 'সাব মোট', 'sub total', 'Subtotaal', 'Suma cząstkowa', 'Untergesamt', 'sous-total', 'sub totale', 'Итого к югу', 'sub total', 'sub Toplam', '서브 총', 'Υποσύνολο', '小计'),
(112, 'in_stock', 'In Stock', 'স্টক ইন', 'En stock', 'Op voorraad', 'w magazynie', 'Auf Lager', 'En stock', 'Disponibile', 'В наличии', 'Em estoque', 'Stokta var', '재고', 'Σε απόθεμα', '有现货'),
(113, 'total', 'Total', 'মোট', 'Total', 'Totaal', 'Całkowity', 'Gesamt', 'Total', 'Totale', 'Всего', 'Total', 'Genel Toplam', '합계', 'Σύνολο', '总'),
(114, 'due_date', 'Due Date', 'নির্দিষ্ট তারিখ', 'Fecha de vencimiento', 'Opleveringsdatum', 'Zanim odejdą wody', 'Geburtstermin', 'Date d\'échéance', 'Scadenza', 'Срок', 'Data de Vencimento', 'Bitiş tarihi', '마감일', 'Ημερομηνία λήξης', '截止日期'),
(115, 'invoice_qty', 'Invoice Qty', 'চালান Qty', 'Cantidad de facturas', 'factuur Aantal', 'faktura szt', 'Rechnungs Menge', 'facture Quantité', 'fattura Quantità', 'Счет-фактура Кол-во', 'fatura Qtde', 'fatura Adet', '송장 수량', 'τιμολόγιο Ποσότητα', '发票数量'),
(116, 'create_invoice', 'Create Invoice', 'চালান তৈরি করুন', 'Crear factura', 'Maak Factuur', 'Tworzenie faktury', 'Rechnung erstellen', 'Créer une facture', 'creare fattura', 'Создание счета-фактуры', 'Criar fatura', 'Fatura oluşturma', '송장 만들기', 'Δημιουργία τιμολογίου', '创建发票'),
(117, 'invoices', 'Invoices', 'ইনভয়েস বা চালান', 'Facturas', 'facturen', 'faktury', 'Rechnungen', 'factures', 'Fatture', 'Счета-фактуры', 'facturas', 'faturalar', '송장', 'τιμολόγια', '发票'),
(118, 'select_an_invoice', 'Select An Invoice', 'একটি চালান নির্বাচন', 'Seleccionar una factura', 'Selecteer Een Factuur', 'Wybierz faktury', 'Wählen Sie eine Rechnung', 'Sélectionnez une facture', 'Selezionare una fattura', 'Выберите счет-фактуру', 'Seleccionar uma factura', 'Bir Fatura seçin', '송장을 선택', 'Επιλέξτε ένα τιμολόγιο', '选择一个发票'),
(119, 'amount', 'Amount', 'পরিমাণ', 'Cantidad', 'Bedrag', 'Ilość', 'Menge', 'Montant', 'Quantità', 'Количество', 'Quantidade', 'miktar', '양', 'Ποσό', '量'),
(120, 'enter_payment_amount', 'Enter Payment Amount', 'পেমেন্ট পরিমাণ লিখুন', 'Ingrese monto de pago', 'Voer Betaling Bedrag', 'Wprowadź Kwota płatności', 'Geben Sie Zahlungsbetrag', 'Entrez le montant du paiement', 'Inserire l\'importo di pagamento', 'Введите Сумма платежа', 'Digite Valor do Pagamento', 'Ödeme Miktar giriniz', '결제 금액을 입력', 'Εισάγετε Ποσό Πληρωμής', '输入付款金额'),
(121, 'payment_method', 'Payment Method', 'মূল্যপরিশোধ পদ্ধতি', 'Método de pago', 'Betalingsmiddel', 'Metoda płatności', 'Bezahlverfahren', 'Mode de paiement', 'Metodo di pagamento', 'Способ оплаты', 'Método de pagamento', 'Ödeme şekli', '지불 방법', 'Μέθοδος πληρωμής', '付款方法'),
(122, 'cash', 'Cash', 'নগদ', 'Efectivo', 'geld', 'Gotówka', 'Kasse', 'Argent liquide', 'Contanti', 'Денежные средства', 'Dinheiro', 'Nakit', '현금', 'Μετρητά', '现金'),
(123, 'cheque', 'Cheque', 'চেক', 'Comprobar', 'Cheque', 'Czek', 'Prüfen', 'Vérifier', 'Dai un\'occhiata', 'чек об оплате', 'Verifica', 'Kontrol', '검사', 'Έλεγχος', '支票'),
(124, 'card', 'Card', 'কার্ড', 'Tarjeta', 'Kaart', 'Karta', 'Karte', 'Carte', 'Carta', 'Карта', 'Cartão', 'kart', '카드', 'Κάρτα', '卡'),
(125, 'method', 'Method', 'পদ্ধতি', 'Método', 'Methode', 'metoda', 'Methode', 'méthode', 'metodo', 'метод', 'Método', 'Yöntem', '방법', 'Μέθοδος', '方法'),
(126, 'select_payment_method', 'Select Payment Method', 'পেমেন্ট পদ্ধতি নির্বাচন', 'Seleccione el método de pago', 'Selecteer betaalmethode', 'Wybierz metodę płatności', 'Zahlungsmethode auswählen', 'Sélectionnez le mode de paiement', 'scegli il metodo di pagamento', 'Выберите метод оплаты', 'Selecione o método de pagamento', 'ödeme türünü seçin', '선택 지불 방법', 'Επιλέξτε τη μέθοδο πληρωμής', '请选择支付方式'),
(127, 'notes', 'Notes', 'নোট', 'notas', 'Notes', 'Uwagi', 'Notizen', 'Remarques', 'Note', 'Заметки', 'notas', 'notlar', '노트', 'Σημειώσεις', '笔记'),
(128, 'take_payment', 'Take Payment', 'পেমেন্ট নিন', 'tome Pago', 'Neem Betaling', 'Weź Płatność', 'Nehmen Sie Zahlung', 'Prenez paiement', 'prendere il pagamento', 'Возьмите Оплата', 'tome pagamento', 'Ödeme alın', '지불을', 'Πάρτε πληρωμής', '就拿付款'),
(129, 'total_order_amount', 'Total Order Amount', 'মোট অর্ডার পরিমাণ', 'Monto Total del pedido', 'Totale orderbedrag', 'Całkowita kwota zamówienia', 'Gesamtauftragssumme', 'Total Montant de la commande', 'Importo totale Order', 'Общая сумма заказа', 'Total da ordem Montante', 'Toplam Sipariş Miktarı', '총 주문 금액', 'Σύνολο Παραγγελία Ποσό', '订单总额'),
(130, 'selected_invoice_amount', 'Selected Invoice Amount', 'সিলেক্টেড চালান পরিমাণ', 'Importe de la factura seleccionada', 'Geselecteerde Factuurbedrag', 'Wybrane Kwota faktury', 'Ausgewählte Rechnungsbetrag', 'Sélectionné Montant de la facture', 'Importo fattura selezionata', 'Выбранный Сумма счета-фактуры', 'Selecionados Montante Invoice', 'Seçilmiş Fatura Tutarı', '선정 된 송장 금액', 'Επιλεγμένα Ποσό τιμολογίου', '选定的发票金额'),
(131, 'total_paid_amount', 'Total Paid Amount', 'মোট পরিশোধিত পরিমাণ', 'Cantidad del pago total', 'De totale betaalde bedrag', 'Razem wpłaconej kwoty', 'Insgesamt bezahlten Betrag', 'Montant total payé', 'Totale Importo pagato', 'Общая уплаченная сумма', 'Valor total pago', 'Toplam Ödenen Tutar', '총 지불 금액', 'Συνολικό καταβληθέν ποσό', '总支付的金额'),
(132, 'due', 'Due', 'দরুন', 'Debido', 'verschuldigd', 'Z powodu', 'Während', 'Dû', 'Dovuto', 'В связи', 'Devido', 'gereken', '정당한', 'Οφειλόμενος', '应有'),
(133, 'comments', 'Comments', 'মন্তব্য', 'comentarios', 'Comments', 'Komentarze', 'Bemerkungen', 'commentaires', 'Commenti', 'Комментарии', 'Comentários', 'Yorumlar', '댓글', 'Σχόλια', '注释'),
(134, 'write_your_comment', 'Write Your Comment', 'আপনার মন্তব্য লিখুন', 'Escriba su comentario', 'Schrijf uw reactie', 'Napisz komentarz', 'Schreiben Sie Ihren Kommentar', 'Rédigez votre commentaire', 'Scrivi il tuo commento', 'Написать комментарий', 'Escreva seu comentário', 'Yorumunuz yazın', '당신의 코멘트 쓰기', 'Γράψτε το σχόλιο σας', '您的评论'),
(135, 'post', 'Post', 'পোস্ট', 'Enviar', 'Post', 'Stanowisko', 'Post', 'Poster', 'Inviare', 'После', 'Postar', 'posta', '게시하다', 'Θέση', '岗位'),
(136, 'order', 'Order', 'ক্রম', 'Orden', 'Bestellen', 'Zamówienie', 'Auftrag', 'Commande', 'Ordine', 'порядок', 'Ordem', 'Sipariş', '주문', 'Παραγγελία', '订购'),
(137, 'order_information', 'Order Information', 'আদেশ তথ্য', 'información del pedido', 'order informatie', 'Szczegóły zamówienia', 'Bestellinformationen', 'Informations sur la commande', 'Informazioni sull\'ordine', 'запросить информацию', 'Informação fim', 'Sipariş Bilgisi', '주문 정보', 'Πληροφορίες Παραγγελίας', '订单信息'),
(138, 'not_paid', 'Not Paid', 'অর্থ না', 'No pagado', 'Niet betaald', 'Niezapłacone', 'Nicht bezahlt', 'Impayé', 'Non pagato', 'Не оплачен', 'Não pago', 'Ödenmeyen', '미 지불 상태의', 'Απληρωτος', '未支付'),
(139, 'partially_paid', 'Partially Paid', 'আংশিকভাবে Paid', 'Parcialmente pagado', 'deels betaald', 'częściowo płatny', 'teilweise bezahlt', 'Partiellement payé', 'parzialmente pagato', 'Частично оплачиваемый', 'parcialmente pago', 'kısmen Ücretli', '부분 유료', 'μερικώς Paid', '部分支付'),
(140, 'paid', 'Paid', 'Paid', 'Pagado', 'Betaald', 'Płatny', 'Bezahlt', 'Payé', 'Pagato', 'оплаченный', 'Pago', 'ücretli', '유료', 'Έμμισθος', '付费'),
(141, 'options', 'Options', 'বিকল্প', 'opciones', 'opties', 'Opcje', 'Optionen', 'options de', 'Opzioni', 'Опции', 'opções', 'Seçenekler', '옵션', 'επιλογές', '选项'),
(142, 'download', 'Download', 'ডাউনলোড', 'Descargar', 'Download', 'Pobieranie', 'Herunterladen', 'Télécharger', 'Scaricare', 'Скачать', 'baixar', 'indir', '다운로드', 'Λήψη', '下载'),
(143, 'print', 'Print', 'ছাপা', 'Impresión', 'Afdrukken', 'Wydrukować', 'Drucken', 'Impression', 'Stampare', 'Распечатать', 'Impressão', 'baskı', '인쇄', 'Αποτύπωμα', '打印'),
(144, 'email_customer', 'Email Customer', 'ই-মেইল গ্রাহক', 'cliente de correo electrónico', 'E-mail Customer', 'E-mail klienta', 'E-Mail-Kunden', 'Email client', 'E-mail dei clienti', 'E-mail клиента', 'E-mail do cliente', 'E-posta Müşteri', '이메일 고객', 'email Πελατών', '电子邮件客户'),
(145, 'shipment', 'Shipment', 'জাহাজে প্রেরিত কাজ', 'Envío', 'Verzending', 'Wysyłka', 'Sendung', 'Expédition', 'Spedizione', 'отгрузка', 'embarque', 'yükleme', '선적', 'Αποστολή', '装船'),
(146, 'courier', 'Courier', 'দূত', 'mensajero', 'Koerier', 'Kurier', 'Kurier', 'Courrier', 'Corriere', 'курьер', 'Correio', 'Kurye', '급사', 'Μεταφορέας', '信使'),
(147, 'new_shipment', 'New Shipment', 'নতুন চালান', 'Nuevo envío', 'nieuwe Zending', 'Nowy przesyłki', 'Neu Versand', 'Nouveau envoi', 'nuova spedizione', 'Новая Пересылка', 'nova remessa', 'yeni Gönderi', '새로운 선적', 'νέα αποστολή', '新货'),
(148, 'sales_orders', 'Sales Orders', 'বিক্রয় আদেশ', 'Ordenes de venta', 'Verkooporders', 'zleceń sprzedaży', 'Kundenaufträge', 'Commandes', 'Ordini di vendita', 'Заказы на продажу', 'Ordens de venda', 'Satış siparişleri', '판매 주문', 'Παραγγελίες', '销售订单'),
(149, 'customer_information', 'Customer Information', 'ক্রেতা তথ্য', 'Información al cliente', 'klant informatie', 'Informacje dla klientów', 'Kundeninformation', 'Informations client', 'informazioni per il cliente', 'Информация для покупателей', 'Informação ao Cliente', 'Müşteri Bilgileri', '고객 정보', 'πληροφορίες πελατών', '客户信息'),
(150, 'order_code', 'Order Code', 'অর্ডার কোড', 'Código de orden', 'Bestelcode', 'Kod zamówienia', 'Bestellcode', 'Code de commande', 'Codice d\'ordine', 'Код заказа', 'Código de encomenda', 'Sipariş kodu', '주문 코드', 'Κωδικός Παραγγελίας', '订购代码'),
(151, 'select_a_customer', 'Select A Customer', 'একজন গ্রাহক নির্বাচন', 'Seleccione un cliente', 'Selecteer Een klant', 'Wybierz klienta', 'Wählen Sie ein Kunde', 'Sélectionnez un client', 'Selezionare un cliente', 'Выберите клиента', 'Selecione um cliente', 'Bir Müşteri seçin', '고객 선택', 'Επιλέξτε έναν πελάτη', '选择客户'),
(152, 'seller', 'Seller', 'বিক্রেতা', 'Vendedor', 'Verkoper', 'Sprzedawca', 'Verkäufer', 'Vendeur', 'Venditore', 'продавец', 'Vendedor', 'satıcı', '파는 사람', 'Πωλητής', '卖家'),
(153, 'billing_address', 'Billing Address', 'বিলিং ঠিকানা', 'Dirección de Envio', 'Facturatie adres', 'Adres rozliczeniowy', 'Rechnungsadresse', 'Adresse de facturation', 'Indirizzo Di Fatturazione', 'Платежный адрес', 'endereço de cobrança', 'Fatura Adresi', '청구 지 주소', 'Διεύθυνση χρέωσης', '帐单地址'),
(154, 'select_billing_address', 'Select Billing Address', 'বিলিং ঠিকানা নির্বাচন', 'Seleccione dirección de facturación', 'Selecteer factuuradres', 'Wybierz Billing Address', 'Wählen Sie Rechnungsadresse', 'Sélectionnez Adresse de facturation', 'Selezionare indirizzo di fatturazione', 'Выберите платежный адрес', 'Escolha um endereço de cobrança', 'Seç Fatura Adresi', '선택 결제 주소', 'Επιλέξτε Διεύθυνση χρέωσης', '选择帐单地址'),
(155, 'shipping_address', 'Shipping Address', 'প্রেরণের ঠিকানা', 'dirección de envío', 'Verzendingsadres', 'Adres wysyłki', 'Lieferanschrift', 'Adresse de livraison', 'indirizzo di spedizione', 'Адрес доставки', 'endereço de entrega', 'teslimat adresi', '배송 주소', 'Διεύθυνση αποστολής', '邮寄地址'),
(156, 'select_shipping_address', 'Select Shipping Address', 'শিপিং ঠিকানা নির্বাচন', 'Seleccione la dirección de envío', 'Selecteer Verzendadres', 'Wybierz Shipping Address', 'Wählen Sie Lieferadresse', 'Sélectionnez l\'adresse d\'expédition', 'Selezionare indirizzo di spedizione', 'Выбор адреса доставки', 'Escolha um endereço de entrega', 'Seç Teslimat Adresi', '선택 배송 주소', 'Επιλέξτε Διεύθυνση αποστολής', '选择送货地址'),
(157, 'select_customer_first', 'Select Customer First', 'গ্রাহক নির্বাচন প্রথম', 'Seleccionar cliente primero', 'Select Customer First', 'Wybierz Customer First', 'Wählen Sie Kunde zuerst', 'Sélectionnez le premier client', 'Seleziona cliente in primo luogo', 'Выберите Customer First', 'Escolha um cliente em primeiro lugar', 'Seçin Müşteri İlk', '선택 고객 우선', 'Επιλέξτε Customer First', '选择客户至上'),
(158, 'select_product', 'Select Product', 'প্রোডাক্ট নির্বাচন', 'Seleccionar producto', 'Kies een product', 'Wybierz produkt', 'Produkt auswählen', 'Sélectionner un produit', 'Seleziona prodotto', 'Выбор продукта', 'Selecionar produto', 'Ürün Seçiniz', '제품 선택', 'Επιλέξτε Προϊόν', '选择产品'),
(159, 'select_a_product', 'Select A Product', 'একটি পণ্য নির্বাচন', 'Seleccione un producto', 'Selecteer een product', 'Wybierz produkt', 'Wähle ein Produkt', 'Choisissez un produit', 'Seleziona un prodotto', 'Выберите продукт', 'Selecione um produto', 'Bir ürün seçin', '제품을 선택', 'Επιλέξτε ένα προϊόν', '选择一个产品'),
(160, 'create_order', 'Create Order', 'অর্ডার তৈরি', 'crear pedido', 'Maak Bestel', 'Tworzenie Order', 'Auftrag anlegen', 'Créer une commande', 'creare ordine', 'Создание заказа', 'Criar Ordem', 'Emri oluştur', '오더 생성', 'Δημιουργία Εντολής', '创建订单'),
(161, 'add_another_product', 'Add Another Product', 'আরেকটি পণ্য যোগ করুন', 'Añadir otro producto', 'Voeg een ander product', 'Dodaj kolejny produkt', 'In ein anderes Produkt', 'Ajouter un autre produit', 'Aggiungere un altro prodotto', 'Добавить другой продукт', 'Adicionar outro produto', 'Başka Ürün Ekle', '또 다른 제품 추가', 'Προσθέστε ένα άλλο προϊόν', '添加另一产品'),
(162, 'all_orders', 'All Orders', 'সমস্ত আদেশ', 'Todas las órdenes', 'Alle bestellingen', 'Wszystkie zamówienia', 'Alle Bestellungen', 'Tous les ordres', 'Tutti gli ordini', 'Все заказы', 'Todos os pedidos', 'Tüm siparişler', '모든 주문', 'Όλες οι Παραγγελίες', '所有订单'),
(163, 'pending_orders', 'Pending Orders', 'আদেশ অপেক্ষারত', 'Ordenes pendientes', 'Openstaande bestellingen', 'Oczekujące zamówienia', 'Ausstehende Bestellungen', 'Les commandes en attente', 'Ordini in attesa', 'Заказы в ожидании', 'Ordens pendentes', 'Siparişler Bekleyen', '주문을 보류', 'Εν αναμονή Παραγγελίες', '挂单'),
(164, 'confirmed_orders', 'Confirmed Orders', 'নিশ্চিতকৃত আদেশ', 'Pedidos confirmados', 'bevestigd Orders', 'potwierdzonych zamówień', 'Bestätigte Aufträge', 'Les commandes confirmées', 'ordini confermati', 'Подтвержденные заказы', 'encomendas confirmadas', 'Onaylandı Siparişler', '확정 주문', 'επιβεβαίωσε Παραγγελίες', '确认订单'),
(165, 'partially_shipped_orders', 'Partially Shipped Orders', 'আংশিক প্রেরিত আদেশ', 'Pedidos parcialmente Enviado', 'Gedeeltelijk verzonden Orders', 'Częściowo wysłane Zamówienia', 'Partiell versendeten Bestellungen', 'Les commandes partiellement expédiés', 'Ordini Parzialmente Spedito', 'Частично Погруженные заказы', 'Encomendas enviada parcialmente', 'Kısmen Gönderildi Siparişler', '부분적으로 배송 주문', 'Μερικώς παραγγελίες που αποστέλλονται', '部分订单发货'),
(166, 'shipped_orders', 'Shipped Orders', 'জাহাজে আদেশ', 'Las órdenes enviadas', 'verzonden bestellingen', 'Zamówienia dostarczane', 'versendeten Bestellungen', 'Les commandes expédiées', 'ordini spediti', 'Погруженные заказы', 'pedidos enviados', 'gönderilen Siparişler', '배송 주문', 'αποστέλλονται Παραγγελίες', '发货的订单'),
(167, 'delivered_orders', 'Delivered Orders', 'বিতরিত আদেশ', 'Los pedidos con destinación', 'geleverde bestellingen', 'Zamówienia dostarczane', 'gelieferte Aufträge', 'commandes livrées', 'ordini consegnati', 'развозили заказы', 'Encomendas entregues', 'teslim edilen siparişler', '배달 주문', 'Δημοσιεύθηκε Παραγγελίες', '交付订单'),
(168, 'edit', 'Edit', 'সম্পাদন করা', 'Editar', 'Bewerk', 'Edytować', 'Bearbeiten', 'modifier', 'Modifica', 'редактировать', 'Editar', 'Düzenleme', '편집하다', 'Επεξεργασία', '编辑'),
(169, 'action', 'Action', 'কর্ম', 'Acción', 'Actie', 'Akcja', 'Aktion', 'action', 'Azione', 'действие', 'Açao', 'Aksiyon', '동작', 'Δράση', '行动'),
(170, 'date_added', 'Date Added', 'তারিখ যোগ করা হয়েছে', 'Fecha Agregada', 'Datum toegevoegd', 'Data dodania', 'Datum hinzugefügt', 'date ajoutée', 'data aggiunta', 'Дата Добавлена', 'data adicionada', 'Ekleme Tarihi', '날짜 추가', 'Ημερομηνία Προστέθηκε', '添加日期'),
(171, 'last_modified', 'Last Modified', 'সর্বশেষ পরিবর্তিত', 'Última modificación', 'Laatst gewijzigd', 'Ostatnio zmodyfikowany', 'Zuletzt bearbeitet', 'Dernière mise à jour', 'Ultima modifica', 'Последнее изменение', 'Última modificação', 'Son düzenleme', '마지막으로 수정', 'Τελευταία τροποποίηση', '上一次更改'),
(172, 'pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped', 'Pshipped'),
(173, 'user_code', 'User Code', 'ব্যবহারকারী কোড', 'Codigo de usuario', 'gebruikerscode', 'Kod użytkownika', 'Benutzercode', 'Code utilisateur', 'Codice utente', 'Код пользователя', 'Código de utilizador', 'kullanıcı Kodu', '사용자 코드', 'Κωδικός χρήστη', '用户代码'),
(174, 'type', 'Type', 'আদর্শ', 'Tipo', 'Type', 'Rodzaj', 'Art', 'Type', 'Digitare', 'Тип', 'Digitar', 'tip', '유형', 'Τύπος', '类型'),
(175, 'user_profile', 'User Profile', 'ব্যবহারকারী প্রোফাইল', 'Perfil del usuario', 'Gebruikersprofiel', 'Profil użytkownika', 'Benutzerprofil', 'Profil de l\'utilisateur', 'Profilo utente', 'Профиль пользователя', 'Perfil de usuário', 'Kullanıcı profili', '유저 프로필', 'Προφίλ χρήστη', '用户资料'),
(176, 'addresses', 'Addresses', 'ঠিকানাগুলি', 'direcciones', 'adressen', 'adresy', 'Adressen', 'Adresses', 'indirizzi', 'Адреса', 'endereços', 'adresleri', '구애', 'Διευθύνσεις', '地址'),
(177, 'address_line_1', 'Address Line 1', 'ঠিকানা লাইন 1', 'Dirección Línea 1', 'Adres regel 1', 'Adres wiersz 1', 'Anschrift Zeile 1', 'Adresse 1', 'Indirizzo Linea 1', 'Адресная строка 1', 'Endereço Linha 1', 'Adres satırı 1', '주소 입력란 1', 'Διεύθυνση 1', '地址栏1'),
(178, 'address_line_2', 'Address Line 2', 'ঠিকানা লাইন ২', 'Dirección Línea 2', 'Adres lijn 2', 'Adres wiersz 2', 'Adresszeile 2', 'Adresse Ligne 2', 'indirizzo 2', 'Адресная строка 2', 'Linha de endereço 2', 'Adres Satırı 2', '주소 2', 'Διεύθυνση Γραμμή 2', '地址行2'),
(179, 'add_new_address', 'Add New Address', 'নতুন ঠিকানা যোগ করুন', 'Agregar nueva dirección', 'Nieuw adres toevoegen', 'Dodaj nowy adres', 'Neue Adresse hinzufügen', 'Ajouter une nouvelle adresse', 'Aggiungi un nuovo indirizzo', 'Добавить новый адрес', 'Adicionar novo endereço', 'Yeni adres ekleyin', '새 주소 추가', 'Προσθήκη νέας διεύθυνσης', '添加新地址'),
(180, 'sales_order_history', 'Sales Order History', 'সেলস অর্ডার ইতিহাস', 'No encuentra ventas', 'Sales Order Geschiedenis', 'Sprzedaż Historia zamówień', 'Kundenauftragshistorie', 'Sales Historique des commandes', 'Vendite Storia Order', 'Продажи История заказов', 'Vendas História Order', 'Satış Sipariş Geçmişim', '판매 주문 내역', 'Πωλήσεις Ιστορικό Παραγγελιών', '销售订单历史记录'),
(181, 'date_created', 'Date Created', 'তারিখ তৈরী', 'fecha de creacion', 'Datum gecreeërd', 'Data utworzenia', 'Datum erstellt', 'date de création', 'data di creazione', 'Дата создания', 'Data Criada', 'tarih oluşturuldu', '작성일', 'Ημερομηνία Δημιουργίας', '创建日期'),
(182, 'status', 'Status', 'অবস্থা', 'Estado', 'toestand', 'Status', 'Status', 'statut', 'Stato', 'Положение дел', 'estado', 'durum', '지위', 'Κατάσταση', '状态'),
(183, 'view_order', 'View Order', 'অর্ডার দেখুন', 'Ver pedido', 'Bestelling bekijken', 'Zobacz Zamówienie', 'Bestellung anzeigen', 'Voir l\'ordre', 'Visualizza ordine', 'Посмотреть заказ', 'Ver encomenda', 'Siparişi görüntüle', '주문보기', 'Προβολή παραγγελίας', '查看订单'),
(184, 'add_product', 'Add Product', 'পণ্য যোগ করুন', 'Añadir Producto', 'Product toevoegen', 'Dodaj produkt', 'Produkt hinzufügen', 'Ajouter le produit', 'Aggiungi prodotto', 'Добавить продукт', 'Adicionar produto', 'Ürün ekle', '제품 추가', 'Προσθέστε το προϊόν', '添加产品'),
(185, 'code', 'Code', 'কোড', 'Código', 'Code', 'Kod', 'Code', 'Code', 'Codice', 'Код', 'Código', 'kod', '암호', 'Κώδικας', '码'),
(186, 'available_stock', 'Available Stock', 'মজুতে সহজলভ্য, সহজপ্রাপ্ত, সহজলভ্য', 'Stock disponible', 'Beschikbare voorraad', 'dostępne Zdjęcie', 'Lagerbestand', 'Stock disponible', 'Merce disponibile a magazzino', 'Есть на складе', 'disponível da', 'Mevcut stok', '재고', 'διαθέσιμο απόθεμα', '现有库存'),
(187, 'cost_price', 'Cost Price', 'কেনা দাম', 'Precio de coste', 'Kostprijs', 'Cena fabryczna', 'kosten~~POS=TRUNC', 'Prix ​​de revient', 'Prezzo di costo', 'Себестоимость', 'Preço de custo', 'Maliyet fiyatı', '가격', 'ΚΟΣΤΟΣ', '成本价'),
(188, 'selling_price', 'Selling Price', 'বিক্রয় মূল্য', 'Precio de venta', 'Verkoopprijs', 'Cena sprzedaży', 'Verkaufspreis', 'Prix ​​de vente', 'Prezzo di vendita', 'Цена продажи', 'Preço de venda', 'Satış fiyatı', '판매 가격', 'Τιμή πωλήσεως', '售价'),
(189, 'details', 'Details', 'বিস্তারিত', 'detalles', 'Details', 'Detale', 'Einzelheiten', 'Détails', 'Dettagli', 'Детали', 'detalhes', 'ayrıntılar', '세부', 'Καθέκαστα', '细节'),
(190, 'select_a_country', 'Select A Country', 'একটি দেশ নির্বাচন কর', 'Seleccione un país', 'Selecteer een land', 'Wybierz kraj', 'Wähle ein Land', 'Choisissez un pays', 'Seleziona un Paese', 'Выберите страну', 'Selecione um pais', 'Bir ülke seçin', '국가를 선택하십시오', 'Επιλέξτε μια χώρα', '选择一个国家'),
(191, 'save', 'Save', 'সংরক্ষণ করুন', 'Salvar', 'Save', 'Zapisać', 'sparen', 'sauvegarder', 'Salvare', 'Сохранить', 'Salvar', 'Kayıt etmek', '구하다', 'Αποθηκεύσετε', '保存'),
(192, 'address_added_successfully', 'Address Added Successfully', 'ঠিকানা সফলভাবে যোগ করা', 'Dirección agregado con éxito', 'Adres succesvol toegevoegd', 'Adres został dodany', 'Adresse erfolgreich hinzugefügt', 'Adresse Ajouté avec succès', 'Indirizzo Aggiunto con successo', 'Адрес успешно добавлен', 'Endereço Adicionado com sucesso', 'Adres Başarıyla Eklendi', '주소가 성공적으로 추가', 'Διεύθυνση προστέθηκε με επιτυχία', '地址添加成功'),
(193, 'enter_sufficient_info', 'Enter Sufficient Info', 'পর্যাপ্ত তথ্য লিখুন', 'Introduzca la información suficiente', 'Voer Voldoende Info', 'Wprowadź Wystarczająca informacji', 'Geben Sie genügend Info', 'Entrez suffisante Infos', 'Inserisci Info Sufficiente', 'Введите Достаточная информация', 'Digite Informações suficiente', 'Yeterli Bilgi girmek', '충분한 정보를 입력', 'Εισάγετε Επαρκής Πληροφορίες', '输入足够的信息'),
(194, 'edit_address', 'Edit Address', 'ঠিকানা সম্পাদনা', 'Editar dirección', 'Adres bewerken', 'Edytuj adres', 'Adresse bearbeiten', 'Modifier l\'adresse', 'Modifica indirizzo', 'Изменить адрес', 'Editar Endereço', 'Düzenleme Adresi', '주소 편집', 'Επεξεργασία Διεύθυνση', '编辑地址'),
(195, 'update', 'Update', 'হালনাগাদ', 'Actualizar', 'Bijwerken', 'Aktualizacja', 'Aktualisieren', 'Mettre à jour', 'Aggiornare', 'Обновить', 'Atualizar', 'Güncelleştirme', '최신 정보', 'Εκσυγχρονίζω', '更新'),
(196, 'address_edited_successfully', 'Address Edited Successfully', 'ঠিকানা সফলভাবে সম্পাদিত', 'Dirección editado correctamente', 'Adres succesvol Bewerkt', 'Adres Zmieniano Pomyślnie', 'Adresse erfolgreich bearbeitet', 'Adresse modifié avec succès', 'Indirizzo modificato con successo', 'Адрес Отредактировано Успешно', 'Endereço editado com sucesso', 'Adres Başarıyla Düzenlendi', '주소가 성공적으로 편집', 'Διεύθυνση Επιμέλεια επιτυχία', '地址修改成功'),
(197, 'address_deleted', 'Address Deleted', 'ঠিকানা মোছা', 'dirección eliminada', 'adres Verwijderde', 'adres Usunięte', 'Adresse wird gelöscht', 'Adresse supprimé', 'indirizzo eliminata', 'Адрес Удаляется', 'endereço excluídos', 'Adres silindi', '주소 삭제', 'διεύθυνση Διαγράφηκε', '地址删除'),
(198, 'edit_user', 'Edit User', 'ব্যবহারকারী সম্পাদনা', 'editar usuario', 'Gebruiker bewerken', 'Edit User', 'Benutzer bearbeiten', 'Modifier l\'utilisateur', 'Modifica utente', 'Изменить пользователя', 'Editar usuário', 'Düzenleme Kullanıcı', '사용자 편집', 'Επεξεργασία χρήστη', '编辑用户'),
(199, 'save_changes', 'Save Changes', 'পরিবর্তনগুলোর সংরক্ষন', 'Guardar cambios', 'Wijzigingen opslaan', 'Zapisz zmiany', 'Änderungen speichern', 'Sauvegarder les modifications', 'Salva I Cambiamenti', 'Сохранить изменения', 'Salvar alterações', 'Değişiklikleri Kaydet', '변경 사항을 저장하다', 'Αποθήκευσε τις αλλαγές', '保存更改');
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `bengali`, `spanish`, `dutch`, `polish`, `german`, `french`, `italian`, `russian`, `portugese`, `turkish`, `korean`, `greek`, `chinese`) VALUES
(200, 'data_updated_successfully', 'Data Updated Successfully', 'ডেটা সফলভাবে আপডেট', 'Datos actualizados con éxito', 'Data succesvol bijgewerkt', 'Dane zostały zaktualizowane', 'Daten erfolgreich aktualisiert', 'Mise à jour des données avec succès', 'Dati aggiornati correttamente', 'Данные успешно обновлены', 'Dados atualizados com sucesso', 'Veriler Başarıyla Güncellendi', '데이터가 성공적으로 업데이트', 'Τα δεδομένα ενημερώθηκαν με επιτυχία', '数据更新成功'),
(201, 'user_deleted', 'User Deleted', 'ব্যবহারকারী মোছা হয়েছে', 'Usuario eliminado', 'gebruiker verwijderd', 'użytkownik został usunięty', 'Benutzer gelöscht', 'utilisateur supprimé', 'utente cancellato', 'Пользователь Удален', 'usuário excluída', 'kullanıcı silindi', '사용자 삭제', 'Διαγράφηκε χρήστη', '用户删除'),
(202, 'product_information', 'Product Information', 'পণ্যের তথ্য', 'Información del Producto', 'Productinformatie', 'Informacje o produkcie', 'Produktinformation', 'Information produit', 'Informazioni sul prodotto', 'Информация о товаре', 'informação do produto', 'Ürün Bilgisi', '물품 정보', 'Πληροφορίες Προϊόντος', '产品信息'),
(203, 'product_name', 'Product Name', 'পণ্যের নাম', 'nombre del producto', 'productnaam', 'Nazwa produktu', 'Produktname', 'Nom du produit', 'nome del prodotto', 'наименование товара', 'Nome do Produto', 'Ürün adı', '상품명', 'όνομα προϊόντος', '产品名称'),
(204, 'brand', 'Brand', 'তরবার', 'Marca', 'Merk', 'Marka', 'Marke', 'Marque', 'Marca', 'марка', 'marca', 'Marka', '상표', 'Μάρκα', '牌'),
(205, 'product_brand', 'Product Brand', 'পণ্য ব্র্যান্ড', 'Producto de marca', 'product merk', 'Marka produktu', 'Produktmarke', 'Marque de produit', 'Marca del prodotto', 'Марка продукта', 'Marca do produto', 'Ürün Markası', '제품 브랜드', 'προϊόν Μάρκα', '产品品牌'),
(206, 'category', 'Category', 'বিভাগ', 'Categoría', 'Categorie', 'Kategoria', 'Kategorie', 'Catégorie', 'Categoria', 'категория', 'Categoria', 'Kategori', '범주', 'Κατηγορία', '类别'),
(207, 'select_category', 'Select Category', 'বিভাগ নির্বাচন করুন', 'selecciona una categoría', 'selecteer categorie', 'Wybierz kategorię', 'Kategorie wählen', 'Choisir une catégorie', 'Seleziona categoria', 'выберите категорию', 'Selecione a Categoria', 'Kategori seç', '카테고리 선택', 'Επιλέξτε Κατηγορία', '选择类别'),
(208, 'description', 'Description', 'বিবরণ', 'Descripción', 'Beschrijving', 'Opis', 'Beschreibung', 'La description', 'Descrizione', 'Описание', 'Descrição', 'Açıklama', '기술', 'Περιγραφή', '描述'),
(209, 'alert_quantity', 'Alert Quantity', 'সতর্কতা পরিমাণ', 'alerta Cantidad', 'alert Hoeveelheid', 'Ilość Alert', 'Alert-Menge', 'alerte Quantité', 'Alert Quantità', 'Количество оповещения', 'Quantidade de alerta', 'Uyarı Miktar', '경고 수량', 'alert Ποσότητα', '警报数量'),
(210, 'variant', 'Variant', 'বৈকল্পিক', 'Variante', 'Variant', 'Wariant', 'Variante', 'Une variante', 'Variante', 'Вариант', 'Variante', 'Varyant', '다른', 'Παραλαγή', '变种'),
(211, 'select_if_the_product_has_variant', 'Select If The Product Has Variant', 'নির্বাচন প্রোডাক্ট ভেরিয়েন্ট হয়ে থাকে', 'Seleccione si el producto ha Variant', 'Selecteer Als het product Variant', 'Select If The Product Has Variant', 'Wählen Sie, wenn das Produkt Variante hat', 'Sélectionnez si le produit a Variant', 'Selezionare Se ha il prodotto Variant', 'Выберите Если продукт имеет Variant', 'Selecione se o produto tem Variant', 'Ürün Variant Has Eğer seç', '이 제품은 변형이있는 경우 선택', 'Επιλέξτε εάν το προϊόν έχει Παραλλαγή', '选择如果产品有变'),
(212, 'this_product_has_no_variant', 'This Product Has No Variant', 'এই পণ্যের কোন ভেরিয়েন্ট', 'Este producto no tiene un Variant', 'Dit product heeft geen Variant', 'Ten produkt nie ma Variant', 'Dieses Produkt hat noch keine Variant', 'A ce produit No Variant', 'Ha questo prodotto Nessuna variante', 'Этот продукт не имеет Variant', 'Este produto não tem Variant', 'Bu Ürün No Variant Has', '이 제품은 변형을 미치지 않습니다', 'Αυτό το φάρμακο δεν έχει Variant', '本品无变'),
(213, 'this_product_has_variant', 'This Product Has Variant', 'এই পণ্য ভ্যারিয়ান্ট', 'Este producto tiene la variante', 'Dit product heeft Variant', 'Ten produkt ma Variant', 'Dieses Produkt hat Variant', 'A ce produit Variant', 'Ha questo prodotto Variant', 'Этот продукт имеет Variant', 'Este produto tem Variant', 'Bu ürün Variant Has', '이 제품은 변형 있음', 'Αυτό το προϊόν έχει Variant', '此产品已变'),
(214, 'images', 'Images', 'চিত্র', 'imágenes', 'Afbeeldingen', 'Obrazy', 'Bilder', 'Images', 'immagini', 'Изображений', 'imagens', 'Görüntüler', '이미지', 'εικόνες', '图片'),
(215, 'upload_product_images', 'Upload Product Images', 'আপলোড পণ্যের ছবি', 'Sube imágenes de los productos', 'Upload Productafbeeldingen', 'Dodaj zdjęcia produktu', 'Laden Sie Produktbilder', 'Télécharger Images produit', 'Carica Immagini prodotto', 'Загрузить Изображения продуктов', 'Publique as Imagens do Produto', 'Ürün Resimleri yükle', '제품 이미지를 업로드', 'Ανεβάσετε εικόνες προϊόντων', '上传产品图片'),
(216, 'save_product', 'Save Product', 'সংরক্ষণ করুন প্রোডাক্ট', 'Guardar Producto', 'Product opslaan', 'Zapisz produkt', 'Produkt speichern', 'Enregistrer le produit', 'Salva prodotto', 'Сохранить продукт', 'Guardar Produto', 'Kaydet Ürün', '저장 제품', 'Αποθήκευση προϊόντων', '保存产品'),
(217, 'product_category', 'Product Category', 'পণ্য তালিকা', 'categoria de producto', 'product categorie', 'Kategoria produktu', 'Produktkategorie', 'catégorie de produit', 'categoria di prodotto', 'категория продукта', 'Categoria de Produto', 'Ürün Kategorisi', '제품 카테고리', 'κατηγορία προιόντος', '产品分类'),
(218, 'product_info', 'Product Info', 'পণ্যর বিবরণ', 'Información del producto', 'Product informatie', 'Informacje o produkcie', 'Produktinformation', 'Information sur le produit', 'Informazioni sul prodotto', 'Информация о продукте', 'Informação do produto', 'Ürün bilgisi', '제품 정보', 'Πληροφορίες προϊόντος', '产品信息'),
(219, 'select_a_category', 'Select A Category', 'একটি বিভাগ নির্বাচন করুন', 'Seleccione una categoría', 'Kies een categorie', 'Wybierz kategorię', 'Wählen Sie eine Kategorie', 'Choisir une catégorie', 'Seleziona una categoria', 'Выберите категорию', 'Selecione uma categoria', 'Bir kategori seç', '카테고리를 선택', 'Επιλέξτε μία κατηγορία', '选择一个类别'),
(220, 'select_supplier', 'Select Supplier', 'সরবরাহকারী নির্বাচন', 'Seleccione Proveedor', 'Select Leverancier', 'Wybierz Dostawca', 'Wählen Sie Lieferant', 'Sélectionnez Fournisseur', 'Selezionare Fornitore', 'Выбор поставщика', 'Escolha um Fornecedor', 'seç Tedarikçi', '선택 공급 업체', 'Επιλέξτε Προμηθευτή', '选择供应商'),
(221, 'initial_stock', 'Initial Stock', 'প্রাথমিক শেয়ার', 'Existencias iniciales', 'Initial Stock', 'Początkowa Zdjęcie', 'Anfangsbestand', 'Stock initial', 'stock iniziale', 'Первоначальный сток', 'inicial da', 'ilk Stok', '초기 재고', 'αρχική Χρηματιστήριο', '初始股'),
(222, 'variants', 'Variants', 'রুপভেদ', 'variantes', 'varianten', 'warianty', 'Varianten', 'Variantes', 'varianti', 'Варианты', 'variantes', 'varyantlar', '변형', 'παραλλαγές', '变种'),
(223, 'select', 'Select', 'নির্বাচন করা', 'Seleccionar', 'kiezen', 'Wybierz', 'Wählen', 'Sélectionner', 'Selezionare', 'Выбрать', 'selecionar', 'seçmek', '고르다', 'Επιλέγω', '选择'),
(224, 'product_has', 'Product Has', 'পণ্যের', 'Ha producto', 'Het product heeft', 'Ma wyrobów', 'Produkt hat', 'A produit', 'Ha prodotto', 'Имеет продукта', 'O produto tem', 'Ürün Has', '제품 있음', 'Έχει προϊόν', '产品'),
(225, 'no', 'No', 'না', 'No', 'Nee', 'Nie', 'Nein', 'Non', 'No', 'Нет', 'Não', 'Yok hayır', '아니', 'Όχι', '没有'),
(226, 'product_has_no_variant', 'Product Has No Variant', 'পণ্যের কোন ভেরিয়েন্ট', 'Producto no tiene un Variant', 'Product heeft geen Variant', 'Produkt nie ma Variant', 'Produkt hat noch keine Variant', 'A Nr Variant', 'Ha articolo n Variant', 'Продукт не имеет Variant', 'Produto não tem Variant', 'Ürün No Variant Has', '제품은 더 변형을 미치지 않습니다', 'Φάρμακο δεν έχει Variant', '产品无变'),
(227, 'product_has_variant', 'Product Has Variant', 'প্রোডাক্ট ভ্যারিয়ান্ট', 'El producto tiene la variante', 'Het product heeft Variant', 'Produkt posiada Variant', 'Produkt hat Variant', 'A produit Variant', 'Ha prodotto Variante', 'Продукт имеет Variant', 'O produto tem Variant', 'Ürün Variant Has', '제품 변형을 가지고', 'Το προϊόν έχει Παραλλαγή', '产品有变'),
(228, 'select_if_the_product_has_variants', 'Select If The Product Has Variants', 'নির্বাচন প্রোডাক্ট রুপভেদ হয়ে থাকে', 'Seleccione si el producto ha Variantes', 'Selecteer Als het product Varianten', 'Wybierz w przypadku kiedy produkt Warianty', 'Wählen, wenn die Produktvarianten Hat', 'Sélectionnez Si a le produit Variantes', 'Seleziona se il prodotto ha Varianti', 'Выберите Если продукт имеет Варианты', 'Selecione se o produto tem Variantes', 'Ürün çeşitleri vardır Eğer seç', '이 제품은 변형이있는 경우 선택', 'Επιλέξτε αν έχει το Προϊόν Παραλλαγές', '选择如果产品有变'),
(229, 'specification', 'Specification', 'সবিস্তার বিবরণী', 'Especificación', 'Specificatie', 'Specyfikacja', 'Spezifikation', 'spécification', 'specificazione', 'Спецификация', 'Especificação', 'şartname', '사양', 'Προσδιορισμός', '规范'),
(230, 'stock', 'Stock', 'স্টক', 'Valores', 'Voorraad', 'Zbiory', 'Stock', 'Stock', 'Azione', 'Акции', 'estoque', 'Stok', '스톡', 'Στοκ', '股票'),
(231, 'add_another_variant', 'Add Another Variant', 'আরেকটি বৈকল্পিক যোগ', 'Añadir otra variante', 'Voeg een andere variant', 'Dodaj Inny wariant', 'In einer anderen Variante', 'Ajouter une autre variante', 'Aggiungere un\'altra variante', 'Добавить другой вариант', 'Adicionar outra variante', 'Başka Variant ekle', '또 다른 변형 추가', 'Προσθέστε άλλη παραλλαγή', '添加另一个变体'),
(232, 'product_categories', 'Product Categories', 'পণের ধরন', 'Categorías de Producto', 'productcategorieën', 'Kategorie produktów', 'Produktkategorien', 'catégories de produits', 'Categorie di Prodotto', 'Категории продукта', 'Categorias de Produtos', 'ürün kategorileri', '제품 카테고리', 'Κατηγορίες Προϊόντων', '产品分类'),
(233, 'add_product_category', 'Add Product Category', 'যোগ পণ্য শ্রেণী', 'Añadir Categoría de producto', 'Toevoegen Product Category', 'Dodaj produkt Kategoria', 'In der Produktkategorien', 'Ajouter une catégorie de produit', 'Aggiungere prodotto Categoria', 'Добавить Категория продукта', 'Adicionar categoria de produto', 'Ürün Kategorisi Ekle', '제품 카테고리를 추가', 'Προσθήκη προϊόντος Κατηγορία', '添加产品类别'),
(234, 'category_name', 'Category Name', 'বিভাগ নাম', 'nombre de la categoría', 'categorie naam', 'Nazwa Kategorii', 'Kategoriename', 'Nom de catégorie', 'Nome della categoria', 'Категория Название', 'Nome da Categoria', 'Kategori adı', '카테고리 이름', 'όνομα κατηγορίας', '分类名称'),
(235, 'product_category_added_successfully', 'Product Category Added Successfully', 'পণ্য শ্রেণী সফলভাবে যোগ করা', 'Categoría de producto agregado con éxito', 'Product Category succesvol toegevoegd', 'Kategoria Produkt został dodany pomyślnie', 'Produktkategorie Erfolgreich', 'Catégorie de produit a été ajouté', 'Categoria prodotto è stato aggiunto', 'Категория продукта успешно добавлен', 'Categoria Produto adicionado com sucesso', 'Ürün Kategorisi Başarıyla Eklendi', '제품 카테고리 성공적 추가', 'Κατηγορία προϊόντος προστέθηκε με επιτυχία', '产品类别增加成功'),
(236, 'enter_category_name', 'Enter Category Name', 'বিষয়শ্রেণী নাম লিখুন', 'Introduzca Nombre de categoría', 'Voer Categorie Name', 'Wprowadź nazwę kategorii', 'Geben Sie Kategorie Name', 'Entrez Nom de la catégorie', 'Inserisci Nome Categoria', 'Введите название категории', 'Introduzir nome da categoria', 'Kategori Adını Girin', '카테고리 이름을 입력합니다', 'Πληκτρολογήστε το Όνομα κατηγορίας', '输入类别名称'),
(237, 'product_category_deleted', 'Product Category Deleted', 'প্রোডাক্ট বিষয়শ্রেণী মোছা', 'Categoría de producto eliminadas', 'Product Category Verwijderde', 'Kategoria produktów Usunięte', 'Produktkategorie Gelöschte', 'Catégorie de produits Supprimé', 'Categoria di prodotto eliminati', 'Категория продукта Удаляется', 'Categoria do produto excluído', 'Ürün Kategorisi silindi', '제품 카테고리 삭제', 'Κατηγορία προϊόντος Διαγράφηκε', '产品类别已删除'),
(238, 'product_category_edited_successfully', 'Product Category Edited Successfully', 'পণ্য শ্রেণী সফলভাবে সম্পাদিত', 'Categoría de producto editado correctamente', 'Product Category Bewerkt succesvol', 'Kategoria produktów Zmieniano Pomyślnie', 'Produktkategorie erfolgreich bearbeitet', 'Catégorie de produit modifié avec succès', 'Categoria prodotto modificato con successo', 'Категория продукта Отредактировано Успешно', 'Categoria do produto editado com sucesso', 'Ürün Kategorisi Başarıyla Düzenlendi', '제품 카테고리 성공적으로 편집', 'Κατηγορία προϊόντος Επεξεργασία επιτυχία', '产品类别成功编辑'),
(239, 'select_tax', 'Select Tax', 'ট্যাক্স নির্বাচন', 'Seleccione Tributaria', 'Select Tax', 'Wybierz podatki', 'Wählen Steuer', 'Sélectionnez la taxe', 'Selezionare fiscale', 'Выберите Налоговый', 'Select Tax', 'seç Vergi', '선택 세금', 'Επιλέξτε ΔΟΥ', '选择税'),
(240, 'no_tax', 'No Tax', 'কর নেই', 'Sin impuestos', 'Geen belasting', 'Bez podatku', 'Keine Steuer', 'Pas de taxes', 'Senza tasse', 'Нет Налог', 'Nenhum imposto', 'Vergisiz', '세금 없음', 'κανένας φόρος', '无税'),
(241, 'select_tax_rate', 'Select Tax Rate', 'নির্বাচন ট্যাক্স হার', 'Seleccione tasa de impuesto', 'Selecteer Tax Rate', 'Wybierz stawka podatkowa', 'Wählen Steuersatz', 'Sélectionnez Taux d\'imposition', 'Selezionare Tax Rate', 'Выбор налоговой ставки', 'Selecione Taxa de imposto', 'Vergi Oranını seçin', '세율을 선택', 'Επιλέξτε φορολογικός συντελεστής', '选择税率'),
(242, 'roll', 'Roll', 'রোল', 'Rodar', 'Rollen', 'Rolka', 'Rollen', 'Roulent', 'Rotolo', 'Рулон', 'Rolo', 'Rulo', '롤', 'Ρολό', '滚'),
(243, 'product_added_succesfully', 'Product Added Succesfully', 'প্রোডাক্ট যোগ করা সফল হয়েছে', 'Producto añadido con éxito', 'Product toegevoegd Succesvol', 'Produkt został dodany pomyślnie', 'Produkt hinzugefügt Erfolgreich', 'Article ajouté avec succès se', 'Prodotto aggiunto con successo', 'Продукт Добавлено Успешно', 'O produto foi adicionado com sucesso', 'Ürün Eklendi birini başarıyla', '제품 추가들을 성공적', 'Προϊόν Προστέθηκε Succesfully', '产品附加值成功与'),
(244, 'available_in', 'Available In', 'সহজলভ্য', 'Disponible en', 'Beschikbaar in', 'Dostępne w', 'Verfügbar in', 'Disponible en', 'Disponibile in', 'Доступно в', 'Disponível em', 'Uygun', '가능한에서', 'Διαθέσιμο σε', '可用在'),
(245, 'available', 'Available', 'সহজলভ্য', 'Disponible', 'Beschikbaar', 'Dostępny', 'Erhältlich', 'Disponible', 'A disposizione', 'Доступный', 'Disponível', 'Mevcut', '유효한', 'Διαθέσιμος', '可用的'),
(246, 'product_details', 'Product Details', 'পণ্যের বিবরণ', 'detalles del producto', 'Productdetails', 'Szczegóły Produktu', 'Produktdetails', 'détails du produit', 'Dettagli del prodotto', 'информация о продукте', 'Detalhes do produto', 'Ürün Detayları', '제품 상세 정보', 'λεπτομέρειες προιόντος', '产品详情'),
(247, 'system_name', 'System Name', 'সিস্টেম নাম', 'Nombre del sistema', 'System Name', 'Name System', 'Systemname', 'Name System', 'Nome del sistema', 'Name System', 'Name System', 'sistem Adı', '시스템 이름', 'Name System', '系统名称'),
(248, 'system_title', 'System Title', 'সিস্টেম শিরোনাম', 'sistema de Título', 'System Titel', 'System Tytuł', 'System-Titel', 'système Titre', 'sistema Titolo', 'система Название', 'Título sistema', 'sistem Başlığı', '시스템 제목', 'σύστημα Τίτλος', '系统标题'),
(249, 'system_email', 'System Email', 'সিস্টেম ইমেইল', 'sistema de correo electrónico', 'System E-mail', 'System e-mail', 'System-E-Mail', 'système Email', 'sistema di posta elettronica', 'система E-mail', 'sistema de E-mail', 'sistem E-posta', 'System 전자 메일', 'σύστημα Email', '电子邮件系统'),
(250, 'dropbox_app_key', 'Dropbox App Key', 'ড্রপবক্স অ্যাপ মূল', 'Dropbox App Key', 'Dropbox App Key', 'Dropbox App Key', 'Dropbox App Key', 'Dropbox App Key', 'Dropbox App chiave', 'Dropbox App Key', 'Dropbox App Key', 'Dropbox Uygulama Anahtarı', '드롭 박스 앱 키', 'Dropbox App Κλειδί', 'Dropbox的应用重点'),
(251, 'language', 'Language', 'ভাষা', 'Idioma', 'Taal', 'Język', 'Sprache', 'La langue', 'Lingua', 'язык', 'Língua', 'Dil', '언어', 'Γλώσσα', '语言'),
(252, 'text_align', 'Text Align', 'টেক্সট সারিবদ্ধ', 'Texto alineado', 'tekst uitlijnen', 'Wyrównanie tekstu', 'Textausrichtung', 'Text Align', 'Allineamento del testo', 'Text Align', 'Alinhamento de texto', 'Metin hizalama', '텍스트 정렬', 'Στοίχιση κειμένου', '文本对齐'),
(253, 'upload_logo', 'Upload Logo', 'লোগো আপলোড করুন', 'Subir Logo', 'Upload Logo', 'Prześlij Logo', 'Logo hochladen', 'Télécharger Logo', 'Carica Logo', 'Загрузить логотип', 'Carregar Logo', 'yükleme Logo', '업로드 로고', 'Ανεβάστε Logo', '上传徽标'),
(254, 'upload', 'Upload', 'আপলোড', 'Subir', 'Uploaden', 'Przekazać plik', 'Hochladen', 'Télécharger', 'Caricare', 'Загрузить', 'Envio', 'yükleme', '업로드', 'Μεταφόρτωση', '上传'),
(255, 'shipping_methods_and_courier_services', 'Shipping Methods And Courier Services', 'শিপিং পদ্ধতি এবং কুরিয়ার সার্ভিস', 'Métodos de envío y servicios de mensajería', 'Verzend Methoden en koeriersdiensten', 'Metody wysyłki i kurierskie', 'Versandarten und Kurierdienste', 'Méthodes d\'expédition et de courrier', 'Metodi di trasporto e servizi di corriere', 'Методы доставки и курьерские услуги', 'Formas de Envio e serviços de correio', 'Kargo Yöntemleri Ve Kurye Hizmetleri', '배송 방법 택배 서비스', 'Τρόποι Αποστολής και ταχυμεταφορικές υπηρεσίες', '送货方式和快递服务'),
(256, 'shipping_methods', 'Shipping Methods', 'পরিবহন পদ্ধতি', 'Métodos de envío', 'verzendmethoden', 'Metody wysyłki', 'Versandarten', 'méthodes de livraison', 'Metodi di spedizione', 'Методы доставки', 'Métodos de Envio', 'Kargo Metodları', '배송 방법', 'Τρόποι Αποστολής', '送货方式'),
(257, 'courier_services', 'Courier Services', 'কুরিয়ার সার্ভিস', 'Servicios de mensajería', 'Koerierdiensten', 'Usługi kurierskie', 'Kurierdienste', 'Courier Services', 'Servizi di corriere', 'Курьерская служба', 'Serviços de entrega', 'Kurye servisi', '택배 서비스', 'Υπηρεσίες κούριερ', '快递服务'),
(258, 'add_courier_service', 'Add Courier Service', 'কুরিয়ার সার্ভিসের যোগ', 'Añadir Servicio de Correo', 'Voeg Courier Service', 'Dodaj kurier usługa', 'In Courier Service', 'Ajouter Courier Service', 'Aggiungere Courier Service', 'Добавить Courier Service', 'Adicionar Courier Service', 'Kurye Servisi ekle', '택배 서비스 추가', 'Προσθέστε Courier Service', '添加快递服务'),
(259, 'shipping_method_added_successfully', 'Shipping Method Added Successfully', 'শিপিং পদ্ধতি যোগ করা হয়েছে সফলভাবে', 'Método de envío añadido correctamente', 'Verzendmethode succesvol toegevoegd', 'Sposób wysyłki został dodany', 'Liefer-Methode erfolgreich hinzugefügt', 'Méthode d\'expédition ajouté avec succès', 'Metodo di Spedizione Aggiunto con successo', 'Способ доставки Успешно добавлен', 'Método de envio adicionado com sucesso', 'Nakliye Yöntemi Eklendi Başarıyla', '배송 방법 추가 성공', 'Ναυτιλία Μέθοδος προστέθηκε με επιτυχία', '航运方法添加成功'),
(260, 'enter_method_name', 'Enter Method Name', 'মেথড নাম লিখুন', 'Introducir el nombre de Método', 'Voer Methodenaam', 'Wpisz nazwę metody', 'Geben Sie Methodenname', 'Entrez le nom Méthode', 'Inserisci Nome metodo', 'Введите имя метода', 'Digite o nome de Método', 'Yöntem Adını Girin', '메소드의 이름을 입력합니다', 'Πληκτρολογήστε το όνομα της μεθόδου', '输入法名称'),
(261, 'courier_service_added_successfully', 'Courier Service Added Successfully', 'কুরিয়ার সার্ভিসের সফলভাবে যোগ করা', 'Servicio de mensajería agregado con éxito', 'Courier Service succesvol toegevoegd', 'Usługi kurierskie został dodany', 'Kurierdienst erfolgreich hinzugefügt', 'Courier Service Ajouté avec succès', 'Courier Service Aggiunto con successo', 'Курьерская служба успешно добавлен', 'Serviço de Courier Adicionado com sucesso', 'Kurye Servisi Başarıyla Eklendi', '택배 서비스가 성공적으로 추가', 'Courier Υπηρεσία προστέθηκε με επιτυχία', '快递服务添加成功'),
(262, 'enter_courier_service_name', 'Enter Courier Service Name', 'লিখুন কুরিয়ার সার্ভিসের নাম', 'Introducir el nombre de Servicio de Correo', 'Voer Courier Service Name', 'Wprowadź nazwę usługi kurierskie', 'Geben Sie Courier Service Name', 'Entrez le nom Courier Service', 'Inserire nome Courier Service', 'Введите имя курьерского сервиса', 'Digite o nome de Courier Service', 'Kurye Hizmeti Adını Girin', '택배 서비스 이름을 입력합니다', 'Πληκτρολογήστε το Όνομα Courier Service', '输入快递服务名称'),
(263, 'courier_service_name', 'Courier Service Name', 'কুরিয়ার সার্ভিসের নাম', 'Nombre del servicio de mensajería', 'Courier Service Name', 'Nazwa usługi kurierskie', 'Courier Service Name', 'Nom du service Courrier', 'Nome Courier Service', 'Имя фельдъегерской службы', 'Nome do serviço de correio', 'Kurye Hizmet Adı', '택배 서비스 이름', 'Όνομα Courier Service', '快递服务名称'),
(264, 'edit_shipping_method', 'Edit Shipping Method', 'শিপিং পদ্ধতি সম্পাদনা', 'Editar método de envío', 'Bewerken Verzendmethode', 'Edit Sposób wysyłki', 'Bearbeiten Liefer-Methode', 'Modifier le mode de livraison', 'Modifica metodo di spedizione', 'Изменить способ доставки', 'Editar método de envio', 'Düzenleme Nakliye Yöntemi', '편집 배송 방법', 'Επεξεργασία Μέθοδος ναυτιλίας', '编辑配送方式'),
(265, 'shipping_method_updated_successfully', 'Shipping Method Updated Successfully', 'শিপিং পদ্ধতি সফলভাবে আপডেট', 'Método de envío actualizado correctamente', 'Verzendmethode Bijgewerkt succesvol', 'Wysyłki metoda pomyślnie zaktualizowane', 'Liefer-Methode erfolgreich aktualisiert', 'Méthode d\'expédition Mise à jour avec succès', 'Metodo di Spedizione aggiornato con successo', 'Способ доставки успешно обновлен', 'Método do transporte atualizado com sucesso', 'Nakliye Yöntemi Başarıyla Güncellendi', '배송 방법은 성공적으로 업데이트', 'Μέθοδος ναυτιλίας ενημερώθηκε με επιτυχία', '配送方式更新成功'),
(266, 'edit_courier_service', 'Edit Courier Service', 'সম্পাদনা কুরিয়ার সার্ভিসের', 'Editar Servicio de Correo', 'Bewerken Courier Service', 'Edycja usługi kurierskie', 'Bearbeiten Kurierdienst', 'Modifier Courier Service', 'Modifica servizio corriere', 'Редактирование фельдъегерской службы', 'Editar Serviço Courier', 'Düzenleme Kurye Hizmeti', '편집 택배 서비스', 'Επεξεργασία Courier Service', '编辑快递服务'),
(267, 'courier_service_updated_successfully', 'Courier Service Updated Successfully', 'কুরিয়ার সার্ভিসের সফলভাবে আপডেট', 'Servicio de mensajería actualizado correctamente', 'Courier Service Bijgewerkt succesvol', 'Usługi kurierskie pomyślnie zaktualizowane', 'Courier Service erfolgreich aktualisiert', 'Courier Service Mise à jour avec succès', 'Courier Service aggiornato con successo', 'Курьерская служба успешно обновлен', 'Serviço de Courier atualizado com sucesso', 'Kurye Servisi Başarıyla Güncellendi', '택배 서비스가 성공적으로 업데이트', 'Courier Υπηρεσία ενημερώθηκε με επιτυχία', '快递服务已成功更新'),
(268, 'enter_service_name', 'Enter Service Name', 'কাজের নাম লিখুন', 'Introducir el nombre de Servicio', 'Voer Service Name', 'Wpisz nazwę usługi', 'Geben Sie Service-Name', 'Entrez Nom du service', 'Inserisci Name Service', 'Введите имя службы', 'Enter Name Service', 'Servis Adını Girin', '서비스 이름을 입력합니다', 'Πληκτρολογήστε το Όνομα υπηρεσίας', '输入服务名称'),
(269, 'data_deleted', 'Data Deleted', 'ডেটা মুছে', 'datos eliminados', 'gegevens worden gewist', 'dane Usunięte', 'gelöschter Daten', 'données supprimées', 'dati cancellati', 'Исключен данных', 'dados apagados', 'veri silinmiş', '데이터 삭제', 'διαγραμμένα δεδομένα', '数据删除'),
(270, 'taxes', 'Taxes', 'করের', 'Impuestos', 'Belastingen', 'Podatki', 'Steuern', 'taxes', 'Le tasse', 'налоги', 'Impostos', 'Vergiler', '구실', 'φόροι', '税'),
(271, 'add_tax', 'Add Tax', 'ট্যাক্স যোগ', 'Añadir Tributaria', 'Voeg Tax', 'Dodaj podatku', 'Steuern +', 'Ajouter impôt', 'Aggiungere fiscale', 'Добавить налог', 'Adicionar Tax', 'Vergi ekle', '세금 추가', 'Προσθέστε Φόρος', '添加税收'),
(272, 'tax_rates', 'Tax Rates', 'করের হার', 'Las tasas de impuestos', 'Belastingtarieven', 'Wysokość podatków', 'Steuersätze', 'Les taux d\'imposition', 'Aliquote fiscali', 'Налоговые ставки', 'Taxas de imposto', 'Vergi oranları', '세금 요금', 'Φορολογικοί Συντελεστές', '税率'),
(273, 'tax_code', 'Tax Code', 'ট্যাক্স কোড', 'Código de impuestos', 'BTW-code', 'Kod podatkowy', 'Steuer-Code', 'Code fiscal', 'Codice fiscale', 'Налоговый кодекс', 'Código Tributário', 'Vergi kodu', '세금 코드', 'Φορολογικός κώδικας', '税法'),
(274, 'percentage_value', 'Percentage Value', 'শতকরা মূল্য', 'Valor porcentaje', 'percentage Waarde', 'Procentowa wartość', 'Prozentwert', 'Pourcentage Valeur', 'percentuale Valore', 'Значение в процентах', 'Valor percentual', 'Yüzde Değeri', '백분율 값', 'ποσοστό Αξία', '百分比值'),
(275, 'tax_name', 'Tax Name', 'ট্যাক্স নাম', 'Nombre de Impuestos', 'tax Naam', 'Nazwa podatki', 'Steuer-Name', 'Nom de l\'impôt', 'Nome fiscale', 'Налоги Имя', 'Nome fiscal', 'vergi Adı', '세금 이름', 'Φόρος Όνομα', '税名'),
(276, 'value', 'Value', 'মূল্য', 'Valor', 'Waarde', 'Wartość', 'Wert', 'Valeur', 'Valore', 'Стоимость', 'Valor', 'değer', '값', 'Αξία', '值'),
(277, 'enter_percentage_value', 'Enter Percentage Value', 'শতকরা মান লিখুন', 'Introduzca el valor del Porcentaje', 'Voer Percentage Waarde', 'Wprowadź Wartość procentowa', 'Geben Sie Prozentwert', 'Entrez Pourcentage Valeur', 'Inserisci Percentuale Valore', 'Введите процентное значение', 'Inserir Valor Percentual', 'Yüzde değeri girin', '백분율 값을 입력', 'Εισάγετε Ποσοστό Αξία', '输入百分比值'),
(278, 'tax_added_successfully', 'Tax Added Successfully', 'সংযোজন কর সফলভাবে', 'Impuestos añadido correctamente', 'Belasting over de toegevoegde succesvol', 'Podatek został dodany', 'Steuer Erfolgreich', 'Added Tax avec succès', 'Imposta sul valore aggiunto con successo', 'Налог на добавленную Успешно', 'Imposto adicionado com sucesso', 'Vergi Eklendi Başarıyla', '세금 추가 성공적으로', 'Φόρος Προστιθέμενης επιτυχία', '税收增加成功'),
(279, 'enter_tax_name_and_value', 'Enter Tax Name And Value', 'লিখুন ট্যাক্স নাম এবং মূল্য', 'Introducir el nombre de impuesto sobre el valor', 'Voer Tax naam en de waarde', 'Wprowadź nazwę wartością podatkową i', 'Geben Sie Steuer Name und Wert', 'Entrez le nom fiscale et la valeur', 'Inserire nome fiscale e del valore', 'Введите Налоговый имя и значение', 'Digite o nome eo valor do imposto', 'Vergi Adı ve değerini gir', '세금 이름과 값을 입력', 'Εισάγετε Φόρος όνομα και την τιμή', '输入税收名称和值'),
(280, 'edit_tax', 'Edit Tax', 'ট্যাক্স সম্পাদনা', 'Editar Tributaria', 'Tax bewerken', 'Edycja podatki', 'Bearbeiten Steuer', 'Modifier impôt', 'Modifica fiscale', 'Изменить Налоговый', 'Editar Tax', 'Düzenleme Vergi', '편집 세금', 'Επεξεργασία Φόρος', '编辑税'),
(281, 'tax_updated_successfully', 'Tax Updated Successfully', 'ট্যাক্স সফলভাবে আপডেট', 'Impuestos actualizado correctamente', 'Tax Bijgewerkt succesvol', 'Podatek pomyślnie zaktualizowane', 'Steuer erfolgreich aktualisiert', 'Tax Mise à jour avec succès', 'Tax aggiornato con successo', 'Налог успешно обновлен', 'Imposto atualizado com sucesso', 'Vergi Başarıyla Güncellendi', '세금 성공적으로 업데이트', 'Φόρος ενημερώθηκε με επιτυχία', '税务更新成功'),
(282, 'product_code', 'Product Code', 'প্রোডাক্ট কোড', 'Código de producto', 'Productcode', 'Kod produktu', 'Produktcode', 'Code produit', 'Codice prodotto', 'Код продукта', 'Código do produto', 'Ürün Kodu', '제품 코드', 'Κωδικός προϊόντος', '产品代码'),
(283, 'update_product_info', 'Update Product Info', 'হালনাগাদ পণ্য সম্পর্কিত তথ্য', 'Actualización de la información del producto', 'Update-productpagina', 'Aktualizacja informacji o produkcie', 'Update-Produkt-Information', 'Mise à jour la fiche du produit', 'Aggiornamento Info prodotto', 'Обновление Информация о продукте', 'Atualização do produto', 'Güncelleme Ürün Bilgisi', '업데이트 제품 정보', 'Ενημέρωση στοιχείων προϊόντος', '更新产品信息'),
(284, 'image', 'Image', 'ভাবমূর্তি', 'Imagen', 'Beeld', 'Obraz', 'Image', 'image', 'Immagine', 'Образ', 'Imagem', 'görüntü', '영상', 'Εικόνα', '图片'),
(285, 'edit_product_info', 'Edit Product Info', 'সম্পাদনা পণ্য সম্পর্কিত তথ্য', 'Editar la información del producto', 'Bewerken productpagina', 'Edycja Informacje o produkcie', 'Bearbeiten Produktinfo', 'Modifier les informations sur le produit', 'Modifica Info prodotto', 'Изменить Информация о продукте', 'Editar Informações sobre o produto', 'Düzenleme Ürün Bilgisi', '편집 제품 정보', 'Επεξεργασία στοιχείων προϊόντος', '编辑产品信息'),
(286, 'alert_qauntity', 'Alert Qauntity', 'এলার্ট Qauntity', 'alerta Qauntity', 'alert Qauntity', 'Alert Qauntity', 'Alert-Qauntity', 'alerte Qauntity', 'Alert Qauntity', 'Оповещение Qauntity', 'alerta Qauntity', 'Uyarı Qauntity', '경고 Qauntity', 'alert Qauntity', '警报Qauntity'),
(287, 'edit_variant', 'Edit Variant', 'ভেরিয়েন্ট সম্পাদনা', 'Editar Variant', 'bewerken Variant', 'Edycja Variant', 'Bearbeiten Variant', 'Modifier Variant', 'Modifica Variante', 'Изменить вариант', 'Editar Variant', 'Düzenleme Varyant', '편집 변형', 'Επεξεργασία παραλλαγή', '编辑变异'),
(288, 'add_variant', 'Add Variant', 'ভেরিয়েন্ট যোগ', 'Añadir Variant', 'Voeg Variant', 'Dodaj Variant', 'In Variante', 'Ajouter Variant', 'Aggiungere Variante', 'Добавить Вариант', 'Adicionar Variant', 'Varyant ekle', '변형 추가', 'Προσθέστε παραλλαγή', '添加变'),
(289, 'colour', 'Colour', 'রঙিন', 'color', 'Kleur', 'Kolor', 'Farbe', 'Couleur', 'Colore', 'Цвет', 'Cor', 'Renk', '색깔', 'Χρώμα', '颜色'),
(290, 'size', 'Size', 'আয়তন', 'tamaño', 'Grootte', 'Rozmiar', 'Größe', 'Taille', 'Dimensione', 'Размер', 'Tamanho', 'Boyut', '크기', 'Μέγεθος', '尺寸'),
(291, 'red', 'Red', 'লাল', 'rojo', 'Rood', 'Czerwony', 'Rot', 'rouge', 'Rosso', 'красный', 'Vermelho', 'Kırmızı', '빨간', 'Κόκκινος', '红'),
(292, 'large', 'Large', 'বড়', 'Grande', 'Groot', 'Duży', 'groß', 'Grand', 'Grande', 'большой', 'Grande', 'Büyük', '큰', 'Μεγάλο', '大'),
(293, 'variant_added_successfully', 'Variant Added Successfully', 'ভেরিয়েন্ট সংযোজন সফলভাবে', 'Variante añadido correctamente', 'Variant succesvol toegevoegd', 'Wariant został dodany', 'Variante Erfolgreich', 'Variant Ajouté avec succès', 'Variante Aggiunto con successo', 'Вариант Успешно добавлен', 'Variant adicionado com sucesso', 'Varyant Eklendi Başarıyla', '변형 추가 성공적으로', 'Παραλλαγή προστέθηκε με επιτυχία', '变形增加成功'),
(294, 'variant_updated_successfully', 'Variant Updated Successfully', 'ভেরিয়েন্ট সফলভাবে আপডেট', 'Variante Actualizado correctamente', 'Variant Bijgewerkt succesvol', 'Wariant pomyślnie zaktualizowane', 'Variant erfolgreich aktualisiert', 'Variant Mise à jour avec succès', 'Variante aggiornato con successo', 'Вариант успешно обновлен', 'Variant atualizado com sucesso', 'Varyant Başarıyla Güncellendi', '변형 성공적으로 업데이트', 'Παραλλαγή ενημερώθηκε με επιτυχία', '变种已成功更新'),
(295, 'variant_deleted', 'Variant Deleted', 'ভেরিয়েন্ট মোছা হয়েছে', 'Suprimido variante', 'variant Deleted', 'wariant Usunięte', 'Variante Deleted', 'Variant Supprimé', 'variante eliminati', 'Вариант Исключен', 'Variant Deleted', 'varyant silinmiş', '변형 삭제', 'παραλλαγή Διαγράφεται', '删除变异'),
(296, 'product_info_updated', 'Product Info Updated', 'প্রোডাক্ট তথ্য আপডেট করা হয়েছে', 'La información del producto Actualizado', 'Product Info Bijgewerkt', 'Informacje o produkcie Aktualizacja', 'Produkt-Information aktualisiert', 'Info produit Mise à jour', 'Info prodotto aggiornato', 'Информация о продукте Обновлено', 'Informações sobre o produto Atualizado', 'Ürün Bilgisi Güncelleme', '제품 정보 업데이트', 'Πληροφορίες Προϊόντος Ενημέρωση', '产品信息更新'),
(297, 'settings_updated', 'Settings Updated', 'সেটিংস আপডেট', 'Ajustes actualizan', 'instellingen Bijgewerkt', 'Ustawienia zaktualizowane', 'Einstellungen aktualisiert', 'Paramètres mis à jour', 'Impostazioni aggiornate', 'Настройки обновлены', 'Configurações atualizadas', 'Ayarlar güncellendi', '설정 업데이트', 'ρυθμίσεις Ενημέρωση', '设置更新'),
(298, 'process', 'Process', 'প্রক্রিয়া', 'Proceso', 'Werkwijze', 'Proces', 'Verarbeiten', 'Processus', 'Processo', 'Обработать', 'Processo', 'süreç', '방법', 'Διαδικασία', '处理'),
(299, 'order_updated_successfully', 'Order Updated Successfully', 'যাতে সফলভাবে আপডেট', 'Orden actualizado correctamente', 'Bestel Bijgewerkt succesvol', 'Zamówienie zostało zaktualizowane', 'Bestellen Sie erfolgreich aktualisiert', 'Commande Mise à jour avec succès', 'Order aggiornato con successo', 'Заказ успешно обновлен', 'Ordem atualizado com sucesso', 'Sipariş Başarıyla Güncellendi', '주문이 성공적으로 업데이트', 'Προκειμένου ενημερώθηκε με επιτυχία', '为了更新成功'),
(300, 'order_confirmed', 'Order Confirmed', 'আদেশ সমর্থন করা হলো', 'orden confirmada', 'Order bevestigd', 'zamówienie potwierdzone', 'Bestellung bestätigt', 'Commande confirmée', 'ordine confermato', 'Заказ подтвержден', 'Pedido confirmado', 'sipariş onaylandı', '주문 확정', 'τη διαταγή που επιβεβαιώνεται', '订单已确认'),
(301, 'ordered_products', 'Ordered Products', 'আদেশ পণ্য', 'Productos pedidos', 'bestelde producten', 'zamówione produkty', 'Zuvor bestellten Produkte', 'Les produits commandés', 'prodotti ordinati', 'Заказанные товары', 'produtos encomendados', 'sıralı Ürünler', '주문 제품', 'διέταξε Προϊόντα', '订购的产品'),
(302, 'no_shipment_entry_available', 'No Shipment Entry Available', 'কোন চালান এণ্ট্রি উপলব্ধ', 'Ningún embarque de entrada disponibles', 'Geen verzending Entry beschikbaar', 'No Entry wysyłki Dostępny', 'Kein Versand Eintrag vorhanden', 'Aucun envoi Entrée disponible', 'Nessuna spedizione Entry Disponibile', 'Нет Пересылка Вступление Доступные', 'No Entry Expedição Disponível', 'Mevcut Değil Gönderi Girişi', '사용 가능한 선적 항목 없음', 'Δεν αποστολή Έναρξη Διαθέσιμο', '没有出货项可用'),
(303, 'ordered_quantity', 'Ordered Quantity', 'আদেশ পরিমাণ', 'Cantidad ordenada', 'bestelde hoeveelheid', 'zamawianej ilości', 'bestellte Menge', 'Quantité commandée', 'ordinato Quantità', 'заказанное количество', 'ordenou Quantidade', 'sıralı Miktarı', '주문 수량', 'διέταξε Ποσότητα', '订购数量'),
(304, 'shipment_quantity', 'Shipment Quantity', 'চালান পরিমাণ', 'envío Cantidad', 'verzending Aantal', 'Ilość przesyłek', 'Transportmenge', 'Expédition Quantité', 'la consegna Numero', 'Пересылка Количество', 'expedição Quantidade', 'Sevk Miktarı', '출하 수량', 'Η αποστολή Ποσότητα', '出货量'),
(305, 'shipping_cost', 'Shipping Cost', 'প্রদান খরচ', 'Costo de envío', 'Transportkosten', 'Koszty wysyłki', 'Versandkosten', 'Frais de port', 'Spese di spedizione', 'Стоимость доставки', 'Frete', 'Nakliye maliyeti', '배송 비용', 'Κόστος αποστολής', '运输费'),
(306, 'shipped_quantity', 'Shipped Quantity', 'জাহাজে পরিমাণ', 'enviado Cantidad', 'verzonden Hoeveelheid', 'Wysyłane Ilość', 'Versand Menge', 'Expédié Quantité', 'Spedito Quantità', 'Высылаем Количество', 'Enviado Quantidade', 'sevk Miktarı', '출하 수량', 'αποστέλλονται Ποσότητα', '装运数量'),
(307, 'view', 'View', 'দৃশ্য', 'Ver', 'Uitzicht', 'Widok', 'Aussicht', 'Vue', 'vista', 'Посмотреть', 'Visão', 'Görünüm', '전망', 'Θέα', '视图'),
(308, 'no_invoice_available', 'No Invoice Available', 'কোন চালান উপলব্ধ', 'No se factura Disponible', 'Geen factuur beschikbaar', 'Nie Faktura Dostępny', 'Keine Rechnung verfügbar', 'Non Facture disponible', 'Nessuna fattura Disponibile', 'Нет счета Доступные', 'Sem Fatura Disponível', 'Mevcut Değil Fatura', '사용할 수있는 송장 없습니다', 'Δεν Τιμολόγιο Διαθέσιμο', '没有发票可用'),
(309, 'ordered_qty', 'Ordered Qty', 'আদেশ Qty', 'Cantidad ordenada', 'bestelde Aantal', 'Zamówione szt', 'Bestellte Menge', 'Ordonné Quantité', 'Quantità ordinato', 'Заказанный Кол-во', 'ordenou Qtde', 'sıralı Adet', '주문 수량', 'διέταξε Ποσότητα', '订购数量'),
(310, 'invoice_code', 'Invoice Code', 'চালানের কোড', 'Código factura', 'factuur Code', 'Kod faktury', 'Rechnungscode', 'code de la facture', 'Codice fattura', 'Код счета-фактуры', 'Código factura', 'fatura Kodu', '송장 번호', 'τιμολόγιο Κωδικός', '发票代码'),
(311, 'shipment_created', 'Shipment Created', 'চালান তৈরি', 'Envío creado', 'verzending Gemaakt', 'przesyłka Utworzono', 'Versand erstellt', 'Expédition crée', 'Spedizione creata', 'Пересылка Создано', 'expedição Criado', 'Gemi kargosu oluşturuldu', '출하 생성', 'Η αποστολή Δημιουργήθηκε', '出货建立'),
(312, 'invoice_created', 'Invoice Created', 'চালান তৈরি করা', 'Creado factura', 'factuur Gemaakt', 'faktura Utworzono', 'Rechnung erstellt', 'facture Créé', 'fattura Creato', 'Счет-фактура Создано', 'fatura Criado', 'fatura düzenlendi', '송장 작성', 'τιμολόγιο Δημιουργήθηκε', '发票创建'),
(313, 'unpaid', 'Unpaid', 'অবৈতনিক', 'No pagado', 'onbetaald', 'Nie zapłacony', 'unbezahlt', 'Non payé', 'non pagato', 'неоплаченный', 'não remunerado', 'ödenmemiş', '지불하지 않은', 'Απλήρωτος', '未付'),
(314, 'no_payment_entry_available', 'No Payment Entry Available', 'কোন পেমেন্ট এন্ট্রি উপলব্ধ', 'No Pago de entrada disponibles', 'Geen Betaling Entry beschikbaar', 'No Entry Płatność Dostępny', 'Keine Zahlung Eintrag vorhanden', 'Aucun paiement d\'entrée disponible', 'Nessuna voce di pagamento disponibili', 'Нет Оплата Вход Доступен', 'Não Entrada de pagamento disponíveis', 'Mevcut Değil Ödeme giriş', '사용할 수있는 결제 항목 없음', 'ΟΥΔΕΝ Πληρωμής Διαθέσιμο', '没有付款项可用'),
(315, 'select_an_invoice_first', 'Select An Invoice First', 'নির্বাচন একটি চালান প্রথম', 'Seleccionar una factura Primera', 'Selecteer Een factuur First', 'Wybierz fakturę najpierw', 'Wählen Sie eine Rechnung Erste', 'Sélectionnez une facture Première', 'Selezionare una fattura prima', 'Выбор счетов-фактур в первую очередь', 'Selecione Uma primeira fatura', 'Bir Fatura Önce seçin', '송장 먼저 선택', 'Επιλέξτε ένα τιμολόγιο Πρώτα', '选择一个发票第一'),
(316, 'order_created_successfully', 'Order Created Successfully', 'অর্ডার সফলভাবে তৈরি', 'Creado fin con éxito', 'Bestel Gemaakt succesvol', 'Zamówienie utworzony pomyślnie', 'Bestellen Sie erfolgreich erstellt', 'Ordre créé avec succès', 'Ordine creato con successo', 'Заказ успешно создан', 'Ordem criada com sucesso', 'Sipariş başarıyla düzenlendi', '주문 성공적으로 만든', 'Προκειμένου δημιουργήθηκε με επιτυχία', '订单已成功创建'),
(317, 'grand_total', 'Grand Total', 'সর্বমোট', 'Gran total', 'Eindtotaal', 'Łączna suma', 'Gesamtsumme', 'somme finale', 'Somma totale', 'Общая сумма', 'Total geral', 'Genel Toplam', '총계', 'Σύνολο', '累计'),
(318, 'payment_successfull', 'Payment Successfull', 'পেমেন্ট successfull', 'acertado pago', 'betaling Succesvolle', 'Płatność Udane', 'Zahlung Erfolgreichen', 'Paiement Successfull', 'Successfull pagamento', 'Компенсация К успеху', 'Successfull pagamento', 'Ödeme Başarılı', '결제 성공적인', 'Επιτυχεία πληρωμής', '支付全成'),
(319, 'payment_code', 'Payment Code', 'পেমেন্ট কোড', 'Código de pago', 'betaling Code', 'Kod Płatność', 'Payment-Code', 'Code de paiement', 'codice di pagamento', 'Код платежа', 'Código de pagamento', 'Ödeme Kodu', '결제 코드', 'Κωδικός πληρωμής', '支付码'),
(320, 'comment_posted', 'Comment Posted', 'মন্তব্য পোস্ট', 'Publicado comentar', 'Opmerkingen Geplaatst', 'Komentarz Wysłany', 'Kommentiert', 'commentaire Posté', 'commento Pubblicato', 'Комментарий Сообщение', 'comentário publicado', 'Yorum Yayınlanan', '코멘트를 게시', 'Σχόλιο Δημοσιεύτηκε', '发表评论'),
(321, 'shipment_entries', 'Shipment Entries', 'চালান দাখিলা', 'Las entradas de envío', 'verzending Entries', 'Wpisy przesyłki', 'Versand-Einträge', 'Entrées sur les expéditions', 'Le voci di spedizione', 'Пересылка записи', 'entradas de embarque', 'gönderi Girişler', '선적 항목', 'Ενδείξεις αποστολή', '出货项'),
(322, 'courier_service', 'Courier Service', 'কুরিয়ার সার্ভিস', 'Servicio de mensajería', 'Koeriersdienst', 'Usługi kurierskie', 'Kurierdienst', 'Messagerie', 'Corriere', 'Курьерская служба', 'Serviço de entrega', 'Kurye servisi', '택배 서비스', 'Υπηρεσία ταχυμεταφορών', '快递服务'),
(323, 'shipment_date', 'Shipment Date', 'চালান তারিখ', 'Fecha de envío', 'Datum van verzending', 'Data dostawy', 'Versanddatum', 'Date d\'expédition', 'Data di spedizione', 'Дата отгрузки', 'Data de embarque', 'Sevkiyat tarihi', '배송 날짜', 'Ημερομηνία αποστολής', '发货日期'),
(324, 'ship_to', 'Ship To', 'জাহাজ', 'Envie a', 'Verzend naar', 'Dostawa do', 'Ausliefern', 'Envoyez à', 'Spedire a', 'Адрес получателя', 'Enviar para', 'Alıcı', '로 선박', 'Αποστολή προς', '运送到'),
(325, 'print_shipment', 'Print Shipment', 'প্রিন্ট চালান', 'Imprimir envío', 'Print Zending', 'Drukuj przesyłki', 'drucken Versand', 'Imprimer envoi', 'Stampa della spedizione', 'Печать Пересылка', 'Remessa de impressão', 'baskı Sevk', '인쇄 출하', 'Η αποστολή Εκτύπωση', '打印出货'),
(326, 'shipping_to', 'Shipping To', 'গ্রেপ্তার', 'Embarcar hacia', 'Verschepen naar', 'Wysyłka do', 'Versand nach', 'Expédition à', 'Spedire a', 'Доставка', 'Enviando para', 'Nakliye', '배송', 'Αποστολές σε', '运到'),
(327, 'bill_to', 'Bill To', 'বিল করতে', 'Cobrar a', 'Rekening naar', 'Bill', 'Gesetzesentwurf für', 'Facturer', 'Fatturare a', 'Плательщик', 'Projeto de lei para', 'Ya fatura edilecek', '빌로', 'νομοσχέδιο για την', '记账到'),
(328, 'invoice_entries', 'Invoice Entries', 'চালান দাখিলা', 'Las entradas de factura', 'factuur Entries', 'faktura Wpisy', 'Rechnungs Einträge', 'entrées de facture', 'voci della fattura', 'Записи счетов-фактур', 'entradas de faturas', 'fatura Girişler', '송장 항목', 'τιμολόγιο Καταχωρήσεις', '发票条目'),
(329, 'quantity', 'Quantity', 'পরিমাণ', 'Cantidad', 'Hoeveelheid', 'Ilość', 'Menge', 'Quantité', 'Quantità', 'Количество', 'Quantidade', 'miktar', '수량', 'Ποσότητα', '数量'),
(330, 'print_invoice', 'Print Invoice', 'প্রিন্ট চালান', 'Imprimir factura', 'Factuur afdrukken', 'Wydruk faktury', 'Rechnung drucken', 'La facture d\'impression', 'Stampa fattura', 'Печать счета-фактуры', 'Imprimir fatura', 'Fatura yazdır', '인쇄 송장', 'Τιμολόγιο Εκτύπωση', '打印发票'),
(331, 'payment', 'Payment', 'প্রদান', 'Pago', 'Betaling', 'Zapłata', 'Zahlung', 'Paiement', 'Pagamento', 'Оплата', 'Pagamento', 'Ödeme', '지불', 'Πληρωμή', '付款'),
(332, 'print_payment', 'Print Payment', 'প্রিন্ট পেমেন্ট', 'Imprimir Pago', 'Print Betaling', 'Drukuj Płatność', 'drucken Zahlung', 'Imprimer Paiement', 'Stampa di pagamento', 'Печать Оплата', 'Imprimir Pagamento', 'baskı Ödeme', '인쇄 지급', 'Εκτύπωση πληρωμής', '打印付款'),
(333, 'products_ordered', 'Products Ordered', 'পণ্য অর্ডার দেওয়া', 'Los productos pedidos', 'Bestelde producten', 'zamówionych produktów', 'Produkte bestellt', 'Les produits commandés', 'prodotti ordinati', 'Продукты, заказанные', 'produtos encomendados', 'Ürünler Sıralı', '제품 정렬', 'προϊόντα Διέταξε', '订购产品'),
(334, 'completed_shipments', 'Completed Shipments', 'সমাপ্ত চালানে', 'Los envíos completados', 'voltooid Zendingen', 'Wykonane Przesyłki', 'Abgeschlossene Sendungen', 'Les livraisons terminées', 'Spedizioni completati', 'Заполненные Отгрузки', 'Os embarques concluídas', 'Tamamlanan Gönderiler', '완성 된 선적', 'ολοκληρώθηκε αποστολές', '完成出货'),
(335, 'total_amount', 'Total Amount', 'সর্বমোট পরিমাণ', 'Cantidad total', 'Totaalbedrag', 'Łączna kwota', 'Gesamtmenge', 'Montant total', 'Importo totale', 'Итого', 'Valor total', 'Toplam tutar', '총액', 'Συνολικό ποσό', '总金额'),
(336, 'paid_amount', 'Paid Amount', 'দেওয়া পরিমাণ', 'Monto de pago', 'Betaalde hoeveelheid', 'Zapłacona kwota', 'Bezahlte Menge', 'Montant payé', 'Importo pagato', 'Выплаченная сумма', 'Quantidade paga', 'Ödenen miktar', '지불 금액', 'Πληρωμένο ποσό', '已付金额'),
(337, 'products_shipped', 'Products Shipped', 'পণ্য বিক্রী', 'Los productos enviados', 'producten verzonden', 'Produkty Wysyłający', 'Produkte Ausgeliefert', 'Les produits expédiés', 'prodotti spediti', 'отгруженной продукции', 'Os produtos expedidos', 'Ürünler Gönderilen', '제품 배송', 'προϊόντα αποστέλλονται', '出货产品'),
(338, 'add_purchase_order', 'Add Purchase Order', 'ক্রয় আদেশ যোগ', 'Añadir la orden de compra', 'Voeg Bestelling', 'Dodaj Zamówienia', 'In Bestellung', 'Ajouter une commande d\'achat', 'Aggiungere ordine di acquisto', 'Добавить заказ на поставку', 'Adicionar Purchase Order', 'Satınalma Siparişini ekle', '구매 추가 주문', 'Προσθήκη παραγγελίας', '添加采购订单'),
(339, 'purchase_orders', 'Purchase Orders', 'ক্রয় আদেশ', 'Ordenes de compra', 'Inkooporders', 'Zlecenia kupna', 'Kauforder', 'Acheter en ligne', 'Ordini d\'acquisto', 'Заказы', 'Ordens de compra', 'Satın alma siparişleri', '구매 주문', 'ΕΝΤΟΛΕΣ ΑΓΟΡΑΣ', '订单'),
(340, 'supplier_information', 'Supplier Information', 'সরবরাহকারীর তথ্য', 'Información del proveedor', 'Supplier Information', 'Informacje Dostawca', 'Informationen für Lieferanten', 'Information sur le fournisseur', 'Informazioni sui fornitori', 'Поставщик информации', 'Informação do fornecedor', 'Tedarikçi bilgileri', '공급 업체 정보', 'Πληροφορίες προμηθευτή', '供应商信息'),
(341, 'ordering_user', 'Ordering User', 'ক্রমানুসার ব্যবহারকারী', 'usuario pedido', 'Bestellen Gebruiker', 'Kolejność użytkownika', 'Bestellbenutzer', 'Commande utilisateur', 'Ordinamento utente', 'Заказ Пользователь', 'ordenação do usuário', 'sipariş Kullanıcı', '주문 사용자', 'παραγγελία χρήστη', '订购用户'),
(342, 'select_supplier_first', 'Select Supplier First', 'নির্বাচন সরবরাহকারী প্রথম', 'Elija un proveedor de primer', 'Selecteer leverancier eerst', 'Wybierz Dostawca Pierwszy', 'Wählen Sie Lieferant Erste', 'Sélectionnez Fournisseur d\'abord', 'Selezionare Fornitore Primo', 'Выбор поставщика первый', 'Escolha um Fornecedor Primeira', 'Seç Tedarikçi İlk', '선택 공급 업체 우선', 'Επιλέξτε προμηθευτή First', '选择供应商第一'),
(343, 'select_supplier_address', 'Select Supplier Address', 'সরবরাহকারী ঠিকানা নির্বাচন', 'Seleccionar dirección del proveedor', 'Select Leverancier Adres', 'Wybierz Dostawca Adres', 'Wählen Sie Lieferant Adresse', 'Sélectionnez Fournisseur Adresse', 'Selezione indirizzo del fornitore', 'Выбор поставщика Адрес', 'Escolha um Fornecedor Endereço', 'Seç Tedarikçi Adresi', '선택 공급 업체 주소', 'Επιλέξτε Διεύθυνση Προμηθευτή', '选择供应商地址'),
(344, 'raised', 'Raised', 'উত্থাপিত', 'Elevado', 'verheven', 'Podniesiony', 'Angehoben', 'relevé', 'Sollevato', 'поднятый', 'levantado', 'yükseltilmiş', '높인', 'Αυξημένος', '上调'),
(345, 'received', 'Received', 'গৃহীত', 'Recibido', 'ontvangen', 'Odebrane', 'Empfangen', 'Reçu', 'ricevuto', 'Получено', 'Recebido', 'Alınan', '수신', 'Ελήφθη', '收到'),
(346, 'date_raised', 'Date Raised', 'তারিখ জোগাড়', 'fecha Raised', 'date Verhoogde', 'Data Raised', 'Datum Raised', 'Date de Raised', 'data Raised', 'Дата Воспитанный', 'data Raised', 'tarihi Yükseltilmiş', '날짜 제기', 'ημερομηνία Υπερυψωμένο', '募集日期'),
(347, 'date_received', 'Date Received', 'তারিখ প্রাপ্তঃ', 'fecha de recepción', 'Datum Ontvangen', 'Data otrzymania', 'Empfangsdatum', 'Date de réception', 'Data Ricevuto', 'Дата получения', 'data recebida', 'tarihi Alınan', '받은 날짜', 'Ημερομηνία παραλαβής', '接收日期'),
(348, 'raised_orders', 'Raised Orders', 'উত্থাপিত আদেশ', 'Pedidos planteadas', 'Verhoogde Orders', 'podnoszone Zamówienia', 'Raised Bestellungen', 'Ordres surélevés', 'ordini sopraelevati', 'Фальш Заказы', 'Encomendas levantadas', 'yükseltilmiş Siparişler', '제기 주문', 'Αυξημένος Παραγγελίες', '募集订单'),
(349, 'received_orders', 'Received Orders', 'প্রাপ্তঃ আদেশ', 'Las órdenes recibidas', 'ontvangen orders', 'otrzymał rozkaz', 'empfangene Aufträge', 'Les commandes reçues', 'Gli ordini ricevuti', 'Поступившие заказы', 'ordens recebidas', 'alınan Siparişler', '수주', 'Ελήφθη Παραγγελίες', '接到订单'),
(350, 'supplier_address', 'Supplier Address', 'সরবরাহকারী ঠিকানা', 'Dirección del proveedor', 'Leverancier Adres', 'Dostawca Adres', 'Lieferant Adresse', 'Fournisseur Adresse', 'Fornitore Indirizzo', 'Поставщик Адрес', 'fornecedor Endereço', 'Tedarikçi Adresi', '공급 업체 주소', 'Προμηθευτής Διεύθυνση', '供应商地址'),
(351, 'supplier_info', 'Supplier Info', 'সরবরাহকারী তথ্য', 'Información del proveedor', 'Leverancier Info', 'Dostawca informacji', 'Lieferant Info', 'info-fournisseur', 'Fornitore Info', 'Информация поставщика', 'Informações fornecedor', 'Tedarikçi Bilgi', '공급 업체 정보', 'Προμηθευτής Πληροφορίες', '供应商信息'),
(352, 'order_info', 'Order Info', 'অর্ডার তথ্য', 'Solicitar Información', 'bestellen Info', 'Zamówienie Info', 'Bestell-Info', 'Informations de commande', 'Info Order', 'Информация о заказе', 'ordem Informações', 'Sipariş Bilgileri', '주문 정보', 'Παραγγελίες', '订单信息'),
(353, 'payment_status', 'Payment Status', 'লেনদেনের অবস্থা', 'Estado de pago', 'Betalingsstatus', 'Status płatności', 'Zahlungsstatus', 'Statut de paiement', 'Stato del pagamento', 'Статус платежа', 'Status do pagamento', 'Ödeme Durumu', '지불 상태', 'Κατάσταση πληρωμής', '支付状态'),
(354, 'raise_order', 'Raise Order', 'অর্ডার Raise', 'elevar Orden', 'Raise Bestel', 'Podnieść Order', 'Heben Sie bestellen', 'soulever Ordre', 'sollevare Order', 'Приподнять Order', 'Levante Order', 'Sipariş Raise', '주문을 올립니다', 'Σηκώστε Παραγγελία', '提高订单'),
(355, 'mark_as_received', 'Mark As Received', 'মার্ক পেয়েছিলেন', 'Marcar como Recibido', 'Mark zoals ontvangen', 'Oznacz jako odebrane', 'Mark As Received', 'Mark Comme Reçu', 'Mark come ricevuto', 'Отметить как получено', 'Mark como recebido', 'Mark Alınan gibi', '마크 수상으로', 'Mark Όπως Ελήφθη', '标记为接收'),
(356, 'order_raised_successfully', 'Order Raised Successfully', 'যাতে সফলভাবে উত্থাপিত', 'Orden que se planteen con éxito', 'Bestel succes opgeworpen', 'Zamówienie Raised Pomyślnie', 'Angehoben, um erfolgreich', 'Ordre Raised avec succès', 'Ordine presentata con successo', 'Заказать Воспитанный Успешно', 'Ordem levantadas com sucesso', 'Sipariş Başarıyla Yükseltilmiş', '주문 성공적 제기', 'Προκειμένου Μεγαλωμένη με επιτυχία', '为了成功募集'),
(357, 'order_received_successfully', 'Order Received Successfully', 'অর্ডার সফলভাবে গৃহীত', 'Orden recibido con éxito', 'Bestel succesvol ontvangen', 'Zamówienie odebrane pomyślnie', 'Bestellen Sie erfolgreich empfangen', 'Commande reçue avec succès', 'Ordine ricevuto con successo', 'Заказать Успешно получено', 'Ordem Recebido com Sucesso', 'Sipariş Başarıyla Alınan', '주문이 성공적으로 수신', 'Παραγγελία ληφθεί επιτυχώς', '为了成功接收'),
(358, 'logo', 'Logo', 'লোগো', 'Logo', 'Logo', 'Logo', 'Logo', 'Logo', 'Logo', 'логотип', 'Logotipo', 'Logo', '심벌 마크', 'Λογότυπο', '商标'),
(359, 'system_currency', 'System Currency', 'সিস্টেম মুদ্রা', 'moneda del sistema', 'System Currency', 'System waluty', 'Systemwährung', 'système devise', 'sistema di valuta', 'валютная система', 'Moeda do sistema', 'sistem Para', '시스템 통화', 'Νόμισμα συστήματος', '系统货币'),
(360, 'mark_paid', 'Mark Paid', 'মার্ক Paid', 'A cargo de mark', 'Mark Betaald', 'Mark Płatny', 'Mark Paid', 'Mark payé', 'Mark Paid', 'Марк Paid', 'Mark pago', 'Mark Ücretli', '마크 유료', 'Mark Paid', '马克付费'),
(361, 'mark_as_paid', 'Mark As Paid', 'মার্ক এবং পেইড', 'Marcar como pago', 'Mark als betaald', 'Oznacz jako zapłacony', 'Mark als bezahlt', 'Mark Comme Paid', 'Mark come pagato', 'Отметить как уплаченный', 'Mark Como pago', 'Mark As Ödenen', '마크로서 유료', 'Mark Όπως Paid', '标记为付费'),
(362, 'mark_as_delivered', 'Mark As Delivered', 'মার্ক হিসাবে বিতরণ', 'Marcar como Delivered', 'Mark bij levering', 'Oznacz jako Dostarczany', 'Mark As Lieferung', 'Mark Tel que prononcé', 'Mark come consegnato', 'Mark As Поставленный', 'Mark como entregue', 'Olarak İşaretle Teslim', '마크 바와 같이 배달', 'Mark Όπως Δημοσιεύθηκε', '标记为交付');
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `bengali`, `spanish`, `dutch`, `polish`, `german`, `french`, `italian`, `russian`, `portugese`, `turkish`, `korean`, `greek`, `chinese`) VALUES
(363, 'new_shipment_quantity', 'New Shipment Quantity', 'নতুন চালান পরিমাণ', 'Nuevo envío Cantidad', 'Nieuwe Zending Hoeveelheid', 'Nowy Ilość przesyłek', 'Neue Transportmenge', 'Nouveau envoi Quantité', 'Nuova spedizione Quantità', 'Новая Пересылка Количество', 'Nova expedição Quantidade', 'Yeni Gönderi Miktarı', '새로운 선적 수량', 'Νέα αποστολή Ποσότητα', '新货数量'),
(364, 'create_new_shipment', 'Create New Shipment', 'নতুন চালান তৈরি করুন', 'Crear nuevo envío', 'Maak een nieuwe zending', 'Utwórz nową przesyłkę', 'Erstellen Sie neue Sendung', 'Créer un nouveau envoi', 'Crea nuova spedizione', 'Создать новую пересылку', 'Criar nova remessa', 'Yeni Gönderi Oluştur', '새로운 선적 만들기', 'Δημιουργία νέου αποστολή', '创建新货'),
(365, 'add_new_invoice', 'Add New Invoice', 'নতুন চালান যুক্ত', 'Añadir Nueva factura', 'Voeg Nieuwe factuur', 'Dodaj nową fakturę', 'Hinzufügen Neue Rechnung', 'Ajouter une nouvelle facture', 'Aggiungere Nuova fattura', 'Добавить счет-фактуру', 'Adicionar Nova Factura', 'Yeni Fatura Ekle', '새로운 송장 추가', 'Προσθήκη νέου τιμολογίου', '添加新发票'),
(366, 'order_marked_as_delivered', 'Order Marked As Delivered', 'অর্ডার চিহ্নিত বিতরণ হিসাবে', 'Orden Marcado como Entregado', 'Bestel gemarkeerd als Geleverd', 'Zamówienie oznaczone jako Dostarczany', 'Bestellen Sie markiert als Lieferung', 'Commander Marqué comme Livré', 'Ordinare Contrassegnato come Consegnato', 'Заказ Помечено в качестве Поставленный', 'Ordem Marcado como Entregue', 'Sipariş Teslim olarak işaretlenen', '주문 배달으로 표시됨', 'Προκειμένου επισημανθεί ως Δημοσιεύθηκε', '为了标记为交付'),
(367, 'invoiced_qty', 'Invoiced Qty', 'চালানে Qty', 'Cantidad facturada', 'gefactureerde Aantal', 'Ilosc fakturowana', 'Abgerechnet Menge', 'facturé Quantité', 'Fatturato Quantità', 'Кол-во выставлен счет', 'faturado Qtde', 'Faturalandırılan Adet', '인보이스 수량', 'τιμολογούνται Ποσότητα', '开票数量'),
(368, 'new_invoice_qty', 'New Invoice Qty', 'নতুন চালান Qty', 'Nueva factura Cantidad', 'Nieuwe factuur Aantal', 'Nowa faktura szt', 'Neue Rechnung Menge', 'Nouvelle facture Quantité', 'Nuovo Quantità fattura', 'Новый счет-фактура Кол-во', 'New Qtde Invoice', 'Yeni Fatura Adet', '새로운 송장 수량', 'Νέο Τιμολόγιο Ποσότητα', '新发票数量'),
(369, 'order_marked_as_paid', 'Order Marked As Paid', 'অর্ডার চিহ্নিত Paid হিসেবে', 'Orden Marcado como A cargo', 'Bestel gemarkeerd als betaald', 'Zamówienie oznaczone jako płatne', 'Bestellen Sie markiert als Paid', 'Ordre Marqué comme charge', 'Ordinare Contrassegnato come pagato', 'Заказать Помечено в качестве Paid', 'Ordem Marcado como pago', 'Sipariş Ücretli olarak işaretlenen', '주문 유료으로 표시됨', 'Προκειμένου επισημανθεί ως επί πληρωμή', '为了标记为已付款'),
(370, 'archive', 'Archive', 'সংরক্ষাণাগার', 'Archivo', 'Archief', 'Archiwum', 'archivieren', 'Archiver', 'archivio', 'Архив', 'Arquivo', 'Arşiv', '아카이브', 'Αρχείο', '档案'),
(371, 'order_deleted', 'Order Deleted', 'অর্ডার মুছে ফেলা', 'orden Suprimido', 'Bestel Deleted', 'Zamówienie Usunięte', 'Auftrag gelöscht', 'Ordre Supprimé', 'ordine Cancellato', 'Заказать Исключен', 'ordem Deleted', 'Sipariş silinmiş', '주문 삭제', 'προκειμένου Διαγράφεται', '顺序删除'),
(372, 'order_archived', 'Order Archived', 'অর্ডার আর্কাইভ', 'pedido archivado', 'Bestel Gearchiveerd', 'Zamówienie Archived', 'Bestellen archivierten', 'Ordre Archivé', 'ordine archiviato', 'Порядок архивации', 'ordem arquivados', 'Sipariş Arşivlenmiş', '주문 보관', 'προκειμένου Αρχείο', '为了存档'),
(373, 'order_archived_successfully', 'Order Archived Successfully', 'অর্ডার আর্কাইভ সফলভাবে', 'Pedido archivado con éxito', 'Bestel Gearchiveerd succesvol', 'Zamówienie zarchiwizowanych Pomyślnie', 'Bestellen Sie erfolgreich archiviert', 'Ordre Archivé avec succès', 'Ordine archiviato con successo', 'Заказ успешно архивации', 'Ordem arquivados com sucesso', 'Sipariş Arşivlenmiş Başarıyla', '주문 보관 성공', 'Προκειμένου Αρχείο Επιτυχής', '为了成功存档'),
(374, 'edit_profile_information', 'Edit Profile Information', 'প্রোফাইল তথ্য সম্পাদনা', 'Editar información del perfil', 'Bewerk Profiel Informatie', 'Edycja informacji o profilu', 'Profilinformationen bearbeiten', 'Modifier les informations sur le profil', 'Modifica informazioni sul profilo', 'Изменить информацию профиля', 'Editar informações de perfil', 'Profil Bilgilerini Düzenle', '프로필 정보를 편집', 'Επεξεργασία πληροφοριών προφίλ', '编辑个人资料信息'),
(375, 'change_password', 'Change Password', 'পাসওয়ার্ড পরিবর্তন করুন', 'Cambia la contraseña', 'Verander wachtwoord', 'Zmień hasło', 'Passwort ändern', 'Changer le mot de passe', 'Cambia la password', 'Изменить пароль', 'Mudar senha', 'Şifre değiştir', '암호 변경', 'Άλλαξε κωδικό', '更改密码'),
(376, 'current_password', 'Current Password', 'বর্তমান পাসওয়ার্ড', 'contraseña actual', 'huidig ​​wachtwoord', 'Aktualne hasło', 'Aktuelles Passwort', 'Mot de passe actuel', 'Password attuale', 'текущий пароль', 'senha atual', 'Şimdiki Şifre', '현재 비밀번호', 'τρέχων κωδικός πρόσβασης', '当前密码'),
(377, 'new_password', 'New Password', 'নতুন পাসওয়ার্ড', 'nueva contraseña', 'nieuw paswoord', 'nowe hasło', 'Neues Kennwort', 'nouveau mot de passe', 'nuova password', 'новый пароль', 'Nova senha', 'Yeni Şifre', '새 비밀번호', 'Νέος Κωδικός', '新密码'),
(378, 'confirm_password', 'Confirm Password', 'পাসওয়ার্ড নিশ্চিত করুন', 'Confirmar contraseña', 'bevestig wachtwoord', 'Potwierdź hasło', 'Bestätige das Passwort', 'Confirmez le mot de passe', 'conferma password', 'Подтвердите Пароль', 'Confirme a Senha', 'Şifreyi Onayla', '비밀번호 확인', 'Επιβεβαίωση κωδικού', '确认密码'),
(379, 'update_password', 'Update Password', 'আপডেট পাসওয়ার্ড', 'Actualiza contraseña', 'Wachtwoord bijwerken', 'Zaktualizuj hasło', 'Passwort aktualisieren', 'Mise à jour Mot de passe', 'Aggiornamento password', 'Обновление пароля', 'atualização de senha', 'güncelleme Şifre', '암호 업데이트', 'Ενημέρωση κωδικού', '更新密码'),
(380, 'product_moved_to_archive', 'Product Moved To Archive', 'প্রোডাক্ট আর্কাইভে পাঠানো', 'Producto trasladó a Archivo', 'Product Bewogen aan Archief', 'Produkt przeniesione do Archiwum', 'Artikel Moved To Archive', 'Produit déplacé vers Archive', 'Prodotto trasferisce a Archivio', 'Продукт Переведен К архиву', 'Produto transportei-me ao Arquivo', 'Ürün Arşivi Taşındık', '제품 아카이브로 이동', 'Προϊόν Μετακινήθηκε Για Αρχείο', '产品转移到存档'),
(381, 'archived_products', 'Archived Products', 'আর্কাইভ করা পণ্য', 'Productos archivados', 'gearchiveerde producten', 'Produkty archiwalne', 'Archivierte Produkte', 'Produits archivés', 'archivio Prodotti', 'архивные товары', 'produtos arquivados', 'Arşivdeki Ürünler', '아카이브 된 제품', 'Αρχείο Προϊόντων', '归档产品'),
(382, 'remove_from_archive', 'Remove From Archive', 'আর্কাইভ থেকে সরান', 'Eliminar de Archivo', 'Verwijderen uit archief', 'Usuń z archiwum', 'Entfernen Sie aus Archiv', 'Supprimer de Archive', 'Rimuovere dall\'archivio', 'Удалить из архива', 'Remover do Arquivo', 'Arşiv Kaldır', '아카이브에서 제거', 'Αφαιρέστε από το αρχείο', '从档案中删除'),
(383, 'product_removed_from_archive', 'Product Removed From Archive', 'প্রোডাক্ট আর্কাইভ থেকে সরানো হয়েছে', 'Producto Fuera De Archivo', 'Product verwijderd uit Archief', 'Produkt Usunięto z archiwum', 'Produkt entfernt aus Archiv', 'Produit retiré de Archive', 'Prodotto Rimosso dall\'archivio', 'Выводимую из архива', 'Produto removido do Arquivo', 'Ürün Arşivi kaldırıldı', '제품 아카이브에서 제거', 'Προϊόν Αφαιρέθηκε από το αρχείο', '产品移除存档'),
(384, 'profile_info_updated', 'Profile Info Updated', 'প্রোফাইল তথ্য আপডেট করা হয়েছে', 'Información del Perfil Actualizado', 'Profiel Info Bijgewerkt', 'Informacje o profilu Zaktualizowany', 'Profil-Information aktualisiert', 'Info Profil Mise à jour', 'Informazioni sul profilo Aggiornato', 'Профиль информация Обновлено', 'Informações do Perfil Atualizado', 'Profil Bilgileri Güncelleme', '프로필 정보 업데이트', 'Πληροφορίες Προφίλ Ενημέρωση', '资料信息更新'),
(385, 'password_update_failed', 'Password Update Failed', 'পাসওয়ার্ড আপডেট ব্যর্থ', 'Contraseña Error de actualización', 'Password-update mislukt', 'Hasło Aktualizacja nie powiodła się', 'Passwort-Update fehlgeschlagen', 'Mise à jour du mot de passe a échoué', 'Password Aggiornamento non riuscito', 'Пароль Не удалось выполнить обновление', 'Senha Falha na atualização', 'Şifre Güncelleme Başarısız', '암호 업데이트 실패', 'Κωδικός πρόσβασης Ενημέρωση Απέτυχε', '密码更新失败'),
(386, 'password_updated', 'Password Updated', 'পাসওয়ার্ড আপডেট করা হয়েছে', 'Contraseña actualiza', 'Password Bijgewerkt', 'Hasło Zaktualizowany', 'Passwort aktualisiert', 'Mot de passe mis à jour', 'password aggiornata', 'Пароль Обновлено', 'Senha Atualizado', 'Şifre Güncelleme', '암호 업데이트', 'Κωδικός πρόσβασης Ενημέρωση', '密码更新'),
(387, 'manage_language', 'Manage Language', 'ভাষা পরিচালনা', 'Manejo de Lenguaje', 'Beheer Taal', 'Zarządzaj język', 'verwalten von Sprach', 'Gérer Langue', 'gestire Lingua', 'Управление Язык', 'Gerenciar Idioma', 'Dil Yönet', '언어 관리', 'διαχειριστείτε Γλώσσα', '管理语言'),
(388, 'language_list', 'Language List', 'নতুন ভাষাটি তালিকায় আগে', 'Lista de idiomas', 'taal List', 'Lista języków', 'Sprachenliste', 'Liste des langues', 'Elenco lingue', 'Список языков', 'Lista idioma', 'Dil listesi', '언어 목록', 'Λίστα γλώσσα', '语言列表'),
(389, 'add_phrase', 'Add Phrase', 'শব্দবন্ধ যোগ', 'Añadir Frase', 'uitdrukking toe te voegen', 'Dodaj Phrase', 'In Phrase', 'Ajouter Phrase', 'Aggiungere Frase', 'Добавить фразу', 'Adicionar Frase', 'Cümle ekle', '문구 추가', 'Προσθέστε Φράση', '添加词组'),
(390, 'add_language', 'Add Language', 'ভাষা যোগ', 'Agregar idioma', 'Voeg Taal', 'Dodaj język', 'Sprache hinzufügen', 'Ajouter une langue', 'Aggiungere Lingua', 'Добавить язык', 'Adicionar idioma', 'Dil ekle', '언어 추가', 'Προσθέστε Γλώσσα', '添加语言'),
(391, 'option', 'Option', 'পছন্দ', 'Opción', 'Keuze', 'Opcja', 'Option', 'Option', 'Opzione', 'вариант', 'Opção', 'seçenek', '선택권', 'Επιλογή', '选项'),
(392, 'edit_phrase', 'Edit Phrase', 'শব্দবন্ধ সম্পাদনা', 'Editar Frase', 'Phrase bewerken', 'Edycja Zwroty', 'Bearbeiten Phrase', 'Modifier Phrase', 'Modifica Frase', 'Редактировать Фраза', 'Editar Frase', 'Düzenleme Öbek', '편집 구문', 'Επεξεργασία φράσης', '编辑短语'),
(393, 'delete_language', 'Delete Language', 'ভাষা মুছুন', 'eliminar idioma', 'Taal verwijderen', 'Usuń język', 'Sprache löschen', 'Supprimer Langue', 'cancellare Lingua', 'Удалить язык', 'excluir Idioma', 'Dil Sil', '언어 삭제', 'Διαγραφή Γλώσσας', '删除语言'),
(394, 'phrase', 'Phrase', 'শব্দবন্ধ', 'Frase', 'Uitdrukking', 'Wyrażenie', 'Phrase', 'Phrase', 'Frase', 'Фраза', 'Frase', 'İfade', '구', 'Φράση', '短语'),
(395, 'value_required', 'Value Required', 'মূল্য প্রয়োজনীয়', 'valor Obligatorio', 'waarde Verplicht', 'wartości wymaganej', 'Wert Erforderlich', 'Valeur Obligatoire', 'valore richiesto', 'Значение Обязательный', 'valor Obrigatório', 'Değer Gerekli', '값 필수', 'αξία Υποχρεωτικά', '值必需'),
(396, 'update_phrase', 'Update Phrase', 'আপডেট শব্দবন্ধ', 'actualización Frase', 'Phrase-update', 'aktualizacja Zwroty', 'Update-Phrase', 'Mise à jour Phrase', 'Aggiornamento Frase', 'Обновление Фраза', 'Frase atualização', 'güncelleme Öbek', '업데이트 구문', 'Ενημέρωση Φράση', '更新短语'),
(397, 'edit_order', 'Edit Order', 'অর্ডার সম্পাদনা', 'Editar Orden', 'bewerken Bestel', 'Edycja Zamówienie', 'Auftrag bearbeiten', 'Modifier la commande', 'Modifica Order', 'Редактировать заказ', 'Editar pedidos', 'Düzenleme Sipariş', '편집 주문하기', 'Επεξεργασία Τάξης', '编辑订单'),
(398, 'order_code_must_be_unique', 'Order Code Must Be Unique', 'আদেশ কোড অনন্য হওয়া আবশ্যক', 'Código de pedido debe ser único', 'Bestel Code Must Be Unique', 'Kod zamówienia musi być unikalna', 'Bestellcode muss eindeutig sein', 'Code de commande doit être unique', 'Codice d\'ordine deve essere univoco', 'Код заказа должен быть уникальным', 'Ordem código deve ser exclusivo', 'Sipariş Kodu Benzersiz Olmalı', '주문 코드는 고유해야합니다', 'Κωδικός παραγγελίας πρέπει να είναι μοναδικό', '订货代码必须唯一'),
(399, 'canceled_orders', 'Canceled Orders', 'বাতিল করা হয়েছে আদেশ', 'Las órdenes canceladas', 'geannuleerde bestellingen', 'anulowanie zamówienia', 'Die Aufträge', 'Les commandes annulées', 'ordini annullati', 'отмененные заказы', 'Encomendas canceladas', 'iptal edilen siparişler', '취소 주문', 'ακυρώσεις παραγγελιών', '取消订单'),
(400, 'cancel_order', 'Cancel Order', 'আদেশ বাতিল', 'Cancelar orden', 'Annuleer bestelling', 'Anuluj zamówienie', 'Bestellung stornieren', 'Annuler la commande', 'Annulla ordine', 'Отменить заказ', 'Cancelar pedido', 'Siparişi iptal et', '주문을 취소하다', 'Ακύρωση παραγγελίας', '取消订单'),
(401, 'order_canceled', 'Order Canceled', 'অর্ডার বাতিল হয়েছে', 'Se canceló el pedido', 'bestelling geannuleerd', 'Zamówienie zostało anulowane', 'Bestellung storniert', 'Commande annulée', 'ordine annullato', 'Отменено Заказать', 'Pedido cancelado', 'Sipariş İptal Edildi', '주문 취소', 'Η παραγγελία ακυρώθηκε', '订单已取消'),
(402, 'this_order_has_been_canceled', 'This Order Has Been Canceled', 'এই আদেশটি বাতিল করা হয়েছে', 'Este pedido ha sido cancelado', 'Deze bestelling is geannuleerd', 'To zamówienie zostało anulowane', 'Diese Bestellung wurde storniert', 'Cette commande a été annulée', 'Questo ordine è stato annullato', 'Этот заказ был отменен', 'Este pedido foi cancelado', 'Bu sipariş iptal edildi', '이 주문이 취소되었습니다', 'Αυτή η παραγγελία έχει ακυρωθεί', '此订单已被取消'),
(403, 'purchase_order_print', 'Purchase Order Print', 'অর্ডার প্রিন্ট কিনুন', 'Orden de compra Imprimir', 'Bestelling Print', 'Zamówieniem Drukuj', 'Purchase Order Drucken', 'Bon de commande Imprimer', 'Ordine di acquisto di stampa', 'Заказ на печать', 'Ordem de Compra Imprimir', 'Sipariş Yazdır Satınalma', '주문 인쇄를 구입', 'Εντολή Αγοράς Εκτύπωση', '采购订单打印'),
(404, 'canceled', 'Canceled', 'বাতিল করা হয়েছে', 'Cancelado', 'Geannuleerd', 'Odwołany', 'Abgebrochen', 'Annulé', 'Annullato', 'отменен', 'Cancelado', 'iptal edildi', '취소 된', 'Ακυρώθηκε', '取消'),
(405, 'return_to_login_page', 'Return To Login Page', 'ফিরুন লগইন পৃষ্ঠায়', 'Volver a inicio página', 'Terug naar Inlogpagina', 'Powrót do Praca stronę', 'Zurück zur Login-Seite', 'Retour à la page de connexion', 'Torna alla pagina di login', 'Вернуться на страницу входа', 'Retornar à página de login', 'Sayfa Giriş Return To', '로그인 페이지로 돌아 가기', 'Επιστροφή για να συνδεθείτε Σελίδα', '返回到登录页面'),
(406, 'reset_password', 'Reset Password', 'পাসওয়ার্ড রিসেট করুন', 'Restablecer la contraseña', 'Reset Password', 'Zresetuj hasło', 'Passwort zurücksetzen', 'réinitialiser le mot de passe', 'Resetta la password', 'Сброс пароля', 'Trocar a senha', 'Şifreyi yenile', '암호를 재설정', 'Επαναφέρετε τον κωδικό πρόσβασης', '重设密码'),
(407, 'employee_dashboard', 'Employee Dashboard', 'কর্মচারী ড্যাশবোর্ড', 'Tablero de instrumentos del empleado', 'werknemer Dashboard', 'Pracownik Dashboard', 'Mitarbeiter-Dashboard', 'Tableau de bord de l\'employé', 'Dashboard dei dipendenti', 'Сотрудник Dashboard', 'Painel empregado', 'Çalışan Kontrol Paneli', '직원 대시 보드', 'ταμπλό των εργαζομένων', '员工仪表板'),
(408, 'address_updated_successfully', 'Address Updated Successfully', 'ঠিকানা সফলভাবে আপডেট', 'Dirección actualizado correctamente', 'Adres Bijgewerkt succesvol', 'Adres pomyślnie zaktualizowane', 'Adresse erfolgreich aktualisiert', 'Adresse Mise à jour avec succès', 'Indirizzo aggiornato con successo', 'Адрес успешно обновлен', 'Endereço atualizado com sucesso', 'Adres Başarıyla Güncellendi', '주소가 성공적으로 업데이트', 'Διεύθυνση ενημερώθηκε με επιτυχία', '地址更新成功'),
(409, 'customer_dashboard', 'Customer Dashboard', 'গ্রাহক ড্যাশবোর্ড', 'Tablero de instrumentos del cliente', 'Customer Dashboard', 'Panel klienta', 'Customer Dashboard', 'Tableau de bord à la clientèle', 'Dashboard clienti', 'Панель клиента', 'Painel cliente', 'Müşteri Paneli', '고객 대시 보드', 'ταμπλό πελατών', '客户仪表盘'),
(410, 'orders', 'Orders', 'আদেশ', 'Pedidos', 'orders', 'Święcenia', 'Bestellungen', 'Ordres', 'Ordini', 'заказы', 'encomendas', 'Emirler', '명령', 'παραγγελίες', '命令'),
(411, 'you_have', 'You Have', 'তোমার আছে', 'Tienes', 'Jij hebt', 'Ty masz', 'Du hast', 'Tu as', 'Hai', 'У тебя есть', 'Você tem', 'Var', '당신은', 'Έχεις', '你有'),
(412, 'pending_sales_orders', 'Pending Sales Orders', 'সেলস অর্ডার অপেক্ষারত', 'A la espera de órdenes de venta', 'In afwachting van klantorders', 'W oczekiwaniu zleceń sprzedaży', 'Bis Kundenaufträge', 'Dans l\'attente des commandes clients', 'In attesa di ordini di vendita', 'В ожидании заказов на продажу', 'Enquanto se aguarda ordens de venda', 'Satış Siparişleri Bekleyen', '판매 주문을 보류', 'Εν αναμονή Παραγγελίες', '待完成销售订单'),
(413, 'contact', 'Contact', 'যোগাযোগ', 'Contacto', 'Contact', 'Kontakt', 'Kontakt', 'Contact', 'contatto', 'контакт', 'Contato', 'Temas', '접촉', 'Επαφή', '联系'),
(414, 'account_created', 'Account Created', 'অ্যাকাউন্ট তৈরি', 'Cuenta creada', 'Account aangemaakt', 'Konto utworzone', 'Account erstellt', 'Compte créé', 'Account creato', 'Аккаунт создан', 'Conta criada', 'Hesap oluşturuldu', '계정 생성', 'Ο λογαριασμός Δημιουργήθηκε', '帐户创建'),
(415, 'info', 'Info', 'তথ্য', 'información', 'info', 'Informacje', 'Info', 'Info', 'Informazioni', 'Информация', 'informações', 'Bilgi', '정보', 'πληροφορίες', '信息'),
(416, 'edit_shipping_methods', 'Edit Shipping Methods', 'শিপিং পদ্ধতি সম্পাদনা', 'Editar métodos de envío', 'Bewerken Verzendmethoden', 'Edycja Metody wysyłki', 'Bearbeiten Liefer-Methoden', 'Modifier les méthodes d\'expédition', 'Modifica metodi di spedizione', 'Изменить Методы доставки', 'Editar Formas de Envio', 'Düzenleme Kargo Yöntemleri', '편집 배송 방법', 'Επεξεργασία Τρόποι Αποστολής', '编辑送货方式'),
(417, 'edit_courier', 'Edit Courier', 'কুরিয়ার সম্পাদনা', 'Editar Courier', 'bewerken Courier', 'Edycja Courier', 'Bearbeiten Courier', 'Modifier Courier', 'Modifica Courier', 'Редактирование Courier', 'Editar Courier', 'Düzenleme Kurye', '편집 택배', 'Επεξεργασία Courier', '编辑速递'),
(418, 'shipment_notes', 'Shipment Notes', 'চালান নোট', 'Notas de envío', 'verzending Notes', 'Uwagi przesyłki', 'Versand Hinweise', 'Remarques sur les expéditions', 'Note di spedizione', 'Пересылка Примечания', 'Notas de embarque', 'gönderi Notları', '출하시주의 사항', 'Η αποστολή Σημειώσεις', '出货票据'),
(419, 'payment_notes', 'Payment Notes', 'পেমেন্ট নোট', 'Notas de pago', 'betaling Notes', 'Uwagi płatności', 'Zahlungshinweise', 'Remarques de paiement', 'Note di pagamento', 'Примечания оплаты', 'Notas de pagamento', 'Ödeme Notları', '결제주의 사항', 'Σημειώσεις πληρωμής', '支付注意事项'),
(420, 'add_invoice', 'Add Invoice', 'চালান যোগ', 'Añadir factura', 'Voeg Invoice', 'Dodaj faktury', 'In Rechnung', 'Ajouter facture', 'Aggiungere fattura', 'Добавить счет-фактуру', 'Adicionar Invoice', 'Fatura ekle', '송장 추가', 'Προσθέστε Τιμολόγιο', '添加发票'),
(421, 'are_you_sure_to_proceed_with_this_action', 'Are You Sure To Proceed With This Action', 'আপনি নিশ্চিত, কর্ম এগিয়ে যেতে হয়', 'Está seguro que desea continuar con su acción', 'Weet je zeker dat doorgaan met deze actie', 'Czy na pewno chcesz kontynuować operację', 'Sind Sie sicher mit dieser Aktion zu gehen', 'Êtes-vous sûr de procéder à cette action', 'Sei sicuro di voler procedere con questa azione', 'Вы действительно хотите продолжить действий', 'Tem certeza que deseja prosseguir com essa ação', 'Bu eyleme devam etmek için Emin misiniz', '이 작업을 진행 하시겠습니까', 'Είστε σίγουροι ότι για να εκτελέσετε αυτήν την ενέργεια', '您确定要继续这个动作'),
(422, 'confirm', 'Confirm', 'নিশ্চিত করা', 'Confirmar', 'Bevestigen', 'Potwierdzać', 'Bestätigen', 'Confirmer', 'Confermare', 'подтвердить', 'Confirmar', 'Onaylamak', '확인', 'Επιβεβαιώνω', '确认'),
(423, 'information_updated', 'Information Updated', 'তথ্য আপডেট করা হয়েছে', 'información actualizada', 'informatie bijgewerkt', 'Aktualizacja informacji', 'Informationen aktualisiert', 'Mise à jour de l\'information', 'Informazioni aggiornate', 'Обновлена ​​информация', 'As informações actualizadas', 'bilgi Güncelleme', '정보 업데이트', 'πληροφορίες Ενημέρωση', '信息更新'),
(424, 'order_approval', 'Order Approval', 'অর্ডার অনুমোদন', 'Aprobación fin', 'Bestel Goedkeuring', 'Zamówienie Zatwierdzenie', 'Auftragsgenehmigungs', 'approbation de l\'ordre', 'ordine di Soddisfazione', 'Утверждение заказа', 'ordem de Aprovação', 'Sipariş Onayı', '주문 승인', 'προκειμένου Έγκριση', '订单审批'),
(425, 'are_you_sure', 'Are You Sure', 'তুমি কি নিশ্চিত', 'Estás seguro', 'Weet je het zeker', 'Jesteś pewny', 'Bist du sicher', 'Êtes-vous sûr', 'Sei sicuro', 'Ты уверен', 'Você tem certeza', 'Emin misiniz', '확실합니까', 'Είσαι σίγουρος', '你确定'),
(426, 'configurations', 'Configurations', 'কনফিগারেশন', 'configuraciones', 'configuraties', 'konfiguracje', 'Konfigurationen', 'Configurations', 'configurazioni', 'Конфигурации', 'configurações', 'yapılandırmaları', '구성', 'συνθέσεις', '配置'),
(427, 'smtp_email', 'Smtp Email', 'SMTP ইমেইল', 'correo electrónico SMTP', 'smtp-mail', 'SMTP Email', 'Smtp E-Mail', 'Smtp Email', 'e-mail SMTP', 'Smtp E-mail', 'E-mail SMTP', 'sMTP e-posta', 'SMTP 전자 메일', 'smtp Email', 'SMTP电子邮件'),
(428, 'smtp_host', 'Smtp Host', 'SMTP হোস্ট', 'Host SMTP', 'smtp Host', 'SMTP Host', 'SMTP-Host', 'Smtp Host', 'Smtp Host', 'Smtp Хост', 'host SMTP', 'sMTP Sunucu', 'SMTP 호스트', 'SMTP Host', 'SMTP主机'),
(429, 'type_something', 'Type Something', 'কিছু লেখো', 'Escribe algo', 'Typ iets', 'Napisz coś', 'Schreibe etwas', 'tapez Something', 'Scrivi qualcosa', 'Введите что-либо', 'Digite algo', 'Birşeyler yaz', '뭔가를 입력', 'πληκτρολογήστε Κάτι', '输入一些东西'),
(430, 'smtp_port', 'Smtp Port', 'SMTP পোর্ট', 'puerto SMTP', 'SMTP-poort', 'Port SMTP', 'SMTP-Port', 'Smtp Port', 'porta SMTP', 'Smtp Порт', 'Porta SMTP', 'smtp Limanı', 'SMTP 포트', 'Θύρα SMTP', 'SMTP端口'),
(431, 'smtp_timeout', 'Smtp Timeout', 'SMTP Timeout এ কোডটি', 'Tiempo de espera SMTP', 'smtp Timeout', 'SMTP Timeout', 'Smtp Timeout', 'Smtp Timeout', 'Smtp Timeout', 'Smtp Тайм-аут', 'SMTP Timeout', 'smtp Zaman aşımı', 'SMTP 시간 초과', 'SMTP Timeout', 'SMTP超时'),
(432, 'smtp_user', 'Smtp User', 'SMTP ব্যবহারকারী', 'usuario SMTP', 'SMTP-gebruikersnaam', 'Użytkownik SMTP', 'Smtp Benutzer', 'Smtp utilisateur', 'Smtp utente', 'Smtp Пользователь', 'smtp do usuário', 'sMTP Kullanıcı', 'SMTP 사용', 'smtp χρήστη', 'SMTP用户'),
(433, 'smtp_password', 'Smtp Password', 'SMTP পাসওয়ার্ড', 'Contraseña SMTP', 'SMTP-wachtwoord', 'Hasło SMTP', 'SMTP- Passwort', 'Smtp Mot de passe', 'password SMTP', 'Smtp Пароль', 'Senha SMTP', 'sMTP Şifre', 'SMTP 비밀번호', 'πρόσβασης SMTP', 'SMTP密码'),
(434, 'Charter Set', 'Charter Set', 'চার্টার সেট', 'Conjunto Carta', 'charter Set', 'Karta Set', 'Charter-Set', 'Charte Set', 'Carta Set', 'Устав Set', 'Carta Set', 'Charter Seti', '헌장 설정', 'Χάρτη Σετ', '宪章套装'),
(435, 'New Line', 'New Line', 'নতুন লাইন', 'Nueva línea', 'Nieuwe lijn', 'Nowa linia', 'Neue Zeile', 'Nouvelle ligne', 'Nuova linea', 'Новая линия', 'Nova linha', 'Yeni hat', '뉴 라인', 'New Line', '新队'),
(436, 'Mail Type', 'Mail Type', 'মেল টাইপ', 'Tipo de correo', 'mail Soort', 'Poczta Rodzaj', 'Mail-Typ', 'Type de courrier', 'Tipo di posta', 'Почта Тип', 'Tipo de e-mail', 'posta Tipi', '메일 유형', 'Τύπος Mail', '邮件类型'),
(437, 'data_updated', 'Data Updated', 'ডেটা আপডেট', 'datos actualizados', 'gegevens bijgewerkt', 'Aktualizacja danych', 'Daten aktualisiert', 'Mise à jour des données', 'I dati aggiornati', 'Данные Обновлено', 'dados atualizados', 'veriler Güncelleme', '데이터 업데이트', 'Ενημέρωση δεδομένων', '数据更新'),
(438, 'charset', 'Charset', 'charset', 'charset', 'charset', 'charset', 'charset', 'Charset', 'charset', 'Charset', 'charset', 'Karakter', '캐릭터 세트', 'charset', '字符集'),
(439, 'sales_order_report', 'Sales Order Report', 'সেলস অর্ডার গালাগাল প্রতিবেদন', 'Orden de informes de ventas', 'Sales Orderrapport', 'Sales Order Report', 'Kundenauftragsbericht', 'Sales Order Report', 'Report di vendita Order', 'Менеджер по продажам Отчет по заказу', 'Relatório de Vendas Ordem', 'Satış Sipariş Raporu', '판매 주문 보고서', 'Πωλήσεις Έκθεση Παραγγελία', '销售订单报告'),
(440, 'product_order_report', 'Product Order Report', 'প্রোডাক্ট অর্ডার গালাগাল প্রতিবেদন', 'Producto de pedido Informe', 'Product Orderrapport', 'Zamówienie produktów Zgłoś', 'Produktauftragsbericht', 'Produit Rapport Ordre', 'Ordine del prodotto Rapporto', 'Продукт Отчет по заказу', 'Produto Relatório de Ordem', 'Ürün Sipariş Raporu', '제품 주문 보고서', 'Εκδήλωση Έκθεση', '产品订单报告'),
(441, 'from', 'From', 'থেকে', 'De', 'Van', 'Od', 'Von', 'De', 'Da parte di', 'Из', 'A partir de', 'itibaren', '에서', 'Από', '从'),
(442, 'to', 'To', 'থেকে', 'A', 'naar', 'Do', 'Nach', 'À', 'A', 'к', 'Para', 'için', '에', 'Να', '至'),
(443, 'view_report', 'View Report', 'দেখুন রিপোর্ট', 'Vista del informe', 'Rapport weergeven', 'Zobacz raport', 'Zeige Bericht', 'Voir le rapport', 'Visualizza rapporto', 'Просмотреть отчет', 'vista do relatório', 'Raporu görüntüle', '보고서보기', 'Προβολή αναφοράς', '查看报告'),
(444, 'select_category_first', 'Select Category First', 'বিভাগ নির্বাচন করুন প্রথম', 'Selecciona la categoría Primera', 'Selecteer categorie First', 'Wybierz kategorię Pierwszy', 'Wählen Sie zuerst Kategorie', 'Sélectionner la catégorie Première', 'Seleziona la categoria First', 'Выберите категорию Первый', 'Selecione a categoria Primeira', 'Kategori Seçiniz İlk', '카테고리 선택 우선', 'Επιλέξτε Κατηγορία πρώτα', '选择类别第一'),
(445, 'number_of_orders', 'Number Of Orders', 'অর্ডারের সংখ্যা', 'Numero de ordenes', 'Aantal bestellingen', 'Liczba zamówień', 'Anzahl der Bestellungen', 'Nombre de commandes', 'Numero di ordini', 'Число заказов', 'Número de pedidos', 'Siparişler Sayısı', '주문 번호', 'Αριθμό των παραγγελιών', '一些订单'),
(446, 'sales_order_summary', 'Sales Order Summary', 'সেলস অর্ডার সারাংশ', 'Resumen de órdenes de venta', 'Sales Order Samenvatting', 'Podsumowanie zamówienia sprzedaży', 'Kundenauftrag Zusammenfassung', 'Sales Order Résumé', 'Sommario ordini di vendita', 'Краткое описание заказа клиента', 'Resumo do Pedido de Vendas', 'Satış Sipariş Özeti', '판매 주문 요약', 'Περίληψη Πωλήσεων Παραγγελία', '销售订单摘要'),
(447, 'last_7_days', 'Last 7 Days', 'শেষ 7 দিনের', 'Los últimos 7 días', 'Afgelopen 7 dagen', 'Ostatnie 7 dni', 'Letzten 7 Tage', 'Les 7 derniers jours', 'Ultimi 7 giorni', 'За последние 7 дней', 'Nos últimos 7 dias', 'Son 7 Gün', '지난 7 일', 'Τελευταίες 7 Ημέρες', '过去7天'),
(448, 'last_30_days', 'Last 30 Days', 'শেষ 30 দিন', 'Últimos 30 días', 'Laatste 30 dagen', 'Ostatnie 30 dni', 'Letzte 30 Tage', 'Les 30 derniers jours', 'Ultimi 30 giorni', 'Последние 30 дней', 'Últimos 30 dias', 'Son 30 Gün', '지난 30 일', 'Τελευταίες 30 Ημέρες', '最近30天'),
(449, 'last_90_days', 'Last 90 Days', 'গত 90 দিনের', 'Últimos 90 días', 'Laatste 90 Dagen', 'Ostatnie 90 dni', 'Letzten 90 Tage', '90 derniers jours', 'Ultimi 90 giorni', 'За последние 90 дней', 'Últimos 90 dias', 'Son 90 Gün', '지난 90 일', 'Τελευταία 90 ημέρες', '最后90天'),
(450, 'order_status_summary', 'Order Status Summary', 'অর্ডার স্থিতি সংক্ষিপ্তসার', 'Estado del pedido Resumen', 'Order Status Samenvatting', 'Zamówienie Zestawienie stanu', 'Bestell-Status Zusammenfassung', 'État de Résumé', 'Order Riepilogo stato', 'Статус заказа Дополнительная информация', 'Resumo do status de ordem', 'Sipariş Durum Özeti', '주문 상태 요약', 'Προκειμένου Συνοπτική Κατάσταση', '订单状态摘要'),
(451, 'new_sales_order', 'New Sales Order', 'নতুন সেলস অর্ডার', 'Nuevo pedido de cliente', 'Nieuwe Sales Order', 'New Order sprzedaży', 'Neuer Auftrag', 'New Sales Order', 'Nuovo ordine di vendita', 'Новый порядок продаж', 'Nova Ordem de Vendas', 'Yeni Satış Sipariş', '새로운 판매 주문', 'Νέα Τάξη Πωλήσεις', '新销售订单'),
(452, 'new_purchase_order', 'New Purchase Order', 'নতুন ক্রয় আদেশ', 'Nueva orden de compra', 'Nieuwe Bestelling', 'Nowe Zamówienia', 'Neue Bestellung', 'Nouvelle commande d\'achat', 'Nuovo ordine di acquisto', 'Новый заказ на поставку', 'Nova ordem de compra', 'Yeni Sipariş', '새로운 구매 주문', 'Νέα Τάξη Αγορά', '新的采购订单'),
(453, 'new_product', 'New Product', 'নতুন পণ্য', 'Nuevo producto', 'Nieuw product', 'Nowy produkt', 'Neues Produkt', 'Nouveau produit', 'Nuovo prodotto', 'Новый продукт', 'Novo produto', 'Yeni ürün', '신제품', 'Καινούργιο προϊόν', '新产品'),
(454, 'new_user', 'New User', 'নতুন ব্যবহারকারী', 'Nuevo usuario', 'Nieuwe gebruiker', 'Nowy użytkownik', 'Neuer Benutzer', 'Nouvel utilisateur', 'Nuovo utente', 'Новый пользователь', 'Novo usuário', 'Yeni kullanıcı', '새로운 사용자', 'Νέος χρήστης', '新用户'),
(455, 'total_users', 'Total Users', 'মোট ব্যবহারকারী', 'Total de usuarios', 'Totaal aantal gebruikers', 'Wszystkich użytkowników', 'Benutzer insgesamt', 'Nombre total d\'utilisateurs', 'Totale utenti', 'Всего пользователей', 'total de usuários', 'Toplam Kullanıcılar', '총 사용자', 'Σύνολο χρηστών', '总用户数'),
(456, 'purchase_order_summary', 'Purchase Order Summary', 'ক্রয় আদেশ সংক্ষিপ্ত', 'Resumen de órdenes de compra', 'Bestelling Samenvatting', 'Zamówieniem Podsumowanie', 'Purchase Order Zusammenfassung', 'Bon de commande Résumé', 'Ordine di acquisto Sommario', 'Покупка Резюме заказа', 'Purchase Order Summary', 'Sipariş Özeti Satınalma', '주문 개요 구매', 'Εντολή Αγοράς Περίληψη', '采购订单摘要'),
(457, 'sales_order_status_summary', 'Sales Order Status Summary', 'সেলস অর্ডার স্থিতি সংক্ষিপ্তসার', 'Resumen del estado de órdenes de venta', 'Sales Order Status Samenvatting', 'Podsumowanie Status zamówienia sprzedaży', 'Kundenauftragsstatus Zusammenfassung', 'Ordre Statut de vente Résumé', 'Ordine di vendita Riepilogo stato', 'Продажи Статус заказа Резюме', 'Resumo do status de Ordem de Vendas', 'Satış Sipariş Durum Özeti', '판매 주문 상태 요약', 'Πωλήσεις Παραγγελία Συνοπτική Κατάσταση', '销售订单状态摘要'),
(458, 'purchase_order_status_summary', 'Purchase Order Status Summary', 'ক্রয় আদেশ স্থিতি সংক্ষিপ্তসার', 'Orden de compra Resumen del estado', 'Bestelling Status Samenvatting', 'Zakup status zamówienia Podsumowanie', 'Bestellstatus Zusammenfassung', 'Bon de commande Statut Résumé', 'Ordine di acquisto Riepilogo stato', 'Покупка Статус заказа Итоговая', 'Ordem de Compra Resumo do status', 'Sipariş Durumu Özeti Satınalma', '주문 상태 요약을 구매', 'Εντολή Αγοράς Συνοπτική Κατάσταση', '采购订单状态摘要'),
(459, 'cancelled', 'Cancelled', 'বাতিল হয়েছে', 'Cancelado', 'Geannuleerd', 'Odwołany', 'Abgebrochen', 'Annulé', 'Annullato', 'Отменено', 'Cancelado', 'iptal edildi', '취소 된', 'Ακυρώθηκε', '取消'),
(460, 'sales_order_status', 'Sales Order Status', 'সেলস অর্ডার স্থিতি', 'Estado del pedido de cliente', 'Sales Order Status', 'Zamówienie sprzedaży status', 'Kundenauftragsstatus', 'Statut de commande client', 'Vendite Stato dell\'ordine', 'Статус заказа клиента', 'Status do Pedido de Vendas', 'Satış Sipariş Durumu', '판매 주문 상태', 'Πωλήσεις Κατάσταση παραγγελίας', '销售订单状态'),
(461, 'purchase_order_status', 'Purchase Order Status', 'অর্ডার স্থিতি কিনুন', 'Comprar Estado del pedido', 'Bestelling Status', 'Zakup Stan zamówienia', 'Bestellstatus', 'Achetez Order Status', 'Ordine di acquisto Stato', 'Покупка Статус заказа', 'Comprar Status do pedido', 'Sipariş Durumu Satınalma', '주문 상태를 구입', 'Αγοράζουν Κατάσταση παραγγελίας', '采购订单状态'),
(462, 'phrase_list', 'Phrase List', 'শব্দবন্ধ তালিকা', 'Lista frase', 'Phrase List', 'Lista Zwroty', 'Phrasenliste', 'Liste Phrase', 'Lista frase', 'Список фраз', 'Lista frase', 'Öbek listesi', '구문 목록', 'Λίστα φράση', '短语列表'),
(463, 'customer_code', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(464, 'customer_name', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(465, 'buyer_name', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(466, 'please_insert_a_name', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(467, 'add_CSV_file', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(468, 'import_CSV_file', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(469, 'warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(470, 'warehouses', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(471, 'warehouse_stocks', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(472, 'manager', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(473, 'warehouse_manager', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(474, 'warehouse_managers', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(475, 'select_from_warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(476, 'select_warehouse (Available_quantity)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(477, 'add_to_shipment', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(478, 'shipment_quantity_can_not_be_greater_than_ordered_quantity', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(479, 'create_new_warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(480, 'warehouse_title', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(481, 'phone_numnber', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(482, 'warehouse_deleted', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(483, 'add_new_warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(484, 'choose_manager_name', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(485, 'warehouse_address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(486, 'choose_warehouse_manager', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(487, 'edit_warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(488, 'warehouse_code', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(489, 'note', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(490, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(491, 'the_code_must_be_unique', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(492, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(493, 'manager_dashboard', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(494, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(495, 'warehouse_details', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(496, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(497, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(498, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(499, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(500, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(501, 'managers', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(502, 'distribute_to_warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(503, 'add_to_warehouse', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(504, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(505, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(506, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(507, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(508, 'total_quantity', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(509, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(510, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(511, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(512, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(513, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(514, 'Address', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(515, 'warehouse_added_successfully', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(516, 'sales_order_list', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_comment`
--

DROP TABLE IF EXISTS `order_comment`;
CREATE TABLE `order_comment` (
  `order_comment_id` int(11) NOT NULL,
  `order_comment_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'sales,purchase'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'sales,purchase',
  `payment_method` int(11) NOT NULL COMMENT '1(cash),2(cheque),3(card)',
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `brand` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_user_id` int(11) NOT NULL,
  `image_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `variant` int(11) NOT NULL COMMENT '0(no)1(yes)',
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` longtext COLLATE utf8_unicode_ci NOT NULL,
  `archive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0(not archived) 1(archived)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE `purchase_order` (
  `purchase_order_id` int(11) NOT NULL,
  `purchase_order_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_user_id` int(11) NOT NULL,
  `supplier_address_id` int(11) NOT NULL,
  `ordering_user_id` int(11) NOT NULL,
  `purchase_order_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL COMMENT '0(pending)1(raised)2(received)',
  `payment_status` int(11) NOT NULL COMMENT '0 unpaid 1 paid',
  `archive_status` int(11) NOT NULL DEFAULT '0' COMMENT '1(archived) 0(not archived)',
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_raised` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_received` longtext COLLATE utf8_unicode_ci NOT NULL,
  `encryption_key` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

DROP TABLE IF EXISTS `sales_order`;
CREATE TABLE `sales_order` (
  `order_id` int(11) NOT NULL,
  `order_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `customer_user_id` int(11) NOT NULL,
  `seller_user_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `order_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL COMMENT '0(pending)1(confirmed)3(shipped)2(partially shipped)4(delivered) 10(canceled)',
  `payment_status` int(11) NOT NULL COMMENT '0(unpaid) 1(paid) 2(partially paid)',
  `archive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0(not archived) 1(archived)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Bijoy Stock Inventory Manager ERP'),
(2, 'system_title', 'Bijoy Stock Inventory Manager ERP'),
(3, 'address', 'Sydney, Australia'),
(4, 'phone', '+8012654159'),
(5, 'paypal_email', 'payment@creativeitem.com'),
(6, 'currency_id', '1'),
(7, 'system_email', 'admin@example.com'),
(10, 'language', 'english'),
(11, 'text_align', 'right-to-left'),
(14, 'stripe_publishable_key', 'pk_test_c6VvBEbwHFdulFZ62q1IQrar'),
(15, 'stripe_api_key', 'sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS'),
(17, 'smtp_settings', '{\"smtp_email\":\"Disable\",\"smtp_email_rules\":\"required\",\"smtp_host\":\"ssl:\\/\\/smtp.googlemail.com\",\"smtp_host_rules\":\"required\",\"smtp_port\":\"465\",\"smtp_port_rules\":\"required\",\"smtp_timeout\":\"30\",\"smtp_timeout_rules\":\"required\",\"smtp_user\":\"test@example.com\",\"smtp_user_rules\":\"required|valid_email\",\"smtp_pass\":\"1234\",\"smtp_pass_rules\":\"required\",\"char_set\":\"utf-8\",\"char_set_rules\":\"required\",\"new_line\":\"\\\\r\\\\n\",\"new_line_rules\":\"required\",\"mail_type\":\"html\",\"mail_type_rules\":\"required\"}');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
CREATE TABLE `shipment` (
  `shipment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `tracking_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `shipping_cost` longtext COLLATE utf8_unicode_ci NOT NULL,
  `shipment_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `shipping_method_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `shipment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

DROP TABLE IF EXISTS `shipping_method`;
CREATE TABLE `shipping_method` (
  `shipping_method_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`shipping_method_id`, `name`) VALUES
(1, 'Handover'),
(2, 'Courier');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `tax_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_created` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0' COMMENT '1(male), 2(female)',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '1(admin), 2(customer),3(supplier),4(employee),5(manager)',
  `user_permission` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '1(manage inventory),2(manage purchase order),3(manage sales order)',
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_code`, `name`, `email`, `password`, `phone`, `gender`, `type`, `user_permission`, `date_added`, `last_modified`) VALUES
(1, 'abcdef123', 'Mr. Admin', 'admin@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

DROP TABLE IF EXISTS `variant`;
CREATE TABLE `variant` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `specification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `alert_quantity` int(11) NOT NULL,
  `cost_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `selling_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_variant` int(11) NOT NULL COMMENT '1(yes),0(no)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse` (
  `warehouse_id` int(11) NOT NULL,
  `warehouse_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_user_code` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'warehouse_manager_id',
  `warehouse_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_phone_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_date_added` longtext COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_last_modified` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_details`
--

DROP TABLE IF EXISTS `warehouse_details`;
CREATE TABLE `warehouse_details` (
  `id` int(100) NOT NULL,
  `warehouse_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `variant_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_status` int(11) NOT NULL COMMENT '1(entering),0(leaving)',
  `date` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'date for entering or leaving'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_template`
--
ALTER TABLE `invoice_template`
  ADD PRIMARY KEY (`invoice_template_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `order_comment`
--
ALTER TABLE `order_comment`
  ADD PRIMARY KEY (`order_comment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`shipping_method_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `warehouse_details`
--
ALTER TABLE `warehouse_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_template`
--
ALTER TABLE `invoice_template`
  MODIFY `invoice_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;
--
-- AUTO_INCREMENT for table `order_comment`
--
ALTER TABLE `order_comment`
  MODIFY `order_comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `shipping_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouse_details`
--
ALTER TABLE `warehouse_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
