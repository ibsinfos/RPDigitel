-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 01:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `install`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `code`, `name`, `email`, `password`, `authentication_key`) VALUES
(1, 'AG5IJX9', 'Mr. Admin', 'admin@example.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` text COLLATE utf8_unicode_ci NOT NULL
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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(100) NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `commented_user` longtext COLLATE utf8_unicode_ci NOT NULL,
  `commented_item` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

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
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `English` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `German` longtext COLLATE utf8_unicode_ci,
  `Hebrew` longtext COLLATE utf8_unicode_ci,
  `Arabic` longtext COLLATE utf8_unicode_ci,
  `Bengali` longtext COLLATE utf8_unicode_ci,
  `Dutch` longtext COLLATE utf8_unicode_ci,
  `Hindi` longtext COLLATE utf8_unicode_ci,
  `Russian` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `English`, `Spanish`, `German`, `Hebrew`, `Arabic`, `Bengali`, `Dutch`, `Hindi`, `Russian`) VALUES
(1, 'login', '', 'Iniciar sesión', 'Anmeldung', 'התחברות', 'تسجيل الدخول', 'লগইন', 'Log in', 'लॉग इन करें', 'Авторизоваться'),
(2, 'forgot_password', '', 'Se te olvidó tu contraseña', 'Passwort vergessen', 'שכחת את הסיסמא', 'هل نسيت كلمة المرور', 'পাসওয়ার্ড ভুলে গেছেন', 'Wachtwoord vergeten', 'पासवर्ड भूल गए', 'Забыли пароль'),
(3, 'dashboard', '', 'Tablero', 'Instrumententafel', 'לוּחַ מַחווָנִים', 'لوحة القيادة', 'ড্যাশবোর্ড', 'Dashboard', 'डैशबोर्ड', 'Панель приборов'),
(4, 'logout', '', 'Cerrar sesión', 'Ausloggen', 'להתנתק', 'الخروج', 'প্রস্থান', 'Uitloggen', 'लोग आउट', 'Выйти'),
(5, 'users', '', 'usuarios', 'Benutzer', 'משתמש', 'المستخدمين', 'ব্যবহারকারীরা', 'gebruikers', 'उपयोगकर्ता', 'пользователей'),
(6, 'manage_users', '', 'Gestión de usuarios', 'Benutzer verwalten', 'ניהול משתמשים', 'ادارة المستخدمين', 'পরিচালনা ব্যবহারকারীরা', 'Gebruikers beheren', 'उपयोगकर्ताओं को प्रबंधित करें', 'Управление пользователями'),
(7, 'name', '', 'Nombre', 'Name', 'שֵׁם', 'اسم', 'নাম', 'Naam', 'नाम', 'имя'),
(8, 'contact', '', 'Contacto', 'Kontakt', 'איש קשר', 'اتصل', 'যোগাযোগ', 'Contact', 'संपर्क करें', 'контакт'),
(9, 'options', '', 'opciones', 'Optionen', 'אפשרויות', 'خيارات', 'বিকল্প', 'opties', 'विकल्प', 'Опции'),
(10, 'action', '', 'Acción', 'Aktion', 'פעולה', 'عمل', 'কর্ম', 'Actie', 'कार्य', 'действие'),
(11, 'profile', '', 'Perfil', 'Profil', 'פּרוֹפִיל', 'الملف الشخصي', 'প্রোফাইলের', 'Profiel', 'प्रोफाइल', 'Профиль'),
(12, 'edit', '', 'Editar', 'Bearbeiten', 'לַעֲרוֹך', 'تصحيح', 'সম্পাদন করা', 'Bewerk', 'संपादित करें', 'редактировать'),
(13, 'delete', '', 'Borrar', 'Löschen', 'לִמְחוֹק', 'حذف', 'মুছে ফেলা', 'Verwijder', 'हटाना', 'Удалить'),
(14, 'user_deleted', '', 'Usuario eliminado', 'Benutzer gelöscht', 'משתמש נמחק', 'المستخدم المحذوفة', 'ব্যবহারকারী মোছা হয়েছে', 'gebruiker Verwijderde', 'हटाया गया उपयोगकर्ता', 'Пользователь Удален'),
(15, 'user_list', '', 'Lista de usuarios', 'Benutzerliste', 'רשימת משתמש', 'قائمة المستخدم', 'ব্যবহারকারীর তালিকা', 'gebruikers lijst', 'उपयोगकर्ता सूची', 'Список пользователей'),
(16, 'code', '', 'Código', 'Code', 'קוד', 'الشفرة', 'কোড', 'Code', 'कोड', 'Код'),
(17, 'email', '', 'Email', 'Email', 'אֶלֶקטרוֹנִי', 'البريد الإلكتروني', 'ইমেইল', 'E-mail', 'ईमेल', 'Эл. адрес'),
(18, 'add_new_user', '', 'Añadir nuevo usuario', 'Neuen Benutzer hinzufügen', 'הוספת משתמש חדש', 'إضافة مستخدم جديد', 'নতুন ব্যবহারকারী জুড়ুন', 'Nieuwe gebruiker toevoegen', 'नई उपयोगकर्ता को जोड़ना', 'Добавить пользователя'),
(19, 'add_address', '', 'Añadir dirección', 'Adresse hinzufügen', 'הוסף כתובת', 'اضف عنوان', 'ঠিকানা যোগ করুন', 'Voeg adres toe', 'पता जोड़ें', 'Добавить адрес'),
(20, 'save_user', '', 'Guardar usuario', 'Benutzer speichern', 'משתמש שמור', 'حفظ العضو', 'সংরক্ষণ করুন ব্যবহারকারী', 'Save User', 'उपयोगकर्ता सहेजें', 'Сохранить пользователя'),
(21, 'user_addded_successfully', '', 'Usuario addded con éxito', 'User-added Erfolgreich', 'משתמש Addded בהצלחה', 'العضو Addded بنجاح', 'ব্যবহারকারী সফলভাবে Addded', 'Gebruiker succesvol addded', 'उपयोगकर्ता सफलतापूर्वक Addded', 'Пользователь Addded успешно'),
(22, 'success', '', 'Éxito', 'Erfolg', 'הַצלָחָה', 'نجاح', 'সাফল্য', 'Succes', 'सफलता', 'успех'),
(23, 'error', '', 'Error', 'Fehler', 'שְׁגִיאָה', 'خطأ', 'এরর', 'Fout', 'त्रुटि', 'ошибка'),
(24, 'enter_sufficient_info', '', 'Introduzca la información suficiente', 'Geben Sie genügend Info', 'זן מידע מספיק', 'أدخل معلومات كافية', 'যথেষ্ট তথ্য লিখুন', 'Voer Voldoende Info', 'पर्याप्त जानकारी दर्ज करें', 'Введите Достаточная информация'),
(25, 'user_code', '', 'Codigo de usuario', 'Benutzercode', 'קוד משתמש', 'الرقم السري للمستخدم', 'ব্যবহারকারী কোড', 'gebruikerscode', 'उपयोगकर्ता कोड', 'Код пользователя'),
(26, 'password', '', 'Contraseña', 'Passwort', 'סיסמה', 'كلمه السر', 'পাসওয়ার্ড', 'Wachtwoord', 'पासवर्ड', 'пароль'),
(27, 'phone', '', 'Teléfono', 'Telefon', 'טלפון', 'هاتف', 'ফোন', 'Telefoon', 'फ़ोन', 'Телефон'),
(28, 'address', '', 'Dirección', 'Adresse', 'כתובת', 'عنوان', 'ঠিকানা', 'Adres', 'पता', 'Адрес'),
(29, 'profile_image', '', 'Imagen de perfil', 'Profilbild', 'תמונת פרופיל', 'صورة البروفيل', 'প্রোফাইল চিত্র', 'Profielfoto', 'प्रोफ़ाइल छवि', 'Изображение профиля'),
(30, 'select_image', '', 'Seleccionar imagen', 'Bild auswählen', 'בחר תמונה', 'اختر صورة', 'চিত্র নির্বাচন করুন', 'Afbeelding selecteren', 'छवि चुने', 'Выберите изображение'),
(31, 'change', '', 'Cambio', 'Veränderung', 'שינוי', 'يتغيرون', 'পরিবর্তন', 'Verandering', 'परिवर्तन', '+ Изменить'),
(32, 'remove', '', 'retirar', 'Entfernen', 'לְהַסִיר', 'إزالة', 'অপসারণ', 'Verwijderen', 'हटाना', 'Удалить'),
(33, 'please_fill_up_required_fields', '', 'Por favor, rellene los campos obligatorios', 'Bitte füllen Sie Pflichtfelder', 'נא מלא את שדות חובה', 'يرجى تعبئة ما يصل حقول مطلوبة', 'দয়া করে প্রয়োজনীয় ক্ষেত্রগুলি পূরণ করুন', 'Gelieve Fill Up Verplichte velden', 'कृपया आवश्यक फ़ील्ड ऊपर भरें', 'Пожалуйста заполните поля обязательные для заполнения'),
(34, 'edit_user', '', 'editar usuario', 'Benutzer bearbeiten', 'משתמש ערוך', 'تحرير العضو', 'ব্যবহারকারী সম্পাদনা', 'Gebruiker bewerken', 'यूजर को संपादित करो', 'Изменить пользователя'),
(35, 'update', '', 'Actualizar', 'Aktualisieren', 'עדכון', 'تحديث', 'হালনাগাদ', 'Bijwerken', 'अद्यतन', 'Обновить'),
(36, 'user_updated_successfully', '', 'Usuario actualizado correctamente', 'Benutzer erfolgreich aktualisiert', 'המשתמש עודכן בהצלחה', 'العضو التحديث بنجاح', 'ব্যবহারকারী সফলভাবে আপডেট করা হয়েছে', 'Gebruiker succesvol bijgewerkt', 'उपयोगकर्ता सफलतापूर्वक अपडेट', 'Пользователь успешно обновлен'),
(37, 'this_will_premanently_delete_the_information', '', 'Esto eliminará Premanently La Información', 'Dies wird Premanently Die Informationen Löschen', 'זה יהיה Premanently למחוק את המידע', 'هذا وسوف تحذف Premanently ومعلومات', 'এই Premanently তথ্য মুছে ফেলবে', 'Dit zal Premanently Verwijderen The Information', 'यह Premanently जानकारी को नष्ट करेगा', 'Это будет Premanently удалить информацию'),
(38, 'cancel', '', 'Cancelar', 'Stornieren', 'לְבַטֵל', 'إلغاء', 'বাতিল', 'Annuleer', 'रद्द करना', 'Отмена'),
(39, 'user_profile', '', 'Perfil del usuario', 'Benutzerprofil', 'פרופיל משתמש', 'ملف تعريفي للمستخدم', 'ব্যবহারকারী প্রোফাইল', 'Gebruikersprofiel', 'उपयोगकर्ता प्रोफ़ाइल', 'Профиль пользователя'),
(40, 'purchased_video_packs', '', 'Los paquetes de vídeo adquirido', 'Erworbene Video-Pack', 'חבילות וידאו קנויות', 'حزم الفيديو التي تم شراؤها', 'ক্রয় করা ভিডিও প্যাক', 'Gekocht Video Packs', 'खरीदे गए वीडियो पैक', 'Куплен Видео пакеты'),
(41, 'video_pack_details', '', 'Detalles del Video Paquete', 'Video Pack-Details', 'פרטי חבילת וידאו', 'فيديو تفاصيل حزمة', 'ভিডিও প্যাক বিবরণ', 'Video Pack Details', 'वीडियो पैक विवरण', 'Детали видео обновления'),
(42, 'videos', '', 'vídeos', 'Videos', 'וידאו', 'أشرطة فيديو', 'ভিডিও', 'Videos', 'वीडियो', 'Видео'),
(43, 'add_video', '', 'Añadir video', 'Video hinzufügen', 'הוסף וידאו', 'إضافة فيديو', 'ভিডিও জুড়ুন', 'toevoegen', 'वीडियो जोड़ें', 'Добавить видео'),
(44, 'add_video_pack', '', 'Añadir Video Pack', 'In Video Pack', 'להוסיף חבילת וידאו', 'إضافة حزمة فيديو', 'ভিডিও প্যাক যুক্ত করো', 'Toevoegen Pack', 'वीडियो पैक जोड़े', 'Добавить видео пакет'),
(45, 'categories', '', 'categorías', 'Kategorien', 'קטגוריות', 'الاقسام', 'ধরন', 'Categorieën', 'श्रेणियाँ', 'категории'),
(46, 'add_new_video', '', 'Añadir un Nuevo Vídeo', 'Neues Video hinzufügen', 'הוסף וידאו', 'إضافة فيديو جديد', 'নতুন ভিডিও যোগ', 'Voeg nieuwe video', 'नई वीडियो जोड़े', 'Добавить видео'),
(47, 'video_source', '', 'Fuente de vídeo', 'Videoquelle', 'מקור וידאו', 'مصدر الفيديو', 'ভিডিও উত্স', 'video Source', 'वीडियो स्रोत', 'Источник видео'),
(48, 'select_video_source', '', 'Seleccionar fuente de vídeo', 'Wählen Sie Videoquelle', 'בחר מקור וידאו', 'تحديد مصدر الفيديو', 'নির্বাচন করুন ভিডিও উত্স', 'Selecteer Video Source', 'का चयन करें वीडियो स्रोत', 'Выбор источника видеосигнала'),
(49, 'video_file', '', 'Archivo de vídeo', 'Videodatei', 'קובץ וידאו', 'ملف فيديو', 'ভিডিও ফাইল', 'video File', 'वीडियो फाइल', 'Видеофайл'),
(50, 'embed_url', '', 'Url Insertar', 'Einbetten URL', 'שבץ כתובת האתר', 'تضمين رابط', 'এম্বেড করা URL', 'Integreer Url', 'एम्बेड यूआरएल', 'Вставить Url'),
(51, 'embed_url_can_not_be_blank', '', 'Insertar URL puede no estar en blanco', 'Einbetten URL darf nicht leer sein', 'שבץ כתובת האתר אינה יכולה להיות ריקה', 'تضمين رابط لا يمكن أن يكون فارغ', 'এম্বেড করা URL ফাঁকা করা যাবে না', 'Inbedden URL mag niet leeg zijn', 'एम्बेड URL रिक्त नहीं हो सकता', 'Вставить Url не может быть пустым'),
(52, 'invalid_embed_url', '', 'Inválida Insertar Url', 'Ungültige Einbetten URL', 'חוקי שבץ כתובת', 'تضمين رابط غير صالح', 'অবৈধ এম্বেড করা URL', 'Ongeldige insluiten Url', 'अमान्य एम्बेड यूआरएल', 'Invalid Вставить Url'),
(53, 'validate', '', 'Validar', 'Bestätigen', 'לְאַמֵת', 'التحقق من صحة', 'সত্যতা সমর্থন করা', 'bevestigen', 'मान्य करें', 'утверждать'),
(54, 'title', '', 'Título', 'Titel', 'כותרת', 'عنوان', 'খেতাব', 'Titel', 'शीर्षक', 'заглавие'),
(55, 'description', '', 'Descripción', 'Beschreibung', 'תאור', 'وصف', 'বিবরণ', 'Beschrijving', 'विवरण', 'Описание'),
(56, 'thumbnail', '', 'Miniatura', 'Miniaturansicht', 'תמונה ממוזערת', 'صورة مصغرة', 'ছোট', 'thumbnail', 'थंबनेल', 'Thumbnail'),
(57, 'duration', '', 'Duración', 'Dauer', 'מֶשֶׁך', 'المدة الزمنية', 'স্থিতিকাল', 'Looptijd', 'अवधि', 'продолжительность'),
(58, 'video_title', '', 'Titulo del Video', 'Videotitel', 'כותרת סרטון', 'عنوان مقطع الفيديو', 'ভিডিও শিরোনাম', 'videotitel', 'वीडियो शीषर्क', 'Название видео'),
(59, 'video_duration', '', 'Duración de vídeo', 'Video Duration', 'משך וידאו', 'فيديو مدة', 'ভিডিও স্থিতিকাল', 'video Duur', 'वीडियो की अवधि', 'Продолжительность видео'),
(60, 'video_file_source', '', 'Video Fuente Archivo', 'Video Dateiquelle', 'מקור קובץ וידאו', 'فيديو ملف المصدر', 'ভিডিও ফাইল উত্স', 'Video File Source', 'वीडियो फ़ाइल स्रोत', 'Источник видео файлов'),
(61, 'video_file_link', '', 'Enlace de archivos de vídeo', 'Video Dateiverknüpfung', 'קישור לקובץ וידאו', 'رابط ملف الفيديو', 'ভিডিও ফাইল লিংক', 'Video File Link', 'वीडियो फ़ाइल लिंक', 'Видео Ссылка на файл'),
(62, 'home', '', 'Casa', 'Zuhause', 'בית', 'الصفحة الرئيسية', 'বাড়ি', 'Huis', 'घर', 'Главная'),
(63, 'video_packs', '', 'Los paquetes de vídeo', 'Video-Pack', 'חבילות וידאו', 'حزم الفيديو', 'ভিডিও প্যাক', 'video Packs', 'वीडियो पैक', 'Видео пакеты'),
(64, 'signup', '', 'Regístrate', 'Anmelden', 'הירשם', 'سجل', 'নিবন্ধন করুন', 'Aanmelden', 'साइन अप करें', 'Зарегистрироваться'),
(65, 'favourites', '', 'favoritos', 'Favoriten', 'מועדפים', 'المفضلة', 'প্রিয়', 'favorieten', 'पसंदीदा', 'Избранные'),
(66, 'purchased_videos', '', 'Los vídeos comprados', 'gekaufte Videos', 'סרטונים שנרכשו', 'فيديو المشتراة', 'কেনা ভিডিও', 'gekochte video\'s', 'ख़रीदे गए वीडियो', 'приобретенное видео'),
(67, 'featured_videos', '', 'Vídeos destacados', 'Beliebte Videos', 'סרטי וידאו מוצעים', 'فيديو مميزة', 'বৈশিষ্ট্যযুক্ত ভিডিও', 'Aanbevolen video', 'विशेष रुप से प्रदर्शित वीडियोज़', 'Избранные видео'),
(68, 'featured', '', 'Representado', 'Hervorgehoben', 'מומלצים', 'متميز', 'বৈশিষ্ট্যযুক্ত', 'Uitgelicht', 'विशेष रुप से प्रदर्शित', 'Рекомендуемые'),
(69, 'most_recent', '', 'Más reciente', 'Neueste', 'הכי עדכני', 'الأحدث', 'অতি সম্প্রতি', 'Meest recente', 'सबसे हाल का', 'Самые последние'),
(70, 'video_pack', '', 'Paquete de vídeo', 'Video Pack', 'חבילת וידאו', 'حزمة فيديو', 'ভিডিও প্যাক', 'video Pack', 'वीडियो पैक', 'Видео обновления'),
(71, 'register', '', 'Registro', 'Neu registrieren', 'הירשם', 'تسجيل', 'নিবন্ধন', 'Registreren', 'रजिस्टर', 'регистр'),
(72, 'signin', '', 'Registrarse', 'Anmelden', 'היכנס', 'تسجيل الدخول', 'প্রবেশ কর', 'Aanmelden', 'साइन इन करें', 'Войти в систему'),
(73, 'create_my_account', '', 'Crear mi cuenta', 'Erstelle meinen Account', 'צור חשבון שלי', 'إنشيء حسابي', 'আমার একাউন্ট তৈরি কর', 'Maak mijn account', 'मेरा खाता बनाओ', 'Создай мой аккаунт'),
(74, 'already_have_an_account', '', 'Ya tienes una cuenta', 'Hast du schon ein Konto', 'כבר יש לך חשבון', 'إذا كنت تملك حسابا', 'ইতিমধ্যে একটি সদস্যপদ আছে', 'Al een account hebt', 'क्या आपके पास पहले से एक खाता मौजूद है', 'Уже есть учетная запись'),
(75, 'do_not_have_account', '', 'No tiene cuenta', 'Haben Sie nicht Konto', 'אין לך חשבון', 'لم يكن لديك حساب', 'একাউন্ট না', 'Heeft u nog geen account', 'खाता नहीं है', 'Не имею счет'),
(76, 'search', '', 'Buscar', 'Suche', 'חפש', 'بحث', 'অনুসন্ধান', 'Zoeken', 'खोज', 'Поиск'),
(77, 'watch_now', '', 'Ver ahora', 'Schau jetzt', 'צפה עכשיו', 'شاهد الآن', 'এখন দেখো', 'Kijk nu', 'अब देखिए', 'Смотри'),
(78, 'full_name', '', 'Nombre completo', 'Vollständiger Name', 'שם מלא', 'الاسم الكامل', 'পুরো নাম', 'Voor-en achternaam', 'पूरा नाम', 'Полное имя'),
(79, 'purchase_now', '', 'Comprar ahora', 'Jetzt kaufen', 'קנה עכשיו', 'شراء الآن', 'এখনই কিনুন', 'Koop nu', 'अभी खरीदो', 'Купить сейчас'),
(80, 'favorites', '', 'favoritos', 'Favoriten', 'מועדפים', 'المفضلة', 'প্রিয়', 'favorieten', 'पसंदीदा', 'Избранные'),
(81, 'purchased', '', 'comprar', 'Erworbene', 'נרכש', 'اشترى', 'কেনা', 'Gekocht', 'खरीदी', 'купленный'),
(82, 'settings', '', 'ajustes', 'Einstellungen', 'הגדרות', 'إعدادات', 'সেটিংস', 'instellingen', 'सेटिंग्स', 'настройки'),
(83, 'profile_information', '', 'información del perfil', 'Profil Information', 'מידע על הפרופיל', 'معلومات الملف الشخصي', 'জীবন তথ্য', 'profiel informatie', 'प्रोफ़ाइल जानकारी', 'информация профиля'),
(84, 'change_password', '', 'Cambia la contraseña', 'Passwort ändern', 'שנה סיסמא', 'تغيير كلمة السر', 'পাসওয়ার্ড পরিবর্তন', 'Verander wachtwoord', 'पासवर्ड बदलें', 'Изменить пароль'),
(85, 'watch_video', '', 'Ver video', 'Video ansehen', 'צפה בוידאו', 'شاهد الفيديو', 'ভিডিও দেখা', 'Bekijk de video', 'वीडियो देखेंा', 'Смотреть видео'),
(86, 'show_more', '', 'Mostrar más', 'Zeig mehr', 'להראות יותר', 'أظهر المزيد', 'আরও দেখাও', 'Laat meer zien', 'और दिखाओ', 'Показать больше'),
(87, 'view_details', '', 'Ver detalles', 'Details anzeigen', 'הצג פרטים', 'عرض التفاصيل', 'বিস্তারিত দেখুন', 'Bekijk details', 'विवरण देखें', 'Посмотреть детали'),
(88, 'add_photo', '', 'Añadir foto', 'Foto hinzufügen', 'הוסף תמונה', 'إضافة صورة', 'ঘফজ', 'Voeg foto toe', 'तस्वीर जोड़ो', 'Добавить фото'),
(89, 'search_results', '', 'Resultados de la búsqueda', 'Suchergebnisse', 'תוצאות חיפוש', 'نتائج البحث', 'অনুসন্ধান ফলাফল', 'Zoekresultaten', 'खोज परिणाम', 'результаты поиска'),
(90, 'user_added_successfully', '', 'Usuario agregado con éxito', 'Benutzer erfolgreich hinzugefügt', 'משתמש נוסף בהצלחה', 'العضو أضيف بنجاح', 'ব্যবহারকারী সফলভাবে যোগ করা', 'Gebruiker succesvol toegevoegd', 'प्रयोक्ता सफलतापूर्वक जोड़ा गया', 'Пользователь успешно добавлен'),
(91, 'category', '', 'Categoría', 'Kategorie', 'קטגוריה', 'الفئة', 'বিভাগ', 'Categorie', 'वर्ग', 'категория'),
(92, 'add_category', '', 'añadir categoría', 'Kategorie hinzufügen', 'הוסף קטגוריה', 'إضافة فئة', 'বিভাগ জুড়ুন', 'categorie toevoegen', 'श्रेणी जोड़ना', 'Добавить категорию'),
(93, 'video_category', '', 'Categoría de vídeo', 'Video Kategorie', 'קטגורית וידאו', 'فيديو الفئة', 'ভিডিও বিভাগ', 'video Categorie', 'वीडियो श्रेणी', 'Категория видео'),
(94, 'add_new_category', '', 'Añadir nueva categoria', 'neue Kategorie hinzufügen', 'הוסף קטגוריה חדשה', 'إضافة فئة جديدة', 'নতুন বিভাগ যোগ করুন', 'Nieuwe categorie toevoegen', 'नई श्रेणी जोड़ें', 'Добавить новую категорию'),
(95, 'date_added', '', 'Fecha Agregada', 'Datum hinzugefügt', 'תאריך הוסף', 'تم إضافة التاريخ', 'তারিখ যোগ করা হয়েছে', 'Datum toegevoegd', 'तारीख संकलित हुई', 'Дата Добавлена'),
(96, 'last_modified', '', 'Última modificación', 'Zuletzt bearbeitet', 'שונה לאחרונה', 'آخر تعديل', 'সর্বশেষ পরিবর্তিত', 'Laatst gewijzigd', 'अंतिम बार संशोधित', 'Последнее изменение'),
(97, 'category_title', '', 'Título de la categoría', 'Kategorie Titel', 'כותרת קטגוריה', 'تصنيف العنوان', 'শ্রেণী শিরোনাম', 'categorie Titel', 'श्रेणी शीर्षक', 'Категория Название'),
(98, 'enter_category_title', '', 'Introduzca Título de la categoría', 'Geben Sie Kategorie Titel', 'זן כותרת קטגוריה', 'أدخل عنوان الفئة', 'শ্রেণী শিরোনাম লিখুন', 'Voer Categorie Titel', 'श्रेणी शीर्षक दर्ज करें', 'Введите Категория Название'),
(99, 'enter_category_description', '', 'Ingrese Categoría Descripción', 'Geben Sie Kategorie Beschreibung', 'זן תיאור קטגוריה', 'أدخل الفئة الوصف', 'শ্রেণী বিবরণ লিখুন', 'Voer Categorie Omschrijving', 'श्रेणी विवरण दर्ज करें', 'Введите описание категории'),
(100, 'category_added!!', '', 'Categoría añadida !!', 'Kategorie hinzugefügt !!', 'קטגוריה נוספת !!', 'فئة أضيف !!', 'বিভাগটি জোড়া !!', 'Categorie Toegevoegd !!', 'श्रेणी जोड़ा गया !!', 'Категория Добавлено !!'),
(101, 'update_category', '', 'actualización de Categoría', 'Update Kategorie', 'קטגורית עדכון', 'تحديث الفئة', 'আপডেট শ্রেণী', 'Categorie bijwerken', 'अद्यतन श्रेणी', 'Обновление Категория'),
(102, 'update_video_category', '', 'Actualización de vídeo Categoría', 'Update Video Kategorie', 'קטגוריה עדכן סרטון', 'تحديث فيديو الفئة', 'আপডেট ভিডিও বিভাগ', 'Bijwerken Video Categorie', 'अद्यतन वीडियो श्रेणी', 'Обновление видео Категория'),
(103, 'category_updated!!', '', 'Categoría Actualizado !!', 'Kategorie aktualisiert !!', 'קטגוריה עודכנה !!', 'فئة التحديث !!', 'বিভাগ Updated !!', 'Kategorie Updated !!', 'श्रेणी अपडेट किया गया !!', 'Категория Обновлено !!'),
(104, 'choose_a_category', '', 'Elige una categoría', 'Wähle eine Kategorie', 'בחר קטגוריה', 'اختر فئة', 'একটা ক্যাটাগরি নির্বাচন করুন', 'Kies een categorie', 'कोई श्रेणी चुनें', 'Выберите категорию'),
(105, 'video_thumbnail', '', 'de vídeo en miniatura', 'Video Thumbnail', 'תמונה ממוזערת וידאו', 'الفيديو المصغرة', 'ভিডিও থাম্বনেল', 'video Thumbnail', 'वीडियो थंबनेल', 'Значок видео'),
(106, 'within_pack', '', 'dentro de Paquete', 'innerhalb Packung', 'בתוך החבילה', 'ضمن حزمة', 'প্যাক মধ্যে', 'binnen Pack', 'पैक के भीतर', 'В пакете'),
(107, 'thumbnail_2', '', 'miniatura 2', 'Thumbnail 2', 'תמונה ממוזערת 2', 'صورة مصغرة 2', 'থাম্বনেল 2', 'thumbnail 2', 'थंबनेल 2', 'Эскиз 2'),
(108, 'video_added!!', '', 'Video agregado !!', 'Video hinzugefügt !!', 'וידאו נוסף !!', 'فيديو أضيف !!', 'ভিডিও যোগ করা হয়েছে !!', 'Video toegevoegd !!', 'वीडियो जोड़ा गया !!', 'Видео добавлено !!'),
(109, 'select_video_source!!', '', 'Seleccionar fuente de video !!', 'Videoquelle wählen !!', 'בחר מקור וידאו !!', 'تحديد مصدر الفيديو !!', 'নির্বাচন করুন ভিডিও উত্স !!', 'Selecteer Video Bron !!', 'का चयन करें वीडियो स्रोत !!', 'Выберите видео источник !!'),
(110, 'select_category!!', '', '¡¡Selecciona una categoría!!', 'Kategorie wählen!!', 'בחר קטגוריה!!', 'اختر الفئة!!', 'বিভাগ নির্বাচন করুন!!', 'Selecteer categorie!!', 'श्रेणी का चयन करें!!', 'Выберите категорию!!'),
(111, 'select_video_category', '', 'Seleccione Video Categoría', 'Wählen Sie Video-Kategorie', 'קטגוריה בחר וידאו', 'حدد فئة الفيديو', 'নির্বাচন ভিডিও বিভাগ', 'Selecteer Video Categorie', 'चुनें वीडियो श्रेणी', 'Выбор видео Категории'),
(112, 'add_video_packs', '', 'Añadir paquetes de vídeo', 'In Video-Pack', 'להוסיף חבילות וידאו', 'إضافة حزم فيديو', 'ভিডিও প্যাক যুক্ত করো', 'Toevoegen Packs', 'वीडियो पैक जोड़े', 'Добавить видео пакеты'),
(113, 'video_pack_title', '', 'Video Pack Título', 'Video Pack Titel', 'כותרת חבילת וידאו', 'فيديو حزمة عنوان', 'ভিডিও প্যাক শিরোনাম', 'Video Pack Title', 'वीडियो पैक शीर्षक', 'Видео обновления Название'),
(114, 'video_pack_description', '', 'Video Pack Descripción', 'Video Pack Beschreibung', 'תיאור חבילת וידאו', 'حزمة وصف الفيديو', 'ভিডিও প্যাক বর্ণনা', 'Video Pack Beschrijving', 'वीडियो पैक विवरण', 'Видео пакет Описание'),
(115, 'premium', '', 'Prima', 'Prämie', 'פּרֶמיָה', 'علاوة', 'প্রিমিয়াম', 'Premie', 'प्रीमियम', 'премия'),
(116, 'video_pack_price', '', 'Video Pack Precio', 'Video Pack Preis', 'מחיר חבילת וידאו', 'فيديو حزمة الأسعار', 'ভিডিও প্যাক মূল্য', 'Video Pack Prijs', 'वीडियो पैक मूल्य', 'Видео пакет Цена'),
(117, 'banner', '', 'Bandera', 'Banner', 'דֶגֶל', 'راية', 'পতাকা', 'banier', 'बैनर', 'баннер'),
(118, 'video_pack_thumbnail', '', 'Video Pack miniatura', 'Video Pack Thumbnail', 'תמונה ממוזערת חבילת וידאו', 'فيديو حزمة مصغرة', 'ভিডিও প্যাক থাম্বনেল', 'Video Pack Thumbnail', 'वीडियो पैक थंबनेल', 'Видео обновления Thumbnail'),
(119, 'video_pack_banner', '', 'Video Pack Banner', 'Video Pack Banner', 'חבילת וידאו באנר', 'فيديو حزمة راية', 'ভিডিও প্যাক ব্যানার', 'Video Pack Banner', 'वीडियो पैक बैनर', 'Видео обновления Баннер'),
(120, 'data_added_successfully', '', 'Datos añadido correctamente', 'Daten erfolgreich hinzugefügt', 'נתונים נוספים בהצלחה', 'واضاف البيانات بنجاح', 'ডেটা যোগ করা হয়েছে সফলভাবে', 'Gegevens succesvol toegevoegd', 'डाटा जोड़ा गया सफलतापूर्वक', 'Данные Успешно добавлен'),
(121, 'video_pack_added_successfully', '', 'Video Pack añadido correctamente', 'Video Pack erfolgreich hinzugefügt', 'חבילת וידאו נוסף בהצלחה', 'فيديو حزمة واضاف بنجاح', 'ভিডিও প্যাক যোগ করা হয়েছে সফলভাবে', 'Video Pack succesvol toegevoegd', 'वीडियो पैक जोड़ा गया सफलतापूर्वक', 'Видео обновления Успешно добавлен'),
(122, 'video_pack_added_successfully!!', '', 'Video Pack agregado con éxito !!', 'Video Pack Erfolgreich !!', 'חבילת וידאו נוסף בהצלחה !!', 'حزمة الفيديو أضيفت بنجاح !!', 'ভিডিও প্যাক সফলভাবে যোগ করা !!', 'Video Pack succesvol toegevoegd !!', 'वीडियो पैक को सफलतापूर्वक जोड़ !!', 'Видео пакет успешно добавлен !!'),
(123, 'type', '', 'Tipo', 'Art', 'סוּג', 'اكتب', 'আদর্শ', 'Type', 'प्रकार', 'Тип'),
(124, 'pack', '', 'Paquete', 'Pack', 'חבילה', 'حزمة', 'প্যাক', 'pak', 'पैक', 'пак'),
(125, 'source', '', 'Fuente', 'Quelle', 'מָקוֹר', 'مصدر', 'উৎস', 'Bron', 'स्रोत', 'Источник'),
(126, 'video pack', '', 'Paquete de vídeo', 'Video Pack', 'חבילת וידאו', 'حزمة فيديو', 'ভিডিও প্যাক', 'video Pack', 'वीडियो पैक', 'Видео обновления'),
(127, 'add_new_video_pack', '', 'Añadir Nuevo Video Pack', 'In New Video Pack', 'הוסף וידאו חבילה', 'إضافة حزمة فيديو جديد', 'নতুন ভিডিও প্যাক যুক্ত করো', 'Voeg Nieuwe Video Pack', 'नई वीडियो पैक जोड़े', 'Добавить видео пакет'),
(128, 'price', '', 'Precio', 'Preis', 'מחיר', 'السعر', 'মূল্য', 'Prijs', 'मूल्य', 'Цена'),
(129, 'free', '', 'Gratis', 'Frei', 'חופשי', 'حر', 'বিনামূল্যে', 'Gratis', 'मुक्त', 'Свободно'),
(130, 'edit_video_pack', '', 'Edit Pack vídeo', 'Bearbeiten Video Pack', 'חבילת וידאו ערוך', 'تحرير حزمة فيديو', 'ভিডিও প্যাক সম্পাদনা', 'Video bewerken Pack', 'वीडियो पैक संपादित करें', 'Редактировать видео пакет'),
(131, 'photo', '', 'Foto', 'Foto', 'תמונה', 'صورة فوتوغرافية', 'ছবি', 'Foto', 'तस्वीर', 'Фото'),
(132, 'update_video_pack', '', 'Actualización de Video Pack', 'Update Video Pack', 'חבילת עדכן סרטון', 'تحديث حزمة فيديو', 'ভিডিও প্যাক আপডেট', 'Bijwerken Video Pack', 'वीडियो पैक अद्यतन', 'Обновление видео обновления'),
(133, 'video_pack_updated_successfully!!', '', 'Video Pack actualizado correctamente !!', 'Video Pack erfolgreich aktualisiert !!', 'חבילת וידאו עודכנה בהצלחה !!', 'حزمة الفيديو التحديث بنجاح !!', 'ভিডিও প্যাক সফলভাবে আপডেট !!', 'Video Pack Bijgewerkt succes !!', 'वीडियो पैक सफलतापूर्वक अपडेट !!', 'Видео пакет обновления успешно !!'),
(134, 'update_video', '', 'actualización de vídeo', 'Update Video', 'עדכן סרטון', 'تحديث الفيديو', 'আপডেট ভিডিও', 'update-Video', 'अद्यतन वीडियो', 'Обновление видео'),
(135, 'update_video_information', '', 'Actualizar información de vídeo', 'Update Video Information', 'מידע עדכן סרטון', 'تحديث معلومات عن الفيديو', 'আপডেট ভিডিও তথ্য', 'Update-Video-informatie', 'अद्यतन वीडियो की जानकारी', 'Обновление видеоинформации'),
(136, 'enter_video_description', '', 'Introduzca Descripción del vídeo', 'Geben Sie Video Beschreibung', 'זן תיאור וידאו', 'أدخل وصف الفيديو', 'লিখুন ভিডিও বিবরণ', 'Voer Video Beschrijving', 'दर्ज वीडियो विवरण', 'Введите видео Описание'),
(137, 'video_information_update_successfully!!', '', 'Actualización de información de vídeo con éxito !!', 'Video Information Update erfolgreich !!', 'המידע עדכן סרטון בהצלחה !!', 'فيديو معلومات التحديث بنجاح !!', 'ভিডিও তথ্য আপডেট সফলভাবে !!', 'Succesvol Video-informatie update !!', 'वीडियो की जानकारी अद्यतन सफलतापूर्वक !!', 'Информация о видео Обновление успешно !!'),
(138, 'select_video_pack', '', 'Seleccione Video Pack', 'Wählen Sie Video Pack', 'בחר חבילת וידאו', 'حدد حزمة فيديو', 'ভিডিও প্যাক নির্বাচন করুন', 'Selecteer Video Pack', 'वीडियो पैक का चयन करें', 'Выберите Video пакет'),
(139, 'within_a_pack', '', 'Dentro de un paquete', 'Innerhalb einer Packung', 'בתוך חבילה', 'ضمن حزمة', 'একটি প্যাক মধ্যে', 'Binnen Een Pack', 'एक पैक के भीतर', 'В пачке'),
(140, 'video_added_successfully!!', '', 'Vídeo añadido con éxito !!', 'Video Erfolgreich !!', 'וידאו נוסף בהצלחה !!', 'فيديو أضيف بنجاح !!', 'ভিডিও সফলভাবে যোগ করা !!', 'Video succesvol toegevoegd !!', 'वीडियो सफलतापूर्वक जोड़ा गया !!', 'Видео успешно добавлен !!'),
(141, 'video_deleted_successfully!!', '', 'El video se eliminó con éxito !!', 'Video erfolgreich gelöscht !!', 'הסרטון נמחק בהצלחה !!', 'فيديو محذوفة بنجاح !!', 'ভিডিও মোছা হয়েছে সফলভাবে !!', 'Video succesvol verwijderd !!', 'हटाए गए वीडियो सफलतापूर्वक !!', 'Видео успешно удален !!'),
(142, 'category_added_successfully!!', '', 'Categoría agregado con éxito !!', 'Kategorie Erfolgreich !!', 'קטגוריה נוספת בהצלחה !!', 'فئة أضيف بنجاح !!', 'শ্রেণী সফলভাবে যোগ করা !!', 'Categorie succesvol toegevoegd !!', 'श्रेणी सफलतापूर्वक जोड़ दिया !!', 'Категория успешно добавлен !!'),
(143, 'category_deleted!!', '', 'Categoría eliminados !!', 'Kategorie Gelöscht !!', 'קטגוריה מחוקה !!', 'الفئة المحذوفة !!', 'শ্রেণী মোছা !!', 'Categorie Verwijderde !!', 'श्रेणी हटाई गई !!', 'Категория удалена !!'),
(144, 'video_pack_deleted!!', '', 'Video Pack eliminados !!', 'Video Pack Gelöscht !!', 'נמחק חבילת וידאו !!', 'فيديو حزمة محذوفة !!', 'ভিডিও প্যাক মুছে ফেলা !!', 'Video Pack Verwijderde !!', 'वीडियो पैक नष्ट कर दिया गया !!', 'Видео обновления Исключено !!'),
(145, 'video_pack_deleted', '', 'Video Pack eliminados', 'Video Pack Deleted', 'וידאו החבילה שנמחקה', 'فيديو حزمة محذوفة', 'ভিডিও প্যাক মুছে ফেলা', 'Video Pack Deleted', 'वीडियो पैक नष्ट कर दिया गया', 'Видео обновления Исключено'),
(146, 'video_added_successfully', '', 'Video agregado con éxito', 'Video hinzugefügt Erfolgreich', 'וידאו נוסף בהצלחה', 'فيديو أضيف بنجاح', 'ভিডিও যোগ করা হয়েছে সফলভাবে', 'Video toegevoegd succesvol', 'वीडियो जोड़ा गया सफलतापूर्वक', 'Видео добавлено Успешно'),
(147, 'video_deleted_successfully', '', 'El video se eliminó con éxito', 'Video erfolgreich gelöscht', 'בהצלחה סרטון נמחק', 'فيديو محذوفة بنجاح', 'ভিডিও মোছা হয়েছে সফলভাবে', 'Video succesvol verwijderd', 'हटाए गए वीडियो सफलतापूर्वक', 'Видео успешно удалено'),
(148, 'video_pack_updated_successfully', '', 'Video Pack actualizado correctamente', 'Video Pack erfolgreich aktualisiert', 'חבילת וידאו עודכנה בהצלחה', 'حزمة الفيديو التحديث بنجاح', 'ভিডিও প্যাক সফলভাবে আপডেট', 'Video Pack Bijgewerkt succesvol', 'वीडियो पैक सफलतापूर्वक अपडेट', 'Видео пакет успешно обновлен'),
(149, 'video_information_update_successfully', '', 'Actualización de información de vídeo con éxito', 'Video Information Update erfolgreich', 'המידע עדכן סרטון בהצלחה', 'فيديو معلومات التحديث بنجاح', 'ভিডিও তথ্য আপডেট সফলভাবে', 'Video-informatie-update succesvol', 'वीडियो की जानकारी अद्यतन सफलतापूर्वक', 'Информация о видео Обновление успешно'),
(150, 'video_deleted', '', 'El video se eliminó', 'Video Deleted', 'הסרטון נמחק', 'فيديو محذوفة', 'ভিডিও মোছা হয়েছে', 'video Verwijderde', 'हटाए गए वीडियो', 'Видео Исключен'),
(151, 'language_settings', '', 'Ajustes de idioma', 'Spracheinstellungen', 'הגדרות שפה', 'اعدادات اللغة', 'ভাষা ব্যাবস্থা', 'Taal instellingen', 'भाषा सेटिंग', 'Языковые настройки'),
(152, 'manage_language', '', 'Manejo de Lenguaje', 'verwalten von Sprach', 'ניהול שפה', 'إدارة اللغة', 'ভাষা পরিচালনা', 'Beheer Taal', 'भाषा की व्यवस्था करें', 'Управление Язык'),
(153, 'language_list', '', 'lenguaje de lista', 'Sprachenliste', 'רשימת שפה', 'قائمة لغة', 'নতুন ভাষাটি তালিকায় আগে', 'taal List', 'भाषा सूची', 'Список языков'),
(154, 'add_phrase', '', 'Añadir Frase', 'In Phrase', 'הוסף מונח', 'إضافة عبارة', 'শব্দবন্ধ যোগ করুন', 'uitdrukking toe te voegen', 'वाक्यांश जोड़ें', 'Добавить фразу'),
(155, 'add_language', '', 'Agregar idioma', 'Sprache hinzufügen', 'הוספת שפה', 'إضافة اللغة', 'ভাষা যুক্ত করুন', 'Voeg Taal', 'भाषा जोड़े', 'Добавить язык'),
(156, 'language', '', 'Idioma', 'Sprache', 'שפה', 'لغة', 'ভাষা', 'Taal', 'भाषा', 'язык'),
(157, 'option', '', 'Opción', 'Option', 'אוֹפְּצִיָה', 'اختيار', 'পছন্দ', 'Keuze', 'विकल्प', 'вариант'),
(158, 'edit_phrase', '', 'Editar Frase', 'Bearbeiten Phrase', 'ביטוי ערוך', 'تحرير العبارة', 'শব্দবন্ধ সম্পাদনা', 'Phrase bewerken', 'वाक्यांश संपादित करें', 'Редактировать разговорник'),
(159, 'delete_language', '', 'eliminar idioma', 'Sprache löschen', 'מחק שפה', 'حذف اللغة', 'ভাষা মুছুন', 'Taal verwijderen', 'भाषा हटाएं', 'Удалить язык'),
(160, 'phrase', '', 'Frase', 'Phrase', 'מִשׁפָּט', 'العبارة', 'শব্দবন্ধ', 'Uitdrukking', 'मुहावरा', 'Фраза'),
(161, 'value_required', '', 'valor Obligatorio', 'Wert Erforderlich', 'ערך חובה', 'القيمة المطلوبة', 'মূল্য বা মানে দরকার', 'Value Required', 'मूल्य आवश्यक', 'Значение Требуемое'),
(162, 'update_phrase', '', 'actualización Frase', 'Update Phrase', 'ביטוי עדכון', 'تحديث العبارة', 'আপডেট শব্দবন্ধ', 'Phrase bijwerken', 'अद्यतन वाक्यांश', 'Обновление разговорник'),
(163, 'category_added_successfully', '', 'Categoría agregado con éxito', 'Kategorie Erfolgreich', 'קטגוריה נוספת בהצלחה', 'فئة أضيف بنجاح', 'শ্রেণী সফলভাবে যোগ করা', 'Categorie succesvol toegevoegd', 'श्रेणी को सफलतापूर्वक जोड़', 'Категория успешно добавлен'),
(164, 'settings_updated', '', 'Ajustes actualizan', 'Einstellungen aktualisiert', 'עודכנו הגדרות', 'إعدادات التحديث', 'সেটিংস আপডেট', 'instellingen Bijgewerkt', 'सेटिंग को अद्यतन किया गया है', 'Настройки обновлены'),
(165, 'manage_profile', '', 'administrar perfil', 'Profil verwalten', 'נהל את הפרופיל', 'إدارة الملف الشخصي', 'প্রোফাইল পরিচালনা', 'Profiel beheren', 'प्रोफाइल प्रबंधित करें', 'Управление профиля'),
(166, 'system_settings', '', 'Ajustes del sistema', 'Systemeinstellungen', 'הגדרות מערכת', 'اعدادات النظام', 'পদ্ধতি নির্ধারণ', 'Systeem instellingen', 'प्रणाली व्यवस्था', 'Настройки системы'),
(167, 'front_end_settings', '', 'Ajustes front-end', 'Front-End-Einstellungen', 'הגדרות של ממשק קצה', 'إعدادات الواجهة الأمامية', 'সামনে শেষ সেটিং', 'Front End-instellingen', 'फ़्रंट एंड सेटिंग', 'Передние Настройки Конец'),
(168, 'payment_settings', '', 'Configuración de pago', 'Zahlungseinstellungen', 'הגדרות תשלום', 'إعدادات الدفع', 'পেমেন্ট সেটিং', 'betaling Instellingen', 'भुगतान सेटिंग', 'Настройки оплаты'),
(169, 'system_name', '', 'Nombre del sistema', 'Systemname', 'שם מערכת', 'اسم النظام', 'সিস্টেম নাম', 'System Name', 'सिस्टम नाम', 'Название системы'),
(170, 'system_title', '', 'sistema de Título', 'System Titel', 'כותרת המערכת', 'عنوان النظام', 'সিস্টেম শিরোনাম', 'System Titel', 'सिस्टम शीर्षक', 'система Название'),
(171, 'system_email', '', 'sistema de correo electrónico', 'System E-Mail', 'דוא\"ל System', 'نظام البريد الإلكتروني', 'সিস্টেম ইমেইল', 'System E-mail', 'सिस्टम ईमेल', 'система электронной почты'),
(172, 'youtube_data_api_key', '', 'Youtube datos clave de API', 'Youtube Daten Api Key', 'Youtube Data מפתח Api', 'يوتيوب بيانات معهد البترول مفتاح', 'YouTube ডেটা API কী', 'Youtube Data API Key', 'YouTube डेटा API कुंजी', 'Youtube Api Key Data'),
(173, 'system_logo', '', 'logotipo del sistema', 'System Logo', 'לוגו מערכת', 'شعار النظام', 'সিস্টেম লোগো', 'System Logo', 'सिस्टम लोगो', 'система Logo'),
(174, 'upload_system_logo', '', 'Logo Sistema de carga', 'Upload-System Logo', 'לוגו מערכת Upload', 'نظام تحميل الشعار', 'আপলোড সিস্টেম লোগো', 'Upload System Logo', 'अपलोड सिस्टम लोगो', 'Загрузить логотип системы'),
(175, 'new_password', '', 'nueva contraseña', 'Neues Kennwort', 'סיסמה חדשה', 'كلمة السر الجديدة', 'নতুন পাসওয়ার্ড', 'nieuw paswoord', 'नया पासवर्ड', 'новый пароль'),
(176, 'confirm_password', '', 'Confirmar contraseña', 'Bestätige das Passwort', 'אשר סיסמה', 'تأكيد كلمة المرور', 'পাসওয়ার্ড নিশ্চিত করুন', 'bevestig wachtwoord', 'पासवर्ड की पुष्टि कीजिये', 'Подтвердите Пароль'),
(177, 'update_password', '', 'Actualiza contraseña', 'Kennwort aktualisieren', 'עדכן סיסמה', 'تطوير كلمة السر', 'আপডেট পাসওয়ার্ড', 'Wachtwoord bijwerken', 'अद्यतन पासवर्ड', 'Обновление пароля'),
(178, 'favicon', '', 'favicon', 'Favicon', 'favicon', 'فافيكون', 'ফেভিকন', 'favicon', 'फ़ेविकॉन', 'Favicon'),
(179, 'update_profile', '', 'Actualización del perfil', 'Profil aktualisieren', 'עדכן פרופיל', 'تحديث الملف', 'প্রফাইল হালনাগাদ', 'Profiel bijwerken', 'प्रोफ़ाइल अपडेट करें', 'Обновить профиль'),
(180, 'infromation_updated', '', 'Actualizado infromation', 'infromation Aktualisiert', 'אחזור מידע עודכן', 'بمجلس تحديث', 'Infromation Updated', 'infromation Bijgewerkt', 'जानकारी को अपडेट किया गया', 'Обновлено Информационное'),
(181, 'admin_image', '', 'imagen de administración', 'Admin Bild', 'תמונת Admin', 'صورة مشرف', 'এডমিন ভাবমূর্তি', 'Admin Afbeelding', 'व्यवस्थापक छवि', 'Администратор изображение'),
(182, 'password_did_not_match!!', '', '¡¡La contraseña no coincidió!!', 'Kennwort stimmen nicht überein !!', 'הסיסמאות לא תואמות !!', 'لم لا تتطابق مع كلمة المرور!!', 'পাসওয়ার্ড মেলেনি !!', 'Wachtwoord komt niet overeen !!', 'पासवर्ड मेल नहीं खाते !!', 'Пароль не совпадали !!'),
(183, 'password_updated!!', '', '¡¡Contraseña actualiza!!', 'Passwort aktualisiert!!', 'סיסמה עודכן !!', 'تم تحديث كلمة السر!!', 'পাসওয়ার্ড আপডেট করা হয়েছে !!', 'Wachtwoord bijgewerkt!!', 'पासवर्ड अपडेट किया गया!!', 'Пароль Обновлено !!'),
(184, 'old_password', '', 'Contraseña anterior', 'Altes Passwort', 'סיסמה ישנה', 'كلمة المرور القديمة', 'পুরনো পাসওয়ার্ড', 'Oud Wachtwoord', 'पुराना पासवर्ड', 'Старый пароль'),
(185, 'entered_wrong_password!!', '', 'Introducido una contraseña incorrecta !!', 'Eingetragen Kennwort falsch !!', 'סיסמה שגויה הוזן !!', 'دخلت كلمة المرور خاطئة !!', 'প্রবেশ ভুল পাসওয়ার্ড !!', 'Ingevoerde Fout wachtwoord !!', 'दर्ज की गई गलत पासवर्ड !!', 'Поступил НепрПароль !!'),
(186, 'invalid_old_password!!', '', 'Inválida Contraseña anterior !!', 'Unzulässige altes Passwort !!', 'סיסמא ישנה חוקית !!', 'صالح كلمة السر القديمة !!', 'অবৈধ পুরনো পাসওয়ার্ড !!', 'Ongeldige Oud wachtwoord !!', 'अमान्य पुराना पासवर्ड !!', 'Invalid Старый пароль !!'),
(187, 'add_payment_information', '', 'Añadir información de pago', 'In Zahlungsinformationen', 'הוספת פרטי תשלום', 'إضافة معلومات الدفع', 'পেমেন্ট তথ্য যোগ', 'Voeg Betalingsinformatie', 'भुगतान जानकारी जोड़ें', 'Добавить Информация об оплате'),
(188, 'paypal_email', '', 'paypal correo electrónico', 'Paypal E-Mail', 'דוא\"ל Paypal', 'باي بال البريد الإلكتروني', 'পেপ্যাল ​​ইমেইল', 'Paypal E-mail', 'Paypal ईमेल', 'Paypal Email'),
(189, 'stripe_publish_key', '', 'Raya Publicar clave', 'Stripe Veröffentlichen Key', 'פס פרסם מפתח', 'شريط نشر مفتاح', 'ডোরা প্রকাশ করুন কী', 'Streep publiceren Key', 'धारी प्रकाशित करें कुंजी', 'Stripe Опубликовать ключ'),
(190, 'stripe_secret_key', '', 'Raya clave secreta', 'Stripe Secret Key', 'פס צופן מפתח', 'شريط سر مفتاح', 'ডোরা গোপন কী', 'Streep Secret Key', 'धारी गोपनीय कुंजी', 'Stripe Секретный ключ'),
(191, 'stripe_publishable_key', '', 'Raya publicable clave', 'Stripe Veröffentlichbar Key', 'פס לפרסם בה מפתח', 'شريط للنشر مفتاح', 'ডোরা প্রকাশযোগ্য কী', 'Streep publiceerbare Key', 'धारी Publishable कुंजी', 'Stripe к опубликованию Key'),
(192, 'payment_information_updated', '', 'Información sobre el pago Actualizado', 'Zahlungsinformationen aktualisiert', 'פרטי תשלום מעודכנים', 'معلومات الدفع التي تم تحديثها', 'পেমেন্ট তথ্য আপডেট', 'Payment Information Bijgewerkt', 'भुगतान जानकारी को अपडेट', 'Информация об оплате Обновлено'),
(193, 'update_payment_informtaion', '', 'Actualización informtaion Pago', 'Update Zahlung informtaion', 'Informtaion תשלום עדכן', 'تحديث الدفع Informtaion', 'আপডেট পেমেন্ট Informtaion', 'Update Payment informtaion', 'अद्यतन भुगतान informtaion', 'Обновление Informtaion оплаты'),
(194, 'update_payment_information', '', 'Actualización de información de pago', 'Update Zahlungsinformationen', 'לעדכן פרטי תשלום', 'تحديث معلومات الدفع', 'আপডেট পেমেন্ট তথ্য', 'Update-Informatie van de betaling', 'अद्यतन भुगतान जानकारी', 'Обновление Информация об оплате'),
(195, 'user_interface', '', 'Interfaz de usuario', 'Benutzer interface', 'ממשק משתמש', 'واجهة المستخدم', 'ব্যবহারকারী ইন্টারফেস', 'Gebruikersomgeving', 'प्रयोक्ता इंटरफ़ेस', 'Пользовательский интерфейс'),
(196, 'change_user_interface', '', 'Cambio de interfaz de usuario', 'Ändern Benutzeroberfläche', 'ממשק משתמש שינוי', 'تغيير واجهة المستخدم', 'ইউজার ইন্টারফেস পরিবর্তন', 'Change User Interface', 'उपयोगकर्ता इंटरफ़ेस बदलें', 'Изменение интерфейса пользователя'),
(197, 'theme', '', 'Tema', 'Thema', 'נושא', 'المقدمة', 'বিষয়', 'Thema', 'विषय', 'тема'),
(198, 'user_interface_settings', '', 'Configuración de la interfaz de usuario', 'Einstellungen der Benutzeroberfläche', 'הגדרות ממשק משתמש', 'إعدادات واجهة المستخدم', 'ইউজার ইন্টারফেস সেটিং', 'User Interface Instellingen', 'उपयोगकर्ता इंटरफ़ेस सेटिंग', 'Настройки интерфейса пользователя'),
(199, 'update_user_interface', '', 'Actualización de la interfaz de usuario', 'Update Benutzeroberfläche', 'ממשק משתמש עדכן', 'تحديث واجهة المستخدم', 'আপডেট ইউজার ইন্টারফেস', 'Update User Interface', 'अद्यतन उपयोगकर्ता इंटरफ़ेस', 'Обновление интерфейса пользователя'),
(200, 'purple', '', 'Púrpura', 'Lila', 'סָגוֹל', 'أرجواني', 'রক্তবর্ণ', 'Purper', 'बैंगनी', 'Пурпурный'),
(201, 'material_green', '', 'material verde', 'Material Grün', 'חומר ירוק', 'المواد الخضراء', 'উপাদান সবুজ', 'materiaal Green', 'सामग्री ग्रीन', 'Материал Зеленый'),
(202, 'matte_blue', '', 'azul mate', 'Matt Blau', 'מט כחול', 'ماتي الأزرق', 'ম্যাট নীল', 'matte Blue', 'मैट ब्लू', 'матовый синий'),
(203, 'matte_yellow', '', 'mate amarillo', 'Matt Gelb', 'מט צהוב', 'لامع أصفر', 'ম্যাট ইয়েলো', 'matte Yellow', 'मैट पीला', 'матовый желтый'),
(204, 'matte_red', '', 'mate rojo', 'matte Red', 'מט אדום', 'ماتي الأحمر', 'ম্যাট রেড', 'matte Red', 'मैट लाल', 'матовый красный'),
(205, 'pink', '', 'Rosado', 'Rosa', 'וָרוֹד', 'زهري', 'পরাকাষ্ঠা', 'Roze', 'गुलाबी', 'розовый'),
(206, 'color_scheme', '', 'Esquema de colores', 'Farbschema', 'סכמת צבעים', 'نظام الألوان', 'বর্ণবিন্যাস', 'Kleurenschema', 'रंग प्रणाली', 'Цветовая схема'),
(207, 'material', '', 'Material', 'Material', 'חוֹמֶר', 'مواد', 'উপাদান', 'Materiaal', 'सामग्री', 'материал'),
(208, 'dark', '', 'Oscuro', 'Dunkel', 'אפל', 'داكن', 'অন্ধকার', 'Donker', 'अंधेरा', 'Темно'),
(209, 'upload_hompage_banner', '', 'Sube plata de la bandera', 'Laden Hompage Banner', 'העלה לדף באנר', 'تحميل صفحة البائع راية', 'আপলোড করুন Hompage ব্যানার', 'Upload Hompage Banner', 'अपलोड Hompage बैनर', 'Загрузить Hompage Баннер'),
(210, 'home_page_banner', '', 'Home Page Banner', 'Startseite Banner', 'דף בית באנר', 'الصفحة الرئيسية راية', 'হোম পেজ ব্যানার', 'Home pagina Banner', 'मुख पृष्ठ बैनर', 'Главная страница Banner'),
(211, 'update_homepage_video', '', 'Página de actualización de vídeo', 'Update Homepage Video', 'עדכן סרטון דף הבית', 'تحديث الصفحة فيديو', 'আপডেট মুখ্যপৃষ্ঠা ভিডিও', 'Update Homepage Video', 'अद्यतन मुख्यपृष्ठ वीडियो', 'Обновление Главного Видео'),
(212, 'update_homepage_banner', '', 'Página de actualización Banner', 'Update Homepage Banner', 'עדכון דף הבית באנר', 'تحديث الصفحة راية', 'আপডেট হোমপেজ ব্যানার', 'Update Homepage Banner', 'अद्यतन मुखपृष्ठ बैनर', 'Обновление Homepage Banner'),
(213, 'choose_a_video', '', 'Elija un video', 'Wählen Sie ein Video', 'בחר וידאו', 'اختر فيديو', 'একটি ভিডিও চয়ন করুন', 'Kies een video', 'एक वीडियो चुनें', 'Выберите видео'),
(214, 'upload_hompage_video', '', 'Sube Clasificar en vídeo', 'Laden Hompage Video', 'העלה וידאו לדף הבית', 'تحميل صفحة البائع الفيديو', 'আপলোড করুন Hompage ভিডিও', 'Upload Hompage Video', 'अपलोड Hompage वीडियो', 'Загрузить Hompage Видео'),
(215, 'home_page_video_can_not_be_empty', '', 'Portada del video no se puede vacía', 'Home Video kann nicht leer sein', 'דף בית וידאו לא יכול להיות ריק', 'الصفحة الرئيسية فيديو لا يمكن أن تكون فارغة', 'হোম পেজ ভিডিও খালি করা যাবে না', 'Home Video mag niet leeg', 'मुख पृष्ठ वीडियो खाली नहीं हो सकता', 'Главная страница Видео не может быть пустым'),
(216, 'homepage_video_can_not_be_empty', '', 'Página de video no se puede vacía', 'Homepage Video kann nicht leer sein', 'סרטון בדף הבית אינו יכול להיות ריק', 'الصفحة الرئيسية فيديو لا يمكن أن تكون فارغة', 'মুখ্যপৃষ্ঠা ভিডিও খালি করা যাবে না', 'Homepage Video mag niet leeg', 'मुख्यपृष्ठ वीडियो खाली नहीं हो सकता', 'Главные Видео не могут быть пустыми'),
(217, 'home_page_video', '', 'Página de inicio del vídeo', 'Home Video', 'וידאו דף הבית', 'الصفحة الرئيسية فيديو', 'হোম পেজ ভিডিও', 'Home Video', 'मुख पृष्ठ वीडियो', 'Главная страница Видео'),
(218, 'upload', '', 'Subir', 'Hochladen', 'Upload', 'تحميل', 'আপলোড', 'Uploaden', 'अपलोड', 'Загрузить'),
(219, 'choose_a_theme', '', 'Elegir un tema', 'Wählen Sie ein Thema', 'בחר נושא', 'اختر الموضوع', 'একটি থীম চয়ন করুন', 'Kies een thema', 'एक विषय चुनें', 'Выберите тему'),
(220, 'choose_a_color_scheme', '', 'Elija una combinación de colores', 'Wählen Sie ein Farbschema', 'לבחור צבע Scheme', 'اختر نظام الألوان', 'একটি রঙের স্কিম নির্বাচন করুন', 'Kies een kleurenschema', 'एक रंग योजना का चयन', 'Выберите цветовую схему'),
(221, 'choose_a_theme_first', '', 'Elegir un tema de primer', 'Wählen Sie ein Thema Erste', 'בחר נושא ראשון', 'اختر الموضوع أولا', 'একটি থিম প্রথম চয়ন করুন', 'Kies een Thema Eerst', 'एक विषय चुनें पहले', 'Выберите тему Первый'),
(222, 'choose_a_color_scheme_first', '', 'Elija un color Esquema Primera', 'Wählen Sie ein Farbschema Erste', 'בחר תחילה ערכת צבעים', 'اختر اللون مخطط الأولى', 'চয়ন করুন একটি রঙের স্কিম প্রথম', 'Kies een kleurenschema First', 'चुनें एक रंग योजना पहले', 'Выберите цветовую схему в первую очередь'),
(223, 'select_a_theme_first', '', 'Primero selecciona un tema', 'Wählen Sie ein Thema Erste', 'בחר רקע קודם', 'اختر موضوعا الأولى', 'একটি থিম প্রথমটি বেছে নিন', 'Selecteer een Thema Eerste', 'एक विषय का चयन करें सबसे पहले', 'Выберите тему Первый'),
(224, 'select_a_color_scheme_first', '', 'Seleccione un esquema de color Primera', 'Wählen Sie ein Farbschema Erste', 'בחר כתלמיד ערכת צבעים', 'حدد لون مخطط الأولى', 'নির্বাচন করুন একটি রঙের স্কিম প্রথম', 'Selecteer een kleurenschema First', 'का चयन एक रंग योजना पहले', 'Выберите цветовую схему в первую очередь'),
(225, 'user_interface_updated', '', 'Interfaz de usuario actualizada', 'Benutzeroberfläche aktualisiert', 'ממשק משתמש מעודכן', 'واجهة المستخدم التحديث', 'ইউজার ইন্টারফেস আপডেট করা হয়েছে', 'User Interface Bijgewerkt', 'उपयोगकर्ता इंटरफ़ेस अपडेट किया गया', 'Пользовательский интерфейс Обновлено'),
(226, 'homepage_banner_updated', '', 'Página de inicio Banner Actualizado', 'Homepage Banner Aktualisiert', 'עודכן דף הבית באנר', 'الصفحة الرئيسية راية التحديث', 'হোম পেজ ব্যানার Updated', 'Homepage Banner Bijgewerkt', 'मुखपृष्ठ बैनर अपडेट किया गया', 'Главный Баннер Обновлено'),
(227, 'homepage_video_updated', '', 'Página de inicio Video Actualizado', 'Homepage Video Aktualisiert', 'עודכן סרטון בדף הבית', 'الصفحة الرئيسية فيديو updated', 'হোম পেজ ভিডিও আপডেট', 'Homepage Video Bijgewerkt', 'मुख्यपृष्ठ वीडियो अपडेट किया गया', 'Главные Видео Обновлено'),
(228, 'we_recommend_you_to_upload_1920_X_1080_size_photo', '', 'Te recomendamos Sube 1920 x 1080 Tamaño foto', 'Wir empfehlen Sie 1920 zum Hochladen X 1080 Größe Photo', 'אנו ממליצים לך להעלות 1920 X 1080 תמונת גודל', 'ونحن ننصح لتحميل 1920 X 1080 الحجم صور', 'আমরা আপনাকে সুপারিশ আপলোড করার জন্য 1920 X 1080 আকারের ফটো', 'Wij raden u aan Upload 1920 X 1080 grootte Foto', 'हम आप सिफारिश अपलोड करने के लिए 1920 X 1080 आकार फोटो', 'Мы рекомендуем Вам добавить 1920 X 1080 Размер фото'),
(229, 'we_recommend_you_to_upload_1920_X_1080_size_photo_for_better_user_experience', '', 'Te recomendamos Sube 1920 x 1080 Tamaño de fotos para una mejor experiencia de usuario', 'Wir empfehlen Ihnen, 1920 X 1080 Größe Foto für bessere Benutzererfahrung hochladen', 'אנו ממליצים לך להעלות 1920 X 1080 תמונת גודל חווית משתמש טובה יותר', 'ونحن ننصح لتحميل 1920 X 1080 الحجم صور للحصول على أفضل تجربة المستخدم', 'আমরা আপনাকে সুপারিশ আপলোড করার জন্য ভাল ব্যবহারকারীর অভিজ্ঞতা জন্য 1920 X 1080 আকারের ফটো', 'Wij raden u aan Upload 1920 X 1080 grootte Foto Voor betere gebruikerservaring', 'हम आप सिफारिश अपलोड करने के लिए बेहतर उपयोगकर्ता अनुभव 1920 X 1080 आकार फोटो', 'Мы рекомендуем Вам добавить 1920 X 1080 Размер фото для лучшего пользовательского опыта'),
(230, 'we_recommend_you_to_upload_1920_X_1080_(_16_:_9_)_size_photo_for_better_user_experience', '', 'Te recomendamos Sube 1920 x 1080 (16: 9) Tamaño de fotos para una mejor experiencia de usuario', 'Wir empfehlen Sie 1920 zum Hochladen von X 1080 (16: 9) Größe Foto für eine bessere User Experience', 'אנו ממליצים לך להעלות 1920 X 1080 (16: 9) תמונת גודל חווית משתמש טובה יותר', 'ونحن ننصح لتحميل 1920 X 1080 (16: 9) حجم الصورة للحصول على أفضل تجربة المستخدم', 'আমরা আপনাকে সুপারিশ আপলোড করার জন্য 1920 X 1080 (16: 9) ভাল ব্যবহারকারীর অভিজ্ঞতা জন্য আকারের ফটো', 'Wij raden u aan Upload 1920 X 1080 (16: 9) grootte Foto voor een betere gebruikerservaring', 'हम आप सिफारिश अपलोड करने के लिए 1920 X 1080 (16: 9) बेहतर उपयोगकर्ता अनुभव आकार फोटो', 'Мы рекомендуем Вам добавить 1920 X 1080 (16: 9) Размер фото для лучшего пользовательского опыта'),
(231, 'we_recommend_you_to_upload_1920_X_1080_p_(_16_:_9_)_size_photo_for_better_user_experience', '', 'Te recomendamos Sube 1920 x P 1080 (16: 9) Tamaño de fotos para una mejor experiencia de usuario', 'Wir empfehlen Sie 1920 zum Hochladen von X 1080 P (16: 9) Größe Foto für eine bessere User Experience', 'אנו ממליצים לך להעלות 1920 X 1080 P (16: 9) גודל תמונה עבור חוויית משתמש טובה יותר', 'ونحن ننصح لتحميل 1920 X 1080 P (16: 9) حجم صور لأفضل تجربة المستخدم', 'আমরা আপনাকে সুপারিশ আপলোড করার জন্য 1920 X 1080 পি (16: 9) ভাল ব্যবহারকারীর অভিজ্ঞতা জন্য আকারের ফটো', 'Wij raden u aan 1920 X 1080 P (16: 9) uploaden grootte Foto Voor betere gebruikerservaring', 'हम आप सिफारिश अपलोड करने के लिए 1920 X 1080 पी (16: 9) बेहतर उपयोगकर्ता अनुभव आकार फोटो', 'Мы рекомендуем Вам добавить 1920 X 1080 P (16: 9) Размер фото для лучшего пользовательского опыта'),
(232, 'we_recommend_you_to_upload_1920_X_1080_pixel_(_16_:_9_)_resolution_photo_for_better_user_experience', '', 'Te recomendamos Sube 1920 x 1080 píxeles (16: 9) Resolución de la foto para una mejor experiencia de usuario', 'Wir empfehlen Sie 1920 zum Hochladen x 1080 Pixel (16: 9) Auflösung Foto für eine bessere User Experience', 'אנו ממליצים לך להעלות 1920 X 1080 פיקסל (16: 9) תמונת רזולוציה עבור חוויית משתמש טובה יותר', 'ونحن ننصح لتحميل 1920 X 1080 بكسل (16: 9) القرار صور للحصول على أفضل تجربة المستخدم', 'আমরা আপনাকে সুপারিশ আপলোড করার জন্য 1920 X 1080 পিক্সেল (16: 9) ভাল ব্যবহারকারীর অভিজ্ঞতা জন্য রেজোলিউশন ছবি', 'Wij raden u aan 1920 X 1080 Pixel\'s (16: 9) Resolutie Foto Voor betere gebruikerservaring', 'हम आप सिफारिश अपलोड करने के लिए 1920 X 1080 पिक्सेल (16: 9) बेहतर उपयोगकर्ता अनुभव संकल्प फोटो', 'Мы рекомендуем Вам добавить 1920 X 1080 пикселей (16: 9) Разрешение фото Для лучшего пользовательского опыта'),
(233, 'system_currency', '', 'moneda del sistema', 'Waehrung', 'מטבע מערכת', 'العملات النظام', 'সিস্টেম মুদ্রা', 'System Currency', 'सिस्टम मुद्रा', 'валютная система'),
(234, 'we_prefer_1920_X_1080_pixel_(_16_:_9_)_resolution_photo', '', 'Preferimos 1920 x 1080 píxeles (16: 9) Resolución de la foto', 'Wir bevorzugen 1920 X 1080 Pixel (16: 9) Auflösung Foto', 'אנחנו מעדיפים 1920 X 1080 פיקסל (16: 9) תמונה ברזולוציה', 'نحن نفضل 1920 X 1080 بكسل (16: 9) القرار صور', 'আমরা পছন্দ 1920 X 1080 পিক্সেল (16: 9) রেজোলিউশন ছবি', 'Wij verkiezen 1920 X 1080 Pixel (16: 9) Resolutie Photo', 'हम पसंद करते हैं 1920 X 1080 पिक्सेल (16: 9) संकल्प फोटो', 'Мы предпочитаем 1920 X 1080 пикселей (16: 9) Разрешение фото'),
(235, 'video_details', '', 'Detalles de vídeo', 'Video Details', 'פרטי וידאו', 'تفاصيل الفيديو', 'ভিডিও বিবরণ', 'video Details', 'वीडियो का विवरण', 'Сведения о видео'),
(236, 'video_information_updated_successfully', '', 'Información del vídeo actualizado correctamente', 'Video Informationen erfolgreich aktualisiert', 'מידע וידאו עודכן בהצלחה', 'معلومات عن الفيديو التحديث بنجاح', 'ভিডিও তথ্য সফলভাবে আপডেট', 'Video-informatie update succesvol', 'वीडियो की जानकारी सफलतापूर्वक अपडेट', 'Информация о видео успешно обновлен'),
(237, 'published_on_', '', 'Publicado en ', 'Veröffentlicht auf ', 'פורסם ב ', 'نشرت في ', 'প্রকাশিত ', 'Gepubliceerd op ', 'पर प्रकाशित ', 'Опубликован в '),
(238, 'show_description', '', 'Mostrar descripcion', 'Beschreibung anzeigen', 'תיאור צג', 'مشاهدة الوصف', 'দেখান বর্ণনা', 'Laat beschrijving zien', 'विवरण दिखाएं', 'Покажите описание'),
(239, 'search_here...', '', 'Busca aquí...', 'Suche hier...', 'חפש כאן ...', 'ابحث هنا...', 'এখানে অনুসন্ধান করুন...', 'Zoek hier...', 'यहाँ ढूँढे...', 'Поищи здесь...'),
(240, 'no_video_found', '', 'No hay vídeo encontrado', 'Kein Video gefunden', 'לא נמצא קטע וידאו', 'لا توجد الفيديو', 'কোনো ভিডিও পাওয়া', 'Geen video gevonden', 'कोई वीडियो नहीं मिला', 'Нет видео Найдено'),
(241, 'add_video_in_this_pack', '', 'Añadir vídeo de este paquete', 'Add Video in diesem Paket', 'הוסף וידאו במארז הזה', 'إضافة فيديو في هذا حزمة', 'এই প্যাকে ভিডিও জুড়ুন', 'Toevoegen in deze verpakking', 'इस पैक में वीडियो जोड़ें', 'Добавить видео в этом пакете'),
(242, 'add_video_in_this_category', '', 'Añadir vídeo en esta categoría', 'Add Video in dieser Kategorie', 'הוסף וידאו בקטגוריה זו', 'أضف الفيديو في هذا القسم', 'এই বিষয়শ্রেণীতে অন্তর্ভুক্ত ভিডিও জুড়ুন', 'Toevoegen In deze categorie', 'इस श्रेणी में वीडियो जोड़ें', 'Добавить видео в этой категории'),
(243, 'views', '', 'Puntos de vista', 'Ansichten', 'צפיות', 'الآراء', 'দেখেছে', 'Uitzichten', 'दृश्य', 'Просмотры'),
(244, 'likes', '', 'Gustos', 'Likes', 'סימוני \'', 'الإعجابات', 'পছন্দ', 'sympathieën', 'को यह पसंद है', 'Нравится'),
(245, 'rate', '', 'Tarifa', 'Preis', 'ציון', 'معدل', 'হার', 'tarief', 'मूल्यांकन करें', 'Ставка'),
(246, 'catrgory', '', 'catrgory', 'Catrgory', 'Catrgory', 'Catrgory', 'Catrgory', 'Catrgory', 'Catrgory', 'Catrgory'),
(247, 'thumbnail_preview', '', 'Vista previa en miniatura', 'Thumbnail-Vorschau', 'תמונה מקדימה', 'معاينة الصورة المصغرة', 'থাম্বনেল পূর্বরূপ', 'miniatuurvoorbeeld', 'थंबनेल पूर्वावलोकन', 'Просмотр миниатюр'),
(248, 'watch', '', 'Reloj', 'Uhr', 'שעון', 'راقب', 'ঘড়ি', 'Kijk maar', 'घड़ी', 'Смотреть'),
(249, 'previous', '', 'Anterior', 'Bisherige', 'קודם', 'سابق', 'আগে', 'voorgaand', 'पिछला', 'предыдущий'),
(250, 'next', '', 'Siguiente', 'Nächster', 'הַבָּא', 'التالى', 'পরবর্তী', 'volgende', 'आगामी', 'следующий');
INSERT INTO `language` (`phrase_id`, `phrase`, `English`, `Spanish`, `German`, `Hebrew`, `Arabic`, `Bengali`, `Dutch`, `Hindi`, `Russian`) VALUES
(251, 'theme_settings', '', 'Ajustes de tema', 'Themen Einstellungen', 'הגדרות נושא', 'إعدادات موضوع', 'থিম সেটিংস', 'Thema instellingen', 'विषय सेटिंग', 'Настройки темы'),
(252, 'material_blue', '', 'azul material', 'Material Blau', 'כחול חומר', 'المواد الأزرق', 'উপাদান ব্লু', 'materiaal Blue', 'सामग्री ब्लू', 'Материал Синий'),
(253, 'material_yellow', '', 'amarillo material', 'Material Gelb', 'צהוב חומר', 'مادة صفراء', 'উপাদান ইয়েলো', 'materiaal Geel', 'सामग्री पीला', 'Материал Yellow'),
(254, 'material_red', '', 'rojo material', 'Material Red', 'Red חומר', 'المواد الأحمر', 'উপাদান লোহিত', 'materiaal Red', 'सामग्री लाल', 'Материал Красный'),
(255, 'just_arrived', '', 'Acaba de llegar', 'Gerade angekommen', 'רק הגיע', 'وصل للتو', 'মাত্র পোঁছালাম', 'Net aangekomen', 'अभी - अभी आएं हैं', 'Только что прибыл'),
(256, 'by', '', 'Por', 'Durch', 'על ידי', 'بواسطة', 'দ্বারা', 'Door', 'द्वारा', 'От'),
(257, 'what_people_are_watching', '', 'Lo que la gente está viendo', 'Was Menschen beobachten', 'מה אנשים צופים', 'ما الناس يشاهدون', 'কি মানুষ দেখছেন', 'Wat mensen kijken', 'क्या लोग देख रहे हैं', 'Что люди смотрят'),
(258, 'worth_every_penny', '', 'Vale cada centavo', 'Jeden Cent wert', 'שווה כל אגורה', 'يستحق كل بنس', 'ওয়ার্থ প্রতি টাকা', 'Elke cent waard', 'पैसा वसूल', 'Стоит каждого пенни'),
(259, 'published_on', '', 'Publicado en', 'Veröffentlicht auf', 'פורסם ב', 'نشرت في', 'প্রকাশিত', 'Gepubliceerd op', 'पर प्रकाशित', 'Опубликован в'),
(260, 'single_video', '', 'sencillo de vídeo', 'Einzel Video', 'וידאו אחד', 'فيديو واحد', 'একক ভিডিও', 'Single Video', 'एकल वीडियो', 'Одно видео'),
(261, 'password_updated', '', 'Contraseña actualiza', 'Passwort aktualisiert', 'עודכנה סיסמא', 'تم تحديث كلمة السر', 'পাসওয়ার্ড আপডেট করা হয়েছে', 'Wachtwoord bijgewerkt', 'पासवर्ड अपडेट किया गया', 'Пароль Обновлено'),
(262, 'wrong_password', '', 'Contraseña incorrecta', 'Falsches Passwort', 'סיסמה שגויה', 'كلمة مرور خاطئة', 'ভুল গুপ্তশব্দ', 'Verkeerd wachtwoord', 'गलत पासवर्ड', 'Неправильный пароль'),
(263, 'user_created', '', 'Creado por el usuario', 'Benutzer erstellt', 'נוצר משתמש', 'العضو مكون', 'ব্যবহারকারী তৈরি', 'gebruiker Gemaakt', 'उपयोगकर्ता द्वारा निर्मित', 'Пользователь создал'),
(264, 'category_banner', '', 'Categoría Banner', 'Kategorie Banner', 'קטגוריה באנר', 'الفئة راية', 'বিভাগ ব্যানার', 'categorie Banner', 'श्रेणी बैनर', 'Категория Баннер'),
(265, 'profile_picture', '', 'Foto de perfil', 'Profilbild', 'תמונת פרופיל', 'الصوره الشخصيه', 'প্রোফাইল ছবি', 'Profielfoto', 'प्रोफ़ाइल फोटो', 'Изображение профиля'),
(266, 'success_message', '', 'Mensaje de éxito', 'Erfolgsmeldung', 'הודעת הצלחה', 'نجاح رسالة', 'সাফল্য পাঠান', 'succes Message', 'सफलता संदेश', 'Успех сообщения'),
(267, 'Password Updated', '', 'Contraseña actualiza', 'Passwort aktualisiert', 'עודכנה סיסמא', 'تم تحديث كلمة السر', 'পাসওয়ার্ড আপডেট করা হয়েছে', 'Wachtwoord bijgewerkt', 'पासवर्ड अपडेट किया गया', 'Пароль Обновлено'),
(268, 'user_information_has_updated', '', 'Información sobre el usuario ha actualizado', 'Benutzerinformation aktualisiert', 'מידע משתמש עדכן', 'معلومات المستخدم بتحديث', 'ব্যবহারকারীর তথ্য আপডেট করেছে', 'Gebruikersinformatie Bijgewerkt', 'उपयोगकर्ता जानकारी अपडेट कर दी', 'Информация о пользователе обновила'),
(269, 'User Information Has Updated', '', 'Información sobre el usuario ha actualizado', 'Benutzerinformation aktualisiert', 'מידע משתמש עדכן', 'معلومات المستخدم بتحديث', 'ব্যবহারকারীর তথ্য আপডেট করেছে', 'Gebruikersinformatie Bijgewerkt', 'उपयोगकर्ता जानकारी अपडेट कर दी', 'Информация о пользователе обновила'),
(270, 'user_information_updated', '', 'Información del usuario Actualizado', 'Benutzerinformationen aktualisiert', 'מידע משתמש מעודכן', 'معلومات المستخدم التحديث', 'ব্যবহারকারীর তথ্য আপডেট করা হয়েছে', 'User Information Bijgewerkt', 'उपयोगकर्ता जानकारी अपडेट किया गया', 'Информация о пользователе Обновлено'),
(271, 'User Information Updated', '', 'Información del usuario Actualizado', 'Benutzerinformationen aktualisiert', 'מידע משתמש מעודכן', 'معلومات المستخدم التحديث', 'ব্যবহারকারীর তথ্য আপডেট করা হয়েছে', 'User Information Bijgewerkt', 'उपयोगकर्ता जानकारी अपडेट किया गया', 'Информация о пользователе Обновлено'),
(272, 'you_entered_wrong_password', '', 'Usted introducido una contraseña incorrecta', 'Eingetragen Sie Kennwort falsch', 'הזנת את סיסמא שגויה', 'لقد أدخلت كلمة المرور خاطئة', 'আপনি ভুল পাসওয়ার্ড লিখেছেন', 'U hebt ingevoerd Fout wachtwoord', 'आपने गलत पासवर्ड डाला', 'Вы ввели неверный пароль'),
(273, 'You Entered Wrong Password', '', 'Usted introducido una contraseña incorrecta', 'Eingetragen Sie Kennwort falsch', 'הזנת את סיסמא שגויה', 'لقد أدخلت كلمة المرور خاطئة', 'আপনি ভুল পাসওয়ার্ড লিখেছেন', 'U hebt ingevoerd Fout wachtwoord', 'आपने गलत पासवर्ड डाला', 'Вы ввели неверный пароль'),
(274, 'success:', '', 'Éxito:', 'Erfolg:', 'הַצלָחָה:', 'نجاح:', 'সাফল্য:', 'Succes:', 'सफलता:', 'Успех:'),
(275, 'User Created', '', 'Creado por el usuario', 'Benutzer erstellt', 'נוצר משתמש', 'العضو مكون', 'ব্যবহারকারী তৈরি', 'gebruiker Gemaakt', 'उपयोगकर्ता द्वारा निर्मित', 'Пользователь создал'),
(276, 'this_email_id_is_not_available', '', 'Este ID de correo electrónico no está disponible', 'Diese E-Mail-ID ist nicht verfügbar', 'זיהוי דוא\"ל זו אינו זמין', 'هذا رقم البريد الإلكتروني غير متوفر', 'এই ইমেইল আইডি পাওয়া যাচ্ছে না', 'Deze E-mail ID is niet beschikbaar', 'इस ईमेल आईडी उपलब्ध नहीं है', 'Это Id Email не доступен'),
(277, 'error:', '', 'Error:', 'Fehler:', 'שְׁגִיאָה:', 'خطأ:', 'ত্রুটি:', 'Fout:', 'त्रुटि:', 'Ошибка:'),
(278, 'This Email Id Is Not Available', '', 'Este ID de correo electrónico no está disponible', 'Diese E-Mail-ID ist nicht verfügbar', 'זיהוי דוא\"ל זו אינו זמין', 'هذا رقم البريد الإلكتروني غير متوفر', 'এই ইমেইল আইডি পাওয়া যাচ্ছে না', 'Deze E-mail ID is niet beschikbaar', 'इस ईमेल आईडी उपलब्ध नहीं है', 'Это Id Email не доступен'),
(279, 'comments', '', 'comentarios', 'Bemerkungen', 'תגובות', 'تعليقات', 'মন্তব্য', 'Comments', 'टिप्पणियाँ', 'Комментарии'),
(280, 'user_credential_didnt_match', '', 'Credencial de usuario Didnt Partido', 'User-Credential Didnt Spiel', 'אישורים משתמשים התאמת הברית לא', 'العضو الاعتماد ديدنت المباراة', 'ব্যবহারকারী প্রমাণপত্রাদি Didnt ম্যাচ', 'Gebruiker Credential Didnt Match', 'उपयोगकर्ता क्रेडेंशियल फ्लॉप मैच', 'Пользователь Credential Didnt Match'),
(281, 'User Credential Didnt Match', '', 'Credencial de usuario Didnt Partido', 'User-Credential Didnt Spiel', 'אישורים משתמשים התאמת הברית לא', 'العضو الاعتماد ديدنت المباراة', 'ব্যবহারকারী প্রমাণপত্রাদি Didnt ম্যাচ', 'Gebruiker Credential Didnt Match', 'उपयोगकर्ता क्रेडेंशियल फ्लॉप मैच', 'Пользователь Credential Didnt Match'),
(282, 'post_a_public_comment', '', 'Publicar un comentario público', 'Schreibe ein öffentliches Kommentar', 'לפרסם תגובה ציבורית', 'أضف تعليق العام', 'পোস্ট পাবলিক মন্তব্য', 'Plaats A Public Comment', 'पोस्ट एक सार्वजनिक टिप्पणी', 'Сообщение общественных комментариев'),
(283, 'login_first', '', 'Inicie sesión primero', 'Zuerst anmelden', 'כניסה ראשית', 'سجل الدخول أولا', 'লগইন প্রথম', 'Log eerst in', 'पहले प्रवेश करो', 'Войти Первый'),
(284, 'Login First', '', 'Inicie sesión primero', 'Zuerst anmelden', 'כניסה ראשית', 'سجل الدخول أولا', 'লগইন প্রথম', 'Log eerst in', 'पहले प्रवेश करो', 'Войти Первый'),
(285, 'no_videos_found', '', 'No se encontraron vídeos', 'Keine Videos gefunden', 'לא נמצאו סרטונים', 'لا توجد فيديوهات', 'কোন ভিডিও পাওয়া যায়নি', 'Geen video\'s gevonden', 'कोई वीडियो नहीं मिले', 'Видео не найдено'),
(286, 'for_more_information', '', 'Para más información', 'Für mehr Informationen', 'למידע נוסף', 'للمزيد من المعلومات', 'আরও তথ্যের জন্য', 'Voor meer informatie', 'अधिक जानकारी के लिए', 'Чтобы получить больше информации'),
(287, 'help', '', 'Ayuda', 'Hilfe', 'עֶזרָה', 'مساعدة', 'সাহায্য করুন', 'Helpen', 'मदद', 'Помогите'),
(288, 'fro_more_information', '', 'Fro Más información', 'Fro Weitere Informationen', 'מכאן לשם מידע נוסף', 'جيئة وذهابا مزيد من المعلومات', 'আরও তথ্য ইতস্তত', 'Fro Meer informatie', 'अधिक जानकारी इधर-उधर', 'Фро Дополнительной информации'),
(289, 'upload_admin_image', '', 'Subir imagen de administración', 'Hochladen von Admin Bild', 'תמונת Admin Upload', 'تحميل الادارية صورة', 'আপলোড এডমিন ভাবমূর্তি', 'Upload Admin Afbeelding', 'अपलोड व्यवस्थापक छवि', 'Загрузить Администратор Image'),
(290, 'welcome_back', '', 'Dar una buena acogida', 'Willkommen zurück', 'ברוך שובך', 'مرحبا بعودتك', 'ফিরে আসার জন্য স্বাগতম', 'Welkom terug', 'वापसी पर स्वागत है', 'Добро пожаловать назад'),
(291, 'Welcome Back', '', 'Dar una buena acogida', 'Willkommen zurück', 'ברוך שובך', 'مرحبا بعودتك', 'ফিরে আসার জন্য স্বাগতম', 'Welkom terug', 'वापसी पर स्वागत है', 'Добро пожаловать назад'),
(292, 'buy_first_for_better_experience', '', 'En primer lugar comprar para una mejor experiencia', 'Kaufen Erste For Better Experience', 'קנה קודם לקבלת חווית משתמש משופרת', 'شراء الأولى لتجربة أفضل', 'আরো ভালো অভিজ্ঞতা প্রথম কিনুন', 'Koop First For Better Experience', 'बेहतर अनुभव के लिए सबसे पहले खरीदें', 'Купить Первый Для лучшего опыта'),
(293, 'Buy First For Better Experience', '', 'En primer lugar comprar para una mejor experiencia', 'Kaufen Erste For Better Experience', 'קנה קודם לקבלת חווית משתמש משופרת', 'شراء الأولى لتجربة أفضل', 'আরো ভালো অভিজ্ঞতা প্রথম কিনুন', 'Koop First For Better Experience', 'बेहतर अनुभव के लिए सबसे पहले खरीदें', 'Купить Первый Для лучшего опыта'),
(294, 'dislikes', '', 'No le gusta', 'Dislikes', 'לא אוהב', 'يكره', 'অপছন্দ', 'Houdt niet van', 'नापसंद', 'Не нравится'),
(295, 'video', '', 'Vídeo', 'Video', 'וִידֵאוֹ', 'فيديو', 'ভিডিও', 'Video', 'वीडियो', 'видео'),
(296, 'card_number', '', 'Número de tarjeta', 'Kartennummer', 'מספר כרטיס', 'رقم البطاقة', 'কার্ড নম্বর', 'Kaartnummer', 'कार्ड नंबर', 'Номер карты'),
(297, 'c_v_c', '', 'CVC', 'CVC', 'CVC', 'CVC', 'সিভিসি', 'CVC', 'सीवीसी', 'CVC'),
(298, 'done', '', 'Hecho', 'Erledigt', 'בוצע', 'فعله', 'সম্পন্ন', 'Gedaan', 'किया हुआ', 'Готово'),
(299, 'choose_payment_system', '', 'Elija Sistema de Pagos', 'Wählen Sie Zahlungssystem', 'בחר מערכת תשלום', 'اختيار نظام الدفع', 'পেমেন্ট সিস্টেম নির্বাচন করুন', 'Kies Payment System', 'भुगतान प्रणाली चुनें', 'Выберите платежную систему'),
(300, 'enjoy', '', 'Disfrutar', 'Genießen', 'להנות', 'استمتع', 'উপভোগ করুন', 'Genieten', 'का आनंद लें', 'наслаждаться'),
(301, 'login_for_more', '', 'Entrada para obtener más', 'Login für weitere', 'התחברות נוספת', 'تسجيل الدخول للمزيد', 'আরো জানার জন্য লগইন করুন', 'Login voor meer', 'अधिक के लिए लॉगिन', 'Вход в систему Для Подробнее'),
(302, 'enjoy_more', '', 'disfrutar Más', 'genießen Mehr', 'תהנה יותר', 'استمتع أكثر', 'আরো উপভোগ করুন', 'Geniet van Meer', 'अधिक आनंद लें', 'Наслаждайтесь Подробнее'),
(303, 'watch_more', '', 'ver más', 'Sehen Sie mehr', 'הצג עוד', 'مشاهدة أكثر', 'আরও অনেক কিছু দেখুন', 'Bekijk Meer', 'अधिक देखें', 'Смотреть больше'),
(304, 'most_recent_videos', '', 'Videos más recientes', 'Neueste Videos', 'הקלטות חדשות', 'معظم فيديو آخر', 'সর্বাধিক সাম্প্রতিক ভিডিও', 'Meest recente video\'s', 'सबसे हाल ही में वीडियो', 'Большинство Последние видео'),
(305, 'most_watched_videos', '', 'La mayoría de los videos vistos', 'Meistgesehene Videos', 'הסרטונים הנצפים ביותר', 'معظم مشاهدة لقطات الفيديو', 'সবচেয়ে বেশি দেখা ভিডিও', 'Meest bekeken video\'s', 'सर्वाधिक देखे गए वीडियो', 'Самое популярное видео'),
(306, 'most_viewed_videos', '', 'Vídeos más vistos', 'Am meisten angesehene Videos', 'הסרטונים הנצפים ביותר', 'الفيديوهات الأكثر مشاهدة', 'সর্বাধিক দেখা ভিডিও', 'Meest bekeken video\'s', 'सर्वाधिक देखे गए वीडियो', 'Самые популярные видео'),
(307, 'payment_info', '', 'Información de pago', 'Zahlungsinformationen', 'פרטי התשלום', 'معلومات الدفع', 'পেমেন্ট তথ্য', 'Betaling informatie', 'भुगतान की जानकारी', 'Платежная информация'),
(308, 'payment_information', '', 'Información del pago', 'Zahlungsinformationen', 'פרטי תשלום', 'معلومات الدفع', 'পেমেন্ট তথ্য', 'betalingsinformatie', 'भुगतान की जानकारी', 'Платежная информация'),
(309, 'payment_section', '', 'Sección pago', 'Zahlung Abschnitt', 'קטע תשלום', 'القسم الدفع', 'পেমেন্ট অনুচ্ছেদ', 'betaling Sectie', 'भुगतान धारा', 'Раздел оплаты'),
(310, 'buyer\'s_name', '', 'Nombre del comprador', 'Name des Käufers', 'שם הקונה', 'اسم المشتري', 'ক্রেতা নাম', 'Naam van de koper', 'क्रेता का नाम', 'Имя покупателя'),
(311, 'date', '', 'Fecha', 'Datum', 'תַאֲרִיך', 'تاريخ', 'তারিখ', 'Datum', 'तारीख', 'Дата'),
(312, 'payment', '', 'Pago', 'Zahlung', 'תַשְׁלוּם', 'دفع', 'পারিশ্রমিক', 'Betaling', 'भुगतान', 'Оплата'),
(313, 'buyer_name', '', 'Nombre del comprador', 'Käufername', 'שם הקונה', 'اسم المشتري', 'ক্রেতা নাম', 'koper Naam', 'खरीदार का नाम', 'Покупатель Имя'),
(314, 'buyer', '', 'Comprador', 'Käufer', 'קוֹנֶה', 'مشتر', 'ক্রেতা', 'Koper', 'क्रेता', 'Покупатель'),
(315, 'payment_success', '', 'pago exitoso', 'Zahlungserfolg', 'הצלחת תשלום', 'الدفع الناجح', 'পেমেন্ট সাফল্য', 'betaling Succes', 'भुगतान की सफलता', 'Оплата успеха'),
(316, 'Payment Success', '', 'pago exitoso', 'Zahlungserfolg', 'הצלחת תשלום', 'الدفع الناجح', 'পেমেন্ট সাফল্য', 'betaling Succes', 'भुगतान की सफलता', 'Оплата успеха'),
(317, 'all_videos', '', 'Todos los videos', 'Alle Videos', 'וידאו כל', 'جميع مقاطع الفيديو', 'সকল ভিডিও', 'alle video\'s', 'सभी वीडियो', 'Все видео'),
(318, 'your_payment_was_successful.', '', 'Su pago se realizó correctamente.', 'Ihre Zahlung erfolgreich war.', 'התשלום בוצע בהצלחה.', 'الدفع الخاص بك ناجحة.', 'তোমার পেমেন্ট সফল হয়েছে।', 'Uw betaling was succesvol.', 'आपका भुगतान सफल हुआ।', 'Ваш платеж успешно.'),
(319, 'Your Payment Was Successful.', '', 'Su pago se realizó correctamente.', 'Ihre Zahlung erfolgreich war.', 'התשלום בוצע בהצלחה.', 'الدفع الخاص بك ناجحة.', 'তোমার পেমেন্ট সফল হয়েছে।', 'Uw betaling was succesvol.', 'आपका भुगतान सफल हुआ।', 'Ваш платеж успешно.'),
(320, 'filter', '', 'Filtrar', 'Filter', 'לְסַנֵן', 'منقي', 'ছাঁকনি', 'Filter', 'फ़िल्टर', 'Фильтр'),
(321, 'stripe', '', 'Raya', 'Streifen', 'פס', 'شريط', 'ডোরা', 'Streep', 'पट्टी', 'нашивка'),
(322, 'total', '', 'Total', 'Gesamt', 'סה\"כ', 'مجموع', 'মোট', 'Totaal', 'कुल', 'Всего'),
(323, 'payment_method', '', 'Método de pago', 'Bezahlverfahren', 'אמצעי תשלום', 'طريقة الدفع او السداد', 'মূল্যপরিশোধ পদ্ধতি', 'Betalingsmiddel', 'भुगतान का तरीका', 'Способ оплаты'),
(324, 'how_to_get_youTube_API_key', '', 'Cómo conseguir YouTube clave de API', 'Wie YouTube API Schlüssel erhalten', 'איך להפוך את YouTube API Key', '<font><font class=\"\">كيفية الحصول على يوتيوب API مفتاح', 'কিভাবে ইউটিউব এপিআই কী পেতে', 'How To Get YouTube API Key', 'कैसे यूट्यूब एपीआई कुंजी प्राप्त करने के लिए', 'Как получить YouTube API ключ'),
(325, 'phrase_list', '', 'Lista frase', 'Phrasenliste', 'רשימת ביטויים', 'قائمة العبارة', 'শব্দবন্ধ তালিকা', 'Phrase List', 'वाक्यांश सूची', 'Список фраз'),
(326, 'spanish', '', 'Español', 'Spanisch', 'ספרדית', 'الأسبانية', 'স্পেনীয়', 'Spaans', 'स्पेनिश', 'испанский'),
(327, 'spanish', '', 'Español', 'Spanisch', 'ספרדית', 'الأسبانية', 'স্পেনীয়', 'Spaans', 'स्पेनिश', 'испанский'),
(328, 'text_align', '', 'Texto alineado', 'Textausrichtung', 'יישור טקסט', 'محاذاة النص', 'পাঠ্যের সারিবদ্ধতা', 'tekst uitlijnen', 'पाठ संरेखित', 'Выравнивание текста'),
(329, 'some_form_submission_has_been_disabled_for_demo', '', '', NULL, NULL, NULL, NULL, NULL, '', NULL),
(330, 'payment_details', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 'payment_code', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 'number_of_videos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'buyer_phone', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 'buyer_email', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 'user_image', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 'doctor', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 'patient', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 'premium_videos', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 'weekely_purchases', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 'frontend', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 'no_video_pack_found', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `video_pack_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `buyer_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'VidPlanet Premium Video CMS'),
(2, 'system_title', 'Premium Video CMS'),
(3, 'system_email', 'admin@example.com'),
(4, 'language', 'English'),
(5, 'paypal_email', 'admin@paypal.com'),
(6, 'text_align', 'left-to-right'),
(7, 'frontend_theme', 'material'),
(8, 'youtube_data_api_key', 'AIzaSyB5E0xCNX-NXphxyvfiyyIRE4DpD81xDo0'),
(9, 'theme_color_scheme', 'danger'),
(10, 'logo', 'logo.jpg'),
(11, 'favicon', 'favicon.png'),
(12, 'home_page_video_code', '23bc414c'),
(13, 'stripe_publishable_key', 'pk_test_fb4aK48KB8cFPl6tsf6Chw9G'),
(14, 'stripe_secret_key', 'sk_test_A0pIFwgXyv2YnJUWLmnnhNMV'),
(15, 'system_currency_id', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `liked_video_ids` longtext COLLATE utf8_unicode_ci NOT NULL,
  `disliked_video_ids` longtext COLLATE utf8_unicode_ci NOT NULL,
  `favorite_video_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `purchased_video_pack_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` text COLLATE utf8_unicode_ci NOT NULL,
  `authentication_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `source` int(11) NOT NULL DEFAULT '1' COMMENT '1-youtube,2-videoFile',
  `video_file_url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `favourites` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `age_rating` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL DEFAULT '0' COMMENT '0 (no), 1 (yes)',
  `uploader` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `within_a_pack` int(11) NOT NULL COMMENT '0(no) 1(yes)',
  `video_pack_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_pack`
--

DROP TABLE IF EXISTS `video_pack`;
CREATE TABLE `video_pack` (
  `video_pack_id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `video_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `premium` int(11) NOT NULL COMMENT '0 (no), 1 (yes)',
  `price` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `favourites` int(11) NOT NULL,
  `featured` int(11) NOT NULL COMMENT '0 (no), 1 (yes)',
  `date_added` text COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `video_pack`
--
ALTER TABLE `video_pack`
  ADD PRIMARY KEY (`video_pack_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_pack`
--
ALTER TABLE `video_pack`
  MODIFY `video_pack_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
