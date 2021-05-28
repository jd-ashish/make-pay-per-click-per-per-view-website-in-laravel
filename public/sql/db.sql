-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 09:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptc_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `max_show` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `type_data` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `amount`, `duration`, `max_show`, `status`, `type`, `type_data`, `views`, `created_at`, `updated_at`) VALUES
(4, 'Redmi 8A Dual (Sea Blue, 2GB RAM, 32GB Storage) – Dual Cameras & 5,000 mAH Battery', 100, 56, 200, 'on', '2', '1618243422.png', 2, '2021-04-12 05:08:38', '2021-04-12 10:50:46'),
(5, 'code list', 100, 5, 200, 'on', '3', '<!-- Start of shorte.st banner code -->\r\n<a href=\"http://join-shortest.com/ref/6e2b0dc19c\"><img src=\"https://static.shorte.st/bundles/smeuser/img/referral_banners/350x19.png?2020-02-19.0\" title=\"Share your links and earn real money\" width=\"350\" height=\"19\" />#ref-menu</a>\r\n<!-- End of shorte.st banner code -->', 6, '2021-04-12 09:41:04', '2021-04-12 09:41:04'),
(6, 'MegaVideo', 50, 5, 150, 'on', '2', '1618244493.jpg', 10, '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(7, 'fast get speed', 10, 2, 10, 'on', '1', 'http://gestyy.com/ewfGsE', 3, '2021-04-13 22:40:15', '2021-04-13 22:40:15'),
(8, 'cloudesstore', 1, 3, 50, 'on', '1', 'http://gestyy.com/ewVbPV', 2, '2021-04-13 22:41:34', '2021-04-13 22:41:34'),
(9, 'host buy', 5, 5, 100, 'on', '1', 'http://gestyy.com/ewfGsE', 4, '2021-04-13 22:43:54', '2021-04-13 22:43:54'),
(10, 'motu patlu', 20, 700, 200, 'on', '1', 'https://www.youtube.com/watch?v=9jN-FUvx3hg', 1, '2021-04-17 05:37:21', '2021-04-17 05:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE `clicks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `subjects` text NOT NULL,
  `sms` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subjects`, `sms`, `status`, `view`, `created_at`, `updated_at`) VALUES
(1, 'ShawnLet', 'ahmedkirillov5@gmail.com', '81178681748', '歷史', '<a href=http://zrenieblog.ru/>Detail</a>:  <a href=http://zrenieblog.ru/>http://zrenieblog.ru/</a>  http://zrenieblog.ru/ <a href=\"http://zrenieblog.ru/\">http://zrenieblog.ru/</a> \r\n歷史 \r\n六七千年前的先民就開始釣魚。周文王曾和兒子們在靈沼釣魚取樂。戰國時范蠡也愛釣魚，常把所釣之魚供給越王勾踐食用。 二十世紀八十年代，中國大陸的各級釣魚協會成立，釣魚地點也從自然水域向養殖水域過度，所釣之魚則從粗養向細養過度。人數增多、水體污染及濫捕濫撈導致釣魚難度上升。釣魚協會開始與漁民和農民簽訂文件，使更多釣者能夠在養殖水域釣魚，達到了雙贏的目的。 二十世紀九十年代初，來自台灣的懸釣法走紅大陸，各地開始建造標準釣池。 二十世紀末，發達國家的釣者提倡回顧自然，引發新一輪野釣戰，而中國的釣者則更青睞精養魚池。<>] \r\n \r\n工具 \r\n \r\n一种钓鱼竿机械部分示意图 \r\n最基本的钓具包括：鱼竿、鱼线、鱼钩、沉坨（又名沉子）、浮标（又名鱼漂）、鱼饵。<>]:1其他辅助钓具包括：失手绳、钓箱、线轮、抄网、鱼篓、渔具盒、钓鱼服、钓鱼鞋等。<>]:1 \r\n \r\n钓竿一般由玻璃纖維或碳纖維轻而有力的竿状物质製成，钓竿和鱼饵用丝线联接。一般的鱼饵可以是蚯蚓、米饭、蝦子、菜叶、苍蝇、蛆等，现代有专门制作好（多数由自己配置的半成品）的粉製鱼饵出售。鱼饵挂在鱼鉤上，不同的對象鱼有不同的釣組配置。在周围水面撒一些誘餌通常会有較好的集魚效果。 \r\n \r\n钓具 \r\n鱼竿 \r\n主条目：鱼竿 \r\n钓鱼的鱼竿按照材质包括：传统竹竿、玻璃纤维竿、碳素竿，按照钓法包括：手竿、矶竿、海竿（又名甩竿），按照所钓鱼类包括：溪流小继竿、日鲫竿（又名河内竿）、鲤竿、矶中小物竿。<>]:6-8 \r\n \r\n鱼钩 \r\n主条目：鱼钩 \r\n鱼钩就是垂钓用的钩，主要分为：有倒钩、无倒钩、毛钩。<>]:14 \r\n \r\n鱼线 \r\n主条目：鱼线 \r\n鱼线就是垂钓时绑接鱼竿和鱼钩的线，历史上曾使用蚕丝（远古日本）、发丝（江户时期日本）、马尾（西欧）、二枚贝（地中海）、蛛网丝（夏威夷）、琼麻（东南亚）、尼龙钓线（美国）。<>]:25 \r\n \r\n鱼漂 \r\n主条目：鱼漂 \r\n鱼漂又名浮标，垂钓时栓在鱼线上的能漂浮的东西，主要用于搜集水底情报，查看鱼汛，观察鱼饵存留状态，以及水底水流起伏变化。<>]:36 \r\n \r\n鱼饵 \r\n主条目：鱼饵 \r\n鱼饵分为诱饵和钓饵，是一种用来吸引鱼群和垂钓时使用的物品，钓饵分为荤饵、素饵、拟饵、拉饵。<>]:170 \r\n \r\n沉子 \r\n主条目：沉子 \r\n沉子又名沉坨、铅锤，是一种调节鱼漂的工具。<>]:45 \r\n \r\n卷线器 \r\n主条目：卷线器 \r\n卷线器主要安装在海竿和矶竿上的一种卷线的工具。<>]:63 \r\n \r\n连结具 \r\n主条目：连结具 \r\n连结具是连结鱼线与钓竿、母线与子线的一种连结物，使用最广泛的是连结环。<>]:55 \r\n \r\n识鱼 \r\n鱼类的视力不如人类，距离、宽度均无法和人类的视力比较，鱼类对水色、绿色比较敏感，鱼类的嗅觉非常灵敏，鱼类的听觉也非常灵敏，钓鲤鱼时，不能在岸上大声谈笑、走动不停，鱼类的思考能力非常弱，鱼类应对周边环境随着气象、水温、水色、潮流、流速、水量的变化而变化，于是便出现了在同一个池塘、水库、湖泊，往日钓鱼收获大，今日少，上午收获大，下午少，晴天大，雨天少等情况。<>]:114-117淡水钓鱼，中国大陆经常垂钓的鱼类对象是本地鲫鱼、日本鲫、非洲鲫、鲤鱼、游鱼、罗非鱼、黄刺鱼（黄鸭叫）、黄尾、鳊鱼、青鱼、草鱼、鲢鱼、鳙鱼，台湾经常垂钓的鱼类对象是本地鲫鱼、日本鲫、吴郭鱼（罗非鱼）、溪哥仔和红猫（粗首马口鱲）、斗鱼、罗汉鱼、苦花、三角姑（河鮠）、竹蒿头（密鱼）。<>]:117 \r\n \r\n影响鱼类的6大因素主要是：季节变更、气温高低、水的涨落、风的大小、水的清浊、天气阴晴', 1, 0, '2020-12-27 23:13:31', '2020-12-27 23:13:31'),
(2, 'Susana Prendiville', 'maniyarbangles.com@maniyarbangles.com', '484-975-9120', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Jan 02, 2021\r\n\r\n\r\nWe have actually not received a payment from you.\r\nWe have actually tried to email you yet were incapable to contact you.\r\n\r\n\r\nCheck Out: https://cutt.ly/NjiAZIV\r\n\r\nFor details and also to process a discretionary settlement for your domain website solutions.\r\n\r\n\r\n\r\n\r\n010220211008003753688578798maniyarbangles.com', 1, 0, '2021-01-02 20:38:10', '2021-01-02 20:38:10'),
(3, 'Eric Jones', 'ericjonesonline@outlook.com', '555-555-1212', 'Your site – more leads?', 'Hey, this is Eric and I ran across maniyarbangles.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-01-02 23:34:16', '2021-01-02 23:34:16'),
(4, 'Mike Stevenson', 'see-email-in-message@monkeydigital.co', '81446367647', 'Increase sales for maniyarbangles.com', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your maniyarbangles.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your maniyarbangles.com to have a 50+ points in Moz DA with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Stevenson\r\n \r\nsupport@monkeydigital.co', 1, 0, '2021-01-07 14:53:56', '2021-01-07 14:53:56'),
(5, 'Contactneaxy', 'no-replyblexy@gmail.com', '87748648572', 'Mailing via the feedback form.', 'Gооd dаy!  maniyarbangles.com \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd mеssаgе whоlly lеgаlly? \r\nWе suggеsting а nеw uniquе wаy оf sеnding соmmеrсiаl оffеr thrоugh соntасt fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh mеssаgеs аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соmmuniсаtiоn Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis mеssаgе is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  live:feedbackform2019 \r\nWhatsApp - +375259112693', 1, 0, '2021-01-08 16:34:33', '2021-01-08 16:34:33'),
(6, 'Eric Jones', 'ericjonesonline@outlook.com', '555-555-1212', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found maniyarbangles.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-01-10 14:30:00', '2021-01-10 14:30:00'),
(7, 'Mike Clifford', 'no-replyfew@gmail.com', '82616531688', 'Local SEO for more business', 'Greetings \r\n \r\nI have just took a look on your SEO for  maniyarbangles.com for the Local ranking keywords and seen that your website could use an upgrade. \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart enhancing your local visibility with us, today! \r\n \r\nregards \r\nMike Clifford\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', 1, 0, '2021-01-17 03:00:15', '2021-01-17 03:00:15'),
(8, 'Alice Jamar', 'alice@stardatagroup.com', 'NA', 'StarDataGroup.com Shutting Down', 'It is with sad regret to inform you StarDataGroup.com is shutting down.\r\nIt has been a tough year all round and we decided to go out with a bang!\r\n\r\nAny group of databases listed below is $49 or $149 for all 16 databases in this one time offer.\r\nYou can purchase it at www.StarDataGroup.com and view samples.\r\n\r\n- LinkedIn Database\r\n 43,535,433 LinkedIn Records\r\n\r\n- USA B2B Companies Database\r\n 28,147,835 Companies\r\n\r\n- Forex\r\n Forex South Africa 113,550 Forex Traders\r\n Forex Australia 135,696 Forex Traders\r\n Forex UK 779,674 Forex Traders\r\n\r\n- UK Companies Database\r\n 521,303 Companies\r\n\r\n- German Databases\r\n German Companies Database: 2,209,191 Companies\r\n German Executives Database: 985,048 Executives\r\n\r\n- Australian Companies Database\r\n 1,806,596 Companies\r\n\r\n- UAE Companies Database\r\n 950,652 Companies\r\n\r\n- Affiliate Marketers Database\r\n 494,909 records\r\n\r\n- South African Databases\r\n B2B Companies Database: 1,462,227 Companies\r\n Directors Database: 758,834 Directors\r\n Healthcare Database: 376,599 Medical Professionals\r\n Wholesalers Database: 106,932 Wholesalers\r\n Real Estate Agent Database: 257,980 Estate Agents\r\n Forex South Africa: 113,550 Forex Traders\r\n\r\nVisit www.stardatagroup.com or contact us with any queries.\r\n\r\nKind Regards,\r\nStarDataGroup.com', 1, 0, '2021-01-19 10:08:18', '2021-01-19 10:08:18'),
(9, 'Eric Jones', 'ericjonesonline@outlook.com', '555-555-1212', 'Your site – more leads?', 'Hey, this is Eric and I ran across maniyarbangles.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-01-20 12:05:37', '2021-01-20 12:05:37'),
(10, 'Barbara Atyson', 'barbaratysonhw@yahoo.com', '027 375 36 98', 'Explainer Videos for maniyarbangles.com', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service which we feel can benefit your site maniyarbangles.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=oYoUQjxvhA0\r\nhttps://www.youtube.com/watch?v=MOnhn77TgDE\r\nhttps://www.youtube.com/watch?v=NKY4a3hvmUc\r\n\r\nAll of our videos are in a similar animated format as the above examples and we have voice over artists with US/UK/Australian accents.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video such as Youtube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\n0-1 minutes = $189\r\n1-2 minutes = $279\r\n2-3 minutes = $389\r\n3-4 minutes = $489\r\n\r\n*All prices above are in USD and include a custom video, full script and a voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to get in touch.\r\nIf you are not interested, simply delete this message and we won\'t contact you again.\r\n\r\nKind Regards,\r\nBarbara', 1, 0, '2021-01-23 03:25:06', '2021-01-23 03:25:06'),
(11, 'Aaron Whiticks', 'aaron.whiticks36@gmail.com', '85145472682', 'Hey, saw your website...', 'Hey there, I stumbled on your site maniyarbangles.com yesterday and I really like the design (I\'ve been making sites for a long time). Are you currently using WordPress? \r\n \r\nQUESTION, have you considered launching or growing an eCommerce business this year? With more people shopping online than ever before, it\'s the time to kick things off. \r\n \r\nI have been interested in eCommerce for a while, and after seeing your site, I wanted to share a couple things I recently learned about to make a profitable eCommerce store with little effort. \r\n \r\nHere are 2 resources you simply can\'t miss if you want to cash in on eCommerce this year: \r\n \r\n \r\n1. https://www.BigCommerce.com and https://www.Shopify.com - Both of these eCom platforms have been revolutionary in helping new shop owners set up their shop. I use them myself right now. \r\n \r\n2. https://www.WebGeek.io/ecommerce - This outlines a new 2021 eCommerce strategy, that helps you quickly set up a profitable eCommerce shop, with a site built for you and even finds winning products. \r\n \r\n \r\nAnyway, best of luck on your site! Hope some of this info helps you out, \r\n \r\nAaron', 1, 0, '2021-01-23 12:31:17', '2021-01-23 12:31:17'),
(12, 'Mike Bradshaw', 'no-reply@google.com', '89157571761', 'whitehat monthly SEO plans', 'Howdy \r\n \r\nI have just checked  maniyarbangles.com for the ranking keywords and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Bradshaw\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', 1, 0, '2021-01-23 19:49:41', '2021-01-23 19:49:41'),
(13, 'Eric Jones', 'ericjonesonline@outlook.com', '555-555-1212', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found maniyarbangles.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-01-25 06:36:56', '2021-01-25 06:36:56'),
(14, 'Dann', 'info@maniyarbangles.com', '478 2342', 'Admin maniyarbangles.com', 'You Won\'t Want To Miss This!  50 pcs medical surgical masks only $1.99 and N95 Mask $1.79 each.  \r\n\r\nSpecial Offer for the next 48 Hours ONLY!  Get yours here: pharmacyusa.online\r\n\r\nThanks and Best Regards,\r\n\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-01-31 00:24:01', '2021-01-31 00:24:01'),
(15, 'James Lambert', 'jlam73000@gmail.com', '84192167823', 'Partnership', 'Good day \r\n \r\nI`m seeking a reputable company/individual to partner with in a manner that would benefit both parties. The project is worth $24 Million so if interested, kindly contact me through this email jameslambert@lambert-james.com for clarification. \r\n \r\nI await your response. \r\n \r\nThanks, \r\n \r\nJames Lambert', 1, 0, '2021-02-01 10:55:33', '2021-02-01 10:55:33'),
(16, 'Ilse Hampton', 'ilse@sendbulkmails.com', 'NA', 'SendBulkMails.com', 'Use SendBulkMails.com to run email campaigns from your own private dashboard.\r\n\r\nCold emails are allowed and won\'t get you blocked :)\r\n\r\nStarter Package 50% off sale\r\n- 1Mil emails / mo @ $99 USD\r\n- Dedicated IP and Domain Included\r\n- Detailed statistical reports (delivery, bounce, clicks etc.)\r\n- Quick and easy setup with extended support at no extra cost.\r\n- Cancel anytime!\r\n\r\nRegards,\r\nwww.SendBulkMails.com', 1, 0, '2021-02-02 14:44:19', '2021-02-02 14:44:19'),
(17, 'Hollis Nation', 'hollis@stardatagroup.com', 'NA', 'StarDataGroup.com 7 February', 'It is with sad regret to inform you StarDataGroup.com is shutting down.\r\n\r\nFire sale till the 7th of Feb.\r\n\r\nAny group of databases listed below is $49 or $149 for all 16 databases in this one time offer.\r\nYou can purchase it at www.StarDataGroup.com and view samples.\r\n\r\n- LinkedIn Database\r\n 43,535,433 LinkedIn Records\r\n\r\n- USA B2B Companies Database\r\n 28,147,835 Companies\r\n\r\n- Forex\r\n Forex South Africa 113,550 Forex Traders\r\n Forex Australia 135,696 Forex Traders\r\n Forex UK 779,674 Forex Traders\r\n\r\n- UK Companies Database\r\n 521,303 Companies\r\n\r\n- German Databases\r\n German Companies Database: 2,209,191 Companies\r\n German Executives Database: 985,048 Executives\r\n\r\n- Australian Companies Database\r\n 1,806,596 Companies\r\n\r\n- UAE Companies Database\r\n 950,652 Companies\r\n\r\n- Affiliate Marketers Database\r\n 494,909 records\r\n\r\n- South African Databases\r\n B2B Companies Database: 1,462,227 Companies\r\n Directors Database: 758,834 Directors\r\n Healthcare Database: 376,599 Medical Professionals\r\n Wholesalers Database: 106,932 Wholesalers\r\n Real Estate Agent Database: 257,980 Estate Agents\r\n Forex South Africa: 113,550 Forex Traders\r\n\r\nVisit www.stardatagroup.com or contact us with any queries.\r\n\r\nKind Regards,\r\nStarDataGroup.com', 1, 0, '2021-02-04 00:45:30', '2021-02-04 00:45:30'),
(18, 'Javier Jomez', 'awardnotification2021@gmail.com', '82847542793', 'WINNING  NOTIFICATION.', 'LA PRIMITIVA  LOTTERY AWARD, MADRID SPAIN \r\nYour Reference: No: FU/578629K \r\nCongratulations! Your E-mail address has won With winning lucky number No:3 26 31 35 46 49, The results for the Internet users were released. \r\nThis E-mail lottery was sponsored by International software organization, Your e-mail address was attached to the lucky number  that was how your E-mail won the lump sum amount. \r\nPlease contact your claims agent/legal office: Pedro Jose, to being your claims call:Tel:+34 672 520 003 and Fax:+34 91 272 50 79 \r\nEmail: Awardnotificatios1721@gmx.com,  Email: winingnotifications2021@gmail.com. \r\nYours Sincerely. \r\nDr. Don Javier Jomez \r\nReply To This Email: Awardnotificatios1721@gmx.com \r\nReply To This Email: winingnotifications2021@gmail.com \r\nPhone: +34 672 520 000 \r\nPresident  International Relations Department.', 1, 0, '2021-02-04 06:05:13', '2021-02-04 06:05:13'),
(19, 'Samantha Milan', 'samantha.milan@chatservicedirect.com', '313-446-8922', 'Live chat on your website', 'Hi there,\r\n\r\nI\'m looking to get in contact with someone in marketing or support and hope your website is a good place to start. My name is Samantha, and I help companies install/change live chat software on their websites.\r\n\r\nIf your company has considered adding or changing chat software providers on maniyarbangles.com, we do live webinars each week to demo our product and encourage anyone to attend a 30 minute session. Our product comes with a 30 day money-back guarantee, so you can truly experiment and see if it improves sales/support interactions with your visitors.\r\n\r\nPlease let me know if you would like more information and I\'d be happy to share.\r\n\r\nSamantha Milan\r\nChat Service Division, Tyipe LLC\r\n500 Westover Drive, #15391\r\nSanford, NC 27330\r\n\r\nNot interested? You can opt out your website here http://esendroute.com/remove?q=maniyarbangles.com&i=14', 1, 0, '2021-02-05 03:30:54', '2021-02-05 03:30:54'),
(20, 'Mike Keat', 'see-email-in-message@monkeydigital.co', '85381298762', 'Increase sales for maniyarbangles.com', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your maniyarbangles.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your maniyarbangles.com to have a 50+ points in Moz DA with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Keat\r\n \r\nsupport@monkeydigital.co', 1, 0, '2021-02-05 11:31:31', '2021-02-05 11:31:31'),
(21, 'Denis', 'info@maniyarbangles.com', '69 641 57 62', 'Best Offer For maniyarbangles.com', 'You Won\'t Want To Miss This!  50 pcs medical surgical masks only $1.99 and N95 Mask $1.79 each.  \r\n\r\nOnly 10 orders left!  Get yours here: pharmacyusa.online\r\n\r\nEnjoy,\r\n\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-02-06 22:54:36', '2021-02-06 22:54:36'),
(22, 'BrianCot', 'eevgenyy86@gmail.com', '82428931631', 'TOP CARS IN USA', 'Please check our car store: http://benedict-auto.com/', 1, 0, '2021-02-07 16:10:28', '2021-02-07 16:10:28'),
(23, 'Eric Jones', 'ericjonesonline@outlook.com', '555-555-1212', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found maniyarbangles.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://www.talkwithcustomer.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://www.talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-02-08 18:39:18', '2021-02-08 18:39:18'),
(24, 'David Song', 'noreply@googlemail.com', '85913521171', 'PROJECT FUNDING', 'Hello, \r\nOur Investors wishes to invest in your company by offering debt financing in any viable Project presented by your Management,Kindly send your Business Project Presentation Plan Asap. \r\n \r\ndavidsong2030@gmail.com \r\n \r\nRegards, \r\nMr.David Song', 1, 0, '2021-02-13 02:03:58', '2021-02-13 02:03:58'),
(25, 'Mike Edwards', 'no-replyfew@gmail.com', '86279818113', 'Local SEO for more business', 'Hello \r\n \r\nI have just analyzed  maniyarbangles.com for its Local SEO ranks and seen that your website could use an upgrade. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart increasing your local visibility with us, today! \r\n \r\nregards \r\nMike Edwards\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', 1, 0, '2021-02-13 17:48:44', '2021-02-13 17:48:44'),
(26, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - maniyarbangles.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across maniyarbangles.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-02-15 07:27:39', '2021-02-15 07:27:39'),
(27, 'Williamrix', 'artofnegotiations@theonlinepublishers.com', '89761641997', 'How negotiations work! A must read book', 'LISTENEVERYHOW – How Negotiations Work, is an easy-to-read book and pragmatic approach to get the best results from a negotiation. It is adaptable in content and style – as a story book for leisure readers, life skills manual for entrepreneurs and professionals, or even as a business school handbook. \r\n \r\nThis book is written with clarity and easy eloquence of a man who knows what he is talking about, telling captivating stories in well sequenced chapters that all end with enticing nuggets. A rudiment skill in negotiation is listening and the major themes of this book are reflective of the insights that make the difference in negotiations. \r\n \r\nYou are one click away from having this excellent book for just $5.99 https://www.amazon.com/dp/B08W5DMQV3/ref=cm_sw_r_cp_awdb_t1_6E8T8CE1VW6P49PPQF8F_nodl', 1, 0, '2021-02-16 02:21:37', '2021-02-16 02:21:37'),
(28, 'Mike Williams', 'no-reply@google.com', '87973867369', 'affordable monthly SEO plans', 'Hello \r\n \r\nI have just verified your SEO on  maniyarbangles.com for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Williams\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', 1, 0, '2021-02-16 05:20:49', '2021-02-16 05:20:49'),
(29, 'Vito Jager', 'vito@sendbulkmails.com', 'NA', 'Cold Email Campaigns', 'Use SendBulkMails.com to run email campaigns from your own private dashboard.\r\n\r\nCold emails are allowed and won\'t get you blocked :)\r\n\r\n- 1Mil emails / mo @ $99 USD\r\n- Dedicated IP and Domain Included\r\n- Detailed statistical reports (delivery, bounce, clicks etc.)\r\n- Quick and easy setup with extended support at no extra cost.\r\n- Cancel anytime!\r\n\r\nRegards,\r\nwww.SendBulkMails.com', 1, 0, '2021-02-16 10:00:38', '2021-02-16 10:00:38'),
(30, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website maniyarbangles.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at maniyarbangles.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://talkwithcustomer.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-02-17 01:52:03', '2021-02-17 01:52:03'),
(31, 'Marietta Gracia', 'gracia.marietta94@msn.com', '03733 90 48 73', 'Problem', 'Greetings maniyarbangles.com,\r\nI hope this email finds you well, I’m writing this email to brief you about the perks of using our product for neck pain named as NeckBc.\r\nSince health is the most important thing in our life and being healthy should be a part of our overall life style. But most of the people today are so busy with their work that they do not have time to look after their health. Sometimes working in front of computer can lead to neck pain and that is why we came up with the product that will help you through pain relief in a very convenient way.\r\nWe have always considered customer satisfaction as our first priority and due to this attribute, we have got many positive reviews from our valuable clients from diverse business backgrounds. So do not miss out because we are offering 50% off on our product see it here: neckbc.com .\r\nWhen such an amazing product is available to you, I’m sure none of you would want to refrain from buying it. \r\nLooking forward to serve you with the most effective Product for your neck pain relief.', 1, 0, '2021-02-19 17:29:36', '2021-02-19 17:29:36'),
(32, 'MR HO CHOI', 'andrewyoung4545@gmail.com', '81484865193', 'INVESTMENT PORTFOLIO', 'Greetings, I have been tasked with identifying, initiating and possibly developing a business partnership with you / your company. I checked recommendation sites, corporate social networking sites, interviewed a few list investors and made a list of potential partners that identified you and your business. I visited your website and saw your products. I have to say that I am very impressed with the quality of your products. Therefore, we would like your company to ship large quantities of your product to our country for commercial use. Please contact me for more information on our requirements / orders and shipping deadlines. Best regards. HO CHOI email ..... hchoi382@gmail.com', 1, 0, '2021-02-20 20:23:17', '2021-02-20 20:23:17'),
(33, 'Peter Anaya', 'maniyarbangles.com@maniyarbangles.com', '079 3210 3603', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Feb 21, 2021\r\n\r\n\r\nWe have not gotten a settlement from you.\r\nWe have actually tried to contact you yet were incapable to contact you.\r\n\r\n\r\nSee: https://cutt.ly/Gld8C6k\r\n\r\nFor information as well as to process a discretionary settlement for your domain website solutions.\r\n\r\n\r\n\r\n\r\n022120211532223753688578798maniyarbangles.com', 1, 0, '2021-02-22 02:02:28', '2021-02-22 02:02:28'),
(34, 'Sherri Warner', 'maniyarbangles.com@maniyarbangles.com', '079 6876 2705', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Feb 22, 2021\r\n\r\n\r\nWe have not gotten a payment from you.\r\nWe\'ve attempted to call you however were unable to contact you.\r\n\r\n\r\nVisit: https://cutt.ly/vlfHJJF\r\n\r\nFor info as well as to process a discretionary settlement for your domain website service.\r\n\r\n\r\n\r\n\r\n022220210431513753688578798maniyarbangles.com', 1, 0, '2021-02-22 16:22:04', '2021-02-22 16:22:04'),
(35, 'Verna Debenham', 'maniyarbangles.com@maniyarbangles.com', '09172 27 83 43', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Feb 22, 2021\r\n\r\n\r\nWe have actually not obtained a settlement from you.\r\nWe have actually attempted to email you however were incapable to contact you.\r\n\r\n\r\nCheck Out: https://cutt.ly/7lhtzkg\r\n\r\nFor info and also to process a discretionary payment for your domain website services.\r\n\r\n\r\n\r\n\r\n022220210747543753688578798maniyarbangles.com', 1, 0, '2021-02-22 19:45:01', '2021-02-22 19:45:01'),
(36, 'Dino', 'info@maniyarbangles.com', '(03) 5377 3038', 'Best Offer For maniyarbangles.com', 'You Won\'t Want To Miss This!  \r\n\r\nBuy N95 Mask only $1.69 each and get 10 pcs of medical surgical masks for FREE.  \r\n\r\nLimited Time Offer! + Fast Shipping!  Get yours here: pharmacyusa.online\r\n\r\nTo your success,\r\n\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-02-23 00:41:05', '2021-02-23 00:41:05'),
(37, 'Eder Holguin', 'ederholguin1@gmail.com', '86963289225', '70% of companies either have a digital transformation strategy in place or are working on one.', 'My name is Eder Holguin, Digital Transformation expert and author of Dreaming of Hope Street. I help companies increase sales, generate leads and increase market share by leveraging digital marketing. The platform I built combines often siloed technologies in performance marketing, influencer marketing, and programmatic advertising into a single interface. We are seeing great success with online brands by running 3 types of programs: \r\n \r\n- Lead Gen campaigns to build custom databases of potential buyers at a low cost \r\n- Free Trials or app downloads that turn into long-term clients \r\n- Subscription programs that increase recurring revenue for your brand. \r\n \r\nI would love to catch up and discuss how we can help provide value and increase sales on a performance basis for your clients. \r\n \r\nContact info \r\nLinkedIn https://www.linkedin.com/in/ederholguin/ \r\nWebsite: http://ederholguin.com/ \r\nMy book: https://dreamingofhopestreet.com/', 1, 0, '2021-02-23 14:55:07', '2021-02-23 14:55:07'),
(38, 'Juan Skuthorp', 'juan@stardatagroup.com', 'NA', 'Question?', 'Do you need more clients? \r\n\r\nWe have amazing databases starting at $9.99 until the end of the Month!\r\n\r\nVisit us at StarDataGroup.com', 1, 0, '2021-02-24 02:19:05', '2021-02-24 02:19:05'),
(39, 'Chad Meeson', 'maniyarbangles.com@maniyarbangles.com', '062 230 27 44', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Feb 24, 2021\r\n\r\n\r\nWe have not obtained a payment from you.\r\nWe have actually tried to call you however were unable to contact you.\r\n\r\n\r\nSee: https://bit.ly/3srw1m2\r\n\r\nFor details as well as to process a discretionary settlement for your domain website service.\r\n\r\n\r\n\r\n\r\n022420211005283753688578798maniyarbangles.com', 1, 0, '2021-02-24 22:20:37', '2021-02-24 22:20:37'),
(40, 'SendBulkMails.com', 'antwan@sendbulkmails.com', 'NA', 'Clients? We got you covered. SendBulkMails.com', 'SendBulkMails.com allows you to reach out to clients via cold email marketing.\r\n\r\n- 1Mil emails starter package\r\n- Dedicated IP and Domain Included\r\n\r\n- Detailed statistical reports (delivery, bounce, clicks etc.)\r\n\r\n- Quick and easy setup with extended support at no extra cost.\r\n\r\n- Cancel anytime!\r\n\r\nSendBulkMails.com', 1, 0, '2021-02-26 09:10:30', '2021-02-26 09:10:30'),
(41, 'Audrea', 'info@maniyarbangles.com', '0499 32 65 14', 'Concerning maniyarbangles.com', 'You Won\'t Want To Miss This!  \r\n\r\nBuy N95 Mask only $1.69 each and get 10 pcs of medical surgical masks for FREE.  \r\n\r\nLimited Time Offer! + Fast Shipping!  Get yours here: pharmacyusa.online\r\n\r\nBest Wishes,\r\n\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-02-28 01:15:56', '2021-02-28 01:15:56'),
(42, 'Elijah Funnell', 'maniyarbangles.com@maniyarbangles.com', '909-462-1208', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Feb 28, 2021\r\n\r\n\r\nWe have not gotten a settlement from you.\r\nWe\'ve tried to contact you but were incapable to contact you.\r\n\r\n\r\nSee: https://bit.ly/2Pe1VEl\r\n\r\nFor information as well as to post a discretionary settlement for your domain website solutions.\r\n\r\n\r\n\r\n\r\n022820210010313753688578798maniyarbangles.com', 1, 0, '2021-02-28 11:40:03', '2021-02-28 11:40:03'),
(43, 'Elke', 'contact@maniyarbangles.com', '(11) 6175-9499', 'Best Offer For maniyarbangles.com', 'Good Morning \r\n \r\nBuy all styles of Ray-Ban Sunglasses only 19.99 dollars.  If interested, please visit our site: framesoutlet.online\r\n \r\nThe Best, \r\n \r\nmaniyarbangles.com', 1, 0, '2021-03-01 07:52:51', '2021-03-01 07:52:51'),
(44, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - maniyarbangles.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across maniyarbangles.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-03-01 13:33:13', '2021-03-01 13:33:13'),
(45, 'Denice MacCullagh', 'maniyarbangles.com@maniyarbangles.com', '02193 67 83 29', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 01, 2021\r\n\r\n\r\nWe have actually not gotten a payment from you.\r\nWe\'ve tried to contact you however were unable to contact you.\r\n\r\n\r\nGo To: https://bit.ly/3ric5Ss\r\n\r\nFor info and to make a discretionary payment for your domain website solutions.\r\n\r\n\r\n\r\n\r\n030120211145443753688578798maniyarbangles.com', 1, 0, '2021-03-01 22:19:53', '2021-03-01 22:19:53'),
(46, 'Claudia Marou', 'maniyarbangles.com@maniyarbangles.com', '716-646-5107', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 02, 2021\r\n\r\n\r\nWe have not obtained a payment from you.\r\nWe have actually tried to call you however were not able to contact you.\r\n\r\n\r\nGo To: https://bit.ly/3q96hto\r\n\r\nFor details and to make a discretionary settlement for your domain website service.\r\n\r\n\r\n\r\n\r\n030220210720043753688578798maniyarbangles.com', 1, 0, '2021-03-02 19:49:56', '2021-03-02 19:49:56');
INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subjects`, `sms`, `status`, `view`, `created_at`, `updated_at`) VALUES
(47, 'Aliza Thring', 'maniyarbangles.com@maniyarbangles.com', '0340 2835656', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 03, 2021\r\n\r\n\r\nWe have not received a payment from you.\r\nWe\'ve tried to email you yet were unable to contact you.\r\n\r\n\r\nBrowse Through: https://bit.ly/3bgk8Kl\r\n\r\nFor information and also to post a discretionary payment for your domain website services.\r\n\r\n\r\n\r\n\r\n030320211049493753688578798maniyarbangles.com', 1, 0, '2021-03-03 21:21:55', '2021-03-03 21:21:55'),
(48, 'Emma Parker', 'remotegurus.marketing@gmail.com', '88251489732', 'Increase Revenue With Email Blasts!', 'Hello - \r\n \r\nAre you interested in increasing your business’s revenue with Email Blasts? \r\n \r\nAt RemoteGurus, we have the largest remote work community on the planet. With over 5 Million monthly visitors, RemoteGurus is rated the #1 website to find and post the best remote jobs. \r\n \r\nWhether your business is providing mental health care or essential oils, Email Blasts can help you generate thousands in sales. These Email Blasts will be delivered to all of our site visitors over a period of 1 month. \r\n \r\nPlus, it is far CHEAPER than running SMM/PPC ads or SEO. Mostly, all of our clients get a positive ROI within the first month of Email Blasts, unlike SEO which can take over a year to recoup marketing expenses. \r\n \r\nHere are our Email Blast packages: \r\n1.	3,000 emails sent per month - $94.95 /mo \r\n2.	5,000 emails sent per month - $194.95 /mo \r\n3.	10,000 emails sent per month - $294.95 /mo \r\n4.	20,000 emails sent per month - $394.95 /mo \r\nContact us at sales@remotegurus.com with your desired package! \r\nCheers to Growing Your Business! \r\nEmma Parker \r\nCEO \r\nRemoteGurus', 1, 0, '2021-03-03 22:52:56', '2021-03-03 22:52:56'),
(49, 'Theo Meadows', 'maniyarbangles.com@maniyarbangles.com', '0474 30 40 74', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 04, 2021\r\n\r\n\r\nWe have not received a settlement from you.\r\nWe have actually attempted to contact you but were incapable to contact you.\r\n\r\n\r\nGo To: https://bit.ly/3kJcD1j\r\n\r\nFor info and to make a discretionary settlement for your domain website solutions.\r\n\r\n\r\n\r\n\r\n030420210024173753688578798maniyarbangles.com', 1, 0, '2021-03-04 11:27:27', '2021-03-04 11:27:27'),
(50, 'Lorri Hutchins', 'maniyarbangles.com@maniyarbangles.com', '472 95 711', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 04, 2021\r\n\r\n\r\nWe have actually not obtained a settlement from you.\r\nWe\'ve tried to contact you yet were not able to contact you.\r\n\r\n\r\nCheck Out: https://bit.ly/3v2qTHx\r\n\r\nFor details and also to process a discretionary payment for your domain website solutions.\r\n\r\n\r\n\r\n\r\n030420211223513753688578798maniyarbangles.com', 1, 0, '2021-03-05 00:12:13', '2021-03-05 00:12:13'),
(51, 'Sven', 'sven@maniyarbangles.com', '986 45 123', 'maniyarbangles.com', 'Hey, Looking for the perfect bed for your dog or cat? This cozy fur bed is sooo comfy, and is designed specifically to calm and reduce your pet’s daily anxiety while providing better sleep, resulting in improved overall health, happiness and behavior! \r\n \r\n(LAST DAY PROMOTION, SUPER SALE) GET YOURS HERE: dogloverclub.store\r\n\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-05 03:54:49', '2021-03-05 03:54:49'),
(52, 'Sal Wesch', 'maniyarbangles.com@maniyarbangles.com', '0680 646 24 18', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 05, 2021\r\n\r\n\r\nWe have not gotten a payment from you.\r\nWe have actually tried to contact you however were unable to contact you.\r\n\r\n\r\nBrowse Through: https://bit.ly/3eapyID\r\n\r\nFor info and to make a discretionary payment for your domain website service.\r\n\r\n\r\n\r\n\r\n030520210214203753688578798maniyarbangles.com', 1, 0, '2021-03-05 14:04:55', '2021-03-05 14:04:55'),
(53, 'DonaldDrala', 'no-replyblexy@gmail.com', '85956151368', 'Mailing via the feedback form.', 'Hi!  maniyarbangles.com \r\n \r\nDid you know that it is possible to send proposal utterly legitimate way? \r\nWe make available a new unique way of sending business proposal through contact forms. Such forms are located on many sites. \r\nWhen such appeal are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through communication Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693', 1, 0, '2021-03-06 01:22:09', '2021-03-06 01:22:09'),
(54, 'Mike Dean', 'see-email-in-message@monkeydigital.co', '86164942566', 'Increase sales for maniyarbangles.com', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your maniyarbangles.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your maniyarbangles.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Dean\r\n \r\nsupport@monkeydigital.co \r\nMonkey Digital', 1, 0, '2021-03-07 18:59:01', '2021-03-07 18:59:01'),
(55, 'Jere Kean', 'maniyarbangles.com@maniyarbangles.com', '0325 2649374', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 07, 2021\r\n\r\n\r\nWe have actually not obtained a payment from you.\r\nWe\'ve tried to call you however were incapable to contact you.\r\n\r\n\r\nVisit: https://bit.ly/3qm8qSE\r\n\r\nFor info and also to make a discretionary settlement for your domain website solutions.\r\n\r\n\r\n\r\n\r\n030720210930523753688578798maniyarbangles.com', 1, 0, '2021-03-07 20:00:59', '2021-03-07 20:00:59'),
(56, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website maniyarbangles.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at maniyarbangles.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://talkwithcustomer.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-03-08 00:32:37', '2021-03-08 00:32:37'),
(57, 'Sherryl Steffen', 'maniyarbangles.com@maniyarbangles.com', '424 1232', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 08, 2021\r\n\r\n\r\nWe have not obtained a payment from you.\r\nWe\'ve attempted to contact you yet were unable to contact you.\r\n\r\n\r\nGo To: https://bit.ly/3cgUQuS\r\n\r\nFor details and also to make a discretionary payment for your domain website solutions.\r\n\r\n\r\n\r\n\r\n030820210402113753688578798maniyarbangles.com', 1, 0, '2021-03-08 14:46:54', '2021-03-08 14:46:54'),
(58, 'Paige Reymond', 'maniyarbangles.com@maniyarbangles.com', '06-55505721', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 09, 2021\r\n\r\n\r\nWe have actually not received a payment from you.\r\nWe\'ve attempted to call you yet were not able to contact you.\r\n\r\n\r\nBrowse Through: https://bit.ly/3ci061d\r\n\r\nFor details as well as to post a discretionary settlement for your domain website solutions.\r\n\r\n\r\n\r\n\r\n030920210039033753688578798maniyarbangles.com', 1, 0, '2021-03-09 13:08:12', '2021-03-09 13:08:12'),
(59, 'Mickie Stilwell', 'mickie@sesforyou.com', 'NA', 'New Business Inquiry', 'Hey, \r\n\r\nListen, business is tough right now for most people.  \r\n\r\nDoes this sound like your situation?\r\n\r\n-Not enough quality leads?\r\n-Not enough revenue?\r\n-Always looking for more business?\r\n-Working too hard?\r\n\r\nI have the solution to help make this a great year for your business.\r\n\r\nI will show you how to Drive Revenue, Sales and Commissions...during the day and more importantly while you sleep...\r\n \r\n==> https://sesforyou.com\r\n \r\nRegards,\r\nSesForYou.com', 1, 0, '2021-03-09 15:26:40', '2021-03-09 15:26:40'),
(60, 'Tarah', 'info@maniyarbangles.com', '(07) 5643 0452', 'Lead For maniyarbangles.com', 'Hey\r\n\r\nBuy face mask to protect your loved ones from the deadly CoronaVirus.  We wholesale N95 Masks and Surgical Masks for both adult and kids.  The prices begin at $0.19 each.  If interested, please visit our site: pharmacyoutlets.online\r\n\r\nMany Thanks,\r\n\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-09 23:17:02', '2021-03-09 23:17:02'),
(61, 'Mozelle Daugherty', 'maniyarbangles.com@maniyarbangles.com', '0660 429 22 42', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 09, 2021\r\n\r\n\r\nWe have not gotten a payment from you.\r\nWe have actually tried to email you but were not able to contact you.\r\n\r\n\r\nSee: https://bit.ly/3ryjX2r\r\n\r\nFor details as well as to make a discretionary payment for your domain website service.\r\n\r\n\r\n\r\n\r\n030920211540103753688578798maniyarbangles.com', 1, 0, '2021-03-10 02:12:59', '2021-03-10 02:12:59'),
(62, 'Charli Pleasant', 'maniyarbangles.com@maniyarbangles.com', '0357 6462325', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 10, 2021\r\n\r\n\r\nWe have actually not obtained a payment from you.\r\nWe have actually attempted to call you but were not able to contact you.\r\n\r\n\r\nCheck Out: https://bit.ly/3vbvRRZ\r\n\r\nFor details and to post a discretionary payment for your domain website services.\r\n\r\n\r\n\r\n\r\n031020210213563753688578798maniyarbangles.com', 1, 0, '2021-03-10 12:51:50', '2021-03-10 12:51:50'),
(63, 'Billie Kinney', 'maniyarbangles.com@maniyarbangles.com', '780-808-6666', 'maniyarbangles.com', 'DOMAIN SERVICES EXPIRATION NOTICE FOR maniyarbangles.com\r\n\r\nDomain Notice Expiry ON: Mar 10, 2021\r\n\r\n\r\nWe have not obtained a payment from you.\r\nWe have actually attempted to call you yet were unable to contact you.\r\n\r\n\r\nGo To: https://bit.ly/3rCkqAR\r\n\r\nFor info and also to make a discretionary payment for your domain website services.\r\n\r\n\r\n\r\n\r\n031020212330003753688578798maniyarbangles.com', 1, 0, '2021-03-11 11:57:12', '2021-03-11 11:57:12'),
(64, 'Mario Gonzalez', 'mysolutions360@gmail.com', '89943923992', 'Get on the 1rst page of Google or don’t pay', 'Hi, are you still in charge of maniyarbangles.com ? \r\n \r\nIf you take 30 sec to read this email, we could help you 2X-5X your business. \r\n \r\nMost SEO companies will ask you to pay upfront with no guarantee that your website will rank on Google. \r\n \r\nWe are different ... \r\n \r\nOur company specializes in Pay Per Performance SEO. Which means – \r\nWe get your business on the first page of Google before we get paid for our service. \r\n \r\nI know that’s a bold statement but we can back it up with 9 years of success in this industry. \r\n \r\nIf you’re interested in getting on the first page of Google, and only pay if you get there, \r\nlet me know when is a good time for a call. \r\n \r\nGet full details here or send us a message to mcmarketing360@hotmail.com: \r\nhttps://getmoreclientsfaster.com/performance-based-seo/', 1, 0, '2021-03-11 13:32:56', '2021-03-11 13:32:56'),
(65, 'Melaine', 'melaine@maniyarbangles.com', '06-68299063', 'Maniyar Bangles online Bangles shopping', 'Hey\r\n\r\nBuy face mask to protect your loved ones from the deadly CoronaVirus.  We wholesale N95 Masks and Surgical Masks for both adult and kids.  The prices begin at $0.19 each.  If interested, please visit our site: pharmacyoutlets.online\r\n\r\nSincerely,\r\n\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-03-12 01:54:41', '2021-03-12 01:54:41'),
(66, 'Ismael', 'ismael@maniyarbangles.com', '0478 21 05 44', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Morning \r\n\r\nThe complete selection of all Ray-Ban sunglasses styles available online and only 19.99 dollars. \r\n\r\nInsanely special offer for the next 24 hours only! Get yours here: sunglassusa.online\r\n\r\nYou Won\'t Want To Miss This!\r\n\r\nThe Best, \r\n\r\nIsmael\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-12 12:58:23', '2021-03-12 12:58:23'),
(67, 'Mike Moore', 'no-replyfew@gmail.com', '89355126357', 'Local SEO for more business', 'Hello \r\n \r\nI have just analyzed  maniyarbangles.com for its Local SEO Trend and seen that your website could use an upgrade. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart enhancing your local visibility with us, today! \r\n \r\nregards \r\nMike Moore\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', 1, 0, '2021-03-13 02:45:01', '2021-03-13 02:45:01'),
(68, 'Antonetta', 'antonetta@maniyarbangles.com', '306-764-5942', 'Maniyar Bangles online Bangles shopping', 'Good Morning\r\n\r\nBuy face mask to protect your loved ones from the deadly CoronaVirus.  We wholesale N95 Masks and Surgical Masks for both adult and kids.  The prices begin at $0.19 each.  If interested, please visit our site: pharmacyoutlets.online\r\n\r\nMany Thanks,\r\n\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-03-13 12:04:38', '2021-03-13 12:04:38'),
(69, 'Katherine Carrington', 'maniyarbangles.com@maniyarbangles.com', '02692 70 51 07', 'maniyarbangles.com', 'DOMAIN SERVICES NOTICE FOR maniyarbangles.com\r\n\r\nThis Domain Notice Expires on: Mar 13, 2021\r\n\r\n\r\nWe have not received a payment from you.\r\nWe have actually attempted to email you however were not able to contact you.\r\n\r\n\r\nBrowse Through: https://bit.ly/2OTZ0AQ\r\n\r\nFor details as well as to process a discretionary settlement for your domain website service.\r\n\r\n\r\n\r\n\r\n031320211650103753688578798maniyarbangles.com', 1, 0, '2021-03-14 03:20:16', '2021-03-14 03:20:16'),
(70, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - maniyarbangles.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across maniyarbangles.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-03-14 05:59:08', '2021-03-14 05:59:08'),
(71, 'Zita', 'zita@maniyarbangles.com', '034 399 80 94', 'Maniyar Bangles online Bangles shopping', 'Hey \r\n\r\nThe complete selection of all Ray-Ban sunglasses styles available online and only 19.99 dollars. \r\n\r\nInsanely special offer for the next 24 hours only! Get yours here: designerframes.online\r\n\r\nYou Won\'t Want To Miss This!\r\n\r\nThanks and Best Regards, \r\n\r\nZita\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-03-14 23:10:45', '2021-03-14 23:10:45'),
(72, 'Mike Hodges', 'no-reply@google.com', '85596524558', 'affordable monthly SEO plans', 'Hi there \r\n \r\nI have just verified your SEO on  maniyarbangles.com for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our services below, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Hodges\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', 1, 0, '2021-03-16 03:22:00', '2021-03-16 03:22:00'),
(73, 'Hanna Brown', 'chitchatchannel01@gmail.com', '83243963667', 'Your business after Covid19', 'The world after COVID19 is shaping up. Businesses that had virtual platforms performed best. The future will be more of the same. https://ChitChatChannel.com fills that gap by providing you with a Social Business Page— like Facebook, but which plugs into its own real-time ordering /shipping system, instantly creating an additional outlet for your business. It has other corporate features like its own \'zoom\' or CHAD for Agile Tech Development. \r\nSo, whatever your business: Restaurateur, Influencer, Retailer, Realtor, Educator, Tech-developer or what have you — you are right there, building your brand or team, and generating additional revenues or efficiencies through your new outlet – and partaking in the future digital economy. Sign up at https://chitchatchannel.com. Add me up on LinkedIn at: https://www.linkedin.com/in/hanna-brown-096a22b6', 1, 0, '2021-03-17 00:25:30', '2021-03-17 00:25:30'),
(74, 'Claudette', 'claudette@maniyarbangles.com', '616-361-4928', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Hi \r\n\r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\nClick here: caredogbest.online\r\n\r\nAll the best, \r\n\r\nClaudette\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-17 08:10:01', '2021-03-17 08:10:01'),
(75, 'Evelyn Roberts', 'evelynroberthe4@yahoo.com', '0231 89 19 37', 'More Visitors to maniyarbangles.com in 2021', 'Hi,\r\n\r\nWe\'d like to introduce you to our ebook: 100 Backlinks in 30 Days\r\n\r\nYou can download it for free here: https://backlinks100.com\r\n\r\nKind Regards,\r\nEvelyn', 1, 0, '2021-03-18 07:46:58', '2021-03-18 07:46:58'),
(76, 'Thalia', 'thalia.malm19@msn.com', '077 7981 9351', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Hey there\r\n\r\nWholesale Medical Surgical Masks for both adult and kids - Buy Now as Low as $0.19/mask\r\n\r\nShop now: pharmacyoutlets.online\r\n\r\nThanks and Best Regards,\r\n\r\nThalia\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-19 14:43:53', '2021-03-19 14:43:53'),
(77, 'Ronald White', 'ronald@approvedtoday.xyz', '202-991-6766', 'hello', 'Hello,\r\nI hope this day finds you well!\r\n\r\nDo you need funding for your Business?\r\n\r\nWe are a direct lender providing unsecured Business Loans up to 500k. We can approve you today and fund tomorrow. \r\n\r\nJust click the link to INSTANTLY see how much you qualify for. www.approvedtoday.xyz\r\n\r\n\r\nWarm Regards,\r\n\r\nRonald White\r\nApproved Today\r\nwww.approvedtoday.xyz', 1, 0, '2021-03-21 10:23:03', '2021-03-21 10:23:03'),
(78, 'Amber Roy', 'amberroy160@gmail.com', '06-10841288', 'Query for Guest Post', 'Hi,\r\n\r\nI hope you are doing well.\r\n\r\nI want to contribute a guest post article to your website that may interest your readers.\r\n\r\nIt would be of high quality and free of cost. You can choose the topic of the article from the topic ideas that I\'ll send you in my next email once you approve this offer.\r\n\r\nPlease note that I will need you to give me a backlink within the guest post article.\r\n\r\nPlease let me know if I shall send over some amazing topic ideas?\r\n\r\nRegards,\r\n\r\nAmber Roy', 1, 0, '2021-03-21 15:23:24', '2021-03-21 15:23:24'),
(79, 'Lauri', 'lauri@maniyarbangles.com', '780-644-3145', 'Maniyar Bangles online Bangles shopping', 'Hello there \r\n\r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\nClick here: caredogbest.online\r\n\r\nBest regards, \r\n\r\nLauri\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-03-22 12:15:21', '2021-03-22 12:15:21'),
(80, 'Trent', 'trent@maniyarbangles.com', '03445 25 40 52', 'Maniyar Bangles online Bangles shopping | Contact-us', 'EASE YOUR PAIN IN 10 MINUTES EFFORTLESSLY\r\n\r\nBe Free from Neck Pain\r\nTry NeckFlexer & Relieve Neck Pain Effortlessly In 10 Min!\r\nSave 50% OFF + FREE Worldwide Shipping\r\n\r\nShop Now: neckflexer.online\r\n\r\nTrent', 1, 0, '2021-03-22 22:44:29', '2021-03-22 22:44:29'),
(81, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found maniyarbangles.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE http://talkwithcustomer.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-03-23 02:45:02', '2021-03-23 02:45:02'),
(82, 'Rodger', 'rodger@maniyarbangles.com', '(07) 5695 4200', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Good day \r\n \r\nBody Revolution - Medico Postura™ Body Posture Corrector\r\nImprove Your Posture INSTANTLY!\r\n\r\nGet it while it\'s still 60% OFF!  FREE Worldwide Shipping!\r\n\r\nGet yours here: medicopostura.online\r\n \r\nRegards, \r\n \r\nRodger\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-24 10:39:11', '2021-03-24 10:39:11'),
(83, 'Kitty Whittle', 'kitty@bestlocaldata.com', 'NA', 'BestLocalData.com', 'Hello,\r\n\r\nBestLocalData.com has a special package you get any group of databases for $49 or $249 for all 16 databases and unlimited emails for a year(Domain, IP, Dashboard included).\r\n\r\nYou can purchase it on BestLocalData.com and see samples if you are interested.', 1, 0, '2021-03-25 02:54:07', '2021-03-25 02:54:07'),
(84, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website maniyarbangles.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at maniyarbangles.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://talkwithcustomer.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-03-25 14:55:44', '2021-03-25 14:55:44'),
(85, 'Doris', 'doris@maniyarbangles.com', '51-84-76-86', 'Maniyar Bangles online Bangles shopping', 'Hey \r\n \r\nBody Revolution - Medico Postura™ Body Posture Corrector\r\nImprove Your Posture INSTANTLY!\r\n\r\nGet it while it\'s still 60% OFF!  FREE Worldwide Shipping!\r\n\r\nGet yours here: medicopostura.online\r\n \r\nAll the best, \r\n \r\nDoris\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-03-26 07:50:50', '2021-03-26 07:50:50'),
(86, 'Lonny Desjardins', 'w.or.dpr.e.s.s4554.8.5+recodo@gmail.com', '208-528-4707', 'Question', 'Hello There,\r\n\r\nAre you presently utilizing Wordpress/Woocommerce or will you intend to make use of it as time goes by ? We provide much more than 2500 premium plugins and themes to download : http://shortzz.xyz/0uwya\r\n\r\nThank You,\r\n\r\nLonny', 1, 0, '2021-03-26 21:20:48', '2021-03-26 21:20:48'),
(87, 'Jane Jose', 'jane.jose@outlook.com', '318-987-1322', 'REPURPOSE - PUBLISH - PROFIT', 'Your All In One Solution For Creating All The Content You\'ll Ever Need.\r\n\r\nProprietary AI Turns YouTube Videos Into Traffic Getting Articles At The Press Of A Button!\r\n\r\nWe’ve Been Getting Free Autopilot Traffic From Google Without SEO Experience For Over 2 Years By Converting Others YouTube Videos Into Articles…\r\n\r\nhttps://warriorplus.com/o2/a/gmvfs/0', 1, 0, '2021-03-28 06:42:10', '2021-03-28 06:42:10'),
(88, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Your site – more leads?', 'Hey, this is Eric and I ran across maniyarbangles.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-03-28 10:31:16', '2021-03-28 10:31:16'),
(89, 'Jens', 'obrien.jens23@gmail.com', '0391 98 41 71', 'Maniyar Bangles online Bangles shopping', 'Good Morning \r\n\r\nDefrost frozen foods in minutes safely and naturally with our THAW KING™. \r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: thawking.online\r\n\r\nBest, \r\n\r\nJens\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-03-29 02:07:46', '2021-03-29 02:07:46'),
(90, 'Starla Wetzel', 'starla.wetzel@gmail.com', '070 4278 6480', 'Need an extra Income?', 'Need extra income?\r\n\r\nA fully hosted, done for you content + monetisation and a stunning design web based software that creates a fully automated done for you cryptocurrency affiliate site,\r\n\r\nVisit us: https://warriorplus.com/o2/a/f5s4y/0', 1, 0, '2021-03-29 20:39:37', '2021-03-29 20:39:37'),
(91, 'Stewart', 'stewart.florez@googlemail.com', '05.81.29.90.03', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Hi \r\n\r\nWear with intent, live with purpose. Fairly priced sunglasses with high quality UV400 lenses protection only $19.99 for the next 24 Hours ONLY.\r\n\r\nOrder here: kickshades.online\r\n\r\nTo your success, \r\n\r\nStewart\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-30 04:30:28', '2021-03-30 04:30:28'),
(92, 'Joseph Davis', 'joseph@directbizlending.xyz', '202-991-6766', 'Hello', 'Hello,\r\n\r\nI hope you are doing well, and business is Great!\r\n\r\nHowever, if you need working capital to further grow and expand your business, we\r\nmay be a perfect fit for you and here’s why. \r\n\r\nOur loans are NOT based on your personal credit, and NO collateral is required.\r\n\r\nWe are a Direct Lender who can approve your loan today, and fund as early as Tomorrow.\r\n\r\nWe offer loans from 5k to 500k with flexible payments and great terms.\r\n\r\nJust click on the link to INSTANTLY see how much you qualify for www.directbizlending.xyz  Applying does NOT affect your credit!\r\n\r\nAlso, please check out this video to see how our program works, and all the funding options we have available for you.  www.directbizlending.xyz/video\r\n\r\n\r\n\r\nWarm Regards,\r\n\r\nJoseph Davis\r\nDirect Biz Lending\r\nwww.directbizlending.xyz', 1, 0, '2021-03-31 06:07:56', '2021-03-31 06:07:56'),
(93, 'Vito', 'vito.vonstieglitz@yahoo.com', '442 95 684', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Morning \r\n\r\nDefrost frozen foods in minutes safely and naturally with our THAW KING™. \r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: thawking.online\r\n\r\nKind Regards, \r\n\r\nVito\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-03-31 10:59:19', '2021-03-31 10:59:19'),
(94, 'Benjamin Ehinger', 'writingbyb@gmail.com', '85888868283', 'Blog Writer for Hire', 'Hi! \r\n \r\nDo you struggle to find time to write articles? \r\n \r\nHire the best team of writing online today! \r\nWe do all the research and provide well-written SEO content perfect for higher ranking and better visitor engagement. \r\n \r\nIf you need fresh articles for your blog or content marketing strategies, check out our current content specials here: \r\n \r\nhttps://writingbybenjamin.com/best-seo-articles/ \r\n \r\nWe also offer product review writing here: \r\n \r\nhttps://writingbybenjamin.com/review-style-articles/ \r\n \r\nYou can also contact me directly at WBB@writingbybenjamin.com', 1, 0, '2021-04-02 09:12:37', '2021-04-02 09:12:37'),
(95, 'Mike Cook', 'see-email-in-message@monkeydigital.co', '85626776834', 'Increase sales for maniyarbangles.com', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your maniyarbangles.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your maniyarbangles.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-dr60/ \r\n \r\n \r\nthank you \r\nMike Cook\r\n \r\nsupport@monkeydigital.co \r\nMonkey Digital', 1, 0, '2021-04-03 08:06:05', '2021-04-03 08:06:05'),
(96, 'Irving', 'info@maniyarbangles.com', '05.29.01.57.07', 'maniyarbangles.com', 'Hello\r\n\r\nWorld\'s Best Neck Massager Get it Now 50% OFF + Free Shipping!\r\nWellness Enthusiasts! There has never been a better time to take care of your neck pain! \r\n\r\nOur clinical-grade TENS technology will ensure you have neck relief in as little as 20 minutes.\r\n\r\nGet Yours: hineck.online\r\n\r\nCheers,\r\n\r\nIrving\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-04-04 07:46:06', '2021-04-04 07:46:06'),
(97, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - maniyarbangles.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across maniyarbangles.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-04-05 03:58:19', '2021-04-05 03:58:19'),
(98, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - maniyarbangles.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across maniyarbangles.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-04-05 15:25:11', '2021-04-05 15:25:11'),
(99, 'Madison', 'info@maniyarbangles.com', '0971-5847868', 'maniyarbangles.com', 'Hello there\r\n\r\nWorld\'s Best Neck Massager Get it Now 50% OFF + Free Shipping!\r\n\r\nWellness Enthusiasts! There has never been a better time to take care of your neck pain! \r\nOur clinical-grade TENS technology will ensure you have neck relief in as little as 20 minutes.\r\n\r\nGet Yours: hineck.online\r\n\r\nMany Thanks,\r\n\r\nMadison\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-04-06 20:38:05', '2021-04-06 20:38:05'),
(100, 'Mike Berrington', 'no-replyfew@gmail.com', '86624517888', 'Local SEO for more business', 'Hi there \r\n \r\nI have just analyzed  maniyarbangles.com for  the current Local search visibility and seen that your website could use a push. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our plans here, we offer SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nStart enhancing your local visibility with us, today! \r\n \r\nregards \r\nMike Berrington\r\n \r\nSpeed SEO Digital Agency \r\nsupport@speed-seo.net', 1, 0, '2021-04-07 08:24:30', '2021-04-07 08:24:30'),
(101, 'Rolando Leonard', 'rolando.leonard@googlemail.com', '497 91 552', 'lifemail.studio', 'Hey,\r\n\r\nIt was nice speaking to you the other day, this is the service I was telling you about that helped us boost our ROI almost 2000%\r\n\r\nIts a company called Lifemail.studio sorry it took so long to get back to you. They allow you to send any email doesn\'t matter what.\r\n\r\nWe dealt with a guy named Michael, he was friendly and got us setup really quickly.\r\n\r\nRegards,\r\nRolando', 1, 0, '2021-04-08 03:58:49', '2021-04-08 03:58:49'),
(102, 'Mammie Kimble', 'mammie.kimble@yahoo.com', '06-96285555', 'SesForYou.com', 'For Anyone Looking To Start, Scale and Grow A Digital Business In 2021\r\n\r\nNew Book Reveals How I Built A 7-Figure Online Business Using Nothing But Ethical Email Marketing To Drive Revenue, Sales and Commissions...\r\n\r\n$4.99 to access the secret email system.\r\n\r\nSesforyou.com!', 1, 0, '2021-04-09 01:06:45', '2021-04-09 01:06:45'),
(103, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Strike when the iron’s hot', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found maniyarbangles.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-04-09 11:46:05', '2021-04-09 11:46:05'),
(104, 'Charlene', 'info@maniyarbangles.com', '0357 6462325', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Morning \r\n \r\nMeet your best Buds - True Wireless Earbuds with amazing sound, convenience, portability, & affordability!\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: musicontrol.online\r\n \r\nRegards, \r\n \r\nCharlene\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-04-13 11:36:37', '2021-04-13 11:36:37');
INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subjects`, `sms`, `status`, `view`, `created_at`, `updated_at`) VALUES
(105, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Your site – more leads?', 'Hey, this is Eric and I ran across maniyarbangles.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=maniyarbangles.com', 1, 0, '2021-04-13 12:37:10', '2021-04-13 12:37:10'),
(106, 'Williamnok', 'alina1994@mail.com', '86513434344', 'There\'s More Than A man Way representing Gay Men to Have Intimacy', 'I to you am very obliged.\r\n  <a href=https://naked-boobs.com>naked-boobs</a>', 1, 0, '2021-04-13 20:46:58', '2021-04-13 20:46:58'),
(107, 'Mickey Barnett', 'mickey@lifemailnow.com', '0499 83 99 05', 'LifeMailNow.com - One Time cost, unlimited Emails', 'Hello,\r\n\r\nSend unlimited emails to unlimited lists with one click and no monthly fees!\r\n\r\n$99 once off!\r\n\r\nLifeMailNow.com', 1, 0, '2021-04-14 00:45:34', '2021-04-14 00:45:34'),
(108, 'Charity', 'info@maniyarbangles.com', '0681 705 20 10', 'maniyarbangles.com', 'Hello \r\n \r\nMeet your best Buds - True Wireless Earbuds with amazing sound, convenience, portability, & affordability!\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: musicontrol.online\r\n \r\nThank You, \r\n \r\nCharity\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-04-15 19:08:28', '2021-04-15 19:08:28'),
(109, 'Mike Holmes', 'no-reply@google.com', '86366136749', 'whitehat monthly SEO plans', 'Greetings \r\n \r\nI have just analyzed  maniyarbangles.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart enhancing your sales and leads with us, today! \r\n \r\nregards \r\nMike Holmes\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', 1, 0, '2021-04-15 23:49:42', '2021-04-15 23:49:42'),
(110, 'Lashawnda', 'lashawnda@maniyarbangles.com', '05.75.26.22.85', 'Maniyar Bangles online Bangles shopping | Contact-us', 'Hey \r\n \r\nTrim your dog\'s nails safely from home.  Get it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: pawsafer.shop\r\n \r\nEnjoy, \r\n \r\nLashawnda\r\nManiyar Bangles online Bangles shopping | Contact-us', 1, 0, '2021-04-16 08:25:39', '2021-04-16 08:25:39'),
(111, 'Kaylene', 'kaylene@maniyarbangles.com', '0315 6443643', 'Maniyar Bangles online Bangles shopping', 'Hey \r\n \r\nTrim your dog\'s nails safely from home.  Get it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: pawsafer.shop\r\n \r\nKind Regards, \r\n \r\nKaylene\r\nManiyar Bangles online Bangles shopping', 1, 0, '2021-04-18 12:11:23', '2021-04-18 12:11:23'),
(112, 'Gabriel Angelo', 'ga.7652719@gmail.com', '86611656162', 'Re; Hello', 'Hello, \r\n \r\nI\'m Gabriel Angelo, My Company can bridge fund for your new or ongoing Business. Do let me know when you receive this message for further procedure. \r\n \r\nYou can reach me using this email address: mailgabby773@gmail.com \r\n \r\nRegards, \r\nGabriel Angelo', 1, 0, '2021-04-19 04:47:07', '2021-04-19 04:47:07'),
(113, 'Stewart Small', 'commissionbasedsales@gmail.com', '87892259192', 'Commision Based Digital Marketing', 'I’m a digital marketing consultant with 20 years of experience. \r\n \r\nI work primarily on a structured commission base. \r\n \r\nI would like to work with you to improve your online marketing results. \r\n \r\nPlease contact me for a consultation or questions. \r\nEmail: CommissionBasedMarketing@gmail.com \r\nPhone Number: 207-274-7875', 1, 0, '2021-04-23 14:08:53', '2021-04-23 14:08:53'),
(114, 'Ashish kumar', 'ranjanashish253@gmail.com', NULL, 'dddddddddddddddd', 'dd', 1, 0, '2021-04-24 12:24:04', '2021-04-24 12:24:04'),
(115, 'Ashish kumar', 'ranjanashish253@gmail.com', NULL, 'dddddddddddddddd', 'dd', 1, 0, '2021-04-24 12:26:13', '2021-04-24 12:26:13'),
(116, 'Ashish kumar', 'ranjanashish253@gmail.com', NULL, 'dddddddddddddddd', 'dd', 1, 0, '2021-04-24 12:30:43', '2021-04-24 12:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `created_at`, `updated_at`) VALUES
(5, 'Afghanistan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(7, 'Åland Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(8, 'Albania', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(9, 'Algeria', '2021-04-11 18:30:00', '2021-04-11 18:30:00'),
(10, 'American Samoa', '2021-04-11 18:30:00', '2021-04-11 18:30:00'),
(11, 'Andorra', '2021-04-11 18:30:00', '2021-04-11 18:30:00'),
(12, 'Afghanistan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(13, 'Åland Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(14, 'Albania', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(15, 'Algeria', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(16, 'American Samoa', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(17, 'Andorra', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(18, 'Angola', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(19, 'Anguilla', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(20, 'Antarctica', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(21, 'Antigua and Barbuda', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(22, 'Argentina', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(23, 'Armenia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(24, 'Aruba', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(25, 'Australia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(26, 'Austria', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(27, 'Azerbaijan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(28, 'Bahamas', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(29, 'Bahrain', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(30, 'Bangladesh', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(31, 'Barbados', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(32, 'Belarus', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(33, 'Belgium', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(34, 'Belize', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(35, 'Benin', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(36, 'Bermuda', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(37, 'Bhutan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(38, 'Bolivia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(39, 'Bosnia and Herzegovina', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(40, 'Botswana', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(41, 'Bouvet Island', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(42, 'Brazil', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(43, 'British Indian Ocean Territory', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(44, 'Brunei Darussalam', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(45, 'Bulgaria', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(46, 'Burkina Faso', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(47, 'Burundi', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(48, 'Cambodia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(49, 'Cameroon', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(50, 'Canada', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(51, 'Cape Verde', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(52, 'Cayman Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(53, 'Central African Republic', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(54, 'Chad', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(55, 'Chile', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(56, 'China', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(57, 'Christmas Island', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(58, 'Cocos (Keeling) Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(59, 'Colombia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(60, 'Comoros', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(61, 'Congo', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(62, 'Congo', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(63, ' The Democratic Republic of The', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(64, 'Cook Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(65, 'Costa Rica', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(66, 'Korea', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(67, 'Afghanistan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(68, 'Croatia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(69, 'Cuba', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(70, 'Cyprus', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(71, 'Czech Republic', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(72, 'Denmark', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(73, 'Djibouti', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(74, 'Dominica', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(75, 'Dominican Republic', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(76, 'Ecuador', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(77, 'Egypt', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(78, 'El Salvador', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(79, 'Equatorial Guinea', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(80, 'Eritrea', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(81, 'Estonia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(82, 'Ethiopia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(83, 'Falkland Islands (Malvinas)', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(84, 'Faroe Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(85, 'Fiji', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(86, 'Finland', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(87, 'France', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(88, 'French Guiana', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(89, 'French Polynesia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(90, 'French Southern Territories', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(91, 'Gabon', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(92, 'Gambia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(93, 'Georgia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(94, 'Germany', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(95, 'Ghana', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(96, 'Gibraltar', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(97, 'Greece', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(98, 'Greenland', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(99, 'Grenada', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(100, 'Guadeloupe', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(101, 'Guam', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(102, 'Guatemala', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(103, 'Guernsey', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(104, 'Guinea', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(105, 'Guinea-bissau', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(106, 'Guyana', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(107, 'Haiti', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(108, 'Heard Island and Mcdonald Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(109, 'Holy See (Vatican City State)', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(110, 'Honduras', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(111, 'Hong Kong', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(112, 'Hungary', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(113, 'Iceland', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(114, 'India', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(115, 'Indonesia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(116, 'Iran', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(117, ' Islamic Republic of', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(118, 'Iraq', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(119, 'Ireland', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(120, 'Isle of Man', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(121, 'Israel', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(122, 'Italy', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(123, 'Jamaica', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(124, 'Japan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(125, 'Jersey', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(126, 'Jordan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(127, 'Kazakhstan', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(128, 'Kenya', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(129, 'Kiribati', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(130, 'Korea', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(131, 'Latvia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(132, 'Lebanon', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(133, 'Lesotho', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(134, 'Liberia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(135, 'Libyan Arab Jamahiriya', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(136, 'Liechtenstein', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(137, 'Lithuania', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(138, 'Luxembourg', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(139, 'Macao', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(140, 'Macedonia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(141, ' The Former Yugoslav Republic of', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(142, 'Madagascar', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(143, 'Malawi', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(144, 'Malaysia', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(145, 'Maldives', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(146, 'Mali', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(147, 'Malta', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(148, 'Marshall Islands', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(149, 'Martinique', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(150, 'Mauritania', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(151, 'Mauritius', '2021-04-12 10:51:37', '2021-04-12 10:51:37'),
(152, 'Mayotte', '2021-04-12 10:51:37', '2021-04-12 10:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `q` text NOT NULL,
  `a` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `user_id`, `q`, `a`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'on', '2021-04-25 07:10:54', '2021-04-25 07:10:54'),
(5, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:11:52', '2021-04-25 07:11:52'),
(6, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:11:59', '2021-04-25 07:11:59'),
(7, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:04', '2021-04-25 07:12:04'),
(8, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:10', '2021-04-25 07:12:10'),
(9, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:15', '2021-04-25 07:12:15'),
(10, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:20', '2021-04-25 07:12:20'),
(11, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:26', '2021-04-25 07:12:26'),
(12, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:32', '2021-04-25 07:12:32'),
(13, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:37', '2021-04-25 07:12:37'),
(14, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam impedit pariatur iste repellendus maiores quaerat, voluptas harum, consequuntur, eaque et esse beatae necessitatibus? Minima corrupti delectus nulla nisi, commodi sequi?', 'on', '2021-04-25 07:12:44', '2021-04-25 07:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `daily_limit` int(11) NOT NULL,
  `referral_commission` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `price`, `daily_limit`, `referral_commission`, `status`, `created_at`, `updated_at`) VALUES
(3, 'FREE', 0, 5, '0', 'on', '2021-04-12 12:46:47', '2021-04-12 12:46:47'),
(4, 'PRO', 5, 15, '4', 'on', '2021-04-12 12:48:25', '2021-04-12 22:03:26'),
(5, 'DEMO', 10, 20, '5', 'on', '2021-04-12 13:04:48', '2021-04-12 22:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_04_12_055106_create_countries_table', 2),
(6, '2021_04_26_162620_create_activity_log_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ranjanashish253@gmail.com', '2021-04-25 03:38:01', '2021-04-25 03:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `notificaton`
--

CREATE TABLE `notificaton` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `view` int(11) DEFAULT 0,
  `json` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificaton`
--

INSERT INTO `notificaton` (`id`, `user_id`, `title`, `description`, `type`, `link`, `status`, `view`, `json`, `updated_at`, `created_at`) VALUES
(1, 4, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 50', 'credit', '', 1, 1, NULL, '2021-04-18 05:30:53', '2021-04-18 05:30:53'),
(4, 4, 'Buy PRO Subscription at ₹  Using online payment', 'Buy PRO Subscription Using online payment not using wallet ₹ ', 'success', '', 1, 1, '{\"id\":\"pay_H0eo2dh493xyLU\",\"entity\":\"payment\",\"amount\":500,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H0enmwAcHH0BSx\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"PRO\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":12,\"tax\":2,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"6550878\"},\"created_at\":1618808578}', '2021-04-19 05:03:04', '2021-04-19 05:03:04'),
(5, 4, 'Buy PRO Subscription at ₹  Using online payment', 'Buy PRO Subscription Using online payment not using wallet ₹ ', 'success', '', 1, 1, '{\"id\":\"pay_H0pgYRRf7t8tqA\",\"entity\":\"payment\",\"amount\":500,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H0pgLIEFnvmgtw\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"PRO\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":12,\"tax\":2,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"8430615\"},\"created_at\":1618846890}', '2021-04-19 15:42:02', '2021-04-19 15:42:02'),
(7, 4, 'Referal bonous credit ₹ 80', 'Referal bonous credit ₹ 80 Your referal joined by Ashish RAY', 'credit', '', 1, 1, NULL, '2021-04-19 19:13:03', '2021-04-19 19:13:03'),
(8, 9, 'Referal bonous credit ₹ 120', 'Referal bonous credit ₹ 120 Your referal joined by Ashish Nigam', 'credit', '', 1, 0, NULL, '2021-04-19 19:13:07', '2021-04-19 19:13:07'),
(9, 9, 'Buy Subscription at ₹ 0', 'Buy Subscription at ₹ 0', 'success', '', 1, 0, NULL, '2021-04-19 19:17:56', '2021-04-19 19:17:56'),
(10, 9, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 0, NULL, '2021-04-20 04:54:05', '2021-04-20 04:54:05'),
(11, 12, 'Buy Subscription at ₹ 0', 'Buy Subscription at ₹ 0', 'success', '', 1, 0, NULL, '2021-04-20 07:03:55', '2021-04-20 07:03:55'),
(12, 11, 'Buy Subscription at ₹ 0', 'Buy Subscription at ₹ 0', 'success', '', 1, 0, NULL, '2021-04-20 07:05:55', '2021-04-20 07:05:55'),
(13, 10, 'Buy Subscription at ₹ 0', 'Buy Subscription at ₹ 0', 'success', '', 1, 0, NULL, '2021-04-20 07:30:58', '2021-04-20 07:30:58'),
(14, 9, 'Buy PRO Subscription at ₹  Using online payment', 'Buy PRO Subscription Using online payment not using wallet ₹ ', 'success', '', 1, 0, '{\"id\":\"pay_H18HFp5IcyJUiK\",\"entity\":\"payment\",\"amount\":500,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H18Gs9cVPyYzjA\",\"invoice_id\":null,\"international\":false,\"method\":\"wallet\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"PRO\",\"card_id\":null,\"bank\":null,\"wallet\":\"jiomoney\",\"vpa\":null,\"email\":\"ranjanashishbsnl253@gmail.com\",\"contact\":\"+917079929885\",\"notes\":[],\"fee\":12,\"tax\":2,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"transaction_id\":null},\"created_at\":1618912364}', '2021-04-20 09:52:49', '2021-04-20 09:52:49'),
(15, 9, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.7', 'credit', '', 1, 0, NULL, '2021-04-20 14:37:25', '2021-04-20 14:37:25'),
(16, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.5', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.5', 'credit', '', 1, 1, NULL, '2021-04-20 14:37:26', '2021-04-20 14:37:26'),
(17, 9, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.7', 'credit', '', 1, 0, NULL, '2021-04-20 14:37:47', '2021-04-20 14:37:47'),
(18, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.5', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.5', 'credit', '', 1, 1, NULL, '2021-04-20 14:37:48', '2021-04-20 14:37:48'),
(19, 12, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 10', 'credit', '', 1, 0, NULL, '2021-04-20 14:37:48', '2021-04-20 14:37:48'),
(20, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 1, NULL, '2021-04-20 16:08:58', '2021-04-20 16:08:58'),
(21, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 1, NULL, '2021-04-20 16:20:54', '2021-04-20 16:20:54'),
(22, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 1, NULL, '2021-04-20 16:21:02', '2021-04-20 16:21:02'),
(23, 4, 'Profile picture delete  successfully', 'Profile picture  delete  successfully', 'success', '', 1, 1, NULL, '2021-04-20 19:42:48', '2021-04-20 19:42:48'),
(24, 4, 'Profile picture or DP update successfully', 'Profile picture or DP update successfully', 'success', '', 1, 1, NULL, '2021-04-20 19:43:10', '2021-04-20 19:43:10'),
(25, 4, 'Profile picture delete  successfully', 'Profile picture  delete  successfully', 'success', '', 1, 1, NULL, '2021-04-20 19:43:16', '2021-04-20 19:43:16'),
(26, 4, 'Profile picture or DP update successfully', 'Profile picture or DP update successfully', 'success', '', 1, 1, NULL, '2021-04-20 19:43:29', '2021-04-20 19:43:29'),
(27, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 2', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 2', 'credit', '', 1, 1, NULL, '2021-04-21 04:22:29', '2021-04-21 04:22:29'),
(28, 9, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 10', 'credit', '', 1, 0, NULL, '2021-04-21 04:22:30', '2021-04-21 04:22:30'),
(29, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 20', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 20', 'credit', '', 1, 1, NULL, '2021-04-21 04:24:46', '2021-04-21 04:24:46'),
(30, 9, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 0, NULL, '2021-04-21 04:24:47', '2021-04-21 04:24:47'),
(31, 4, 'Add money to wallet ₹ 1', 'Add money to wallet ₹ 1', 'success', '', 1, 1, '{\"id\":\"pay_H1Skv2kivh2EPh\",\"entity\":\"payment\",\"amount\":100,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1SkJlJ5Jx8HFE\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":2,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"5638510\"},\"created_at\":1618984481}', '2021-04-21 05:54:48', '2021-04-21 05:54:48'),
(32, 4, 'Add money to wallet ₹ 1', 'Add money to wallet ₹ 1', 'success', '', 1, 1, '{\"id\":\"pay_H1SmOX7aC23LUZ\",\"entity\":\"payment\",\"amount\":100,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1SmAHxPLzwW01\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":2,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"7213271\"},\"created_at\":1618984565}', '2021-04-21 05:56:10', '2021-04-21 05:56:10'),
(33, 4, 'Add money to wallet ₹ 2', 'Add money to wallet ₹ 2', 'success', '', 1, 1, '{\"id\":\"pay_H1Te8ZIncnHbcE\",\"entity\":\"payment\",\"amount\":200,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1TdscV5UlB4ux\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":4,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"4910167\"},\"created_at\":1618987618}', '2021-04-21 06:47:02', '2021-04-21 06:47:02'),
(34, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-21 09:12:49', '2021-04-21 09:12:49'),
(35, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-21 09:13:24', '2021-04-21 09:13:24'),
(36, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-21 09:13:46', '2021-04-21 09:13:46'),
(37, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-21 09:17:37', '2021-04-21 09:17:37'),
(38, 4, 'Withdrawl successfully  ₹ 5', 'Withdrawl successfully  ₹ 5 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-21 09:26:15', '2021-04-21 09:26:15'),
(39, 4, 'Withdrawl successfully  ₹ 20', 'Withdrawl successfully  ₹ 20 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-22 15:54:58', '2021-04-22 15:54:58'),
(40, 4, 'Withdrawl successfully  ₹ 20', 'Withdrawl successfully  ₹ 20 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 17:30:29', '2021-04-22 17:30:29'),
(41, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 17:33:36', '2021-04-22 17:33:36'),
(42, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 17:35:13', '2021-04-22 17:35:13'),
(43, 4, 'Withdrawl successfully  ₹ 5', 'Withdrawl successfully  ₹ 5 In your UPI', 'credit', '', 1, 1, NULL, '2021-04-22 17:37:31', '2021-04-22 17:37:31'),
(44, 4, 'Withdrawl successfully  ₹ 5', 'Withdrawl successfully  ₹ 5 In your UPI', 'credit', '', 1, 1, NULL, '2021-04-22 17:37:51', '2021-04-22 17:37:51'),
(45, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 17:37:59', '2021-04-22 17:37:59'),
(46, 4, 'Withdrawl successfully  ₹ 1', 'Withdrawl successfully  ₹ 1 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 17:38:03', '2021-04-22 17:38:03'),
(47, 4, 'Withdrawl successfully  ₹ 20', 'Withdrawl successfully  ₹ 20 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 17:38:07', '2021-04-22 17:38:07'),
(48, 4, 'Withdrawl successfully  ₹ 5', 'Withdrawl successfully  ₹ 5 In your UPI', 'credit', '', 1, 1, NULL, '2021-04-22 17:43:49', '2021-04-22 17:43:49'),
(49, 4, 'Withdrawl in pending  ₹ 5', 'Withdrawl pending  ₹ 5Some technical issus', 'error', '', 1, 1, NULL, '2021-04-22 17:43:57', '2021-04-22 17:43:57'),
(50, 4, 'Your Withdrawl Amount  ₹ 5 Would not bee process due to ', 'Your Withdrawl Amount  ₹ 5 Would not bee process due to ', 'error', '', 1, 1, NULL, '2021-04-22 17:56:00', '2021-04-22 17:56:00'),
(51, 4, 'Withdrawl in pending  ₹ 5', 'Withdrawl pending  ₹ 5Some technical issus', 'error', '', 1, 1, NULL, '2021-04-22 17:56:25', '2021-04-22 17:56:25'),
(52, 4, 'Your Withdrawl Amount  ₹ 20 Would not bee process due to failed due toenvilide details update details now', 'Your Withdrawl Amount  ₹ 20 Would not bee process due to failed due toenvilide details update details now', 'error', '', 1, 1, NULL, '2021-04-22 18:00:13', '2021-04-22 18:00:13'),
(53, 4, 'Withdrawl in pending  ₹ 20', 'Withdrawl pending  ₹ 20Some technical issus', 'error', '', 1, 1, NULL, '2021-04-22 18:03:37', '2021-04-22 18:03:37'),
(54, 4, 'Your Withdrawl Amount  ₹ 20 Would not bee process due to ', 'Your Withdrawl Amount  ₹ 20 Would not bee process due to ', 'error', '', 1, 1, NULL, '2021-04-22 18:03:43', '2021-04-22 18:03:43'),
(55, 4, 'Withdrawl in pending  ₹ 5', 'Withdrawl pending  ₹ 5Some technical issus', 'error', '', 1, 1, NULL, '2021-04-22 18:09:12', '2021-04-22 18:09:12'),
(56, 4, 'Withdrawl successfully  ₹ 20', 'Withdrawl successfully  ₹ 20 In your PayTm', 'credit', '', 1, 1, NULL, '2021-04-22 18:14:18', '2021-04-22 18:14:18'),
(57, 4, 'Your Withdrawl Amount  ₹ 5 Would not bee process due to UPI Id Incorrect plze correct upi id', 'Your Withdrawl Amount  ₹ 5 Would not bee process due to UPI Id Incorrect plze correct upi id', 'error', '', 1, 1, NULL, '2021-04-22 18:15:44', '2021-04-22 18:15:44'),
(58, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 1, NULL, '2021-04-22 18:59:51', '2021-04-22 18:59:51'),
(59, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 20', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 20', 'credit', '', 1, 0, NULL, '2021-04-23 14:08:06', '2021-04-23 14:08:06'),
(60, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 18', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 18', 'credit', '', 1, 1, NULL, '2021-04-23 14:08:06', '2021-04-23 14:08:06'),
(61, 10, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 0, NULL, '2021-04-23 14:08:07', '2021-04-23 14:08:07'),
(62, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 20', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 20', 'credit', '', 1, 0, NULL, '2021-04-23 14:09:17', '2021-04-23 14:09:17'),
(63, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 18', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 18', 'credit', '', 1, 1, NULL, '2021-04-23 14:09:18', '2021-04-23 14:09:18'),
(64, 10, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 0, NULL, '2021-04-23 14:09:19', '2021-04-23 14:09:19'),
(65, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 1', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 1', 'credit', '', 1, 0, NULL, '2021-04-23 14:10:07', '2021-04-23 14:10:07'),
(66, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 0.9', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 0.9', 'credit', '', 1, 1, NULL, '2021-04-23 14:10:09', '2021-04-23 14:10:09'),
(67, 10, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 5', 'credit', '', 1, 0, NULL, '2021-04-23 14:10:12', '2021-04-23 14:10:12'),
(68, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 10', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 10', 'credit', '', 1, 1, NULL, '2021-04-23 14:10:56', '2021-04-23 14:10:56'),
(69, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 9', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 9', 'credit', '', 1, 1, NULL, '2021-04-23 14:11:00', '2021-04-23 14:11:00'),
(70, 10, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 50', 'credit', '', 1, 0, NULL, '2021-04-23 14:11:01', '2021-04-23 14:11:01'),
(71, 10, 'Withdrawl successfully  ₹ 50', 'Withdrawl successfully  ₹ 50 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 0, NULL, '2021-04-23 14:12:16', '2021-04-23 14:12:16'),
(72, 4, 'Withdrawl payment method or payment description change or update successfully', 'Withdrawl payment method or payment description change or update successfully', 'error', '', 1, 2, NULL, '2021-04-23 18:30:42', '2021-04-23 18:30:42'),
(73, 4, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 5', 'credit', '', 1, 1, NULL, '2021-04-23 19:37:45', '2021-04-23 19:37:45'),
(74, 4, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 1', 'credit', '', 1, 2, NULL, '2021-04-23 19:39:17', '2021-04-23 19:39:17'),
(75, 4, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 10', 'credit', '', 1, 1, NULL, '2021-04-23 19:39:42', '2021-04-23 19:39:42'),
(76, 4, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 1, NULL, '2021-04-23 19:41:29', '2021-04-23 19:41:29'),
(77, 4, 'Withdrawl successfully  ₹ 15', 'Withdrawl successfully  ₹ 15 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 1, NULL, '2021-04-23 19:46:27', '2021-04-23 19:46:27'),
(78, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 20', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 20', 'credit', '', 1, 0, NULL, '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(79, 9, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 0, NULL, '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(80, 9, 'Withdrawl successfully  ₹ 4', 'Withdrawl successfully  ₹ 4 With in some day or time amount will credit in your account given by you', 'credit', '', 1, 0, NULL, '2021-04-24 17:17:15', '2021-04-24 17:17:15'),
(81, 4, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-26 19:14:39', '2021-04-26 19:14:39'),
(82, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 1, NULL, '2021-04-26 19:14:39', '2021-04-26 19:14:39'),
(83, 4, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-26 19:22:04', '2021-04-26 19:22:04'),
(84, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 1, NULL, '2021-04-26 19:22:04', '2021-04-26 19:22:04'),
(85, 4, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-26 19:26:59', '2021-04-26 19:26:59'),
(86, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 1, NULL, '2021-04-26 19:26:59', '2021-04-26 19:26:59'),
(87, 4, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-26 19:28:14', '2021-04-26 19:28:14'),
(88, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 1, NULL, '2021-04-26 19:28:14', '2021-04-26 19:28:14'),
(89, 4, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-26 19:28:39', '2021-04-26 19:28:39'),
(90, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 1, NULL, '2021-04-26 19:28:39', '2021-04-26 19:28:39'),
(91, 4, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-27 03:24:39', '2021-04-27 03:24:39'),
(92, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 1, NULL, '2021-04-27 03:24:39', '2021-04-27 03:24:39'),
(93, 1, 'Fevicon update successfully', 'Fevicon update successfully', 'success', '', 1, 1, NULL, '2021-04-27 07:53:54', '2021-04-27 07:53:54'),
(94, 1, 'Profile picture or DP update successfully', 'Profile picture or DP update successfully', 'success', '', 1, 1, NULL, '2021-04-27 07:56:19', '2021-04-27 07:56:19'),
(95, 1, 'Fevicon update successfully', 'Fevicon update successfully', 'success', '', 1, 1, NULL, '2021-04-27 09:13:10', '2021-04-27 09:13:10'),
(96, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 14:25:18', '2021-04-27 14:25:18'),
(97, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 14:51:24', '2021-04-27 14:51:24'),
(98, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 14:51:37', '2021-04-27 14:51:37'),
(99, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 14:51:48', '2021-04-27 14:51:48'),
(100, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 14:54:31', '2021-04-27 14:54:31'),
(101, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 14:55:00', '2021-04-27 14:55:00'),
(102, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 15:06:39', '2021-04-27 15:06:39'),
(103, 38, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 15:06:47', '2021-04-27 15:06:47'),
(104, 1, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-04-27 16:58:43', '2021-04-27 16:58:43'),
(105, 38, 'Profile update by admin successfully', 'Profile update by admin successfully', 'success', '', 1, 0, NULL, '2021-04-27 17:42:41', '2021-04-27 17:42:41'),
(106, 1, 'Ashish Nigam Profile update by you successfully', 'Ashish Nigam Profile update by you successfully', 'success', '', 1, 0, NULL, '2021-04-27 17:42:41', '2021-04-27 17:42:41'),
(107, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-05-01 03:21:42', '2021-05-01 03:21:42'),
(108, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-05-01 03:23:19', '2021-05-01 03:23:19'),
(109, 4, 'Profile update successfully', 'Profile update successfully', 'success', '', 1, 0, NULL, '2021-05-01 03:24:04', '2021-05-01 03:24:04'),
(110, 4, 'Ads view credit', 'Get reward by view ads you have rewarded ₹ 100', 'credit', '', 1, 0, NULL, '2021-05-01 04:26:33', '2021-05-01 04:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_commission`
--

CREATE TABLE `referral_commission` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `commission` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_commission`
--

INSERT INTO `referral_commission` (`id`, `level`, `commission`, `created_at`, `updated_at`) VALUES
(1, 1, '20', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(2, 2, '18', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(3, 3, '17', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(4, 4, '15', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(5, 5, '14', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(6, 6, '12', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(7, 7, '11', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(8, 8, '10', '2021-04-12 23:40:19', '2021-04-12 23:40:19'),
(9, 9, '9', '2021-04-12 23:40:20', '2021-04-12 23:40:20'),
(10, 10, '8', '2021-04-12 23:40:20', '2021-04-12 23:40:20'),
(11, 11, '5', '2021-04-12 23:40:20', '2021-04-12 23:40:20'),
(12, 12, '0', '2021-04-12 23:40:20', '2021-04-12 23:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `referral_user`
--

CREATE TABLE `referral_user` (
  `id` int(11) NOT NULL,
  `refer_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_user`
--

INSERT INTO `referral_user` (`id`, `refer_id`, `level`, `auth_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, 9, 3, 12, 8.50, '2021-04-20 10:56:31', '2021-04-20 10:56:31'),
(4, 4, 4, 12, 6.00, '2021-04-20 10:56:31', '2021-04-20 10:56:31'),
(5, 4, 1, 9, 42.00, '2021-04-21 04:22:29', '2021-04-21 04:22:29'),
(6, 9, 1, 10, 51.00, '2021-04-23 14:08:04', '2021-04-23 14:08:04'),
(7, 4, 2, 10, 45.90, '2021-04-23 14:08:06', '2021-04-23 14:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisit` int(11) NOT NULL,
  `sitemap_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `app_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `keyword`, `author`, `revisit`, `sitemap_link`, `description`, `app_title`, `created_at`, `updated_at`) VALUES
(1, 'bootstrap,responsive,template,developer,PCC,English', 'PCC earning app', 1, 'http://127.0.0.1:8000/seo/index', 'PCC earning ads view or click plateform', 'Best online earning eith PCC web applications', '2021-04-27 09:36:07', '2021-04-27 09:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `var` varchar(250) NOT NULL,
  `val` text DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `var`, `val`, `status`, `created_at`, `updated_at`) VALUES
(1, 'referral_commission_level', '12', 'on', NULL, NULL),
(2, 'email_global_template', '<table style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#001736\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15\" style=\"padding: 0px 30px 30px;\"><table style=\"width: 320px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><th class=\"column-top\" style=\"font-size: 0pt; line-height: 0pt; padding: 0px; margin: 0px; font-weight: normal; vertical-align: top;\" width=\"145\"><table style=\"width: 320px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"font-size: 0pt; line-height: 0pt; text-align: center;\"><img src=\"https://i.imgur.com/wXmdLJg.png\" alt=\"PTCLab\" width=\"320\" border=\"0\"></td></tr></tbody></table></th></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 10px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 26px 26px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 50px 30px; border-radius: 0px 0px 26px 26px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;\">© 2020 PTCLab. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'on', '2021-04-13 01:12:24', '2021-04-13 01:12:24'),
(3, 'price_table', '1', 'on', NULL, NULL),
(4, 'status_ref', 'on', 'on', '2021-04-18 08:54:37', '2021-04-18 08:54:37'),
(5, 'CommissionAmount_ref', '200', 'on', '2021-04-18 08:54:37', '2021-04-18 08:54:37'),
(6, 'user1CommissionPercent_ref', '40', 'on', '2021-04-18 08:54:37', '2021-04-18 08:54:37'),
(7, 'user2CommissionPercent_ref', '60', 'on', '2021-04-18 08:54:38', '2021-04-18 08:54:38'),
(8, 'address', 'bhowrra machhata chowk near pani tanki', 'on', '2021-04-19 06:42:19', '2021-04-19 06:42:19'),
(9, 'city', 'Madhubani', 'on', '2021-04-19 06:42:19', '2021-04-19 06:42:19'),
(10, 'state', 'bihar', 'on', '2021-04-19 06:42:19', '2021-04-19 06:42:19'),
(11, 'zip', '847212', 'on', '2021-04-19 06:42:19', '2021-04-19 06:42:19'),
(12, 'country', '114', 'on', '2021-04-19 06:42:19', '2021-04-19 06:42:19'),
(13, 'APP_NAME', 'PPC Earning', 'on', NULL, NULL),
(14, 'date_formate', 'd M Y', 'on', NULL, NULL),
(16, 'CURRENCY_TYPE', '₹', 'on', NULL, NULL),
(17, 'withdraw_limit', '1', 'on', '2021-04-21 07:43:39', '2021-04-21 07:43:39'),
(18, 'Withdraw_options', '[\"PayTm\",\"UPI\",\"BANK\",\"Paypal\"]', 'on', '2021-04-21 07:44:17', '2021-04-21 07:44:17'),
(19, 'instant_withdraw', 'no', 'on', '2021-04-21 07:44:17', '2021-04-21 07:44:17'),
(20, 'about_us', '<p class=\"col-lg-6 wow fadeInUp\" data-wow-duration=\"0.3s\" data-wow-delay=\"0.3s\" style=\"visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;\">\r\n            </p><p class=\"video-thumb\">\r\n              <img src=\"https://script.viserlab.com/ptclab/assets/images/frontend/about/5f6cb44527c9a1600959557.png\" alt=\"image\" class=\"w-100\">\r\n              <a class=\"video-icon\" href=\"https://www.youtube.com/embed/GYYvKxchHrM\" data-rel=\"lightcase:myCollection\"><i class=\"fas fa-play-circle\"></i></a>\r\n            </p>\r\n          <p></p>\r\n          <p class=\"col-lg-6 mt-lg-0 mt-5 wow fadeInUp\" data-wow-duration=\"0.5s\" data-wow-delay=\"0.7s\" style=\"visibility: visible; animation-duration: 0.5s; animation-delay: 0.7s; animation-name: fadeInUp;\">\r\n            </p><p class=\"section-content pl-lg-4 pl-0\">\r\n              </p><h2 class=\"section-title mb-20\">About PTCLab</h2>\r\n              <p style=\"margin-top:15px;margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\">&nbsp;Best\r\n Possible Way for Earn From Home. Temporibus eveniet commodi obcaecati \r\nvoluptates reiciendis quis ipsum incidunt quibusdam aperiam autem \r\nsuscipit maiores temporTemporibus eveniet commodi obcaecati voluptates \r\nreiciendis quis ipsum incidunt quibusdam aperiam autem suscipit maiores \r\ntempora impedit, exercitationem ratione distinctio nulla magni nemo \r\ncumque inventore sapiente nisi at vel. Laborum suscipit fuga.</p><ul class=\"cmn-list\" style=\"margin-top:20px;font-family:Roboto, sans-serif;\"><li style=\"font-size:16px;color:rgb(111,111,111);line-height:1.7;margin-top:0px;margin-right:0px;margin-left:0px;padding-left:40px;\">Dolores velit ad excepturi omnis quod nesciunt.</li><li style=\"font-size:16px;color:rgb(111,111,111);line-height:1.7;margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\">Cumque non labore recusandae, eaque quo sint.</li><li style=\"font-size:16px;color:rgb(111,111,111);line-height:1.7;margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\">Accusamus facere possimus illum, nulla nemo dolores.</li><li style=\"font-size:16px;color:rgb(111,111,111);line-height:1.7;margin-top:15px;margin-right:0px;margin-left:0px;padding-left:40px;\">Seriores nisi iure consequatur incidunt aliquam sunt.</li></ul><p></p><p></p>', 'on', NULL, NULL),
(21, 'contact_email', 'abc@pcc.com', 'on', NULL, NULL),
(22, 'contact_phone', '+9170*****88', 'on', NULL, NULL),
(23, 'APP_DESC', 'Earn more with daly simple task just view', 'on', '2021-04-24 13:23:40', '2021-04-24 13:23:40'),
(24, 'map_embed', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57206.34920922674!2d86.0385827524727!3d26.346024143836804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39edcd30bc1d5d47%3A0x8bbe389999d9c709!2sMadhubani%2C%20Bihar%2C%20India!5e0!3m2!1sen!2sbg!4v1619276420132!5m2!1sen!2sbg\"  height=\"270\" style=\"border:0; width:100%;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'on', NULL, NULL),
(25, 'twitter', 'twitter.com', 'on', '2021-04-25 03:09:19', '2021-04-25 03:09:19'),
(26, 'facebook', 'facebook.com', 'on', '2021-04-25 03:09:19', '2021-04-25 03:09:19'),
(27, 'instagram', 'instagram.com', 'on', '2021-04-25 03:09:19', '2021-04-25 03:09:19'),
(28, 'google_plus', 'googleplus.com', 'on', '2021-04-25 03:09:19', '2021-04-25 03:09:19'),
(29, 'linkedin', 'linkdin.com', 'on', '2021-04-25 03:09:19', '2021-04-25 03:09:19'),
(30, 'footer_credit', '&copy; Copyright <strong><span>{{app_name}}</span></strong>. All Rights Reserved\r\n<div class=\"credits\">\r\n          Designed by <a href=\"\">{{app_name}}</a>\r\n        </div>', 'on', '2021-04-25 03:18:06', '2021-04-25 03:18:06'),
(31, 'p_and_p', '<h1>Privacy Policy for PCC</h1>\r\n\r\n<p>At PCC, accessible from http://127.0.0.1:8000/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by PCC and how we use it.</p>\r\n\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in PCC. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href=\"https://www.privacypolicyonline.com/privacy-policy-generator/\">Online Generator of Privacy Policy</a>.</p>\r\n\r\n<h2>Consent</h2>\r\n\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\r\n\r\n<h2>Information we collect</h2>\r\n\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n\r\n<h2>How we use your information</h2>\r\n\r\n<p>We use the information we collect in various ways, including to:</p>\r\n\r\n<ul>\r\n<li>Provide, operate, and maintain our website</li>\r\n<li>Improve, personalize, and expand our website</li>\r\n<li>Understand and analyze how you use our website</li>\r\n<li>Develop new products, services, features, and functionality</li>\r\n<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\r\n<li>Send you emails</li>\r\n<li>Find and prevent fraud</li>\r\n</ul>\r\n\r\n<h2>Log Files</h2>\r\n\r\n<p>PCC follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p>\r\n\r\n<h2>Cookies and Web Beacons</h2>\r\n\r\n<p>Like any other website, PCC uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.</p>\r\n\r\n<p>For more general information on cookies, please read <a href=\"https://www.privacypolicyonline.com/what-are-cookies/\">\"What Are Cookies\" from Cookie Consent</a>.</p>\r\n\r\n<h2>Google DoubleClick DART Cookie</h2>\r\n\r\n<p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href=\"https://policies.google.com/technologies/ads\">https://policies.google.com/technologies/ads</a></p>\r\n\r\n<h2>Our Advertising Partners</h2>\r\n\r\n<p>Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.</p>\r\n\r\n<ul>\r\n    <li>\r\n        <p>Google</p>\r\n        <p><a href=\"https://policies.google.com/technologies/ads\">https://policies.google.com/technologies/ads</a></p>\r\n    </li>\r\n</ul>\r\n\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of PCC.</p>\r\n\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on PCC, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n\r\n<p>Note that PCC has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n\r\n<h2>Third Party Privacy Policies</h2>\r\n\r\n<p>PCC\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>\r\n\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p>\r\n\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n<p>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n<p>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>GDPR Data Protection Rights</h2>\r\n\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n<p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n<p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n<p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>\r\n<p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n<p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n<p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>Children\'s Information</h2>\r\n\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n\r\n<p>PCC does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>', 'on', '2021-04-25 04:02:53', '2021-04-25 04:02:53'),
(32, 't_and_c', '<h2><strong>Terms and Conditions</strong></h2>\r\n\r\n<p>Welcome to PCC!</p>\r\n\r\n<p>These terms and conditions outline the rules and regulations for the use of PCC\'s Website, located at http://127.0.0.1:8000.</p>\r\n\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use PCC if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company’s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>We employ the use of cookies. By accessing PCC, you agreed to use cookies in agreement with the PCC\'s Privacy Policy. </p>\r\n\r\n<p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n\r\n<h3><strong>License</strong></h3>\r\n\r\n<p>Unless otherwise stated, PCC and/or its licensors own the intellectual property rights for all material on PCC. All intellectual property rights are reserved. You may access this from PCC for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n\r\n<p>You must not:</p>\r\n<ul>\r\n    <li>Republish material from PCC</li>\r\n    <li>Sell, rent or sub-license material from PCC</li>\r\n    <li>Reproduce, duplicate or copy material from PCC</li>\r\n    <li>Redistribute content from PCC</li>\r\n</ul>\r\n\r\n<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the <a href=\"https://www.termsandconditionsgenerator.com\">Terms And Conditions Generator</a> and the <a href=\"https://www.generateprivacypolicy.com\">Privacy Policy Generator</a>.</p>\r\n\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. PCC does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of PCC,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, PCC shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n\r\n<p>PCC reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n\r\n<p>You warrant and represent that:</p>\r\n\r\n<ul>\r\n    <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n    <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n    <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n    <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n\r\n<p>You hereby grant PCC a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n\r\n<ul>\r\n    <li>Government agencies;</li>\r\n    <li>Search engines;</li>\r\n    <li>News organizations;</li>\r\n    <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n    <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>\r\n\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n\r\n<ul>\r\n    <li>commonly-known consumer and/or business information sources;</li>\r\n    <li>dot.com community sites;</li>\r\n    <li>associations or other groups representing charities;</li>\r\n    <li>online directory distributors;</li>\r\n    <li>internet portals;</li>\r\n    <li>accounting, law and consulting firms; and</li>\r\n    <li>educational institutions and trade associations.</li>\r\n</ul>\r\n\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of PCC; and (d) the link is in the context of general resource information.</p>\r\n\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>\r\n\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to PCC. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n\r\n<ul>\r\n    <li>By use of our corporate name; or</li>\r\n    <li>By use of the uniform resource locator being linked to; or</li>\r\n    <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>\r\n</ul>\r\n\r\n<p>No use of PCC\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n\r\n<h3><strong>Content Liability</strong></h3>\r\n\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n\r\n<h3><strong>Your Privacy</strong></h3>\r\n\r\n<p>Please read Privacy Policy</p>\r\n\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n\r\n<ul>\r\n    <li>limit or exclude our or your liability for death or personal injury;</li>\r\n    <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n    <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n    <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', 'on', '2021-04-25 04:02:53', '2021-04-25 04:02:53'),
(33, 'fevicon_image', 'images/1619514789.png', 'on', '2021-04-27 09:13:10', '2021-04-27 09:13:10'),
(34, 'fevicon_thumbnail', 'thumbnail/1619514789.png', 'on', '2021-04-27 09:13:10', '2021-04-27 09:13:10'),
(35, 'sms_pkg', 'fast2sms', 'on', NULL, NULL),
(36, 'fast2sms_without_dlt', 'off', 'on', NULL, NULL),
(37, 'fast2sms_with_dlt', 'on', 'on', NULL, NULL),
(38, 'fast2sms_dlt_details', '{\"route\":\"dlt\",\"sender_id\":\"SOFTCK\",\"message\":\"TEST01\"}', 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 'We provide different plan options for users who would like to access our API. Each plan provides a certain number of tokens. Different actions, that can be performed, will use a certain number of tokens. The number of tokens used by a search action will depend on the data type and the time-span.', 'on', '2021-05-01 04:22:26', '2021-05-01 04:22:26'),
(4, 4, 'We provide different plan options for users who would like to access our API. Each plan provides a certain number of tokens. Different actions, that can be performed, will use a certain number of tokens. The number of tokens used by a search action will depend on the data type and the time-span.', 'on', '2021-05-01 04:23:21', '2021-05-01 04:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `credit` varchar(20) DEFAULT NULL,
  `debit` varchar(20) DEFAULT NULL,
  `final` varchar(20) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(10) DEFAULT 'on',
  `json` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `title`, `credit`, `debit`, `final`, `type`, `description`, `status`, `json`, `created_at`, `updated_at`) VALUES
(3, 4, 'Ads view credit ₹ 50', '50', NULL, '0', 'Credit', 'Ads view credit ₹ 50', 'on', NULL, '2021-04-17 05:05:40', '2021-04-17 05:05:40'),
(4, 4, 'Ads view credit ₹ 1', '1', NULL, '50', 'Credit', 'Ads view credit ₹ 1', 'on', NULL, '2021-04-17 05:07:06', '2021-04-17 05:07:06'),
(5, 4, 'Ads view credit ₹ 50', '50', NULL, '51', 'Credit', 'Ads view credit ₹ 50', 'on', NULL, '2021-04-17 05:07:26', '2021-04-17 05:07:26'),
(6, 4, 'Ads view credit ₹ 20', '20', NULL, '101', 'Credit', 'Ads view credit ₹ 20', 'on', NULL, '2021-04-17 05:46:12', '2021-04-17 05:46:12'),
(8, 4, 'Ads view credit ₹ 50', '50', NULL, '121', 'Credit', 'Ads view credit ₹ 50', 'on', NULL, '2021-04-18 05:30:53', '2021-04-18 05:30:53'),
(11, 4, 'Buy PRO Subscription at ₹  Using online payment', '0', NULL, '171', 'debit', 'Buy PRO Subscription Using online payment not using wallet', 'on', '{\"id\":\"pay_H0eo2dh493xyLU\",\"entity\":\"payment\",\"amount\":500,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H0enmwAcHH0BSx\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"PRO\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":12,\"tax\":2,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"6550878\"},\"created_at\":1618808578}', '2021-04-19 05:03:04', '2021-04-19 05:03:04'),
(12, 4, 'Buy PRO Subscription at ₹  Using online payment', '0', NULL, '171', 'debit', 'Buy PRO Subscription Using online payment not using wallet', 'on', '{\"id\":\"pay_H0pgYRRf7t8tqA\",\"entity\":\"payment\",\"amount\":500,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H0pgLIEFnvmgtw\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"PRO\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":12,\"tax\":2,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"8430615\"},\"created_at\":1618846890}', '2021-04-19 15:42:02', '2021-04-19 15:42:02'),
(14, 4, 'Referal bonous credit ₹ 80', '80', '0', '251', 'Credit', 'Referal bonous credit ₹ 80 Your referal joined by Ashish RAY', 'on', NULL, '2021-04-19 19:13:02', '2021-04-19 19:13:02'),
(15, 9, 'Referal bonous credit ₹ 120', '120', '0', '120', 'Credit', 'Referal bonous credit ₹ 120 Your referal joined by Ashish Nigam', 'on', NULL, '2021-04-19 19:13:06', '2021-04-19 19:13:06'),
(16, 9, 'Buy Subscription at 0', '0', '0', '120', 'debit', 'Buy Subscription', 'on', NULL, '2021-04-19 19:17:56', '2021-04-19 19:17:56'),
(17, 9, 'Ads view credit ₹ 100', '100', NULL, '120', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-04-20 04:54:04', '2021-04-20 04:54:04'),
(18, 12, 'Buy Subscription at 0', '0', '0', '0', 'debit', 'Buy Subscription', 'on', NULL, '2021-04-20 07:03:55', '2021-04-20 07:03:55'),
(19, 11, 'Buy Subscription at 0', '0', '0', '0', 'debit', 'Buy Subscription', 'on', NULL, '2021-04-20 07:05:55', '2021-04-20 07:05:55'),
(20, 10, 'Buy Subscription at 0', '0', '0', '0', 'debit', 'Buy Subscription', 'on', NULL, '2021-04-20 07:30:58', '2021-04-20 07:30:58'),
(21, 9, 'Buy PRO Subscription at ₹  Using online payment', '0', NULL, '220', 'debit', 'Buy PRO Subscription Using online payment not using wallet', 'on', '{\"id\":\"pay_H18HFp5IcyJUiK\",\"entity\":\"payment\",\"amount\":500,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H18Gs9cVPyYzjA\",\"invoice_id\":null,\"international\":false,\"method\":\"wallet\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"PRO\",\"card_id\":null,\"bank\":null,\"wallet\":\"jiomoney\",\"vpa\":null,\"email\":\"ranjanashishbsnl253@gmail.com\",\"contact\":\"+917079929885\",\"notes\":[],\"fee\":12,\"tax\":2,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"transaction_id\":null},\"created_at\":1618912364}', '2021-04-20 09:52:49', '2021-04-20 09:52:49'),
(22, 9, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', '1.7', '0', '221.7', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.7', 'on', NULL, '2021-04-20 14:37:25', '2021-04-20 14:37:25'),
(23, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.5', '1.5', '0', '252.5', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.5', 'on', NULL, '2021-04-20 14:37:26', '2021-04-20 14:37:26'),
(24, 9, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', '1.7', '0', '223.4', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.7', 'on', NULL, '2021-04-20 14:37:47', '2021-04-20 14:37:47'),
(25, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 1.5', '1.5', '0', '254', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 1.5', 'on', NULL, '2021-04-20 14:37:47', '2021-04-20 14:37:47'),
(26, 12, 'Ads view credit ₹ 10', '10', NULL, '0', 'Credit', 'Ads view credit ₹ 10', 'on', NULL, '2021-04-20 14:37:48', '2021-04-20 14:37:48'),
(27, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 2', '2', '0', '256', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 2', 'on', NULL, '2021-04-21 04:22:29', '2021-04-21 04:22:29'),
(28, 9, 'Ads view credit ₹ 10', '10', NULL, '223.4', 'Credit', 'Ads view credit ₹ 10', 'on', NULL, '2021-04-21 04:22:30', '2021-04-21 04:22:30'),
(29, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 20', '20', '0', '276', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 20', 'on', NULL, '2021-04-21 04:24:46', '2021-04-21 04:24:46'),
(30, 9, 'Ads view credit ₹ 100', '100', NULL, '233.4', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-04-21 04:24:46', '2021-04-21 04:24:46'),
(31, 4, 'Add money to wallet ₹ 1', '0', NULL, '276', 'debit', 'Add money to wallet ₹ 1', 'on', '{\"id\":\"pay_H1Skv2kivh2EPh\",\"entity\":\"payment\",\"amount\":100,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1SkJlJ5Jx8HFE\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":2,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"5638510\"},\"created_at\":1618984481}', '2021-04-21 05:54:48', '2021-04-21 05:54:48'),
(32, 4, 'Add money to wallet ₹ 1', '0', NULL, '277', 'debit', 'Add money to wallet ₹ 1', 'on', '{\"id\":\"pay_H1SmOX7aC23LUZ\",\"entity\":\"payment\",\"amount\":100,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1SmAHxPLzwW01\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":2,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"7213271\"},\"created_at\":1618984565}', '2021-04-21 05:56:10', '2021-04-21 05:56:10'),
(33, 4, 'Add money to wallet ₹ 2', '0', NULL, '278', 'debit', 'Add money to wallet ₹ 2', 'on', '{\"id\":\"pay_H1Te8ZIncnHbcE\",\"entity\":\"payment\",\"amount\":200,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1TdscV5UlB4ux\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":4,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"4910167\"},\"created_at\":1618987618}', '2021-04-21 06:47:02', '2021-04-21 06:47:02'),
(34, 4, 'Withdrawl successfully  ₹ 1', '0', '1', '280', 'Debit', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-21 09:12:49', '2021-04-21 09:12:49'),
(35, 4, 'Withdrawl successfully  ₹ 1', '0', '1', '280', 'Debit', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-21 09:13:24', '2021-04-21 09:13:24'),
(36, 4, 'Withdrawl successfully  ₹ 1', '0', '1', '280', 'Debit', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-21 09:13:46', '2021-04-21 09:13:46'),
(37, 4, 'Withdrawl successfully  ₹ 1', '0', '1', '280', 'Debit', 'Withdrawl successfully  ₹ 1 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-21 09:17:37', '2021-04-21 09:17:37'),
(38, 4, 'Withdrawl successfully  ₹ 5', '0', '5', '279', 'Debit', 'Withdrawl successfully  ₹ 5 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-21 09:26:15', '2021-04-21 09:26:15'),
(39, 4, 'Withdrawl successfully  ₹ 20', '0', '20', '274', 'Debit', 'Withdrawl successfully  ₹ 20 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-22 15:54:58', '2021-04-22 15:54:58'),
(40, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 20', '20', '0', '353.4', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 20', 'on', NULL, '2021-04-23 14:08:05', '2021-04-23 14:08:05'),
(41, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 18', '18', '0', '272', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 18', 'on', NULL, '2021-04-23 14:08:06', '2021-04-23 14:08:06'),
(42, 10, 'Ads view credit ₹ 100', '100', NULL, '0', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-04-23 14:08:07', '2021-04-23 14:08:07'),
(43, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 20', '20', '0', '373.4', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 20', 'on', NULL, '2021-04-23 14:09:17', '2021-04-23 14:09:17'),
(44, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 18', '18', '0', '290', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 18', 'on', NULL, '2021-04-23 14:09:18', '2021-04-23 14:09:18'),
(45, 10, 'Ads view credit ₹ 100', '100', NULL, '100', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-04-23 14:09:19', '2021-04-23 14:09:19'),
(46, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 1', '1', '0', '374.4', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 1', 'on', NULL, '2021-04-23 14:10:06', '2021-04-23 14:10:06'),
(47, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 0.9', '0.9', '0', '290.9', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 0.9', 'on', NULL, '2021-04-23 14:10:09', '2021-04-23 14:10:09'),
(48, 10, 'Ads view credit ₹ 5', '5', NULL, '200', 'Credit', 'Ads view credit ₹ 5', 'on', NULL, '2021-04-23 14:10:12', '2021-04-23 14:10:12'),
(49, 9, 'Ads view by Ashish Nigam Referal bonous credit ₹ 10', '10', '0', '384.4', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 10', 'on', NULL, '2021-04-23 14:10:56', '2021-04-23 14:10:56'),
(50, 4, 'Ads view by Ashish Nigam Referal bonous credit ₹ 9', '9', '0', '299.9', 'Credit', 'Congratulations ! Ads view by Ashish Nigam Referal bonous credit ₹ 9', 'on', NULL, '2021-04-23 14:10:59', '2021-04-23 14:10:59'),
(51, 10, 'Ads view credit ₹ 50', '50', NULL, '205', 'Credit', 'Ads view credit ₹ 50', 'on', NULL, '2021-04-23 14:11:01', '2021-04-23 14:11:01'),
(52, 10, 'Withdrawl successfully  ₹ 50', '0', '50', '255', 'Debit', 'Withdrawl successfully  ₹ 50 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-23 14:12:16', '2021-04-23 14:12:16'),
(53, 4, 'Ads view credit ₹ 5', '5', NULL, '299.9', 'Credit', 'Ads view credit ₹ 5', 'on', NULL, '2021-04-23 19:37:45', '2021-04-23 19:37:45'),
(54, 4, 'Ads view credit ₹ 1', '1', NULL, '304.9', 'Credit', 'Ads view credit ₹ 1', 'on', NULL, '2021-04-23 19:39:17', '2021-04-23 19:39:17'),
(55, 4, 'Ads view credit ₹ 10', '10', NULL, '305.9', 'Credit', 'Ads view credit ₹ 10', 'on', NULL, '2021-04-23 19:39:42', '2021-04-23 19:39:42'),
(56, 4, 'Ads view credit ₹ 100', '100', NULL, '315.9', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-04-23 19:41:29', '2021-04-23 19:41:29'),
(57, 4, 'Withdrawl successfully  ₹ 15', '0', '15', '415.9', 'Debit', 'Withdrawl successfully  ₹ 15 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-23 19:46:27', '2021-04-23 19:46:27'),
(58, 4, 'Ads view by Ashish RAY Referal bonous credit ₹ 20', '20', '0', '420.9', 'Credit', 'Congratulations ! Ads view by Ashish RAY Referal bonous credit ₹ 20', 'on', NULL, '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(59, 9, 'Ads view credit ₹ 100', '100', NULL, '384.4', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(60, 9, 'Withdrawl successfully  ₹ 4', '0', '4', '484.4', 'Debit', 'Withdrawl successfully  ₹ 4 With in some day or time amount will credit in your account given by you', 'on', NULL, '2021-04-24 17:17:15', '2021-04-24 17:17:15'),
(61, 4, 'Ads view credit ₹ 100', '100', NULL, '420.9', 'Credit', 'Ads view credit ₹ 100', 'on', NULL, '2021-05-01 04:26:33', '2021-05-01 04:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referred_by` int(11) DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double(8,2) NOT NULL DEFAULT 0.00,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `sms_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `json` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referred_by`, `user_type`, `name`, `email`, `phone`, `balance`, `email_verified_at`, `sms_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `status`, `json`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'Ashish Nigam', 'ranjanashish254@gmail.com', '7079692988', 0.00, '2021-04-11 11:17:54', NULL, '$2y$10$Bmi20guirGUVCl35sLUF1uPC8LokINuPwzsha6yYnToAGoTLQ/H7W', NULL, NULL, NULL, 'on', '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-05-01T04:27:39.508261Z\"}', '2021-04-11 09:37:36', '2021-05-01 04:27:39'),
(4, 0, 'user', 'Ashish Nigam', 'ranjanashish253@gmail.com', '9122401753', 520.90, '2021-04-11 11:12:08', '2021-05-01 06:45:39', '$2y$10$/27zIFJtf6/SFasegXkJ8uhPw6v4J84AgfEAreZ.T.25sTmcSlFZO', NULL, NULL, '0zJpNc1aDQt6InRWOk24rQgxGd12lfXTkyjV9ZhiT5lzV1h8hUShN4hyVChQ', 'on', '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-05-01T03:15:17.622909Z\"}', '2021-04-11 10:51:37', '2021-05-01 03:24:04'),
(9, 4, 'user', 'Ashish RAY', 'ranjanashishbsnl253@gmail.com', '1234567890', 480.40, '2021-04-19 19:15:57', NULL, '$2y$10$psET/tNhA5uM3n8kamoHZuq/T0hwC.RbwNu3WRXYF2oRvHIsglJWS', NULL, NULL, NULL, '', NULL, '2021-04-19 19:13:05', '2021-04-19 19:15:57'),
(10, 9, 'user', 'Ashish Nigam', 'ranjanashish254_123456@gmail.com', '9854768215', 205.00, '2021-04-11 11:17:54', NULL, '$2y$10$uvrrb/jezpJn69oCx2v0VuwXJe3cD1mfBPnhohdwLL2pTczo8Vy2q', NULL, NULL, NULL, '', NULL, '2021-04-11 09:37:36', '2021-04-11 11:17:54'),
(11, 10, 'user', 'Ashish Nigam', 'ranjanashish253_123456@gmail.com', '1123456788', 0.00, '2021-04-11 11:12:08', NULL, '$2y$10$BVOoM1vUHe8K1hk.fJhrIeJqffDx9QoZsIThwYpgZcw2TDsN1eNve', NULL, NULL, 'Y66FNuLW778YwlMEorm5Y57JmcNEXZdcrTrjSUSLKX5bJnuYLw7mMCoscXyp', '', NULL, '2021-04-11 10:51:37', '2021-04-11 11:15:24'),
(12, 11, 'user', 'Ashish RAY', 'ranjanashishbsnl253_123456@gmail.com', '1258963214', 10.00, '2021-04-19 19:15:57', NULL, '$2y$10$psET/tNhA5uM3n8kamoHZuq/T0hwC.RbwNu3WRXYF2oRvHIsglJWS', NULL, NULL, NULL, '', NULL, '2021-04-19 19:13:05', '2021-04-19 19:15:57'),
(37, 12, 'user', 'Ashish Nigam', 'ranjanashish254_12345678@gmail.com', '1236589654', 0.00, '2021-04-11 11:17:54', NULL, '$2y$10$uvrrb/jezpJn69oCx2v0VuwXJe3cD1mfBPnhohdwLL2pTczo8Vy2q', NULL, NULL, NULL, '', NULL, '2021-04-11 09:37:36', '2021-04-11 11:17:54'),
(38, 37, 'user', 'Ashish Nigam', 'ranjanashish253_12345678@gmail.com', '91224017577', 0.00, '2021-04-11 11:12:08', '0000-00-00 00:00:00', '$2y$10$niCA.QoSIXpOgMYIIOyVrO4FULMPHudhDVty8VjnR6zUfDuUymD26', NULL, NULL, '8dw3Dntz2TbjoZXlE5Ab9NXaTWpCs7YfSCbZV3fqXBAXCmO6Xa2SOai6FWBZ', 'on', '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-27T13:41:03.514434Z\"}', '2021-04-11 10:51:37', '2021-04-27 17:44:50'),
(39, 39, 'user', 'Ashish Nigam', 'ranjanashish254_1234567@gmail.com', '9854763215', 0.00, '2021-04-11 11:17:54', NULL, '$2y$10$uvrrb/jezpJn69oCx2v0VuwXJe3cD1mfBPnhohdwLL2pTczo8Vy2q', NULL, NULL, NULL, '', NULL, '2021-04-11 09:37:36', '2021-04-11 11:17:54'),
(40, 40, 'user', 'Ashish Nigam', 'ranjanashish253_1234567@gmail.com', '7854963215', 0.00, '2021-04-11 11:12:08', NULL, '$2y$10$BVOoM1vUHe8K1hk.fJhrIeJqffDx9QoZsIThwYpgZcw2TDsN1eNve', NULL, NULL, '8dw3Dntz2TbjoZXlE5Ab9NXaTWpCs7YfSCbZV3fqXBAXCmO6Xa2SOai6FWBZ', '', NULL, '2021-04-11 10:51:37', '2021-04-11 11:15:24'),
(41, 4, 'user', 'Ashish RAY', 'ranjanashishbsnl253_12345678@gmail.com', '258749652', 0.00, '2021-04-19 19:15:57', NULL, '$2y$10$psET/tNhA5uM3n8kamoHZuq/T0hwC.RbwNu3WRXYF2oRvHIsglJWS', NULL, NULL, NULL, '', NULL, '2021-04-19 19:13:05', '2021-04-19 19:15:57'),
(42, 4, 'user', 'Ashish RAY', 'ranjanashishbsnl253_1234567@gmail.com', '9856854123', 0.00, '2021-04-19 19:15:57', NULL, '$2y$10$psET/tNhA5uM3n8kamoHZuq/T0hwC.RbwNu3WRXYF2oRvHIsglJWS', NULL, NULL, NULL, '', NULL, '2021-04-19 19:13:05', '2021-04-19 19:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `avtar_image` text DEFAULT NULL,
  `avtar_thumbnail` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `uid`, `address`, `city`, `state`, `zip`, `country`, `avtar_image`, `avtar_thumbnail`, `created_at`, `updated_at`) VALUES
(3, 4, 'bhowrra machhata chow near pani tanki', 'madhubani', 'bihar', '48752', '114', 'images/1618947809.jpg', 'thumbnail/1618947809.jpg', '2021-04-20 16:08:58', '2021-04-20 16:08:58'),
(4, 38, 'bhowrra machhata chow near pani tanki', NULL, NULL, NULL, '114', NULL, NULL, '2021-04-27 14:25:18', '2021-04-27 14:25:18'),
(5, 1, 'bhowrra machhata chow near pani tanki', NULL, NULL, NULL, '114', NULL, NULL, '2021-04-27 16:58:43', '2021-04-27 16:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdraw` int(11) NOT NULL,
  `withdraw_count` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `user_id`, `withdraw`, `withdraw_count`, `membership_id`, `created_at`, `updated_at`) VALUES
(3, 4, 44, 7, 4, '2021-04-13 21:45:58', '2021-04-13 21:45:58'),
(6, 9, 4, 1, 4, '2021-04-19 19:17:56', '2021-04-19 19:17:56'),
(7, 12, 0, 0, 3, '2021-04-20 07:03:55', '2021-04-20 07:03:55'),
(8, 11, 0, 0, 3, '2021-04-20 07:05:55', '2021-04-20 07:05:55'),
(9, 10, 50, 1, 3, '2021-04-20 07:30:58', '2021-04-20 07:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_ads_view_status`
--

CREATE TABLE `user_ads_view_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `ads_view_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ads_view_status`
--

INSERT INTO `user_ads_view_status` (`id`, `user_id`, `ads_id`, `ads_view_status`, `created_at`, `updated_at`) VALUES
(32, 4, 6, 1, '2021-04-17 05:05:40', '2021-04-16 05:05:40'),
(33, 4, 8, 1, '2021-04-17 05:07:05', '2021-04-17 05:07:05'),
(34, 4, 6, 1, '2021-04-17 05:07:26', '2021-04-17 05:07:26'),
(35, 4, 10, 1, '2021-04-17 05:46:11', '2021-04-17 05:46:11'),
(36, 4, 6, 1, '2021-04-18 05:30:52', '2021-04-18 05:30:52'),
(39, 9, 5, 1, '2021-04-20 04:54:03', '2021-04-20 04:54:03'),
(40, 12, 7, 1, '2021-04-20 14:37:48', '2021-04-20 14:37:48'),
(41, 9, 7, 1, '2021-04-21 04:22:30', '2021-04-21 04:22:30'),
(42, 9, 5, 1, '2021-04-21 04:24:46', '2021-04-21 04:24:46'),
(43, 10, 5, 1, '2021-04-23 14:08:07', '2021-04-23 14:08:07'),
(44, 10, 4, 1, '2021-04-23 14:09:18', '2021-04-23 14:09:18'),
(45, 10, 9, 1, '2021-04-23 14:10:10', '2021-04-23 14:10:10'),
(46, 10, 6, 1, '2021-04-23 14:11:00', '2021-04-23 14:11:00'),
(47, 4, 9, 1, '2021-04-23 19:37:45', '2021-04-23 19:37:45'),
(48, 4, 8, 1, '2021-04-23 19:39:17', '2021-04-23 19:39:17'),
(49, 4, 7, 1, '2021-04-23 19:39:41', '2021-04-23 19:39:41'),
(50, 4, 4, 1, '2021-04-23 19:41:28', '2021-04-23 19:41:28'),
(51, 9, 5, 1, '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(52, 4, 5, 1, '2021-05-01 04:26:32', '2021-05-01 04:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_activity`
--

CREATE TABLE `user_login_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `json` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login_activity`
--

INSERT INTO `user_login_activity` (`id`, `user_id`, `json`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-26T14:01:41.268194Z\"}', 'off', '2021-04-26 14:01:41', '2021-04-26 14:01:41'),
(2, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-26T14:02:06.853125Z\"}', 'off', '2021-04-26 14:02:06', '2021-04-26 14:02:06'),
(3, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-26T14:10:07.299616Z\"}', 'off', '2021-04-26 14:10:07', '2021-04-26 14:10:07'),
(4, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-26T14:10:58.494324Z\"}', 'off', '2021-04-26 14:10:58', '2021-04-26 14:10:58'),
(5, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-26T14:49:50.420441Z\"}', 'off', '2021-04-26 14:49:50', '2021-04-26 14:49:50'),
(6, 4, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-26T15:16:03.511594Z\"}', 'off', '2021-04-26 15:16:03', '2021-04-26 15:16:03'),
(7, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Linux\",\"last_sign_in_at\":\"2021-04-27T03:24:30.483386Z\"}', 'off', '2021-04-27 03:24:30', '2021-04-27 03:24:30'),
(8, 4, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-27T03:26:22.312646Z\"}', 'off', '2021-04-27 03:26:22', '2021-04-27 03:26:22'),
(9, 38, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-27T13:41:03.514434Z\"}', 'on', '2021-04-27 13:41:03', '2021-04-27 13:41:03'),
(10, 4, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-28T04:45:23.488360Z\"}', 'off', '2021-04-28 04:45:24', '2021-04-28 04:45:24'),
(11, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-28T05:39:40.601851Z\"}', 'off', '2021-04-28 05:39:40', '2021-04-28 05:39:40'),
(12, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-30T15:04:25.604983Z\"}', 'off', '2021-04-30 15:04:25', '2021-04-30 15:04:25'),
(13, 4, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-30T15:49:52.908122Z\"}', 'off', '2021-04-30 15:49:56', '2021-04-30 15:49:56'),
(14, 1, '{\"ip\":\"::1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-04-30T17:27:27.542630Z\"}', 'off', '2021-04-30 17:27:27', '2021-04-30 17:27:27'),
(15, 4, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Firefox\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-05-01T03:15:17.622909Z\"}', 'on', '2021-05-01 03:15:17', '2021-05-01 03:15:17'),
(16, 1, '{\"ip\":\"::1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-05-01T03:49:39.587632Z\"}', 'off', '2021-05-01 03:49:39', '2021-05-01 03:49:39'),
(17, 1, '{\"ip\":\"127.0.0.1\",\"getbrowser\":\"Chrome\",\"getdevice\":\"Computer\",\"getos\":\"Windows 10\",\"last_sign_in_at\":\"2021-05-01T04:27:39.508261Z\"}', 'on', '2021-05-01 04:27:39', '2021-05-01 04:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `type`, `payment_type`, `payment_details`, `created_at`, `updated_at`) VALUES
(2, 4, 50.00, 'Credit', 'Ads view credit ₹ 50', '', '2021-04-17 05:05:40', '2021-04-17 05:05:40'),
(3, 4, 1.00, 'Credit', 'Ads view credit ₹ 1', '', '2021-04-17 05:07:06', '2021-04-17 05:07:06'),
(4, 4, 50.00, 'Credit', 'Ads view credit ₹ 50', '', '2021-04-17 05:07:26', '2021-04-17 05:07:26'),
(5, 4, 20.00, 'Credit', 'Ads view credit ₹ 20', '', '2021-04-17 05:46:12', '2021-04-17 05:46:12'),
(6, 4, 50.00, 'Credit', 'Ads view credit ₹ 50', '', '2021-04-18 05:30:53', '2021-04-18 05:30:53'),
(9, 4, 80.00, 'Credit', 'Referal bonous credit ₹ 80', '', '2021-04-19 19:13:02', '2021-04-19 19:13:02'),
(10, 9, 120.00, 'Credit', 'Referal bonous credit ₹ 120', '', '2021-04-19 19:13:06', '2021-04-19 19:13:06'),
(11, 9, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-04-20 04:54:04', '2021-04-20 04:54:04'),
(12, 3, 1.70, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', '', '2021-04-20 14:11:37', '2021-04-20 14:11:37'),
(13, 9, 1.70, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', '', '2021-04-20 14:37:25', '2021-04-20 14:37:25'),
(14, 4, 1.50, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 1.5', '', '2021-04-20 14:37:26', '2021-04-20 14:37:26'),
(15, 9, 1.70, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 1.7', '', '2021-04-20 14:37:47', '2021-04-20 14:37:47'),
(16, 4, 1.50, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 1.5', '', '2021-04-20 14:37:47', '2021-04-20 14:37:47'),
(17, 12, 10.00, 'Credit', 'Ads view credit ₹ 10', '', '2021-04-20 14:37:48', '2021-04-20 14:37:48'),
(18, 4, 2.00, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 2', '', '2021-04-21 04:22:29', '2021-04-21 04:22:29'),
(19, 9, 10.00, 'Credit', 'Ads view credit ₹ 10', '', '2021-04-21 04:22:30', '2021-04-21 04:22:30'),
(20, 4, 20.00, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 20', '', '2021-04-21 04:24:45', '2021-04-21 04:24:45'),
(21, 9, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-04-21 04:24:46', '2021-04-21 04:24:46'),
(22, 4, 1.00, 'Credit', 'Add money to wallet ₹ 1', '{\"id\":\"pay_H1Skv2kivh2EPh\",\"entity\":\"payment\",\"amount\":100,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1SkJlJ5Jx8HFE\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":2,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"5638510\"},\"created_at\":1618984481}', '2021-04-21 05:54:48', '2021-04-21 05:54:48'),
(23, 4, 1.00, 'Credit', 'Add money to wallet ₹ 1', '{\"id\":\"pay_H1SmOX7aC23LUZ\",\"entity\":\"payment\",\"amount\":100,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1SmAHxPLzwW01\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":2,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"7213271\"},\"created_at\":1618984565}', '2021-04-21 05:56:10', '2021-04-21 05:56:10'),
(24, 4, 2.00, 'Credit', 'Add money to wallet ₹ 2', '{\"id\":\"pay_H1Te8ZIncnHbcE\",\"entity\":\"payment\",\"amount\":200,\"currency\":\"INR\",\"status\":\"captured\",\"order_id\":\"order_H1TdscV5UlB4ux\",\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":true,\"description\":\"Add money to wallet\",\"card_id\":null,\"bank\":\"SBIN\",\"wallet\":null,\"vpa\":null,\"email\":\"ranjanashish253@gmail.com\",\"contact\":\"+917079692988\",\"notes\":[],\"fee\":4,\"tax\":0,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"4910167\"},\"created_at\":1618987618}', '2021-04-21 06:47:02', '2021-04-21 06:47:02'),
(25, 4, 1.00, 'Credit', 'Referal bonous credit ₹ 1', '', '2021-04-21 09:12:49', '2021-04-21 09:12:49'),
(26, 4, 1.00, 'Credit', 'Referal bonous credit ₹ 1', '', '2021-04-21 09:13:24', '2021-04-21 09:13:24'),
(27, 4, 1.00, 'Credit', 'Referal bonous credit ₹ 1', '', '2021-04-21 09:13:46', '2021-04-21 09:13:46'),
(28, 4, 1.00, 'Credit', 'Referal bonous credit ₹ 1', '', '2021-04-21 09:17:37', '2021-04-21 09:17:37'),
(29, 4, 5.00, 'Credit', 'Referal bonous credit ₹ 5', '', '2021-04-21 09:26:15', '2021-04-21 09:26:15'),
(30, 4, 20.00, 'Credit', 'Referal bonous credit ₹ 20', '', '2021-04-22 15:54:58', '2021-04-22 15:54:58'),
(31, 9, 20.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 20', '', '2021-04-23 14:08:05', '2021-04-23 14:08:05'),
(32, 4, 18.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 18', '', '2021-04-23 14:08:06', '2021-04-23 14:08:06'),
(33, 10, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-04-23 14:08:07', '2021-04-23 14:08:07'),
(34, 9, 20.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 20', '', '2021-04-23 14:09:17', '2021-04-23 14:09:17'),
(35, 4, 18.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 18', '', '2021-04-23 14:09:18', '2021-04-23 14:09:18'),
(36, 10, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-04-23 14:09:19', '2021-04-23 14:09:19'),
(37, 9, 1.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 1', '', '2021-04-23 14:10:06', '2021-04-23 14:10:06'),
(38, 4, 0.90, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 0.9', '', '2021-04-23 14:10:08', '2021-04-23 14:10:08'),
(39, 10, 5.00, 'Credit', 'Ads view credit ₹ 5', '', '2021-04-23 14:10:12', '2021-04-23 14:10:12'),
(40, 9, 10.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 10', '', '2021-04-23 14:10:56', '2021-04-23 14:10:56'),
(41, 4, 9.00, 'Credit', 'Ads view by Ashish Nigam Referal bonous credit ₹ 9', '', '2021-04-23 14:10:58', '2021-04-23 14:10:58'),
(42, 10, 50.00, 'Credit', 'Ads view credit ₹ 50', '', '2021-04-23 14:11:01', '2021-04-23 14:11:01'),
(43, 10, 50.00, 'Credit', 'Referal bonous credit ₹ 50', '', '2021-04-23 14:12:16', '2021-04-23 14:12:16'),
(44, 4, 5.00, 'Credit', 'Ads view credit ₹ 5', '', '2021-04-23 19:37:45', '2021-04-23 19:37:45'),
(45, 4, 1.00, 'Credit', 'Ads view credit ₹ 1', '', '2021-04-23 19:39:17', '2021-04-23 19:39:17'),
(46, 4, 10.00, 'Credit', 'Ads view credit ₹ 10', '', '2021-04-23 19:39:41', '2021-04-23 19:39:41'),
(47, 4, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-04-23 19:41:29', '2021-04-23 19:41:29'),
(48, 4, 15.00, 'Credit', 'Referal bonous credit ₹ 15', '', '2021-04-23 19:46:27', '2021-04-23 19:46:27'),
(49, 4, 20.00, 'Credit', 'Ads view by Ashish RAY Referal bonous credit ₹ 20', '', '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(50, 9, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-04-24 17:14:55', '2021-04-24 17:14:55'),
(51, 9, 4.00, 'Credit', 'Referal bonous credit ₹ 4', '', '2021-04-24 17:17:15', '2021-04-24 17:17:15'),
(52, 4, 100.00, 'Credit', 'Ads view credit ₹ 100', '', '2021-05-01 04:26:33', '2021-05-01 04:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `user_id`, `amount`, `payment_method`, `payment_details`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 1.00, 'BANK', 'Benk method options', 'pending', '', '2021-04-21 09:12:48', '2021-04-21 09:12:48'),
(2, 4, 1.00, 'PayTm', '7079692988', 'pending', '', '2021-04-21 09:13:23', '2021-04-21 09:13:23'),
(3, 4, 1.00, 'PayTm', '7079692988', 'pending', NULL, '2021-04-21 09:13:46', '2021-04-21 09:13:46'),
(4, 4, 1.00, 'PayTm', '7079692988', 'pending', NULL, '2021-04-21 09:17:37', '2021-04-21 09:17:37'),
(5, 4, 5.00, 'UPI', '707969288@upi', 'denied', 'UPI Id Incorrect plze correct upi id', '2021-04-21 09:26:15', '2021-04-21 09:26:15'),
(6, 4, 20.00, 'PayTm', '7079692988', 'success', NULL, '2021-04-22 15:54:57', '2021-04-22 15:54:57'),
(7, 10, 50.00, 'PayTm', '7079692988', 'pending', NULL, '2021-04-23 14:12:16', '2021-04-23 14:12:16'),
(8, 4, 15.00, 'Paypal', 'paypal id', 'pending', NULL, '2021-04-23 19:46:26', '2021-04-23 19:46:26'),
(9, 9, 4.00, 'Paypal', '7079692988', 'pending', NULL, '2021-04-24 17:17:14', '2021-04-24 17:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificaton`
--
ALTER TABLE `notificaton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `referral_commission`
--
ALTER TABLE `referral_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_user`
--
ALTER TABLE `referral_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ads_view_status`
--
ALTER TABLE `user_ads_view_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login_activity`
--
ALTER TABLE `user_login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notificaton`
--
ALTER TABLE `notificaton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `referral_commission`
--
ALTER TABLE `referral_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `referral_user`
--
ALTER TABLE `referral_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_ads_view_status`
--
ALTER TABLE `user_ads_view_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_login_activity`
--
ALTER TABLE `user_login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
