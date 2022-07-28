-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 09:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animation`
--

-- --------------------------------------------------------

--
-- Table structure for table `animation`
--

CREATE TABLE `animation` (
  `animation_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `media_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_episode` int(11) NOT NULL,
  `works_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Director_of_audiography` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recording_studio_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animation`
--

INSERT INTO `animation` (`animation_name`, `year`, `media_type`, `theme`, `num_episode`, `works_name`, `author`, `Director_of_audiography`, `recording_studio_id`) VALUES
('BEASTARS', 2019, '電視', '動物群像劇', 12, 'BEASTARS', '板垣巴留', '神前曉', 'cr18802'),
('JoJo的奇妙冒險：黃金之風', 2018, '電視', '冒險', 39, 'JoJo的奇妙冒險第五部黃金之風', '荒木飛呂彥', '岩浪美和', 'cr18795'),
('PUI PUI 天竺鼠車車', 2021, '電視', '定格動畫', 12, 'PUI PUI 天竺鼠車車', ' 見里朝希', '小鷲翔太', 'cr18802'),
('Re:從零開始的異世界生活 ', 2016, '電視', '異世界', 25, 'Re:從零開始的異世界生活', '長月達平', '明田川仁', 'cr18797'),
('你的名字。', 2016, '電影', '戀愛', 1, '你的名字。', '新海誠', '山田陽', 'cr18794'),
('喬瑟與虎與魚群', 2020, '電影', '戀愛', 1, '喬瑟與虎與魚群', '田邊聖子', 'Evan Call', 'cr18796'),
('奇巧計程車', 2021, '電視', '動物群像劇', 12, '奇巧計程車', ' P.I.C.S.', '吉田光平', 'cr18800'),
('排球少年！！', 2014, '電視', '運動', 25, '排球少年！！', ' 古舘春一', '菊田浩巳', 'cr18799'),
('進擊的巨人', 2013, '電視', ' 少年動畫', 25, '進擊的巨人', '諫山創', '澤野弘之', 'cr18795'),
('進擊的巨人', 2020, '電視', ' 少年動畫', 16, '進擊的巨人', '諫山創', '澤野弘之', 'cr18795');

-- --------------------------------------------------------

--
-- Table structure for table `animation_characteristics`
--

CREATE TABLE `animation_characteristics` (
  `animation_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `VA_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `characteristics` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animation_characteristics`
--

INSERT INTO `animation_characteristics` (`animation_name`, `year`, `VA_id`, `characteristics`) VALUES
('BEASTARS', 2019, 'P900', '雷格西'),
('JoJo的奇妙冒險：黃金之風', 2018, 'P897', '喬魯諾·喬巴納'),
('PUI PUI 天竺鼠車車', 2021, 'P899', '西羅摩'),
('Re:從零開始的異世界生活 ', 2016, 'P895', '菜月昴'),
('Re:從零開始的異世界生活 ', 2016, 'P896', '雷姆'),
('你的名字。', 2016, 'P888', '立花瀧'),
('你的名字。', 2016, 'P889', '宮水三葉'),
('喬瑟與虎與魚群', 2020, 'P893', '鈴川恆夫'),
('喬瑟與虎與魚群', 2020, 'P894', '喬瑟'),
('奇巧計程車', 2021, 'P901', '小戶川'),
('排球少年！！', 2014, 'P898', '日向翔陽'),
('進擊的巨人', 2013, 'P890', '艾倫‧耶格爾'),
('進擊的巨人', 2013, 'P891', '米卡莎‧阿卡曼'),
('進擊的巨人', 2013, 'P892', '阿爾敏‧亞魯雷特'),
('進擊的巨人', 2020, 'P890', '艾倫‧耶格爾'),
('進擊的巨人', 2020, 'P891', '米卡莎‧阿卡曼'),
('進擊的巨人', 2020, 'P892', '阿爾敏‧亞魯雷特');

-- --------------------------------------------------------

--
-- Table structure for table `animation_director`
--

CREATE TABLE `animation_director` (
  `animation_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `Director_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animation_director`
--

INSERT INTO `animation_director` (`animation_name`, `year`, `Director_id`) VALUES
('BEASTARS', 2019, 'D2454'),
('JoJo的奇妙冒險：黃金之風', 2018, 'D2451'),
('PUI PUI 天竺鼠車車', 2021, 'D2453'),
('Re:從零開始的異世界生活 ', 2016, 'D2450'),
('你的名字。', 2016, 'D2446'),
('喬瑟與虎與魚群', 2020, 'D2449'),
('奇巧計程車', 2021, 'D2455'),
('排球少年！！', 2014, 'D2452'),
('進擊的巨人', 2013, 'D2447'),
('進擊的巨人', 2020, 'D2448');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `Director_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Director_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Director_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`Director_id`, `Director_name`, `Director_age`) VALUES
('D2446', '新海誠', 48),
('D2447', '荒木哲郎', 45),
('D2448', '林祐一郎', 43),
('D2449', '田村耕太郎', 57),
('D2450', '渡邊政治', 45),
('D2451', '津田尚克', 50),
('D2452', '滿仲勸', 35),
('D2453', '見里朝希', 29),
('D2454', ' 松見真一', 44),
('D2455', '木下麥', 33),
('D2456', '岡本學', 35);

-- --------------------------------------------------------

--
-- Table structure for table `dubbing`
--

CREATE TABLE `dubbing` (
  `animation_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `VA_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recording_studio_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dubbing`
--

INSERT INTO `dubbing` (`animation_name`, `year`, `VA_id`, `recording_studio_id`) VALUES
('BEASTARS', 2019, 'P900', 'cr18802'),
('JoJo的奇妙冒險：黃金之風', 2018, 'P897', 'cr18795'),
('PUI PUI 天竺鼠車車', 2021, 'P899', 'cr18802'),
('Re:從零開始的異世界生活 ', 2016, 'P895', 'cr18797'),
('Re:從零開始的異世界生活 ', 2016, 'P896', 'cr18797'),
('你的名字。', 2016, 'P888', 'cr18794'),
('你的名字。', 2016, 'P889', 'cr18794'),
('喬瑟與虎與魚群', 2020, 'P893', 'cr18796'),
('喬瑟與虎與魚群', 2020, 'P894', 'cr18796'),
('奇巧計程車', 2021, 'P901', 'cr18800'),
('排球少年！！', 2014, 'P898', 'cr18799'),
('進擊的巨人', 2013, 'P890', 'cr18795'),
('進擊的巨人', 2013, 'P891', 'cr18795'),
('進擊的巨人', 2013, 'P892', 'cr18795'),
('進擊的巨人', 2020, 'P890', 'cr18795'),
('進擊的巨人', 2020, 'P891', 'cr18795'),
('進擊的巨人', 2020, 'P892', 'cr18795');

-- --------------------------------------------------------

--
-- Table structure for table `management_company`
--

CREATE TABLE `management_company` (
  `company_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CEO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_artists` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management_company`
--

INSERT INTO `management_company` (`company_id`, `company_name`, `CEO`, `num_artists`) VALUES
('C101', 'Co-LaVo', '佐藤健', 2),
('C102', '東寶藝能', '池田篤郎', 40),
('C103', 'VIMS', '森久保祥太郎', 30),
('C104', 'mitt management', 'Mitt', 3),
('C105', 'Sigma Seven', '浦部悅太郎', 55),
('C106', 'Stardust Promotion', '細野義朗', 60),
('C107', 'Amuse', '市毛琉美子', 80),
('C108', 'YU-RIN PRO', '難波啓子', 150),
('C109', 'AXL ONE', '森川智之', 70),
('C110', 'Animo Produce', '仲谷明香', 25),
('C111', ' 見里朝希', ' 見里朝希家', 1),
('C112', '元計', '元', 2),
('C113', 'Across Entertainment', '藤崎淳', 200);

-- --------------------------------------------------------

--
-- Table structure for table `original_work`
--

CREATE TABLE `original_work` (
  `author` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `works_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `original_work`
--

INSERT INTO `original_work` (`author`, `works_name`, `type`) VALUES
(' P.I.C.S.', '奇巧計程車', '原創'),
(' 古舘春一', '排球少年！！', '漫畫'),
(' 山貓兄妹', '叫我對大哥', '漫畫'),
('AJ', 'vivy2', '原創'),
('gy', 'jiji', '原創'),
('新海誠', '你的名字。', '原創'),
('曉佳奈', '紫羅蘭永恆花園', '小說'),
('板垣巴留', 'BEASTARS', '漫畫'),
('田邊聖子', '喬瑟與虎與魚群', '小說'),
('荒木飛呂彥', 'JoJo的奇妙冒險第五部黃金之風', '漫畫'),
('見里朝希', 'PUI PUI 天竺鼠車車', '原創'),
('諫山創', '進擊的巨人', '漫畫'),
('長月達平', 'Re:從零開始的異世界生活', '小說');

-- --------------------------------------------------------

--
-- Table structure for table `recording studio`
--

CREATE TABLE `recording studio` (
  `recording_studio_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `RA_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_in_charge` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recording studio`
--

INSERT INTO `recording studio` (`recording_studio_id`, `RA_name`, `person_in_charge`, `location`) VALUES
('cr18794', 'studio Don Juan', 'Don Juan', 'Tokyo'),
('cr18795', 'Onkio Haus', 'Magazine House', 'Ginza'),
('cr18796', 'Evan Call', 'Evan Call', 'Tokyo'),
('cr18797', 'KADOKAWA', '角川歷彥', 'Tokyo'),
('cr18798', '東寶株式會社', '松岡功', 'Tokyo'),
('cr18799', 'AVACO  CREATIVE STUDIO', '金子裕一', 'Tokyo'),
('cr18800', 'SOUND INN', '安岡喜郎', 'Tokyo'),
('cr18801', 'Sound City', 'Motoki Tanaka', 'Tokyo'),
('cr18802', 'MIT STUDIO', '安本義治', 'Tokyo'),
('cr18803', 'ONKIO HAUS', '坂口平兵衞', 'Tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `voice_actor`
--

CREATE TABLE `voice_actor` (
  `VA_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `VA_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `VA_age` int(11) NOT NULL,
  `VA_gender` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_of_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voice_actor`
--

INSERT INTO `voice_actor` (`VA_id`, `VA_name`, `VA_age`, `VA_gender`, `company_id`, `term_of_contact`) VALUES
('P888', '神木隆之介', 27, '男', 'C101', 3),
('P889', '上白石萌音', 23, '女', 'C102', 3),
('P890', '梶裕貴', 27, '男', 'C103', 4),
('P891', '石川由依', 24, '女', 'C104', 3),
('P892', '井上麻里奈', 28, '女', 'C105', 4),
('P893', '中川大志', 22, '男', 'C106', 3),
('P894', '清原果耶', 19, '女', 'C107', 4),
('P895', '小林裕介', 36, '男', 'C108', 3),
('P896', '水瀨祈', 25, '女', 'C109', 4),
('P897', '小野賢章', 31, '男', 'C110', 3),
('P898', '村濑步', 32, '男', 'C103', 3),
('P899', '馬鈴薯', 4, '男', 'C111', 15),
('P900', '小林親弘', 37, '男', 'C112', 3),
('P901', '花江夏樹', 29, '男', 'C113', 5),
('P902', '高塚智人', 28, '男', 'C108', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animation`
--
ALTER TABLE `animation`
  ADD PRIMARY KEY (`animation_name`,`year`);

--
-- Indexes for table `animation_characteristics`
--
ALTER TABLE `animation_characteristics`
  ADD PRIMARY KEY (`animation_name`,`year`,`VA_id`);

--
-- Indexes for table `animation_director`
--
ALTER TABLE `animation_director`
  ADD PRIMARY KEY (`animation_name`,`year`,`Director_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`Director_id`);

--
-- Indexes for table `dubbing`
--
ALTER TABLE `dubbing`
  ADD PRIMARY KEY (`animation_name`,`year`,`VA_id`);

--
-- Indexes for table `management_company`
--
ALTER TABLE `management_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `original_work`
--
ALTER TABLE `original_work`
  ADD PRIMARY KEY (`author`,`works_name`);

--
-- Indexes for table `recording studio`
--
ALTER TABLE `recording studio`
  ADD PRIMARY KEY (`recording_studio_id`);

--
-- Indexes for table `voice_actor`
--
ALTER TABLE `voice_actor`
  ADD PRIMARY KEY (`VA_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
